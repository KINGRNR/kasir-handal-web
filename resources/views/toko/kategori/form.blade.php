    <div class="modal-dialog modal-dialog-centered mw-650px" id="modalKategori">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalKategori">Form Merek</h1>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-form">
                    <form action="javascript:save()" method="post" id="formKategori" name="formKategori"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="id_kategori" id="id_kategori">
                                {{-- <div class="fv-row mb-5">
                                    <label for="" class="required form-label">Kode Kategori</label>
                                    <input type="text" name="kode_kategori" id="kode_kategori"
                                        class="form-control form-control-sm form-control-solid input-required"
                                        required />
                                </div> --}}

                                <div class="fv-row mb-5">
                                    <label for="" class="required form-label">Nama Merek</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori"
                                    class="form-control form-control-sm form-control-solid input-required" placeholder="Masukkan nama merek"
                                    required />
                                </div>
                                {{-- <div class="fv-row mb-5">
                                    <label for="" class="required form-label">Logo</label>
                                    <input type="file" id="inputImage" name="foto_kategori" accept="image/*"
                                        class="form-control form-control-sm form-control-solid input-required">
                                </div>
                                <div class="preview-container">
                                    <img id="preview" src="#" alt="Preview"
                                        style="max-width: 100%; max-height: 200px;">
                                </div> --}}
                                <div class="fv-row mb-5">
                                    <label for="" class="required form-label">Logo Merek</label>
                                    <div class="col-lg-12">
                                    
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(../file/blank.webp)">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../file/blank.webp)"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="foto_kategori" accept=".png, .jpg, .jpeg" required/>
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Photo">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            {{-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span> --}}
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">Tipe File: png, jpg, jpeg.</div>
                                        <!--end::Hint-->
                                    </div>      
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

    