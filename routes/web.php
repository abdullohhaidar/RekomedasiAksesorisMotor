<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VelgController;
use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\SuspensiController;
use App\Http\Controllers\EtalaseBanController;
use App\Http\Controllers\EtalaseSuspensiController;
use App\Http\Controllers\EtalaseVelgController;
use App\Http\Controllers\RekomendasiController;

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



Route::get('/default', function () {
    return view('UserPage.default');
});

Route::get('/', function () {
    return view('UserPage.halamanUtama');
})->name('home');;

// Route::get('/velg', function () {
//     return view('UserPage.velg');
// })->name('velg');
Route::get('/etalase/velg', [EtalaseVelgController::class, 'index'])->name('etalaseVelg');
Route::get('/etalase/velg/detail/{id}', [EtalaseVelgController::class, 'show'])->name('detailEVelg');


// Route::get('/ban', function () {
//     return view('UserPage.ban');
// })->name('ban');
Route::get('/etalase/ban', [EtalaseBanController::class, 'index'])->name('etalaseBan');
Route::get('/etalase/ban/detail/{id}', [EtalaseBanController::class, 'show'])->name('detailEBan');

// Route::get('/suspensi', function () {
//     return view('UserPage.suspensi');
// })->name('suspensi');
Route::get('/etalase/suspensi', [EtalaseSuspensiController::class, 'index'])->name('etalaseSuspensi');
Route::get('/etalase/suspensi/detail/{id}', [EtalaseSuspensiController::class, 'show'])->name('detailESuspensi');

Route::get('/detailVelg', function () {
    return view('UserPage.detailVelg');
})->name('detail');

Route::get('/detailBan', function () {
    return view('UserPage.detailBan');
})->name('detailBan');

Route::get('/detailSuspensi', function () {
    return view('UserPage.detailSuspensi');
})->name('detailSuspensi');

// Route::get('/rekomendasi', function () {
//     return view('UserPage.rekomendasi');
// })->name('rekomendasi');
Route::get('/rekomendasi', [RekomendasiController::class, 'showRekomendasiForm'])->name('rekomendasi');
Route::post('/rekomendasi/velg', [RekomendasiController::class, 'filterVelg'])->name('rekomendasi.velg');
Route::post('/rekomendasi/ban', [RekomendasiController::class, 'filterBan'])->name('rekomendasi.ban');
Route::post('/rekomendasi/suspensi', [RekomendasiController::class, 'filterSuspensi'])->name('rekomendasi.suspensi');
Route::get('/get-ukuran-velg/{nama_motor}', [RekomendasiController::class, 'getUkuranVelg'])->name('ukuranVelg');
Route::get('/get-ukuran-ban/{nama_motor}', [RekomendasiController::class, 'getUkuranBan'])->name('ukuranBan');
Route::get('/get-ukuran-suspensi/{nama_motor}', [RekomendasiController::class, 'getUkuranSuspensi'])->name('ukuranSuspensi');


Route::get('/admin', function () {
    return view('AdminPage.default');
})->name('defaultAdmin');

//Admin Page

Route::get('/adminFix', function () {
    return view('AdminPage.defaultFix');
})->name('defaultAdminFix');

Route::get('/adminDashboard', function () {
    return view('AdminPage.dashboard');
})->name('adminDashboard');

// Velg
// Route::get('/adminTableVelg', function () {
//     return view('AdminPage.tableVelg');
// })->name('adminTableVelg');

Route::get('/adminTableVelg', [VelgController::class, 'index'])->name('adminTableVelg');
Route::post('/velg/input', [VelgController::class, 'store'])->name('velg.input');
Route::get('/velg/{id}', [VelgController::class, 'show'])->name('velg.show');
Route::put('/velg/update/{id}', [VelgController::class, 'update'])->name('velg.update');
Route::delete('/velg/{id}', [VelgController::class, 'destroy'])->name('velg.destroy');

// Ban
// Route::get('/adminTableBan', function () {
//     return view('AdminPage.tableBan');
// })->name('adminTableBan');

Route::get('/adminTableBan', [BanController::class, 'index'])->name('adminTableBan');
Route::post('/ban/input', [BanController::class, 'store'])->name('ban.input');
Route::get('/ban/{id}', [BanController::class, 'show'])->name('ban.show');
Route::put('/ban/update/{id}', [BanController::class, 'update'])->name('ban.update');
Route::delete('/ban/{id}', [BanController::class, 'destroy'])->name('ban.destroy');

// Suspensi 
// Route::get('/adminTableSuspensi', function () {
//     return view('AdminPage.tableSuspensi');
// })->name('adminTableSuspensi');

Route::get('/adminTableSuspensi', [SuspensiController::class, 'index'])->name('adminTableSuspensi');
Route::post('/suspensi/input', [SuspensiController::class, 'store'])->name('suspensi.input');
Route::get('/suspensi/{id}', [SuspensiController::class, 'show'])->name('suspensi.show');
Route::put('/suspensi/update/{id}', [SuspensiController::class, 'update'])->name('suspensi.update');
Route::delete('/suspensi/{id}', [SuspensiController::class, 'destroy'])->name('suspensi.destroy');

// Referensi
Route::get('/adminButtons', function () {
    return view('AdminPage.ui-features.buttons');
})->name('adminButtons');

Route::get('/adminDropdown', function () {
    return view('AdminPage.ui-features.dropdowns');
})->name('adminDropdown');

Route::get('/adminTypograpy', function () {
    return view('AdminPage.ui-features.typography');
})->name('adminTypograpy');

Route::get('/adminFontAwesome', function () {
    return view('AdminPage.icons.font-awesome');
})->name('adminFontAwesome');

Route::get('/adminForms', function () {
    return view('AdminPage.forms.basic-elements');
})->name('adminForms');

Route::get('/adminCharts', function () {
    return view('AdminPage.charts.chartjs');
})->name('adminCharts');

Route::get('/adminTables', function () {
    return view('AdminPage.tables.basic-table');
})->name('adminTables');

Route::get('/adminBlank', function () {
    return view('AdminPage.samples.blank-page');
})->name('adminBlank');

Route::get('/adminError404', function () {
    return view('AdminPage.samples.error-404');
})->name('adminError404');

Route::get('/adminError500', function () {
    return view('AdminPage.samples.error-500');
})->name('adminError500');

Route::get('/adminLogin', function () {
    return view('AdminPage.samples.login');
})->name('adminLogin');

Route::get('/adminRegister', function () {
    return view('AdminPage.samples.register');
})->name('adminRegister');
