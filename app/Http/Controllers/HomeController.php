<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapor;
use App\Report;
use Auth, Session;;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lapor = Lapor::where('user_id', Auth::user()->id)->get();
        return view('home')->with('lapor',$lapor);
    }
    public function lapor_can($id){
        $data = Lapor::find($id);
        $data->delete();
        if ($data) {
            return redirect()->route('home');
        }
    }
}
