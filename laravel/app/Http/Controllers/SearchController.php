<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $text = explode(',', Request::get('text'));
        $recipes = array();
        foreach($text as $t)
        {
            $string = "%".trim($t)."%";
            $db = DB::select("select r.id_recipe,r.title,r.description,r.image
                          from recipes r, recipes_ingredients ri
                          where ri.id_recipe = r.id_recipe and ri.id_ingredient in (select id_ingredient from ingredients where name like ?)", [$string]);

            foreach ($db as $index => $d){
                $recipes[$d->id_recipe] = $db[$index];
            }
        }
        return view('search')->with('recipes', $recipes);
    }
}
