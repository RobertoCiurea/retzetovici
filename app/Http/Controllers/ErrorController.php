<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ErrorController extends Controller
{

    public function index(Request $request){
        $status = $request->get('status');
        return view('error', ['status'=>$status]);
    }

    public function redirectBack(Request $request):RedirectResponse{
        $previousUrl = $request->session()->get('previousUrl');
        return redirect($previousUrl);
    }
}
