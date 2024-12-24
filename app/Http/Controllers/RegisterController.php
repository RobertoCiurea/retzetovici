<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function create():View{
        return view('auth.register');
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            'name'=>['required', 'string', 'max:255', Rule::unique('users','name')],
            'email'=>['required','string','lowercase','email', 'max:255', Rule::unique('users','email')],
            'password'=>['required','confirmed', Rules\Password::defaults()],
            'g-recaptcha-response'=>'required|captcha',
        ]);
        $user =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
            Auth::login($user);
            return redirect('/my-account?content=account-details');
    }
}
