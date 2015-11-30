<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Hash;
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
           return view('register')->withErrors($validator);

        User::create([
            'username' => Request::get('username'),
            'password' => md5(Request::get('password'))
        ]);

        return redirect()->route('home');
    }

    private function validaInputCadastro($input)
    {
        return validator::make($input, [
            'username' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
}
