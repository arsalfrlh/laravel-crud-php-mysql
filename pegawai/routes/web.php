<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pegawai',[PegawaiController::class,'index']); //url menampilkan dan mengarahkan ke controller dan function index di file (PegawaiController.php)
Route::get('/pegawai/tambah',[PegawaiController::class,'tambah']); //url menampilkan dan mengarahkan ke controller dan function tambah di file (PegawaiController.php)
Route::post('/pegawai/store',[PegawaiController::class,'store']); //url mengisi dan mengarahkan ke controller dan function store di file (PegawaiController.php)
Route::get('/pegawai/edit/{id_pegawai}',[PegawaiController::class,'edit']); //url mengambil id dan menampilkan dan mengarahkan ke controller dan function edit di file (PegawaiController.php) || {id_pegawai} (index.php)
Route::put('/pegawai/update',[PegawaiController::class,'update']); //url mengupdate dan mengarahkan ke controller dan function update di file (PegawaiController.php)
Route::delete('/pegawai/hapus/{id_pegawai}',[PegawaiController::class,'destroy']); //url mengambil id dan mengarahkan ke controller dan function destroy di file (PegawaiController.php) || {id_pegawai} (index.php)
