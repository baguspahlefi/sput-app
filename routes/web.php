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
use App\Http\Controllers\MoM1ReportsController;
use App\Http\Controllers\MoM2ReportsController;
use App\Http\Controllers\MoM3ReportsController;

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


Route::get('/', [DashboardController::class,'index'])
->middleware(['auth','verified'])
->name('dashboard');

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
->middleware(['auth'])
->name('evidance1.destroy');

Route::post('daftar_hadir_1/store',[MoM1Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir1.store');
Route::put('daftar_hadir_1/update',[MoM1Controller::class,'update_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir1.update');
Route::get('daftar_hadir_1/destroy/{id}',[MoM1Controller::class,'destroy_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir1.destroy');

Route::get('/MoM1/detail/cetak_pdf/{id}', [DetailLvl1Controller::class,'cetak_pdf'])
->middleware(['auth'])
->name('MoM1.cetakPdf');
Route::get('/MoM1/detail/cetak_excel/{id}', [DetailLvl1Controller::class,'cetak_excel'])
->middleware(['auth'])
->name('MoM1.cetakExcel');
Route::get('/MoM1/detail/format_excel/{id}', [DetailLvl1Controller::class,'format_excel'])
->middleware(['auth'])
->name('MoM1.formatExcel');
Route::post('/MoM1/detail/upload_excel/{id}', [DetailLvl1Controller::class,'upload_excel'])
->middleware(['auth'])
->name('MoM1.uploadExcel');
Route::get('/MoM1/detail/cetak_word/{id}', [DetailLvl1Controller::class,'cetak_word'])
->middleware(['auth'])
->name('MoM1.cetakWord');


Route::get('/MoM1/reports', [MoM1ReportsController::class,'index'])
->middleware(['auth','level1'])
->name('MoM1.reports');
Route::post('/MoM1/reportPDF/filter', [MoM1ReportsController::class,'filter'])
->middleware(['auth'])
->name('MoM1.filter');
Route::post('/MoM1/reportPDF', [MoM1ReportsController::class,'reportPDF'])
->middleware(['auth'])
->name('MoM1.reportPDF');
Route::post('/MoM1/reportExcel', [MoM1ReportsController::class,'reportExcel'])
->middleware(['auth'])
->name('MoM1.reportExcel');


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

Route::post('daftar_hadir_2/store',[MoM2Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir2.store');
Route::put('daftar_hadir_2/update',[MoM2Controller::class,'update_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir2.update');
Route::get('daftar_hadir_2/destroy/{id}',[MoM2Controller::class,'destroy_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir2.destroy');

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
->middleware(['auth'])
->name('evidance2.destroy');

Route::get('/MoM2/detail/cetak_pdf/{id}', [DetailLvl2Controller::class,'cetak_pdf'])
->middleware(['auth'])
->name('MoM2.cetakPdf');
Route::get('/MoM2/detail/format_excel/{id}', [DetailLvl2Controller::class,'format_excel'])
->middleware(['auth'])
->name('MoM2.formatExcel');
Route::post('/MoM2/detail/upload_excel/{id}', [DetailLvl2Controller::class,'upload_excel'])
->middleware(['auth'])
->name('MoM2.uploadExcel');
Route::get('/MoM2/detail/cetak_excel/{id}', [DetailLvl2Controller::class,'cetak_excel'])
->middleware(['auth'])
->name('MoM2.cetakExcel');
Route::get('/MoM2/detail/cetak_word/{id}', [DetailLvl2Controller::class,'cetak_word'])
->middleware(['auth'])
->name('MoM2.cetakWord');

Route::get('/MoM2/reports', [MoM2ReportsController::class,'index'])
->middleware(['auth','level2'])
->name('MoM2.reports');
Route::post('/MoM2/reportPDF/filter', [MoM2ReportsController::class,'filter'])
->middleware(['auth'])
->name('MoM2.filter');
Route::post('/MoM2/reportPDF', [MoM2ReportsController::class,'reportPDF'])
->middleware(['auth'])
->name('MoM2.reportPDF');
Route::post('/MoM2/reportExcel', [MoM2ReportsController::class,'reportExcel'])
->middleware(['auth'])
->name('MoM2.reportExcel');


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
->middleware(['auth'])
->name('evidance3.destroy');

Route::post('daftar_hadir_3/store',[MoM3Controller::class,'modal_store'])
->middleware(['auth'])
->name('daftarHadir3.store');
Route::put('daftar_hadir_3/update',[MoM3Controller::class,'update_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir3.update');
Route::get('daftar_hadir_3/destroy/{id}',[MoM3Controller::class,'destroy_daftarHadir'])
->middleware(['auth'])
->name('daftarHadir3.destroy');

Route::get('/MoM3/detail/cetak_pdf/{id}', [DetailLvl3Controller::class,'cetak_pdf'])
->middleware(['auth'])
->name('MoM3.cetakPdf');
Route::get('/MoM3/detail/cetak_excel/{id}', [DetailLvl3Controller::class,'cetak_excel'])
->middleware(['auth'])
->name('MoM3.cetakExcel');
Route::get('/MoM3/detail/format_excel/{id}', [DetailLvl3Controller::class,'format_excel'])
->middleware(['auth'])
->name('MoM3.formatExcel');
Route::post('/MoM3/detail/upload_excel/{id}', [DetailLvl3Controller::class,'upload_excel'])
->middleware(['auth'])
->name('MoM3.uploadExcel');
Route::get('/MoM3/detail/cetak_word/{id}', [DetailLvl3Controller::class,'cetak_word'])
->middleware(['auth'])
->name('MoM3.cetakWord');

Route::get('/MoM3/reports', [MoM3ReportsController::class,'index'])
->middleware(['auth','level3'])
->name('MoM3.reports');
Route::post('/MoM3/reportPDF/filter', [MoM3ReportsController::class,'filter'])
->middleware(['auth'])
->name('MoM3.filter');
Route::post('/MoM3/reportPDF', [MoM3ReportsController::class,'reportPDF'])
->middleware(['auth'])
->name('MoM3.reportPDF');
Route::post('/MoM3/reportExcel', [MoM3ReportsController::class,'reportExcel'])
->middleware(['auth'])
->name('MoM3.reportExcel');

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