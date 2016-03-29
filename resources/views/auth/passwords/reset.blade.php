
@extends('layouts.home')

@section('content')


    <h1 class="title-home">CLOUD <i class="white-text fa fa-cloud"></i> </h1>

    <div id="login">
        <form class="col s12" role="form" method="POST" action="{{ url('/password/reset') }}">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">


            <div class="header-login">
                <h2 class="title-home">RÉCUPÉRER MOT DE PASSE</h2>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="password" type="email" class="validate" value="{{ $email or old('email') }}">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Mot de passe</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password_confirmation" type="password" class="validate">
                        <label for="password">Confirmer mot de passe</label>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="row">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-refresh"></i>Réinitialiser mot de passe
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

