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

                    @include('toko.header.header')
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
                    {{-- @include('toko.header.sidebar') --}}
                    <div class="content flex-row-fluid" id="kt_content">
                        <div class="row gy-5">
                            <div class="col-xl-4 ">
                                <div class="card card-xl-stretch" style="background-color: #ffff; height: 183px;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1 m" style="position: relative;">
                                        </div>
                                        <div class="pt-5 mt-5">
                                            <span class="fw-bolder fs-3x me-2 lh-0"
                                                style="color: #2F3281; display: block;">10</span>
                                            <a href="#" class="fw-bolder fs-3 mt-5"
                                                style="color: #2F3281; display: block;">Kategori Barang</a>
                                                {{-- <div class="ms-auto">
                                                    <img src="/assets/vector/cart.png" alt="" style="margin-left: 10px;">
                                                </div> --}}
                                            {{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4">
                                <div class="card card-xl-stretch" style="background-color: #fff; height: 183px;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1 m" style="position: relative;">
                                        </div>
                                        <div class="pt-5 mt-5">
                                            <span class="fw-bolder fs-3x me-2 lh-0"
                                                style="color: #2F3281; display: block;">Rp. 600.000</span>
                                            <a href="#" class="fw-bolder fs-3 mt-5"
                                                style="color: #2F3281; display: block;">Total Penjualan</a>

                                            {{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card card-xl-stretch" style="background-color: #ffff; height: 183px;">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column flex-grow-1 m" style="position: relative;">
                                        </div>
                                        <div class="pt-5 mt-5">
                                            <span class="fw-bolder fs-3x me-2 lh-0"
                                                style="color: #2F3281; display: block;">4</span>
                                            <a href="#" class="fw-bolder fs-3 mt-5"
                                                style="color: #2F3281; display: block;">Jumlah Customer</a>

                                            {{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3">
                                <div class="card card-xl-stretch  ">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title" style="color: #2F3281">Pie Chart</h5>
                                        <canvas id="myPieChart" width="100" height="100"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-9">
                                <div class="card card-xl-stretch  ">
                                    <div class="card-body d-flex flex-column h-50">
                                        <h5 class="card-title" style="color: #2F3281">Grafik Penjualan</h5>
                                        <canvas id="myBarChart" width="100" ></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
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
                            </div>

                        </div>
                    </div>
                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2024©</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-gray-800 text-hover-primary">Cashier</a>
                        </div>
                    </div>
                    <!--end::Container-->
                </div>
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
    @include('toko.bottomnavbar.botnav')

    @include('toko.dashboard.script')

</body>
@include('layouts.support.bundle.bundlefooter')

</html>
