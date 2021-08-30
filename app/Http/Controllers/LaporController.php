<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, DB, Session, Str, Auth;

use App\Lapor;
use App\Report;
use App\User;

class LaporController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'content' => 'required',
            // 'foto.*' => 'mimes:jpeg,bmp,png',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            if($request->hasfile('foto'))
            {
                foreach($request->file('foto') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/img/lapor/', $name);  
                    $foto[] = $name;  
                }

                $lng = $request->lng;
                $lat = $request->lat;
                $data = Lapor::create([
                    'user_id' => $request->user_id,
                    'uniq' => $request->user_id . '-' . Str::random(15),
                    'judul' => $request->judul,
                    'content' => $request->content,
                    'date' => $request->date,
                    'tipe' => $request->tipe,
                    'kategori' => $request->kategori,
                    'privacy' => $request->privacy,
                    'lokasi' => json_encode(compact("lng", "lat")),
                    'foto' => json_encode($foto),
                ]);
                if ($data) {
                    Session::flash('success', 'Laporan anda berhasil dikirim,untuk melihat status laporan silahkan cek pada tabel laporan di halaman profil anda, Terima kasih.');
                    return redirect()->back();
                }

            }else{

                $lng = $request->lng;
                $lat = $request->lat;
                $data = Lapor::create([
                    'user_id' => $request->user_id,
                    'uniq' => $request->user_id . '-' . Str::random(15),
                    'judul' => $request->judul,
                    'content' => $request->content,
                    'date' => $request->date,
                    'tipe' => $request->tipe,
                    'kategori' => $request->kategori,
                    'privacy' => $request->privacy,
                    'lokasi' => json_encode(compact("lng", "lat")),
                ]);
                if ($data) {
                    Session::flash('success', 'Laporan anda berhasil dikirim,untuk melihat status laporan silahkan cek pada tabel laporan di halaman profil anda, Terima kasih.');
                    return redirect()->back();
                }

            }
        }
    }
    public function lapor(){
        // $dat = DB::select("SELECT lapors.*, users.email FROM lapors INNER JOIN users ON lapors.user_id = users.id");
        // return view('admin.lapor')->with('lapor', $dat);
        return view('admin.lapor')->with('lapor', Lapor::all());
    }

    public function lapor_view($id){
        $lapor = Lapor::where('uniq', $id)->first();
        return view('admin.lapor_view',compact('lapor'));
    }

    public function lapor_update(Request $request, $id){
        $lapor = Lapor::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('failed', 'Gagal, coba periksa kembali');
            return redirect()->back();
        }else{
            $content;
            if ($request->status == 'verifikasi') {
                $content = 'Laporan anda telah diverifikasi menuggu keputusan proses.';
            }elseif ($request->status == 'proses') {
                $content = 'Laporan anda sedang diproses dan ditindak lanjuti.';
            }elseif ($request->status == 'ditolak') {
                $content = 'Mohon maaf, laporan anda ditolak oleh team kami.';
            }elseif ($request->status == 'selesai') {
                $content = 'Laporan anda telah selesai diproses, terima kasih.';
            }
            $report = Report::create([
                'lapor_id'  => $id,
                'user_id'  => $request->user,
                'status'  => $request->status,
                'content'  => $content,
            ]);
            if ($report) {
                $lapor->status = $request->status;
                $lapor->save();
            }
            Session::flash('success', 'Status laporan berhasil diupdate, terima kasih');
            return redirect()->back();
        }
    }
    public function lapor_client()
    {
        return view('client.lapor');
    }
    public function lapor_client_view($id)
    {
        $lapor = Lapor::where('uniq', $id)->first();
        $report = Report::where('lapor_id', $lapor->id)->get();
        // $report = count($data);
        return view('client.lapor_view', compact('lapor','report'));
    }

    public function lapor_map(){
        return view('admin.lapor_map');
    }
    
}
