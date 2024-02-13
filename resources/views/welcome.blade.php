<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.support.bundle.bundleheader')

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
    class="bg-white position-relative">

    <!--begin::Main-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/svg/illustrations/landing.svg)">
                <!--begin::Header-->
                <div class="container-fluid" style="background: #40A0B6;">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="25"
                                        viewBox="0 0 23 25" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.525 0C8.49212 0 5.72917 1.0232 4.09422 1.85918C3.94651 1.93462 3.80886 2.00868 3.68062 2.08001C3.42682 2.22128 3.21061 2.35295 3.03873 2.46885L4.8986 5.26551L5.77415 5.62144C9.19579 7.38461 13.7844 7.38461 17.2067 5.62144L18.2004 5.09475L19.9589 2.46885C19.5947 2.22612 19.2159 2.00692 18.8248 1.81255C17.198 0.985483 14.5008 0 11.5257 0M7.20028 3.16562C6.54168 3.03975 5.8912 2.87302 5.25245 2.66636C6.78399 1.97165 9.0662 1.23443 11.5257 1.23443C13.2291 1.23443 14.8399 1.58829 16.172 2.0368C14.6109 2.26106 12.9451 2.64167 11.3578 3.11007C10.1089 3.47902 8.64924 3.43925 7.20028 3.16562ZM17.9164 6.63846L17.7512 6.7235C13.9872 8.66292 8.99436 8.66292 5.23029 6.7235L5.07385 6.64258C-0.581655 12.98 -4.89898 24.6864 11.525 24.6864C27.949 24.6864 23.5269 12.7626 17.9164 6.63846ZM10.8274 12.3443C10.4712 12.3443 10.1297 12.4888 9.87782 12.746C9.62599 13.0032 9.48451 13.3521 9.48451 13.7158C9.48451 14.0796 9.62599 14.4285 9.87782 14.6857C10.1297 14.9429 10.4712 15.0874 10.8274 15.0874V12.3443ZM12.1702 10.9727V10.2869H10.8274V10.9727C10.1151 10.9727 9.43195 11.2617 8.92827 11.7761C8.4246 12.2906 8.14163 12.9883 8.14163 13.7158C8.14163 14.4434 8.4246 15.1411 8.92827 15.6555C9.43195 16.17 10.1151 16.459 10.8274 16.459V19.2022C10.2432 19.2022 9.7457 18.8216 9.56038 18.288C9.53288 18.2007 9.48853 18.1199 9.42994 18.0505C9.37135 17.981 9.29971 17.9242 9.21926 17.8835C9.13882 17.8428 9.05119 17.819 8.96158 17.8135C8.87196 17.808 8.78218 17.8209 8.69753 17.8514C8.61288 17.882 8.53509 17.9295 8.46875 17.9913C8.40242 18.0531 8.34889 18.1279 8.31134 18.2112C8.27378 18.2944 8.25296 18.3846 8.25011 18.4762C8.24725 18.5679 8.26243 18.6592 8.29472 18.7447C8.47993 19.2796 8.82293 19.7428 9.2765 20.0703C9.73006 20.3979 10.2719 20.5737 10.8274 20.5738V21.2595H12.1702V20.5738C12.8826 20.5738 13.5657 20.2847 14.0694 19.7703C14.573 19.2559 14.856 18.5581 14.856 17.8306C14.856 17.1031 14.573 16.4053 14.0694 15.8909C13.5657 15.3764 12.8826 15.0874 12.1702 15.0874V12.3443C12.7544 12.3443 13.2519 12.7249 13.4372 13.2584C13.4647 13.3457 13.5091 13.4265 13.5677 13.496C13.6263 13.5654 13.6979 13.6222 13.7784 13.6629C13.8588 13.7036 13.9464 13.7274 14.036 13.7329C14.1257 13.7385 14.2154 13.7256 14.3001 13.695C14.3847 13.6645 14.4625 13.6169 14.5289 13.5551C14.5952 13.4933 14.6487 13.4186 14.6863 13.3353C14.7238 13.252 14.7447 13.1618 14.7475 13.0702C14.7504 12.9785 14.7352 12.8872 14.7029 12.8017C14.5177 12.2668 14.1747 11.8037 13.7211 11.4761C13.2676 11.1486 12.7257 10.9727 12.1702 10.9727ZM12.1702 16.459V19.2022C12.5264 19.2022 12.868 19.0577 13.1198 18.8004C13.3716 18.5432 13.5131 18.1944 13.5131 17.8306C13.5131 17.4668 13.3716 17.118 13.1198 16.8607C12.868 16.6035 12.5264 16.459 12.1702 16.459Z"
                                            fill="#2F3281" />
                                    </svg>
                                    <span class="mt-2"
                                        style="color: #2F3281;
                                      font-family: Poppins;
                                      font-size: 20px;
                                      font-style: normal;
                                      font-weight: 500;
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
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-blue-800 menu-state-title-secondary nav nav-flush fs-5 fw-bold"
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
                                {{-- @auth

                                    <a href="{{ session('user_role') === 'FOV4Qtgi5lcQ9kCY' ? route('superadmin') : route('other_role_route') }}"
                                        class="btn btn-success">Portal</a>
                                    @endif --}}

                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9 position-relative"
                    style="background: #08C0B5;">
                    <!-- Image in bottom-left corner -->
                    <img src="assets/assets_foto/kasir.png" class="img-fluid position-absolute start-0 top-0 height-100"
                        alt="" style="height: 500px; width: 1040px;">
                    @if (session('user_role'))
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='/toko/dashboard'"
                            width="600" height="460" viewBox="0 0 600 460" fill="none"
                            style="position: absolute; top: 0; right: 0; width: 959px; min-height: 500px; flex-shrink: 0;">
                            <path
                                d="M113.965 2.4156C114.859 0.889945 116.47 0 118.239 0H879C881.762 0 884 2.23858 884 5V455C884 457.761 881.762 460 879 460H118.161C116.435 460 114.859 459.155 113.951 457.686C100.728 436.285 0.5 272.828 0.5 235C0.5 197.158 100.797 24.8709 113.965 2.4156Z"
                                fill="url(#paint0_linear_98_941)" />
                            <defs>
                                <linearGradient id="paint0_linear_98_941" x1="884" y1="230"
                                    x2="-229.471" y2="207.59" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2F3281" />
                                    <stop offset="0.571924" stop-color="#40A0B6" />
                                    <stop offset="1" stop-color="#08C0B5" />
                                </linearGradient>
                            </defs>
                            <path
                                d="M113.965 2.4156C114.859 0.889945 116.47 0 118.239 0H879C881.762 0 884 2.23858 884 5V455C884 457.761 881.762 460 879 460H118.161C116.435 460 114.859 459.155 113.951 457.686C100.728 436.285 0.5 272.828 0.5 235C0.5 197.158 100.797 24.8709 113.965 2.4156Z"
                                fill="url(#paint0_linear_98_941)" />

                            <!-- Add text element -->
                            <text x="30%" y="20%" dominant-baseline="middle" fill="#FFFFFF" font-size="32"
                                font-family="Poppins" font-weight="550">
                                <tspan text-anchor="start">Kasir Handal</tspan>
                                <tspan dy="1.5em" x="30%" text-anchor="start">Lebih Mudah &amp; Praktis</tspan>
                            </text>
                            <text x="30%" y="50%" dominant-baseline="middle" fill="#FFFFFF" font-size="20"
                                font-family="Poppins" font-weight="400">
                                <tspan text-anchor="start">Solusi tepat untuk berbagai toko swalayan anda,</tspan>
                                <tspan dy="1.5em" x="30%" text-anchor="start"> dengan fitur yang lengkap dan
                                    gratis.
                                </tspan>
                            </text>
                            <!-- Tombol Daftarkan Toko Anda -->
                            <rect x="30%" y="70%" width="227" height="38" fill="#2A77A3" stroke="#FFFFFF"
                                stroke-width="2" rx="5" ry="5" cursor="pointer" />
                            <text x="49%" y="74.5%" dominant-baseline="middle" text-anchor="middle" fill="#FFFFFF"
                                font-size="16" font-family="Poppins" font-weight="500" cursor="pointer">
                                AKSES PORTAL
                            </text>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='/register'"
                            width="600" height="460" viewBox="0 0 600 460" fill="none"
                            style="position: absolute; top: 0; right: 0; width: 959px; min-height: 500px; flex-shrink: 0;">
                            <path
                                d="M113.965 2.4156C114.859 0.889945 116.47 0 118.239 0H879C881.762 0 884 2.23858 884 5V455C884 457.761 881.762 460 879 460H118.161C116.435 460 114.859 459.155 113.951 457.686C100.728 436.285 0.5 272.828 0.5 235C0.5 197.158 100.797 24.8709 113.965 2.4156Z"
                                fill="url(#paint0_linear_98_941)" />
                            <defs>
                                <linearGradient id="paint0_linear_98_941" x1="884" y1="230"
                                    x2="-229.471" y2="207.59" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2F3281" />
                                    <stop offset="0.571924" stop-color="#40A0B6" />
                                    <stop offset="1" stop-color="#08C0B5" />
                                </linearGradient>
                            </defs>
                            <path
                                d="M113.965 2.4156C114.859 0.889945 116.47 0 118.239 0H879C881.762 0 884 2.23858 884 5V455C884 457.761 881.762 460 879 460H118.161C116.435 460 114.859 459.155 113.951 457.686C100.728 436.285 0.5 272.828 0.5 235C0.5 197.158 100.797 24.8709 113.965 2.4156Z"
                                fill="url(#paint0_linear_98_941)" />

                            <!-- Add text element -->
                            <text x="30%" y="20%" dominant-baseline="middle" fill="#FFFFFF" font-size="32"
                                font-family="Poppins" font-weight="550">
                                <tspan text-anchor="start">Kasir Handal</tspan>
                                <tspan dy="1.5em" x="30%" text-anchor="start">Lebih Mudah &amp; Praktis</tspan>
                            </text>
                            <text x="30%" y="50%" dominant-baseline="middle" fill="#FFFFFF" font-size="20"
                                font-family="Poppins" font-weight="400">
                                <tspan text-anchor="start">Solusi tepat untuk berbagai toko swalayan anda,</tspan>
                                <tspan dy="1.5em" x="30%" text-anchor="start"> dengan fitur yang lengkap dan
                                    gratis.
                                </tspan>
                            </text>
                            <!-- Tombol Daftarkan Toko Anda -->
                            <rect x="30%" y="70%" width="227" height="38" fill="#2A77A3" stroke="#FFFFFF"
                                stroke-width="2" rx="5" ry="5" cursor="pointer" />
                            <text x="49%" y="74.5%" dominant-baseline="middle" text-anchor="middle" fill="#FFFFFF"
                                font-size="16" font-family="Poppins" font-weight="500" cursor="pointer">
                                DAFTARKAN TOKO ANDA
                            </text>
                        </svg>
                    @endif
                    <!-- SVG overlay on the right -->


                    <!-- Your additional content goes here -->
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
        <div class="mb-n10 mb-lg-n20 z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mt-15 mb-15">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-custom mb-5" id="how-it-works"
                        data-kt-scroll-offset="{default: 100, lg: 150}">Fitur Unggulan</h3>
                    <!--end::Title-->
                    <!--end::Text-->
                </div>
                <!--end::Heading-->
                <!--begin::Row-->
                <div class="row w-100 gy-10 mb-md-20">
                    <!--begin::Col-->
                    <div class="col-md-4 px-5">
                        <!--begin::St
                            ory-->
                        <div class="text-center mb-10 mb-md-0" style="border: 2px solid #40A0B6; padding: 1rem;">
                            <!--begin::Illustration-->
                            {{-- <img src="assets/media/illustrations/sigma-1/2.png" class="mh-125px mb-9"
                                    alt="" /> --}}
                            <img src="assets/assets_foto/1.png" class="mh-125px mb-9" alt="" />
                            <!--end::Illustration-->
                            <!--begin::Heading-->
                            <div class="d-flex flex-center mb-5">
                                <!--begin::Badge-->
                                <!--end::Badge-->
                                <!--begin::Title-->
                                <div class="fs-5 fs-lg-3 fw-bolder" style="color: #2F3281;">Laporan Penjualan</div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Description-->
                            <div class=" fs-6 fs-lg-4 " style="font-weight:400; color: #667085;">
                                Kasir Handal menyediakan
                                <br />Laporan Penjualan Toko Anda
                                <br />setiap bulannya.
                                <br />
                                <br>
                            </div>

                            <!--end::Description-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 px-5 ">
                        <!--begin::Story-->
                        <div class="text-center mb-10 mb-md-0" style="border: 2px solid #40A0B6; padding: 1rem;">
                            <!--begin::Illustration-->
                            {{-- <img src="assets/media/illustrations/sigma-1/8.png" class="mh-125px mb-9"
                                    alt="" /> --}}
                            <img src="assets/assets_foto/2.png" class="mh-125px mb-9" />

                            <!--end::Illustration-->
                            <!--begin::Heading-->
                            <div class="d-flex flex-center mb-5">
                                <!--begin::Badge-->
                                <!--end::Badge-->
                                <!--begin::Title-->
                                <div class="fs-5 fs-lg-3 fw-bolder" style="color: #2F3281; ">Transaksi Lebih Mudah
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Description-->
                            <div class=" fs-6 fs-lg-4 " style="font-weight:400; color: #667085; ">
                                metode pembayaran, pelanggan
                                <br />bisa membayar lewat e-wallet maupun mobile banking.
                                <br />
                                <br />
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 px-5 ">
                        <!--begin::Story-->
                        <div class="text-center mb-10 mb-md-0" style="border: 2px solid #40A0B6; padding: 1rem;">
                            <!--begin::Illustration-->
                            {{-- <img src="assets/media/illustrations/sigma-1/12.png" class="mh-125px mb-9" --}}
                            {{-- alt="" /> --}}
                            <img src="assets/assets_foto/3.png" class="mh-125px mb-9" />

                            <!--end::Illustration-->
                            <!--begin::Heading-->
                            <div class="d-flex flex-center mb-5">
                                <!--begin::Badge-->
                                <!--end::Badge-->
                                <!--begin::Title-->
                                <div class="fs-5 fs-lg-3 fw-bolder" style="color: #2F3281;">Perhitungan Tepat</div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Description-->
                            <div class=" fs-6 fs-lg-4 " style="font-weight:400; color: #667085;">
                                Dengan menggunakan Kasir Handal
                                <br />anda tidak akan mengalami
                                <br />kesalahan perhitungan.
                                <br />
                                <br />
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::How It Works Section-->
            <!--begin::Statistics Section-->

            <!--begin::Wrapper-->
            <div class="pb-15 landing-dark-bg"
                style="background-color: #D1E9FF; padding-top: 100px; padding-bottom: 100px;">
                <!--begin::Container-->
                <div class="container">
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
                        <div class="col-md-6" style="margin-top: -50px;">
                            <img src="assets/assets_foto/4.png" alt="Foto Tentang Kami"
                                style="width: 85%; height: auto; margin-left: -15%;">
                        </div>
                        <div class="col-md-6" style="margin-top: -20px; margin-left: -10%;">
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 35px; color: #2F3281; font-weight: 600; margin-top: 0;">
                                Kasir Handal Solusi Tepat Untuk Bisnis Anda</p>
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 23px; color: #3E4784; font-weight: 500; margin-bottom: 20px;">
                                segera daftarkan toko anda sekarang juga</p>
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 18px; color: #717BBC; font-weight: 450;  ">
                                Sistem layanan yang kami hadirkan difokuskan secara khusus untuk memenuhi kebutuhan toko
                                swalayan,
                                menyediakan beragam fitur yang memungkinkan Anda untuk tidak hanya melihat dengan mudah
                                laporan penjualan
                                dan melakukan pendataan barang, tetapi juga untuk menganalisis data secara mendalam </p>
                        </div>
                    </div>
                </div>


                <!--end::Wrapper-->
                <!--begin::Curve bottom-->
                <div class="landing-curve landing-dark-color">
                    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">

                    </svg>
                </div>
                <!--end::Curve bottom-->
            </div>
            <!--end::Statistics Section-->
            <!--begin::Team Section-->
            <div class="py-10 py-lg-20">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mb-12">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5" id="team"
                            data-kt-scroll-offset="{default: 100, lg: 150}">
                            Our Great Team</h3>
                        <!--end::Title-->
                        <!--begin::Sub-title-->
                        <div class="fs-5 text-muted fw-bold">It’s no doubt that when a development takes longer to
                            complete, additional costs to
                            <br />integrate and test each extra feature creeps up and haunts most of us.
                        </div>
                        <!--end::Sub-title=-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Slider-->
                    <div class="tns tns-default">
                        <!--begin::Wrapper-->
                        <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                            data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                            data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                            data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
                            data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-2.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Paul
                                        Miles</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">Development Lead</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-3.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Melisa
                                        Marcus</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">Creative Director</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-4.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">David
                                        Nilson</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">Python Expert</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-5.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Anne
                                        Clarc</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">Project Manager</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-6.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Ricky
                                        Hunt</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">Art Director</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-7.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Alice
                                        Wayde</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">Marketing Manager</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Photo-->
                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                    style="background-image:url('assets/media/avatars/150-8.jpg')"></div>
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Carles
                                        Puyol</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-bold mt-1">QA Managers</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
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
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
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
                        <!--end::Button-->
                    </div>
                    <!--end::Slider-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Team Section-->
            <!--begin::Projects Section-->
            <div class="mb-lg-n15 position-relative z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Card-->
                    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                        <!--begin::Card body-->
                        <div class="card-body p-lg-20">
                            <!--begin::Heading-->
                            <div class="text-center mb-5 mb-lg-10">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-5" id="portfolio"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Our Projects</h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Tabs wrapper-->
                            <div class="d-flex flex-center mb-5 mb-lg-15">
                                <!--begin::Tabs-->
                                <ul class="nav border-transparent flex-center fs-5 fw-bold">
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active"
                                            href="#" data-bs-toggle="tab"
                                            data-bs-target="#kt_landing_projects_latest">Latest</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6"
                                            href="#" data-bs-toggle="tab"
                                            data-bs-target="#kt_landing_projects_web_design">Web
                                            Design</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6"
                                            href="#" data-bs-toggle="tab"
                                            data-bs-target="#kt_landing_projects_mobile_apps">Mobile
                                            Apps</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6"
                                            href="#" data-bs-toggle="tab"
                                            data-bs-target="#kt_landing_projects_development">Development</a>
                                    </li>
                                </ul>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Tabs wrapper-->
                            <!--begin::Tabs content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_landing_projects_latest">
                                    <!--begin::Row-->
                                    <div class="row g-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay h-lg-100"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x600/img-23.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-23.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Row-->
                                            <div class="row g-10 mb-10">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-22.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-22.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-21.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x400/img-20.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-20.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_web_design">
                                    <!--begin::Row-->
                                    <div class="row g-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay h-lg-100"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x600/img-11.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-11.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Row-->
                                            <div class="row g-10 mb-10">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-12.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-12.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-21.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x400/img-20.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-20.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
                                    <!--begin::Row-->
                                    <div class="row g-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Row-->
                                            <div class="row g-10 mb-10">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-16.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-16.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-12.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-12.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x400/img-15.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-15.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay h-lg-100"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x600/img-23.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-23.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_development">
                                    <!--begin::Row-->
                                    <div class="row g-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay h-lg-100"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x600/img-15.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-15.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Row-->
                                            <div class="row g-10 mb-10">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-22.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-22.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Item-->
                                                    <a class="d-block card-rounded overlay"
                                                        data-fslightbox="lightbox-projects"
                                                        href="assets/media/stock/600x600/img-21.jpg">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                            style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay"
                                                data-fslightbox="lightbox-projects"
                                                href="assets/media/stock/600x400/img-14.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                    style="background-image:url('assets/media/stock/600x600/img-14.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                            </div>
                            <!--end::Tabs content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Projects Section-->
            <!--begin::Pricing Section-->
            <div class="mt-sm-n20">
                <!--begin::Curve top-->
                <div class="landing-curve landing-dark-color">
                    <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <!--end::Curve top-->
                <!--begin::Wrapper-->
                <div class="py-20 landing-dark-bg">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column container pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <h1 class="fs-2hx fw-bolder text-white mb-5" id="pricing"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Clear Pricing Makes it Easy</h1>
                                <div class="text-gray-600 fw-bold fs-5">Save thousands to millions of bucks by using
                                    single
                                    tool for different
                                    <br />amazing and outstanding cool and great useful admin
                                </div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Pricing-->
                            <div class="text-center" id="kt_pricing">
                                <!--begin::Nav group-->
                                <div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true"
                                    style="border: 1px dashed #2B4666;">
                                    <a href="#"
                                        class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active"
                                        data-kt-plan="month">Monthly</a>
                                    <a href="#"
                                        class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3"
                                        data-kt-plan="annual">Annual</a>
                                </div>
                                <!--end::Nav group-->
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-center">
                                                    <!--begin::Title-->
                                                    <h1 class="text-dark mb-5 fw-boldest">Startup</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-gray-400 fw-bold mb-5">Best Settings for Startups
                                                    </div>
                                                    <!--end::Description-->
                                                    <!--begin::Price-->
                                                    <div class="text-center">
                                                        <span class="mb-2 text-primary">$</span>
                                                        <span class="fs-3x fw-bolder text-primary"
                                                            data-kt-plan-price-month="99"
                                                            data-kt-plan-price-annual="999">99</span>
                                                        <span class="fs-7 fw-bold opacity-50"
                                                            data-kt-plan-price-month="Mon"
                                                            data-kt-plan-price-annual="Ann">/ Mon</span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to
                                                            10
                                                            Active Users</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to
                                                            30
                                                            Project Integrations</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800">Keen Analytics
                                                            Platform</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <rect x="7" y="15.3137" width="12" height="2"
                                                                    rx="1" transform="rotate(-45 7 15.3137)"
                                                                    fill="black" />
                                                                <rect x="8.41422" y="7" width="12" height="2"
                                                                    rx="1" transform="rotate(45 8.41422 7)"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800">Targets Timelines
                                                            &amp;
                                                            Files</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <rect x="7" y="15.3137" width="12" height="2"
                                                                    rx="1" transform="rotate(-45 7 15.3137)"
                                                                    fill="black" />
                                                                <rect x="8.41422" y="7" width="12" height="2"
                                                                    rx="1" transform="rotate(45 8.41422 7)"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <span class="fw-bold fs-6 text-gray-800">Unlimited
                                                            Projects</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <rect x="7" y="15.3137" width="12" height="2"
                                                                    rx="1" transform="rotate(-45 7 15.3137)"
                                                                    fill="black" />
                                                                <rect x="8.41422" y="7" width="12" height="2"
                                                                    rx="1" transform="rotate(45 8.41422 7)"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                <a href="#" class="btn btn-primary">Select</a>
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-center">
                                                    <!--begin::Title-->
                                                    <h1 class="text-white mb-5 fw-boldest">Business</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-white opacity-75 fw-bold mb-5">Best Settings for
                                                        Business</div>
                                                    <!--end::Description-->
                                                    <!--begin::Price-->
                                                    <div class="text-center">
                                                        <span class="mb-2 text-white">$</span>
                                                        <span class="fs-3x fw-bolder text-white"
                                                            data-kt-plan-price-month="199"
                                                            data-kt-plan-price-annual="1999">199</span>
                                                        <span class="fs-7 fw-bold text-white opacity-75"
                                                            data-kt-plan-price-month="Mon"
                                                            data-kt-plan-price-annual="Ann">/ Mon</span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span
                                                            class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Up
                                                            to 10 Active Users</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span
                                                            class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Up
                                                            to 30 Project Integrations</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span
                                                            class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Keen
                                                            Analytics Platform</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span
                                                            class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Targets
                                                            Timelines &amp; Files</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <span class="fw-bold fs-6 text-white opacity-75">Unlimited
                                                            Projects</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <rect x="7" y="15.3137" width="12" height="2"
                                                                    rx="1" transform="rotate(-45 7 15.3137)"
                                                                    fill="black" />
                                                                <rect x="8.41422" y="7" width="12" height="2"
                                                                    rx="1" transform="rotate(45 8.41422 7)"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                <a href="#"
                                                    class="btn btn-color-primary btn-active-light-primary btn-light">Select</a>
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-center">
                                                    <!--begin::Title-->
                                                    <h1 class="text-dark mb-5 fw-boldest">Enterprise</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-gray-400 fw-bold mb-5">Best Settings for
                                                        Enterprise
                                                    </div>
                                                    <!--end::Description-->
                                                    <!--begin::Price-->
                                                    <div class="text-center">
                                                        <span class="mb-2 text-primary">$</span>
                                                        <span class="fs-3x fw-bolder text-primary"
                                                            data-kt-plan-price-month="999"
                                                            data-kt-plan-price-annual="9999">999</span>
                                                        <span class="fs-7 fw-bold opacity-50"
                                                            data-kt-plan-price-month="Mon"
                                                            data-kt-plan-price-annual="Ann">/ Mon</span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to
                                                            10
                                                            Active Users</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to
                                                            30
                                                            Project Integrations</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Keen
                                                            Analytics Platform</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span
                                                            class="fw-bold fs-6 text-gray-800 text-start pe-3">Targets
                                                            Timelines &amp; Files</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <span
                                                            class="fw-bold fs-6 text-gray-800 text-start pe-3">Unlimited
                                                            Projects</span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="black" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                <a href="#" class="btn btn-primary">Select</a>
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Pricing-->
                        </div>
                        <!--end::Plans-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Curve bottom-->
                <div class="landing-curve landing-dark-color">
                    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <!--end::Curve bottom-->
            </div>
            <!--end::Pricing Section-->
            <!--begin::Testimonials Section-->
            <div class="mt-20 mb-n20 position-relative z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mb-17">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5" id="clients"
                            data-kt-scroll-offset="{default: 125, lg: 150}">
                            What Our Clients Say</h3>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                            <br />for different amazing and great useful admin
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Row-->
                    <div class="row g-lg-10 mb-10 mb-lg-20">
                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <!--begin::Testimonial-->
                            <div
                                class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                                <!--begin::Wrapper-->
                                <div class="mb-7">
                                    <!--begin::Rating-->
                                    <div class="rating mb-6">
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                    </div>
                                    <!--end::Rating-->
                                    <!--begin::Title-->
                                    <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                        <br />and the most well structured
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Feedback-->
                                    <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I
                                        have
                                        ever used. The codes are up to tandard. The css styles are very clean. In fact
                                        the
                                        cleanest and the most up to standard I have ever seen.</div>
                                    <!--end::Feedback-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Author-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-circle symbol-50px me-5">
                                        <img src="assets/media/avatars/150-2.jpg" class="" alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="flex-grow-1">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Paul
                                            Miles</a>
                                        <span class="text-muted d-block fw-bold">Development Lead</span>
                                    </div>
                                    <!--end::Name-->
                                </div>
                                <!--end::Author-->
                            </div>
                            <!--end::Testimonial-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <!--begin::Testimonial-->
                            <div
                                class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                                <!--begin::Wrapper-->
                                <div class="mb-7">
                                    <!--begin::Rating-->
                                    <div class="rating mb-6">
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                    </div>
                                    <!--end::Rating-->
                                    <!--begin::Title-->
                                    <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                        <br />and the most well structured
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Feedback-->
                                    <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I
                                        have
                                        ever used. The codes are up to tandard. The css styles are very clean. In fact
                                        the
                                        cleanest and the most up to standard I have ever seen.</div>
                                    <!--end::Feedback-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Author-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-circle symbol-50px me-5">
                                        <img src="assets/media/avatars/150-3.jpg" class="" alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="flex-grow-1">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Janya
                                            Clebert</a>
                                        <span class="text-muted d-block fw-bold">Development Lead</span>
                                    </div>
                                    <!--end::Name-->
                                </div>
                                <!--end::Author-->
                            </div>
                            <!--end::Testimonial-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <!--begin::Testimonial-->
                            <div
                                class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                                <!--begin::Wrapper-->
                                <div class="mb-7">
                                    <!--begin::Rating-->
                                    <div class="rating mb-6">
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <div class="rating-label me-2 checked">
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                    </div>
                                    <!--end::Rating-->
                                    <!--begin::Title-->
                                    <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                        <br />and the most well structured
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Feedback-->
                                    <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I
                                        have
                                        ever used. The codes are up to tandard. The css styles are very clean. In fact
                                        the
                                        cleanest and the most up to standard I have ever seen.</div>
                                    <!--end::Feedback-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Author-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-circle symbol-50px me-5">
                                        <img src="assets/media/avatars/150-18.jpg" class="" alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="flex-grow-1">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Steave
                                            Brown</a>
                                        <span class="text-muted d-block fw-bold">Development Lead</span>
                                    </div>
                                    <!--end::Name-->
                                </div>
                                <!--end::Author-->
                            </div>
                            <!--end::Testimonial-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Highlight-->
                    <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13"
                        style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
                        <!--begin::Content-->
                        <div class="my-2 me-5">
                            <!--begin::Title-->
                            <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">Start With Metronic Today,
                                <span class="fw-normal">Speed Up Development!</span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">Join over 100,000 Professionals
                                Community to Stay Ahead</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Link-->
                        <a href="https://1.envato.market/EA4JP"
                            class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Purchase on
                            Themeforest</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Highlight-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Testimonials Section-->
            <!--begin::Footer Section-->
            <div class="mb-0">
                <!--begin::Curve top-->
                <div class="landing-curve landing-dark-color">
                    <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <!--end::Curve top-->
                <!--begin::Wrapper-->
                <div class="landing-dark-bg pt-20">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Row-->
                        <div class="row py-10 py-lg-20">
                            <!--begin::Col-->
                            <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                                <!--begin::Block-->
                                <div class="rounded landing-dark-border p-9 mb-10">
                                    <!--begin::Title-->
                                    <h2 class="text-white">Would you need a Custom License?</h2>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <span class="fw-normal fs-4 text-gray-700">Email us to
                                        <a href="https://keenthemes.com/support"
                                            class="text-white opacity-50 text-hover-primary">support@keenthemes.com</a></span>
                                    <!--end::Text-->
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="rounded landing-dark-border p-9">
                                    <!--begin::Title-->
                                    <h2 class="text-white">How About a Custom Project?</h2>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <span class="fw-normal fs-4 text-gray-700">Use Our Custom Development Service.
                                        <a href="../../demo7/dist/pages/profile/overview.html"
                                            class="text-white opacity-50 text-hover-primary">Click to Get a
                                            Quote</a></span>
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
                                        <h4 class="fw-bolder text-gray-400 mb-6">More for Metronic</h4>
                                        <!--end::Subtitle-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaions</a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video Tuts</a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Changelog</a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#"
                                            class="text-white opacity-50 text-hover-primary fs-5">Tutorials</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Links-->
                                    <!--begin::Links-->
                                    <div class="d-flex fw-bold flex-column ms-lg-20">
                                        <!--begin::Subtitle-->
                                        <h4 class="fw-bolder text-gray-400 mb-6">Stay Connected</h4>
                                        <!--end::Subtitle-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2"
                                                alt="" />
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                        </a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/github.svg" class="h-20px me-2"
                                                alt="" />
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                                        </a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2"
                                                alt="" />
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                        </a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg"
                                                class="h-20px me-2" alt="" />
                                            <span
                                                class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                                        </a>
                                        <!--end::Link-->
                                        <!--begin::Link-->
                                        <a href="#" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg"
                                                class="h-20px me-2" alt="" />
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
                                <a href="../../demo7/dist/landing.html">
                                    <img alt="Logo" src="assets/media/logos/logo-landing.svg"
                                        class="h-15px h-md-20px" />
                                </a>
                                <!--end::Logo image-->
                                <!--begin::Logo image-->
                                <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">©
                                    2021
                                    Keenthemes Inc.</span>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul
                                class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                                <li class="menu-item">
                                    <a href="https://keenthemes.com" target="_blank"
                                        class="menu-link px-2">About</a>
                                </li>
                                <li class="menu-item mx-5">
                                    <a href="https://keenthemes.com/support" target="_blank"
                                        class="menu-link px-2">Support</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" target="_blank" class="menu-link px-2">Purchase</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Footer Section-->
            <!--begin::Scrolltop-->
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
            <!--end::Scrolltop-->
        </div>
        <!--end::Main-->

        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
        @include('layouts.support.bundle.bundlefooter')

</body>

</html>
