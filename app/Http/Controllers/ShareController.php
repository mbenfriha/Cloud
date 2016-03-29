<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;



class ShareController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function share($path) {



        $dir_nom = 'uploads/' . $path; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')

        $path = explode('/', $dir_nom);
        $name = array_pop($path);
        $path = implode('/', $path);


        $folder = DB::table('folders')->where('name', 'like', $name)->where('path', 'like', $path . '/')->first();
        if($folder->limite != 3)
            return view('errors.access');



        $dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
        $fichier = array(); // on déclare le tableau contenant le nom des fichiers
        $dossier = array(); // on déclare le tableau contenant le nom des dossiers

        while ($element = readdir($dir)) {
            if ($element != '.' && $element != '..') {
                if (!is_dir($dir_nom . '/' . $element)) {
                    $fichier[] = $element;
                } else {
                    $dossier[] = $element;
                }
            }
        }

        closedir($dir);

        if (!empty($dossier)) {
            sort($dossier);

        }

        if (!empty($fichier)) {
            sort($fichier);

        }


        return view('public.files', compact('dossier', 'fichier', 'dir_nom', 'path'));



    }

}