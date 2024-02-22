    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script> --}}
    {{-- <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link  href="../assets/plugins/custom/cropper/cropper.bundle.css" rel="stylesheet">
    <script src="../assets/js/documentation/general/cropper.bundle.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="../assets/js/quickact.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-UQCyL2vrXEl4EHhd"></script>
    <script>
        APP_URL = "{{ getenv('APP_URL') }}/";

        function toggleKeranjang() {
            $(".card-keranjang").slideToggle(200);
            if ($(".col-md-8").hasClass("col-md-12")) {
                $(".col-md-8").animate({
                    width: "66.66666667%"
                });
                $(".col-md-3").toggleClass("col-md-4 col-md-3");
            } else {
                $(".col-md-8").animate({
                    width: "100%"
                });
                $(".col-md-4").toggleClass("col-md-3 col-md-4");
            }
            $(".col-md-8").toggleClass("col-md-12");
        }

        $(document).ready(function() {
            $('#kt_content_container').removeClass('container-xxl').addClass('container-fluid');
            $('#customerDropdown').on('change', function() {
                var selectedCustomer = JSON.parse($(this).val());

                if (selectedCustomer) {
                    $('#nama_pelanggan').val(selectedCustomer.nama_pelanggan);
                    $('#no_telp').val(selectedCustomer.no_hp);
                    $('#email_pelanggan').val(selectedCustomer.email_pelanggan);
                } else {
                    $('#nama_pelanggan, #no_telp, #email_pelanggan').val('');
                }
            });
        });
        $(() => {
            init();
            $('.menu_link').removeClass('active');
            $('.keranjang').addClass('active');
        });

        init = async () => {
            await getKategori();
            await showProduk();
            // quick.unblockPage()
        }
        $('#modal_form').on('hidden.bs.modal', function() {
            $(`input, select`).removeAttr('disabled');
        });

        function getKategori() {
            axios.post("/produk/getKategori", {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => {
                    var data = response.data;
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#kategori_produk').append('<option value="' + value.id_kategori + '">' + value
                                .nama_kategori + '</option>');
                        });
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your Axios operation:', error);
                });
        }
        // $('#toggleExistingCustomer').change(function() {
        //     if ($(this).is(':checked')) {
        //         // Tampilkan bagian Cari Existing Pelanggan
        //         $('.carilisting').show();
        //         $('#nama_pelanggan, #no_telp, #email_pelanggan').prop('readonly', true);
        //     } else {
        //         // Sembunyikan bagian Cari Existing Pelanggan
        //         $('.carilisting').hide();
        //         $('#nama_pelanggan, #no_telp, #email_pelanggan').prop('readonly', false);
        //     }
        // });
        function cariPelanggan() {

            var email_pelanggan = $('#check_email').val();

            axios.post('/pay/cekpelanggan', {
                    email_pelanggan: email_pelanggan,
                })
                .then(function(response) {
                    if (response.data) {
                        updateCustomerDropdown(response.data);

                    } else {

                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        }

        function updateCustomerDropdown(customer) {
            var dropdown = $('#customerDropdown');
            dropdown.empty();

            dropdown.append($('<option>').text('Pilih Pelanggan').val(''));

            dropdown.append($('<option>').text(customer.nama_pelanggan).val(JSON.stringify(customer)));
        }

        // function showProduk() {
        //     axios.post("/produk/showProdukCart", {
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //             }
        //         })
        //         .then(response => {
        //             let data = response.data;
        //             console.log(data);
        //             $.each(data, function(i, v) {
        //                 console.log(v);

        //                 var stockHabis = v.stok_produk === 0 ?
        //                     '<div class="position-absolute top-50 start-50 translate-middle bg-danger bg-opacity-50 text-white p-2 rounded">Stok Habis</div>' :
        //                     '';

        //                 var warnaCard = v.stok_produk === 0 ? 'text-muted' :
        //                     '';

        //                 var produk = `
    //         <div class="col-md-4 mb-4 ">
    //             <div class="card border rounded text-center ${v.stok_produk === 0 ? 'bg-light' : ''}">

    //                 <div class="ratio ratio-16x9 z-3">
    //                     <img src="/file/produk_foto/${v.foto_produk}" alt="Product Image" class="img-thumbnail object-fit-cover" style="object-fit: contain;">
    //                 </div>
    //                 ${stockHabis} 
    //                 <div class="card-body">
    //                     <p class="card-text mb-2">${v.nama_kategori}</p>
    //                     <h6 class="card-title mb-2">${v.nama_produk}</h6>
    //                     <p class="card-text mb-2"><span class="badge bg-success">${quick.formatRupiah(v.harga_produk)}</span></p>
    //                     <p class="card-text">Tersedia : ${v.stok_produk}</p>
    //                     <button class="btn btn-sm btn-primary" id="tambahkeranjang${v.id_produk}" onclick="tambahKeranjang(${v.id_produk})" ${v.stok_produk === 0 ? 'disabled' : ''}>Tambah ke Keranjang</button>
    //                 </div>
    //             </div>
    //         </div>
    //         `;

        //                 $('.produk-container').append(produk);
        //             });
        //         })
        //         .catch(error => {
        //             console.error('There has been a problem with your Axios operation:', error);
        //         });
        // }
        function showProduk() {
            var kategori = $('#kategori_produk').val();
            var searchQuery = $('#search').val();

            axios.post("/produk/showProdukCart", {
                    kategori: kategori,
                    search: searchQuery,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => {
                    $('.produk-container').empty();

                    let data = response.data;
                    console.log(data);

                    if (data.length === 0) {
                        $('.produk-container').append(
                            '<div class="text-center">Tidak ada produk yang ditemukan.</div>');
                        return;
                    }

                    var produkStokAda = [];
                    var produkStokHabis = [];

                    $.each(data, function(i, v) {
                        console.log(v);

                        var stockHabis = v.stok_produk === 0 ?
                            '<div class="position-absolute top-50 start-50 translate-middle bg-danger bg-opacity-50 text-white p-2 rounded">Stok Habis</div>' :
                            '';

                        var warnaCard = v.stok_produk === 0 ? 'text-muted' : '';

                        var produk = `
                    <div class="col-md-4 mb-4 ">
                        <div class="card border rounded text-center ${v.stok_produk === 0 ? 'bg-light' : ''}">
                            
                            <div class="ratio ratio-16x9 z-3">
                                <img src="/file/produk_foto/${v.foto_produk}" alt="Product Image" class="img-thumbnail object-fit-cover" style="object-fit: contain;">
                            </div>
                            ${stockHabis} 
                            <div class="card-body">
                                <p class="card-text mb-2">${v.nama_kategori}</p>
                                <h6 class="card-title mb-2">${v.nama_produk}</h6>
                                <p class="card-text mb-2"><span class="badge bg-success">${quick.formatRupiah(v.harga_produk)}</span></p>
                                <p class="card-text">Tersedia : ${v.stok_produk}</p>
                                <button class="btn btn-sm btn-primary" id="tambahkeranjang${v.id_produk}" onclick="tambahKeranjang(${v.id_produk})" ${v.stok_produk === 0 ? 'disabled' : ''}>Tambah ke Keranjang</button>
                            </div>
                        </div>
                    </div>
                `;

                        if (v.stok_produk === 0) {
                            produkStokHabis.push(produk);
                        } else {
                            produkStokAda.push(produk);
                        }
                    });

                    produkStokAda.forEach(function(produk) {
                        $('.produk-container').append(produk);
                    });

                    produkStokHabis.forEach(function(produk) {
                        $('.produk-container').append(produk);
                    });
                })
                .catch(error => {
                    console.error('There has been a problem with your Axios operation:', error);
                });
        }


        // Panggil fungsi showProduk saat filter berubah atau pencarian dilakukan
        $(document).ready(function() {
            $('#kategori_produk, #search').on('change keyup', function() {
                showProduk();
            });
        });


        var totalPrice = 0;
        var productCounter = 0;

        function tambahKeranjang(id) {
            $('#tambahkeranjang' + id).addClass('d-none');
            axios.post("/produk/addCart", {
                    id: id
                }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => {
                    let data = response.data;
                    console.log(data);
                    productCounter++;

                    var maxQuantity = data.stok_produk; // Maximum quantity is the available stock
                    var quantity = 1; // Default quantity
                    var id = data.id_produk;
                    var keranjang = `
                                            <tr>
                                                <td class="ps-4">#</td>
                                                <td class="min-w-125px">${data.nama_produk}</td>
                                                <td class="min-w-125px quantity-controls">
                                                    <span onclick="decrementQuantity(${maxQuantity}, ${data.harga_produk}, ${id})" style="cursor: pointer;">
                                                        <i class="fas fa-minus"></i>
                                                    </span>
                                                    <span class="mx-2" id="quantity${id}">${quantity}</span>
                                                    <span onclick="incrementQuantity(${maxQuantity}, ${data.harga_produk}, ${id})" style="cursor: pointer;">
                                                        <i class="fas fa-plus"></i>
                                                    </span>
                                                    <span onclick="hapusItemKeranjang(${id}, ${data.harga_produk}, ${productCounter})" style="cursor: pointer;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                                <td class="min-w-150px" id="harga${id}" >${quick.formatRupiah(data.harga_produk)}</td>
                                                
                                            </tr>
                                        `;

                    var form = `
                    <div id="input-group${productCounter}">
                            <input type="text" name="id_produk${productCounter}" id="id_produk${productCounter}" class="min-w-125px id_produk" value="${data.id_produk}"></input>

                        <input type="text" name="nama_produk${productCounter}" id="nama_produk${productCounter}" class="min-w-125px" value="${data.nama_produk}"></input>
                            <input type="text"name="qty_produk${productCounter}" id="qty_produk${productCounter}" class="quantity-controls${id}" value="${quantity}">
                            </input>
                            <input type="text" name="harga_produk${productCounter}" id="harga_produk${productCounter}" value="${data.harga_produk}"></input>
                        </div>
                    `;
                    $('.form-produk').append(form);
                    $('#idProduk').append(keranjang);
                    console.log(data.harga_produk);
                    var hargaProduk = parseFloat(data.harga_produk);
                    hargaProduk = Math.floor(hargaProduk);
                    console.log(hargaProduk)
                    updateTotalPrice(totalPrice + hargaProduk);

                })
                .catch(error => {
                    maxQuantity
                    console.error('There has been a problem with your Axios operation:', error);
                });
        }

        function inputDataHarga() {
            // $('#formTransaksi input[type="text"]').each(function() {
            //     if ($(this).val() === '') {
            //         isValid = false;
            //         return false;
            //     }
            // });

            // if (!isValid) {
            //     quick.toastNotif({
            //         title: 'Mohon lengkapi semua data produk terlebih dahulu!',
            //         icon: 'warning',
            //         timer: 1500,
            //     });
            //     // alert("");
            //     return;
            // }
            var totalHarga = $('#total_harga').val();
            $('#total_harga_cash').val(totalHarga);
            if (totalHarga) {
                $('#bayarCashModal').modal('show');

            }
        }

        function hitungKembalian() {
            var totalHarga = parseFloat($('#total_harga').val());
            var jumlahUangCash = parseFloat($('#jumlah_uang_cash').val());
            var kembalian = jumlahUangCash - totalHarga;
            $('#kembalian_cash').val(kembalian);
            startTransaksiCash()
        }

        function startTransaksiCash() {
            var form = "formTransaksi";
            var formData = new FormData($('[name="' + form + '"]')[0]);
            var jumlah_uang_cash = $('#jumlah_uang_cash').val();
            var kembalian_cash = $('#kembalian_cash').val();
            formData.append('jumlah_uang_cash', jumlah_uang_cash);
            formData.append('kembalian_cash', kembalian_cash);
            var produkData = [];
            $('.form-produk > div').each(function(index) {
                var id_produk = $(this).find('input[name^="id_produk"]').val();
                var nama_produk = $(this).find('input[name^="nama_produk"]').val();
                var qty_produk = $(this).find('input[name^="qty_produk"]').val();
                var harga_produk = $(this).find('input[name^="harga_produk"]').val();

                produkData.push({
                    id_produk: id_produk,
                    nama_produk: nama_produk,
                    qty_produk: qty_produk,
                    harga_produk: harga_produk
                });
            });

            // Menambahkan data produk ke FormData
            formData.append('produkData', JSON.stringify(produkData));

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
                    axios.post("/pay/initiateCashPayment", formData, {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Content-Type': 'application/json',
                            }
                        }).then(response => {
                            console.log(response)
                            let dataPenjualan = response.data.dataPenjualan;
                            let totalPembayaran = dataPenjualan.total_harga;
                            let kembalian = dataPenjualan.kembalian_cash;
                            let uangTunai = dataPenjualan.jumlah_uang_cash;
                            Swal.fire({
                                title: 'Transaksi Berhasil!',
                                html: `<p>Metode Pembayaran : Tunai</p>
                                        <p>Total Harga : ${quick.formatRupiah(totalPembayaran)}</p>
                                        <p>Total Bayar : ${quick.formatRupiah(uangTunai)}</p>
                                        <p>Kembalian : ${quick.formatRupiah(kembalian)}</p>`,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Lanjut',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    saveTransaction(response.data.dataPenjualan, null);
                                }
                            });
                        })
                        .catch(error => {
                            console.error('There has been a problem with your Axios operation:', error);
                        });
                }
            });
        }

        function startTransaksi() {
            var form = "formTransaksi";
            var formData = new FormData($('[name="' + form + '"]')[0]);

            // Mengumpulkan data produk dari input di form HTML
            var produkData = [];
            $('.form-produk > div').each(function(index) {
                var id_produk = $(this).find('input[name^="id_produk"]').val();
                var nama_produk = $(this).find('input[name^="nama_produk"]').val();
                var qty_produk = $(this).find('input[name^="qty_produk"]').val();
                var harga_produk = $(this).find('input[name^="harga_produk"]').val();

                produkData.push({
                    id_produk: id_produk,
                    nama_produk: nama_produk,
                    qty_produk: qty_produk,
                    harga_produk: harga_produk
                });
            });

            // Menambahkan data produk ke FormData
            formData.append('produkData', JSON.stringify(produkData));
            // $('#formTransaksi input[type="text"]').each(function() {
            //     if ($(this).val() === '') {
            //         isValid = false;
            //         return false;
            //     }
            // });

            // if (!isValid) {
            //     quick.toastNotif({
            //         title: 'Mohon lengkapi semua data produk terlebih dahulu!',
            //         icon: 'warning',
            //         timer: 1500,
            //         // callback: function() {
            //         //     window.location.reload()
            //         // }
            //     });
            //     // alert("");
            //     return;
            // }
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
                    axios.post("/pay/initiatePayment", formData, {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Content-Type': 'application/json',
                            }
                        })
                        .then(response => {
                            console.log(response)
                            let token = response.data
                            window.snap.pay(token.snapToken, {
                                onSuccess: function(result) {
                                    quick.blockPage();
                                    quick.toastNotif({
                                        title: 'Transaksi Berhasil!',
                                        icon: 'success',
                                        timer: 1000,
                                        callback: function() {
                                            saveTransaction(response.data.dataPenjualan,
                                                result);
                                        }
                                    });
                                },
                                onPending: function(result) {
                                    alert("wating your payment!");
                                    console.log(result);
                                },
                                onError: function(result) {
                                    alert("payment failed!");
                                    console.log(result);
                                },
                                onClose: function() {
                                    alert('you closed the popup without finishing the payment');
                                }
                            })
                        })
                        .catch(error => {
                            console.error('There has been a problem with your Axios operation:', error);
                        });
                }
            });
        }

        function initiatebayarCash() {
            $('#formTransaksi input[type="text"]').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false;
                }
            });

            if (!isValid) {
                quick.toastNotif({
                    title: 'Mohon lengkapi semua data produk terlebih dahulu!',
                    icon: 'warning',
                    timer: 1500,
                    // callback: function() {
                    //     window.location.reload()
                    // }
                });
                // alert("");
                return;
            }
            var form = "formTransaksi";
            var formData = new FormData($('[name="' + form + '"]')[0]);

            // Mengumpulkan data produk dari input di form HTML
            var produkData = [];
            $('.form-produk > div').each(function(index) {
                var id_produk = $(this).find('input[name^="id_produk"]').val();
                var nama_produk = $(this).find('input[name^="nama_produk"]').val();
                var qty_produk = $(this).find('input[name^="qty_produk"]').val();
                var harga_produk = $(this).find('input[name^="harga_produk"]').val();

                produkData.push({
                    id_produk: id_produk,
                    nama_produk: nama_produk,
                    qty_produk: qty_produk,
                    harga_produk: harga_produk
                });
            });

            // Menambahkan data produk ke FormData
            formData.append('produkData', JSON.stringify(produkData));
            var isValid = true;
            $('#formTransaksi input[type="text"]').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false;
                }
            });

            if (!isValid) {
                alert("Mohon lengkapi semua data produk terlebih dahulu!");
                return;
            }
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
                    axios.post("/pay/initiatePayment", formData, {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Content-Type': 'application/json',
                            }
                        })
                        .then(response => {
                            console.log(response)
                            let token = response.data
                            window.snap.pay(token.snapToken, {
                                onSuccess: function(result) {
                                    quick.blockPage();
                                    quick.toastNotif({
                                        title: 'Transaksi Berhasil!',
                                        icon: 'success',
                                        timer: 1000,
                                        callback: function() {
                                            saveTransaction(response.data.dataPenjualan,
                                                result);
                                        }
                                    });
                                },
                                onPending: function(result) {
                                    alert("wating your payment!");
                                    console.log(result);
                                },
                                onError: function(result) {
                                    alert("payment failed!");
                                    console.log(result);
                                },
                                onClose: function() {
                                    alert('you closed the popup without finishing the payment');
                                }
                            })
                        })
                        .catch(error => {
                            console.error('There has been a problem with your Axios operation:', error);
                        });
                }
            });
        }

        // function toggleKeranjang2() {
        //     var keranjang = document.querySelector('.card-keranjang');
        //     if (keranjang.style.right === '-400px') {
        //         keranjang.style.right = '0';
        //     } else {
        //         keranjang.style.right = '-400px';
        //     }
        // }


        function saveTransaction(data, result) {
            axios.post("/pay/saveTransaction", {
                    data: data,
                    result: result
                }, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    quick.unblockPage();
                    // var data = response.data.data
                    // openStruk(data)
                    // location.reload()
                    window.location.href = '/petugas/report-penjualan?invoice=' + response.data.id_penjualan;
                })
                .catch(error => {
                    console.error('Ada masalah dengan operasi Axios menyimpan transaksi:', error);
                });
        }

        function openStruk(data) {
            $("#itemDetailsContainer").empty();

            // Iterate over item details and append to the modal
            for (let i = 1; i <= 3; i++) {
                const productIdKey = 'id_produk' + i;
                const productNameKey = 'nama_produk' + i;
                const productPriceKey = 'harga_produk' + i;
                const productQtyKey = 'qty_produk' + i;

                if (
                    data[productIdKey] &&
                    data[productNameKey] &&
                    data[productPriceKey] &&
                    data[productQtyKey]
                ) {
                    const itemDetail = `
            <p>ID: ${data[productIdKey]}</p>
            <p>Name: ${data[productNameKey]}</p>
            <p>Price: ${data[productPriceKey]}</p>
            <p>Quantity: ${data[productQtyKey]}</p>
            <hr>
            `;
                    $("#itemDetailsContainer").append(itemDetail);
                }
            }
        }

        function incrementQuantity(maxQuantity, harga, id) {
            var currentQuantity = parseInt($('#quantity' + id).text());
            if (currentQuantity < maxQuantity) {
                $('#quantity' + id).text(currentQuantity + 1);
                $(`.quantity-controls${id}`).val(currentQuantity + 1);
                console.log(id)
                var count = currentQuantity + 1;
                $('#harga' + id).text(quick.formatRupiah(harga * count));
                $('#harga_produk' + id).text(harga * count);

                console.log(harga)
                updateTotalPrice(totalPrice + harga);
            }
        }

        function decrementQuantity(maxQuantity, harga, id) {
            var currentQuantity = parseInt($('#quantity' + id).text());
            if (currentQuantity > 1) {
                $('#quantity' + id).text(currentQuantity - 1);
                $(`.quantity-controls${id}`).val(currentQuantity - 1);

                var count = currentQuantity - 1;
                $('#harga' + id).text(quick.formatRupiah(harga * count));
                $('#harga_produk' + id).text(harga * count);
                updateTotalPrice(totalPrice - harga);
            }
        }

        function hapusItemKeranjang(id, harga, inputId) {
            var currentQuantity = parseInt($('#quantity' + id).text());
            var subtotal = harga * currentQuantity; 
            $('#tambahkeranjang' + id).removeClass('d-none');

            $(`#id_produk${id}`).remove();
            $(`#nama_produk${id}`).remove();
            $(`#qty_produk${id}`).remove();
            $(`#harga_produk${id}`).remove();
            $(`#quantity${id}`).closest('tr').remove();
            $(`#input-group${inputId}`).remove();

            updateTotalPrice(totalPrice - subtotal);
        }


        function updateTotalPrice(newTotalPrice) {
            totalPrice = newTotalPrice;
            console.log('Total Price:', totalPrice);
            $('#total_harga').val(totalPrice);
            $('#total_harga_prev').val(quick.formatRupiah(totalPrice));

            console.log(totalPrice)
            $(document).trigger('totalPriceChanged', [totalPrice]);
        }
    </script>
