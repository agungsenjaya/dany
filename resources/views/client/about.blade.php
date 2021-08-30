@extends('index')
@section('content')
<section class="space-xl">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1 class="title-4 text-center text-uppercase display-6 hero-text">Tentang E-report</h1>
            <br>
            <p class="lead">Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional.</p>
            <div class="text-center">
                <a href="{{ route('lapor.client') }}" class="btn btn-primary">Lapor Sekarang</a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('meta')
<title>E-REPORT | TENTANG KAMI</title>
@endsection