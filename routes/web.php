<?php

use App\Http\Controllers\mainPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfullioController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'index'])->name('home.page');
Route::get('/admin',[PagesController::class,'dashboard'])->name('dashboard');
Route::get('/admin/main',[mainPageController::class,'index'])->name('dashboard.main');
Route::put('/admin/{id}',[mainPageController::class,'update'])->name('main.update');
Route::resource('/admin/service', ServiceController::class);
Route::resource('admin/portfullio', PortfullioController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
