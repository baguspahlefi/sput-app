<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoM1Controller;
use App\Http\Controllers\MoM2Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailLvl1Controller;
use App\Http\Controllers\DetailLvl2Controller;
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

Route::get('/MoM1', [MoM1Controller::class,'index'])
->middleware(['auth','level1'])
->name('MoM1');
Route::post('MoM1/store',[MoM1Controller::class,'store'])
->middleware(['auth'])
->name('MoM1.store');
Route::post('daftar_hadir/store',[MoM1Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir1.store');
Route::get('/MoM1/detail/{id}', [DetailLvl1Controller::class,'index'])
->middleware(['auth','level1'])
->name('detail1.show');

Route::get('/MoM2', [MoM2Controller::class,'index'])
->middleware(['auth','level1'])
->name('MoM2');
Route::post('MoM2/store',[MoM2Controller::class,'store'])
->middleware(['auth'])
->name('MoM2.store');
Route::post('daftar_hadir2/store',[MoM2Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir2.store');
Route::get('/MoM2/detail/{id}', [DetailLvl2Controller::class,'index'])
->middleware(['auth','level2'])
->name('detail2.show');






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
