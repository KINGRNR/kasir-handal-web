<!DOCTYPE html>
<html lang="en">
@include('layouts.support.bundle.bundleheader')

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div id="kt_header" class="header align-items-stretch " data-kt-sticky="true" data-kt-sticky-name="header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}" name="header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}" {{-- style="background: radial-gradient(circle at 0% 50%, #2F3281 0%, #40A0B6 67%, #08C0B5 82.29%);"> --}}
                    style="background: #2F3281">

                    @include('superadmin.header.header')
                </div>
                {{-- <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
						<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
							<div class="page-title d-flex flex-column me-3">
								<h1 class="d-flex text-white fw-bolder my-1 fs-3">Dashboard</h1>
								<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
									<li class="breadcrumb-item text-white opacity-75">
										<a href="../../demo2/dist/index.html" class="text-white text-hover-primary">Home</a>
									</li>
									<li class="breadcrumb-item">
										<span class="bullet bg-white opacity-75 w-5px h-2px"></span>
									</li>
									<li class="breadcrumb-item text-white opacity-75">Dashboard</li>
								</ul>
							</div>
						</div>
						<!--end::Container-->
					</div> --}}
                <div id="kt_content_container" class="mt-5 d-flex flex-column-fluid align-items-start container-xxl">
                    {{-- @include('superadmin.header.sidebar') --}}
                    <div class="content flex-row-fluid" id="kt_content">
                        <div class="row gy-5">
                            {{-- <div class="col-xl-12">
                                <div class="card" style="background-color: #ffff;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1" style="position: relative;">
                                            <!-- Sisipkan ucapan selamat datang, nama, nama superadmin, dan peran di sini -->
                                            <h2>Selamat datang, {{ session('name') }}!</h2>
                                            <p>Anda terdaftar sebagai <span class="fw-bold">
                                                    @if (session('user_role') == 'BfiwyVUDrXOpmStr')
                                                        Pemilik
                                                    @else
                                                        Petugas Kasir
                                                    @endif
                                                </span> Usaha <span class="fw-bold">{{ session('superadmin_nama') }}</span>.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="col-xl-4 ">
                                <div class="card" style="background-color: #ffff;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1 m" style="position: relative;">
                                        </div>
                                        <div class="pt-5">
                                            <span class="fw-bolder fs-3x me-2 lh-0 total_merek" style="display: block;">-</span>
                                            <a href="#" class="fw-bolder fs-3 mt-5 text-muted"
                                                style="display: block;">Total Pengguna</a>
                                            {{-- <div class="ms-auto">
                                                    <img src="/assets/vector/cart.png" alt="" style="margin-left: 10px;">
                                                </div> --}}
                                            {{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4">
                                <div class="card" style="background-color: #fff;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1 m" style="position: relative;">
                                        </div>
                                        <div class="pt-5">
                                            <span class="fw-bolder fs-3x me-2 lh-0 total_saldo" style="display: block;">-</span>
                                            <a href="#" class="fw-bolder fs-3 mt-5 text-muted"
                                                style="display: block;">Jumlah Toko</a>

                                            {{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card" style="background-color: #ffff;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1 m" style="position: relative;">
                                        </div>
                                        <div class="pt-5">
                                            <span class="fw-bolder fs-3x me-2 lh-0 total-pelanggan" style="display: block;">-</span>
                                            <a href="#" class="fw-bolder fs-3 mt-5 text-muted"
                                                style="display: block;">Toko Baru per hari</a>

                                            {{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                           
                            <div class="col-xl-12">
                                <div class="card card-xl-stretch  ">
                                    <div class="card-body d-flex flex-column h-50">
                                        <h5 class="card-title" style="color: #2F3281">Grafik Toko Terdaftar</h5>
                                        <canvas id="myBarChart" width="100"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card card-xl-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0 mt-4">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="fw-bolder mb-2 text-dark">Toko Terlaris Perbulan</span>
                                            {{-- <span class="text-muted fw-bold fs-7">800 Penjualan</span> --}}
                                        </h3>
                                        <div class="card-toolbar">
                                            {{-- <!--begin::Menu-->
                                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484fe012b29">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                                <label class="form-label fw-bold">Status:</label>
                                                                <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_61484fe012b29" data-allow-clear="true" data-select2-id="select2-data-10-wsv4" tabindex="-1" aria-hidden="true">
                                                                <option data-select2-id="select2-data-12-vq54"></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-4rx2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-zzmb-container" aria-controls="select2-zzmb-container"><span class="select2-selection__rendered" id="select2-zzmb-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                                <label class="form-label fw-bold">Member Type:</label>
                                                                <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" value="1">
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2" checked="checked">
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                                <label class="form-label fw-bold">Notifications:</label>
                                                                <!--begin::Switch-->
                                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked">
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Menu--> --}}
                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                        <table class="table align-middle table-hover  table-row-dashed fs-6  text-center"
                                        id="table-kategori">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr
                                                class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
=                                                <th class="min-w-125px">Nama Toko</th>
                                                <th class="min-w-125px">Pendapatan</th>
                                                <th class="min-w-125px">Total Transaksi</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <tbody class="fw-bold text-start align-middle">
                                            <tr
                                                class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
=                                                <td class="min-w-125px">Basmalah</td>
                                                <td class="min-w-125px">Rp.10.000.000,-</td>
                                                <td class="min-w-125px">10x</td>
                                            </tr>
                                            <tr
                                            class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
=                                                <td class="min-w-125px">Dayuki Mart</td>
                                            <td class="min-w-125px">Rp.210.000.000,-</td>
                                            <td class="min-w-125px">101x</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="card">
                                <div class="card-body overflow-auto">

                                    <!--begin::Table-->
                                    <table class="table align-middle table-hover  table-row-dashed fs-6  text-center"
                                        id="table-kategori">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr
                                                class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-4" width="20">No</th>
                                                <th class="min-w-125px">ID Transaksi</th>
                                                <th class="min-w-125px">Total Harga</th>
                                                <th class="min-w-125px">Nama Pelanggan</th>
                                                <th class="min-w-125px">Tanggal Transaksi</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <tbody class="fw-bold text-gray-600 text-start align-middle">
                                            <tr
                                                class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <td class="ps-4" width="20">1</td>
                                                <td class="min-w-125px">417183842</td>
                                                <td class="min-w-125px">Rp 1.200.000</td>
                                                <td class="min-w-125px">Zalfa</td>
                                                <td class="min-w-125px">29-12-2023</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                @include('superadmin.footer.index')

                <!--end::Footer-->
            </div>

        </div>
        <!--end::Page-->
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    @include('superadmin.bottomnavbar.botnav')

    @include('superadmin.dashboard.script')

</body>
@include('layouts.support.bundle.bundlefooter')

</html>
