<?php

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



Route::get('/default', function () {
    return view('UserPage.default');
});

Route::get('/', function () {
    return view('UserPage.halamanUtama');
})->name('home');;

Route::get('/velg', function () {
    return view('UserPage.velg');
})->name('velg');

Route::get('/ban', function () {
    return view('UserPage.ban');
})->name('ban');

Route::get('/suspensi', function () {
    return view('UserPage.suspensi');
})->name('suspensi');

Route::get('/detail', function () {
    return view('UserPage.detail');
})->name('detail');

Route::get('/detailBan', function () {
    return view('UserPage.detailBan');
})->name('detailBan');

Route::get('/detailSuspensi', function () {
    return view('UserPage.detailSuspensi');
})->name('detailSuspensi');

Route::get('/rekomendasi', function () {
    return view('UserPage.rekomendasi');
})->name('rekomendasi');

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

Route::get('/adminTableVelg', function () {
    return view('AdminPage.tableVelg');
})->name('adminTableVelg');

Route::get('/adminTableBan', function () {
    return view('AdminPage.tableBan');
})->name('adminTableBan');

Route::get('/adminTableSuspensi', function () {
    return view('AdminPage.tableSuspensi');
})->name('adminTableSuspensi');

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
