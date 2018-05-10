<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DateTime;
use App\User;
use App\Visitor;
date_default_timezone_set("Asia/Jakarta");

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->email == "admin@portal.com"){
            $date  = new DateTime;
            $today = $date->format('d');
            $month = $date->format('m') - 1;
            $year  = $date->format('Y');

            $total = Visitor::all()->count();
            $hari  = Visitor::whereDay('created_at', $today)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->count();
            
            $bulan = Visitor::whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->count();

            return view('admin.home', ['hari' => $hari, 'bulan' => $bulan, 'total' => $total]);
        }
        else return view('user.home');
        
    }
}
