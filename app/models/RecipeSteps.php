<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\models\Categories;

class RecipeSteps extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipe_steps';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id','time','description', 'status'
    ];

}
