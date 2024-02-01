@include('layouts.support.bundle.bundleheader')

<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-900px positon-xl-relative"
                style="background: linear-gradient(180deg, #2F3281 0%, #40A0B6 66.27%, #08C0B5 100%);">

            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" id="form-register" novalidate="novalidate" id="kt_sign_up_form"
                            method="POST">
                            @csrf
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Buat Akun untuk Melihat Fitur</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Sudah Punya Akun?
                                    <a href="/login" class="link-primary fw-bolder">Masuk Sekarang</a>
                                </div>
                                <!--end::Link-->
                            </div>
                            <div class="row fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6"> Name</label>
                                    <input id="name" type="text"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                        autofocus>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input id="email" type="email"
                                    class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <div class="position-relative mb-3">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
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
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
                                    symbols.
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="fv-row mb-2">
                                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input id="password-confirm" type="password"
                                    class="form-control form-control-lg form-control-solid" name="password_confirmation"
                                    required autocomplete="new-password">
                            </div>
                            <div class="text-center mb-5">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Hubungkan ke Midtrans anda</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <!--end::Link-->
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6">Server Key</label>
                                <input id="server_key" type="text
                                "
                                    class="form-control form-control-lg form-control-solid" name="server_key"
                                    required>
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6">Client Key</label>
                                <input id="client_key" type="text
                                "
                                    class="form-control form-control-lg form-control-solid" name="client_key"
                                    required>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                        <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                                </label>
                            </div>
                            <div class="row mb-0">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        submit
                                        {{-- <span class="indicator-label">Register</span>
                                        <span class="indicator-progress">Please wait... --}}
                                        {{-- <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
                                    </button>
                                </div>
                            </div>
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
        $('#form-register').on('submit', function submit(e) {
            e.preventDefault();
            $('#loading-spinner').css('display', '')

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(res) {
                    window.location.href = '/login';
                },
                error: function(xhr, status, error) {
                    var message = xhr.responseJSON.message;
                    if (message) {
                        // Menggabungkan pesan-pesan kesalahan menjadi satu pesan
                        var errorMessage = Object.values(message).join('<br>');
                        $('#loading-spinner').css('display', 'none')

                        // Menampilkan pesan kesalahan dengan Swal
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: errorMessage,
                        });
                    }
                }

            });
        });
    </script>
    @include('layouts.support.bundle.bundlefooter')

</body>
