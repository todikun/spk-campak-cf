<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\Master\{
    PenyakitController,
    GejalaController,
    NilaiController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return redirect('dashboard');
});
Route::get('/dashboard', function () {
    return view('pages.index');
})->name('dashboard');

Route::get('diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
Route::post('diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa.store');
Route::get('diagnosa/detail', [DiagnosaController::class, 'detail'])->name('diagnosa.detail');
Route::get('diagnosa/laporan', [DiagnosaController::class, 'laporan'])->name('diagnosa.laporan');

Route::resource('penyakit', PenyakitController::class);
Route::resource('gejala', GejalaController::class);
Route::resource('nilai', NilaiController::class);
