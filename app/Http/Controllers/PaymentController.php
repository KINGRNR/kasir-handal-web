<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Toko;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Midtrans\Config;
use Midtrans\Snap;
use Yajra\DataTables\Facades\DataTables;

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

        $customerExists = DB::table('pelanggan')->Where('email_pelanggan', $emailPelanggan)->first();

        return response()->json($customerExists);
    }
    public function initiatePayment(Request $request)
    {
        $data = $request->post();
        if (
            !isset($data['produkData']) ||
            !isset($data['nama_pelanggan']) ||
            !isset($data['email_pelanggan']) ||
            !isset($data['no_telp'])
        ) {
            return response()->json(['error' => 'Missing required data'], 400);
        }
        $toko = Toko::first(); // Ambil data toko pertama dari database
        if (!$toko) {
            return response()->json(['error' => 'Toko not found'], 404);
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
                'gross_amount' => array_sum(array_column($produkData, 'harga_produk'))
            ),
            'customer_details' => array(
                'first_name' => $data['nama_pelanggan'],
                'email' => $data['email_pelanggan'],
                'phone' => $data['no_telp'],
            ),
            'item_details' => $itemDetails,
        );
        \Midtrans\Config::$serverKey = $toko->toko_midtrans_serverkey;

        $opr['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        $opr['dataPenjualan'] = $data;
        return response()->json($opr);
    }
    public function initiateCashPayment(Request $request)
    {
        $data = $request->post();
        $data['penjualan_payment_method'] = 1;
        if (
            !isset($data['produkData']) ||
            !isset($data['nama_pelanggan']) ||
            !isset($data['email_pelanggan']) ||
            !isset($data['no_telp'])
        ) {
            return response()->json(['error' => 'Missing required data'], 400);
        }

        $produkData = json_decode($data['produkData'], true);
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

        $penjualanId = $result['order_id'] ?? rand();
        $idPelangganRaw = DB::table('pelanggan')
            ->where('no_hp', $dataTransaction['no_telp'])
            ->select('pelanggan_id')
            ->first();

        $idPelanggan = $idPelangganRaw ? $idPelangganRaw->pelanggan_id : null;

        if ($idPelanggan) {
            DB::table('pelanggan')
                ->where('no_hp', $dataTransaction['no_telp'])
                ->update([
                    'nama_pelanggan' => $dataTransaction['nama_pelanggan'],
                    'email_pelanggan' => $dataTransaction['email_pelanggan'],
                    'alamat_pelanggan' => $dataTransaction['alamat_pelanggan'] ?? null,
                ]);
        } else {
            $idPelanggan = rand();
            Pelanggan::create([
                'pelanggan_id' => $idPelanggan,
                'nama_pelanggan' => $dataTransaction['nama_pelanggan'],
                'no_hp' => $dataTransaction['no_telp'],
                'email_pelanggan' => $dataTransaction['email_pelanggan'],
                'alamat_pelanggan' => $dataTransaction['alamat_pelanggan'] ?? null,
            ]);
        }
        $totalHarga = 0; // Inisialisasi total harga

        foreach ($itemDetails as $item) {
            $subTotal = $item['harga_produk'] * $item['qty_produk'];
            $totalHarga += $subTotal;
        }

        Penjualan::create([
            'penjualan_id' => $penjualanId,
            'penjualan_total_harga' => $totalHarga,
            'penjualan_toko_id' => 1,
            'penjualan_pelanggan_id' => $idPelanggan,
            'penjualan_petugas_id' => $dataTransaction['id_petugas'],
            'penjualan_payment_method' => $dataTransaction['penjualan_payment_method'] ?? 2,
        ]);
        // Penjualan::create([
        //     'penjualan_id' => $penjualanId,
        //     'penjualan_total_harga' => array_sum(array_column($itemDetails, 'harga_produk')),
        //     'penjualan_toko_id' => 1,
        //     'penjualan_pelanggan_id' => $idPelanggan,
        //     'penjualan_petugas_id' => 4,
        // ]);

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

        return response()->json([
            'status' =>  'Success',
            'title' => 'Sukses!',
            'id_penjualan' => $penjualanId,
            // 'data' => $data,
            'message' => 'Data Transaksi Berhasil Tersimpan!',
            'code' => 201
        ]);
    }


    public function showTransaction(Request $request)
    {
        $id = session('toko_id');
        // dd($id);
        if (session('petugas_id') !== null) {
            $filter = $request->post();
            if (isset($filter['date'])) {
                $dateRange = explode(' - ', $filter['date']);
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[1])->endOfDay();
                $operation = DB::table('v_transaksi')->where('penjualan_petugas_id', session('petugas_id'))->where('penjualan_deleted_at', null)->whereBetween('penjualan_created_at', [$startDate, $endDate])->get();
            } else {
                $operation = DB::table('v_transaksi')->where('penjualan_petugas_id', session('petugas_id'))->where('penjualan_deleted_at', null)->get();
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
        $data['detail_penjualan'] = DB::table('detail_penjualan')
            ->join('produk', 'detail_penjualan.id_barang', '=', 'produk.id_produk')
            ->where('detail_penjualan.penjualan_id', $id)
            ->get();
        $data['pelanggan'] = DB::table('pelanggan')->where('pelanggan_id', $data['penjualan']->penjualan_pelanggan_id)->first();
        $data['toko'] = DB::table('toko')->where('toko_id', $data['penjualan']->penjualan_toko_id)->first();
        // $data['petugas'] = DB::table('petugas')
        //     ->join('users', 'petugas.petugas_user_id', '=', 'users.id')
        //     ->where('petugas.petugas_id', $data['penjualan']->penjualan_petugas_id)
        //     ->select(DB::raw('CONVERT(users.name USING utf8mb4) AS name'))
        //     ->first();
        $data['petugas'] = DB::table('v_petugas')->where('petugas_id', $data['penjualan']->penjualan_petugas_id)->first();
        return response()->json($data);
    }
    public function sendEmail(Request $request)
    {
        $id = $request->post('id');

        $transactionData = DB::table('penjualan')
            ->where('penjualan_id', $id)
            ->first();

        $detailTransaction = DB::table('detail_penjualan')
            ->join('produk', 'detail_penjualan.id_barang', '=', 'produk.id_produk')
            ->where('detail_penjualan.penjualan_id', $id)
            ->get();

        $customerData = DB::table('pelanggan')
            ->where('pelanggan_id', $transactionData->penjualan_pelanggan_id)
            ->first();

        $storeData = DB::table('toko')
            ->where('toko_id', $transactionData->penjualan_toko_id)
            ->first();

        $currentDateTime = Carbon::parse($transactionData->penjualan_created_at)->format('d - F - Y : H:i');
        // return response()->json(['message' => 'Email berhasil dikirim'], 200);

        try {
            Mail::send('mail.struk-digital', [
                'waktu_transaksi' => $currentDateTime,
                'penjualan_id' => $id,
                'itemDetails' => $detailTransaction,
                'transaction' => $transactionData,
                'pelanggan' => $customerData,
                'toko' => $storeData
            ], function ($message) use ($customerData) {
                $message->to($customerData->email_pelanggan);
                $message->subject('Struk');
            });
            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Email berhasil dikirim!',
                'code' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
    }
    public function exportExcel(Request $request)
    {
        $dateRange = $request->input('date');

        [$startDateString, $endDateString] = explode(' - ', $dateRange);

        $startDate = date('Y-m-d', strtotime($startDateString));
        $endDate = date('Y-m-d', strtotime($endDateString));

        $id = session('toko_id');
        $opr['penjualan'] = DB::table('v_penjualan')
            ->where('penjualan_toko_id', $id)
            ->whereBetween('penjualan_created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->get();

        foreach ($opr['penjualan'] as $penjualan) {
            $penjualan->detail = DB::table('v_detail_penjualan')->where('penjualan_id', $penjualan->penjualan_id)->get();
        }

        return response()->json([
            'success' =>  true,
            'status' =>  'Success',
            'title' => 'Sukses!',
            'data' => $opr,
            'message' => '',
            'code' => 200
        ]);
    }
}
