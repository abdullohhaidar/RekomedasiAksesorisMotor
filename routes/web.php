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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/default', function () {
    return view('UserPage.default');
});

Route::get('/halaman-utama', function () {
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