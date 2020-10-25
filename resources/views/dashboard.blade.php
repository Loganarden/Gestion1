<?php

$horaires =  array('8h','9h','10h','11h','12h','13h','14h','15h','16h','17h');

 ?>
@extends ('layout')

    @section('css')

    <link href="{{asset ('css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset ('css/poste.css')}}" rel="stylesheet" />

    @endsection

    @section('contenu')

              <div class="div1">

                <div class="select">

                  <label for="start"></label>

                  <input class="date" type="date" id="start" name="trip-start">

                </div>

                <div class="ajaouterposte">

                  <!-- modal ajouter poste-->

                  <p id="promptCompat">Votre navigateur ne pend pas en charge les balises <code><dialog></code></p>

                  <dialog id="mydialogposte" close>

                    <div ><button class="boutonsfermer" onclick="$dialog.close()">X</button><!--&nbsp;--></div>

                    <fieldset>

                        <legend> Ajouter un poste </legend>

                        <form action="/dashboardpostes" method="post">
                              {{ csrf_field() }}

                              <p> <input type="nom" name="nomposte" placeholder="Nom" ></p>

                              @if($errors->has('nomposte'))
                              <p>{{$errors->first ('nomposte') }}</p>
                              @endif

                              <p><input class="sb" type="submit" value="Ajouter"></p>

                          </form>

                      </fieldset>

                  </dialog>

                  <div class="bouton"><button class="boutonsposte" onclick="$dialog.showModal()">Ajouter un Poste</button></div>

                  <!--fin modal ajouter poste-->
                  <!--modal ajouter client-->

                  <p id="promptCompat">Votre navigateur ne pend pas en charge les balises <code><dialog></code></p>

                  <dialog id="mydialogclient" close>


                    <div ><button class="boutonsfermer" onclick="$dialogclient.close()">X</button><!--&nbsp;--></div>

                    <fieldset>

                      <legend> Ajouter un client </legend>

                      <form action="/dashboard" method="post">
                        {{ csrf_field() }}

                        <p> <input  type="nom" name="nomclient" placeholder="Nom" ></p>

                        @if($errors->has('nomclient'))
                        <p>{{$errors->first ('nomclient') }}</p>
                        @endif

                        <p> <input  type="nom" name="prenomclient" placeholder="prenom" ></p>

                        @if($errors->has('prenomclient'))
                        <p>{{$errors->first ('prenomclient') }}</p>
                        @endif

                        <p><input class="sb" type="submit" value="Ajouter"></p>

                      </form>

                    </fieldset>

                  </dialog>

                  <div class="bouton"><button class="boutonsposte" onclick="$dialogclient.showModal()">Ajouté un client</button></div>

                  <!--fin modal ajouter client-->
                </div>

              </div>

              <div class="donne">

                @foreach($donne_postes as $donne_poste)
                <li>

                  <div class="card">

                        <div class="container">

                              <table>
                                <td>
                                  <tr>
                                    {{ $donne_poste->nomposte}}

                                    {{Form::model($donne_poste,['url'=>URL::action('PosteController@supprimerposte',$donne_poste),'method'=>'DELETE'])}}
                                    {{Form::submit('X', ['class'=>'button-s'])}} {{Form::close()}}
                                  </tr>
                              </table>

                              <table>
                                </td>
                                    <tr>
                                      @foreach($horaires as $horaire)
                                        {{$horaire}}

                                        <div class="boutona"><button class="boutonsattribution" onclick="$dialogattribbution.showModal()">+</button></div>
                                    </tr>
                                    <tr>
                                      @foreach ($donne_attributions as $donne_attribution)

                                      {{$donne_attribution->nom}}

                                    </tr>
                                      <!--<div class="boutona"><button class="boutonsattribution" onclick="$dialogattribbution.showModal()">+</button></div>-->
                                      @endforeach
                                   @endforeach
                                </table>
                              </li>
                            </div>
                          </div>
                        </li>
                @endforeach

              </div>

                    <!--debut modal attribution-->

                    <p id="promptCompat">Votre navigateur ne pend pas en charge les balises <code><dialog></code></p>

                    <dialog class="dialog" id="mydialogattribution" close>


                      <div ><button class="boutonsfermer" onclick="$dialogattribbution.close()">X</button><!--&nbsp;--></div>

                      <fieldset>

                        <legend> Ajouter une attribution </legend>

                        <form action="/dashboardatrribution" method="post">
                          {{ csrf_field() }}

                          <input  list="nom" type"nom" name="nom" placeholder="Nom">

                                <datalist id=nom>

                                <option>
                                      @foreach($donne_clients as $donne_client)

                                     <option>

                                        {{$donne_client->prenomclient}} {{$donne_client->nomclient}}

                                      </option>

                                       @endforeach
                                    </option>

                                  </datalist>

                                  @if($errors->has('nomclient'))
                                  <p>{{$errors->first ('nomclient') }}</p>
                                  @endif

                          <p><input class="sb" type="submit" value="Ajouter"></p>

                        </form>

                      </fieldset>

                    </dialog>

                    <!--fin modal attribution-->



<script src="js\poste.js"></script>
<script src="js\client.js"></script>
<script src="js\attribution.js"></script>

    @endsection
