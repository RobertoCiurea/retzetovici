<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateName($userId, Request $request):RedirectResponse{
        $request->validate(["name"=>"required"]);
        $name = $request->input('name');

        $user = User::where("id", (int)$userId);
        $user->update(['name'=>$name]);
        return redirect()->back();
    }
    public function updateEmail($userId, Request $request):RedirectResponse{
        $request->validate(["email"=>"required"]);
        $email = $request->input('email');

        $user = User::where("id", (int)$userId);
        $user->update(['email'=>$email]);
        return redirect()->back();
    }
    public function delete($userId):RedirectResponse{
        $user = User::where("id", (int)$userId);
        $user->delete();
        return redirect('/login');
    }
}
