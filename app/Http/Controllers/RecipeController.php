<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function store(Request $request):RedirectResponse{
        $incomingFields = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'category'=>'required',
            'ingredients'=>'required|array',
            'ingredients.*'=>'required|string|max:255',
            'steps'=>'required|array',
            'steps.*'=>'required|string|max:255',
            'duration'=>'required|integer',
            'difficulty'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags'=>'nullable|array',
            'tags.*'=>'string|max:255' 
        ]);
        
        $path = $request->file('image')->store('images', 'public');
        Recipe::create([
            'title'=>$incomingFields['title'],
            'description'=>$incomingFields['description'],
            'category'=>$incomingFields['category'],
            'ingredients'=>$incomingFields['ingredients'],
            'steps'=>$incomingFields['steps'],
            'duration'=>$incomingFields['duration'],
            'difficulty'=>$incomingFields['difficulty'],
            'image'=>$path,
            'tags'=>$incomingFields['tags'] ?? [],
            "user_id"=>Auth::id(),
        ]);

        return redirect()->back()->with("success", "Rețeta a fost salvată cu succes!");
    }
}
