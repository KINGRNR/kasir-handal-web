<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
  public function showPetugas(Request $request)
  {
    // $id = session()->get('user_id');

    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation = DB::table('v_petugas')->where('petugas_toko_id', 1)->get();

    return DataTables::of($operation)
      ->toJson();
  }

  public function createPetugas(Request $request)
  {
    $data = $request->post();
    $id = session()->get('user_id');

    $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();
    // print_r($id_toko); 
    // exit;
    // try {
      $data['id'] = User::generateId();
      $data['users_role_id'] = 'TKQR2DSJlQ5b31V2';
      $data['password'] = '';
      // print_r($data); 
      // exit;
      User::create($data);
      DB::table('petugas')->insert([
        'petugas_user_id' => $data['id'],
        'petugas_toko_id' => $id_toko->toko_id,
      ]);

      return response()->json([
        'success' =>  true,
        'status' =>  'Success',
        'title' => 'Sukses!',
        'message' => 'Data Berhasil Tersimpan!',
        'code' => 201
      ]);
    // } catch (\Throwable $th) {
      return response()->json([
        'success' =>  false,
        'status' =>  'error',
        'title' => 'Gagal!',
        'message' => 'Terjadi Kesalahan di Sistem!',
      ]);
    }
  }
// }
