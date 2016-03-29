@extends('layouts.app')

@section('content')



    <div class="row">

        <div class="zone_drop col s8 offset-s2">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <h3>Envoyer un message</h3>

            <div class="input-field col s12">
            <form action="{{ url('/contact') }}" method="post">
                {!! csrf_field() !!}
                <textarea class="materialize-textarea" id="message" name="message"></textarea>

                <label for="message">votre message</label>
                <button class="btn" type="submit">Envoyer</button>
            </form>
                <div>

        </div>
    </div>

@endsection