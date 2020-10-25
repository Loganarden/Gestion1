<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
  public function formulaire ()
    {
        return view('/dashboard');
    }

    public function traitement ()
    {
        request()-> validate([

            'nomclient' => ['required'],
            'prenomclient' => ['required'],
        ]);

        $client = new \App\Models\Client;
        $client->nomclient = request ('nomclient');
        $client->prenomclient = request ('prenomclient');
        $client->save();

            return redirect ('/dashboard');
    }

    public function liste()
      {
          $donne_clients = \App\Models\Client::all();

          return view('/dashboard', [
              'donne_clients' =>$donne_clients,

          ]);
      }
}
