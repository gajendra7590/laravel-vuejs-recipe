<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\models\Categories;
use App\models\RecipeNutritions;
use App\models\RecipeIngredients;
use App\models\RecipeSteps;


class Recipes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $appends = ['photo_url'];
    protected $table = 'recipes';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','user_id','title', 'slug', 'description',
        'photo','prepairation_time','cooking_time','serving_peoples','status'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }


    public function category()
    {
        return $this->hasOne(Categories::class, 'id','category_id');
    }

    public function nutritions()
    {
        return $this->hasMany(RecipeNutritions::class, 'recipe_id','id');
    }

    public function ingredients()
    {
        return $this->hasMany(RecipeIngredients::class, 'recipe_id','id');
    }

    public function getPhotoUrlAttribute(){  
        if($this->photo !=''){
            return \url('/').'/images/'.$this->photo;
        } else{
            return \url('/').'/default_img/default.jpg';
        } 
     }


}
