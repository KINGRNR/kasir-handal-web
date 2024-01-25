<div class="modal-dialog modal-dialog-centered mw-650px" id="modalPetugas">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalPetugas">Form Petugas</h1>
            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-form">
                <form action="javascript:createPetugas()" method="post" id="formPetugas" name="formPetugas"
                    autocomplete="off" enctype="multipart/form-data">
                    @csrf

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
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>

</div>
