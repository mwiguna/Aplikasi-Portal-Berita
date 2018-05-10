<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Like;
use DateTime;
use App\Comment;
use App\Notification;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Jakarta");

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function userInfo(){
    	$id    = Auth::user()->id;
    	$datas = User::where('id', $id)->first();
   
  		return $datas;
    }

    public function addComment(Request $request){
    	$comment           = new Comment;
    	$comment->user_id  = Auth::user()->id;
    	$comment->post_id  = $request->id;
    	$comment->isi      = $request->komentar;
    	$comment->save();

    	$tgl   = Comment::where('user_id', Auth::User()->id)->orderBy('id', 'DESC')->limit(1)->first(); 
    	$date  = new DateTime($tgl->created_at);
        $month = array('Januari', 'Februari', 'Maret' , 'April' , 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time  = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y')." ".$date->format("H:i:s"); 
    	return $time;
    }

    public function comment(){
        $comments = Comment::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $comments = DB::table('comments')->where('comments.user_id', Auth::user()->id)
                                        ->join('beritas', 'beritas.id', '=', 'comments.post_id')
                                        ->orderBy('comments.id', 'DESC')->get(['comments.*', 'beritas.judul', 'beritas.path']);
        return view('user.comment', ['comments' => $comments, 'controller' => $this]);
    }

    public function editComment($id){
        $comment = Comment::where('id', $id)->first();
        return view('user.editComment', ['comment' => $comment]);
    }

    public function updateComment(Request $request, $id){
        $comment = Comment::find($id);
        $comment->isi = $request->komentar;
        $comment->save();

        if(Auth::user()->email == "admin@portal.com") {
            return redirect('/komentar')->with('msg', 'Berhasil menyunting Komentar!');
        }
        return redirect('/comment')->with('msg', 'Berhasil menyunting Komentar!');
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        if(Auth::user()->email == "admin@portal.com") {
            return redirect('/komentar')->with('msg', 'Berhasil Menghapus Komentar!');
        }
        return redirect('/comment')->with('msg', 'Berhasil Menghapus Komentar!');
    }

    public function editBiodata(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name      = $request->nama;
        $user->email     = $request->email;
        $user->alamat    = $request->alamat;
        $user->tgl_lahir = $request->tgl;
        $user->nohp      = $request->nohp;
        $user->save();

        return redirect('/home')->with('msg', 'Berhasil mengubah Biodata.');   
    }

    public function reply(Request $request){
        $comment            = new Comment;
        $comment->user_id   = Auth::user()->id;
        $comment->post_id   = $request->post_id;
        $comment->parent_id = $request->parent_id;
        $comment->isi       = $request->komentar;
        $comment->save();

        $notif            = new Notification;
        $notif->user_id   = Auth::user()->id;
        $notif->post_id   = $request->post_id;
        $notif->parent_id = $request->parent_id;
        $notif->parentuser_id = $request->parentuser_id;
        $notif->save();

        $date  = new DateTime();
        $month = array('Januari', 'Februari', 'Maret' , 'April' , 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time  = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y')." ".$date->format("H:i:s"); 
        return $time;
    }

    public function like(Request $request){
        $like            = new Like;
        $like->user_id   = Auth::user()->id;
        $like->post_id   = $request->post_id;
        $like->parent_id = $request->parent_id;
        $like->save();

        $notif            = new Notification;
        $notif->user_id   = Auth::user()->id;
        $notif->post_id   = $request->post_id;
        $notif->parent_id = $request->parent_id;
        $notif->type      = 1;
        $notif->parentuser_id = $request->parentuser_id;
        $notif->save();        
    }

    public function unlike(Request $request){
        $like = Like::where('parent_id', $request->parent_id)->where('user_id', Auth::user()->id)->first();
        $notif = Notification::where('parent_id', $request->parent_id)->where('user_id', Auth::user()->id)->first();
        $like->delete();
        $notif->delete();    
    }

    public function notification(){
        $notifs = DB::table('notifications')->where('notifications.parentuser_id', Auth::user()->id)
                                       ->where('notifications.user_id', '!=', Auth::user()->id)
                                       ->join('beritas', 'beritas.id', '=', 'notifications.post_id')
                                       ->join('users', 'users.id', '=', 'notifications.user_id')
                                       ->orderBy('notifications.id', 'DESC')->get(['notifications.*', 'beritas.judul', 'beritas.path', 'users.name']);
    
        return view('user.notif', ['notifs' => $notifs, 'controller' => $this]);
    }

    /* ------------ Without Routing ------------- */

    public function tanggal($tgl){
        $date  = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret' , 'April' , 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time  = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y'); 
        echo '<div class="time-news">'.$time.'</div>';
    }

    public function fullTime($tgl){
        $date  = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret' , 'April' , 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time  = $date->format('d')." ".$month[$date->format('m') -1]." ".$date->format('Y')." ".$date->format("H:i:s"); 
        echo '<div class="time-news">'.$time.'</div>';
    }
}
