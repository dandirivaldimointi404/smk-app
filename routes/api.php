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
    Route::get('materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('materi/{materi}', [MateriController::class, 'show'])->name('materi.show');

    Route::get('tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');
});
