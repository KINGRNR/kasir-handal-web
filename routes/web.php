<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
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

Route::controller(KategoriProdukController::class)->group(function () {
    foreach (['showKategori', 'save', 'detail', 'delete'] as $key => $value) {
        Route::post('api/kategori/' . $value, $value);
    }
});
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
    Route::post('/postlogin', [AuthController::class, 'login'])->name('login.store');

});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware([loginCheck::class])->group(function () {
    
    Route::group(['middleware' => ['roleCheck:FOV4Qtgi5lcQ9kCY']], function () {
        Route::get('/superadmin/dashboard', function () {
            return view('superadmin.dashboard.index');
        })->name('superadmin');
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
        //controller

        Route::controller(UserController::class)->group(function () {
            foreach (['showPetugas', 'createPetugas', 'update', 'delete', 'getData'] as $key => $value) {
                Route::post('/user/' . $value, $value);
            }
        });
        Route::controller(KategoriProdukController::class)->group(function () {
            foreach (['showKategori', 'save', 'detail', 'delete'] as $key => $value) {
                Route::post('/kategori/' . $value, $value);
            }
        });
        Route::controller(ProdukController::class)->group(function () {
            foreach (['showProduk', 'getKategori', 'save'] as $key => $value) {
                Route::post('/produk/' . $value, $value);
            }
        });
    });


    Route::group(['middleware' => ['roleCheck:TKQR2DSJlQ5b31V2']], function () {
        Route::get('/petugas/dashboard', function () {
            return view('petugas.dashboard.index');
        })->name('petugas');
    });
});
