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
    $id = session()->get('toko_id');
    // dd(session('token'));
    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation = DB::table('v_petugas')->where('petugas_toko_id', $id)->get();

    return DataTables::of($operation)
      ->toJson();
  }

  public function savePetugas(Request $request)
  {
    $data = $request->post();
    $id = session()->get('user_id');
    $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();
    // print_r($id_toko); 
    // exit;
    // try {
      // dd($data);
      if ($data['id']) {
        $oprUpdate = User::findOrFail($data['id']);
        $oprUpdate->update($data);
      } else {
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
      }
      return response()->json([
        'success' =>  true,
        'status' =>  'Success',
        'title' => 'Sukses!',
        'message' => 'Data Berhasil Tersimpan!',
        'code' => 201
      ]);
    // } catch (\Throwable $th) {
    //   return response()->json([
    //     'success' =>  false,
    //     'status' =>  'error',
    //     'title' => 'Gagal!',
    //     'message' => 'Terjadi Kesalahan di Sistem!',
    //   ]);
    // }
  }
  public function detail(Request $request)
  {
    $data = $request->post();

    $opr = DB::table('users')->where('id', $data['id'])->first();
    // dd($opr);
    return response()->json($opr);
  }
  public function hapusSessionToken(Request $request)
  {
    // $id_toko = $request->input('id_toko');
    // dd($id_toko);
    // $request->session()->forget('token');        
    // Auth::logout();
    session(['token' => null]);
    session(['toko_id' => null]);

    session(['toko_id' => null]);
    session(['petugas_id' => null]);
    session(['user' => null]);
    session(['user_id' => null]);
    session(['user_role' => null]);
    // dd(session('token'));
    // $request->session()->regenerate();

    // $token = session('token');
    // print_r(session('token')); exit;
    // dd(session('token'));
    // Auth::logout();
    return response()->json([
      'status' => 'success',
      'message' => 'Successfully logged out',
    ]);
  }
}
// }
