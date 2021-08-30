@extends('index')
@section('content')
<section class="space-m">
    <div class="container">
    <ul class="breadcrumb fw-bold fs-base mb-4">
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('index') }}" class="text-muted text-hover-primary">Home</a>
										</li>
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('home') }}" class="text-muted text-hover-primary">Account</a>
										</li>
										<li class="breadcrumb-item text-dark">Default</li>
									</ul>
        <div class="row">
            <div class="col-md-4">

            <div class="card card-xl-stretch mb-5 mb-xl-8 sh-1">
											<!--begin::Header-->
											<div class="card-header align-items-center mt-5">
												<h3 class="card-title title-3 align-items-start flex-column">
													<span class="title-4">Histori laporan</span>
													<span class="text-gray-400 mt-2 fw-bold fs-6">Status laporan anda</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<div class="position-relative">
													<!--begin::Border-->
													<div class="w-35px d-flex justify-content-center">
														<div class="border-start border-dashed border-gray-300 top-0 bottom-0 mb-5 mt-5 position-absolute"></div>
													</div>
													<!--end::Border-->
													<!--begin::Item-->
													<div class="d-flex flex-stack pb-10">
														<!--begin::Section-->
														<div class="d-flex">
															<!--begin::Symbol-->
															<div class="symbol symbol-35px me-5 mt-2">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="bi bi-check2-all h1 text-primary"></i>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="pe-3 ">
																<p class="fs-5 mb-0">Laporan terkirim</p>
																<div class="mt-1 text-gray-500">
																	{{ $lapor->created_at }} - Laporan anda berhasil terkirim menunggu verifikasi.
                                                                </div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
													</div>
													@if($report)
													@foreach($report as $rep)
													<div class="d-flex flex-stack pb-10">
														<!--begin::Section-->
														<div class="d-flex">
															<!--begin::Symbol-->
															<div class="symbol symbol-35px me-5 mt-2">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="bi bi-check2-all h1 text-primary"></i>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="pe-3 ">
																<p class="fs-5 mb-0">Laporan {{ $rep->status }}</p>
																<div class="mt-1 text-gray-500">
																	@if($rep->status)
                                                                    {{ $rep->created_at }} - {{ $rep->content }}
																	@endif
                                                                </div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
													</div>
													@endforeach
													@endif
													{{-- @if(count($report))
													@if($report[0]->status == 'ditolak')
													<div class="d-flex flex-stack pb-10">
														<!--begin::Section-->
														<div class="d-flex">
															<!--begin::Symbol-->
															<div class="symbol symbol-35px me-5 mt-2">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="bi bi-check2-all h1 text-primary"></i>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="pe-3 ">
																<p class="fs-5 mb-0">Laporan ditolak</p>
																<div class="mt-1 text-gray-500">
                                                                    Mohon maaf, laporan anda ditolak oleh team kami.
                                                                </div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
													</div>
													@else
													@if(count($report) == 1)
													<div class="d-flex flex-stack pb-10">
														<!--begin::Section-->
														<div class="d-flex">
															<!--begin::Symbol-->
															<div class="symbol symbol-35px me-5 mt-2">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="bi bi-check2-all h1 text-primary"></i>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="pe-3 ">
																<p class="fs-5 mb-0">Laporan diverifikasi</p>
																<div class="mt-1 text-gray-500">
                                                                    Laporan anda telah diverifikasi menuggu keputusan proses.
                                                                </div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
													</div>
													@elseif(count($report) == 2)
													<div class="d-flex flex-stack pb-10">
														<!--begin::Section-->
														<div class="d-flex">
															<!--begin::Symbol-->
															<div class="symbol symbol-35px me-5 mt-2">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="bi bi-check2-all h1 text-primary"></i>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="pe-3 ">
																<p class="fs-5 mb-0">Laporan diproses</p>
																<div class="mt-1 text-gray-500">
                                                                    Laporan anda sedang diproses dan ditindak lanjuti.
                                                                </div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
													</div>
													@elseif(count($report) == 2)
													<div class="d-flex flex-stack pb-10">
														<!--begin::Section-->
														<div class="d-flex">
															<!--begin::Symbol-->
															<div class="symbol symbol-35px me-5 mt-2">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="bi bi-check2-all h1 text-primary"></i>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="pe-3 ">
																<p class="fs-5 mb-0">Laporan selesai</p>
																<div class="mt-1 text-gray-500">
                                                                    Laporan anda telah selesai diproses, terima kasih.
                                                                </div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
													</div>
													@endif
													@endif
													@endif --}}

													<!--end::Item-->
												</div>
											</div>
											<!--end::Body-->
										</div>
                
            </div>
            <div class="col-md-8">
			@include('alert')
            <div class="card sh-1">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                    <h3 class="title-4 m-0">Detail laporan</h3>
                    </div>
                    <div class="card-title">
						<a href="javascript:void(0)" class="btn btn-primary btn-sm">Edit laporan</a>
                    </div>
            </div>
            <div class="card-body">
                <table class="table table-row-dashed table-row-gray-300 border-bottom">
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>{{ $lapor->judul }}</td>
                    </tr>
                    <tr>
                        <td>Tipe Laporan</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ $lapor->tipe }}</td>
                    </tr>
                    <tr>
                        <td>Kategori Laporan</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ $lapor->kategori }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Kejadian</td>
                        <td>:</td>
                        <td>{{ $lapor->date->format('d, M Y') }}</td>
                    </tr>
                    <tr>
                        <td>Status Laporan</td>
                        <td>:</td>
                        <td>
                            <div class="badge badge-light-primary  text-uppercase fs-7 title-1">
                                {{ $lapor->status }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Privacy</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ $lapor->privacy }}</td>
                    </tr>
                </table>
                <br>
                <div class="row">
                <div class="col-md-6">
                        <h3 class="title-4">Detail lokasi</h3>
                        <br>
                        <p class="lokasi ">
                            <?php
                            $omn = json_decode($lapor->lokasi);
                            $uri = "https://maps.googleapis.com/maps/api/geocode/json?latlng=". $omn->lat .",". $omn->lng ."&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s&sensor=true/false";
                            $open = "https://www.google.co.id/maps/dir/". $omn->lat .',' . $omn->lng;
                            ?>
                        </p>
                    </div>
                    <div class="col-md-6 ">
                        <h3 class="title-4">Deskripsi laporan</h3>
                        <br>
                        <p class="">{{ substr($lapor->content, 0, 150) }}</p>
                    </div>
                    <div class="col-md ">
						@if($lapor->foto)
						@php
						$foto = json_decode($lapor->foto);
						@endphp
                        <h3 class="title-4">Lampiran Foto</h3>
                        <br>
						<div class="row" id="gallery">
							@foreach($foto as $fot)
							<div class="col-md-3 mb-3">
								<a data-fancybox="gal" href="{{ asset('img/lapor') . '/' . $fot }}">
									{{--<img src="{{ asset('img/lapor') . '/' . $fot }}" alt="" width="100%">--}}
									<div class="bg-light">
										<div class="rounded border-danger border border-dashed" style="height:150px;width:100%;background:url('{{ asset('img/lapor') . '/' . $fot }}');background-size:cover;background-position:center"></div>
									</div>
								</a>
							</div>
							@endforeach
						</div>
						@endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
            <a class="btn btn-primary btn-sm me-3 open">open map</a>
            @if($lapor->status == 'lapor')
            <a href="javascript:void(0)" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCan">Batalkan laporan</a>
            @endif
            </div>
            </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" id="modalCan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title title-4">Notifications</h3>

                <!--begin::Close-->
                <div class="h1" data-bs-dismiss="modal" aria-label="Close">
                    <span class="bi bi-x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <p>Apakah anda akan membatalkan laporan <span class="title-3">{{ $lapor->judul }}</span> ? laporan yang telah di cancel tidak bisa di kembalikan.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <!-- <a href="{{ route('lapor.cancel',['id' => $lapor -> id ]) }}" class="btn btn-primary">Ya, batalkan</a> -->
				<form action="{{ route('lapor.cancel',['id' => $lapor -> id]) }}" method="POST">
					@csrf
					<input type="hidden" name="user" value="{{ Auth::user()->id }}">
					<button type="submit" class="btn btn-primary">Ya, batalkan</button>
				</form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
    var uri = '<?php echo $uri; ?>';
    var open = '<?php echo $open; ?>';
    console.log(uri);
    $.getJSON(uri, function (data, textStatus, jqXHR) {
        alamat = data.results[0].formatted_address;
        console.log(alamat);
        $('.lokasi').text(alamat);
        $('.open').attr({
            href: open,
            target: '_blank',
        });
    });

	Fancybox.bind("#gallery a", {
    on : {
      ready : (fancybox) => {
        console.log(`fancybox #${fancybox.id} is ready!`);
      }
    }
  });
</script>
@endsection
@section('meta')
<title>E-REPORT | DETAIL LAPORAN</title>
@endsection