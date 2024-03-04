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
                            <form class="form w-100     w-lg-500px" novalidate="novalidate" id="kt_sign_in_form"
                                method="POST" name="form-resetpass" action="javascript:kirimResetToken()">
                                @csrf
                                {{-- <div class="text-center mb-7">
                                <h1 class="text-dark mb-3">Sign In</h1>
                                <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                                </div>
                                </div> --}}
                                <div class="text-center mb-7">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">Lupa Password</h1>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <div class="text-gray-400 fw-bold fs-5">Masukkan alamat email yang terkait dengan
                                        akun Anda dan kami akan mengirimkan Anda tautan untuk mengatur ulang kata sandi.
                                    </div>
                                    <!--end::Link-->
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="form-label fs-14 fw-bolder text-dark">Email</label>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                        id="email" type="email" name="email" placeholder="Masukkan Email Anda"
                                        required autocomplete="email" autofocus>
                                    {{-- value="{{ old('email') }}" --}}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="text-center">

                                    <button type="submit" id="pencet-reset" class="btn btn-lg w-100 mb-4 text-white"
                                        style="background-color: #1B61AD">
                                        <span class="indicator-label text-white">Reset Password</span>
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
    <script src="../assets/js/quickact.js"></script>

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

        function kirimResetToken() {
            var form = "form-resetpass";
            var data = new FormData($('[name="' + form + '"]')[0]);
            // var button = ('#pencet-reset');
            // quick.loadingBtn(button)
            $("#pencet-reset").text("Tunggu sebentar...").prop("disabled", true);

            axios.post("/api/auth/kirimResetPass", data, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        // 'Content-Type': 'multipart/form-data', // Jangan ditambahkan header ini
                    }
                })
                .then(response => {
                    if (response.data.success) {
                        // quick.unloadingBtn(button)
                        $("#pencet-reset").text("Submit").prop("disabled", false);

                        quick.toastNotif({
                            title: response.data.message,
                            icon: 'success',
                            timer: 3000,
                            callback: function() {
                                window.location.href = '/login';
                            }

                        });
                    } else {
                        // Tampilkan SweetAlert gagal
                        // quick.unloadingBtn(button)

                        quick.toastNotif({
                            title: response.data.message,
                            icon: 'error',
                            timer: 3000,
                            // callback: function() {
                            //     window.location.reload()
                            // }
                        });
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your Axios operation:', error);
                    // Tangani kesalahan khusus untuk token tidak cocok
                    if (error.response && error.response.status === 400 && error.response.data.message ===
                        'Invalid token.') {
                        // Tampilkan SweetAlert token tidak cocok
                        quick.toastNotif({
                            title: "Token tidak valid!",
                            icon: 'error',
                            timer: 3000,
                            // callback: function() {
                            //     window.location.reload()
                            // }
                        })
                    } else {
                        // Tampilkan SweetAlert error umum
                        quick.toastNotif({
                            title: "Terjadi kesalahan saat memproses permintaan.",
                            icon: 'error',
                            timer: 3000,
                            // callback: function() {
                            //     window.location.reload()
                            // }
                        });
                    }
                });
        }
    </script>
    <script src="{!! asset('assets/js/custom/authentication/sign-in/general.js') !!}"></script>

    @include('layouts.support.bundle.bundlefooter')

</body>
