<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
Route::middleware(['auth',])->group(function () {
    Route::get('/',[App\Http\Controllers\MessageController::class,'index'])->name('index');
    Route::get('/chat/{id}',[App\Http\Controllers\MessageController::class,'show'])->name('chat');
});

Route::post('/save', [App\Http\Controllers\MessageController::class,'save'])->name('save');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
