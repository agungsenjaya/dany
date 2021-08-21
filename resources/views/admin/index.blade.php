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
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <h4 class="title-3">Total Laporan</h4>
                        <h1 class="display-4 text-primary">000</h1>
                        <p class="text-gray-500">Total keseluruhan laporan yang saat ini dalam sistem</p>
                    </div>
                    <div class="col-md border-start">
                    <div class="ps-3">
                        <h4 class="title-3">Laporan Active</h4>
                        <h1 class="display-4 text-primary">000</h1>
                        <p class="text-gray-500">Total laporan yang saat ini sedang di proses</p>
                    </div>
                    </div>
                    <div class="col-md border-start">
                    <div class="ps-3">
                        <h4 class="title-3">Laporan Selesai</h4>
                        <h1 class="display-4 text-primary">000</h1>
                        <p class="text-gray-500">Total laporan yang telah terselaikan</p>
                    </div>
                    </div>
                    <div class="col-md border-start">
                    <div class="ps-3">
                        <h4 class="title-3">Total Users</h4>
                        <h1 class="display-4 text-primary">000</h1>
                        <p class="text-gray-500">Total pendaftar yang saat ini masuk dalam sistem</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
