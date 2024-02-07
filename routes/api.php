<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('loginMobile', 'AuthController@loginMobile');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
// });
Route::controller(AuthController::class)->group(function () {
    foreach (['register', 'loginMobile', 'logout', 'refresh'] as $key => $value) {
        Route::post('/auth/' . $value, $value);
    }
});
Route::middleware('auth:api')->group(function () {
    Route::middleware(['cors'])->group(function () {

        Route::controller(KategoriProdukController::class)->group(function () {
            foreach (['showKategoriMobile', 'saveMob', 'detail', 'delete'] as $key => $value) {
                Route::post('/kategori/' . $value, $value);
            }
        });
        Route::controller(ProdukController::class)->group(function () {
            foreach (['showProdukMobile', 'saveMob', 'delete', 'saveMobile'] as $key => $value) {
                Route::post('/produk/' . $value, $value);
            }
        });
    });
});







Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
