<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Berita;
use App\User;
use App\Comment;
use Auth;
use DateTime;
date_default_timezone_set("Asia/Jakarta");

class AdminController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
    
    /* ------------ Post ------------- */

    public function tambah(){
    	return view('admin.tambah');
    }

    public function addPost(Request $request){

        $this->validate($request, [
            'kategori' => 'required'
        ]);

        $path     = str_replace("?", "", $request->judul);
    	$path     = explode(" ", $path);
    	$path     = implode("-", $path);
        $kategori = implode(", ", $request->kategori);

        $berita = new Berita;
        $berita->judul    = $request->judul;
        $berita->kategori = $kategori;
        $berita->isi      = $request->isi;
        $berita->path     = $path;

        if($request->file('foto') != "") {
            $file         = $request->file('foto');
            $fileName     = $file->getClientOriginalName();
            $dt           = new DateTime();
            $time         = $dt->format('Y_m_d_H_i_s_');
            $fileNameNew  = $time.$fileName;
            $request->file('foto')->move("img/", $fileNameNew);

            $berita->foto = $fileNameNew;
        } 

        $berita->save();
        return redirect("/tambah")->with('msg', 'Berhasil Menambahkan Artikel!');
    }

    public function editPost(Request $request, $id){

        $this->validate($request, [
            'kategori' => 'required'
        ]);

        $path     = str_replace("?", "", $request->judul);
        $path     = explode(" ", $path);
        $path     = implode("-", $path);
        $kategori = implode(", ", $request->kategori);

        $berita = Berita::find($id);
        $berita->judul    = $request->judul;
        $berita->kategori = $kategori;
        $berita->isi      = $request->isi;
        $berita->path     = $path;

        if($request->file('foto') != "") {
            $file         = $request->file('foto');
            $fileName     = $file->getClientOriginalName();
            $dt           = new DateTime();
            $time         = $dt->format('Y_m_d_H_i_s_');
            $fileNameNew  = $time.$fileName;
            $request->file('foto')->move("img/", $fileNameNew);

            $berita->foto = $fileNameNew;
        } else $berita->foto = $berita->foto;

        $berita->save();
        return redirect("/edit/".$id)->with('msg', 'Berhasil Mengubah Artikel!');
    }

    public function daftar(){
        $beritas = Berita::orderBy('id', 'DESC')->get();
        return view('admin.daftar', ['beritas' => $beritas, 'controller' => $this]);
    }

    public function edit($id){
        $berita = Berita::find($id);
        return view('admin.edit', ['berita' => $berita]);
    }

    public function hapus($id){
        $berita = Berita::find($id);
        $berita->delete();
        return redirect('/daftar')->with('msg', 'Berhasil Menghapus Artikel!');
    }

    public function hapusUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('msg', 'Berhasil Menghapus user.');
    }

    public function komentar(){
        $comments = DB::table('comments')->join('beritas', 'beritas.id', '=', 'comments.post_id')
                                         ->join('users', 'comments.user_id', '=', 'users.id')
                                         ->orderBy('comments.id', 'DESC')->get(['comments.*', 'beritas.judul', 'beritas.path', 'users.name']);
        return view('admin.komentar', ['comments' => $comments, 'controller' => $this]);
    }

    public function user(){
        $users = User::orderBy('name', 'ASC')->get();
        return view('admin.user', ['users' => $users]);
    }

    /* ------------ Without Routing ------------- */

    public function kategori($cat){
        $kategoris = explode(", ", $cat);
        foreach($kategoris as $kategori){
            $kategoriA = $kategori;
            $kategori = ($kategori != $kategoris[0]) ? ", ".$kategori : $kategori; 
            echo '<a class="cat-news" href="/kategori/'.$kategoriA.'">'.$kategori.'</a>';
        }
    }

    public function tanggal($tgl){
        $date  = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret' , 'April' , 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time  = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y'); 
        echo '<div class="time-news">'.$time.'</div>';
    }

    public function fullTime($tgl){
        $date  = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret' , 'April' , 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time  = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y')." ".$date->format("H:i:s"); 
        echo '<div class="time-news">'.$time.'</div>';
    }
}
