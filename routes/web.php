<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\User\Create as UserCreate;
use App\Http\Livewire\Auth\User\Detail as UserDetail;
// use App\Http\Livewire\Auth\User\Edit as UserEdit;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Dashboard;
use App\Http\Livewire\Auth\User\Index as Users;
use App\Http\Livewire\Auth\Request\DataCij;
use App\Http\Livewire\Auth\Request\Edit;
use App\Events\RequestCreated;
use App\Events\Hello;

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
Route::get('/broadcast',function(){
    event(new Hello('hello goblog'));;
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/login',Login::class)->name('login');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/users',Users::class)->name('auth.users');
    Route::get('/user/register',UserCreate::class)->name('auth.user.register');
    Route::get('/user/detail/{id}',UserDetail::class)->name('auth.user.detail');
    Route::get('/requests',App\Http\Livewire\Auth\Request\Index::class)->name('requests.index');
    Route::get('/request/create',App\Http\Livewire\Auth\Request\Create::class)->name('requests.create');
    Route::get('/request/detail/{id}',App\Http\Livewire\Auth\Request\Detail::class)->name('requests.detail');
    Route::get('/request/edit/{id}',Edit::class)->name('requests.edit');
});