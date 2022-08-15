<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Dashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/login',Login::class)->name('login');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/register',Register::class)->name('auth.register');
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
});
