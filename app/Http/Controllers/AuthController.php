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
        $this->middleware('auth:api', ['except' => ['loginMobile', 'login', 'register', 'logout']]);
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
        try {

            $validator = $this->validator($request->all(), 'register');
            // print_r($validator);
            // exit;
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()], 400);
            }

            $user = User::create([
                'id' => User::generateId(),
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
    public function getCsrfToken()
    {
        $token = Session::token();
        return response()->json(['csrf_token' => $token]);
    }
}
