<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TaskController;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login1');
});

Route::resource('beranda', BerandaController::class);
//MASTER DATA
Route::resource('guru', GuruController::class);
Route::resource('rombel', RombelController::class);
Route::resource('mapel', MapelController::class);
Route::resource('siswa', SiswaController::class);

//PEMBELAJARAN
Route::resource('materi', MateriController::class);
Route::resource('task', TaskController::class);
Route::resource('evaluasi', EvaluasiController::class);

//LAPORAN
Route::resource('absensi', AbsensiController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
