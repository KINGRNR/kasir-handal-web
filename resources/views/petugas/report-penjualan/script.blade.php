{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> --}}
{{-- <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> --}}
<script src="../assets/js/quickact.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- <script type="module" src="script.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        quick.dateRangeFilter('#filter_rtransaksi')
        quick.dateRangeFilter('#filter_rexport')


        init();
        $('.menu-link').removeClass('active');
        $('.penjualan').addClass('active');
        const urlParams = new URLSearchParams(window.location.search);
        const invoiceParam = urlParams.get('invoice');
        if (invoiceParam) {
            changePage(invoiceParam);
        } else {
            $('.report-penjualan').show();
        }


    });

    init = async () => {
        await initializeDataTables();
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });
    //filter
    function switchPage() {
        $('.invoice').hide();
        $('.invoice').empty();
        $('.report-penjualan').show();
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.delete('invoice');

        // Replace the current URL without the INVOICE parameter
        window.history.replaceState({}, document.title, window.location.pathname + '?' + urlParams.toString());
    }

    function changePage(invoice) {
        $('.report-penjualan ').hide();
        $('.invoice ').show();
        axios.post("/pay/showDetailTransaction", {
                id: invoice
            }, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    // 'Content-Type': 'multipart/form-data',
                }
            })
            .then(response => {
                let data = response.data

                var invoice = `
                <div class="mb-3">
                <button type="button" class="btn btn-secondary" onclick="switchPage()">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
                </div>
                <div class="card">
                    <div class="card-body p-lg-20">
                        <div class="d-flex flex-column flex-xl-row">
                            <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                <div class="mt-n1">
                                    {{-- <div class="d-flex flex-stack pb-10 align-items-center justify-content-end"> --}}
                                    {{-- <a href="#">
                                            <img alt="Logo" src="assets/media/svg/brand-logos/code-lab.svg">
                                        </a> --}}
                                    {{-- </div> --}}
                                    <div class="m-0">
                                        <div class="d-flex  gap-3">
                                            <div class="fw-bolder fs-3 text-gray-800">${data.toko.toko_nama } #${data.penjualan.penjualan_id}</div>

                                            <span class="badge badge-success" style="font-size: 1em;">${data.penjualan.penjualan_payment_method == 1 ? 'Tunai' : (data.penjualan.penjualan_payment_method == 2 ? 'Non Tunai' : 'Undefined')}</span>
                                        </div>
                                        <div class="row g-5 mb-11">
                                            <div class="col-sm-6">
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Petugas Kasir :</div>
                                                <div class="fw-bolder fs-6 text-gray-800"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Waktu Pembayaran</div>
                                                <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                    <span class="pe-2 waktu-pembayaran">${quick.convertDateTime(data.penjualan.penjualan_created_at)}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row g-5 mb-12">
                                            <div class="col-sm-6 detail_pelanggan">
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Detail Pelanggan:</div>
                                                <div class="fw-bolder fs-6 text-gray-800">Nama : ${data.pelanggan.nama_pelanggan}</div>
                                                <div class="fw-bold fs-7 text-gray-600">Email : ${data.pelanggan.email_pelanggan}</div>
                                                <div class="fw-bold fs-7 text-gray-600">No Telp : ${data.pelanggan.no_hp}</div>
                                            </div>
                                            <div class="col-sm-6 detail_toko">
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Detail Toko</div>
                                                <div class="fw-bolder fs-6 text-gray-800">Nama Toko : ${data.toko.toko_nama}</div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Produk</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Harga Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="total d-flex justify-content-end">
                                            <p class="m-0"><strong>Total:</strong>${quick.formatRupiah(data.penjualan.penjualan_total_harga)}</p>
                                        </div>

                                        <div class="d-flex gap-2 mt-3 justify-content-end">
                                            <button type="button" onclick="sendEmail(this)" data-id="${data.penjualan.penjualan_id}" class="btn btn-success"><i class="fas fa-envelope fa-2x"></i>
                                                Kirim Email</button>
                                        {{-- <button type="button" onclick="sendWhatsapp()" class="btn btn-success"><i class="fab fa-whatsapp fa-2x"></i>
                                                Kirim Whatsapp</button> --}}
                                            <button type="button" onclick="printStruk(data)" class="btn btn-success"><i class="fas fa-print fa-2x"></i> Print
                                                Struk</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.invoice').append(invoice);
                $('.invoice .table tbody').empty();

                // Append table rows
                $.each(data.detail_penjualan, function(index, item) {
                    let tableRow = `
                <tr>
                <td>${item.nama_produk}</td>
                <td>${item.jumlah_barang}</td>
                <td>${quick.formatRupiah(item.harga_produk)}</td>
                <td>${quick.formatRupiah(item.sub_total)}</td>
                </tr>
                `;
                    $('.invoice .table tbody').append(tableRow);
                });
            })
            .catch(error => {
                console.error('There has been a problem with your Axios operation:', error);
            });
    }

    var filterDatatable = [];
    var menutable = null;
    $('[name="daterangepicker"]').on('apply.daterangepicker', (event) => {
        var selectedValue = $(event.target).val();

        if (selectedValue !== '0') {
            filterDatatable.date = selectedValue;
        } else {
            delete filterDatatable.date;
        }
        if (menutable) {
            menutable.destroy();
        }
        $('.reset-filter').fadeIn();
        initializeDataTables(filterDatatable);
    });
    resetFilter = () => {
        if (menutable) {
            menutable.destroy();
        }
        // $('[name="role_filter"]').val('');
        $('.reset-filter').fadeOut();

        initializeDataTables();
    }

    function initializeDataTables(filterDatatable) {
        menutable = $('#table-report').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'pay/showTransaction',
                type: "POST",
                dataType: "json",
                data: filterDatatable,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },

            columns: [{
                    "targets": 0,
                    render: function(data, type, row, meta) {
                        return '<span class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) +
                            '</span>';
                    }
                },
                {
                    data: 'penjualan_id',
                    name: 'penjualan_id'
                },
                {
                    data: 'penjualan_total_harga',
                    render: function(data, type, row) {
                        return quick.formatRupiah(row.penjualan_total_harga);
                    }
                },
                {
                    data: 'nama_pelanggan',
                    name: 'nama_pelanggan'
                },
                {
                    data: 'penjualan_created_at',
                    render: function(data, type, row) {
                        return quick.convertDate(row.penjualan_created_at);
                    }
                }
            ],
            order: [
                [4, 'desc']
            ],
        });

        $('#search_menu').on('input', function() {
            var searchValue = $(this).val();
            menutable.search(searchValue).draw();
        });

        // Handle row click event
        $('#table-report tbody').on('click', 'tr', function() {
            var rowData = menutable.row(this).data();
            if (rowData) {
                // Redirect or do something with rowData
                changePage(rowData.penjualan_id);
            }
        }).css('cursor', 'pointer');
    }


    function sendEmail(a) {
        var button = $(a);

        button.html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...');

        // Men-disable tombol
        button.prop('disabled', true);

        var id = button.attr('data-id');

        axios.post("/pay/sendEmail", {
                id: id
            }, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'multipart/form-data',
                }
            })
            .then(response => {
                // Menghapus spinner dari tombol
                button.html('Kirim Email');

                // Mengaktifkan kembali tombol
                button.prop('disabled', false);

                if (response.data.success) {
                    quick.toastNotif({
                        title: 'Email Berhasil di Kirim!',
                        icon: 'success',
                        timer: 3000,
                        // callback: function() {
                        //     window.location.reload()
                        // }
                    });
                }
            })
            .catch(error => {
                console.error('There has been a problem with your Axios operation:', error);
                // Menghapus spinner dari tombol
                button.html('Kirim Email');

                // Mengaktifkan kembali tombol
                button.prop('disabled', false);
            });
    }


    function exportToExcel() {
        axios.post("/pay/exportExcel", {
                id: 1
            }, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(response => {
                let data = response.data.data.penjualan;
                let excelData = [];

                // Push headers
                excelData.push(['Nomor Transaksi', 'Nama Pelanggan', 'No. HP', 'Email', 'Total Harga',
                    'Detail Barang'
                ]);

                // Push each row of data
                $.each(data, function(index, item) {
                    let productDetails = '';

                    // Concatenate product details for each transaction
                    $.each(item.detail, function(detailIndex, detailItem) {
                        productDetails += detailItem.nama_produk + ' (' + detailItem.jumlah_barang +
                            '), ';
                    });

                    // Remove the trailing comma and space
                    productDetails = productDetails.replace(/,\s*$/, '');

                    // Push main transaction data along with concatenated product details
                    excelData.push([
                        item.penjualan_id,
                        item.nama_pelanggan,
                        item.no_hp,
                        item.email_pelanggan,
                        quick.formatRupiah(item.penjualan_total_harga),
                        productDetails
                    ]);
                });

                // Convert excelData to worksheet
                const worksheet = XLSX.utils.aoa_to_sheet(excelData);

                // Set default column width (example: column A to E width set to 20)
                const wscols = [{
                    wch: 20
                }, {
                    wch: 20
                }, {
                    wch: 20
                }, {
                    wch: 20
                }, {
                    wch: 20
                }, {
                    wch: 100
                }];
                worksheet['!cols'] = wscols;

                // Create workbook
                const workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Penjualan');

                // Save the workbook
                XLSX.writeFile(workbook, 'penjualan.xlsx');


            })
            .catch(error => {
                console.error('There has been a problem with your Axios operation:', error);
            });
    }



    function edit(id) {
        $('#formKategori').trigger('reset');
        $('#id_kategori').val(null);

        $.ajax({
            url: "/kategori/detail",
            type: "POST",
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                // 'Content-Type': 'multipart/form-data',
            },
            success: function(data) {
                $('#id_kategori').val(data.id_kategori);
                $('#kode_kategori').val(data.kode_kategori);
                $('#nama_kategori').val(data.nama_kategori);
                $('#modalKategori').modal('show');
            },
            error: function(error) {
                console.error('There has been a problem with your Ajax operation:', error);
            }
        });
    }

    // function edit(id) {
    //     $('#formKategori').trigger('reset');
    //     $('#id_kategori').val(null);

    //     axios.post("/kategori/detail", {
    //             id: id
    //         }, {
    //             headers: {
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
    //                 // 'Content-Type': 'multipart/form-data',
    //             }
    //         })
    //         .then(response => {
    //             let data = response.data
    //             $('#id_kategori').val(data.id_kategori);
    //             $('#kode_kategori').val(data.kode_kategori);
    //             $('#nama_kategori').val(data.nama_kategori)
    //             $('#modalKategori').modal('show');

    //         })
    //         .catch(error => {
    //             console.error('There has been a problem with your Axios operation:', error);
    //         });
    // }

    function wipeData() {
        $('#formKategori').trigger('reset');
        $('#id_kategori').val(null);

    }

    function deleteRow(id) {
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
                axios.post("/kategori/delete", {
                        id: id
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'multipart/form-data',
                        }
                    })
                    .then(response => {
                        if (response.data.success) {
                            quick.toastNotif({
                                title: 'success',
                                icon: 'success',
                                timer: 1500,
                                callback: function() {
                                    window.location.reload()
                                }
                            });
                        } else {
                            quick.toastNotif({
                                title: response.data.message,
                                icon: response.data.status,
                                timer: 2000,
                            });
                        }
                        console.log(response)

                    })
                    .catch(error => {

                        console.error('There has been a problem with your Axios operation:', error);
                    });
            }
        });
    };

    function save() {
        var form = "formKategori";
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
                axios.post("/kategori/save", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'multipart/form-data',
                        }
                    })
                    .then(response => {
                        if (response.data.success) {
                            $('#formKategori').trigger('reset');
                            $(".close-modal").trigger('click');
                            quick.toastNotif({
                                title: 'success',
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

    function printStruk(data) {
        var content = `
        <div class="container">
            <div class="header">
                <h2>Struk</h2>
            </div>

            <div class="invoice-details">
                <p><strong>Nama Pelanggan:</strong> ${data.nama_pelanggan}</p>
                <p><strong>No. Telepon:</strong> ${data.no_telp}</p>
                <p><strong>Email:</strong> ${data.email_pelanggan}</p>
                <p><strong>Transaksi Nomor:</strong> ${data.penjualan_id}</p>
                <p><strong>Tanggal Transaksi:</strong> ${data.waktu_transaksi}</p>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Harga Total</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.itemDetails.map(item => `
                        <tr>
                            <td>${item.nama_produk}</td>
                            <td>${item.qty_produk}</td>
                            <td>Rp. ${item.harga_produk.toLocaleString()}</td>
                            <td>Rp. ${(item.harga_produk * item.qty_produk).toLocaleString()}</td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>

            <div class="total">
                <p><strong>Total:</strong> Rp. ${data.total_harga.toLocaleString()}</p>
            </div>

            <div class="footer">
                <p>Terima Kasih sudah berbelanja!</p>
            </div>
        </div>
    `;

        var win = window.open('', '_blank');
        win.document.write('<html><head><title>Print Struk</title>');
        win.document.write('<style>/* Tambahkan gaya CSS Anda di sini */</style>');
        win.document.write('</head><body>');
        win.document.write(content);
        win.document.write('</body></html>');

        win.onload = function() {
            win.print();
            win.close();
        };
    }

    // Contoh penggunaan fungsi printStruk
    var data = {
        nama_pelanggan: "John Doe",
        no_telp: "123456789",
        email_pelanggan: "john@example.com",
        penjualan_id: "123456",
        waktu_transaksi: "2024-02-19",
        itemDetails: [{
                nama_produk: "Product A",
                qty_produk: 2,
                harga_produk: 50000
            },
            {
                nama_produk: "Product B",
                qty_produk: 1,
                harga_produk: 75000
            }
        ],
        total_harga: 175000
    };
</script>
