{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> --}}
{{-- <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> --}}
<script src="../assets/js/quickact.js"></script>

<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        console.log("tes")
        init();
        $('.menu_link').removeClass('active');
        $('.petugas').addClass('active');
    });

    init = async () => {
        await initializeDataTables();
        // quick.unblockPage()
    }
    //filter
    var filterDatatable = [];
    var menutable = null;

    function initializeDataTables(filterDatatable) {
        menutable = $('#table-toko').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'user/showToko',
                type: "POST",
                dataType: "json",
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
                    data: 'toko_id',
                    name: 'toko_id'
                },
                {
                    data: 'toko_nama',
                    name: 'toko_nama'
                },
                {
                    data: 'created_at',
                    render: function(data, type, row) {
                        return quick.convertDate(row.created_at)
                    }
                }, {
                    data: 'toko_id',
                    render: function(data, type, row) {
                        var editButton =
                            '<button class="btn btn-sm btn-primary edit-btn" onclick="detail(this)" data-id="' +
                            row.toko_id + '">Buka</button>';
                        var deleteButton =
                            '<button class="btn btn-sm btn-danger delete-btn" onclick="deleteRow(this)" data-id="' +
                            row.toko_id +
                            '">Delete</button>';

                        return editButton + ' ' + deleteButton;
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

    // function switchForm() {
    //     $('.table-switch-petugas').fadeOut(100);
    //     $('.form').fadeIn();
    // }

    // function switchTable() {
    //     $('.form').fadeOut(100);
    //     $('.table-switch-petugas').fadeIn();
    // }
    function deleteRow(atr) {
        var id = $(atr).attr('data-id');
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
                axios.post("/user/delete", {
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

    function wipeData() {
        $('#formPetugas').trigger('reset');
        $('#id').val(null);

    }

    function detail(atr) {
        $('.table-switch').hide();
        $('.detail-toko').show()
        
        // axios.post("/user/detail", {
        //         id: id
        //     }, {
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //             // 'Content-Type': 'multipart/form-data',
        //         }
        //     })
        //     .then(response => {
        //         let data = response.data
        //         console.log(data);
        //         $('#id').val(data.id);
        //         $('#name').val(data.name);
        //         $('#email').val(data.email)
        //         $('#modalPetugas').modal('show');

        //     })
        //     .catch(error => {
        //         console.error('There has been a problem with your Axios operation:', error);
        //     });
    }

    function save() {
        var form = "formPetugas";
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
                axios.post("/user/savePetugas", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'multipart/form-data',
                        }
                    })
                    .then(response => {
                        if (response.data.success) {
                            $('#formModule').trigger('reset');
                            $(".close-modal").trigger('click');
                            quick.toastNotif({
                                title: 'success',
                                icon: 'success',
                                timer: 1500,
                                callback: function() {
                                    location.reload()
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
