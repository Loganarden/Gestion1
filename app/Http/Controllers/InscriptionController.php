<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
  public function formulaire ()
  {
      return view('inscription');
  }

  public function traitement ()
  {
      request()-> validate([

          'name' => ['required'],
          'firstname' => ['required'],
          'email' => ['required','email'],
          'password' => ['required','confirmed','min:5'],
          'password_confirmation' => ['required'],
      ], [
          'password.min' => 'Pour des raison de sécurité, votre mot de passe doit contenir au moin :min caratères'
      ]);

      $utilisateur = new \App\Models\User;
      $utilisateur->name = request ('name');
      $utilisateur->firstname = request ('firstname');
      $utilisateur->email = request ('email');
      $utilisateur->password = bcrypt (request ('password'));
      $utilisateur->save();

      $resultat_inscription = auth () ->attempt([
          'email' => request('email'),
          'password' => request('password'),
          'password_confirmation' =>request('password_confirmation'),
          'email' => request('email'),
      ]);

      if ($resultat_inscription)
      {
          return redirect ('/dashboard');
      }

  }
}
