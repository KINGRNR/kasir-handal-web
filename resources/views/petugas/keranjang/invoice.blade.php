{{-- <style>
.card-keranjang {
    position: fixed;
    top: 0;
    right: -400px; /* Atur posisi keranjang ke kanan layar */
    width: 400px; /* Lebar keranjang */
    height: 100%; /* Tinggi keranjang */
    background-color: white;
    transition: right 0.3s ease; /* Animasi perubahan posisi */
    z-index: 1000; /* Pastikan keranjang tampil di atas konten lain */
}
</style> --}}

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="background: #175CD3;">
                <div class="card-title">
                    <h2 class="text-white">Data Menu</h2>
                </div>
                <div class="card-toolbar">
                    {{-- <button id="toggleKeranjang" onclick="toggleKeranjang()" class="btn btn-primary mb-3">Toggle
                        Keranjang</button>
                    <button id="toggleKeranjang" onclick="toggleKeranjang2()" class="btn btn-primary mb-3">Toggle
                        Keranjang</button> --}}

                </div>
            </div>
            <div class="card-body">
                <!-- Filter dan Search -->
                <div class="row">
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
                        <button type="submit" class="btn btn-primary">Sync Stok</button>
                    </div>
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
        <div class="card card-keranjang">
            <div class="card-header" style="background: #175CD3;">
                <div class="card-title">
                    <h2 class="text-white">Keranjang</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4>Petugas Kasir</h4>
                    <p>{{session('name')}}</p>
                    <p>{{session('email')}}</p>
                    {{-- <p>Nama Petugas: {{ auth()->user()->name }}</p> --}}
                </div>
                <div class="mb-4">
                    <h4>Cari Pelanggan</h4>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="toggleExistingCustomer">
                        <label class="form-check-label" for="toggleExistingCustomer">Tampilkan Cari Existing
                            Pelanggan</label>
                    </div>
                    <div class="mb-3 carilisting" style="display: none;">
                        <label for="noTelp">No. Telp:</label>
                        <input type="tel" class="form-control" id="check_no_telp" name="check_no_telp"
                            placeholder="No. Telp">
                    </div>
                    <div class="mb-3 carilisting" style="display: none;">
                        <label for="customerDropdown">Pilih Pelanggan:</label>
                        <select id="customerDropdown" class="form-control"></select>
                    </div>

                    <h4>Informasi Pelanggan</h4>

                    <form action="javascript:startTransaksi()" method="post" id="formTransaksi" name="formTransaksi"
                        autocomplete="off" enctype="multipart/form-data"> <!-- Filter Kategori -->
                        <div class="mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                                placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="noTelp">No. Telp:</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp"
                                placeholder="No. Telp">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email_pelanggan" name="email_pelanggan"
                                placeholder="Email">
                        </div>

                        <!-- Dropdown to display customer details -->

                </div>
                <div class="mb-4">
                    <h4>Keranjang</h4>
                    <!-- Tampilkan barang yang dipilih dan jumlahnya di sini -->
                    <!-- Contoh: -->
                    <div class="table-responsive">
                        <table class="table align-middle table-hover table-row-dashed fs-6 gy-5 text-center"
                            id="table-kategori">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="ps-4" width="20">No</th>
                                    <th class="min-w-125px">Nama</th>
                                    <th class="min-w-125px">Jumlah</th>
                                    <th class="min-w-125px">Harga</th>
                                    {{-- <th class="min-w-125px"></th> --}}
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <tbody class="fw-bold text-gray-600 text-start align-middle" id="idProduk">
                            </tbody>
                        </table>
                    </div>

                    <div class="form-produk d-none">

                    </div>
                </div>
                <div class="mb-4"> <!-- Tampilkan barang yang dipilih dan jumlahnya di sini -->
                    <!-- Contoh: -->
                    <div class="mb-3">
                        <label for="nama">Total Harga :</label>
                        <input type="text" class="form-control" id="total_harga" name="total_harga"
                            placeholder="Harga" readonly>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-sm">Bayar
                            Cashless</button>
                        <button type="button" class="btn btn-success btn-sm" onclick="inputDataHarga()">Bayar
                            Cash</button>
                        {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalTransaksiBerhasil">styling Modal berhasil</button> --}}
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- 3 Card Produk Horizontal -->
<!-- Modal untuk pembayaran cash -->
<div class="modal fade" id="bayarCashModal" tabindex="-1" aria-labelledby="bayarCashModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarCashModalLabel">Pembayaran Cash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="total_harga_cash">Total Harga :</label>
                    <input type="text" class="form-control" id="total_harga_cash" name="total_harga_cash"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah_uang_cash">Jumlah Uang Cash :</label>
                    <input type="text" class="form-control" id="jumlah_uang_cash" name="jumlah_uang_cash">
                </div>
                <div class="mb-3">
                    <label for="kembalian_cash">Kembalian :</label>
                    <input type="text" class="form-control" id="kembalian_cash" name="kembalian_cash" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="hitungKembalian()">Bayar</button>
            </div>
        </div>
    </div>
</div>

<!--end::Post-->
<!-- Modal untuk pembayaran cash -->
<div class="modal fade" id="modalTransaksiBerhasil" tabindex="-1" aria-labelledby="modalTransaksiBerhasilLabel"
    aria-hidden="true" data-bs-backdrop="static">

    <div class="modal-dialog modal-lg" data-bs-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTransaksiBerhasilLabel">Transaksi Berhasil</h5>
                <!-- Hapus tombol close -->
            </div>
            <div class="modal-body">
                <!-- Isi Struk Transaksi -->
                <div class="container">
                    <div class="header text-center">
                        <h2>Struk Transaksi</h2>
                    </div>

                    <div class="invoice-details">
                        <p><strong>Nama Pelanggan:</strong> John Doe</p>
                        <p><strong>No. Telepon:</strong> 08123456789</p>
                        <p><strong>Email:</strong> john@example.com</p>
                        <p><strong>Transaksi Nomor:</strong> TRX123456789</p>
                        <p><strong>Tanggal Transaksi:</strong> 16 Februari 2024</p>
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
                            <tr>
                                <td>Product A</td>
                                <td>2</td>
                                <td>Rp. 50,000</td>
                                <td>Rp. 100,000</td>
                            </tr>
                            <tr>
                                <td>Product B</td>
                                <td>1</td>
                                <td>Rp. 75,000</td>
                                <td>Rp. 75,000</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="total">
                        <p><strong>Total:</strong> Rp. 175,000</p>
                    </div>
                </div>
                <!-- End Isi Struk Transaksi -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"><i class="fas fa-envelope fa-2x"></i> Kirim
                    Email</button>
                <button type="button" class="btn btn-success"><i class="fab fa-whatsapp fa-2x"></i> Kirim
                    Whatsapp</button>
                <button type="button" class="btn btn-success"><i class="fas fa-print fa-2x"></i> Print
                    Struk</button>
            </div>
        </div>
    </div>
</div>




<!--begin::Post-->



<!-- Cart dan Informasi Pelanggan -->
