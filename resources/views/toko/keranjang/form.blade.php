<div class="container-formproduk">
    <form action="javascript:save()" method="post" id="formProduk" name="formProduk" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <input type="hidden" name="id_produk" id="id_produk">
                <div class="fv-row mb-5">
                    <label for="" class="required form-label">Foto Produk <i>max 2mb</i></label>
                    <input type="file" id="inputImage" accept="image/*"
                        class="form-control form-control-sm form-control-solid input-required">
                    <input type="hidden" id="existingImage" value="">
                    <input type="hidden" id="croppedPhoto" name="croppedPhoto" value="">

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
                            class="form-control form-control-sm form-control-solid input-required" required />
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
                    <select name="kategori_produk" id="kategori_produk"
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
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="button" onclick="onReset(this)"
                    class="btn btn-sm btn-light btn-active-light-primary me-2 actCreate">
                    <i class="las la-redo-alt fs-1"></i> Reset Form
                </button>
                <button type="submit" class="btn btn-primary btn-sm me-2 actCreate">
                    <i class="las la-save fs-1"></i> Save Changes
                </button>
                <button type="button" onclick="onDisplayEdit(this)" class="btn btn-warning btn-sm me-2 d-none actEdit">
                    <i class="las la-edit fs-1"></i>Click to Edit
                </button>
                <button type="button" onclick="onDelete(this)" class="btn btn-danger btn-sm me-2 d-none actEdit">
                    <i class="las la-trash fs-1"></i> Delete Data
                </button>
                <button type="button" class="btn btn-light close-modal" onclick="switchTable()">Close</button>

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
