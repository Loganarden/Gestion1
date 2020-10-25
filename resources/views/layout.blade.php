<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion</title>

    @yield('css')

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/bardemenu.css') }}" rel="stylesheet" >

  </head>
  <body>


        <!--    <div class="nav">

                <ul>

                        @if(auth()->check())

                        <li style="float:right"><a style="background-color: rgba(196, 4, 4, 0.555);" href="/deconnexion" >Déconnexion</a></li>

                        @else

                            <li style="float:right"><a  href="/connexion">Conexion</a></li>

                        @endif

                </ul>

            </div>-->

        <div class="flex-center position-ref full-height">

            <div class="content">

                @yield('contenu')

            </div>
        </div>

  </body>
</html>
