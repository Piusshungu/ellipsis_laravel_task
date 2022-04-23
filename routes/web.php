<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{id}',[UserController::class,'profile'])->name('profile');
    Route::put('/users/{id}/update',[UserController::class,'update'])->name('users.update');
    Route::resource('links',ShortLinkController::class);
    Route::put('/links/{link}/deactivate',[ShortLinkController::class,'deactivate'])->name('links.deactivate');
});
