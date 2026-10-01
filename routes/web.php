<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class, 'index'])->name('index');

Route::get('detail/{id}',[App\Http\Controllers\FrontController::class, 'detail'])->name('detail');

Route::get('category/{id}',[App\Http\Controllers\FrontController::class, 'postsCategory'])->name('posts.category');

Route::get('/admin',[App\Http\Controllers\DashboardController::class, 'index'])->name('admin-index');