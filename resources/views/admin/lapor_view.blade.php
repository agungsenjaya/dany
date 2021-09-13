@php
$omn = json_decode($lapor->lokasi);
$uri = "https://maps.googleapis.com/maps/api/geocode/json?latlng=". $omn->lat .",". $omn->lng ."&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s&sensor=true/false";
$open = "https://www.google.co.id/maps/dir/". $omn->lat .',' . $omn->lng;
@endphp
@extends('layouts.app')
@section('content')
<div
    id="kt_drawer_example_basic"

    class="bg-white"
    data-kt-drawer="true"
    data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_example_basic_button"
    data-kt-drawer-close="#kt_drawer_example_basic_close"
    data-kt-drawer-width="400px"
>
<div class="p-10">
    <h4 class="title-3">Detail Pelapor</h4>
    <br>
    <table class="table table-row-dashed table-row-gray-300">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $lapor->user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $lapor->user->email }}</td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td>{{ $lapor->user->telepon }}</td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{ $lapor->user->provinsi }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $lapor->user->alamat }}</td>
        </tr>
    </table>
    <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="kt_drawer_example_basic_close">Close Detail</a>
</div>
</div>
<section class="space-m">
    <div class="container">
        <div class="card sh-1">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title text-capitalize title-3">
                    Laporan View
                </div>
                <div class="card-title align-self-center">
                <ul class="breadcrumb fw-bold fs-base">
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
										</li>
										<li class="breadcrumb-item text-muted">
											<a href="{{ route('lapor.index') }}" class="text-muted text-hover-primary">Laporan</a>
										</li>
										<li class="breadcrumb-item text-dark">View</li>
									</ul>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="map h-100 bg-light rounded" id="map"></div>
                        </div>
                        <div class="col-md-6">
                        @include('alert')
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
                        <td>Pelapor</td>
                        <td>:</td>
                        <td><a class="badge badge-light-danger  text-uppercase fs-7 title-1" href="javascript:void(0)" id="kt_drawer_example_basic_button"><i class="bi bi-arrow-up-right-square me-2 text-primary"></i>Detail Pelapor</a></td>
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
                            <div class="badge badge-light-danger  text-uppercase fs-7 title-1">
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
                        </div>
                        <div class="col-md-6">
                            <br>
                            <br>
                            <h4 class="title-3">Detail Address</h4>
                            <br>
                            <table class="table table-row-dashed table-row-gray-300">
                                <tr>
                                    <td>Jarak</td>
                                    <td>:</td>
                                    <td><span class="jarak">-</span></td>
                                </tr>
                                <tr>
                                    <td>Estimasi</td>
                                    <td>:</td>
                                    <td><span class="waktu">-</span></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><span class="lokasi">-</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <br>
                            <h4 class="title-3">Deskripsi Laporan</h4>
                            <br>
                            <p>{{ $lapor->content }}</p>
                        </div>
                        <div class="col-md">
                        @if($lapor->foto)
						@php
						$foto = json_decode($lapor->foto);
						@endphp
                        <h3 class="title-3">Lampiran Foto</h3>
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
                    <a href="javascript:void(0)" class="btn btn-light btn-sm me-3 open">Open Map</a>
                    @if($lapor->status == 'dibatalkan')
                    @else
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate">Update laporan</a>
                    @endif
                </div>
                </div>
                </div>
</section>
<div class="modal fade" tabindex="-1" id="modalUpdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title title-4">Notifications</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="{{ route('lapor.update', ['id' => $lapor -> id]) }}" method="POST">
            <div class="modal-body">
                    @csrf
                    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                    <label for="" class="form-label">Status Laporan</label>
                    <select name="status" id="" class="form-select" required>
                        <option value="">-- Select Options --</option>
                        <option value="verifikasi">verifikasi</option>
                        <option value="proses">proses</option>
                        <option value="ditolak">ditolak</option>
                        <option value="selesai">selesai</option>
                    </select>
            </div>
            <!-- <div class="mb-3">
                <label for="" class="form-label">Keterangan Status (optional)</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Masukan keterangan"></textarea>
            </div> -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Laporan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css"/>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.mapbox.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.css" />
   <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
   <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css"
        type="text/css">
   <style>
     .leaflet-control-locate a {
       padding: 0;
     }
     .leaflet-routing-container {
    display: none !important;
     }
   </style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
   <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="//unpkg.com/leaflet-gesture-handling"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    var alamat;
var map = L.map('map', {
	center: [0.7893, 113.9213],
	zoom: 5,
  gestureHandling: true
});
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWd1bmdzZW5qYXlhIiwiYSI6ImNqbGVnMjhtYTBpOXEza3F6NzI4M2RmbHAifQ.1WV_fgbmd1eMI4C444BDqQ', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	maxZoom: 18,
	id: 'mapbox/streets-v11',
	tileSize: 512,
	zoomOffset: -1,
	accessToken: 'pk.eyJ1IjoiYWd1bmdzZW5qYXlhIiwiYSI6ImNqbGVnMjhtYTBpOXEza3F6NzI4M2RmbHAifQ.1WV_fgbmd1eMI4C444BDqQ'
}).addTo(map);

function getAddress(e,w){
  var uri = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${e}, ${w}&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s&sensor=true/false`;
  $.getJSON(uri, function (data, textStatus, jqXHR) {
    alamat = data.results[0].formatted_address;
      console.log(alamat);
      $('.lokasi').text(alamat);
    });
};

var LeafIcon = L.Icon.extend({
  options: {
    iconSize:     [38, 48],
    iconAnchor:   [22, 60],
    popupAnchor:  [-3, -56]
  }
});

var client = new LeafIcon({
  iconUrl: "{{ asset('img/client.png') }}",
});

var master = new LeafIcon({
  iconUrl: "{{ asset('img/master.png') }}",
});

var routeControl = L.Routing.control({
	waypoints: [L.latLng('<?php echo $omn->lat ?>', '<?php echo $omn->lng ?>',{icon : client}), L.latLng(-6.921205, 106.926501,{icon : master}), ],
}).addTo(map);
routeControl.on('routesfound', function (e) {
	var routes = e.routes;
	var summary = routes[0].summary;
    $('.jarak').text(Math.round(summary.totalDistance / 1000) + ' Km');
    $('.waktu').text(Math.round(summary.totalTime % 3600 / 60) + ' Menit');
});

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

  function bros(t){
    t = Math.round(t / 30) * 30;
    if (t > 86400) {
        return Math.round(t / 3600) + ' ' + un.hours;
    } else if (t > 3600) {
        return Math.floor(t / 3600) + ' ' + un.hours + ' ' +
            Math.round((t % 3600) / 60) + ' ' + un.minutes;
    } else if (t > 300) {
        return Math.round(t / 60) + ' ' + un.minutes;
    } else if (t > 60) {
        return Math.floor(t / 60) + ' ' + un.minutes +
            (t % 60 !== 0 ? ' ' + (t % 60) + ' ' + un.seconds : '');
    } else {
        return t + ' ' + un.seconds;
    }
  }


</script>
    @endsection