<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function getLogin(){
        return view('auth.login');
    }

    function getRegister(){
        return view('auth.register');
    }
    
}
