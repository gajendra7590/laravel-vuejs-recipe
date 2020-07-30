<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RecipeTags extends Model
{



    protected $table = 'recipe_tags';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','slug','description','status'
    ];


}
