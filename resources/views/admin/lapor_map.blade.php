@extends('layouts.app')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="card sh-1">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title text-capitalize title-3">
                    Halaman Map laporan
                </div>
                <div class="card-title align-self-center">
                <ul class="breadcrumb fw-bold fs-base">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Map laporan</li>
                </ul>
                </div>
            </div>
            <div class="card-body">
            <div class="map vh-100 bg-light rounded" id="map"></div>
                </div>
                </div>
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
  <script src="//unpkg.com/leaflet-gesture-handling"></script>
  <script>

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

var primary = new L.marker([-6.921205, 106.926501]).addTo(map);

$.ajax({
  type: "GET",
  url: "http://localhost:8000/api/lapors",
  dataType: "JSON",
  success: function (response) {
    console.log('REQUEST API LOKASI');
  }}).done(function(response) {
    var second;
    $.each(response, function (index, value) { 
      var lokasi = JSON.parse(value.lokasi);
      second = new L.marker([lokasi.lat,lokasi.lng]).on('click', getLoc).addTo(map);
      // console.log(lokasi.lng);
    });
  });

  function getLoc(e) {
    // map.removeLayer(marker);

    var routeControl = L.Routing.control({
      waypoints: [L.latLng(e.latlng.lat, e.latlng.lng), L.latLng(-6.921205, 106.926501), ],
      lineOptions: {addWaypoints: false},
    }).addTo(map);

    // routeControl.spliceWaypoints(0, 2);
    // routeControl.on('routesfound', function (e) {
    //   var routes = e.routes;
    //   var summary = routes[0].summary;
    //     $('.jarak').text(Math.round(summary.totalDistance / 1000) + ' Km');
    //     $('.waktu').text(Math.round(summary.totalTime % 3600 / 60) + ' Menit');
    // });

  }

  </script>
@endsection