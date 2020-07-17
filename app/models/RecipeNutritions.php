<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RecipeNutritions extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipe_nutritions';


    protected $fillable = [
        'recipe_id','nutrition_name','nutrition_value', 'status'
    ];



}
