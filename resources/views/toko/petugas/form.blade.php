    <div class="container-form">
        <form action="javascript:createPetugas()" method="post" id="formPetugas" name="formPetugas" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <div class="card card-bordered">
                <div class="card-body">
                    <input type="hidden" name="id" id="id">
                    <div class="fv-row mb-5">
                        <label for="" class="required form-label">Nama Petugas</label>
                        <input type="text" name="name" id="name"
                            class="form-control form-control-sm form-control-solid input-required" required />
                    </div>

                    <div class="fv-row mb-5">
                        <label for="" class="required form-label">Email</label>
                        <input type="text" name="email" id="email"
                            class="form-control form-control-sm form-control-solid input-required" required />
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
                    <button type="button" onclick="onDisplayEdit(this)"
                        class="btn btn-warning btn-sm me-2 d-none actEdit">
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
