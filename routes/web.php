<?php

use App\Http\Controllers\Chapter;
use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'home']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'doctruyen'])->name('danh-muc');
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen'])->name('xem-truyen');
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter'])->name('xem-chapter');
Route::get('/xem-theloai/{slug}', [IndexController::class, 'xemtheloai'])->name('xem-theloai');

Route::post('/timkiem', [IndexController::class, 'timkiem'])->name('tim-kiem');
Route::post('/timkiem-ajax', [IndexController::class, 'timkiem_ajax']);


Route::post('/truyen_noibat', [TruyenController::class, 'truyennoibat']);
Route::post('/kich-hoat', [TruyenController::class, 'kichhoat']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
