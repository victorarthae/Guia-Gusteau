<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Request;
use App\Http\Requests;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function LoginUser()
    {
        $user = User::where('username', '=', Request::get('email'))->where('password', '=', md5(Request::get('password')))->get();

        if(!$user->count())
            return view('login')->with('message', 'Email ou senha estão errados');

        Auth::login($user->first(), true);
        return redirect()->route('home');
    }
}
