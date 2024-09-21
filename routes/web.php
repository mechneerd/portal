<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublishJobController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::inertia('/','Home')->name('home');


Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::post('/login', [AuthController::class,'login']);

Route::inertia('/register','Auth/Register')->name('register');

Route::post('/register', [AuthController::class, 'register']);


//posting

Route::inertia('/post','Post/Create')->name('post');
//create
Route::post('/post',[PublishJobController::class,'create'])->name('post');
//index
Route::get('/postindex',[PublishJobController::class,'index'])->name('postindex');