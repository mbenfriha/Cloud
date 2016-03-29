<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Upload;
use App\Folder;
use App\User;
use App\Jobs\SendMailAdmin;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAjaxDashboard() {
        $total = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->sum('size');

        $other = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->whereNotIn('type', ['jpg', 'mp4', 'mp3', 'png'])->sum('size');
        $mp3 = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->where('type', 'like', 'mp3')->sum('size');
        $video = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->where('type', 'like', 'mp4')->sum('size');
        $image = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->where(function ($query) {
            $query->orWhere('type', 'like', 'jpg')
                ->orWhere('type', 'like', 'png');
        })->sum('size');

        $mp3 = round($mp3, 1) * 100 / 50;
        $video = round($video, 1) * 100 / 50;
        $image = round($image, 1) * 100 / 50;
        $other = round($other, 1);

        $total = round($total, 1);

        $rest = 50 - $total;

        return response([
            'mp3' => $mp3,
            'video' => $video,
            'image' => $image,
            'other' => $other,
            'rest' => $rest,
            'total' => $total,

        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->sum('size');

        $other = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->whereNotIn('type', ['jpg', 'mp4', 'mp3', 'png'])->sum('size');
        $mp3 = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->where('type', 'like', 'mp3')->sum('size');
        $video = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->where('type', 'like', 'mp4')->sum('size');
        $image = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->where(function ($query) {
            $query->orWhere('type', 'like', 'jpg')
                ->orWhere('type', 'like', 'png');
        })->sum('size');

        $mp3 = round($mp3, 1) * 100 / 50;
        $video = round($video, 1) * 100 / 50;
        $image = round($image, 1) * 100 / 50;
        $other = round($other, 1);

        $total = round($total, 1);

        $rest = 50 - $total;


        return view('home', compact('total', 'rest', 'mp3', 'image', 'video', 'other'));
    }

    public function upload() {
        $total = DB::table('uploads')->where('user_id', '=', Auth::user()->id)->sum('size');

        $destinationPath = $_POST['path'];// upload path

        if($total + Upload::octetToMo(Input::file('file')->getSize()) > 50){
            return "ko";
        }

        if (file_exists($destinationPath . strtolower(Input::file('file')->getClientOriginalName())))
        {
           return ('ko');
        }


        $input = Input::all();



        $rules = array(
            'file' => 'max:50000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }
        if (!($_POST['path']))
            $_POST['path'] = 'uploads/' . Auth::user()->username .'/';


        var_dump($destinationPath);



        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = strtolower(Input::file('file')->getClientOriginalName()); //getting origin name
        $size = Upload::octetToMo(Input::file('file')->getSize()); // getting size to mo
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path


        if ($upload_success) {

            Upload::create([
                'user_id' => Auth::user()->id,
                'name'    => $fileName,
                'type'    => $extension,
                'path'    => $destinationPath,
                'size'    => $size,
                'access'  => 1

            ]);

            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function files($path = '') {

        !empty($path) ? $path = $path.'/' : $path = '';

        $dir_nom = 'uploads/'. Auth::user()->username . '/' . $path; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
        $dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
        $fichier= array(); // on déclare le tableau contenant le nom des fichiers
        $dossier= array(); // on déclare le tableau contenant le nom des dossiers

        while($element = readdir($dir)) {
            if($element != '.' && $element != '..') {
                if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
                else {$dossier[] = $element;}
            }
        }

        closedir($dir);

        if(!empty($dossier)) {
            sort($dossier);

        }

        if(!empty($fichier)) {
            sort($fichier);

        }


        return view('home.files', compact('dossier', 'fichier', 'dir_nom', 'path'));

    }

    public function share($path) {



        $dir_nom = 'uploads/' . $path; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')

        $path = explode('/', $dir_nom);
        $name = array_pop($path);
        $path = implode('/', $path);


        $folder = DB::table('folders')->where('name', 'like', $name)->where('path', 'like', $path . '/')->first();
        if($folder->limite == 1)
            return view('errors.access');

        else if(!DB::table('shares')->where('user_id', '=', Auth::user()->id)->where('folder_id', 'like', $folder->id)->first() && $folder->limite != 3)
        {
            return view('errors.access');
        }


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

    public function createFolder()
    {

        var_dump(Input::get('path') . Input::get('folder'));

        if(mkdir(Input::get('path') . Input::get('folder'))) {

                Folder::create([
                    'user_id' => Auth::user()->id,
                    'name'    => Input::get('folder'),
                    'path'    => Input::get('path'),
                    'limite'  => 1
                ]);

            return Input::get('folder');
        }
        else
            return Response::json('error', 400);

    }

    public static function deleteDir($dirPath) {

        if (! is_dir($dirPath)) {
            $link = explode('/', $dirPath);
            $name = $link[count($link)-1];
            DB::table('uploads')->where('name', 'like', $name)->delete();
            unlink ($dirPath);

        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                $link = explode('/', $file);
                $link2 = explode('/', $file);
                array_pop($link2);
                $link2 = implode('/', $link2);
                $name = $link[count($link)-1];
                var_dump($link2);
                DB::table('uploads')->where('name', 'like', $name)->where('path', 'like', $link2 .'/')->delete();
                unlink($file);
            }
        }
        $dir = explode('/', $dirPath);

        DB::table('folders')->where('name', 'like', $dir[count($dir)-2])->where('path', 'like',  $dir[0] . '/' . $dir[1] . '/' )->delete();
        rmdir($dirPath);
    }


    public function delete()
    {
         self::deleteDir(Input::get('delete'));




    }

    public function download()
    {
        $file = $_GET['file'];


        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    public function edit()
    {


        $new = Input::get('edit');
        $name = Input::get('name');
        $path = Input::get('path');
        $limite = Input::get('limite');

        if(empty($new)) {
            (DB::table('folders')->where('name', 'like', $name)->where('path', 'like', $path)->update(['limite' => $limite]));
            return Response::json('error', 400);
        }
        else {

            rename($path . $name, $path . $new);
            if (DB::table('folders')->where('name', 'like', $name)->where('path', 'like', $path)->update(['limite' => $limite, 'name' => $new]))
                return $new;
            else {
                DB::table('uploads')->where('name', 'like', $name)->where('path', 'like', $path)->update(['name' => $new]);
                return $new;
            }


        }
    }

    public function contact()
    {


        if(Input::get('message')) {

            if(Session::get('time-email')) {
                $date = new \DateTime(Session::get('time-email'));
                $now = new \DateTime(date("Y-m-d H:i:s"));
                $diff = $date->diff($now);


                if ($diff->i < 120 ) {

                    $restant = 120 - $diff->i;

                    return redirect('/contact')->with('status', 'Vous avez envoyé un message il y a moins de 2 heures patientez encore ' . $restant .'min');
                }



            }


                else {

                    $user = User::where('id', '=', Auth::user()->id)->first();

                    $admins = User::where('rank', '=', 2)->get();

                    foreach ($admins as $admin) {

                        $this->dispatch(new SendMailAdmin($user, Input::get('message'), $admin->email));
                    }

                    Session::put('time-email', date("Y-m-d H:i:s"));

                    return redirect('/contact')->with('status', 'message envoyé ');
                }

        }

        return view('home.contact');

    }

}
