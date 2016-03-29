@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="zone_drop col s8 offset-s2">
            <div class="welcome">
                Administration
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div>
            <div class="col s8 offset-s2">

                    <h3>Les utilisateurs</h3>

                    <table class="bordered responsive-table">
                        <thead>
                        <tr >
                            <th data-field="username">pseudo</th>
                            <th data-field="role">role</th>
                            <th data-field="email">email</th>
                            <th data-field="date">date d'inscription</th>
                            <th data-field=""></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->username}}</td>
                                <td>
                                    @if ($user->rank == 2)
                                        Administrateur
                                        @else
                                            Utilisateurs
                                        @endif
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    @if ($user->active == 0)
                                        <form action="{{ url('/lock') }}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="lock" value="1">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn" type="submit">Débloquer le compte</button>
                                        </form>

                                        @else
                                        <form action="{{ url('/lock') }}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="lock" value="0">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn nav-color" type="submit">Bloquer le compte</button>
                                        </form>
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                <div class="pagination"><?php echo $users->links(); ?>

                </div>
        </div>
    </div>



    <div class="row">



        <script>


        </script>

@endsection
