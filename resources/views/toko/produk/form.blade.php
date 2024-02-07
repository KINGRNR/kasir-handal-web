<div class="modal-dialog modal-dialog-centered mw-650px" id="modalProduk">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalProduk">Form Produk</h1>
            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-formproduk">
                <form action="javascript:save()" method="post" id="formProduk" name="formProduk" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="id_produk" id="id_produk">
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Foto Produk <i>max 2mb</i></label>
                                <input type="file" id="inputImage" name="foto_produk" accept="image/*"
                                    class="form-control form-control-sm form-control-solid input-required">
                                <input type="hidden" id="existingImage" value="">

                                <!-- You can set the existing image path here -->
                            </div>
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Preview</label>
                                <img id="croppedPreview" class="img-fluid" style="max-width: 100%; max-height: 200px;">
                                <button type="button" id="editImageBtn" class="btn btn-primary">Edit Image</button>
                            </div>
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk"
                                    class="form-control form-control-sm form-control-solid input-required" required />
                            </div>
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Harga Produk</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" name="harga_produk" id="harga_produk"
                                        class="form-control form-control-sm form-control-solid input-required"
                                        required />
                                </div>
                            </div>
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Stok Produk</label>
                                <input type="number" name="stok_produk" id="stok_produk"
                                    class="form-control form-control-sm form-control-solid input-required" required />
                            </div>
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Pilih Kategori</label>
                                {{-- <input type="text" name="" id=""> --}}
                                <select name="id_produk_kategori" id="id_produk_kategori"
                                    class="form-select form-select-sm form-select-solid" required>
                                    <option value="" selected disabled>Pilih Kategori</option>
                                </select>
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
<div class="modal fade" id="imageCropModal" tabindex="-1" role="dialog" aria-labelledby="imageCropModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageCropModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 80vh;"> <!-- Adjust the height as needed -->
                <img id="image" style="max-width: 100%; height: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="cropImage">Crop Image</button>
            </div>
        </div>
    </div>
</div>
