<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoM1Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailLvl1Controller;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\EvidanceLevel1Controller;
use App\Http\Controllers\MoM2Controller;
use App\Http\Controllers\DetailLvl2Controller;
use App\Http\Controllers\EvidanceLevel2Controller;
use App\Http\Controllers\MoM3Controller;
use App\Http\Controllers\DetailLvl3Controller;
use App\Http\Controllers\EvidanceLevel3Controller;

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

// MoM Level 1
Route::get('/MoM1', [MoM1Controller::class,'index'])
->middleware(['auth','level1'])
->name('MoM1');
Route::post('/MoM1/store',[MoM1Controller::class,'store'])
->middleware(['auth','role:ADMIN'])
->name('MoM1.store');
Route::put('/MoM1/update/{id}',[MoM1Controller::class,'update'])
->middleware(['auth','role:ADMIN'])
->name('MoM1.update');
Route::delete('/MoM1/destroy/{id}', [MoM1Controller::class,'destroy'])
->middleware(['auth'])
->name('MoM1.destroy','role:ADMIN');

Route::get('/MoM1/detail/{id}', [DetailLvl1Controller::class,'index'])
->middleware(['auth','level1'])
->name('detail1.index');
Route::post('MoM1/detail/store',[DetailLvl1Controller::class,'store'])
->middleware(['auth','role:ADMIN'])
->name('detail1.store');
Route::put('MoM1/detail/update/{id}',[DetailLvl1Controller::class,'update'])
->middleware(['auth'])
->name('detail1.update');
Route::post('MoM1/detail/evidance',[DetailLvl1Controller::class,'store_evidance'])
->middleware(['auth'])
->name('detail1.store_evidance');
Route::delete('/MoM1/detail/{id}', [DetailLvl1Controller::class, 'destroy'])
->middleware(['auth','role:ADMIN'])
->name('detail1.destroy');
Route::delete('/MoM1/detail/evidance/{id}', [EvidanceLevel1Controller::class,'destroy'])
->middleware(['auth','role:ADMIN'])
->name('evidance1.destroy');

// MoM Level 2
Route::get('/MoM2', [MoM2Controller::class,'index'])
->middleware(['auth','level2'])
->name('MoM2');
Route::post('/MoM2/store',[MoM2Controller::class,'store'])
->middleware(['auth','role:ADMIN'])
->name('MoM2.store');
Route::put('/MoM2/update/{id}',[MoM2Controller::class,'update'])
->middleware(['auth','role:ADMIN'])
->name('MoM2.update');
Route::delete('/MoM2/destroy/{id}', [MoM2Controller::class,'destroy'])
->middleware(['auth'])
->name('MoM2.destroy','role:ADMIN');

Route::post('daftar_hadir_1/store',[MoM2Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir1.store');
Route::put('daftar_hadir_1/update',[MoM2Controller::class,'update_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir1.update');

Route::post('daftar_hadir_2/store',[MoM2Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir2.store');
Route::put('daftar_hadir_2/update',[MoM2Controller::class,'update_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir2.update');

Route::get('/MoM2/detail/{id}', [DetailLvl2Controller::class,'index'])
->middleware(['auth','level2'])
->name('detail2.index');
Route::post('MoM2/detail/store',[DetailLvl2Controller::class,'store'])
->middleware(['auth','role:ADMIN'])
->name('detail2.store');
Route::put('MoM2/detail/update/{id}',[DetailLvl2Controller::class,'update'])
->middleware(['auth'])
->name('detail2.update');
Route::post('MoM2/detail/evidance',[DetailLvl2Controller::class,'store_evidance'])
->middleware(['auth'])
->name('detail2.store_evidance');
Route::delete('/MoM2/detail/{id}', [DetailLvl2Controller::class, 'destroy'])
->middleware(['auth','role:ADMIN'])
->name('detail2.destroy');
Route::delete('/MoM2/detail/evidance/{id}', [EvidanceLevel2Controller::class,'destroy'])
->middleware(['auth','role:ADMIN'])
->name('evidance2.destroy');

// MoM Level 3
Route::get('/MoM3', [MoM3Controller::class,'index'])
->middleware(['auth','level3'])
->name('MoM3');
Route::post('/MoM3/store',[MoM3Controller::class,'store'])
->middleware(['auth','role:ADMIN'])
->name('MoM3.store');
Route::put('/MoM3/update/{id}',[MoM3Controller::class,'update'])
->middleware(['auth','role:ADMIN'])
->name('MoM3.update');
Route::delete('/MoM3/destroy/{id}', [MoM3Controller::class,'destroy'])
->middleware(['auth'])
->name('MoM3.destroy','role:ADMIN');

Route::get('/MoM3/detail/{id}', [DetailLvl3Controller::class,'index'])
->middleware(['auth','level3'])
->name('detail3.index');
Route::post('MoM3/detail/store',[DetailLvl3Controller::class,'store'])
->middleware(['auth','role:ADMIN'])
->name('detail3.store');
Route::put('MoM3/detail/update/{id}',[DetailLvl3Controller::class,'update'])
->middleware(['auth'])
->name('detail3.update');
Route::post('MoM3/detail/evidance',[DetailLvl3Controller::class,'store_evidance'])
->middleware(['auth'])
->name('detail3.store_evidance');
Route::delete('/MoM3/detail/{id}', [DetailLvl3Controller::class, 'destroy'])
->middleware(['auth','role:ADMIN'])
->name('detail3.destroy');
Route::delete('/MoM3/detail/evidance/{id}', [EvidanceLevel3Controller::class,'destroy'])
->middleware(['auth','role:ADMIN'])
->name('evidance3.destroy');

Route::post('daftar_hadir_3/store',[MoM2Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir3.store');
Route::put('daftar_hadir_3/update',[MoM2Controller::class,'update_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir3.update');

// Route::match(['get','post'],'/MoM1/{id}', [App\Http\Controllers\MoM1Controller::class, 'modal_show'])
// ->middleware(['auth'])
// ->name('daftarHadir1.edit');



Route::get('/pengaturan-akun', [PengaturanAkunController::class,'index'])
->middleware(['auth','role:ADMIN'])
->name('pengaturanAkun.index');
Route::post('/pengaturan-akun/store', [PengaturanAkunController::class,'storeAkun'])
->middleware(['auth','role:ADMIN'])
->name('pengaturanAkun.store');
Route::put('/pengaturan-akun/update/{id}', [PengaturanAkunController::class,'update'])
->middleware(['auth','role:ADMIN'])
->name('pengaturanAkun.update');
Route::delete('/pengaturan-akun/update/{id}', [PengaturanAkunController::class,'destroy'])
->middleware(['auth','role:ADMIN'])
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