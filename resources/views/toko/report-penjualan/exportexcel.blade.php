<div class="modal-dialog modal-dialog-centered mw-650px" id="exportExcel">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exportExcel">Export Excel</h1>
            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-form">
                <form action="javascript:save()" method="post" id="formKategori" name="formKategori" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="id_kategori" id="id_kategori">
                            <div class="fv-row mb-5">
                                <label for="" class="required form-label">Pilih Tanggal</label>
                                <input class="form-control form-control-solid" placeholder="Pick date rage"
                                    id="filter_rexport" name="daterangepicker_export" />
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
            <button type="button" onclick="exportToExcel()" class="btn btn-success">Export</button>
        </div>
    </div>
    </form>

</div>
