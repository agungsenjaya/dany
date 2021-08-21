@php
$no = 1;
@endphp
@extends('index')
@section('content')
@include('alert')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
--}}
{{--<a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>--}}
<section class="space-m">
    <div class="container">
	<ul class="breadcrumb fw-bold fs-base mb-4">
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('index') }}" class="text-muted text-hover-primary">Home</a>
										</li>
										<li class="breadcrumb-item text-dark">Account</li>
									</ul>
        <div class="row">
            <div class="col-md-5">
            <div class="card sh-1 mb-5 mb-xl-10" id="kt_account_settings_overview" data-kt-scroll-offset="{default: 100, md: 125}">
											<!--begin::Card header-->
											<div class="card-header cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_overview" aria-expanded="true">
												<div class="card-title">
													<h3 class="title-4 m-0">Details Account</h3>
												</div>
											</div>
											<!--end::Card header-->
											<!--begin::Content-->
											<div id="kt_account_overview" class="collapse show" style="">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
													<div class="d-flex align-items-start flex-wrap">
														<div class="d-flex flex-wrap">
															<!--begin::Avatar-->
															<div class="symbol symbol-125px mb-7 me-7 position-relative">
																<img src="https://preview.keenthemes.com/craft/assets/media/avatars/blank.png" alt="image">
															</div>
															<!--end::Avatar-->
															<!--begin::Profile-->
															<div class="d-flex flex-column">
																<div class="fs-2 title-4 mb-1 text-capitalize">{{ Auth::user()->name }}</div>
																<a href="javascript:void(0)" class="text-gray-400 text-hover-primary fs-6 fw-bold mb-5">{{ Auth::user()->email }}</a>
																<a href="javascript:void(0)" class="badge badge-light-danger text-primary text-uppercase fs-7 me-auto mb-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#modalOut"><i class="bi bi-slash-circle me-2 text-primary"></i>Keluar</a>
															</div>
															<!--end::Profile-->
														</div>
														<!-- <a href="/craft/pages/profile/projects.html" class="btn btn-primary ms-auto mb-7">Projects (3)</a> -->
													</div>
													<!--begin::Row-->
													
													<!--end::Row-->
													<!--begin::Notice-->
													<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed rounded p-6">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
														<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                            <i class="bi bi-envelope-open-fill h1"></i>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack flex-grow-1">
															<!--begin::Content-->
															<div class="fw-bold">
																<h4 class="text-gray-800 fw-bolder">Email belum diverifikasi</h4>
																<div class="fs-6 text-gray-600">Ayo verifikasi akunmu, agar sistem e-report bisa mengirim notifikasi email, <a href="javascript:void(0)"><u>kirim verifikasi email.</u></a></div>
															</div>
															<!--end::Content-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Notice-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Content-->
										</div>
            </div>
            <div class="col-md-7">
                <div class="card sh-1">
                <div class="card-header w-100 d-flex justify-content-between">
												<div class="card-title">
													<div>
														<h3 class="title-4 m-0">Laporan Anda</h3>
													</div>
												</div>
													<div class="card-title">
														<a href="{{ route('lapor.client') }}" class="btn btn-primary btn-sm">Buat laporan</a>
													</div>
											</div>
                    <div class="card-body">
                    <table id="tableLapor" class="table table-row-bordered gy-5">
    <thead class="title-3">
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
		@foreach($lapor as $lap)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ substr($lap->judul, 0 , 15) }}..</td>
            <td>
				<div class="badge badge-light-danger text-primary text-uppercase fs-7">
				{{ $lap->status }}
				</div>
				</td>
            <td>
			<a href="{{ route('lapor.client.view',['id' => $lap -> uniq]) }}" class="badge badge-light-danger text-primary text-uppercase fs-7 me-auto mb-3 px-4 py-3"><i class="bi bi-arrow-up-right-square me-2 text-primary"></i>Details</a>
			</td>
        </tr>
		@endforeach
    </tbody>
</table>

                    </div>
                </div>
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
@section('meta')
<title>E-REPORT | ACCOUNT</title>
@endsection