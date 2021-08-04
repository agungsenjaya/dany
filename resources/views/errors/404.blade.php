@extends('index')
@section('content')
<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Error 404-->
			<div class="d-flex flex-column flex-column-fluid pt-10">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center p-10 p-lg-20">
					<!--begin::Logo-->
					<a href="/craft/index.html" class="mb-15">
						<img alt="Logo" src="https://preview.keenthemes.com/craft/assets/media/logos/logo-compact.svg" class="h-60px">
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="text-center">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-2qx text-dark mb-7">Page Not Found</h1>
						<!--end::Logo-->
						<!--begin::Message-->
						<div class="fw-bold fs-2 text-gray-400 mb-15">The page you looked not found! 
						<br>Plan your blog post by choosing a topic</div>
						<!--end::Message-->
						<!--begin::Link-->
						<a href="/craft/index.html" class="btn btn-lg btn-primary">Go to homepage</a>
						<!--end::Link-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Illustration-->
				<!-- <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center bgi-position-y-top bgi-size-cover min-h-100px min-h-lg-250px opacity-75" style="background-image: url(https://preview.keenthemes.com/craft/assets/media/misc/portfolio.png)"></div> -->
				<!--end::Illustration-->
			</div>
			<!--end::Authentication - Error 404-->
		</div>
@endsection