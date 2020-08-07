<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\models\Recipes;
use App\models\RecipeTags;

class RecipeTagsSelected extends Model
{
    protected $table = 'recipe_tags_selected';
    protected $primaryKey = 'id';

    protected $fillable = [
        'recipe_id','tag_id','status'
    ];
}
