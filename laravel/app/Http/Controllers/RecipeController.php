<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Ingredients;
use App\Recipes;
use App\Recipes_ingredients;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($recipe_id)
    {
        $recipe = Recipes::where('id_recipe', '=', $recipe_id)->first();
        $recipe_ingredient = Recipes_ingredients::where('id_recipe', '=', $recipe_id)->get();
        foreach($recipe_ingredient as $ri)
        {
            $ingredient[] = Ingredients::where('id_ingredient', '=', $ri->id_ingredient)->first();
        }
        $rating = 0;
        if(Auth::check())
        {
            $grade = Grades::where('id_user', '=', Auth::user()->id)->where('id_recipe', '=', $recipe_id);
            if($grade->count())
            {
                $rating = $grade->first()->grade;
            }
        }
        return view('recipes')->with(['recipe' => $recipe, 'ingredient' => $ingredient, 'rating' => $rating]);
    }
}
