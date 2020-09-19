<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //

    public function index(UserDataTable $userDataTable){

        return $userDataTable->render('usuarios.index');

    }

    public function create()
    {
        return view('usuarios.form');
    }

    public function store(Request $request){

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_id' => auth()->user()->id,
        ]);
        if( $request->name){
            Alert::success('Usuario', $request->name, 'Salvo!!');
            return back();
        }else{
            Alert::error($request->name, 'Erro ao Salvar');
        }
        return back()->withInput();

    }


}
