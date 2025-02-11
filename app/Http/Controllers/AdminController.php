<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
