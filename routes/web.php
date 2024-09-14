<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\mainPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfullioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'index'])->name('home.page');
route::post('/contact',[contactController::class,'store'])->name('contact.store');

Route::get('/admin',[PagesController::class,'dashboard'])->name('dashboard');
Route::get('/admin/main',[mainPageController::class,'index'])->name('dashboard.main');
Route::put('/admin/{id}',[mainPageController::class,'update'])->name('main.update');
Route::resource('/admin/service', ServiceController::class);
Route::resource('admin/portfullio', PortfullioController::class);
Route::resource('admin/team',TeamController::class);
Route::resource('admin/about', AboutController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
