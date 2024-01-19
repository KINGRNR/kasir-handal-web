
@include('layouts.support.bundle.bundleheader')

<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-900px positon-xl-relative"
                style="background: linear-gradient(180deg, #2F3281 24.41%, #40A0B6 76.35%, #08C0B5 100%)">
            
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login.store') }}">
                            @csrf
                            {{-- <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In</h1>
                                <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                                </div>
                            </div> --}}
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Masuk untuk Melihat Fitur</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Belum Punya Akun?
                                    <a href="/register" class="link-primary fw-bolder">Buat Sekarang    </a>
                                </div>
                                <!--end::Link-->
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-14 fw-bolder text-dark">Email</label>
                                <input
                                    class="form-control @error('email') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                    id="email" type="email" name="email" value="admin@admin.com" placeholder="Enter your E-mail"
                                    required autocomplete="email" autofocus>
                                {{-- value="{{ old('email') }}" --}}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-dark fs-14 mb-0">Password</label>
                                </div>
                                <div class="position-relative">
                                    <input
                                        class="form-control @error('password') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                        id="password" type="password" name="password" value="KaliBolu" placeholder="Enter your password"
                                        required autocomplete="current-password">
                                    <button type="button" onclick="togglePassword()"
                                        class="btn-visible btn position-absolute shadow-none flex-center"
                                        style="top: 50%; right: 0; transform: translateY(-50%); color: #808080; display: flex;"
                                        fdprocessedid="mwa89f">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    {{-- <label class="form-label fw-bolder text-dark fs-14 mb-0">Password</label> --}}
                                    {{-- <a href="{{ route('password.request') }}" class="fs-14 fw-bolder"
                                        style="color: var(--fks-secondary, #DAA916); font-family: Poppins; font-size: 14px; font-style: normal; font-weight: 500; line-height: 140%;">Forgot
                                        Password ?</a> --}}
                                        <a href="" class="fs-14 fw-bolder"
                                        style="color: var(--fks-secondary, #DAA916); font-family: Poppins; font-size: 14px; font-style: normal; font-weight: 500; line-height: 140%;">Forgot
                                        Password ?</a>
                                </div>
                            </div>
                    
                    
                            <div class="text-center">
                    
                                <button type="submit" id="" class="btn btn-lg w-100 mb-4" style="background-color: #1B61AD">
                                    <span class="indicator-label text-white">Masuk</span>
                                    <span class="indicator-progress text-white">Tunggu sebentar...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                {{-- <div class="d-grid">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <span class="indicator-label">Masuk</span>
                                        <span class="indicator-progress">Tunggu Sebentar...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div> --}}
                                <a href="{{ url('authorized/google') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                    <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3">Continue with
                                    Google</a>
                        </form>
                      
                    
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <!--begin::Links-->
                    {{-- <div class="d-flex flex-center fw-bold fs-6">
                        <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2"
                            target="_blank">About</a>
                        <a href="https://keenthemes.com/support" class="text-muted text-hover-primary px-2"
                            target="_blank">Support</a>
                        <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2"
                            target="_blank">Purchase</a>
                    </div> --}}
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
                    
    <script>
        togglePassword = () => {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text')
                $('.far.fa-eye').removeClass('fa-eye').addClass('fa-eye-slash')
            } else {
                $('.far.fa-eye-slash').removeClass('fa-eye-slash').addClass('fa-eye')
                $('#password').attr('type', 'password')
            }
        }
    </script>
            @include('layouts.support.bundle.bundlefooter')

</body>   