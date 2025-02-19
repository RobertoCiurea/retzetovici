<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    public function index(){
        return view("admin");
    }

    public function userDetails($userId){
        $user = User::findOrFail($userId);
        if($user){
            return view("user-details", compact("user"));
        }
        return redirect("/error?status=404");
    }
    
    public function searchRecipe(Request $request){
        $incomingFields = $request->validate(['recipeId'=>'required'], ['recipeId'=>"ID rețetă necesar!"]);
        $recipe = Recipe::findOrFail($incomingFields['recipeId']);
        if($recipe){
            return app()->call([RecipeController::class, 'index'], ['id'=>$recipe->id]);
        }
    }
}
