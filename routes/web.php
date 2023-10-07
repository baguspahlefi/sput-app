<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoM1Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailLvl1Controller;
use App\Http\Controllers\PengaturanAkunController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('daftar_hadir/store',[MoM1Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir1.store');

Route::post('MoM1/store',[MoM1Controller::class,'store'])
->middleware(['auth'])
->name('MoM1.store');


Route::get('/MoM1', [MoM1Controller::class,'index'])
->middleware(['auth', 'verified'])
->name('MoM1');

Route::match(['get','post'],'/MoM1/{id}', [App\Http\Controllers\MoM1Controller::class, 'modal_show'])
->middleware(['auth'])
->name('daftarHadir1.edit');

Route::get('/MoM1/detail/{id}', [DetailLvl1Controller::class,'index'])
->middleware(['auth'])
->name('detail.show');

Route::get('/pengaturan-akun', [PengaturanAkunController::class,'index'])
->middleware(['auth'])
->name('pengaturanAkun.index');


Route::match(['get','post'],'/pengaturan-akun/{id}', [App\Http\Controllers\Admin\PengaturanAkunController::class, 'edit'])
->middleware(['auth'])
->name('pengaturanAkun.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
