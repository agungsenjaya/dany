@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center min-vh-100 bg-light">
    <div class="container">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title text-white text-uppercase"><i class="bi bi-person-circle h2 me-3 text-white"></i>Form Reset Password</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-10">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
