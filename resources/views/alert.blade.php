@if(Session::has('success'))
<!--begin::Alert-->
<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10 rounded-0 w-100">
    <!--begin::Icon-->
    <span class="bi display-5 bi-bell-fill text-white me-4 mb-5 mb-sm-0 align-self-center"></span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h5 class="mb-1 text-capitalize title-4">Sucess message</h5>
        <!--end::Title-->
        <!--begin::Content-->
        <span>{{ Session::get('success') }}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <div class="ms-auto h1 position-absolute position-sm-relative text-white" data-bs-dismiss="alert" aria-label="Close">
        <span class="bi bi-x"></span>
    </div>
    <!--end::Close-->
</div>
@elseif(Session::has('failed'))
<div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row p-5 mb-10 rounded-0 w-100">
    <!--begin::Icon-->
    <span class="bi display-5 bi-bell-fill text-white me-4 mb-5 mb-sm-0 align-self-center"></span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h5 class="mb-1 text-capitalize title-4">Failed message</h5>
        <!--end::Title-->
        <!--begin::Content-->
        <span>{{ Session::get('failed') }}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <div class="ms-auto h1 position-absolute position-sm-relative text-white" data-bs-dismiss="alert" aria-label="Close">
        <span class="bi bi-x"></span>
    </div>
    <!--end::Close-->
</div>
@endif