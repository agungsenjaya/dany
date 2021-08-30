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
    public function lapor_can(Request $request, $id){
        $data = Lapor::find($id);
        $data->status = 'dibatalkan';
        $data->save();

        if ($data) {
            $report = Report::create([
                'status' => 'dibatalkan',
                'lapor_id' => $id,
                'user_id' => $request->user,
                'content' => 'User telah membatalkan laporan',
            ]);
            if ($report) {
                Session::flash('success', 'Laporan anda berhasil di batalkan pada tanggal ' . date('d, M Y '));
                return redirect()->back();
            }
        }
        // $data->delete();
        // if ($data) {
        //     return redirect()->route('home');
        // }
    }
}
