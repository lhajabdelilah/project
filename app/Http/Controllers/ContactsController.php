<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
     public function show(){
        return view('Location.now');
     }


     public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Création d'un nouvel objet Contact avec les données validées
        $contact = new contacts();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];

        // Enregistrement dans la base de données
        $contact->save();

        // Redirection vers une autre page ou affichage d'un message de succès
        return view('thankyou');
    }
}
