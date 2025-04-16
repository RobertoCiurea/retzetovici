<?php

use App\Http\Controllers\AdminController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReportController;
use App\Models\Contact;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Types\Relations\Role;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/my-account',[UserController::class, 'index'])->name('my-account');
    Route::get('/account-details', function(){
        return redirect('my-account?content=account-details');
    })->name('redirect.account-details');
    Route::get('/my-recipes', function(){
        //get user's recipes from db
        return redirect('my-account?content=my-recipes');
    })->name("redirect.my-recipes");
    Route::get('/saved-recipes', function(){
        //get user's saved recipes from db
        return redirect('my-account?content=saved-recipes');
    })->name('redirect.saved-recipes');
    Route::get("/add-recipe", function(){
        return view("add-recipe");
    });

    Route::post('/recipes/{recipeId}/like', [RecipeController::class, 'like'])->name('recipes.recipe.like');
    Route::post('/recipes/{recipeId}/save', [RecipeController::class, 'save'])->name('recipes.recipe.save');
    Route::delete('/recipes/{recipeId}/delete', [RecipeController::class, 'delete'])->name('recipes.recipe.delete');
    Route::post('/recipes/{recipeId}/comment', [CommentController::class, 'store'])->name('recipes.recipe.comment');
    Route::delete('/comments/{commentId}/delete', [CommentController::class, 'delete'])->name('recipes.recipe.delete-comment');

    
Route::put("/user/{userId}/update", [UserController::class, "update"])->name('user.update');

Route::delete("/user/{userId}/delete", [UserController::class, "delete"])->name('user.delete');
});

Route::middleware(['alreadyLoggedIn'])->group(function(){
    Route::get('/login',[LoginController::class, "create"])->name('login');
    
    Route::get('/register',[RegisterController::class, "create"])->name('register');

});
//admin logic
Route::middleware(['admin'])->group(function(){
    Route::get("/admin-panel", [AdminController::class, 'index']);
    Route::get('/user/{userId}/details', [AdminController::class, 'userDetails'])->name("user.details");
    Route::post('/searchRecipe', [AdminController::class, 'searchRecipe'])->name('recipes.recipe.search');

    Route::delete('/delete-contact/{contactId}', [ContactController::class, 'delete'])->name('contact.delete');

    //user messages for staff
    Route::get("/messages/{type}", function($type){
        switch($type){
            case 'contact':
                $contacts = Contact::get();
                return view('admin-messages', compact('contacts'));
            case 'report':
                $reports = Report::get();
                return view("admin-reports", compact("reports"));
                break;    
        }
    });
});

Route::get('/redirect-admin-panel', function(){
    return redirect('/admin-panel');
})->name('redirect.admin-panel');


//newsletter logic
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter');

//error page logic
Route::get('/redirect-back', [ErrorController::class, 'redirectBack'])->name('redirect.back');
Route::get("/error", [ErrorController::class, 'index'])->name("error");
//get certain recipe
Route::get('/recipes/recipe/{recipeId}', [RecipeController::class, "index"])->name('recipes.recipe');

//get categories page
Route::get('/categories', function(){
    return view('categories-page');
});

Route::get('/redirect-categories', function(){
    return redirect('/categories');
})->name('categories');

//category recipes routes

//     //get all recipes
// Route::get('/recipes', function(){
//     $recipes = Recipe::get();
//     return view('recipes.recipes-page', ['recipes'=>$recipes, 'title'=>'Explorează rețete']);
// });

//get recipes based on category
Route::get('/recipes/{category}', [RecipeController::class, 'showRecipes'])->name("recipes.category");

//  //get popular recipes
// Route::get('/recipes/popular-recipes', function(){
//     $popularRecipes = Recipe::orderBy('views', 'desc')->get();
//     return view('recipes.recipes-page', ['recipes'=>$popularRecipes, 'title'=>"Rețete populare"]);
// });

//     //get fast recipes
//     Route::get('/recipes/fast-recipes', function(){
//         $fastRecipes = Recipe::where('category', 'fast_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$fastRecipes, 'title'=>"Rețete rapide"]);
//     });

//     //get fasting recipes
//     Route::get('/recipes/fasting-recipes', function(){
//         $fastingRecipes = Recipe::where('category', 'fasting_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$fastingRecipes, 'title'=>"Rețete de post"]);
//     });

//     //get international recipes
//     Route::get('/recipes/international-recipes', function(){
//         $internationalRecipes = Recipe::where('category', 'international_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$internationalRecipes, 'title'=>"Rețete internationale"]);
//     });

