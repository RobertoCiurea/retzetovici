<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $content = $request->get('content');
        $userId = Auth::user()->id; 
        $user = User::findOrFail($userId);
        $recipes = $user->recipes()->get();
        $savedRecipes= $user->savedRecipes()->get();
        return view('my-account', compact("content", "user" ,"recipes", "savedRecipes"));
    }

    public function update($userId, Request $request): RedirectResponse
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back()->withErrors(['user_not_found' => 'Utilizatorul nu a fost găsit.']);
        }

        $request->validate([
            'name' => 'nullable|string|unique:users,name,' . $user->id,
            'email' => 'nullable|email|unique:users,email,' . $user->id,
        ], [
            'name' => 'Numele de utilizator este deja utilizat. Vă rugăm să alegeți altul.',
            'email' => 'Acest email este deja înregistrat. Vă rugăm să încercați altul.',
        ]);

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }

        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        $user->save();
        Recipe::where("user_id", '=', $userId)->update(['username'=>$request->input('name')]);
        return redirect()->back()->with('success', 'Informațiile au fost actualizate cu succes!');
    }

  
    public function delete($userId): RedirectResponse
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back()->withErrors(['user_not_found' => 'Utilizatorul nu a fost găsit.']);
        }

        $user->delete();

        return redirect('/login')->with('success', 'Contul a fost șters cu succes.');
    }
}

