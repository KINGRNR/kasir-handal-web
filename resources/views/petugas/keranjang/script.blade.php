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
        $('#formKategori').trigger('reset');
        $('#id_kategori').val(null);

        axios.post("/produk/showProdukCart",{
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
            <p class="card-text mb-2"><span class="badge bg-success">Rp.${v.harga_produk}</span>
            </p>
            <p class="card-text">Tersedia : ${v.stok_produk}</p>
            <button class="btn btn-sm btn-primary">Tambah ke Keranjang</button>
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
</script>
