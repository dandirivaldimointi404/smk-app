<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BiodataController;
use App\Http\Controllers\API\MateriController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\TugasController;
use App\Http\Controllers\API\TugasSiswaController;
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
    Route::post('login', [AuthController::class, 'login']);
    Route::get('materi', [MateriController::class, 'index'])->name('materi.index');

});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/submit-tugas', [TugasSiswaController::class, 'submitTugas']);
    Route::get('profile', [AuthController::class, 'show']);
    Route::post('biodata/edit', [AuthController::class, 'ubahData']);

    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('materi/{mapel}', [MateriController::class, 'show'])->name('materi.show');
    Route::get('materi/by-mapel/{id_materi}', [MateriController::class, 'showMateri'])->name('materi.showMateri');
    Route::get('materi/{id_materi}/download', [MateriController::class, 'downloadMateri'])->name('materi.download');
    
    Route::post('submittugas', [TugasSiswaController::class,'submitTUgas']);
    Route::resource('tugasmasuk', TugasSiswaController::class);
    // Route::get('tugassiswa', [TugasSiswaController::class, 'index'])->name('tugassiswa.index');
    // Route::get('tugas-siswa/{id_tugas_siswa}', [TugasSiswaController::class, 'getTugasSiswa']);

    Route::get('tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('tugas/{mapel}', [TugasController::class, 'show'])->name('tugas.show');
});
