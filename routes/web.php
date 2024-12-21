<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/my-account', function(){
        return view('my-account')->name('my-account');
    });
});
Route::middleware(['alreadyLoggedIn'])->group(function(){
    Route::get('/login',[LoginController::class, "create"])->name('login');
    
    Route::get('/register',[RegisterController::class, "create"])->name('register');

});


Route::post('/register', [RegisterController::class, "store"]);
Route::post('/login', [LoginController::class, "login"]);
