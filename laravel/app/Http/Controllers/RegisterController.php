<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Validator;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function efetuaCad()
    {
        $validator = $this->validaInputCadastro(Request::all());
        if($validator->fails())
            die('erro');

        $user = User::create([
            'username' => Request::get('login'),
            'password' => Request::get('password')
        ]);

        Profile::create([
            'id_user' => $user->id,
            'name'    => Request::get('name')
        ]);



        die('foi');
    }

    private function validaInputCadastro($input)
    {
        return validator::make($input, [
//            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:profiles',
            'password' => 'required|confirmed|min:6',
        ]);
    }
}
