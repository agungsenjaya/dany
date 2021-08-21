<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.index');
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
