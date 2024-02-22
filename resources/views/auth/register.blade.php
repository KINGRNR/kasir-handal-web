@include('layouts.support.bundle.bundleheader')
<script src="../assets/js/quickact.js"></script>

<style>
    .loading-spinner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        /* Hitam dengan opasitas 0.8 */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        /* Menempatkan di atas elemen-elemen lain */
    }

    .loading-spinner-overlay {
        text-align: center;
    }

    .fs-md-70px {
        font-size: 70px;
    }

    @media (min-width: 768px) {
        .fs-md-70px {
            font-size: 10px;
        }
    }
</style>

<body id="kt_body" class="app-blank" style="background: #fff">
    <div class="loading">
        {{-- <div class="loading-spinner">
            <div class="loading loading-spinner-overlay" id="loading-spinner"><button class="btn btn-primary" type="button"
                    disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button></div>
        </div> --}}
    </div>

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
                            <form class="form w-100 w-lg-500px" name="form-register" action="javascript:signup()"
                                novalidate="novalidate" id="kt_sign_up_form" method="POST">
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
                                {{-- <div class="row fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6" for="name">Nama</label>
                                    <input id="name" type="text"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Masukkan nama lengkap">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    
                                    <div class="fv-row mb-7">
                                        <label class="form-label fw-bolder text-dark fs-6" for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Masukkan alamat email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                                        <div class="mb-1">
                                            <label class="form-label fw-bolder text-dark fs-6" for="password">Password</label>
                                            <div class="position-relative mb-3">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password" placeholder="Masukkan kata sandi">
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
                                        <div class="text-muted">Gunakan 8 atau lebih karakter dengan campuran huruf, angka, dan simbol.
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="fv-row mb-2">
                                        <label class="form-label fw-bolder text-dark fs-6" for="password-confirm">Konfirmasi Password</label>
                                        <input id="password-confirm" type="password"
                                            class="form-control form-control-lg form-control-solid" name="password_confirmation"
                                            required autocomplete="new-password" placeholder="Ulangi kata sandi">
                                    </div>
                                    
                                    <div class="fv-row mb-5">
                                        <label class="form-label fw-bolder text-dark fs-6" for="server_key">Server Key</label>
                                        <input id="server_key" type="text"
                                            class="form-control form-control-lg form-control-solid" name="server_key"
                                            required placeholder="Masukkan kunci server Midtrans">
                                    </div>
                                    
                                    <div class="fv-row mb-5">
                                        <label class="form-label fw-bolder text-dark fs-6" for="client_key">Client Key</label>
                                        <input id="client_key" type="text"
                                            class="form-control form-control-lg form-control-solid" name="client_key"
                                            required placeholder="Masukkan kunci klien Midtrans">
                                    </div>
                                    
                                    <div class="fv-row mb-10">
                                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="toc" value="1" required />
                                            <span class="form-check-label fw-bold text-gray-700 fs-6">Saya Setuju dengan
                                                <a href="#" class="ms-1 link-primary">Syarat dan Ketentuan</a>.</span>
                                        </label>
                                    </div> --}}
                                <div id="step-1" class="step">
                                    <div class="fv-row mb-7">
                                        <label class="form-label fw-bolder text-dark fs-6" for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Masukkan alamat email">
                                        <div id="email-error" class="invalid-feedback" style="display: none;"></div>
                                    </div>

                                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                                        <div class="mb-1">
                                            <label class="form-label fw-bolder text-dark fs-6"
                                                for="password">Password</label>
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
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                </div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                </div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                </div>
                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-muted">Gunakan 8 atau lebih karakter dengan campuran huruf,
                                            angka,
                                            dan simbol.
                                        </div>
                                        <div id="password-error" class="invalid-feedback" style="display: none;"></div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="fv-row mb-2">
                                        <label class="form-label fw-bolder text-dark fs-6"
                                            for="password-confirm">Konfirmasi
                                            Password</label>
                                        <div class="position-relative mb-3">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-lg form-control-solid"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Ulangi kata sandi">
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                onclick="togglePassword('password-confirm')">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <div id="password-confirm-error" class="invalid-feedback"
                                            style="display: none;">
                                        </div>
                                    </div>
                                    {{-- <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#midtransModal">Informasi
                                    Midtrans</button> --}}

                                    <button class="btn btn-primary" type="button" id="next-step-1" style="background-color: #1B61AD">Lanjut</button>
                                    <!-- Step 2: Masukkan nama toko dan nama pemilik -->
                                </div>
                                <div id="step-2" class="step" style="display: none;">
                                    <div class="row fv-row mb-7">
                                        <label class="form-label fw-bolder text-dark fs-6" for="store-name">Nama
                                            Toko</label>
                                        <input id="store-name" type="text" name="store-name"
                                            class="form-control form-control-lg form-control-solid" required
                                            placeholder="Masukkan nama toko">
                                    </div>
                                    <div class="row fv-row mb-7">
                                        <label class="form-label fw-bolder text-dark fs-6" for="owner-name">Nama
                                            Pemilik</label>
                                        <input id="owner-name" type="text" name="owner-name"
                                            class="form-control form-control-lg form-control-solid" required
                                            placeholder="Masukkan nama pemilik">
                                    </div>
                                    <button class="btn btn-primary" type="button" id="next-step-2" style="background-color: #1B61AD">Lanjut</button>
                                    <button class="btn btn-secondary" type="button"
                                        id="prev-step-2">Kembali</button>
                                </div>

                                <!-- Step 3: Hubungkan ke Midtrans dengan input server key dan client key -->
                                <div id="step-3" class="step" style="display: none;">
                                    <div class="text-center mb-4">
                                        <h1 class="text-dark mb-3">Sambungkan Midtrans</h1>
                                    </div>
                                    <div class="row fv-row mb-7">
                                        <label class="form-label fw-bolder text-dark fs-6" for="server-key">Server
                                            Key</label>
                                        <input id="server-key" type="text" name="server-key"
                                            class="form-control form-control-lg form-control-solid" required
                                            placeholder="Masukkan kunci server Midtrans">
                                    </div>
                                    <div class="row fv-row mb-7">
                                        <label class="form-label fw-bolder text-dark fs-6" for="client-key">Client
                                            Key</label>
                                        <input id="client-key" type="text" name="client-key"
                                            class="form-control form-control-lg form-control-solid" required
                                            placeholder="Masukkan kunci klien Midtrans">
                                    </div>
                                    <button class="btn btn-primary" type="button"
                                        onclick="showStep4()">Lanjut</button>

                                    <button class="btn btn-secondary" type="button"
                                        id="prev-step-3">Kembali</button>
                                    <button class="btn btn-info" type="button" onclick="showStep4()">Lewati</button>
                                    <button class="btn btn-info" type="button" data-bs-toggle="modal"
                                        data-bs-target="#midtransModal">Informasi
                                        Midtrans</button>
                                </div>
                                <div id="step-4" class="step" style="display: none;">
                                    <h2 class="text-center">Syarat & Ketentuan</h2>
                                    <ol>
                                        <li>Pendaftaran: Pengguna harus mendaftar dengan informasi yang valid sebelum
                                            menggunakan aplikasi.</li>
                                        <li>Privasi dan Keamanan: Data pengguna harus dijaga kerahasiaannya dan aplikasi
                                            harus menyediakan perlindungan keamanan yang memadai.</li>
                                        <li>Pembayaran dan Penagihan: Biaya langganan, biaya transaksi, dan kebijakan
                                            pengembalian dana harus dijelaskan dengan jelas.</li>
                                        <li>Perilaku Pengguna: Pengguna harus mengikuti pedoman perilaku yang etis dan
                                            tidak
                                            merugikan orang lain.</li>
                                        <li>Konten yang Dilarang: Konten ilegal atau melanggar hak cipta tidak diizinkan
                                            dalam aplikasi.</li>
                                        <li>Pemutusan Layanan: Pihak penyedia berhak memutuskan layanan jika pengguna
                                            melanggar syarat dan ketentuan yang ditetapkan.</li>
                                        <li>Persetujuan: Pengguna harus menyetujui syarat dan ketentuan sebelum
                                            menggunakan
                                            aplikasi.</li>
                                    </ol>

                                    <!-- Tambahkan checkbox untuk menyetujui Term & Condition -->
                                    <div class="form-check mb-5">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="agree-checkbox">
                                        <label class="form-check-label" for="agree-checkbox">
                                            Saya menyetujui Syartat & Ketentuan
                                        </label>
                                    </div>
                                    <!-- Tambahkan tombol untuk membuat akun -->
                                    <button class="btn btn-primary" type="submit" id="create-account-button"
                                        disabled>Buat Akun</button>
                                    <button class="btn btn-secondary" type="button"
                                        id="prev-step-4">Kembali</button>

                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>  
        <!-- Modal -->
        <div class="modal fade" id="midtransModal" tabindex="-1" role="dialog" aria-labelledby="midtransModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="midtransModal">Informasi Mengenai Midtrans</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Penjelasan tentang keuntungan dan kekurangan Midtrans -->
                        <p>Midtrans merupakan sebuah platform penyedia payment gateway yang memudahkan semua
                            pembayaran non tunai</p>
                        <p>Manfaat dari menggunakan Midtrans di aplikasi ini adalah:</p>
                        <ul>
                            <li>Memungkinkan pembayaran online dengan berbagai metode pembayaran.</li>
                            <li>Memiliki sistem keamanan yang terjamin.</li>
                        </ul>
                        <p>Tapi tenang anda masih bisa menggunakan aplikasi kasir ini tanpa penyambungan ke
                            midtrans, namun hanya bisa menggunakan metode pembayaran tunai</p>

                        <!-- Video tutorial tentang penggunaan Midtrans -->
                        <h3>Tutorial untuk penyambungan akun midtrans anda dengan aplikasi kasir kami</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <!-- Masukkan kode untuk menampilkan video tutorial -->
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal" onclick="showStep4()">Lewati</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Lanjutkan
                            Penyambungan</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            function togglePassword(inputId) {
                var input = document.getElementById(inputId);
                var icon = input.nextElementSibling.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            }
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
            $(document).ready(function() {
                // Fungsi validasi password di input konfirmasi password
                $("#password-confirm").on("input", function() {
                    var password = $("#password").val();
                    var confirmPassword = $(this).val();

                    if (password !== confirmPassword) {
                        $("#password-confirm-error").text("Konfirmasi password tidak cocok.");
                        $("#password-confirm-error").show();
                    } else {
                        $("#password-confirm-error").hide();
                    }
                });

            });
            $(document).ready(function() {
                function showPasswordError() {
                    // $("#password-error").text("Konfirmasi password tidak cocok.");
                    $("#password-error").show();
                }

                function hidePasswordError() {
                    $("#password-error").hide();
                }

                function checkPasswordStrength(password) {


                    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

                    return regex.test(password);
                }
                $("#password").on("input", function() {
                    var password = $(this).val();
                    var confirmPassword = $("#password-confirm").val();

                    // if (password !== confirmPassword) {
                    //     showPasswordError();
                    //     return;
                    // } else {
                    //     hidePasswordError();
                    // }

                    if (!checkPasswordStrength(password)) {
                        $("#password-error").text(
                            "Sandi harus terdiri minimal 8 karakter dengan campuran huruf, angka, dan simbol"
                        );
                        $("#password-error").show();
                    } else {
                        hidePasswordError();
                    }
                });
                $("#email").on("input", function() {
                    var email = $(this).val();
                    var errorDiv = $("#email-error");

                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!emailPattern.test(email)) {
                        errorDiv.text("Alamat email tidak valid.");
                        errorDiv.show();
                    } else {
                        errorDiv.hide();
                    }
                });

                var currentStep = 1;
                $("#next-step-1").click(function() {
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var confirmPassword = $("#password-confirm").val();
                    var password = $("#password").val();
                    var confirmPassword = $("#password-confirm").val();

                    if (password !== confirmPassword) {
                        return;
                    }
                    if (email.indexOf('@') === -1) {
                        $("#email-error").text("Alamat email tidak valid.");
                        $("#email-error").show();
                        return;
                    } else {
                        $("#email-error").hide();
                    }

                    if (!email || !password || !confirmPassword) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Mohon lengkapi semua kolom.',
                        });
                        return;
                    }

                    // Jika semua input valid, lanjutkan ke langkah berikutnya
                    $("#step-1").hide();
                    $("#step-2").show();
                    currentStep = 2;
                });


                $("#next-step-2").click(function() {
                    var toko = $("#store-name").val();
                    var pemilik = $("#owner-name").val();
                    if (!toko || !pemilik) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Mohon lengkapi semua kolom.',
                        });
                        return;
                    }
                    $("#step-2").hide();
                    $("#midtransModal").modal("show");
                    $("#step-3").show();
                    currentStep = 3;
                });


                $("#prev-step-2").click(function() {
                    $("#step-2").hide();
                    $("#step-1").show();
                    currentStep = 1;
                });

                $("#prev-step-3").click(function() {
                    $("#midtransModal").modal("show");

                    $("#step-3").hide();
                    $("#step-2").show();
                    currentStep = 2;
                });
                $("#prev-step-4").click(function() {
                    $("#step-4").hide();
                    $("#step-2").show();
                    currentStep = 2;
                });
                $("#agree-checkbox").change(function() {
                    if ($(this).is(":checked")) {
                        $("#create-account-button").prop("disabled", false);
                    } else {
                        $("#create-account-button").prop("disabled", true);
                    }
                });
                $("#skip-step").click(function() {
                    // Jika pengguna memilih untuk melewati langkah, Anda dapat menentukan perilaku di sini
                    // Misalnya, langsung ke halaman login
                });

                // $("#submit-form").click(function() {
                //     // Lakukan pengiriman data atau validasi di sini
                //     // Setelah selesai, Anda dapat mengarahkan pengguna ke halaman login atau ke halaman selanjutnya
                //     // window.location.href = '/login';
                // });
            });

            function showStep4() {
                $("#step-3").hide();
                $("#step-4").show();
            }

            function signup() {
                var form = "form-register";
                var data = new FormData($('[name="' + form + '"]')[0]);
                var button = $('#create-account-button');

                button.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...');

                // Men-disable tombol
                button.prop('disabled', true);
                // Hapus bagian koding Cropper.js dan formulir gambar yang berkaitan
                quick.blockPage()

                axios.post("/api/auth/register", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            // 'Content-Type': 'multipart/form-data', // Jangan ditambahkan header ini
                        }
                    })
                    .then(response => {
                        quick.unblockPage()
                        if (response.data.success) {
                            quick.toastNotif({
                                title: response.data.message,
                                icon: 'success',
                                timer: 1500,
                                callback: function() {
                                    window.location.href = `/aktivasiakun?id=${response.data.id}`;
                                }
                            });
                        } else {
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
                    });
            }
        </script>
        @include('layouts.support.bundle.bundlefooter')

</body>
