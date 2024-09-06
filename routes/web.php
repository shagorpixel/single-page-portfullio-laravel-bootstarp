<?php

use App\Http\Controllers\mainPageController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'index'])->name('home.page');
Route::get('/admin/dashboard',[PagesController::class,'dashboard'])->name('dashboard');
Route::get('/admin/dashboard/main',[mainPageController::class,'index'])->name('dashboard.main');
Route::put('/admin/dashboard/{id}',[mainPageController::class,'update'])->name('main.update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
