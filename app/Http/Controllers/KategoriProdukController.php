<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
    public function showKategoriMobile(Request $request)
    {
        $id = $request->post();

        // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

        // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
        $operation = DB::table('kategori')->where('id_kategori_toko', $id)->where('kategori_deleted_at', null)->get();

        return response()->json($operation);
    }
//     public function showKategoriMobile(Request $request)
// {
//     try {
//         $id = $request->post('id_toko');
//         $page = $request->post('page') ?? 1; // Gunakan nilai default 1 jika parameter page tidak ada
//         $perPage = $request->post('per_page') ?? 10; // Gunakan nilai default 10 jika parameter per_page tidak ada

//         $offset = ($page - 1) * $perPage; // Hitung offset untuk query

//         $operation = DB::table('kategori')
//             ->where('id_kategori_toko', $id)
//             ->whereNull('kategori_deleted_at')
//             ->offset($offset)
//             ->limit($perPage)
//             ->get();

//         return response()->json($operation);
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }

    public function save(Request $request)
    {
        $data = $request->except('foto_kategori');
        $validator = Validator::make($request->all(), [
            'foto_kategori' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => 'Validation Error',
                'title' => 'Gagal!',
                'message' => 'Validasi tidak berhasil. Pastikan gambar berformat JPEG, PNG, atau GIF dan tidak lebih dari 2MB.',
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        if ($request->hasFile('foto_kategori')) {
            $uploadedFile = $request->file('foto_kategori');

            $filename = 'logo_' . time() . '.' . $uploadedFile->getClientOriginalExtension();

            $uploadedFile->move(public_path('file/kategori_logo/'), $filename);
            $data['kategori_logo'] = $filename;
        }

        // try {
            if ($data['id_kategori']) {
                $kategori = Kategori::findOrFail($data['id_kategori']);

                if ($request->hasFile('foto_kategori')) {
                    // Remove the old image
                    if (file_exists(public_path('file/kategori_logo/') . $kategori->kategori_logo)) {
                        unlink(public_path('file/kategori_logo/') . $kategori->kategori_logo);
                    };
                }
                $kategori->update($data);
            } else {
                $data['id_kategori_toko'] = session()->get('toko_id');
                // $prefix = strtoupper(substr($data['nama_kategori'], 0, 2));

                // $latestKategori = Kategori::where('id_kategori_toko', $data['id_kategori_toko'])
                //     ->orderBy('kode_kategori', 'desc')
                //     ->first();

                // $sequenceNumber = $latestKategori ? intval(substr($latestKategori->kode_kategori, 3)) + 1 : 1;

                // $formattedSequence = sprintf('%04d', $sequenceNumber);
                // $data['kode_kategori'] = $prefix . '-' . $formattedSequence;

                Kategori::create($data);
            }

            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
            ]);
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'success' =>  false,
        //         'status' =>  'error',
        //         'title' => 'Gagal!',
        //         'message' => 'Terjadi Kesalahan di Sistem!',
        //     ]);
        // }
    }
    public function saveMob(Request $request)
    {
        // dd($request->post());
        // return response()->json(['code' => 201, 'message' => $request->post()], 201);

        $data = $request->except('foto_kategori');
        $validator = Validator::make($request->all(), [
            'foto_kategori' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => 'Validation Error',
                'title' => 'Gagal!',
                'message' => 'Validasi tidak berhasil. Pastikan gambar berformat JPEG, PNG, atau GIF dan tidak lebih dari 2MB.',
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        if ($request->hasFile('foto_kategori')) {
            $uploadedFile = $request->file('foto_kategori');

            $filename = 'logo_' . time() . '.' . $uploadedFile->getClientOriginalExtension();

            $uploadedFile->move(public_path('file/kategori_logo/'), $filename);
            $data['kategori_logo'] = $filename;
        }

        try {
            if ($data['id_kategori']) {
                $kategori = Kategori::findOrFail($data['id_kategori']);

                if ($request->hasFile('foto_kategori')) {
                    // Remove the old image
                    if (file_exists(public_path('file/kategori_logo/') . $kategori->kategori_logo)) {
                        unlink(public_path('file/kategori_logo/') . $kategori->kategori_logo);
                    };
                }
                $kategori->update($data);
            } else {
                // $prefix = strtoupper(substr($data['nama_kategori'], 0, 2));

                // $latestKategori = Kategori::where('id_kategori_toko', $data['id_kategori_toko'])
                //     ->orderBy('kode_kategori', 'desc')
                //     ->first();

                // $sequenceNumber = $latestKategori ? intval(substr($latestKategori->kode_kategori, 3)) + 1 : 1;

                // $formattedSequence = sprintf('%04d', $sequenceNumber);
                // $data['kode_kategori'] = $prefix . '-' . $formattedSequence;

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
    // public function saveMob(Request $request)
    // {
    //     $data = $request->post();

    //     try {
    //         if ($data['id_kategori']) {
    //             $kategori = Kategori::findOrFail($data['id_kategori']);
    //             $kategori->update($data);
    //         } else {
    //             // print_r($data); exit;
    //             // $data['id_kategori_toko'] = session()->get('toko_id');
    //             // $prefix = strtoupper(substr($data['nama_kategori'], 0, 2));

    //             // $latestKategori = Kategori::where('id_kategori_toko', $data['id_kategori_toko'])
    //             //     ->orderBy('kode_kategori', 'desc')
    //             //     ->first();

    //             // $sequenceNumber = $latestKategori ? intval(substr($latestKategori->kode_kategori, 3)) + 1 : 1;

    //             // $formattedSequence = sprintf('%04d', $sequenceNumber);
    //             // $data['kode_kategori'] = $prefix . '-' . $formattedSequence;

    //             Kategori::create($data);
    //         }

    //         return response()->json([
    //             'success' =>  true,
    //             'status' =>  'Success',
    //             'title' => 'Sukses!',
    //             'message' => 'Data Berhasil Tersimpan!',
    //             'code' => 201
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'code' => 400,
    //             'success' =>  false,
    //             'status' =>  'error',
    //             'title' => 'Gagal!',
    //             'message' => 'Terjadi Kesalahan di Sistem!',
    //         ]);
    //     }
    // }

    public function detail(Request $request)
    {
        $data = $request->post();
        // print_r($data); exit;
        // dd($data);
        $opr = Kategori::where('id_kategori', $data['id'])->first();
        return response()->json($opr);
    }
    public function delete(Request $request)
    {
        $data = $request->post();
        $id = $data['id'];

        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['error' => 'Merek tidak di Temukan.'], 404);
        }

        if ($kategori->produks()->exists()) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Merek sudah digunakan di beberapa produk!',
            ]);
        }

        $kategori->delete();

        return response()->json(['success' => 'Merek Berhasil di Hapus.'], 200);
    }
}
