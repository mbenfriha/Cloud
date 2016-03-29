@extends('layouts.app')

@section('content')





    <div class="row">
        <div>
            <div class="zone_drop col s8 offset-s2">
                <div class="dropzone" id="dropzoneFileUpload"></div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col s8 offset-s2">
            <div class="row">

                <i id="createFolder" class="fa fa-folder">Créer un dossier</i>

                <div class="path right">Dossier actuel : /{{$path}} </div>
            </div>

            <div class="action">
                <div class="row">

                    <form class="action-button" id="delete" method="post">
                        {!! csrf_field() !!}
                        <input id="input-delete" type="hidden" name="delete"  value="{{$dir_nom }}">
                        <button class="btn nav-color" id="submitDelete" type="submit" >
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>


                    <button class="btn nav-color action-button"  id="edit-btn">
                        <i class="fa fa-pencil"></i>
                    </button>


                    <form class="action-button" id="download" method="post">
                        {!! csrf_field() !!}
                        <input id="input-download" type="hidden" name="download"  value="{{$dir_nom }}">
                        <button class="btn nav-color" id="submitDownload" type="submit" >
                            <i class="fa fa-download"></i>
                        </button>
                    </form>

                    <form class="action-button" id="move" method="post">
                        {!! csrf_field() !!}
                        <input id="input-move" type="hidden" name="move"  value="{{$dir_nom }}">
                        <button class="btn nav-color" id="submitMove" type="submit" >
                            <i class="fa fa-arrows"></i>
                        </button>
                    </form>


                    <button class="btn nav-color action-button" id="view" >
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            <table class="bordered responsive-table">
                <thead>
                <tr >
                    <th data-field="name">Nom</th>
                    <th data-field="size">Taille</th>
                    <th data-field="type">Type</th>
                </tr>
                </thead>
                <tbody>

                <tr class="addFolder">
                    <td>
                        <form id="formFolder" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="path"  value="{{$dir_nom }}">



                            <div class="input-field">
                                <input id="folder" name="folder" type="text" class="validate {{ $errors->has('folder') ? 'invalid' : '' }}">
                                <label for="folder">Nom du dossier</label>
                            </div>
                            <button id="submitFolder" type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i>créer
                            </button>
                        </form>

                    </td>
                    <td></td>
                    <td></td>

                </tr>
                @foreach($dossier as $document)

                    <tr class="line line-folder">
                        <td>
                            <i class="fa fa-folder"></i>  <a class="folder-name" href="{{ url('/cloud/'. $path  ). '/' . $document .'/'  }}">{{$document}}</a>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>


                @endforeach

                @foreach($fichier as $f)

                    <tr class="line line-files">
                        <td class="file-name">{{$f}}</td>
                        <td>{{ round(File::size($dir_nom . '/' . $f) / pow(2, 20), 1) }} mo</td>
                        <td>{{ File::extension($f) }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection
