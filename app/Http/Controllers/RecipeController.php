<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\SavedRecipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

use function PHPUnit\Framework\isNull;

class RecipeController extends Controller
{

    public function store(Request $request):RedirectResponse{
        $incomingFields = $request->validate([
            'title'=>'required|string|max:35',
            'description'=>'required|string',
            'category'=>'required',
            'ingredients'=>'required|array',
            'ingredients.*'=>'required|string|max:255',
            'steps'=>'required|array',
            'steps.*'=>'required|string',
            'duration'=>'required|integer',
            'difficulty'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags'=>'nullable|array',
            'tags.*'=>'string|max:255' 
        ]);

        //Format image
        $image= Image::Read($incomingFields['image']);
        $imageName = time().'.'.$incomingFields['image']->getClientOriginalExtension();

        $resizedImage = $image->resize(800, 400, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize(); 
        });
        $path ='/images/recipes/'.$imageName;
        //Convert image to string
        $imageData = (string) $resizedImage->encode();
        Storage::disk('public')->put($path, $imageData);
        $imageUrl = Storage::url($path);


        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

       
       Recipe::create([
            'title'=>$incomingFields['title'],
            'description'=>$incomingFields['description'],
            'category'=>$incomingFields['category'],
            'ingredients'=>$incomingFields['ingredients'],
            'steps'=>$incomingFields['steps'],
            'duration'=>$incomingFields['duration'],
            'difficulty'=>$incomingFields['difficulty'],
            'image'=>$imageUrl,
            'tags'=>$incomingFields['tags'] ?? [],
            "username"=>Auth::user()->name,
            "user_id"=>Auth::id(),
        ]);
        
        $user->increment('recipes_counter', 1);

        return redirect()->back()->with("success", "Rețeta a fost salvată cu succes!");
    }

    public function index($id){
        $recipe = Recipe::findOrFail($id);
        $recipe->increment('views', 1);
        $user = Auth::user();
        $comments = $recipe->comments()->latest()->get();
    
        // check if user is authenticated and if he already liked the recipe
        $isLiked = $user ? $recipe->likes()->where('user_id', $user->id)->exists() : false;
        $isSaved = $user ? $recipe->saves()->where('user_id', $user->id)->exists() : false;
    
        return view('recipes.recipe-page', compact('recipe', 'isLiked', 'isSaved', 'comments'));
    }

    public function like($recipeId){
        if(!Auth::check()){
            return redirect()->back()->with(['error'=>"Eroare! Nu esti autentificat"]);
        }
        
        $user = Auth::user();
        $userFetchedFromDb = User::findorFail($user->id);
        $recipe = Recipe::find($recipeId);
        //check if user is authenticated
        //check if the suer already liked the recipe;
        $existingLike = Like::where('user_id', $user->id)->where('recipe_id', $recipeId)->first();
        if($existingLike){
            $existingLike->delete();
            $recipe->decrement('likes', 1);
            $userFetchedFromDb->decrement('likes', 1);
            
            return redirect()->back()->with(['success'=>"Rețeta nu mai este apreciată"]);
        }
        Like::create([
            'user_id'=>$user->id,
            'recipe_id'=>$recipeId,
        ]);
        $recipe->increment('likes', 1);
        $userFetchedFromDb->increment('likes', 1);
        return redirect()->back()->with(['success'=>"Rețetă apreciată"]);
    }

    public function save($recipeId){
        if(!Auth::check()){
            return redirect()->back()->with(['error'=>"Eroare! Nu esti autentificat"]);
        }
        $user = Auth::user();
        $userFetchedFromDb = User::findOrFail($user->id);
        $savedRecipe = SavedRecipe::where('user_id', $user->id)->where('recipe_id', $recipeId)->first();

        if($savedRecipe){
            $savedRecipe->delete();
            $userFetchedFromDb->decrement('saved_recipes', 1);
            return redirect()->back()->with(['success'=>"Rețeta nu mai este salvată"]);
        }
        SavedRecipe::create([
            'user_id'=>$user->id,
            'recipe_id'=>$recipeId,
        ]);
        $userFetchedFromDb->increment('saved_recipes', 1);
        return redirect()->back()->with(['success'=>"Rețeta a fost salvată"]);
    }

    public function delete($recipeId, Request $request){
        $userId = $request->input('userId');
        $user = User::findOrFail($userId);
        $recipe = Recipe::findOrFail($recipeId);
        if(!$user || !$recipe)
            return redirect()->back()->withErrors("Oops... Ceva nu a mers bine!");
        $recipe->delete();
        $user->decrement('recipes_counter', 1);
        return redirect('/recipes')->with(['success'=>'Rețeta a fost ștearsă cu success']);
    }

}
