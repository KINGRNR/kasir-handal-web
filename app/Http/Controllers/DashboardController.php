<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Toko;
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

    public function loadRiwayatTransaksi(Request $request)
    {
        $id = session()->get('toko_id');

        // Mengambil riwayat transaksi
        $opr = DB::table('penjualan')
            ->join('detail_penjualan', 'penjualan.penjualan_id', '=', 'detail_penjualan.penjualan_id')
            ->where('penjualan.penjualan_toko_id', $id)
            ->orderBy('penjualan.penjualan_created_at', 'desc')
            ->select('penjualan.penjualan_id', 'penjualan.penjualan_total_harga', 'penjualan.penjualan_created_at', DB::raw('SUM(detail_penjualan.jumlah_barang) as jumlah_barang_terjual'))
            ->groupBy('penjualan.penjualan_id', 'penjualan.penjualan_total_harga', 'penjualan.penjualan_created_at')
            ->limit(6)
            ->get();

        // Menghitung total saldo dari penjualan
        $totalSaldo = DB::table('penjualan')
            ->where('penjualan_toko_id', $id)
            ->sum('penjualan_total_harga');

        // Menghitung total merek dari table kategori
        $totalMerek = DB::table('kategori')->where('id_kategori_toko', $id)->where('kategori_deleted_at', null)->count();

        $totalPelanggan = DB::table('pelanggan')
            ->join('penjualan', 'pelanggan.pelanggan_id', '=', 'penjualan.penjualan_pelanggan_id')
            ->where('penjualan.penjualan_toko_id', $id) // Hanya mencari pelanggan yang terkait dengan toko tertentu
            ->distinct() // Hanya ambil pelanggan yang berbeda
            ->count();
        // Membuat respons JSON
        $response = [
            'riwayat_transaksi' => $opr,
            'total_saldo' => $totalSaldo,
            'total_merek' => $totalMerek,
            'total_pelanggan' => $totalPelanggan
        ];

        return response()->json($response);
    }
    public function loadDetail()
    {
        $data['user_count'] = User::count();
        $data['toko_count'] = Toko::count();
        $role = 'BfiwyVUDrXOpmStr';

        $today = Carbon::today();
        $data['toko_perhari'] = User::where('users_role_id', $role)
            ->whereDate('created_at', $today)
            ->count();

        $data['toko_urut'] = DB::table('v_toko')->orderBy('created_at', 'desc')->get();
        $data['toko_terlaris'] = DB::table('penjualan')
            ->join('toko', 'penjualan.penjualan_toko_id', '=', 'toko.toko_id')
            ->select(
                'toko.toko_nama',
                DB::raw('SUM(penjualan.penjualan_total_harga) as total_penjualan'),
                DB::raw('COUNT(penjualan.penjualan_id) as total_transaksi')
            )
            ->groupBy('penjualan.penjualan_toko_id', 'toko.toko_nama')
            ->orderByDesc('total_penjualan')
            ->get();


        return response()->json($data);
    }
}
