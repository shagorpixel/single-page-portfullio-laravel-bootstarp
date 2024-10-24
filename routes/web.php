<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\mainPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfullioController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'index'])->name('home.page');
Route::get('/service',[PagesController::class,'service'])->name('service.page');
route::post('/contact',[contactController::class,'store'])->name('contact.store');

Route::get('/admin',[PagesController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/admin/main',[mainPageController::class,'index'])->name('dashboard.main')->middleware('auth');
Route::put('/admin/{id}',[mainPageController::class,'update'])->name('main.update')->middleware('auth');
Route::resource('/admin/service', ServiceController::class)->middleware('auth');
Route::resource('admin/portfullio', PortfullioController::class)->middleware('auth');
Route::resource('admin/team',TeamController::class)->middleware('auth');
Route::resource('admin/about', AboutController::class)->middleware('auth');
Route::resource('admin/servicecategory', ServiceCategoryController::class)->middleware('auth');


Route::get('/test',function(){
    return view('welcome');
});
Auth::routes();

