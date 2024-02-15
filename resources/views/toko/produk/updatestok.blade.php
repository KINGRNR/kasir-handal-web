<div class="modal-dialog modal-dialog-centered mw-650px" id="modalProduk">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalProduk">Update Stok Cepat</h1>
            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-formproduk">
                <form action="javascript:updateStock()" method="post" id="formUpdateStok" name="formUpdateStok" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Pilih Produk</label>
                                <select name="produk_id" id="produk_id" class="form-select form-select-sm form-select-solid" required>
                                    <option value="" selected disabled>Pilih Produk</option>
                                    <!-- Populate options dynamically -->
                                </select>
                            </div>
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Stok Baru</label>
                                <input type="number" name="stok_baru" id="stok_baru" class="form-control form-control-sm form-control-solid input-required" required />
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
</div>
