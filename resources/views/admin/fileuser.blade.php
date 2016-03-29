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

                <h3>Les fichier de {{$name}}</h3>

                <table class="bordered responsive-table">
                    <thead>
                    <tr >
                        <th data-field="name">nom</th>
                        <th data-field="size">taille</th>
                        <th data-field="type">type</th>
                        <th data-field="date">date</th>
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


                <div class="pagination"><?php echo $files->links(); ?>

                </div>
            </div>
        </div>



        <div class="row">



            <script>


            </script>

@endsection
