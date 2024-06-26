<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class,'homepage'])->name('homepage');

Auth::routes();

Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

Route::prefix('/dashboard')->controller(CategoryController::class)->name('dashboard')->group(function (){
    Route::get('/category','category')->name('.category');
    Route::post('/category','categoryInsert')->name('.categoryInsert');
    Route::get('/category/{id}','categoryEdit')->name('.categoryEdit');
    Route::post('/category/{id}','categoryUpdate')->name('.categoryUpdate');
    Route::get('/category/delete/{id}','categoryDelete')->name('.categoryDelete');
});