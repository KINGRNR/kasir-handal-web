@include('layouts.support.bundle.bundleheader')

<body id="kt_body" class="app-blank" style="background: #fff">
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-900px positon-xl-relative w-xxl-800px"
                {{-- style="background: linear-gradient(180deg, #2F3281 24.41%, #40A0B6 76.35%, #08C0B5 100%)"> --}} style="background: #2F3281">

            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"
                            name="form-aktivasi" action="javascript:aktivasiakun()">
                            @csrf
                            {{-- <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In</h1>
                                <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                                </div>
                            </div> --}}
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Aktivasi Akun</h1>
                            </div>
                            <div class="fv-row mb-10">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="role" name="role">
                                <label class="form-label fs-14 fw-bolder text-dark">Email</label>
                                <input
                                    class="form-control @error('email') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                    id="email" type="email" name="email" placeholder="Your E-mail" required
                                    autocomplete="email" disabled>
                                {{-- value="{{ old('email') }}" --}}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row password-input d-none" data-kt-password-meter="true">
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

                            <div class="fv-row mb-2 password-input d-none">
                                <label class="form-label fw-bolder text-dark fs-6" for="password-confirm">Konfirmasi
                                    Password</label>
                                <input id="password-confirm" type="password"
                                    class="form-control form-control-lg form-control-solid" name="password_confirmation"
                                    required autocomplete="new-password" placeholder="Ulangi kata sandi">
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-14 fw-bolder text-dark">Kode Aktivasi</label>
                                <input
                                    class="form-control form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                                    id="token" type="text" name="token" placeholder="Enter your Kode Aktivasi"
                                    required>
                                {{-- value="{{ old('email') }}" --}}
                            </div>

                            <div class="text-center">

                                <button type="submit" id="" class="btn btn-lg w-100 mb-4"
                                    style="background-color: #1B61AD">
                                    <span class="indicator-label text-white">Aktivasi Akun</span>
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

    <script>
        $(document).ready(function() {
            var urlString = window.location.href;
            var url = new URL(urlString);
            var id = url.searchParams.get("id");
            console.log(id);
            $('#id').val(id)

            axios.post("/api/auth/checkaccount", {
                    id: id
                }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        // 'Content-Type': 'multipart/form-data', // Jangan ditambahkan header ini
                    }
                })
                .then(response => {
                    var data = response.data
                    if (data.active == 0 && data.users_role_id == "BfiwyVUDrXOpmStr") {
                        $('#email').val(data.email)
                        $('#role').val(data.users_role_id)

                        $('.password-input').remove()
                    } else if (data.active == 0 && data.users_role_id == "TKQR2DSJlQ5b31V2") {
                        $('#email').val(data.email)
                        $('#role').val(data.users_role_id)

                        $('.password-input').removeClass('d-none')

                    } else if (data.active == 1) {
                        location.href = "/login"
                    } else if (data == null) {
                        location.href = "/login"
                    } else {
                        location.href = "/login"
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your Axios operation:', error);
                });
            if (!id) {
                location.href = "/login"
            }
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

        function aktivasiakun() {
            var form = "form-aktivasi";
            var data = new FormData($('[name="' + form + '"]')[0]);
            axios.post("/api/auth/aktivasiakun", data, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        // 'Content-Type': 'multipart/form-data', // Jangan ditambahkan header ini
                    }
                })
                .then(response => {
                    if (response.data.success) {
                        // Tampilkan SweetAlert sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Aktivasi Berhasil',
                            text: response.data.message,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/login';
                            }
                        });
                    } else {
                        // Tampilkan SweetAlert gagal
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.data.message,
                            confirmButtonText: 'OK',
                        });
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your Axios operation:', error);
                    // Tangani kesalahan khusus untuk token tidak cocok
                    if (error.response && error.response.status === 400 && error.response.data.message ===
                        'Invalid token.') {
                        // Tampilkan SweetAlert token tidak cocok
                        Swal.fire({
                            icon: 'error',
                            title: 'Token Invalid',
                            text: 'Token yang Anda masukkan tidak valid.',
                            confirmButtonText: 'OK',
                        });
                    } else {
                        // Tampilkan SweetAlert error umum
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan saat memproses permintaan.',
                            confirmButtonText: 'OK',
                        });
                    }
                });
        }
    </script>
    @include('layouts.support.bundle.bundlefooter')

</body>
