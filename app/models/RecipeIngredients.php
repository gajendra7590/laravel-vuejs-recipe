<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredients extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipe_ingredients';



    protected $fillable = [
        'recipe_id','name', 'status'
    ];

}
