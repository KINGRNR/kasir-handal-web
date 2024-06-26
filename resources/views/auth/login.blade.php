@include('layouts.support.bundle.bundleheader')

<body id="kt_body" class="app-blank" style="background: #fff">
    <div class="d-flex flex-column flex-root justify-content-center">
        <!--begin::Authentication - Sign-in -->
        <div class="container-fluid">
            <div class="row">
                <div
                    class="col-lg-6 d-flex flex-column flex-lg-row-auto justify-content-center align-items-center bg-white">
                    {{-- <h1 class="text-center text-white " style="font-size: 70px;">KasirHandal</h1> --}}
                    <img src="file/vector-kasir-3.png" class="d-none d-lg-block w-75 max-w-100 h-auto"
                        style="max-width: 75%;" alt="Logo Ipsum Logo">
                </div>



                <!--end::Aside-->
                <!--begin::Body-->

                <div class="col-lg-6 d-flex flex-column flex-lg-row-fluid py-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-column-fluid">
                        <!--begin::Wrapper-->
                        <div class="p-10 p-lg-15 mx-auto">
                            <!--begin::Form-->
                            <form class="form w-100 w-lg-500px" novalidate="novalidate" id="kt_sign_in_form"
                                method="POST" action="{{ route('login.store') }}">

                                @csrf
                                {{-- <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In</h1>
                                <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                                </div>
                                </div> --}}
                                <div class="text-center mb-7">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">Masuk untuk Melihat Fitur</h1>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <div class="text-gray-400 fw-bold fs-4">Belum Punya Akun?
                                        <a href="/register" class="link-primary fw-bolder">Buat Sekarang </a>
                                    </div>
                                    <!--end::Link-->
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="form-label fs-14 fw-bolder text-dark">Email</label>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                        id="email" type="email" name="email" placeholder="Masukkan Email"
                                        required autocomplete="email" autofocus>
                                    {{-- value="{{ old('email') }}" --}}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </button>
                                    @if ($errors->has('credsal'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('credsal') }}</strong>
                                        </span>
                                    @endif
                                    {{-- @if ($errors->any())
                                        <span class="">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </span>
                                    @endif --}}

                                </div>
                                <div class="fv-row mb-7">
                                    <div class="d-flex flex-stack mb-2">
                                        <label class="form-label fw-bolder text-dark fs-14 mb-0">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input
                                            class="form-control @error('password') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                            id="password" type="password" name="password"
                                            placeholder="Masukkan Kata Sandi" required autocomplete="current-password">
                                        <button type="button" onclick="togglePassword()"
                                            class="btn-visible btn position-absolute shadow-none flex-center"
                                            style="top: 50%; right: 0; transform: translateY(-50%); color: #808080; display: flex;"
                                            fdprocessedid="mwa89f">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="fv-row mb-7">
                                    <div class="d-flex flex-stack mb-2">
                                        {{-- <label class="form-label fw-bolder text-dark fs-14 mb-0">Password</label> --}}
                                        {{-- <a href="{{ route('password.request') }}" class="fs-14 fw-bolder"
                                        style="color: var(--fks-secondary, #DAA916); font-family: Poppins; font-size: 14px; font-style: normal; font-weight: 500; line-height: 140%;">Forgot
                                        Password ?</a> --}}
                                        <a href="/lupapassword" class="fs-14 fw-bolder"
                                            style="color: var(--fks-secondary, #DAA916); font-family: Poppins; font-size: 14px; font-style: normal; font-weight: 500; line-height: 140%;">Lupa
                                            Kata Sandi?</a>
                                    </div>
                                </div>


                                <div class="text-center">

                                    <button type="submit" class="btn btn-lg w-100 mb-4"
                                        style="background-color: #1B61AD">
                                        <span class="indicator-label text-white">Masuk</span>
                                        <span class="indicator-progress text-white">Tunggu sebentar...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                {{-- <div class="d-grid">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <span class="indicator-label">Masuk</span>
                                        <span class="indicator-progress">Tunggu Sebentar...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div> --}}
                                {{-- <a href="{{ url('authorized/google') }}"
                                    class="btn btn-flex flex-center btn-light btn-lg w-100 mb-7">
                                    <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg"
                                        class="h-20px me-3">Continue with
                                    Google</a> --}}
                            </form>

                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <!--end::Footer-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
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
    <script src="{!! asset('assets/js/custom/authentication/sign-in/general.js') !!}"></script>

    @include('layouts.support.bundle.bundlefooter')

</body>
