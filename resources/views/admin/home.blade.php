@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="zone_drop col s8 offset-s2">
            <div class="welcome">
                Administration
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <div class="col s8 offset-s2">

                <div class="col s6">
                <h3>Les 10 derniers inscrit</h3>

                    <table class="bordered responsive-table">
                        <thead>
                        <tr >
                            <th data-field="username">pseudo</th>
                            <th data-field="email">email</th>
                            <th data-field="date">date d'inscription</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col s6">

                    <h3>Les 10 derniers fichiers</h3>

                    <table class="bordered responsive-table">
                        <thead>
                        <tr >
                            <th data-field="name">nom du fichier</th>
                            <th data-field="size">taille</th>
                            <th data-field="type">type du fichier</th>
                            <th data-field="type">date</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($files as $file)
                            <tr>
                                <td>{{$file->name}}</td>
                                <td>{{$file->size}}</td>
                                <td>{{$file->type}}</td>
                                <td>{{$file->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>



    <div class="row">



        <script>


        </script>

@endsection
