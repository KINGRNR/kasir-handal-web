<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{

  public function showProduk(Request $request)
  {
    $id = session()->get('toko_id');

    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation = DB::table('v_produk')->where('id_kategori_toko', $id)->where('produk_deleted_at', null)->get();

    return DataTables::of($operation)
      ->toJson();
  }
  public function showProdukMobile(Request $request)
  {
    $id = $request->post();
    // dd($id);

    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation = DB::table('v_produk')->where('id_kategori_toko', $id)->where('produk_deleted_at', null)->get();

    return response()->json($operation);
  }

  public function getKategori()
  {
    $id = session()->get('toko_id');

    $data = DB::table('kategori')->where('id_kategori_toko', $id)->where('kategori_deleted_at', null)->get();
    return response()->json($data);
  }

  public function saveMob(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'status' => 'Validation Error',
        'title' => 'Gagal!',
        'message' => 'Pastikan gambar berformat JPEG, PNG, atau GIF dan tidak lebih dari 2MB.',
        'code' => 422,
        'errors' => $validator->errors(),
      ]);
    }

    $formData = $request->except('foto_produk');

    if ($request->hasFile('foto_produk')) {
      $uploadedFile = $request->file('foto_produk');

      $filename = 'produk_' . time() . '.' . $uploadedFile->getClientOriginalExtension();

      $uploadedFile->move(public_path('file/produk_foto/'), $filename);
      $formData['foto_produk'] = $filename;
    }

    $formData['harga_produk'] = str_replace(',', '', str_replace('.', '', $formData['harga_produk']));

    if ($formData['id_produk']) {
      $existingProduk = Produk::find($formData['id_produk']);

      if ($request->hasFile('foto_produk')) {
        // Remove the old image
        if (file_exists(public_path('file/produk_foto/') . $existingProduk->foto_produk)) {
          unlink(public_path('file/produk_foto/') . $existingProduk->foto_produk);
        }

        // Update with the new image
        $existingProduk->update($formData);
      } else {
        // If no new image, update without changing the existing image
        $existingProduk->update($request->except('foto_produk'));
      }
    } else {
      // Create a new record
      Produk::create($formData);
    }

    return response()->json([
      'success' => true,
      'status' => 'Success',
      'title' => 'Sukses!',
      'message' => 'Data Berhasil Tersimpan!',
      'code' => 201
    ]);
  }
  public function updateStok(Request $request)
  {
    $validatedData = $request->validate([
      'id_produk' => 'required|exists:produk,id_produk',
      'stok_produk' => 'required|numeric|min:0',
    ]);

    $produk = Produk::findOrFail($validatedData['id_produk']);
    $produk->stok_produk = $validatedData['stok_produk'];
    $produk->save();

    return response()->json(['message' => 'Stok berhasil diperbarui']);
  }

  public function saveMobile(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'foto_produk' => 'base64image|mimes:jpeg,png,jpg,gif|max:2048', // Add 'base64image' rule
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'status' => 'Validation Error',
        'title' => 'Gagal!',
        'message' => 'Pastikan gambar berformat JPEG, PNG, atau GIF dan tidak lebih dari 2MB.',
        'code' => 422,
        'errors' => $validator->errors(),
      ]);
    }

    $formData = $request->except('foto_produk');

    if ($request->has('foto_produk')) {
      $base64Image = $request->input('foto_produk');
      $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

      $filename = 'produk_' . time() . '.png'; // You can change the extension based on the actual image type

      file_put_contents(public_path('file/produk_foto/') . $filename, $imageData);
      $formData['foto_produk'] = $filename;
    }

    $formData['harga_produk'] = str_replace(',', '', str_replace('.', '', $formData['harga_produk']));

    if ($formData['id_produk']) {
      $existingProduk = Produk::find($formData['id_produk']);

      if ($request->hasFile('foto_produk')) {
        // Remove the old image
        if (file_exists(public_path('file/produk_foto/') . $existingProduk->foto_produk)) {
          unlink(public_path('file/produk_foto/') . $existingProduk->foto_produk);
        }

        // Update with the new image
        $existingProduk->update($formData);
      } else {
        // If no new image, update without changing the existing image
        $existingProduk->update($request->except('foto_produk'));
      }
    } else {
      // Create a new record
      Produk::create($formData);
    }
    return response()->json([
      'success' => true,
      'status' => 'Success',
      'title' => 'Sukses!',
      'message' => 'Data Berhasil Tersimpan!',
      'code' => 201
    ]);
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
    $operation = DB::table('v_produk')->where('id_kategori_toko', $id)->where('produk_deleted_at', null)->get();

    return response()->json($operation);
  }
  public function detail(Request $request)
  {
    $id = $request->post();
    $operation = DB::table('produk')->where('id_produk', $id)->where('produk_deleted_at', null)->first();

    return response()->json($operation);
  }
  public function addCart(Request $request)
  {
    $id = $request->post();
    $operation = DB::table('v_produk')->where('id_produk', $id)->first();

    return response()->json($operation);
  }
  public function delete(Request $request)
  {
    $data = $request->post();
    $id = $data['id'];

    $produk = Produk::find($id);

    if (!$produk) {
      return response()->json(['error' => 'Produk not found.'], 404);
    }
    $produk->delete();

    return response()->json(['success' => 'Produk deleted successfully.']);
  }
}
  
// }
