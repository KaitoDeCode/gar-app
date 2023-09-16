<?php

use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KommentarFotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VideoController;
use App\Models\Favorite;
use App\Models\Kommentar_foto;
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


Route::resource('/albums',AlbumsController::class);
Route::resource('/fotos',FotoController::class);
Route::resource('/videos',VideoController::class);
Route::resource('/komentar',App\Http\Controllers\KommentarFotoController::class);
Route::resource('like',LikeController::class);
Route::resource('favorite',FavoriteController::class);
Route::get('lihatreport/{foto_id}', [ReportController::class, 'show'])->name('lihatreport');
Route::delete('hapusreport/{report_id}', [ReportController::class, 'destroy'])->name('hapusReport');
Route::get('/report/{foto_id}', [ReportController::class, 'create'])->name('report.create');
Route::post('/report/{foto_id}', [ReportController::class, 'store'])->name('report.store');
// Route::resource('report',ReportController::class);

Route::get('explore',[FotoController::class,'explore'])->name('explore');
Route::get('lihatkomen/{id}',[KommentarFotoController::class,'lihat'])->name('lihatkomen');
Route::get('komentar/edit/{id}',[App\Http\Controllers\KommentarFotoController::class,'edit'])->name('editKomentar');
Route::put('komentar/update/{id}',[App\Http\Controllers\KommentarFotoController::class,'update'])->name('updateKomentar');


// Login and Register Route

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/register','register')->name('register');
    Route::post('/store','store')->name('store');
    Route::get('/login','login')->name('login');
    Route::post('/authenticate','authenticate')->name('authenticate');
    Route::get('/beranda','beranda')->name('beranda');
    Route::post('/logout','logout')->name('logout');
});
