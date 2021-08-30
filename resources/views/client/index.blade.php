@extends('index')
@section('content')
<section id="takeover" class="p-takeover--grad">
	<div class="container">
		<div class="text-center">
			<h1 class="text-uppercase title-3 display-6 hero-text">E-Report layanan masyarakat</h1>
			<p class="lead">Sampaikan laporan Anda langsung kepada instansi yang berwenang</p>
			<div class="d-flex justify-content-center pt-3">
				<div class="hr-white"></div>
			</div>
		</div>
	</div>
</section>
<section class="position-relative pb-10" style="margin-top:-100px">
	<div class="container">
    <form method="post" action="{{ route('lapor.store') }}" enctype="multipart/form-data">
    @csrf
		<div class="col-md-8 offset-md-2">
      <div class="position-relative">
			<div class="card sh-1 rounded-0">
				<div class="card-body">
          @guest
          @else
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          @endguest
          <input type="hidden" name="lat">
          <input type="hidden" name="lng">
          <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events">
      <div class="swiper-wrapper">
        <div class="swiper-slide p-1">
      @include('alert')
      @if($errors->any())
          {!! implode('', $errors->all('<div>:message</div>')) !!}
      @endif
					<div class="p-4 bg-primary mb-3">
						<h4 class="title-4 text-white m-0 text-capitalize">Sampaikan laporan anda</h4>
					</div>
						<div class="mb-3">
              <label for="" class="form-label">Tipe Laporan *</label>
              <div class="alert-danger px-5 py-3 border border-primary">
              <div class="row">
              <div class="col-md">
              <div class="form-check" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Tipe laporan seputar pengaduan.">
              <input class="form-check-input" type="radio" name="tipe" id="flexRadioDefault1" value="Pengaduan">
              <label class="form-check-label title-2 sp-1 text-uppercase" for="flexRadioDefault1">
                Pengaduan
              </label>
            </div>
            </div>
              <div class="col-md border-start border-primary">
              <div class="form-check" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Tipe laporan seputar aspirasi dan masukan.">
              <input class="form-check-input" type="radio" name="tipe" id="flexRadioDefault2"value="Aspirasi">
              <label class="form-check-label title-2 sp-1 text-uppercase" for="flexRadioDefault2">
                Aspirasi
              </label>
            </div>
            </div>
            
            </div>
            </div>
            </div>
						<div class="mb-3">
							<input type="text" class="form-control" placeholder="Masukan judul laporan *" name="judul" required>
						</div>
						<div class="mb-3">
							<textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Masukan isi laporan *" required></textarea>
						</div>
						<div class="mb-3 input-group">
							<input name="date" class="form-control" id="date" placeholder="Masukan tanggal laporan *" required> <span class="input-group-text"><i class="bi bi-calendar"></i></span>
						</div>
						<div class="mb-4">
							<select name="kategori" id="" class="form-select" required>
								<option value="">Pilih kategori laporan Anda *</option>
								<option value="keamanan">Keamanan</option>
								<option value="kecelakaan">Kecelakaan</option>
							</select>
						</div>
            <div class="accordion mb-4">
							<div class="accordion-item">
                  <button class="accordion-button d-none fs-4 fw-bold a-1" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1">
                      Show FIle
                  </button>
              <div id="kt_accordion_1_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
            <div class="">
              <input type="file" class="form-control"  accept=".JPG, .JPEG, .PNG" name="foto[]" multiple="multiple">
              </div>
        </div>
							</div>
						</div>
						<div class="">
							<div class="row">
								<div class="col-md"> <a href="javascript:void(0)" class="text-dark d-inline-flex title-3" id="a-1"><i class="bi bi-paperclip h1 me-2 text-primary"></i>Lampirkan Foto</a>
								</div>
								<div class="col-md text-end">
                  <div class="d-flex">
                      <div class="align-self-center">
                      <div class="form-check me-3" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Laporan anda akan di bagikan dihalaman laporan terkini.">
                      <input class="form-check-input" type="radio" name="privacy" id="flexRadioDefault4" value="public">
                      <label class="form-check-label title-2 sp-1 text-uppercase" for="flexRadioDefault4">
                        Tampilkan
                      </label>
                    </div>
                      </div>
                      <div class="align-self-center">
                      <div class="form-check me-3" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Laporan anda bersifat private atau rahasia.">
                      <input class="form-check-input" type="radio" name="privacy" id="flexRadioDefault5" value="private">
                      <label class="form-check-label title-2 sp-1 text-uppercase" for="flexRadioDefault5">
                        Rahasia
                      </label>
                    </div>
                      </div>
                      <div>
                      <button type="button" class="btn btn-primary go-next">Selanjutnya</button>
                    </div>
                  </div>
								</div>
							</div>
						</div>
          </div>
          <div class="swiper-slide p-1">
          <div class="p-4 bg-primary mb-3">
						<h4 class="title-4 text-white m-0 text-capitalize">Tentukan lokasi laporan anda</h4>
					</div>
            <div class="map-container">
            <div class="map-marker-centered"></div>
              <div id="map" class="rounded"></div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
              <div>
                <button type="button" class="btn btn-secondary go-prev">Kembali</button>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Lapor!</button>
              </div>
            </div>
            </div>
      </div>
    </div>
				</div>
			</div>
      @guest
      <div class="position-absolute" style="top:0;bottom:0;right:0;left:0;z-index:1">
        <div class="bg-before h-100 d-flex align-items-center">
          <div class="p-4 text-center w-100">
            <h1 class="title-4">Buat laporan anda</h1>
            <p class="">Untuk melakukan laporan silahkan login <br> atau register akun lapor anda, Terima kasih.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Login akun</a>
            <a href="{{ route('register') }}" class="btn btn-primary ms-2">Daftar Akun</a>
          </div>
        </div>
      </div>
      @else
      @endguest
			</div>
      


		</div>
    </form>
	</div>
