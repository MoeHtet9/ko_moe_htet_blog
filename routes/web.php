<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class, 'index'])->name('index');

Route::get('detail/{id}',[App\Http\Controllers\FrontController::class, 'detail'])->name('detail');

Route::get('category/{id}',[App\Http\Controllers\FrontController::class, 'postsCategory'])->name('posts.category');

Route::get('/admin',[App\Http\Controllers\DashboardController::class, 'index'])->name('admin-index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');

    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
});
