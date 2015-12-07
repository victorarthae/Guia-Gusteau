<?php

namespace App\Http\Controllers;

use App\Freezers;
use App\Ingredients;

use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FreezerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = $this->populateArray();
        return view('freezer')->with($array);
    }

    private function populateArray()
    {
        $ingredients = array();
        if(Auth::check())
        {
            $freezer = Freezers::where('id_user', '=', Auth::user()->id)->get();
            foreach($freezer as $f)
            {
                $ingredients[$f->id_ingredient] = Ingredients::where('id_ingredient', '=', $f->id_ingredient)->first()->name;
            }
        }
        $all_ingredient = Ingredients::all();
        $array['ingredient'] = $ingredients;
        $array['all_ingredient'] = $all_ingredient;
        return $array;
    }

    public function addIngredient()
    {
        Freezers::create(['id_user' => Auth::user()->id, 'id_ingredient' => Request::get('id_ingredient')]);

        $array = $this->populateArray();
        return view('freezer')->with($array);
    }

    public function delIngredient($ingredient_id)
    {
        $db = DB::statement("DELETE FROM freezers WHERE id_user = ? AND id_ingredient = ?;", [Auth::user()->id, $ingredient_id]);
        $array = $this->populateArray();
        return view('freezer')->with($array);
    }
}
