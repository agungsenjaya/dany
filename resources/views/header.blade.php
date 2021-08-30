<div class="py-5 bg-primary-2 text-white">
<div class="container">
  <div class="col-md-8 offset-md-2">
    Pelapor diwajibkan untuk memberikan informasi yang lengkap terkait laporannya, untuk memudahkan kami dalam <b><u>menindak lanjuti laporan</u></b> / kejadian yang anda kirimkan, Terima kasih.
  </div>
</div>
</div>
<header class="p-3 bg-primary text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="{{ asset('img/logo-white.png') }}" alt="" width="180">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 nav-top border-start">
          <li><a href="{{ route('about') }}" class="nav-link text-white">Tentang Kami</a></li>
          <li>
            @guest
            <a href="{{ route('login') }}" class="nav-link text-white">Lapor Kejadian</a>
            @else
            @if(Auth::user()->hasRole('member'))
            <a href="{{ route('lapor.client') }}" class="nav-link text-white">Lapor Kejadian</a>
            @endif
            @endguest
          </li>
          <li><a href="{{ route('laporan') }}" class="nav-link text-white">Laporan Terbaru</a></li>
          <li><a href="javascript:void(0)" class="nav-link text-white">Statistik</a></li>
          <li><a href="{{ route('cara') }}" class="nav-link text-white">Cara lapor</a></li>
        </ul>

        <div class="text-end">
          @guest
          <a href="{{ route('login') }}" class="btn btn-primary-2 btn-sm"><i class="bi bi-person-circle text-white me-2"></i>LOGIN / REG</a>
          @else
          @if(Auth::user()->hasRole('member'))
          <a href="{{ route('home') }}" class="btn btn-primary-2 btn-sm"><i class="bi bi-person-circle text-white me-2"></i>Account</a>
          @else
          <a href="{{ route('dashboard') }}" class="btn btn-primary-2 btn-sm"><i class="bi bi-person-circle text-white me-2"></i>Dashboard</a>
          @endif
          @endguest
        </div>
      </div>
    </div>
  </header>