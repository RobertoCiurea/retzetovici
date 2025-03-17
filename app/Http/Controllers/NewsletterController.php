<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    public function store(Request $request):RedirectResponse{
        $incomingFields = $request->validate(
            [
                'email'=>['required', 'email']
            ],
            [
            'email'=>'Email-ul tău este neccesar!',
            ],
    );
        Newsletter::create([
            'email'=>$incomingFields['email']
        ],
    
);

        return redirect()->back()->with(['newsletter_success'=>"Email-ul tău este conectat cu success la newsletter!"]);
    }
}
