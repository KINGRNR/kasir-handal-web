 <!--begin::Container-->
 <div class="container-xxl d-flex align-items-center">
     <!--begin::Heaeder menu toggle-->
     <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
         <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
             id="kt_header_menu_mobile_toggle">
             <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
             <span class="svg-icon svg-icon-2x">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                     <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                         fill="black" />
                     <path opacity="0.3"
                         d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                         fill="black" />
                 </svg>
             </span>
             <!--end::Svg Icon-->
         </div>
     </div>
     <!--end::Heaeder menu toggle-->
     <!--begin::Header Logo-->
     <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
         <a href="../../demo2/dist/index.html">
             <img alt="Logo" src="../assets/media/logos/logo-demo2.png" class="logo-default h-25px" />
             <img alt="Logo" src="../assets/media/logos/logo-demo2-sticky.png" class="logo-sticky h-25px" />
         </a>
     </div>
     <!--end::Header Logo-->
     <!--begin::Wrapper-->
     <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
         <!--begin::Navbar-->
         <div class="d-flex align-items-stretch" id="kt_header_nav">
             <!--begin::Menu wrapper-->
             <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                 data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                 data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                 data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                 data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                 <!--begin::Menu-->
                 <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                     id="#kt_header_menu" data-kt-menu="true">
                     <div class="menu-item me-lg-1">
                         <a class="menu-link py-3 dashboard" href="/toko/dashboard">
                             <span class="menu-title sm-text-dark lg-text-white ">Dashboard</span>
                             <span class="menu-arrow d-lg-none"></span>
                         </a>
                     </div>
                     <div onclick="window.location.href='/toko/petugas'" class="menu-item me-lg-1">
                         <span class="menu-link py-3 petugas">
                             <span class="menu-title sm-text-dark lg-text-white ">Petugas</span>
                             <span class="menu-arrow d-lg-none"></span>
                         </span>
                     </div>

                     <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                         class="menu-item menu-lg-down-accordion me-lg-1">
                         <span class="menu-link py-3">
                             <span class="menu-title sm-text-dark lg-text-white ">Manajemen Produk</span>
                             <span class="menu-arrow "></span>
                         </span>
                         <div
                             class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                             <div onclick="window.location.href='/toko/kategori'" class="menu-item me-lg-1">
                                 <span class="menu-link py-3 kategori">
                                     <span class="menu-icon">
                                         <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                         <span class="svg-icon svg-icon-2">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                 <path
                                                     d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                                                     fill="black"></path>
                                                 <path
                                                     d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                                                     fill="black"></path>
                                                 <path opacity="0.3"
                                                     d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                                                     fill="black"></path>
                                             </svg>
                                         </span>
                                         <!--end::Svg Icon-->
                                     </span>
                                     <span class="menu-title">Kategori Produk</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                             </div>
                             <div onclick="window.location.href='/toko/produk'" class="menu-item me-lg-1">
                                 <span class="menu-link py-3 barang">
                                     <span class="menu-icon">
                                         <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                         <span class="svg-icon svg-icon-2">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                 <path
                                                     d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                     fill="black"></path>
                                                 <path
                                                     d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                     fill="black"></path>
                                                 <path opacity="0.3"
                                                     d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                     fill="black"></path>
                                                 <path opacity="0.3"
                                                     d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                     fill="black"></path>
                                             </svg>
                                         </span>
                                         <!--end::Svg Icon-->
                                     </span>
                                     <span class="menu-title">Produk</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                             </div>
                         </div>
                     </div>
                     <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                         class="menu-item menu-lg-down-accordion me-lg-1">
                         <span class="menu-link py-3">
                             <span class="menu-title sm-text-dark lg-text-white ">Penjualan</span>
                             <span class="menu-arrow "></span>
                         </span>
                         <div
                             class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                             <div onclick="window.location.href='/toko/report-penjualan'" class="menu-item me-lg-1">
                                 <span class="menu-link py-3 keranjang">
                                     <span class="menu-title sm-text-dark lg-text-white">Data Penjualan</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                             </div>
                             <div onclick="window.location.href='/toko/keranjang'" class="menu-item me-lg-1">
                                 <span class="menu-link py-3 keranjang">
                                     <span class="menu-title sm-text-dark lg-text-white ">Transaksi</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                             </div>
                         </div>
                     </div>

                     <div onclick="window.location.href='/toko/petugas'" class="menu-item me-lg-1">
                         <span class="menu-link py-3">
                             <span class="menu-title sm-text-dark lg-text-white ">Pengaturan Toko</span>
                             <span class="menu-arrow d-lg-none"></span>
                         </span>
                     </div>
                 </div>
                 <!--end::Menu-->
             </div>
             <!--end::Menu wrapper-->
         </div>
         <!--end::Navbar-->
         <!--begin::Topbar-->
         <div class="d-flex align-items-stretch flex-shrink-0">
             <!--begin::Toolbar wrapper-->
             <div class="topbar d-flex align-items-stretch flex-shrink-0">
                 <div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                     <!--begin::Menu wrapper-->
                     <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                         data-kt-menu-placement="bottom-end">
                         <img class="h-30px w-30px rounded" src="../assets/media/avatars/150-25.jpg"
                             alt="" />
                     </div>
                     <!--begin::Menu-->
                     <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                         data-kt-menu="true">
                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <div class="menu-content d-flex align-items-center px-3">
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-50px me-5">
                                     <img alt="Logo" src="../assets/media/avatars/150-25.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Username-->
                                 <div class="d-flex flex-column">
                                     <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                         @if (auth()->user()->users_role_id == 'BfiwyVUDrXOpmStr')
                                             <span
                                                 class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Toko</span>
                                         @else
                                             <span
                                                 class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Petugas
                                                 Kasir</span>
                                         @endif
                                     </div>

                                     <a href="#"
                                         class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                 </div>
                                 <!--end::Username-->
                             </div>
                         </div>
                         <!--end::Menu item-->
                         <!--begin::Menu separator-->
                         <div class="separator my-2"></div>
                         <!--end::Menu separator-->
                         <!--begin::Menu item-->
                         <div class="menu-item px-5">
                             <a href="../../demo2/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                         </div>
                         <!--begin::Menu item-->
                         <div class="menu-item px-5">
                             <a href="../logout" class="menu-link px-5">Sign Out</a>
                         </div>
                         <!--end::Menu item-->
                         <!--begin::Menu separator-->
                         <!--end::Menu item-->
                     </div>
                     <!--end::Menu-->
                     <!--end::Menu wrapper-->
                 </div>
             </div>
         </div>
     </div>
 </div>
