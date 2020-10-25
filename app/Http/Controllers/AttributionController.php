<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribution;

class AttributionController extends Controller
{
  public function formulaire ()
{
  return view('/dashboard');
}

public function traitement ()
{
  request()-> validate([

      'nom' => ['required'],
      /*'poste' =>['required'],*/

  ]);

  $donne = new \App\Models\Attribution;
  $donne->nom = request ('nom');
  /*$donne->poste = request ('poste');*/
  $donne->save();

      return redirect ('/dashboard');
}

public function liste()
  {

    $donne_postes = \App\Models\Poste::all();
    $donne_clients= \App\Models\client::all();
    $donne_attributions= \App\Models\Attribution::all();

      return view('/dashboard', [
          'donne_postes' =>$donne_postes,
          'donne_clients' =>$donne_clients,
          'donne_attributions'=>$donne_attributions,
        ]);
      }


}
