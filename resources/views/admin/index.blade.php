@extends('layouts.app')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="card sh-1">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title text-capitalize title-3">
                    Selamat datang {{ Auth::user()->name }}
                </div>
                <div class="card-title">
                    <div class="btn btn-primary btn-sm">
                        {{ date('d, M Y') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="row">
                <div class="col-md">
                    <div class="card p-10 sh-1">
                    <h4 class="title-3">Total Laporan</h4>
                        <h1 class="display-4 text-primary">{{ counTing(count($lapor)) }}</h1>
                        <p class="text-gray-500">Total laporan yang saat ini sedang di proses</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card p-10 sh-1">
                    <h4 class="title-3">Total Users</h4>
                        <h1 class="display-4 text-primary">{{ counTing(count($user)) }}</h1>
                        <p class="text-gray-500">Total user yang telah daftar dalam sistem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
        <div class="">
                <div class="row">
                    <div class="col-md">
                    <div class="card p-6 sh-1">
                        <h4 class="title-3">Laporan Proses</h4>
                        <h1 class="display-4 text-primary">{{ counTing(count($proses)) }}</h1>
                        <p class="text-gray-500">Total laporan yang saat ini sedang di proses</p>
                    </div>
                    </div>
                    <div class="col-md">
                    <div class="card p-6 sh-1">
                        <h4 class="title-3">Laporan Verifikasi</h4>
                        <h1 class="display-4 text-primary">{{ counTing(count($verifikasi)) }}</h1>
                        <p class="text-gray-500">Total keseluruhan laporan yang saat ini dalam sistem</p>
                    </div>
                    </div>
                    <div class="col-md">
                    <div class="card p-6 sh-1">
                        <h4 class="title-3">Laporan Ditolak</h4>
                        <h1 class="display-4 text-primary">{{ counTing(count($ditolak)) }}</h1>
                        <p class="text-gray-500">Total laporan yang ditolak oleh admin</p>
                    </div>
                    </div>
                    <div class="col-md">
                    <div class="card p-6 sh-1">
                        <h4 class="title-3">Laporan Selesai</h4>
                        <h1 class="display-4 text-primary">{{ counTing(count($selesai)) }}</h1>
                        <p class="text-gray-500">Total laporan yang telah terselaikan</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
