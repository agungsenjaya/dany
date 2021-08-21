<div class="modal fade" tabindex="-1" id="modalOut">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title title-4">Notifications</h3>

                <!--begin::Close-->
                <div class="h1" data-bs-dismiss="modal" aria-label="Close">
                    <span class="bi bi-x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body py-0">
                <p class="mb-0">Apakah anda yakin akan keluar dari halaman akun ? harap untuk menjaga kerahasiaan akun anda, Terima kasih.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Ya, Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@if(Session::has('success'))
<!--begin::Alert-->
<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10 rounded-0">
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
    <div class="h1 position-absolute position-sm-relative text-white" data-bs-dismiss="alert" aria-label="Close">
        <span class="bi bi-x"></span>
    </div>
    <!--end::Close-->
</div>
@elseif(Session::has('failed'))
<div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row p-5 mb-10 rounded-0">
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
    <div class="h1 position-absolute position-sm-relative text-white" data-bs-dismiss="alert" aria-label="Close">
        <span class="bi bi-x"></span>
    </div>
    <!--end::Close-->
</div>
@endif