<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{

  public function showProduk(Request $request)
  {
    $id = session()->get('toko_id');

    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation = DB::table('v_produk')->where('id_kategori_toko', $id)->get();

    return DataTables::of($operation)
      ->toJson();
  }
  public function showProdukMobile(Request $request)
  {
    $id = $request->post();
    // dd($id);

    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation = DB::table('v_produk')->where('id_kategori_toko', $id)->get();

    return response()->json($operation);

  }

  public function getKategori()
  {
    $id = session()->get('toko_id');

    $data = DB::table('kategori')->where('id_kategori_toko', $id)->where('kategori_deleted_at', null)->get();
    return response()->json($data);
  }
  public function save(Request $request)
  {
    // try {
      $formData = $request->except('croppedPhoto');
      $base64Image = $request->input('croppedPhoto');
      $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
      $filename = 'produk_' . time() . '.png';
      $path = public_path('file/produk_foto/' . $filename);
      $formData['harga_produk'] = str_replace(',', '', str_replace('.', '', $formData['harga_produk']));

      file_put_contents($path, $imageData);
  
      if ($formData['id_produk']) {
          // $kategori = Kategori::findOrFail($data['id_kategori']);
          // $kategori->update($data);
      } else {
          $formData['id_produk_kategori'] = $formData['kategori_produk'];
          $formData['foto_produk'] = $filename;

          Produk::create($formData);
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
  public function showProdukCart(Request $request) 
  {
    $id = session()->get('toko_id');
    $operation = DB::table('v_produk')->where('id_kategori_toko', $id)->get();

    return response()->json($operation);
  }
  public function addCart(Request $request) 
  {
    $id = $request->post();
    $operation = DB::table('v_produk')->where('id_produk', $id)->first();

    return response()->json($operation);
  }
}
  
// }
