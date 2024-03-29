<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
  public function indexToko(Request $request)
  {
    $id = session('user_id');

    // dd(session('user_id'));
    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation['user'] = DB::table('users')->where('id', $id)->first();
    $operation['toko'] = DB::table('toko')->where('toko_user_id', $id)->first();
    return response()->json($operation);
  }
  public function indexUserMob(Request $request)
  {
    $id = $request->post();

    // dd(session('user_id'));
    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation['user'] = DB::table('users')->where('id', $id)->first();

    // $detailed_user['toko_id'] = $detailed_user->petugas_toko_id;
    if ($operation['user']->users_role_id == 'BfiwyVUDrXOpmStr') {
      $operation['detail_toko'] = DB::table('toko')->where('toko_user_id', $operation['user']->id)->first();
    } else if ($operation['user']->users_role_id == 'TKQR2DSJlQ5b31V2') {
      $operation['detail_petugas'] = DB::table('petugas')->where('petugas_user_id', $operation['user']->id)->first();
      $operation['detail_toko'] = DB::table('toko')->where('toko_id', $operation['detail_petugas']->petugas_toko_id)->first();

      // $detailed_user['toko_id'] = $detailed_user->petugas_toko_id;
    }    // $operation['toko'] = DB::table('toko')->where('toko_user_id', $id)->first();
    return response()->json($operation);
  }
  public function detailToko(Request $request)
  {
    $id = $request->post();

    // dd(session('user_id'));
    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();
    // dd($id);

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation['toko'] = DB::table('toko')->where('toko_id', $id['id'])->first();
    $operation['user'] = DB::table('users')->where('id', $operation['toko']->toko_user_id)->first();

    return response()->json($operation);
  }
  public function indexPetugas(Request $request)
  {
    $id = session('user_id');

    // dd(session('user_id'));
    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation['user'] = DB::table('users')->where('id', $id)->first();
    $operation['petugas'] = DB::table('petugas')->where('petugas_user_id', $id)->first();
    $operation['toko'] = DB::table('toko')->where('toko_id', $operation['petugas']->petugas_toko_id)->first();

    return response()->json($operation);
  }
  public function indexSuperadmin(Request $request)
  {
    $id = session('user_id');

    // dd(session('user_id'));
    // $id_toko = DB::table('toko')->where('toko_user_id', $id)->select('toko_id')->first();

    // $operation = DB::table('users')->where('users_role_id','TKQR2DSJlQ5b31V2')->get();
    $operation['user'] = DB::table('users')->where('id', $id)->first();


    return response()->json($operation);
  }
  public function saveMidtransKey(Request $request)
  {
    $data = $request->post();
    $toko = Toko::findOrFail($data['toko_id']);
    $toko->update([
      // 'toko_midtrans_clientkey' => $data['client_key'],
      'toko_midtrans_serverkey' => $data['server_key']
    ]);
    session(['midtrans' => 1]);

    return response()->json([
      'success' =>  true,
      'status' =>  'Success',
      'title' => 'Sukses!',
      'message' => 'Midtrans Key Berhasil di Update!',
      'code' => 200
    ]);
  }
  public function saveProfileToko(Request $request)
  {
    $data = $request->post();

    $validator = Validator::make($request->all(), [
      'foto_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
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
    if ($request->hasFile('foto_profile')) {
      $uploadedFile = $request->file('foto_profile');

      $filename = 'foto_' . time() . '.' . $uploadedFile->getClientOriginalExtension();

      $uploadedFile->move(public_path('file/foto_profile/'), $filename);
      $data['toko_foto'] = $filename;
    }
    // dd($data);
    $profile = User::findOrFail($data['id']);
    $toko = Toko::where('toko_user_id', $data['id'])->firstOrFail();
    if ($request->hasFile('foto_profile') && $toko->toko_foto != null) {
      // Remove the old image
      if (file_exists(public_path('file/foto_profile/') . $toko->toko_foto)) {
        unlink(public_path('file/foto_profile/') . $toko->toko_foto);
      };
    }
    if (isset($data['toko_foto'])) {
      $toko->update([
        'toko_nama' => $data['nama_toko'],
        'toko_foto' => $data['toko_foto']
      ]);
    } else {
      $toko->update([
        'toko_nama' => $data['nama_toko'],
      ]);
    }
    session(['name' => $data['nama_pemilik']]);
    session(['toko_nama' => $data['nama_toko']]);
    session(['toko_foto' => $toko->toko_foto]);

    $profile->update([
      'name' => $data['nama_pemilik'],
    ]);
    return response()->json([
      'success' =>  true,
      'status' =>  'Success',
      'title' => 'Sukses!',
      'message' => 'Data Profil Berhasil di Update!',
      'code' => 200
    ]);
  }
  // public function ubahPassword(Request $request)
  // {
  //   // $request->validate([
  //   //   'newPassword' => 'required|string|min:6|confirmed',
  //   //   'oldPassword' => 'required'
  //   // ]);
  //   dd($request->post());

  //   // Mendapatkan email pengguna dari sesi atau sesuai dengan kebutuhan aplikasi Anda
  //   $email = session('email');

  //   // Mengambil data pengguna berdasarkan email
  //   $user = User::where('email', $email)->first();
  //   // Memverifikasi kata sandi lama
  //   if (!Hash::check($request->oldPassword, $user->password)) {
  //     return response()->json([
  //       'success' => false,
  //       'message' => 'Kata sandi lama tidak cocok.'
  //     ], 401);
  //   }

  //   // Mengubah kata sandi baru
  //   $user->password = Hash::make($request->newPassword);
  //   $user->save();

 
  // }
  public function ubahPassword(Request $request)
	{
		$data = $request->post();
		$userId = session('user_id');
		$user = (new User())->find($userId);
		if (password_verify($data['oldPassword'], $user['password'])) {
			$operation =  User::where('id', $userId)->update([
				'password' => bcrypt($data['newPassword'])
			]);
      return response()->json([
        'success' => true,
        'message' => 'Kata Sandi Berhasil di Ubah!.',
      ]);
		} else {
      return response()->json([
        'success' => false,
        'message' => 'Kata Sandi Salah/Gagal di Ubah!.',
      ]);
		}
	}
}
// }
