{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> --}}
<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<script src="../assets/js/quickact.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script type="module" src="script.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js"></script>

<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        quick.dateRangeFilter('#filter_rtransaksi')
        init();
        $('.menu-link').removeClass('active');
        $('.kategori').addClass('active');
        const urlParams = new URLSearchParams(window.location.search);
        const invoiceParam = urlParams.get('invoice');
        if (invoiceParam) {
            changePage(invoiceParam);
        }


    });

    init = async () => {
        await initializeDataTables();
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });
    //filter
    function changePage(invoice) {

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
    resetFilter = () =>
    {
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
                        return quick.convertDate(row.penjualan_created_at);;
                    }
                }
            ]

        });

        $('#search_menu').on('input', function() {
            var searchValue = $(this).val();
            menutable.search(searchValue).draw();
        });

        // $('#table-user tbody').on('click', 'tr', function() {
        //     let rowData = userTable.row(this).data();
        //     if (rowData) {
        //         let id = rowData.id;
        //         onDetail(id);
        //     } else {
        //         onReset();
        //         $('#formExample').find('input, select').removeAttr('disabled');
        //         $('.actCreate').removeClass('d-none');
        //         $('.actEdit').addClass('d-none');
        //     }
        // }).css('cursor', 'pointer');
    }

    function exportToExcel() {
        console.log(menutable);
        var data = menutable.rows().data().toArray();

        // Membuat instance Workbook dari ExcelJS
        var workbook = new ExcelJS.Workbook();
        var worksheet = workbook.addWorksheet('Data');

        // Mengatur header kolom
        worksheet.columns = [{
                header: 'No',
                key: 'no'
            },
            {
                header: 'ID Penjualan',
                key: 'penjualan_id'
            },
            {
                header: 'Total Harga',
                key: 'penjualan_total_harga'
            },
            {
                header: 'Nama Pelanggan',
                key: 'nama_pelanggan'
            },
            {
                header: 'Tanggal Penjualan',
                key: 'penjualan_created_at'
            }
        ];

        data.forEach(function(row, index) {
            worksheet.addRow({
                no: index + 1,
                penjualan_id: row.penjualan_id,
                penjualan_total_harga: row.penjualan_total_harga,
                nama_pelanggan: row.nama_pelanggan,
                penjualan_created_at: row.penjualan_created_at
            });
        });

        // Menyimpan workbook ke file Excel
        workbook.xlsx.writeBuffer().then(function(buffer) {
            saveAs(new Blob([buffer]), 'data_excel.xlsx');
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
                                timer: 500,
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
                                timer: 500,
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
</script>
