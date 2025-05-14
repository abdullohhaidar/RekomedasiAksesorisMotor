<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VelgController;
use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\SuspensiController;
use App\Http\Controllers\Admin\KategoriVelgController;
use App\Http\Controllers\Admin\KategoriSuspensiController;
use App\Http\Controllers\Admin\KategoriBanController;
use App\Http\Controllers\EtalaseBanController;
use App\Http\Controllers\EtalaseSuspensiController;
use App\Http\Controllers\EtalaseVelgController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\HistoryLikeVelgController;
use App\Http\Controllers\HistoryLikeBanController;
use App\Http\Controllers\HistoryLikeSuspensiController;


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

Route::get('/login', [LoginUserController::class, 'index'])->name('loginUser');
Route::post('/login', [LoginUserController::class, 'loginUser'])->name('login');
Route::get('/logout', [LoginUserController::class, 'logoutUser'])->name('logoutUser');


Route::get('/register', [RegisterUserController::class, 'index'])->name('registerUser');
Route::post('/register', [RegisterUserController::class, 'registerUser'])->name('register');

Route::get('/', function () {
    return view('UserPage.halamanUtama');
})->name('home');;

// Route::get('/velg', function () {
//     return view('UserPage.velg');
// })->name('velg');
Route::get('/etalase/velg', [EtalaseVelgController::class, 'index'])->name('etalaseVelg');
Route::get('/etalase/velg/detail/{id}', [EtalaseVelgController::class, 'show'])->name('detailEVelg');
Route::post('/toggle-like-velg', [HistoryLikeVelgController::class, 'toggleLike'])->name('toggle.like.velg');


// Route::get('/ban', function () {
//     return view('UserPage.ban');
// })->name('ban');
Route::get('/etalase/ban', [EtalaseBanController::class, 'index'])->name('etalaseBan');
Route::get('/etalase/ban/detail/{id}', [EtalaseBanController::class, 'show'])->name('detailEBan');
Route::post('/toggle-like-ban', [HistoryLikeBanController::class, 'toggleLike'])->name('toggle.like.ban');

// Route::get('/suspensi', function () {
//     return view('UserPage.suspensi');
// })->name('suspensi');
Route::get('/etalase/suspensi', [EtalaseSuspensiController::class, 'index'])->name('etalaseSuspensi');
Route::get('/etalase/suspensi/detail/{id}', [EtalaseSuspensiController::class, 'show'])->name('detailESuspensi');
Route::post('/toggle-like-suspensi', [HistoryLikeSuspensiController::class, 'toggleLike'])->name('toggle.like.suspensi');

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

// Kategori Velg
Route::get('/adminKatVelg', [KategoriVelgController::class, 'index'])->name('adminKatVelg');
Route::post('/katVelg/input', [KategoriVelgController::class, 'store'])->name('katVelg.input');
Route::get('/katVelg/{id}', [KategoriVelgController::class, 'show'])->name('katVelg.show');
Route::put('/katVelg/update/{id}', [KategoriVelgController::class, 'update'])->name('katVelg.update');
Route::delete('/katVelg/{id}', [KategoriVelgController::class, 'destroy'])->name('katVelg.destroy');

// Kategori Suspensi
Route::get('/adminKatSuspensi', [KategoriSuspensiController::class, 'index'])->name('adminKatSuspensi');
Route::post('/katSuspensi/input', [KategoriSuspensiController::class, 'store'])->name('katSuspensi.input');
Route::get('/katSuspensi/{id}', [KategoriSuspensiController::class, 'show'])->name('katSuspensi.show');
Route::put('/katSuspensi/update/{id}', [KategoriSuspensiController::class, 'update'])->name('katSuspensi.update');
Route::delete('/katSuspensi/{id}', [KategoriSuspensiController::class, 'destroy'])->name('katSuspensi.destroy');

// Kategori Ban
Route::get('/adminKatBan', [KategoriBanController::class, 'index'])->name('adminKatBan');
Route::post('/katBan/input', [KategoriBanController::class, 'store'])->name('katBan.input');
Route::get('/katBan/{id}', [KategoriBanController::class, 'show'])->name('katBan.show');
Route::put('/katBan/update/{id}', [KategoriBanController::class, 'update'])->name('katBan.update');
Route::delete('/katBan/{id}', [KategoriBanController::class, 'destroy'])->name('katBan.destroy');

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
