@php
$no = 1;
@endphp
@extends('layouts.app')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="card sh-1">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title text-capitalize title-3">
                    Halaman Laporan
                </div>
                <div class="card-title align-self-center">
                <ul class="breadcrumb fw-bold fs-base">
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
										</li>
										<li class="breadcrumb-item text-dark">Laporan</li>
									</ul>
                </div>
            </div>
            <div class="card-body">
            <table id="tableLapor" class="table table-row-bordered gy-5">
                    <thead class="title-3">
                        <tr>
                            <td>Id</td>
                            <td>Judul</td>
                            <td>Pelapor</td>
                            <td>Status</td>
                            <td>Tanggal Lapor</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lapor as $lap)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ substr($lap->judul, 0 , 15) }}..</td>
                            <td>{{ $lap->user->email }}</td>
                            <td>{{ $lap->status }}</td>
                            <td>{{ $lap->created_at->format('d, M Y') }}</td>
                            <td>
                                <a href="{{ route('lapor.show',['id' => $lap -> uniq]) }}" class="badge badge-light-danger text-primary text-uppercase fs-7 me-auto mb-3 px-4 py-3"><i class="bi bi-arrow-up-right-square me-2 text-primary"></i>Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                </div>
</section>
@endsection
@section('css')
<link href="https://preview.keenthemes.com/craft/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
@endsection
@section('js')
<script src="https://preview.keenthemes.com/craft/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
$("#tableLapor").DataTable();
</script>
@endsection