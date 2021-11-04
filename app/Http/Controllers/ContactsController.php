<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function kontakt(Request $request)
    {
        $this->validate($request,[ 
            'email' => 'required',
            'naslovporuke' => 'required', 
            'poruka' => 'required' 
            ]);  
            $contact= new Contact;
            $contact->email=$request->input('email');
            $contact->naslovporuke=$request->input('naslovporuke');
            $contact->poruka=$request->input('poruka');
            $contact->save();
            return redirect('/kontakt')->with('uspesno','Vaša poruka je uspešno poslata!');
    }
}
