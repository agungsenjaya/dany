<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>E-REPORT | Sampaikan Laporan Anda.</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://preview.keenthemes.com/craft/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="https://preview.keenthemes.com/craft/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"/>
        @yield('css')
</head>
<body>
    @include('modal')
    <div id="app">
        <div class="">
            <div class="row g-0">
                @guest
                @else
                <div class="col-md-3 min-vh-100 card sh-1">
                    <div class="aside aside-default">

                    <div class="aside-logo flex-column-auto pt-9 pb-5" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="{{ route('dashboard') }}">
							<img alt="Logo" src="{{ asset('img/logo.png') }}" class="max-h-50px logo-default" width="150">
							<img alt="Logo" src="{{ asset('img/logo.png') }}" class="max-h-50px logo-minimize" width="150">
						</a>
						<!--end::Logo-->
					</div>

                    <div class="list-group list-group-flush list-admin">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action clearfix">
                        Dashboard
                        <div class="bi bi-chevron-compact-right float-end"></div>
                    </a>
                    <a href="{{ route('lapor.index') }}" class="list-group-item list-group-item-action clearfix">
                        Tabel laporan
                        <div class="bi bi-chevron-compact-right float-end"></div>
                    </a>
                    <a href="{{ route('lapor.map') }}" class="list-group-item list-group-item-action clearfix">
                        Map laporan
                        <div class="bi bi-chevron-compact-right float-end"></div>
                    </a>
                    <a href="{{ route('users') }}" class="list-group-item list-group-item-action clearfix">
                        Users
                        <div class="bi bi-chevron-compact-right float-end"></div>
                    </a>
                    <a href="{{ route('index') }}" target="_blank" class="list-group-item list-group-item-action clearfix">
                        Preview web
                        <div class="bi bi-chevron-compact-right float-end"></div>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action clearfix" data-bs-toggle="modal" data-bs-target="#modalOut">
                        Keluar
                        <div class="bi bi-chevron-compact-right float-end"></div>
                    </a>
                    </div>

                    <!-- <div class="menu-item">
									<a class="menu-link" href="/craft/layout-builder.html">
										<span class="menu-icon">
                                            <i class="bi bi-bootstrap-fill"></i>
										</span>
										<span class="menu-title title-2">Dashboard</span>
									</a>
								</div> -->
                        
                    </div>
                </div>
                @endguest
                <div class="col-md">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://preview.keenthemes.com/craft/assets/plugins/global/plugins.bundle.js"></script>
    <script src="https://preview.keenthemes.com/craft/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="https://preview.keenthemes.com/craft/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    @yield('js')
</body>
</html>
