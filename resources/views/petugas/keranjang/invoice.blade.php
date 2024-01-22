<!--begin::Post-->
<div class="formProduk" style="display: none;">
    @include('petugas.keranjang.form')
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="background: #53B1FD;">
                <div class="card-title">
                    <h2 class="text-white">Data Menu</h2>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter dan Search -->
                <div class="mb-4">
                    <form class="row">
                        <!-- Filter Kategori -->
                        <div class="col-md-4 mb-3">
                            <select class="form-select" id="kategori">
                                <option value="" disabled selected>Semua Kategori</option>
                                {{-- <option value="kategori2">Kategori 2</option> --}}
                                <!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
                            </select>
                        </div>

                        <!-- Fitur Pencarian -->
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" id="search" placeholder="Cari...">


                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="submit" class="btn btn-primary">Sync Stok </button>
                        </div>
                    </form>
                </div>

                <!-- Card Produk Container -->
                <div class="produk-container row">
                    <!-- Card Produk akan ditambahkan melalui JavaScript -->
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-4 mb-4">
        <!-- Informasi Pelanggan -->
        <div class="card">
            <div class="card-header" style="background: #53B1FD;">
                <div class="card-title">
                    <h2 class="text-white">Keranjang</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4>Informasi Pelanggan</h4>
                    <form>
                        <div class="mb-3">
                            <label for="notransaksi">Nomor Transaksi :</label>
                            <input type="text" class="form-control" id="notransaksi" name="notransaksi" placeholder="Nomor Transaksi" disabled value="TRS-001">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="noTelp">No. Telp:</label>
                            <input type="tel" class="form-control" id="noTelp" placeholder="No. Telp">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </form>
                </div>

                <!-- Petugas Kasir -->
                <div class="mb-4">
                    <h4>Petugas Kasir</h4>
                    <p>Nama Petugas: John Doe</p>
                </div>

                <!-- Cart -->
                <div class="mb-4">
                    <h4>Cart</h4>
                    <!-- Tampilkan barang yang dipilih dan jumlahnya di sini -->
                    <!-- Contoh: -->
                    <ul>
                        <li>Product 1 - 2 pcs</li>
                        <li>Product 3 - 1 pcs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 3 Card Produk Horizontal -->

<!--end::Post-->


<!--begin::Post-->



<!-- Cart dan Informasi Pelanggan -->
