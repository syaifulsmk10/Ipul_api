<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bukucontroller;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('/buku')->group(function () {
    Route::get('/', [BukuController::class, 'index']);
    Route::post('/create', [BukuController::class, 'create']);
    Route::put('/update', [Bukucontroller::class, 'update']);
    Route::delete('/delete', [Bukucontroller::class, 'destroy']);
});


Route::prefix('/anggota')->group(function(){
    Route::get('/',[AnggotaController::class, 'index']);
    Route::post('/create',[AnggotaController::class, 'create']);
    Route::put('/update',[AnggotaController::class, 'update']);
    Route::delete('/destroy',[AnggotaController::class, 'destroy']);
});

Route::prefix('/rak')->group(function(){
    Route::get('/',[RakController::class, 'index']);
    Route::post('/create',[RakController::class, 'create']);
    Route::put('/update',[RakController::class, 'update']);
    Route::delete('/destroy',[RakController::class, 'destroy']);
});

Route::prefix('/pengembalian')->group(function(){
    Route::get('/',[PengembalianController::class, 'index']);
    Route::post('/create',[PengembalianController::class, 'create']);
    Route::put('/update',[PengembalianController::class, 'update']);
    Route::delete('/destroy',[PengembalianController::class, 'destroy']);
});

Route::prefix('/peminjaman')->group(function(){
    Route::get('/',[PeminjamanController::class, 'index']);
    Route::post('/create',[PeminjamanController::class, 'create']);
    Route::put('/update',[PeminjamanController::class, 'update']);
    Route::delete('/destroy',[PeminjamanController::class, 'destroy']);
});

Route::prefix('/petugas')->group(function(){
    Route::get('/',[PetugasController::class, 'index']);
    Route::post('/create',[PetugasController::class, 'create']);
    Route::put('/update',[PetugasController::class, 'update']);
    Route::delete('/destroy',[PetugasController::class, 'destroy']);
});









