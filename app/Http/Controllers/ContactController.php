<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    public function index(){
        return view('contact-page');
    }

    public function store(Request $request):RedirectResponse{
        $incomingFields = $request->validate([
            'name'=>['required','min:3', 'max:255', 'string'],
            'email'=>['required', 'max:255', 'email'],
            'message'=>['required', 'string'],
        ],[
            'name.required'=>"Camp incomplet!",
            'name.min'=>"Numele trebuie sa aiba minin 3 caractere!",
            'name.max'=>"Numele este prea lung!",
            'name.string'=>"Continutul campului este invalid!",
            'email.required'=>"Camp incomplet!",
            'email.max'=>"Adresa de email este mult prea lunga!",
            'email.email'=>"Adresa de email nu este valida!",
            'message.required'=>"Camp incomplet!",
            'message.string'=>"Continutul campului este invalid!",
        ]);
        Contact::create([
            "name"=>$incomingFields['name'],
            "email"=>$incomingFields['email'],
            "message"=>$incomingFields['message'],
        ]);
        return redirect()->back()->with(['success'=>'Mesajul tău a fost trimis! Îți vom răspunde cât mai curând.']);
    }

    public function delete($contactId): RedirectResponse{
        $contact = Contact::findOrFail($contactId);
        $contact->delete();
        return redirect()->back()->with(["deleted"=>"Mesaj sters cu success!"]);
    }
}
