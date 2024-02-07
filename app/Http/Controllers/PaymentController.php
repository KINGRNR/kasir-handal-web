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
        // dd($data['id_produk']);

        if (
            !isset($data['total_harga']) ||
            !isset($data['nama_pelanggan']) ||
            !isset($data['email_pelanggan']) ||
            !isset($data['no_telp'])
        ) {
            return response()->json(['error' => 'Missing required data'], 400);
        }

        $itemDetails = array();

        for ($i = 1; $i <= 3; $i++) {
            $productIdKey = 'id_produk' . $i;
            $productNameKey = 'nama_produk' . $i;
            $productPriceKey = 'harga_produk' . $i;
            $productQtyKey = 'qty_produk' . $i;

            if (
                isset($data[$productIdKey]) &&
                isset($data[$productNameKey]) &&
                isset($data[$productPriceKey]) &&
                isset($data[$productQtyKey])
            ) {
                $itemDetails[] = array(
                    'id' => $data[$productIdKey],
                    'price' => $data[$productPriceKey],
                    'quantity' => $data[$productQtyKey],
                    'name' => $data[$productNameKey],
                );
            }
        }

        // Build the parameters array
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data['total_harga'],
            ),
            'customer_details' => array(
                'first_name' => $data['nama_pelanggan'],
                'email' => $data['email_pelanggan'],
                'phone' => $data['no_telp'],
            ),
            'item_details' => $itemDetails, // Set the item details array
        );

        // dd($itemDetails);
        // Get Snap token
        $opr['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        $opr['dataPenjualan'] = $data;
        return response()->json($opr);
    }
    public function saveTransaction(Request $request)
    {
        $data = $request->post();
        $result = $data['result'];
        $dataTransaction = $data['data'];
        $itemDetails = array();

        for ($i = 1; $i <= 3; $i++) {
            $productIdKey = 'id_produk' . $i;
            $productNameKey = 'nama_produk' . $i;
            $productPriceKey = 'harga_produk' . $i;
            $productQtyKey = 'qty_produk' . $i;

            if (
                isset($dataTransaction[$productIdKey]) &&
                isset($dataTransaction[$productNameKey]) &&
                isset($dataTransaction[$productPriceKey]) &&
                isset($dataTransaction[$productQtyKey])
            ) {
                $itemDetails[] = array(
                    'id' => $dataTransaction[$productIdKey],
                    'price' => $dataTransaction[$productPriceKey],
                    'quantity' => $dataTransaction[$productQtyKey],
                    'name' => $dataTransaction[$productNameKey],
                );
            }
        }

        $penjualanId = $result['order_id'];
        $idPelangganRaw = DB::table('pelanggan')
            ->where('no_hp', $dataTransaction['no_telp'])
            ->select('pelanggan_id')
            ->first();

        $idPelanggan = $idPelangganRaw ? $idPelangganRaw->pelanggan_id : null;

        if ($idPelanggan) {
            // Update existing record
            DB::table('pelanggan')
                ->where('no_hp', $dataTransaction['no_telp'])
                ->update([
                    'nama_pelanggan' => $dataTransaction['nama_pelanggan'],
                    'email_pelanggan' => $dataTransaction['email_pelanggan'],
                    'alamat_pelanggan' => $dataTransaction['alamat_pelanggan'] ?? null,
                ]);
        } else {
            // Create new record
            $idPelanggan = rand();
            Pelanggan::create([
                'pelanggan_id' => $idPelanggan,
                'nama_pelanggan' => $dataTransaction['nama_pelanggan'],
                'no_hp' => $dataTransaction['no_telp'],
                'email_pelanggan' => $dataTransaction['email_pelanggan'],
                'alamat_pelanggan' => $dataTransaction['alamat_pelanggan'] ?? null,
            ]);
        }
        
        // dd($idPelanggan);
        Penjualan::create([
            'penjualan_id' => $penjualanId,
            'penjualan_total_harga' => $dataTransaction['total_harga'],
            'penjualan_toko_id' => 1,
            'penjualan_pelanggan_id' => $idPelanggan,
            'penjualan_petugas_id' => 4,
        ]);

        foreach ($itemDetails as $item) {
            DetailPenjualan::create([
                'penjualan_id' => $penjualanId,
                'id_barang' => $item['id'],
                'jumlah_barang' => $item['quantity'],
                'sub_total' => $item['price'] * $item['quantity']
            ]);
        };

        $currentDateTime = Carbon::now();

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
        $id = session()->get('toko_id');
        // dd($id);
        $operation = DB::table('v_transaksi')->where('petugas_toko_id', $id)->where('penjualan_deleted_at', null)->get();

        return DataTables::of($operation)
            ->toJson();
    }
}