</section>
<section class="space-m">
  <div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="hori-timeline" dir="ltr">
                    <ul class="list-inline events">
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date text-primary">
                                  <div class="card rounded-0">
                                    <i class="text-primary bi bi-pencil-square h1"></i>
                                  </div>
                                </div>
                                <h5 class="title-3">Tulis Laporan</h5>
                                <p class="text-muted">Laporkan keluhan atau aspirasi anda dengan jelas lengkap dan benar adanya</p>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                            <div class="event-date text-primary">
                                  <div class="card rounded-0">
                                    <i class="text-primary bi bi-arrow-up-right-circle h1"></i>
                                  </div>
                                </div>
                                <h5 class="title-3">Proses Verifikasi</h5>
                                <p class="text-muted">Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan instansi berwenang</p>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                            <div class="event-date text-primary">
                                  <div class="card rounded-0">
                                    <i class="text-primary bi bi-chat-left-dots h1"></i>
                                  </div>
                                </div>
                                <h5 class="title-3">Proses Tindak Lanjut</h5>
                                <p class="text-muted">Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                            <div class="event-date text-primary">
                                  <div class="card rounded-0">
                                    <i class="text-primary bi bi-check2-all h1"></i>
                                  </div>
                                </div>
                                <h5 class="title-3">Selesai</h5>
                                <p class="text-muted">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan oleh pihak yang berwenang</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<div class="text-center">
  <a href="{{ route('about') }}" class="btn text-primary border-primary border">Pelajari lebih lanjut</a>
</div>
  </div>
</section>
<section class="space-xl bg-primary-2 text-white">
  <div class="container text-center">
    <h1 class="title-3 text-uppercase sp-1">Jumlah laporan Sekarang</h1>
      <br>
    <h2 class="title-3 display-3">
      656,732
    </h2>
    <br>
    <p class="text-white">* jumlah laporan berdasarkan data yang masuk melalui sistem e-report kami<br>perubahan data akan berganti secara berkala</p>
  </div>
</section>
@endsection
@section('css')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
   <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="//unpkg.com/leaflet-gesture-handling"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
  $("#date").flatpickr({});
// var textWrapper = document.querySelector('.hero-text');
// textWrapper.innerHTML = textWrapper.textContent.replace(/S/g, "<span class='letter'>$&</span>");
// anime.timeline({
// 	loop: true
// }).add({
// 	targets: '.hero-text .letter',
// 	scale: [4, 1],
// 	opacity: [0, 1],
// 	translateZ: 0,
// 	easing: "easeOutExpo",
// 	duration: 950,
// 	delay: (el, i) => 70 * i
// }).add({
// 	targets: '.hero-text',
// 	opacity: 0,
// 	duration: 1000,
// 	easing: "easeOutExpo",
// 	delay: 1000
// });

$('#a-1').on('click', function () {
	$('.a-1').trigger('click');
});


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
var lc = L.control.locate({
	flyTo: true,
	keepCurrentZoomLevel: false,
}).addTo(map);
lc.start();

function getAddress(e,w){
  var uri = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${e}, ${w}&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s&sensor=true/false`;
  $.getJSON(uri, function (data, textStatus, jqXHR) {
    alamat = data.results[0].formatted_address;
      console.log(alamat);
      $('.lokasi').text(alamat);
    });
};
map.on('moveend', function() {
    let lats = map.getCenter().lat;
    let lngs = map.getCenter().lng;
    $('input[name=lat]').val(lats);
    $('input[name=lng]').val(lngs);
    // getAddress(lats,lngs);
});

// if (navigator.geolocation) {
// 	console.log('Geolocation is supported!');
// } else {
// 	console.log('Geolocation is not supported for this Browser/OS.');
// }
// window.onload = function () {
// 	var startPos;
// 	var geoSuccess = function (position) {
// 		startPos = position;
// 		lat = startPos.coords.latitude;
// 		lon = startPos.coords.longitude;
// 	};
// 	var geoError = function (error) {
// 		console.log('Error occurred. Error code: ' + error.code);
// 	};
// 	navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
// };
// var routeControl = L.Routing.control({
// 	waypoints: [L.latLng(-6.9320601, 106.9322522), L.latLng(-6.921205, 106.926501), ],
// }).addTo(map);
// routeControl.on('routesfound', function (e) {
// 	var routes = e.routes;
// 	var summary = routes[0].summary;
// 	alert('Total distance is ' + summary.totalDistance / 1000 + ' km and total time is ' + Math.round(summary.totalTime % 3600 / 60) + ' minutes');
// });

var swiper = new Swiper(".mySwiper", {
        noSwiping: true,
        slidesPerView: 1,
        // speed: 1,
        navigation: {
          nextEl: ".go-next",
          prevEl: ".go-prev",
        },
        allowTouchMove: false
      });
</script>
@endsection
@section('meta')
<title>E-REPORT | SAMPAIKAN LAPORAN ANDA</title>
@endsection