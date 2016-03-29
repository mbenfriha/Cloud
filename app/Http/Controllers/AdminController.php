<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Upload;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->take(10)->get();
        $files = DB::table('uploads')->orderBy('id', 'desc')->take(10)->get();

        return view('admin.home', compact('users', 'files'));
    }


    public function users()
    {
        $users = User::paginate(10);

        return view('admin.users', compact('users'));
    }

    public function files()
    {

        if(Input::get('search'))
            $files = Upload::where('name', 'like', '%'.Input::get('search').'%')->paginate(10);
        else
        $files = Upload::paginate(10);

        return view('admin.files', compact('files'));
    }
    public function fileUser($name)
    {
        $id = User::where('username', 'like', $name)->first();

        $files = Upload::where('user_id', '=', $id->id)->paginate(10);

        return view('admin.fileuser', compact('files', 'name'));
    }

    public function lock()
    {
        $id = Input::get('id');
        $lock = Input::get('lock');
        $user = User::where('id', '=', $id)->first();

        if ($user->rank == 2){
            return redirect('/users')->with('status', 'Impossible de bloquer un administrateur');
        }

        DB::table('users')
            ->where('id', $id)
            ->update(['active' => $lock]);

        return redirect('/users')->with('status', 'Profile updated!');

    }
}
