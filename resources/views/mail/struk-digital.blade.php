<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        .header h2 {
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
            color: #555;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table td {
            color: #333;
        }

        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
        }

        .footer p {
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>Struk</h2>
        </div>

        <div class="invoice-details">
            <p><strong>Nama Pelanggan:</strong> {{ $pelanggan->nama_pelanggan }}</p>
            <p><strong>No. Telepon:</strong> {{ $pelanggan->no_hp }}</p>
            <p><strong>Email:</strong> {{ $pelanggan->email_pelanggan }}</p>
            <p><strong>Transaksi Nomor:</strong> {{ $penjualan_id }}</p>
            <p><strong>Tanggal Transaksi:</strong> {{ $waktu_transaksi }}</p>
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
                @foreach($itemDetails as $item)
                    <tr>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>Rp. {{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item->harga_produk * $item->jumlah_barang, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

        <div class="total">
            <p><strong>Total:</strong> Rp. {{ number_format($transaction->penjualan_total_harga, 0, ',', '.') }}</p>
        </div>

        <div class="footer">
            <p>Terima Kasih sudah berbelanja!</p>
        </div>
    </div>

</body>

</html>
