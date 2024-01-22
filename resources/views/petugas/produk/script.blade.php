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
                    // 'Content-Type': 'multipart/form-data',
                }
            })
            .then(response => {
                var data = response.data
                $.each(data, function(key, value) {
                    $('#kategori_produk').append('<option value="' + value.id_kategori + '">' + value
                        .nama_kategori + '</option>');
                });
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

    function edit(id) {
        $('#formKategori').trigger('reset');
        $('#id_kategori').val(null);

        axios.post("/kategori/detail", {
                id: id
            }, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    // 'Content-Type': 'multipart/form-data',
                }
            })
            .then(response => {
                let data = response.data
                $('#id_kategori').val(data.id_kategori);
                $('#kode_kategori').val(data.kode_kategori);
                $('#nama_kategori').val(data.nama_kategori)
                $('#modalKategori').modal('show');

            })
            .catch(error => {
                console.error('There has been a problem with your Axios operation:', error);
            });
    }
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
                        return `<span class="badge bg-success">Rp. ${row.harga_produk}</span>`;
                    }
                },
                {
                    data: 'stok_produk',
                    name: 'stok_produk'
                },
                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
                },
                {
                    data: 'kode_kategori',
                    name: 'kode_kategori'
                }, {
                    data: 'id',
                    render: function(data, type, row) {
                        console.log(row);
                        var editButton = '<button class="btn btn-sm btn-warning" onclick="editRow(' +
                            row.id + ')">Edit</button>';

                        var deleteButton = '<button class="btn btn-sm btn-danger" onclick="deleteRow(' +
                            row.id + ')">Delete</button>';

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

    function switchForm() {
        $('.table-switch-produk').animate({
            top: '250px',
            opacity: '0'
        }, function() {
            $('.formProduk').show();
            $('.formProduk').animate({
                top: '0px',
                opacity: '1'
            });
            $('.table-switch-produk').hide();
        });
    }

    function switchTable() {
        // Animate the form upward and fade it out
        $('.formProduk').animate({
            top: '-250px',
            opacity: '0'
        }, function() {
            // Animation complete, show the table and hide the form
            $('.table-switch-produk').show();
            $('.table-switch-produk').animate({
                top: '0px',
                opacity: '1'
            });

            $('.formProduk').hide();
        });
    }

    function save() {
        var form = "formProduk";
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
                axios.post("/produk/save", data, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'multipart/form-data',
                        }
                    })
                    .then(response => {
                        if (response.data.success) {
                            $('#formProduk').trigger('reset');
                            $(".close-modal").trigger('click');
                            quick.toastNotif({
                                title: 'success',
                                icon: 'success',
                                timer: 500,
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
    document.addEventListener('DOMContentLoaded', function() {
    var image = document.getElementById('image');
    var existingImage = document.getElementById('existingImage').value;
    var croppedPreview = document.getElementById('croppedPreview');
    var inputImage = document.getElementById('inputImage');
    var editImageBtn = document.getElementById('editImageBtn');
    var cropper;

    // Load existing image if available
    if (existingImage) {
        image.src = existingImage;
        croppedPreview.src = existingImage;
    }

    inputImage.addEventListener('change', function(e) {
        var files = e.target.files;
        var done = function(url) {
            inputImage.value = '';
            image.src = url;
            croppedPreview.src = url;
            $('#imageCropModal').modal('show');
            initCropper();
        };

        var reader;
        var file;

        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    // Edit existing image
    editImageBtn.addEventListener('click', function() {
        if (existingImage) {
            $('#imageCropModal').modal('show');
            initCropper();
        } else {
            alert('No existing image to edit. Please upload a new image.');
        }
    });

    document.getElementById('cropImage').addEventListener('click', function() {
        if (cropper) {
            var canvas = cropper.getCroppedCanvas();
            if (canvas) {
                var croppedDataUrl = canvas.toDataURL();
                console.log('Cropped Data URL:', croppedDataUrl);
                // Update the preview image
                $('#croppedPhoto').val(croppedDataUrl)
                croppedPreview.src = croppedDataUrl;
            } else {
                console.error('Canvas is null. Cropper might not have been properly initialized.');
            }
        } else {
            console.error('Cropper is null. Initialization might be missing.');
        }

        // Close the modal
        $('#imageCropModal').modal('hide');
    });

    function initCropper() {
        if (cropper) {
            cropper.destroy();
        }

        // Set aspect ratio and view mode
        cropper = new Cropper(image, {
            aspectRatio: 16 / 9, // Set the aspect ratio as needed
            viewMode: 3, // Change the view mode as needed (1, 2, or 3)
        });
    }
});

</script>
