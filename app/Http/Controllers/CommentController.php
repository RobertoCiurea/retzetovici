<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($recipeId, Request $request){
        if(!Auth::check()){
            return redirect()->back()->with(['error'=>"Trebuie sa fii autentificat pentru a adauga un comentariu"]);
        }
        $recipe = Recipe::findOrFail($recipeId);
        $incomingFields = $request->validate([
            'userId'=>'required',
            'username'=>'required',
            'message'=>['required', 'min:5' ,'max:1024']
        ]);

        Comment::create([
            'user_id'=>$incomingFields['userId'],
            'username'=>$incomingFields['username'],
            'message'=>$incomingFields['message'],
            'recipe_id'=>$recipeId,
        ]);
        $recipe->increment('comments_counter', 1);
        return redirect()->back()->with(['comment_success'=>'Comentariu adăugat cu success!']);
    }

    public function delete($commentId){
            $comment = Comment::findOrFail($commentId);
            $recipe = Recipe::findOrFail($comment->recipe_id);
            $recipe->decrement('comments_counter', 1);
            $comment->delete();
            return redirect()->back()->with(['delete-comment-success'=>"Comentariu șters cu success"]);
            

    }
}
