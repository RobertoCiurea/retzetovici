<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/my-account', function(Request $request){
        $content = $request->get('content');
        return view('my-account', ["content"=>$content]);
    })->name('my-account');
    Route::get('/account-details', function(){
        return redirect('my-account?content=account-details');
    });
    Route::get('/my-recipes', function(){
        //get user's recipes from db
        return redirect('my-account?content=my-recipes');
    });
    Route::get('/saved-recipes', function(){
        //get user's saved recipes from db
        return redirect('my-account?content=saved-recipes');
    });
    Route::get("/add-recipe", function(){
        return view("add-recipe");
    });

    
Route::put("/user/{userId}/update", [UserController::class, "update"])->name('user.update');

Route::delete("/user/{userId}/delete", [UserController::class, "delete"])->name('user.delete');
});

Route::middleware(['alreadyLoggedIn'])->group(function(){
    Route::get('/login',[LoginController::class, "create"])->name('login');
    
    Route::get('/register',[RegisterController::class, "create"])->name('register');

});


Route::post('/register', [RegisterController::class, "store"]);
Route::post('/login', [LoginController::class, "login"]);
Route::post('/logout', [LogOutController::class, "logout"])->name("logout");
Route::post('/create-recipe', [RecipeController::class, "store" ]);
