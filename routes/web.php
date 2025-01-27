<?php

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/my-account',[UserController::class, 'index'])->name('my-account');
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

    Route::post('/recipes/{recipeId}/like', [RecipeController::class, 'like'])->name('recipes.recipe.like');
    Route::post('/recipes/{recipeId}/save', [RecipeController::class, 'save'])->name('recipes.recipe.save');
    Route::post('/recipes/{recipeId}/comment', [CommentController::class, 'store'])->name('recipes.recipe.comment');
    Route::delete('/recipes/{commentId}/delete', [CommentController::class, 'delete'])->name('recipes.recipe.delete-comment');

    
Route::put("/user/{userId}/update", [UserController::class, "update"])->name('user.update');

Route::delete("/user/{userId}/delete", [UserController::class, "delete"])->name('user.delete');
});

Route::middleware(['alreadyLoggedIn'])->group(function(){
    Route::get('/login',[LoginController::class, "create"])->name('login');
    
    Route::get('/register',[RegisterController::class, "create"])->name('register');

});

Route::get('/recipes/recipe/{recipeId}', [RecipeController::class, "index"])->name('recipes.recipe');

Route::post('/register', [RegisterController::class, "store"]);
Route::post('/login', [LoginController::class, "login"]);
Route::post('/logout', [LogOutController::class, "logout"])->name("logout");
Route::post('/create-recipe', [RecipeController::class, "store" ])->name('create-recipe');
