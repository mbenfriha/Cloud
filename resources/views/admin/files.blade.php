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

                <h3>Les fichiers</h3>

                <div class="search right">
                    <form action="{{ url('/files') }}" method="post">
                        {!! csrf_field() !!}
                        <input type="text" name="search">

                        <button class="btn" type="submit">Rechercher</button>
                    </form>
                </div>

                <table class="bordered responsive-table">
                    <thead>
                    <tr >
                        <th data-field="name">nom</th>
                        <th data-field="size">taille</th>
                        <th data-field="type">type</th>
                        <th data-field="date">date</th>
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
                            <td>
                                @if ($file->type == "mp3")

                                    <audio controls="controls">
                                        <source src="{{$file->path . $file->name}}" type="audio/mp3" />
                                        Votre navigateur n'est pas compatible
                                    </audio>

                                    @elseif ( $file->type == "jpg" || $file->type == "png" )
                                    <img class="materialboxed" width="250" src="{{$file->path . $file->name}}">
                                    @elseif ($file->type == "mp4")
                                    <video width="720" height="405" controls>
                                        <source src="{{$file->path . $file->name}}" type="video/mp4">

                                        Your browser does not support the video tag or the file format of this video. <a href="http://www.supportduweb.com/">http://www.supportduweb.com/</a>
                                    </video>
                            @endif
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
