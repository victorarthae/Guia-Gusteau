<?php

namespace App\Http\Controllers;

use App\Grades;
use Illuminate\Support\Facades\Auth;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Grades::create(['id_recipe' => Request::get('recipe_id'), 'id_user' => Auth::user()->id, 'grade' => Request::get('rating')]);

        return redirect()->route('receita', Request::get('recipe_id'));
    }
}
