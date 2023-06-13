<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\StokController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Pengadaan
Route::get('pengadaan', [PengadaanController::class,'index']);
Route::post('pengadaan', [PengadaanController::class,'store']);
Route::get('pengadaan/{id}', [PengadaanController::class,'show']);
Route::put('pengadaan/{id}', [PengadaanController::class,'update']);

//Pengeluaran
Route::get('pengeluaran', [PengeluaranController::class,'index']);
Route::post('pengeluaran', [PengeluaranController::class,'store']);
Route::get('pengeluaran/{id}', [PengeluaranController::class,'show']);

//Pengembalian
Route::get('pengembalian', [PengembalianController::class,'index']);
Route::get('pengembalian/getData', [PengembalianController::class,'getData']);
Route::get('pengembalian/{id_pengembalian}', [PengembalianController::class,'show']);
Route::status('pengembalian/status/{id_pengembalian}', [PengembalianController::class,'status']);

//Stok
Route::get('stok', [StokController::class,'index']);
Route::post('stok', [StokController::class,'store']);
Route::get('stok/{id}', [StokController::class,'show']);


Route::get('stok/getData', [StokController::class, 'getData']);
