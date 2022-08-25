<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Request;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Dashboard;
use App\Http\Livewire\Auth\ListUsers;
use App\Http\Livewire\Auth\ListRequest;
use App\Http\Livewire\Auth\RequestDetail;
use App\Http\Livewire\Auth\Request\DataCij;

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
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/users',ListUsers::class)->name('auth.users');
    Route::get('/register',Register::class)->name('auth.register');
    Route::get('/requests',App\Http\Livewire\Auth\Request\Index::class)->name('requests.index');
    Route::get('/request/create',App\Http\Livewire\Auth\Request\Create::class)->name('requests.create');
    Route::get('/request/detail/{id}',RequestDetail::class)->name('requests.detail');
});