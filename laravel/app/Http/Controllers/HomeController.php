<?php

namespace App\Http\Controllers;

use App\Recipes;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use stdClass;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipes::orderByRaw("RAND()")->limit(3)->get();

        return view('home')->with('recipes', $recipes);
    }
}
