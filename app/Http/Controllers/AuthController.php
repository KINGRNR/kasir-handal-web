<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function validator(array $data, $tipe = 'login')
    {
        if ($tipe == 'login') {
            return Validator::make($data, [
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        }
        return Validator::make($data, [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'email' => ['required', 'unique:users', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('login');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function login(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'inputan tidak sesuai'], 400);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->firstOrFail();
            // $photo = DB::table('resume')->where('resume_user_id', $user->id)->first();
            // if ($photo) {
            //     session(['user_photo' => $photo->resume_official_photo]);
            // }
            session(['user' => $user]);
            session(['user_id' => $user->id]);
            session(['user_role' => $user->users_role_id]);

            $request->session()->regenerate();

            switch ($user->users_role_id) {
                case 'FOV4Qtgi5lcQ9kCY':
                    return redirect()->route('superadmin')->with('message', 'coba aja');

                case 'BfiwyVUDrXOpmStr':
                    return redirect()->route('toko')->with('message', 'no access');

                case 'TKQR2DSJlQ5b31V2':
                    return redirect()->route('petugas')->with('message', 'no access');

                default:
                    Auth::logout();
                    return response()->json(['data' => $user], 422);
            }
        } else {
            return response()->json([
                'success' => false
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Session::flush();

        Auth::logout();
        return redirect()->route('index');
    }

    public function register(Request $request)
    {
        try {
            // print_r($request->all());
            $validator = $this->validator($request->all(), 'register');
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()], 400);
            }

            $user = User::create([
                'name' => $request->firstName . ' ' . $request->lastName,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'users_role_id' => 'BfiwyVUDrXOpmStr'
            ]);

            if ($user) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('login'),
                    'message' => 'Successfully registered user.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User registration failed.'
                ], 400);
            }
        } catch (\Exception $e) {
            $statusCode = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during user registration.'
            ], $statusCode);
        }
    }
}
