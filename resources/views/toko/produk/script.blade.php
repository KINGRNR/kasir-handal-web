{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> --}}
{{-- <link  href="../assets/plugins/custom/cropper/cropper.bundle.css" rel="stylesheet">
<script src="../assets/js/documentation/general/cropper.bundle.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="../assets/js/quickact.js"></script>

<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        console.log("tes")
        init();
        $('.menu_link').removeClass('active');
        $('.barang').addClass('active');
    });

    init = async () => {
        await initializeDataTables();
        await getKategori();
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
                        $('#id_produk_kategori').append('<option value="' + value.id_kategori + '">' + value
                            .nama_kategori + '</option>');
                    });
                } else {
                    // Menampilkan SweetAlert jika data kategori kosong
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Tidak ada merek yang tersedia.',
                        icon: 'warning',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        footer: '<a href="/toko/kategori" class="btn btn-primary">Tambah Merek</a>'
                    });
                }
            })
            .catch(error => {
                console.error('There has been a problem with your Axios operation:', error);
            });
    }

    $(document).ready(function() {
        $('#harga_produk').on('input', function() {
            var inputValue = $(this).val();
            var numericValue = inputValue.replace(/\D/g, ''); // Remove non-numeric characters
            var formattedValue = formatRupiah(numericValue);
            $(this).val(formattedValue);
        });

        // Fungsi untuk format rupiah
        function formatRupiah(value) {
            var numberString = value.toString().replace(/\D/g, '');
            var split = numberString.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        // When submitting the form, get the numeric value without separators
        $('#yourFormId').submit(function() {
            var numericValue = $('#harga_produk').val().replace(/\D/g, '');
            $('#harga_produk').val(numericValue);
        });
    });

    //filter
    var filterDatatable = [];
    var menutable = null;

    function initializeDataTables(filterDatatable) {
        menutable = $('#table-produk').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'produk/showProduk',
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
                    data: 'foto_produk',
                    render: function(data, type, row) {
                        return '<img src="/file/produk_foto/' + row.foto_produk +
                            '" alt="Product Image" class="img-thumbnail" width="50" height="50">';
                    }
                },
                {
                    data: 'nama_produk',
                    name: 'nama_produk'
                },
                {
                    data: 'harga_produk',
                    render: function(data, type, row) {
                        return `<span class="">${quick.formatRupiah(row.harga_produk)}</span>`;
                    }
                },
                {
                    data: 'stok_produk',
                    name: 'stok_produk',
                    render: function(data, type, row) {
                        var stokHtml = '<span class="editable-stok">' + row.stok_produk + '</span>';
                        stokHtml +=
                            '<i class="fas fa-pencil-alt ms-2 edit-stok" style="cursor: pointer;" onclick="editStok(this)"></i>';
                        stokHtml +=
                            '<i class="fas fa-check ms-2 save-stok d-none" style="cursor: pointer;" onclick="saveStok(' +
                            row.id_produk + ')"></i>';
                        return stokHtml;
                    }
                },

                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
                },
                {
                    data: 'kategori_logo',
                    render: function(data, type, row) {
                        return '<img src="/file/kategori_logo/' + row.kategori_logo +
                            '" alt="Logo Kategori" class="img-thumbnail" width="50" height="50">';
                    }

                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        console.log(row);
                        var editButton = '<button class="btn btn-sm btn-warning" onclick="editRow(' +
                            row.id_produk + ')">Edit</button>';

                        var deleteButton = '<button class="btn btn-sm btn-danger" onclick="deleteRow(' +
                            row.id_produk + ')">Delete</button>';

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
    //     $('.table-switch-produk').animate({
    //         top: '250px',
    //         opacity: '0'
    //     }, function() {
    //         $('.formProduk').show();
    //         $('.formProduk').animate({
    //             top: '0px',
    //             opacity: '1'
    //         });
    //         $('.table-switch-produk').hide();
    //     });
    // }

    // function switchTable() {
    //     // Animate the form upward and fade it out
    //     $('.formProduk').animate({
    //         top: '-250px',
    //         opacity: '0'
    //     }, function() {
    //         // Animation complete, show the table and hide the form
    //         $('.table-switch-produk').show();
    //         $('.table-switch-produk').animate({
    //             top: '0px',
    //             opacity: '1'
    //         });

    //         $('.formProduk').hide();
    //     });
    // }
    function editStok(icon) {
        var cell = $(icon).closest('td');
        var editableStok = cell.find('.editable-stok');
        var inputStok = $('<input type="number" class="form-control input-stok" value="' + editableStok.text() + '">');
        // Tambahkan max-width
        inputStok.css('max-width', '100px'); // Sesuaikan dengan kebutuhan lebar maksimum
        var iconSave = cell.find('.save-stok');
        var iconCancel = $('<i class="fas fa-times ms-2 cancel-stok" style="cursor: pointer;"></i>'); // Ikon "batal"
        var container = $('<div class="d-flex align-items-center"></div>'); // Wadah untuk input dan ikon
        container.append(inputStok);
        container.append(iconSave);
        container.append(iconCancel);
        cell.find('.edit-stok').hide();
        editableStok.hide();
        cell.append(container);
        iconSave.removeClass('d-none');
        iconCancel.click(function() {
            inputStok.remove();
            cell.find('.edit-stok').show();
            editableStok.show();
            iconSave.addClass('d-none');
            iconCancel.remove();
        });
    }

    function editRow(id) {
        $('#formProduk').trigger('reset');
        $('#id_produk').val(null);
        $.ajax({
            url: "/produk/detail",
            type: "POST",
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                // 'Content-Type': 'multipart/form-data',
            },
            success: function(data) {
                console.log(data)
                $('#id_produk').val(data.id_produk);
                $('#harga_produk').val(data.harga_produk);
                $('#nama_produk').val(data.nama_produk);
                $('.image-input-wrapper').css('background-image', 'url("' + APP_URL +
                    'file/produk_foto/' + data.foto_produk + '")');
                $('#stok_produk').val(data.stok_produk)
                $('#id_produk_kategori').val(data.id_produk_kategori);

                $('#modalProduk').modal('show');
            },
            error: function(error) {
                console.error('There has been a problem with your Ajax operation:', error);
            }
        });
    }

    function saveStok(id) {
        var cell = $('td').has('input[type="number"]');
        var inputStok = cell.find('input');
        var newStok = inputStok.val();
        $.ajax({
            url: APP_URL + 'produk/updateStok',
            type: 'POST',
            dataType: 'json',
            data: {
                id_produk: id,
                stok_produk: newStok,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Tampilkan kembali stok dalam bentuk teks setelah berhasil disimpan
                inputStok.remove();
                cell.find('.editable-stok').text(newStok).show();
                cell.find('.edit-stok').show();
                cell.find('.cancel-stok').addClass('d-none');
                cell.find('.save-stok').addClass('d-none'); // Sembunyikan ikon simpan
                // cell.find('.input-stok').val('');
            },
            error: function(xhr, status, error) {
                // Tambahkan penanganan kesalahan jika diperlukan
                console.error('Gagal memperbarui stok:', error);
            }
        });
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
                axios.post("/produk/delete", {
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
        var form = "formProduk";
        var data = new FormData($('[name="' + form + '"]')[0]);

        // Hapus bagian koding Cropper.js dan formulir gambar yang berkaitan

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
                axios.post("/produk/saveMob", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            // 'Content-Type': 'multipart/form-data', // Jangan ditambahkan header ini
                        }
                    })
                    .then(response => {
                        console.log(response)
                        if (response.data.success) {
                            $('#formProduk').trigger('reset');
                            $(".close-modal").trigger('click');
                            quick.toastNotif({
                                title: 'success',
                                icon: 'success',
                                timer: 1500,
                                callback: function() {
                                    menutable.ajax.reload();
                                }
                            });
                        } else {
                            quick.toastNotif({
                                title: response.data.message,
                                icon: 'error',
                                timer: 4000,
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

    function wipeData() {
        $('.image-input-wrapper').css('background-image', 'url("../file/blank.webp")');

        $('#formProduk').trigger('reset');
        $('#id_produk').val(null);

    }
</script>
