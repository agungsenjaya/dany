@extends('index')
@section('content')
<section class="space-m">
	<div class="container">
  <h1 class="title-4 text-center text-uppercase hero-text">Lapor Kejadian Terbaru</h1>
            <br>
            <div class="row">
              <div class="col-md-6 offset-md-3">
                @foreach($data as $dat)
                <div class="card sh-1 mt-4">
                  <div class="row g-0">
                    <div class="col-md-3">
                      <img src="https://dummyimage.com/600x700" class="card-img-top rounded-top-0" alt="...">
                    </div>
                    <div class="col-md-9 align-self-center">
                <div class="card-body">
                  <div class="mb-4 text-end">
                    <i class="bi bi-check-circle-fill me-2 text-primary"></i>{{ $dat->user->email }}
                  </div>
                <h4 class="card-title">{{ $dat->judul }}</h4>
                <p class="card-text">{{ substr($dat->content, 0, 100) }}..</p>
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    {{ $dat->kategori }}
                  </div>
                  <div>
                    {{ $dat->created_at->diffForHumans() }}
                  </div>
                </div>
              </div>
              </div>
            </div>
            </div>
                @endforeach
            </div>
            </div>
            </div>
</section>
@endsection