<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SimulasiController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('data-karyawan', [SimulasiController::class, 'index']);
Route::resource('/paket', PaketController::class);
Route::resource('/outlet', OutletController::class);
Route::get('export/paket', [PaketController::class, 'exportData'])->name('export-paket');
Route::get('import/paket', [PaketController::class, 'importData'])->name('import-paket');