//     //get traditional recipes
//     Route::get('/recipes/traditional-recipes', function(){
//         $traditionalRecipes = Recipe::where('category', 'traditional_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$traditionalRecipes, 'title'=>"Rețete tradiționale"]);
//     });

//     //get vegan recipes
//     Route::get('/recipes/vegan-recipes', function(){
//         $veganRecipes = Recipe::where('category', 'vegan_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$veganRecipes, 'title'=>"Rețete vegane"]);
//     });

//     //get maincourse recipes
//     Route::get('/recipes/maincourse-recipes', function(){
//         $maincourseRecipes = Recipe::where('category', 'maincourse_recipes')->get();
 
//         return view('recipes.recipes-page', ['recipes'=>$maincourseRecipes, 'title'=>"Feluri principale"]);
//     });

//     //get pizza-pasta recipes
//     Route::get('/recipes/pizza-pasta-recipes', function(){
//         $pizzaPastaRecipes = Recipe::where('category', 'pizza_pasta_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$pizzaPastaRecipes, 'title'=>"Pizza și paste"]);
//     });

//     //get soup recipes
//     Route::get('/recipes/soup-recipes', function(){
//         $soupRecipes = Recipe::where('category', 'soup_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$soupRecipes, 'title'=>"Supe și ciorbe"]);
//     });

//     //get fish recipes
//     Route::get('/recipes/fish-recipes', function(){
//         $fishRecipes = Recipe::where('category', 'fish_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$fishRecipes, 'title'=>"Pește și fructe de mare"]);
//     });

//     //get dessert recipes
//     Route::get('/recipes/dessert-recipes', function(){
//         $dessertRecipes = Recipe::where('category', 'dessert_recipes')->get();
//         return view('recipes.recipes-page', ['recipes'=>$dessertRecipes, 'title'=>"Deserturi"]);
//     });

    


//redirect recipes routes

    //all recipes
Route::get('/redirect-recipes', function(){
    return redirect('/recipes');
})->name('recipes');

    //popular recipes
Route::get('/redirect-popular-recipes', function(){
    return redirect('/recipes/popular_recipes');
})->name('recipes.popular-recipes');

    //fast recipes
Route::get('/redirect-fast-recipes', function(){
    return redirect('/recipes/fast_recipes');
})->name('recipes.fast-recipes');

    //fasting recipes
Route::get('/redirect-fasting-recipes', function(){
    return redirect('/recipes/fasting-recipes');
})->name('recipes.fasting-recipes');

    //international recipes
Route::get('/redirect-international-recipes', function(){
    return redirect('/recipes/international-recipes');
})->name('recipes.international-recipes');

    //traditional recipes
Route::get('/redirect-traditional-recipes', function(){
    return redirect('/recipes/traditional-recipes');
})->name('recipes.traditional-recipes');

    //vegan recipes
Route::get('/redirect-vegan-recipes', function(){
    return redirect('/recipes/vegan-recipes');
})->name('recipes.vegan-recipes');

    //maincourse recipes
Route::get('/redirect-maincourse-recipes', function(){
    return redirect('/recipes/maincourse-recipes');
})->name('recipes.maincourse-recipes');

    //pizza-pasta recipes
Route::get('/redirect-pizza-pasta-recipes', function(){
    return redirect('/recipes/pizza-pasta-recipes');
})->name('recipes.pizza-pasta-recipes');

    //soup recipes
Route::get('/redirect-soup-recipes', function(){
    return redirect('/recipes/soup-recipes');
})->name('recipes.soup-recipes');

    //fish recipes
Route::get('/redirect-fish-recipes', function(){
    return redirect('/recipes/fish-recipes');
})->name('recipes.fish-recipes');

    //dessert recipes
Route::get('/redirect-dessert-recipes', function(){
    return redirect('/recipes/dessert-recipes');
})->name('recipes.dessert-recipes');



Route::post('/register', [RegisterController::class, "store"]);
Route::post('/login', [LoginController::class, "login"]);
Route::post('/logout', [LogOutController::class, "logout"])->name("logout");
Route::post('/create-recipe', [RecipeController::class, "store" ])->name('create-recipe');

//contact routes
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact');

//report problem routes
Route::get('/report-problem', [ReportController::class, 'index'])->name('report.index');
Route::post('/report-problem', [ReportController::class, 'store'])->name('report.store');
