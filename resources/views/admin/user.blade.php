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
                    Halaman User
                </div>
                <div class="card-title align-self-center">
                <ul class="breadcrumb fw-bold fs-base">
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
										</li>
										<li class="breadcrumb-item text-dark">User</li>
									</ul>
                </div>
            </div>
            <div class="card-body">
            <table id="tableLapor" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead class="title-3">
                        <tr>
                            <td>Id</td>
                            <td>Email</td>
                            <td>Laporan</td>
                            <td>Provinsi</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->reverse() as $use)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $use->email }}</td>
                            <td>{{ counTing(count($use->lapors)) }}</td>
                            <td>{{ $use->provinsi }}</td>
                            <td>
                                <a href="javascript:void(0)" class="badge badge-light-danger text-primary text-uppercase fs-7 me-auto mb-3 px-4 py-3"><i class="bi bi-arrow-up-right-square me-2 text-primary"></i>Details</a>
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
$("#tableLapor").DataTable({
    "language": {
  "lengthMenu": "Show _MENU_",
 },
 "dom":
  "<'row'" +
  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
  ">" +

  "<'table-responsive'tr>" +

  "<'row'" +
  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
  ">"
});
</script>
@endsection