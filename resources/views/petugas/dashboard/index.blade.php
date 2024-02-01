<!DOCTYPE html>
<html lang="en">
    @include('layouts.support.bundle.bundleheader')    
    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						@include('petugas.header.header')
					</div>
					<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
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
					</div>
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						@include('petugas.header.sidebar')
						<div class="content flex-row-fluid" id="kt_content">
							<div class="row gy-5 g-xl-10">
								<div class="col-xl-4 ">
									<div class="card card-xl-stretch mb-xl-10" style="background-color: #F97066; 
									height: 183px;	">
										<div class="card-body d-flex flex-column">
											<div class="d-flex flex-column flex-grow-1" style="position: relative;">
												<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Total Transaksi</a>
											</div>
											<div class="pt-5">
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">100 Transaksi</span>
												{{-- <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span> --}}
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="card card-xl-stretch mb-xl-10" style="background-color: #6CE9A6; 
									height: 183px;">
										<div class="card-body d-flex flex-column">
											<div class="d-flex flex-column flex-grow-1" style="position: relative;">
												<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Total Kerugian</a>
											</div>
											<div class="pt-5">
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">Rp. 200.000</span>
												{{-- <span class="text-dark fw-bolder fs-6 lh-0"></span> --}}
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="card card-xl-stretch mb-xl-10" style="background-color: #84CAFF; 
									height: 183px;">
										<div class="card-body d-flex flex-column">
											<div class="d-flex flex-column flex-grow-1" style="position: relative;">
												<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Total Keuntungan</a>
											</div>
											<div class="pt-5">
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">Rp. 100.000.000</span>
												{{-- <span class="text-dark fw-bolder fs-6 lh-0">Companies</span> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2024©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Cashier</a>
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
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		@include('petugas.dashboard.script')

	</body>
        @include('layouts.support.bundle.bundlefooter')

</html>