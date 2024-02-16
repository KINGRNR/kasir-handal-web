<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;
use Yajra\DataTables\Facades\DataTables;

\Midtrans\Config::$serverKey = 'SB-Mid-server-jDRuFD0sh4u9oaXfNsHwicXp';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
class PaymentController extends Controller
{
    public function cekpelanggan(Request $request)
    {
        $namaPelanggan = $request->input('nama_pelanggan');
        $noTelp = $request->input('no_telp');
        $emailPelanggan = $request->input('email_pelanggan');

        $customerExists = DB::table('pelanggan')->Where('no_hp', $noTelp)->first();

        return response()->json($customerExists);
    }
    public function initiatePayment(Request $request)
    {
        $data = $request->post();
        if (
            !isset($data['produkData']) || // Ganti total_harga dengan produkData
            !isset($data['nama_pelanggan']) ||
            !isset($data['email_pelanggan']) ||
            !isset($data['no_telp'])
        ) {
            return response()->json(['error' => 'Missing required data'], 400);
        }

        $produkData = json_decode($data['produkData'], true); // Decode produkData menjadi array
        // dd($produkData);

        $itemDetails = array();

        foreach ($produkData as $produk) { // Loop melalui produkData
            $itemDetails[] = array(
                'id' => $produk['id_produk'],
                'price' => $produk['harga_produk'],
                'quantity' => $produk['qty_produk'],
                'name' => $produk['nama_produk'],
            );
        }
        // dd($itemDetails);
        // Build the parameters array
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                // Ganti total_harga dengan total harga yang sesuai
                'gross_amount' => array_sum(array_column($produkData, 'harga_produk')) // Menghitung total harga
            ),
            'customer_details' => array(
                'first_name' => $data['nama_pelanggan'],
                'email' => $data['email_pelanggan'],
                'phone' => $data['no_telp'],
            ),
            'item_details' => $itemDetails, // Set the item details array
        );

        $opr['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        $opr['dataPenjualan'] = $data;
        return response()->json($opr);
    }
    public function initiateCashPayment(Request $request)
    {
        $data = $request->post();
        if (
            !isset($data['produkData']) || // Ganti total_harga dengan produkData
            !isset($data['nama_pelanggan']) ||
            !isset($data['email_pelanggan']) ||
            !isset($data['no_telp'])
        ) {
            return response()->json(['error' => 'Missing required data'], 400);
        }

        $produkData = json_decode($data['produkData'], true); // Decode produkData menjadi array
        // dd($produkData);

        $itemDetails = array();

        foreach ($produkData as $produk) { // Loop melalui produkData
            $itemDetails[] = array(
                'id' => $produk['id_produk'],
                'price' => $produk['harga_produk'],
                'quantity' => $produk['qty_produk'],
                'name' => $produk['nama_produk'],
            );
        }
        $opr['dataPenjualan'] = $data;
        return response()->json($opr);
    }
    public function saveTransaction(Request $request)
    {
        $data = $request->post();
        $result = $data['result'];
        $dataTransaction = $data['data'];

        // Mendapatkan detail item dari data transaksi
        $itemDetails = json_decode($dataTransaction['produkData'], true);

        $penjualanId = $result['order_id'];
        $idPelangganRaw = DB::table('pelanggan')
            ->where('no_hp', $dataTransaction['no_telp'])
            ->select('pelanggan_id')
            ->first();

        $idPelanggan = $idPelangganRaw ? $idPelangganRaw->pelanggan_id : null;

        if ($idPelanggan) {
            // Update record yang ada
            DB::table('pelanggan')
                ->where('no_hp', $dataTransaction['no_telp'])
                ->update([
                    'nama_pelanggan' => $dataTransaction['nama_pelanggan'],
                    'email_pelanggan' => $dataTransaction['email_pelanggan'],
                    'alamat_pelanggan' => $dataTransaction['alamat_pelanggan'] ?? null,
                ]);
        } else {
            // Buat record baru
            $idPelanggan = rand();
            Pelanggan::create([
                'pelanggan_id' => $idPelanggan,
                'nama_pelanggan' => $dataTransaction['nama_pelanggan'],
                'no_hp' => $dataTransaction['no_telp'],
                'email_pelanggan' => $dataTransaction['email_pelanggan'],
                'alamat_pelanggan' => $dataTransaction['alamat_pelanggan'] ?? null,
            ]);
        }
        
        // Buat record penjualan
        Penjualan::create([
            'penjualan_id' => $penjualanId,
            'penjualan_total_harga' => array_sum(array_column($itemDetails, 'harga_produk')), // Menghitung total harga
            'penjualan_toko_id' => 1,
            'penjualan_pelanggan_id' => $idPelanggan,
            'penjualan_petugas_id' => 4,
        ]);

        // Buat detail penjualan
        foreach ($itemDetails as $item) {
            DetailPenjualan::create([
                'penjualan_id' => $penjualanId,
                'id_barang' => $item['id_produk'],
                'jumlah_barang' => $item['qty_produk'],
                'sub_total' => $item['harga_produk'] * $item['qty_produk']
            ]);

            DB::table('produk')
                ->where('id_produk', $item['id_produk'])
                ->decrement('stok_produk', $item['qty_produk']);
        };

        $currentDateTime = Carbon::now();

        // Kirim email struk
        Mail::send('mail.struk-digital', ['waktu_transaksi' => $currentDateTime, 'penjualan_id' => $penjualanId, 'itemDetails' => $itemDetails, 'transaction' => $dataTransaction], function ($message) use ($request, $dataTransaction) {
            $message->to($dataTransaction['email_pelanggan']);
            $message->subject('Struk');
        });

        return response()->json([
            'status' =>  'Success',
            'title' => 'Sukses!',
            'id_penjualan' => $penjualanId,
            'data' => $data,
            'message' => 'Data Transaksi Berhasil Tersimpan!',
            'code' => 201
        ]);
    }

    public function pushEmail(Request $request)
    {
        $data = $request->post();

        $currentDateTime = Carbon::now();

        Mail::send('mail.struk-digital', ['waktu_transaksi' => $currentDateTime, 'penjualan_id' => $penjualanId, 'itemDetails' => $itemDetails, 'transaction' => $dataTransaction], function ($message) use ($request, $dataTransaction) {
            $message->to($dataTransaction['email_pelanggan']);
            $message->subject('Struk');
        });
    }
    public function showTransaction(Request $request)
    {
        $id = session('toko_id');
        if (session('petugas_id') !== null){
            $filter = $request->post();
            if (isset($filter['date'])) {
                $dateRange = explode(' - ', $filter['date']);
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[1])->endOfDay();
                $operation = DB::table('v_transaksi')->where('petugas_toko_id', session('petugas_id'))->where('penjualan_deleted_at', null)->whereBetween('penjualan_created_at', [$startDate, $endDate])->get();
            } else {
                $operation = DB::table('v_transaksi')->where('petugas_toko_id', session('petugas_id'))->where('penjualan_deleted_at', null)->get();
            }
        } else {
            $filter = $request->post();
            if (isset($filter['date'])) {
                $dateRange = explode(' - ', $filter['date']);
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[1])->endOfDay();
                $operation = DB::table('v_transaksi')->where('penjualan_toko_id', $id)->where('penjualan_deleted_at', null)->whereBetween('penjualan_created_at', [$startDate, $endDate])->get();
            } else {
                $operation = DB::table('v_transaksi')->where('penjualan_toko_id', $id)->where('penjualan_deleted_at', null)->get();
            }
        }
        // dd($id);
       
        return DataTables::of($operation)
            ->toJson();
    }
    public function showDetailTransaction(Request $request)
    {
        $id = $request->post();

        $data['penjualan'] = DB::table('penjualan')->where('penjualan_id', $id)->first();
        $data['detail_penjualan'] = DB::table('detail_penjualan')->where('penjualan_id', $id)->get();

        return response()->json($data);
















































        
    }
}
