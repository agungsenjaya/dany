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