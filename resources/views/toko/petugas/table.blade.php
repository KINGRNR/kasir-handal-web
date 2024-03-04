<div class="card table-switch-petugas">
    <div class="card-header py-4">
        <div class="card-title">
            <h1
                    style="color: var(--txt, #323232);
                font-size: 18px;
                font-style: normal;
                font-weight: 600;
                line-height: 140%; /* 28px */
                letter-spacing: 0.2px;">
                    Data Petugas</h1>
        </div>
        {{-- <div class="card-toolbar">
            <button type="button" class="btn btn-primary me-2 reset-filter" data-bs-toggle="modal"
                data-bs-target="#modalPetugas" onclick="wipeData()">Tambah Petugas</button>
            <div class="d-flex">
                <button type="button" class="btn btn-sm btn-danger deleted-selected"
                    data-kt-customer-table-select="delete_selected" style="display: none;"
                    onclick="deleteSelected()">Delete Selected</button>
            </div>
        </div> --}}
        <div class="card-toolbar gap-2">
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="search" name="search_menu" id="search_menu"
                    class="form-control form-control-solid w-250px ps-15" placeholder="Cari..">
            </div>
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modalPetugas" onclick="wipeData()">Tambah Petugas</button>
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Group actions-->

        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 overflow-auto">

        <!--begin::Table-->
        <table class="table align-middle table-hover  table-row-dashed fs-6 gy-5 text-center" id="table_petugas">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="ps-4" width="30">No</th>
                    <th class="min-w-125px">Nama Petugas</th>
                    <th class="min-w-125px">Email</th>
                    <th class="min-w-125px">Tanggal Bergabung</th>
                    <th class="min-w-125px">Aksi</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <tbody class="fw-bold text-gray-600 text-start align-middle">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalPetugas" tabindex="-1" aria-labelledby="modalPetugas" aria-hidden="true">
    @include('toko.petugas.form')
</div>
