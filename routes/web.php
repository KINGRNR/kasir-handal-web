<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

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
    });


    Route::group(['middleware' => ['roleCheck:TKQR2DSJlQ5b31V2']], function () {
        Route::get('/petugas/dashboard', function () {
            return view('petugas.dashboard.index');
        })->name('petugas');
    });
});
