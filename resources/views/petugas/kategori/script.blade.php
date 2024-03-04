{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> --}}
<script src="../assets/js/quickact.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    // Swal.fire.defaults.animation = false;
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        console.log("tes")
        init();
        $('.menu-link').removeClass('active');
        $('.kategori').addClass('active');
        // var avatar1 = new KTImageInput('kt_image_1');

    });

    init = async () => {
        
        await initializeDataTables();
        // quick.unblockPage()
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });
    //filter
    var filterDatatable = [];
    var menutable = null;

    function initializeDataTables(filterDatatable) {
        menutable = $('#table-kategori').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'kategori/showKategori',
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + localStorage.getItem('bearerToken')
                },
            },
            columns: [{
                    "targets": 0,
                    render: function(data, type, row, meta) {
                        return '<span class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) +
                            '</span>';
                    },
                    orderable: false

                },
                {
                    data: 'kategori_logo',
                    render: function(data, type, row) {
                        return '<img src="/file/kategori_logo/' + row.kategori_logo +
                            '" alt="Logo Kategori" class="img-thumbnail" width="50" height="50">';
                    },
                    orderable: false 
                },
                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
                },

                {
                    data: 'id_kategori',
                    render: function(data, type, row) {
                        var editButton = '<button class="btn btn-sm btn-warning" onclick="edit(' +
                            row.id_kategori + ')">Edit</button>';

                        var deleteButton = '<button class="btn btn-sm btn-danger" onclick="deleteRow(' +
                            row.id_kategori + ')">Hapus</button>';

                        return editButton + ' ' + deleteButton;
                    },
                }
            ]

        });

        $('#search_menu').on('input', function() {
            var searchValue = $(this).val();
            menutable.search(searchValue).draw();
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
                $('.image-input-wrapper').css('background-image', 'url("' + APP_URL +
                    'file/kategori_logo/' + data.kategori_logo + '")');
                $('#modalKategori').modal('show');
                $('#foto_kategori').removeAttr('required');
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
        $('.image-input-wrapper').css('background-image', 'url("../file/blank.webp")');

        $('#formKategori').trigger('reset');
        $('#id_kategori').val(null);
        $('#foto_kategori').attr('required', true);
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
                                title: 'Sukses Hapus Merek!',
                                icon: 'success',
                                timer: 1000,
                                callback: function() {
                                    menutable.ajax.reload();
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
                                title: 'Sukses',
                                icon: 'success',
                                timer: 1000,
                                callback: function() {
                                    menutable.ajax.reload();
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
