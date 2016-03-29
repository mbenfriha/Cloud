<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
@if (!Auth::guest())
<nav>
    <div class="toggleNav">
        <div class="toggleNavButton"></div>
    </div>

    <div id="subnav">
        <ul>
            <li> <a href="{{ url('/home') }}">accueil</a> </li>
            <li> <a href="{{ url('/cloud') }}">Mes Fichier</a> </li>
            <li> <a href="{{ url('/account') }}">Mon compte</a> </li>
            <li> <a href="{{ url('/logout') }}">Déconnexion</a> </li>
            @if (Auth::user()->rank == 2)
            <li> <a href="{{ url('/admin') }}">Admin</a> </li>
                @else
                <li> <a href="{{ url('/contact') }}">contact</a> </li>

            @endif
        </ul>
    </div>
</nav>
@endif

@yield('content')

        <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script src="{{ asset('/js/dropzone.js') }}"></script>
<script>
    var token = "{{ Session::getToken() }}";
</script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
