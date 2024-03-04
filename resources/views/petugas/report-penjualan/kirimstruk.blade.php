<div class="modal-dialog modal-dialog-centered mw-650px" id="kirimStruk">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="kirimStruk">Kirim Struk</h1>
            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-form">
                <form action="javascript:sendEmail()" method="post" id="kirimStruk" name="kirimStruk" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="id_penjualan" id="id_penjualan">
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Email yang dituju</label>
                                <input class="form-control form-control-solid" placeholder="Masukkan email" type="text"
                                    id="email" name="email" required />
                                <small id="emailHelp" class="form-text text-muted">Jika ada kesalahan email, harap ubah email di
                                    sini.</small>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
            <button type="submit" id="btn-email" class="btn btn-success">Kirim</button>
        </div>
    </div>
    </form>

</div>
