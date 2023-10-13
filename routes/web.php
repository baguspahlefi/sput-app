<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoM1Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailLvl1Controller;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\EvidanceLevel1Controller;

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

Route::get('/MoM1', [MoM1Controller::class,'index'])
->middleware(['auth','level1'])
->name('MoM1');
Route::post('MoM1/store',[MoM1Controller::class,'store'])
->middleware(['auth'])
->name('MoM1.store');
Route::delete('/MoM1/destroy/{id}', [MoM1Controller::class,'destroy'])
->middleware(['auth'])
->name('MoM1.destroy');

Route::get('/MoM1/detail/{id}', [DetailLvl1Controller::class,'index'])
->middleware(['auth','level1'])
->name('detail.index');
Route::post('MoM1/detail/store',[DetailLvl1Controller::class,'store'])
->middleware(['auth'])
->name('detail1.store');
Route::post('MoM1/detail/evidance',[DetailLvl1Controller::class,'store_evidance'])
->middleware(['auth'])
->name('detail1.store_evidance');
Route::delete('/MoM1/detail/{id}', [DetailLvl1Controller::class, 'destroy'])
->middleware(['auth'])
->name('detail1.destroy');
Route::delete('/MoM1/detail/evidance/{id}', [EvidanceLevel1Controller::class,'destroy'])
->middleware(['auth'])
->name('evidance1.destroy');

Route::post('daftar_hadir/store',[MoM1Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir1.store');

// Route::match(['get','post'],'/MoM1/{id}', [App\Http\Controllers\MoM1Controller::class, 'modal_show'])
// ->middleware(['auth'])
// ->name('daftarHadir1.edit');



Route::get('/pengaturan-akun', [PengaturanAkunController::class,'index'])
->middleware(['auth'])
->name('pengaturanAkun.index');

Route::post('/pengaturan-akun/store', [PengaturanAkunController::class,'storeAkun'])
->middleware(['auth'])
->name('pengaturanAkun.store');

Route::put('/pengaturan-akun/update/{id}', [PengaturanAkunController::class,'update'])
->middleware(['auth'])
->name('pengaturanAkun.update');

Route::delete('/pengaturan-akun/update/{id}', [PengaturanAkunController::class,'destroy'])
->middleware(['auth'])
->name('pengaturanAkun.destroy');


Route::match(['get','post'],'/pengaturan-akun/{id}', [App\Http\Controllers\Admin\PengaturanAkunController::class, 'edit'])
->middleware(['auth'])
->name('pengaturanAkun.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';