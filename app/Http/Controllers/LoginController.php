<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index (){
        return view('welcome');
    }
    public function login( Request $request ){
        $nameandpass = 'admin';

        if($request->name == $nameandpass && $request->password == $nameandpass){
            return Redirect::to('/list');
        }else{
            return view('welcome');
        }
        
        /*
        $dadosFormulario=$request->all();
        $dadosLogin=['name'=>$dadosFormulario['name'],'password'=>$dadosFormulario['password']];

        if ( dd(Auth::attempt($dadosLogin)) ) {
            dd('Voce Esta Logado');
        }else {
            dd('Voce não Esta Logado');
        }
        */
    }
}
