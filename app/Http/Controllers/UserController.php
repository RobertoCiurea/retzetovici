<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

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

