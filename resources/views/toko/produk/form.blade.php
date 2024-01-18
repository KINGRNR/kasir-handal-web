<div class="modal-dialog modal-dialog-centered mw-650px" id="modalProduk">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalProduk">Form Produk</h1>
            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-form">
                <form action="javascript:save()" method="post" id="formProduk" name="formProduk"
                    autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="id_produk" id="id_produk">
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Nama Produk</label>
                                <input type="text" name="kode_kategori" id="kode_kategori"
                                    class="form-control form-control-sm form-control-solid input-required"
                                    required />
                            </div>

                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">KAtegori</label>
                               d
                            </div>

                            {{-- <div class="fv-row mb-5">
                            <label for="" class="required form-label">Akses</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Akses</option>
                                <option value="1">Superadmin</option>
                                <option value="2">Admin/Pemilik Toko</option>
                                <option value="3">Petugas</option>
                              </select>
                        </div> --}}
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

</div>
