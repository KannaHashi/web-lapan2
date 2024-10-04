<?php

use App\Http\Controllers\DashboardControllers;
use Illuminate\Support\Facades\Route;
use App\Models\Modis;

// Route::get('/', function () {
//     return view('index', ['modis' => Modis::all()]);
// });

// Route::get('/', function (){
//     return view('index', ['modis' => Modis::all()]);
// });

// Route::get('/', function (){
//     return view('index');
// });

Route::get('/', [DashboardControllers::class, 'index'])->name('dashboard');
Route::get('#pleiades', [DashboardControllers::class, 'pleiades'])->name('dashboard');
Route::get('/testing', [DashboardControllers::class, 'testing'])->name('testing');
Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('dashboard');