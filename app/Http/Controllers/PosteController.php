<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\poste;


class PosteController extends Controller
{
  public function formulaire ()
{
    return view('/dashboard');
}

public function traitement ()
{
    request()-> validate([

        'nomposte' => ['required'],
    ]);

    $poste = new Poste();
    $poste->nomposte = request ('nomposte');
    $poste->save();

        return redirect ('/dashboard');
}

public function liste()
  {

     $donne_postes = \App\Models\Poste::all();

      return view('/dashboard', [
          'donne_postes' =>$donne_postes,

      ]);
  }

public function supprimerposte ($id)
  {
    \App\Models\Poste::destroy($id);
      return redirect ('/dashboard');
  }

}
