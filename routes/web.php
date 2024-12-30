<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'login.login')->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');
