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
use App\Http\Controllers\TugasController;
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

Route::prefix('tugas')->group(function () {
    Route::get('/', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/{tugas}', [TugasController::class, 'show'])->name('tugas.show');
    Route::post('/store/{id_mapel}', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/edit/{tugas}', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/update/{tugas}', [TugasController::class, 'update'])->name('tugas.update');
    Route::delete('/delete/{tugas}', [TugasController::class, 'destroy'])->name('tugas.destroy');
    Route::get('/kelas/{id_mapel}', [TugasController::class, 'tugasMapel'])->name('tugas.mapel');
});

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

require __DIR__ . '/auth.php';
