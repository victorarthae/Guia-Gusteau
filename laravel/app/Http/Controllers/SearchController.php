<?php

namespace App\Http\Controllers;

use App\Freezers;
use App\Ingredients;
use Illuminate\Support\Facades\Auth;
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
        $array = $this->populateSearchView($text);
        return  view('search')->with($array);
    }

    private function populateSearchView($text)
    {
        $all_ingredient = array();
        $ingredients_id = array();
        $recipes = array();

        foreach($text as $t)
        {
            $string = "%".trim($t)."%";
            $db = DB::select("select r.id_recipe,r.title,r.description,r.image, ri.id_ingredient
                          from recipes r, recipes_ingredients ri
                          where ri.id_recipe = r.id_recipe and ri.id_ingredient in (select id_ingredient from ingredients where name like ?)", [$string]);

            foreach ($db as $index => $d){
                $ingredients_id[] = $d->id_ingredient;
                $name_ingredient = Ingredients::where('id_ingredient', '=', $d->id_ingredient)->first()->name;
                $recipes[$d->id_recipe]['recipe'] = $db[$index];
                $recipes[$d->id_recipe]['ingredients'][] = $name_ingredient;
                $all_ingredient[$d->id_ingredient] = $name_ingredient;
            }
        }

        $todos_ingredient = Ingredients::all();
        $ingredients_id = serialize($ingredients_id);

        $freezer = NULL;
        if(Auth::check())
        {
            $geladeira = Freezers::where('id_user', '=', Auth::user()->id)->get();
            foreach($geladeira as $f)
            {
                $freezer[$f->id_ingredient] = Ingredients::where('id_ingredient', '=', $f->id_ingredient)->first()->name;
            }
        }

        return ['recipes' => $recipes, 'all_ingredient' => $all_ingredient, 'ingredients_id' => $ingredients_id, 'freezer' => $freezer, 'todos_ingredient' => $todos_ingredient];
    }

    public function removeIngredientId($ids, $id)
    {
        $array_ids = unserialize($ids);
        if(($key = array_search($id, $array_ids)) !== false) {
            unset($array_ids[$key]);
        }

        $array_name = array();
        foreach($array_ids as $a)
        {
            $array_name[] = Ingredients::where('id_ingredient', '=', $a)->first()->name;
        }
        $array = $this->populateSearchView($array_name);
        return  view('search')->with($array);
    }

    public function addIngredientInSearch()
    {
        $all_ingredient = unserialize(Request::get('all_ingredient'));

        $ingredient = Ingredients::where('id_ingredient', '=', Request::get('freezer'))->first();
        $all_ingredient[$ingredient->id_ingredient] = $ingredient->name;

        $array = $this->populateSearchView($all_ingredient);
        return  view('search')->with($array);
    }

    public function searchFreezer()
    {
        $freezer = Freezers::where('id_user', '=', Auth::user()->id)->get();
        foreach($freezer as $f)
        {
            $array_name[] = Ingredients::where('id_ingredient', '=', $f->id_ingredient)->first()->name;
        }
        $array = $this->populateSearchView($array_name);
        return  view('search')->with($array);
    }
}
