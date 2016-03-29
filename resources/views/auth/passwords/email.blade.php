


@extends('layouts.home')

@section('content')


    <h1 class="title-home">CLOUD <i class="white-text fa fa-cloud"></i> </h1>

    <div id="login">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="col s12" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}



            <div class="header-login">
                <h3 class="title-home">RÉCUPÉRATION</h3>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i>Envoyer
                    </button>
                </div>


            </div>
        </form>
    </div>
@endsection
