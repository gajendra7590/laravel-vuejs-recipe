<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

//Models
use App\User;
use App\models\Recipes;

class RecipeLikes extends Model
{
    protected $table = 'recipe_likes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'recipe_id','user_id'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipes::class, 'id','recipe_id');
    }
}
