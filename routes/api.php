<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MateriController;
use App\Http\Controllers\API\TugasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', [AuthController::class, 'show']);
    Route::put('profile/edit', [AuthController::class, 'edit']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('materi/{mapel}', [MateriController::class, 'show'])->name('materi.show');
    Route::get('materi/by-mapel/{id_materi}', [MateriController::class, 'showMateri'])->name('materi.showMateri');
    Route::get('materi/{id_materi}/download', [MateriController::class, 'downloadMateri'])->name('materi.download');

    Route::get('tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');
});
