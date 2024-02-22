@include('layouts.support.bundle.bundleheader')

<body id="kt_body" class="app-blank" style="background: #fff">
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-lg-500px w-xl-900px position-xl-relative w-xxl-800px justify-content-center align-items-center"
                style="background: #fff;">
                {{-- <h1 class="text-center text-white " style="font-size: 70px;">KasirHandal</h1> --}}
                <img src="file/vector-kasir-3.png" class="d-none d-lg-block w-75 max-w-100 h-auto ms-5"
                    style="max-width: 75%;" alt="Logo Ipsum Logo">
            </div>

            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class=p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100     w-lg-500px" novalidate="novalidate" id="kt_sign_in_form" method="POST"
                            name="form-aktivasi" action="javascript:submitResetPasswordForm()">
                            @csrf
                            {{-- <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In</h1>
                                <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                                </div>
                            </div> --}}
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Ubah Kata Sandi</h1>
                                {{-- <div class="text-gray-400 fw-bold fs-4">Silakan cek email Anda untuk melihat token.
                                </div> --}}
                                {{-- <a href="/login" class="link-primary fw-bolder">Tidak menerima email? Klik di sini</a> --}}
                            </div>


                        
                            <div class="mb-10 fv-row password-input " data-kt-password-meter="true">
                                <div class="mb-1">
                                    <label class="form-label fw-bolder text-dark fs-6" for="password">Password</label>
                                    <div class="position-relative mb-3">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            placeholder="Masukkan kata sandi">
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3"
                                        data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Gunakan 8 atau lebih karakter dengan campuran huruf, angka,
                                    dan simbol.
                                </div>
                                <div id="password-error" class="invalid-feedback" style="display: none;"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="fv-row mb-10 password-input">
                                <input type="hidden" name="token" id="token">
                                <label class="form-label fw-bolder text-dark fs-6" for="password-confirm">Konfirmasi
                                    Password</label>
                                <input id="password-confirm" type="password"
                                    class="form-control form-control-lg form-control-solid" name="password_confirmation"
                                    required autocomplete="new-password" placeholder="Ulangi kata sandi">
                            </div>
                        
                            <div class="text-center">

                                <button type="submit" id="" class="btn btn-lg w-100 mb-4"
                                    style="background-color: #1B61AD">
                                    <span class="indicator-label text-white">Ubah Kata Sandi</span>
                                    <span class="indicator-progress text-white">Tunggu sebentar...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/quickact.js"></script>

    <script>
        $(document).ready(function() {
            var urlString = window.location.href;
            var url = new URL(urlString);
            var id = url.searchParams.get("token");
            console.log(id);
            if(!id){
                window.location.href='/login'
            }
            $('#token').val(id)
            
        });

        togglePassword = () => {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text')
                $('.far.fa-eye').removeClass('fa-eye').addClass('fa-eye-slash')
            } else {
                $('.far.fa-eye-slash').removeClass('fa-eye-slash').addClass('fa-eye')
                $('#password').attr('type', 'password')
            }
        }

        function submitResetPasswordForm() {
            var form = "form-aktivasi";
            var data = new FormData($('[name="' + form + '"]')[0]);
            axios.post("/api/auth/submitResetPasswordForm", data, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        // 'Content-Type': 'multipart/form-data', // Jangan ditambahkan header ini
                    }
                })
                .then(response => {
                    if (response.data.success) {
                        // Tampilkan SweetAlert sukses
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
                            title: error.response.data.message,
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
    @include('layouts.support.bundle.bundlefooter')

</body>
