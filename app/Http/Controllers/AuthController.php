<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Toko;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['loginMobile', 'login', 'register', 'logout', 'checkaccount', 'aktivasiakun']]);
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
    public function aktivasiakun(Request $request)
    {
        $data = $request->post();
        if ($data['role'] == 'BfiwyVUDrXOpmStr') {
            $user = User::where('id', base64_decode($data['id']))->where('access_token', $data['token'])->first();

            if ($user) {
                $user->update([
                    'active' => 1,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Aktivasi Toko Berhasil.',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid token.',
                ], 400);
            }
        } else {
            $user = User::where('id', base64_decode($data['id']))->where('access_token', $data['token'])->first();

            if ($user) {
                $user->update([
                    'active' => 1,
                    'password' => $data['password']
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Aktivasi Petugas Berhasil.',
                ]);
            } else {
                // Jika token tidak cocok
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid token.',
                ], 400);
            }
        }
    }
    public function checkaccount(Request $request)
    {
        $id = $request->post();
        // dd($id);
        $user = User::where('id', base64_decode($id['id']))->select('email', 'access_token', 'active', 'users_role_id')->first();

        return response()->json($user);
    }
    public function login(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'inputan tidak sesuai'], 400);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->firstOrFail();

            if ($user->active == 0) {
                return response()->json(['success' => false, 'message' => 'Akun Anda tidak aktif.'], 403);
            }
            if ($user->users_role_id == 'BfiwyVUDrXOpmStr') {
                $toko = DB::table('toko')->where('toko_user_id', $user->id)->first();
                session(['toko_id' => $toko->toko_id]);
            } else if ($user->users_role_id == 'TKQR2DSJlQ5b31V2') {
                $id = DB::table('petugas')->where('petugas_user_id', $user->id)->first();
                session(['toko_id' => $id->petugas_toko_id]);
                session(['petugas_id' => $id->petugas_id]);
            }
            // }
            // if ($toko) {
            // }
            $token = Auth::attempt($request->only('email', 'password'));

            session(['user' => $user]);
            session(['user_id' => $user->id]);
            session(['user_role' => $user->users_role_id]);
            session(['token' => $token]);

            // session(['jwt'])
            switch ($user->users_role_id) { 
                case 'FOV4Qtgi5lcQ9kCY':
                    $request->session()->regenerate();
                    return redirect()->route('superadmin')->with([
                        'status' => 'success',
                        'user' => $user,
                        'auth' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);

                case 'BfiwyVUDrXOpmStr':
                    // $request->session()->regenerate();
                    return redirect()->route('toko')->with([
                        'status' => 'success',
                        'user' => $user,
                        'auth' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);

                case 'TKQR2DSJlQ5b31V2':
                    $request->session()->regenerate();
                    return redirect()->route('petugas')->with([
                        'status' => 'success',
                        'user' => $user,
                        'auth' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);

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
    // public function logout(Request $request)
    // {
    //     // $id_toko = $request->input('id_toko');
    //     // dd($id_toko);
    //     // $request->session()->forget('token');        
    //     // Auth::logout();
    //     // session(['token' => null]);

    //     // $request->session()->regenerate();

    //     // $token = session('token');
    //     // print_r(session('token')); exit;
    //     // dd(session('token'));
    //     // Auth::logout();
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Successfully logged out',
    //     ]);
    // }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    // public function loginMobile(Request $request)
    // {
    //     // $validator = $this->validator($request->all());

    //     // if ($validator->fails()) {
    //     //     return response()->json(['errors' => $validator->errors(), 'message' => 'inputan tidak sesuai'], 400);
    //     // }

    //     // $credentials = $request->only('email', 'password');

    //     // try {
    //     //     if (!$token = JWTAuth::attempt($credentials)) {
    //     //         return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    //     //     }
    //     // } catch (JWTException $e) {
    //     //     return response()->json(['success' => false, 'message' => 'Could not create token'], 500);
    //     // }

    //     // $user = Auth::user();

    //     // // Optionally, add logic to handle different roles
    //     // // ...

    //     // // Return the access token and other necessary data
    //     // $responseData = [
    //     //     'access_token' => $token,
    //     //     'user_id' => $user->id,
    //     //     'user_role' => $user->users_role_id,
    //     //     // Add other necessary data here
    //     // ];

    //     // return response()->json($responseData);
    //     $credentials = request(['email', 'password']);
    //     if (!$token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     // print_r($token); 
    //     // return response()->json(['token' => $token]);
    //     return $this->respondWithToken($token);
    // }
    public function loginMobile(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        $user = Auth::user();
        if ($user->users_role_id == 'BfiwyVUDrXOpmStr') {
            $detailed_user = DB::table('toko')->where('toko_user_id', $user->id)->first();
        } else if ($user->users_role_id == 'TKQR2DSJlQ5b31V2') {
            $detailed_user = DB::table('petugas')->where('petugas_user_id', $user->id)->first();
            $detailed_user['toko_id'] = $detailed_user->petugas_toko_id;
        }
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'data_user' => $detailed_user,
            'auth' => [
                'token' => $token,
                'type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        // print_r($token); exit;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    // public function logout()
    // {
    //     Session::flush();

    //     Auth::logout();
    //     return redirect()->route('index');
    // }


    public function register(Request $request)
    {
        // try {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        $data = $request->post();
        // dd($data['owner-name']); 
        // Lanjutkan dengan proses pendaftaran jika validasi berhasil
        $randomNumber = rand();
        $accessToken = 'KSR-' . $randomNumber;
        $id =  User::generateId();
        $user = User::create([
            'id' => $id,
            'name' => $data['owner-name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'users_role_id' => 'BfiwyVUDrXOpmStr',
            'access_token' =>  $accessToken,
            'active' => 0,
        ]);
        $toko = Toko::create([
            'toko_user_id' => $id,
            'toko_nama' => $data['store-name'],
            'toko_midtrans_serverkey' => $data['server-key'] ?? null,
            'toko_midtrans_clientkey' => $data['client-key'] ?? null,
        ]);
        Mail::send('mail.aktivasi-toko', ['data' => $data, 'id' => $id, 'token' => $accessToken], function ($message) use ($request, $data, $id) {
            $message->to($data['email']);
            $message->subject('Aktivasi Akun Kasir Handal');
        });
        if ($user && $toko) {

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
        // } catch (\Exception $e) {
        //     $statusCode = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'An error occurred during user registration.'
        //     ], $statusCode);
        // }
    }

    public function getCsrfToken()
    {
        $token = Session::token();
        return response()->json(['csrf_token' => $token]);
    }
}
