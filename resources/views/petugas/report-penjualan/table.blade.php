<div class="invoice container-xxl d-none">

    <div class="card">
        <div class="card-body p-lg-20">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                    <div class="mt-n1">
                        <div class="d-flex flex-stack pb-10">
                            <a href="#">
                                <img alt="Logo" src="assets/media/svg/brand-logos/code-lab.svg">
                            </a>
                            <span class="badge badge-success" style="font-size: 1em;">Sudah di Bayar</span>
                        </div>
                        <div class="m-0">
                            <div class="fw-bolder fs-3 text-gray-800 mb-8">Nama Toko #34782</div>
                            <div class="row g-5 mb-11">
                                <div class="col-sm-6">
                                    <div class="fw-bold fs-7 text-gray-600 mb-1">Metode Pembayaran:</div>
                                    <div class="fw-bolder fs-6 text-gray-800">Gopay</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-bold fs-7 text-gray-600 mb-1">Waktu Pembayaran</div>
                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                        <span class="pe-2">02 May 2021 : 09.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-5 mb-12">
                                <div class="col-sm-6">
                                    <div class="fw-bold fs-7 text-gray-600 mb-1">Detail Pelanggan:</div>
                                    <div class="fw-bolder fs-6 text-gray-800">nama pelanggan.</div>
                                    <div class="fw-bold fs-7 text-gray-600">k@gmail.com</div>
                                    <div class="fw-bold fs-7 text-gray-600">08125525525</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-bold fs-7 text-gray-600 mb-1">dari Toko:</div>
                                    <div class="fw-bolder fs-6 text-gray-800">nama toko.</div>
                                    <div class="fw-bold fs-7 text-gray-600">toko@gmail.com</div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th class="min-w-175px pb-2">Nama Produk</th>
                                            <th class="min-w-70px text-end pb-2">Qty</th>
                                            <th class="min-w-80px text-end pb-2">Harga Satuan</th>
                                            <th class="min-w-100px text-end pb-2">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="d-flex align-items-center pt-6">
                                                <i class="fa fa-genderless text-danger fs-2 me-2"></i>Nasi Kucing
                                            </td>
                                            <td class="pt-6">2</td>
                                            <td class="pt-6">Rp 10.000</td>
                                            <td class="pt-6 text-dark fw-boldest">Rp. 20.000</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <i class="fa fa-genderless text-success fs-2 me-2"></i>Nasi Padang
                                            </td>
                                            <td>1</td>
                                            <td>Rp 20.000</td>
                                            <td class="fs-5 text-dark fw-boldest">Rp 20.000</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <i class="fa fa-genderless text-primary fs-2 me-2"></i>Nasi Bakar
                                            </td>
                                            <td>2</td>
                                            <td>Rp 30.000</td>
                                            <td class="fs-5 text-dark fw-boldest">Rp 60.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end">
                                    <div class="mw-300px">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal:</div>
                                            <div class="text-end fw-bolder fs-6 text-gray-800">Rp 200.000</div>
                                        </div>
                                        <div class="separator my-5"></div>
                                        <div class="d-flex flex-stack">
                                            <div class="fw-bold pe-10 text-gray-600 fs-7">Total</div>
                                            <div class="text-end fw-bolder fs-6 text-gray-800">Rp 200.000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card mb-5">
    <div class="card-header">
        <div class="card-title">
            <h2>Total Penjualan : Rp.500.000,-</h2>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-success me-2" onclick="exportToExcel()">Export
                Excel</button>
        </div>
    </div>
    {{-- <div class="card-body">
        <!-- Tambahkan konten untuk menampilkan total penjualan di sini -->
        <p>Total Penjualan: Rp 500.000</p>
    </div> --}}
</div>
<div class="card table-switch-petugas">
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
            <button type="button" class="btn btn-primary me-2 reset-filter" onclick="resetFilter()" style="display: none;">Reset Filter</button>


            <div class="d-flex">
                <input class="form-control form-control-solid" placeholder="Pick date rage" id="filter_rtransaksi" name="daterangepicker"/>

                <button type="button" class="btn btn-sm btn-danger deleted-selected"
                    data-kt-customer-table-select="delete_selected" style="display: none;"
                    onclick="deleteSelected()">Delete Selected</button>
            </div>
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
    @include('petugas.report-penjualan.form')
</div>
