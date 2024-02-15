<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\Produk;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function loadPenjualan(Request $request)
    {
        $id = session()->get('toko_id');

        // Ambil parameter bulan dan tahun dari request jika ada
        $bulan = $request->input('bulan', date('m')); // Default ke bulan saat ini jika tidak ada
        $tahun = $request->input('tahun', date('Y')); // Default ke tahun saat ini jika tidak ada

        // Ambil jumlah hari dalam bulan dan tahun yang dipilih
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        // Inisialisasi array untuk menyimpan data penjualan per hari dalam bulan
        $dataPenjualanPerHari = [];

        // Loop untuk setiap hari dalam bulan
        for ($i = 1; $i <= $jumlahHari; $i++) {
            // Format tanggal dalam format 'YYYY-MM-DD'
            $tanggal = sprintf('%04d-%02d-%02d', $tahun, $bulan, $i);

            // Hitung jumlah transaksi untuk tanggal tertentu
            $jumlahTransaksi = DB::table('penjualan')
                ->where('penjualan_toko_id', $id)
                ->whereDate('penjualan_created_at', $tanggal)
                ->count();

            // Simpan jumlah transaksi ke dalam array
            $dataPenjualanPerHari[$tanggal] = $jumlahTransaksi;
        }

        // Mengembalikan data dalam format JSON
        return response()->json($dataPenjualanPerHari);
    }
}
