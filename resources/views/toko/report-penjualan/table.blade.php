<div class="invoice container-xxl mb-5" style="display: none">
    
</div>
<div class="report-penjualan card mb-5 d-none" style="display: none">
    <div class="card-header">
        <div class="card-title total-penjualan">
            {{-- <h2>Total Penjualan : ${quick.formatRupiah(data.penjualan.penjualan_total_harga)}-</h2> --}}
        </div>
        <div class="card-toolbar">
           
        </div>
    </div>
    {{-- <div class="card-body">
        <!-- Tambahkan konten untuk menampilkan total penjualan di sini -->
        <p>Total Penjualan: Rp 500.000</p>
    </div> --}}
</div>
<div class="report-penjualan card table-switch-petugas mb-5" style="display: none">
    <div class="card-header py-4">
        <div class="card-title">
            {{-- <h1
                    style="color: var(--txt, #323232);
                font-size: 20px;
                font-style: normal;
                font-weight: 600;
                line-height: 140%; /* 28px */
                letter-spacing: 0.2px;">
                    List User</h1> --}}
            <div class="input-group ms-2">
                <div class="w-100 position-relative">
                    <span class="svg-icon svg-icon-2 search-icon position-absolute top-50 translate-middle-y ms-4">
                        <i class="align-self-center fs-2 las la-search"></i>
                    </span>
                    <input type="search" name="search_menu" id="search_menu" placeholder="Cari"
                        class="form-control form-control-sm ps-12" autocomplete="off"
                        style="display: flex;
                        height: 48px;
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 8px;
                        flex: 1 0 0;
                        width: 241px;">
                </div>

                {{-- <span class="input-group-text" id="basic-addon1">
                    </span> --}}
            </div>
        </div>
        <div class="card-toolbar">
          
            <button type="button" class="btn btn-primary me-2 reset-filter" onclick="resetFilter()"
                style="display: none;">Reset Filter</button>


            <div class="d-flex">
                <input class="form-control form-control-solid" placeholder="Pick date rage" id="filter_rtransaksi"
                    name="daterangepicker" />
                  
                <button type="button" class="btn btn-sm btn-danger deleted-selected"
                    data-kt-customer-table-select="delete_selected" style="display: none;"
                    onclick="deleteSelected()">Delete Selected</button>
            </div>
            <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
            data-bs-target="#exportExcel">Export
                Excel</button>
        </div>

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 overflow-auto">

            <!--begin::Table-->
            <table class="table align-middle table-hover  table-row-dashed fs-6 gy-5 text-center" id="table-report">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-125px">ID Transaksi</th>
                        <th class="min-w-125px">Total Harga</th>
                        <th class="min-w-125px">Nama Pelanggan</th>
                        <th class="min-w-125px">Tanggal Transaksi</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600 text-start align-middle">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="modalKategori" aria-hidden="true">
    @include('toko.report-penjualan.form')
</div>
<div class="modal fade" id="exportExcel" tabindex="-1" aria-labelledby="exportExcel" aria-hidden="true">
    @include('toko.report-penjualan.exportexcel')
</div>
<div class="modal fade" id="kirimStruk" tabindex="-1" aria-labelledby="kirimStruk" aria-hidden="true">
    @include('toko.report-penjualan.kirimstruk')
</div>