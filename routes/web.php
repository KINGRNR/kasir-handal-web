<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\roleCheck;
use App\Http\Middleware\loginCheck;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/api/getcsrf', [AuthController::class, 'getCsrfToken'])->name('getCsrfToken');
Route::middleware(['web'])->group(function () {

    // Route::controller(KategoriProdukController::class)->group(function () {
    //     foreach (['showKategori', 'save', 'detail', 'delete'] as $key => $value) {
    //         Route::post('api/kategori/' . $value, $value);
    //     }
    // });
    Route::get('/', function () {
        return view('welcome');
    })->name('index');
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        })->name('login');
        Route::get('/register', function () {
            return view('auth.register');
        })->name('register');
        Route::get('/aktivasiakun', function () {
            return view('auth.aktivasi');
        })->name('aktivasi');
        Route::post('/postlogin', [AuthController::class, 'login'])->name('login.store');
    });
    
    Route::group(['middleware' => ['roleCheck:FOV4Qtgi5lcQ9kCY']], function () {
        Route::get('/superadmin/dashboard', function () {
            return view('superadmin.dashboard.index');
        })->name('superadmin');
        Route::get('/superadmin/user', function () {
            return view('superadmin.manageuser.index');
        })->name('manageuser');
        Route::get('/superadmin/toko', function () {
            return view('superadmin.managetoko.index');
        })->name('managetoko');
    });

    Route::group(['middleware' => ['roleCheck:BfiwyVUDrXOpmStr']], function () {
        Route::get('/toko/dashboard', function () {
            return view('toko.dashboard.index');
        })->name('toko');
        Route::get('/toko/petugas', function () {
            return view('toko.petugas.index');
        })->name('petugas');
        Route::get('/toko/kategori', function () {
            return view('toko.kategori.index');
        })->name('kategori');
        Route::get('/toko/produk', function () {
            return view('toko.produk.index');
        })->name('produk');
        Route::get('/toko/keranjang', function () {
            return view('toko.keranjang.index');
        })->name('keranjang');
        Route::get('/toko/report-penjualan', function () {
            return view('toko.report-penjualan.index');
        })->name('report-penjualan');
        Route::get('/toko/profile', function () {
            return view('toko.profile.index');
        })->name('profiletoko');
        //controller

    });


    Route::group(['middleware' => ['roleCheck:TKQR2DSJlQ5b31V2']], function () {
        Route::get('/petugas/dashboard', function () {
            return view('petugas.dashboard.index');
        })->name('petugas');
        Route::get('/petugas/kategori', function () {
            return view('petugas.kategori.index');
        })->name('kategori');
        Route::get('/petugas/produk', function () {
            return view('petugas.produk.index');
        })->name('produk');
        Route::get('/petugas/keranjang', function () {
            return view('petugas.keranjang.index');
        })->name('keranjang');
        Route::get('/petugas/report-penjualan', function () {
            return view('petugas.report-penjualan.index');
        })->name('report-penjualan');
        //controller
    });
    Route::controller(UserController::class)->group(function () {
        foreach (['showPetugas', 'savePetugas', 'detail', 'update', 'delete', 'getData', 'hapusSessionToken'] as $key => $value) {
            Route::post('/user/' . $value, $value);
        }
    });
    Route::controller(DashboardController::class)->group(function () {
        foreach (['loadPenjualan', 'loadRiwayatTransaksi'] as $key => $value) {
            Route::post('/dashboard/' . $value, $value);
        }
    });
    Route::controller(KategoriProdukController::class)->group(function () {
        foreach (['showKategori', 'save', 'detail', 'delete'] as $key => $value) {
            Route::post('/kategori/' . $value, $value);
        }
    });
    Route::controller(ProdukController::class)->group(function () {
        foreach (['showProduk', 'detail','getKategori', 'save', 'saveMob', 'showProdukCart', 'addCart', 'delete', 'updateStok'] as $key => $value) {
            Route::post('/produk/' . $value, $value);
        }
    });
    Route::controller(PaymentController::class)->group(function () {
        foreach (['initiatePayment', 'initiateCashPayment' ,'saveTransaction', 'showTransaction', 'cekpelanggan', 'showDetailTransaction', 'sendEmail', 'exportExcel'] as $key => $value) {
            Route::post('/pay/' . $value, $value);
        }
    });
    Route::controller(ProfileController::class)->group(function () {
        foreach (['indexToko', 'saveMidtransKey', 'saveProfileToko'] as $key => $value) {
            Route::post('/profile/' . $value, $value);
        }
    });
});
// });
