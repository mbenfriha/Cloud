@extends('layouts.home')

@section('content')

    <h1 class="title-home">CLOUD <i class="white-text fa fa-cloud"></i> </h1>

    <div id="register">
        <form class="col s12" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <div class="header-login">
                <h2 class="title-home">INSCRIPTION</h2>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate {{ $errors->has('email') ? 'invalid' : '' }}">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="row">
                <div class="input-field col s12">
                    <input id="username" name="username" type="text" class="validate {{ $errors->has('username') ? 'invalid' : '' }}">
                    <label for="username">Pseudo</label>
                    @if ($errors->has('username'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" name="password" type="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}">
                        <label for="password">Mot de passe</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}">
                        <label for="password_confirmation">Confirmer mot de passe</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="name" name="name" type="text" class="validate {{ $errors->has('name') ? 'invalid' : '' }}">
                            <label for="name">Nom</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="lastname" name="lastname" type="text" class="validate {{ $errors->has('lastname') ? 'invalid' : '' }}">
                            <label for="lastname">Prénom</label>
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <label for="birthday">Date de naissance</label>

                            <input id="birthday" name="birthday" type="date" class="datepicker">
                        </div>
                    </div>


                <div class="row">

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Register
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
