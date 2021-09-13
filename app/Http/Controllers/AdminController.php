<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lapor;
use App\Report;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $proses = Lapor::where('status','proses')->get();
        $selesai = Lapor::where('status','selesai')->get();
        $ditolak = Lapor::where('status','ditolak')->get();
        $verifikasi = Lapor::where('status','verifikasi')->get();
        return view('admin.index',compact('proses','selesai','ditolak','verifikasi'))->with('lapor', Lapor::all())->with('user', User::all());
    }
    public function users(){
        return view('admin.user')->with('user', User::all());
    }
    public function users_view($id){ 
        return view('admin.user_view')->with('user', User::all());
    }
    // public function users_update(Request $request, $id){ 
    //     return view('admin.user')->with('user', User::all());
    // }
}
