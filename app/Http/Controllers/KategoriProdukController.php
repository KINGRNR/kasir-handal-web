<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KategoriProdukController extends Controller
{
    public function showKategori(Request $request)
    {
        $id = session()->get('toko_id');

        // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

        // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
        $operation = DB::table('kategori')->where('id_kategori_toko', $id)->where('kategori_deleted_at', null)->get();

        return DataTables::of($operation)
            ->toJson();
    }

    public function save(Request $request)
    {
        $data = $request->post();

        try {
            if ($data['id_kategori']) {
                $kategori = Kategori::findOrFail($data['id_kategori']);
                $kategori->update($data);
            } else {
                $data['id_kategori_toko'] = session()->get('toko_id');
                $prefix = strtoupper(substr($data['nama_kategori'], 0, 2));

                $latestKategori = Kategori::where('id_kategori_toko', $data['id_kategori_toko'])
                    ->orderBy('kode_kategori', 'desc')
                    ->first();

                $sequenceNumber = $latestKategori ? intval(substr($latestKategori->kode_kategori, 3)) + 1 : 1;

                $formattedSequence = sprintf('%04d', $sequenceNumber);
                $data['kode_kategori'] = $prefix . '-' . $formattedSequence;

                Kategori::create($data);
            }

            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
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

    public function detail(Request $request)
    {
        $data = $request->post();
        // print_r($id); exit;

        $opr = Kategori::where('id_kategori', $data['id'])->first();
        return response()->json($opr);
    }
    public function delete(Request $request)
    {
        $data = $request->post();
        $id = $data['id'];

        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['error' => 'Kategori not found.'], 404);
        }

        if ($kategori->produks()->exists()) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Kategori sudah digunakan di beberapa produk!',
            ]);
        }

        $kategori->delete();

        return response()->json(['success' => 'Kategori deleted successfully.']);
    }
}
