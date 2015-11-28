<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes_ingredients extends Model
{
    protected $table = 'recipes_ingredients';

    protected $fillable = ['id_recipe','id_ingredient'];
}
