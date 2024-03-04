<script src="../assets/js/quickact.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js"></script>
<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        init();
        $('.menu-link').removeClass('active');
        $('.profile').addClass('active');
        const urlParams = new URLSearchParams(window.location.search);
        const invoiceParam = urlParams.get('open');
        if (invoiceParam == "midtrans") {
            switchMidtrans();
            // $('.midtrans-key').addClass('active')
        }

    });

    init = async () => {
        await loadProfile()
    }

    function loadProfile() {
        $.ajax({
            url: APP_URL + 'profile/indexPetugas',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                console.log(response);
                var toko = response.toko
                var user = response.user
                // var riwayat = ''
                // $('.total_saldo').text(quick.formatRupiah(response.total_saldo));
                $('.val_nama').text(user.name)
                $('.val_nama_toko').text(toko.toko_nama)
                $('.val_email').text(user.email)
                $('.val_head_name').text(toko.toko_nama)
                $('.email-header').html(user.name + `<span class="badge badge-light-success fw-bolder fs-8 ms-2">Petugas
                                                        Kasir</span>`)

                $('#toko_id').val(toko.toko_id)
                $('.img-placement').append(`<img src="/file/blank.webp" alt="image" />`)



            },


            error: function(xhr, status, error) {
                console.error('Ada masalah dalam mengambil data penjualan:', error);
            }
        });
    }

    function switchProfile(a) {
        $('.link-tab').removeClass('active');
        $(a).addClass('active');
        $('.detail-all').hide();
        $('.detail-profile').show();
    }

    function switchSandi(a) {
        $('.link-tab').removeClass('active');
        $(a).addClass('active');
        $('.detail-all').hide();
        $('.detail-sandi').show();
    }

    function switchMidtrans(a) {
        $('.link-tab').removeClass('active');
        $(a).addClass('active');
        $('.detail-all').hide();
        $('.detail-midtrans').show();
    }

    function switchEditProfil(a) {
        $(a).hide();
        $('.kembali').show();
        $('.container-show').hide();
        $('.container-form').show();
    }

    function switchShowProfil(a) {
        $(a).hide();
        $('.edit-prof').show();
        $('.container-form').hide();
        $('.container-show').show();
    }

    function saveMidtransKey() {
        var form = "formMidtrans";
        var data = new FormData($('[name="' + form + '"]')[0]);
        // $('#submit-btn').prop('disabled', true);
        // console.log(data);
        Swal.fire({
            title: 'Apakah data yang anda input sudah benar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("/profile/saveMidtransKey", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'multipart/form-data',
                        }
                    })
                    .then(response => {
                        if (response.data.success) {
                            quick.toastNotif({
                                title: response.data.message,
                                icon: 'success',
                                timer: 1500,
                                callback: function() {
                                    window.location.reload()
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error('There has been a problem with your Axios operation:', error);
                    });
            }
        });
    };

    function saveProfileToko() {
        var form = "formProfileToko";
        var data = new FormData($('[name="' + form + '"]')[0]);
        // $('#submit-btn').prop('disabled', true);
        // console.log(data);
        Swal.fire({
            title: 'Apakah data yang anda input sudah benar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("/profile/saveProfileToko", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'multipart/form-data',
                        }
                    })
                    .then(response => {
                        if (response.data.success) {
                            quick.toastNotif({
                                title: response.data.message,
                                icon: 'success',
                                timer: 1500,
                                callback: function() {
                                    window.location.reload()
                                }
                            });
                        } else {
                            quick.toastNotif({
                                title: response.data.message,
                                icon: 'error',
                                timer: 4000,
                            });
                        }
                    })
                    .catch(error => {
                        console.error('There has been a problem with your Axios operation:', error);
                    });
            }
        });
    };

    function resetPassword() {
        var oldPassword = document.getElementById('old_pass').value;
        var newPassword = document.getElementById('new_pass').value;
        var confirmPassword = document.getElementById('new_pass-confirm').value;

        var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
        if (!passwordPattern.test(newPassword)) {
            $("#password-error").text(
                "Sandi harus terdiri minimal 8 karakter dengan campuran huruf, angka, dan simbol"
            );
            $("#password-error").show();
            return;
        } else {
            $("#password-error").hide();
        }

        if (newPassword !== confirmPassword) {
            $("#password-confirm-error").text("Konfirmasi password tidak cocok.");
            $("#password-confirm-error").show();
            return;
        } else {
            $("#password-confirm-error").hide();
        }

        // Menampilkan konfirmasi swal
        Swal.fire({
            title: 'Apakah anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan tombol "Ya, ubah kata sandi"
                axios.post('/profile/ubahPassword', {
                    oldPassword: oldPassword,
                    newPassword: newPassword
                }).then(function(response) {
                    if (response.data.success) {
                        quick.toastNotif({
                            title: response.data.message,
                            icon: 'success',
                            timer: 1500,
                            callback: function() {
                                window.location.reload()
                            }
                        });
                    } else {
                        quick.toastNotif({
                            title: 'Kata Sandi lama salah',
                            icon: 'error',
                            timer: 1500,
                        });
                    }
                }).catch(function(error) {
                    if (error.response.status === 401) {
                        quick.toastNotif({
                            title: "Error!",
                            icon: 'error',
                            timer: 1500,
                        });
                    } else {
                        quick.toastNotif({
                            title: "Error!",
                            icon: 'error',
                            timer: 1500,
                            callback: function() {
                                window.location.reload()
                            }
                        });
                    }
                });
            }
        });
    }

</script>
