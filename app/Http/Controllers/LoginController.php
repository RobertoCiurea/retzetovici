<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create():View{
        return view('auth.login');
    }
    public function login(Request $request):RedirectResponse{
        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        $credentials = $request->only('name','password');
        if(Auth::attempt($credentials)){
            return redirect('/my-account');

        }else return redirect('/login')->withErrors(['login_error'=>'Nume sau parola gresita. Incearca din nou!', 'custom']);
    }
 
}