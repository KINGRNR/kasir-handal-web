<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

\Midtrans\Config::$serverKey = 'SB-Mid-server-jDRuFD0sh4u9oaXfNsHwicXp';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $data = $request->post();

        // Check if required data exists
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

        // Get Snap token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json($snapToken);
    }
}
