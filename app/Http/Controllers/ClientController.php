<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapor;
use App\Report;

class ClientController extends Controller
{
    public function index(){
        return view('client.index');
    }
    public function laporan()
    {
        $data = Lapor::where('privacy', 'public')->get();
        return view('client.laporan',compact('data'));
    }
    public function about()
    {
        return view('client.about');
    }
    public function statistik()
    {
        return view('client.about');
    }
    public function cara() {
        return view('client.cara');
    }
}
