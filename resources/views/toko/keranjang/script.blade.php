{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
{{-- <link  href="../assets/plugins/custom/cropper/cropper.bundle.css" rel="stylesheet">
<script src="../assets/js/documentation/general/cropper.bundle.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="../assets/js/quickact.js"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-UQCyL2vrXEl4EHhd"></script>
<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        console.log("tes")
        init();
        $('.menu_link').removeClass('active');
        $('.keranjang').addClass('active');
    });

    init = async () => {
        await showProduk();
        // quick.unblockPage()
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });


    function showProduk() {
        // $('#formKategori').trigger('reset');
        // $('#id_kategori').val(null);

        axios.post("/produk/showProdukCart", {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    // 'Content-Type': 'multipart/form-data',
                }
            })
            .then(response => {
                let data = response.data
                console.log(data);
                $.each(data, function(i, v) {
                    console.log(v);

                    var produk = `
                    <div class="col-md-4 mb-4">
                        <div class="card border rounded text-center">
                            <img src="/file/produk_foto/${v.foto_produk}" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <p class="card-text mb-2">${v.nama_kategori}</p>
                                <h6 class="card-title mb-2">${v.nama_produk}</h6>
                                <p class="card-text mb-2"><span class="badge bg-success">${quick.formatRupiah(v.harga_produk)}</span>
                                </p>
                                <p class="card-text">Tersedia : ${v.stok_produk}</p>
                                <button class="btn btn-sm btn-primary" id="tambahkeranjang${v.id_produk}" onclick="tambahKeranjang(${v.id_produk})">Tambah ke Keranjang</button>
                            </div>
                        </div>
                    </div>

              `
                    $('.produk-container').append(produk)
                })


            })
            .catch(error => {
                console.error('There has been a problem with your Axios operation:', error);
            });
    }
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
                        <button class="btn btn-sm btn-secondary" onclick="decrementQuantity(${maxQuantity}, ${data.harga_produk}, ${id})">-</button>
                        <span class="mx-2" id="quantity${id}">${quantity}</span>
                        <button class="btn btn-sm btn-primary" onclick="incrementQuantity(${maxQuantity}, ${data.harga_produk}, ${id})">+</button>
                    </td>
                    <td class="min-w-125px" id="harga${id}">${data.harga_produk}</td>

                </tr>
            `;
                var form = `
                    <input type="text" name="id_produk${productCounter}" id="id_produk${productCounter}" class="min-w-125px id_produk" value="${data.id_produk}"></input>

                   <input type="text" name="nama_produk${productCounter}" id="nama_produk${productCounter}" class="min-w-125px" value="${data.nama_produk}"></input>
                    <input type="text"name="qty_produk${productCounter}" id="qty_produk${productCounter}" class="quantity-controls${id}" value="${quantity}">
                    </input>
                    <input type="text" name="harga_produk${productCounter}" id="harga_produk${productCounter}" value="${data.harga_produk}"></input>

            `;
                $('.form-produk').append(form);
                $('#idProduk').append(keranjang);
                updateTotalPrice(totalPrice += data.harga_produk);

            })
            .catch(error => {
                maxQuantity
                console.error('There has been a problem with your Axios operation:', error);
            });
    }

    function startTransaksi() {
        var form = "formTransaksi";
        var formData = new FormData($('[name="' + form + '"]')[0]);

        var numberOfSections = $('.id_produk').length;
        for (var id = 1; id <= numberOfSections; id++) {
            formData.append('id_produk' + id, $('#id_produk' + id).val());
            formData.append('nama_produk' + id, $('#nama_produk' + id).val());
            formData.append('qty_produk' + id, $('#qty_produk' + id).val());
            formData.append('harga_produk' + id, $('#harga_produk' + id).val());
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
                                alert("payment success!");
                                console.log(result);
                                console.log('data yang perlu dibawa lagi =' + response.data)
                                saveTransaction(response.data.dataPenjualan, result);
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
    };

    function saveTransaction(data, result) {
        axios.post("/pay/saveTransaction", { data: data, result: result }, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                }
            })
            .then(response => {
                console.log(response)
                window.location.href = '/report-penjualan?invoice='+ response.data.id_penjualan;
            })
            .catch(error => {
                console.error('Ada masalah dengan operasi Axios menyimpan transaksi:', error);
            });
    }

    function incrementQuantity(maxQuantity, harga, id) {
        var currentQuantity = parseInt($('#quantity' + id).text());
        if (currentQuantity < maxQuantity) {
            $('#quantity' + id).text(currentQuantity + 1);
            $(`.quantity-controls${id}`).val(currentQuantity + 1);
            console.log(id)
            var count = currentQuantity + 1;
            $('#harga' + id).text(harga * count);
            $('#harga_produk' + id).text(harga * count);
            updateTotalPrice(totalPrice + harga);
        }
    }

    function decrementQuantity(maxQuantity, harga, id) {
        var currentQuantity = parseInt($('#quantity' + id).text());
        if (currentQuantity > 1) {
            $('#quantity' + id).text(currentQuantity - 1);
            $(`.quantity-controls${id}`).val(currentQuantity - 1);

            var count = currentQuantity - 1;
            $('#harga' + id).text(harga * count);
            $('#harga_produk' + id).text(harga * count);
            updateTotalPrice(totalPrice - harga);
        }
    }

    function updateTotalPrice(newTotalPrice) {
        totalPrice = newTotalPrice;
        console.log('Total Price:', totalPrice);
        $('#total_harga').val(totalPrice);
        // Trigger a custom event
        $(document).trigger('totalPriceChanged', [totalPrice]);
    }
</script>
