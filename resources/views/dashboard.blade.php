<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.support.bundle.bundleheader')
<style>

</style>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
    class="bg-white position-relative">

    <!--begin::Main-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-20 mb-md-15 mb-lg-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/svg/illustrations/landing.svg)">
                <!--begin::Header-->
                <div class="container-fluid" style="background: #2F3281">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="total"
                                style=" display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <!-- Content on the left (Removed "tes") -->
                                </div>
                                <div class="me-5 gap-2">
                                    @if (session('user_role'))
                                    @else
                                        <a href="/register" class="text-white"
                                            style="margin-right: 12px;"><strong>Daftar</strong></a>
                                        <a href="/login" class="text-white"><strong>Masuk</strong></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="background: white;">
                    <!--begin::Container-->

                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Mobile menu toggle-->
                                <!--begin::Logo image-->
                                <a href="/">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="23" height="25" viewBox="0 0 23 25" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.525 0C8.49212 0 5.72917 1.0232 4.09422 1.85918C3.94651 1.93462 3.80886 2.00868 3.68062 2.08001C3.42682 2.22128 3.21061 2.35295 3.03873 2.46885L4.8986 5.26551L5.77415 5.62144C9.19579 7.38461 13.7844 7.38461 17.2067 5.62144L18.2004 5.09475L19.9589 2.46885C19.5947 2.22612 19.2159 2.00692 18.8248 1.81255C17.198 0.985483 14.5008 0 11.5257 0M7.20028 3.16562C6.54168 3.03975 5.8912 2.87302 5.25245 2.66636C6.78399 1.97165 9.0662 1.23443 11.5257 1.23443C13.2291 1.23443 14.8399 1.58829 16.172 2.0368C14.6109 2.26106 12.9451 2.64167 11.3578 3.11007C10.1089 3.47902 8.64924 3.43925 7.20028 3.16562ZM17.9164 6.63846L17.7512 6.7235C13.9872 8.66292 8.99436 8.66292 5.23029 6.7235L5.07385 6.64258C-0.581655 12.98 -4.89898 24.6864 11.525 24.6864C27.949 24.6864 23.5269 12.7626 17.9164 6.63846ZM10.8274 12.3443C10.4712 12.3443 10.1297 12.4888 9.87782 12.746C9.62599 13.0032 9.48451 13.3521 9.48451 13.7158C9.48451 14.0796 9.62599 14.4285 9.87782 14.6857C10.1297 14.9429 10.4712 15.0874 10.8274 15.0874V12.3443ZM12.1702 10.9727V10.2869H10.8274V10.9727C10.1151 10.9727 9.43195 11.2617 8.92827 11.7761C8.4246 12.2906 8.14163 12.9883 8.14163 13.7158C8.14163 14.4434 8.4246 15.1411 8.92827 15.6555C9.43195 16.17 10.1151 16.459 10.8274 16.459V19.2022C10.2432 19.2022 9.7457 18.8216 9.56038 18.288C9.53288 18.2007 9.48853 18.1199 9.42994 18.0505C9.37135 17.981 9.29971 17.9242 9.21926 17.8835C9.13882 17.8428 9.05119 17.819 8.96158 17.8135C8.87196 17.808 8.78218 17.8209 8.69753 17.8514C8.61288 17.882 8.53509 17.9295 8.46875 17.9913C8.40242 18.0531 8.34889 18.1279 8.31134 18.2112C8.27378 18.2944 8.25296 18.3846 8.25011 18.4762C8.24725 18.5679 8.26243 18.6592 8.29472 18.7447C8.47993 19.2796 8.82293 19.7428 9.2765 20.0703C9.73006 20.3979 10.2719 20.5737 10.8274 20.5738V21.2595H12.1702V20.5738C12.8826 20.5738 13.5657 20.2847 14.0694 19.7703C14.573 19.2559 14.856 18.5581 14.856 17.8306C14.856 17.1031 14.573 16.4053 14.0694 15.8909C13.5657 15.3764 12.8826 15.0874 12.1702 15.0874V12.3443C12.7544 12.3443 13.2519 12.7249 13.4372 13.2584C13.4647 13.3457 13.5091 13.4265 13.5677 13.496C13.6263 13.5654 13.6979 13.6222 13.7784 13.6629C13.8588 13.7036 13.9464 13.7274 14.036 13.7329C14.1257 13.7385 14.2154 13.7256 14.3001 13.695C14.3847 13.6645 14.4625 13.6169 14.5289 13.5551C14.5952 13.4933 14.6487 13.4186 14.6863 13.3353C14.7238 13.252 14.7447 13.1618 14.7475 13.0702C14.7504 12.9785 14.7352 12.8872 14.7029 12.8017C14.5177 12.2668 14.1747 11.8037 13.7211 11.4761C13.2676 11.1486 12.7257 10.9727 12.1702 10.9727ZM12.1702 16.459V19.2022C12.5264 19.2022 12.868 19.0577 13.1198 18.8004C13.3716 18.5432 13.5131 18.1944 13.5131 17.8306C13.5131 17.4668 13.3716 17.118 13.1198 16.8607C12.868 16.6035 12.5264 16.459 12.1702 16.459Z" fill="#2F3281"/>
                                      </svg> --}}
                                    <span class="mt-2 fw-bolder"
                                        style="color: #2F3281;
                                      font-family: Poppins;
                                      font-size: 20px;
                                      /* font-style: normal; */
                                      /* font-weight: 500; */
                                      line-height: 21px; /* 105% */">KasirHandal</span>
                                </a>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->
                            <!--begin::Menu wrapper-->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-blue-800 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                                        id="kt_landing_menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true"
                                                style="color: #4E5BA6;">Beranda</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true"
                                                style="color: #4E5BA6;">Fitur Unggulan</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true"
                                                style="color: #4E5BA6;">tentang kami</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->

                                    </div>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Menu wrapper-->
                            <!--begin::Toolbar-->
                            <div class="flex-equal text-end ms-1">


                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px position-relative"
                    style="background: #24B0B6; background: url('assets/assets/bg-kasir.jpg');">
                    <!-- Image in bottom-left corner -->
                    <img src="assets/assets/bg-kasir.jpg" class="" alt=""
                        style="object-fit: cover; width: 100%; height: 745px; /* Atur tinggi sesuai kebutuhan */">
                    <div class="position-absolute bottom-0 start-0 bg-color"
                        style="background-color: rgba(28, 29, 74, 0.6); height: 60%; width: 400px; border-radius: 0px 700px 0px  0px;">
                    </div>
                    <!-- Background color on the right -->
                    <div class="position-absolute top-0 end-0 bg-color"
                        style="background-color: rgba(28, 29, 74, 0.6); height: 100%; width: 1000px; border-radius: 0 0px 0px 700px;">
                    </div>

                    <!-- Text content on the right -->
                    <div class="container position-absolute top-0 end-4 d-flex align-items-center"
                        style="height: 100%; ">
                        <div class="col-xxl-5">
                            <div class="text-center text-xxl-end">
                                <h1 class="fw-bolder mb-5 text-white" style="font-size: 40px; letter-spacing: 2px;">
                                    Tingkatkan Penjualan &
                                    Hemat Waktu dengan Sistem KasirHandal!</h1>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-end justify-content-xxl-end mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
                                        href="trial.html">Daftar Gratis!</a>
                                    <a class="btn btn-outline-white btn-lg px-5 py-3 fs-6 fw-bolder border"
                                        href="features.html">Pelajari Fitur</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            {{-- <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                            fill="currentColor"></path>
                    </svg>
                </div> --}}
            <!--end::Curve bottom-->
        </div>

        <!--end::Header Section-->
        <!--begin::How It Works Section-->
        <div class="mb-n10 mb-lg-n20 z-index-2 mt-20 mt-md-20 mt-lg-5 ">
            <!--begin::Container-->
            <div class="mb-10 mb-lg-20 z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mb-15">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5" id="how-it-works"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Fitur Unggulan
                        </h3>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="fs-5 text-muted fw-bold">Banyak kemudahan yang anda dapatkan
                            <br />Lebih Mudah, Lebih Profit!
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Row-->
                    <div class="row w-100 gy-10 mb-md-20">
                        <!--begin::Col-->
                        <div class="col-md-4 px-5">
                            <div class="card border p-5">
                                <!--begin::Story-->
                                <div class="text-center mb-10 mb-md-0">
                                    <!--begin::Illustration-->
                                    <img src="assets/assets_foto/1.png" class="mh-125px mb-9" alt="" />
                                    <!--end::Illustration-->
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-center mb-5">
                                        <!--begin::Badge-->
                                        <span
                                            class="badge badge-circle badge-light-primary fw-bolder p-5 me-3 fs-3">1</span>
                                        <!--end::Badge-->
                                        <!--begin::Title-->
                                        <div class="fs-5 fs-lg-3 fw-bolder text-dark">Laporan Penjualan
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Description-->
                                    <div class="fw-bold fs-6 fs-lg-4 text-muted">Kasir Handal menyediakan
                                        <br />Laporan Penjualan Toko Anda
                                        <br />setiap bulannya.
                                    </div>
                                    <!--end::Description-->
                                </div>
                            </div>
                            <!--end::Story-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 px-5">
                            <!--begin::Story-->
                            <div class="card border p-5">
                                <div class="text-center mb-10 mb-md-0">
                                    <!--begin::Illustration-->
                                    <img src="assets/assets_foto/2.png" class="mh-125px mb-9" alt="" />
                                    <!--end::Illustration-->
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-center mb-5">
                                        <!--begin::Badge-->
                                        <span
                                            class="badge badge-circle badge-light-primary fw-bolder p-5 me-3 fs-3">2</span>
                                        <!--end::Badge-->
                                        <!--begin::Title-->
                                        <div class="fs-5 fs-lg-3 fw-bolder text-dark">Transaksi Lebih Mudah
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Description-->
                                    <div class="fw-bold fs-6 fs-lg-4 text-muted">metode pembayaran, pelanggan
                                        <br />bisa membayar lewat e-wallet maupun
                                        <br />mobile banking.
                                    </div>
                                    <!--end::Description-->
                                </div>
                            </div>
                            <!--end::Story-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 px-5">
                            <!--begin::Story-->
                            <div class="card border p-5">
                                <div class="text-center mb-10 mb-md-0">
                                    <!--begin::Illustration-->
                                    <img src="assets/assets_foto/3.png" class="mh-125px mb-9" alt="" />
                                    <!--end::Illustration-->
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-center mb-5">
                                        <!--begin::Badge-->
                                        <span
                                            class="badge badge-circle badge-light-primary fw-bolder p-5 me-3 fs-3">3</span>
                                        <!--end::Badge-->
                                        <!--begin::Title-->
                                        <div class="fs-5 fs-lg-3 fw-bolder text-dark">Perhitungan Tepat</div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Description-->
                                    <div class="fw-bold fs-6 fs-lg-4 text-muted">Dengan menggunakan Kasir Handal
                                        <br />anda tidak akan mengalami
                                        <br />kesalahan perhitungan.
                                    </div>
                                    <!--end::Description-->
                                </div>
                            </div>
                            <!--end::Story-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Product slider-->
                    <div class="tns tns-default">
                        <!--begin::Slider-->
                        <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                            data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                            data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                            data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                            <!--begin::Item-->
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="assets/assets/ss_web/1.png" class="card-rounded shadow mw-100"
                                    alt="" />
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="assets/assets/ss_web/2.png" class="card-rounded shadow mw-100"
                                    alt="" />
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="assets/assets/ss_web/3.png" class="card-rounded shadow mw-100"
                                    alt="" />
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            {{-- <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="assets/media/product-demos/demo5.png" class="card-rounded shadow mw-100"
                                    alt="" />
                            </div> --}}
                            <!--end::Item-->
                        </div>
                        <!--end::Slider-->
                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                            <span class="svg-icon svg-icon-3x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Slider button-->
                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                            <span class="svg-icon svg-icon-3x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Slider button-->
                    </div>
                    <!--end::Product slider-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::How It Works Section-->
            <!--begin::Statistics Section-->

            <!--begin::Wrapper-->

            <div class="pb-15 landing-dark-bg mt-10"
                style="background-color: #D1E9FF; padding-top: 100px; padding-bottom: 100px;">
                <!--begin::Container-->
                <div class="container w-100">
                    <!-- Spasi atas -->
                    <div style="height: 3px;"></div>

                    <!--begin::Heading-->
                    <div class="text-center mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}"
                        style="margin-top: -70px;">
                        <!--begin::Title-->
                        <h3 class="fs-2hx fw-bolder mb-5" style="color:#2F3281;">Tentang Kami</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <!-- Foto -->
                    <div class="row">
                        <div class="col-md-6" style="margin-top: -70px;">
                            <img src="assets/assets_foto/4.png" alt="Foto Tentang Kami"
                                style="width: 85%; height: auto; margin-left: -15%;">
                        </div>
                        <div class="col-md-6" style="margin-top: -20px; margin-left: -10%; ">
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 35px; color: #2F3281; font-weight: 600; margin-top: 0;">
                                Kasir Handal Solusi Tepat Untuk Bisnis Anda</p>
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 23px; color: #3E4784; font-weight: 500; margin-bottom: 20px;">
                                segera daftarkan toko anda sekarang juga</p>
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 18px; color: #717BBC; font-weight: 450; ">
                                Sistem layanan yang kami hadirkan difokuskan secara khusus untuk memenuhi kebutuhan
                                bisnis Gadget,
                                menyediakan beragam fitur yang memungkinkan Anda untuk tidak hanya melihat dengan mudah
                                laporan penjualan
                                dan melakukan pendataan barang, tetapi juga untuk menganalisis data secara mendalam </p>
                        </div>
                    </div>
                </div>


                <!--end::Wrapper-->
                <!--begin::Curve bottom-->
                <!--end::Curve bottom-->
            </div>
            <!--end::Statistics Section-->
            <!--begin::Team Section-->
            <div class="py-10 py-lg-20">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-left mb-12">

                        <!--begin::Sub-title-->
                        <div style="font-size: 1.8rem; color: #6c757d; font-weight: 500;">
                            <img src="file/vector_landbawah.png" alt="Foto Deskripsi"
                                style="width: 40%; height: auto; float: right; margin-left: -20px; margin-top: -60px;">
                            Kami aplikasi kasir menyediakan solusi canggih untuk
                            manajemen transaksi bisnis Anda, mempermudah
                            proses pembayaran, mengelola stok, dan menyajikan
                            laporan keuangan secara efisien. Dengan fitur-fitur
                            inovatif kami, pengguna dapat mengoptimalkan
                            pengalaman bertransaksi, meningkatkan efisiensi
                            operasional, dan mengarahkan bisnis menuju
                            kesuksesan yang lebih besar.
                        </div>
                        <!--end::Sub-title=-->
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Team Section-->
            <div class="mb-0 mt-20">

                <div class=" pt-20" style="background: #2F3281">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Row-->
                        <div class="row py-10 py-lg-20">
                            <!--begin::Col-->
                            <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                                <!--begin::Block-->

                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="rounded landing-dark-border p-9">
                                    <!--begin::Title-->
                                    <h2 class="text-white">Apakah Anda memerlukan lisensi khusus?</h2>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <span class="fw-normal fs-4 text-gray-700">Email kita ke.
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary">kasirhandal@gmail.com</a></span>
                                    <!--end::Text-->
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 ps-lg-16">
                                <!--begin::Navs-->
                                <div class="d-flex justify-content-center">
                                    <!--begin::Links-->
                                    <div class="d-flex fw-bold flex-column me-20">
                                        <!--begin::Subtitle-->
                                        <h4 class="fw-bolder text-gray-400 mb-6">Menu</h4>
                                        <!--end::Subtitle-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Daftar</a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Masuk</a>
                                        <!--end::Link-->

                                    </div>
                                    <!--end::Links-->
                                    <!--begin::Links-->
                                    <div class="d-flex fw-bold flex-column ms-lg-20">
                                        <!--begin::Subtitle-->
                                        <h4 class="fw-bolder text-gray-400 mb-6">Social Media</h4>
                                        <!--end::Subtitle-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2"
                                                alt="">
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                        </a>
                                        <!--end::Link-->
                                        <!--begin::Link-->

                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2"
                                                alt="">
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                        </a>
                                        <!--end::Link-->
                                        <!--begin::Link-->

                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg"
                                                class="h-20px me-2" alt="">
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                        </a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Links-->
                                </div>
                                <!--end::Navs-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                    <!--begin::Separator-->
                    <div class="landing-dark-separator"></div>
                    <!--end::Separator-->
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                            <!--begin::Copyright-->
                            <div class="d-flex align-items-center order-2 order-md-1">
                                <!--begin::Logo-->
                                <a href="../../demo2/dist/landing.html">
                                    <span class="mt-2"
                                        style="color: #fff;
                                      font-family: Poppins;
                                      font-size: 20px;
                                      font-style: normal;
                                      font-weight: 500;
                                      line-height: 21px; /* 105% */">KasirHandal</span>
                                </a>
                                <!--end::Logo image-->
                                <!--begin::Logo image-->
                                <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">©
                                    2024 KasirHandal.</span>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>

            <!--end::Page Custom Javascript-->
            <!--end::Javascript-->
            @include('layouts.support.bundle.bundlefooter')

</body>

</html>
