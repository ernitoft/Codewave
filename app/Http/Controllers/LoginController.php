<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function store (Request $request){
        //Validar información recolectada
        $mesagges = makeMessages();

        $this->validate($request,[
            'correo'=> ['required','email'],
            'contrasena'=> ['required']
        ],$mesagges);

        if (!auth()->attempt(['email'=>$request->correo, 'password'=>$request->contrasena])){

            return back()->with('message','- Usuario no registrado o contraseña incorrecta.');
        }
        return redirect()->route('dashboard');
    }

}
