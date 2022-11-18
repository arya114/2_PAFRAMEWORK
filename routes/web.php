<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\obat;
use App\Models\supplier;
use App\Models\transaksi;
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
    return view('layouts/home', [
        "obats" => Obat::all()
    ]);
})->middleware(['auth']);



Route::get('/obat', function () {
    return view('obat/index', [
        "obats" => Obat::all()
    ]);
})->middleware(['auth']);

Route::get('/transaksi', function () {
    return view('transaksi/index', [
        "transaksis" => transaksi::all()
    ]);
})->middleware(['auth']);

Route::get('/supplier', function () {
    return view('supplier/index', [
        "suppliers" => supplier::all()
    ]);
})->middleware(['auth']);

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::post('/action-register',
[AuthController::class, 'actionRegister']);

Route::get('/login', 
[AuthController::class,'loginView'])->name("login");

Route::post('/action-login',
[AuthController::class, 'actionLogin']);

Route::get('/logout',
[AuthController::class, 'logout']);

Route::get('/obat',
[ObatController::class, 'index'])->name('obat.index')->middleware(['auth']);

Route::get('/obat/create',
[ObatController::class, 'create'])->name('obat.create')->middleware(['auth']);

Route::post('/obat',
[ObatController::class, 'store'])->name('obat.store')->middleware(['auth']);

Route::get('/obat/{id}/edit',
[ObatController::class, 'edit'])->name('obat.edit')->middleware(['auth']);

Route::put('/obat/{id}',
[ObatController::class, 'update'])->name('obat.update')->middleware(['auth']);

Route::get('/obat/show/{id}',
[ObatController::class, 'show'])->name('obat.show')->middleware(['auth']);

Route::get('/supplier',
[SupplierController::class, 'index'])->name('supplier.index')->middleware(['auth']);

Route::get('/supplier/create',
[SupplierController::class, 'create'])->name('supplier.create')->middleware(['auth']);

Route::post('/supplier',
[SupplierController::class, 'store'])->name('supplier.store')->middleware(['auth']);

Route::get('/supplier/show/{id}',
[SupplierController::class, 'show'])->name('supplier.show')->middleware(['auth']);

Route::get('/supplier/{id}/edit',
[SupplierController::class, 'edit'])->name('supplier.edit')->middleware(['auth']);

Route::put('/supplier/{id}',
[SupplierController::class, 'update'])->name('supplier.update')->middleware(['auth']);

Route::delete('/supplier/{id}',
[SupplierController::class, 'destroy'])->name('supplier.delete')->middleware(['auth']);

Route::delete('/obat/{id}',
[ObatController::class, 'destroy'])->name('obat.delete')->middleware(['auth']);

Route::get('/supplier/{id}',
[SupplierController::class, 'supplier'])->middleware(['auth']);

Route::get('/transaksi/{id}',
[TransaksiController::class, 'index'])->name('transaksi.index')->middleware(['auth']);

Route::post('/transaksi/{id}',
[TransaksiController::class, 'transaksi'])->name('transaksi.transaksi')->middleware(['auth']);

Route::get('/konfirmasi',
[TransaksiController::class, 'konfirmasi'])->name('transaksi.konfirmasi')->middleware(['auth']);

Route::delete('/transaksi/{id}',
[TransaksiController::class, 'delete'])->name('transaksi.delete')->middleware(['auth']);

Route::get('/transaksi',
[TransaksiController::class, 'check_out'])->name('transaksi.check_out')->middleware(['auth']);

Route::get('/user',
[UserController::class, 'index'])->name('user.index')->middleware(['auth']);

Route::delete('/user/{id}',
[UserController::class, 'destroy'])->name('user.delete')->middleware(['auth']);

Route::get('/user/{id}/edit',
[UserController::class, 'edit'])->name('user.edit')->middleware(['auth']);

Route::put('/user/{id}',
[UserController::class, 'update'])->name('user.update')->middleware(['auth']);

