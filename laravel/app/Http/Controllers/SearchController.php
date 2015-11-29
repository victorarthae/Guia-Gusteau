<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use App\Http\Requests;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = Request::all();
        print_r($input);
        Return view('search');
    }
    //'select r.id_recipe,r.title,r.description from recipes r, recipes_ingredients ri where ri.id_recipe = r.id_recipe and ri.id_ingredient in (select id_ingredient from ingredients where name like '%ASDBGHASGEDASIUE%')'
}
