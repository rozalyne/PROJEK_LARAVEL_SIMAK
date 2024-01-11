<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/tambahsiswa', [SiswaController::class, 'tambahsiswa'])->name('tambahsiswa');
Route::post('/insertdata', [SiswaController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [SiswaController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [SiswaController::class, 'updatedata'])->name('updatedata');
Route::delete('/delete/{id}', [SiswaController::class, 'delete'])->name('delete');

//export excel
Route::get('/exportexcel', [SiswaController::class, 'exportexcel'])->name('exportexcel');
//export pdf
Route::get('/exportpdf', [SiswaController::class, 'exportpdf'])->name('exportpdf');

Route::post('/importexcel', [SiswaController::class, 'importexcel'])->name('importexcel');
