<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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

        $resizedImage = $image->resize(400, 260, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize(); 
        });
        $path ='/images/recipes/'.$imageName;
        //Convert image to string
        $imageData = (string) $resizedImage->encode();
        Storage::disk('public')->put($path, $imageData);
        $imageUrl = Storage::url($path);


        $userId = Auth::user()->id;
        $user = User::find($userId);

       
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
}
