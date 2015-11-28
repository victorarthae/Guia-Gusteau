<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freezers extends Model
{
    protected $table = 'freezers';

    protected $fillable = ['id_user','id_ingredient'];
}
