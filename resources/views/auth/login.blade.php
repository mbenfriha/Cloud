@extends('layouts.home')

@section('content')


    <h1 class="title-home">CLOUD <i class="white-text fa fa-cloud"></i> </h1>

    <div id="login">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="col s12" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="header-login">
                <h2 class="title-home">CONNEXION</h2>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="username" name="username" type="text" class="validate {{ $errors->has('username') ? 'invalid' : '' }}">
                    <label for="username">Email</label>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}">
                        <label for="password">Mot de passe</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i>Login
                    </button>
                </div>
                <div class="row">

                    <a href="{{ url('/password/reset') }}">Mot de passe oublié ?</a>
                    /
                    <a href="/register">Pas de compte ?</a>
                </div>

            </div>
        </form>
    </div>
@endsection
