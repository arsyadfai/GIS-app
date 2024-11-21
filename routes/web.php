<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\MapController;


Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard/input/wilayah', [DashboardController::class, 'inputWilayah'])->name('home');
Route::post('/dashboard/input/wilayah', [DashboardController::class, 'simpanInputWilayah'])->name('home');
Route::get('/dashboard/input/iku', [DashboardController::class, 'inputIKU'])->name('home');
Route::post('/dashboard/input/iku', [DashboardController::class, 'SimpanInputIKU'])->name('home');

Route::get('/tahun', [YearController::class, 'index'])->name('tahun.index');

Route::get('/map-data', [MapController::class, 'getMapData']);
