@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center min-vh-100 bg-secondary space-m">
<div class="container">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title text-white text-uppercase"><i class="bi bi-person-circle h2 me-3 text-white"></i>Form Register Website</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-10">
                            <label for="name" class="form-label">{{ __('Nama Lengkap') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10">
                            <label for="telepon" class="form-label">{{ __('Nomor Telepon') }}</label>

                            <div class="">
                                <input id="telepon" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>

                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-10">
                            <label for="provinsi" class="form-label">{{ __('Provinsi Select') }}</label>

                            <div class="">
                                <select name="provinsi" class="form-select" required id="provinsi">
                                    <option value="">-- Select Provinsi --</option>
                                    @foreach($provinsi->provinsi as $prov)
                                    <option value="{{ $prov->nama }}">{{ $prov->nama }}</option>
                                    @endforeach
                                </select>

                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10">
                            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>

                            <div class="">
                                <textarea class="form-control" required name="alamat" id="alamat" cols="30" rows="10"></textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
