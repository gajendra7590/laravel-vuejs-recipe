<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\models\Categories;
use App\models\RecipeNutritions;
use App\models\RecipeIngredients;
use App\models\RecipeSteps;
use App\models\RecipeTagsSelected;
use App\models\RecipeViews;
use App\models\RecipeLikes;
use App\models\RecipeRating;



class Recipes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    //protected $appends = ['photo_url','views','likes','rating'];
    protected $appends = ['avg_rating','photo_url'];
    protected $table = 'recipes';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','user_id','title', 'slug', 'short_desc', 'description',
        'photo','prepairation_time','cooking_time','serving_peoples','is_slider','status'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function selectedTags()
    {
        return $this->hasMany(RecipeTagsSelected::class, 'recipe_id','id');
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

    public function directions()
    {
        return $this->hasMany(RecipeSteps::class, 'recipe_id','id');
    }

    public function views()
    {
        return $this->hasMany(RecipeViews::class, 'recipe_id','id');
    }

    public function likes()
    {
        return $this->hasMany(RecipeLikes::class, 'recipe_id','id');
    }

    public function ratings()
    {
        return $this->hasMany(RecipeRating::class, 'recipe_id','id');
    }


    public function getPhotoUrlAttribute(){
        if($this->photo !=''){
            return \url('/').'/images/'.$this->photo;
        } else{
            return \url('/').'/default_img/default.jpg';
        }
    }

    /* public function getViewsAttribute(){
        return RecipeViews::where(['recipe_id' => $this->id])->count();
    }

    public function getLikesAttribute(){
        return RecipeLikes::where(['recipe_id' => $this->id])->count();
    } */

    public function getAvgRatingAttribute(){
        $rating = RecipeRating::where(['recipe_id' => $this->id])->avg('rating');
        return round($rating,1);
    }

    public function getPrepairationTimeAttribute($value){
        return (str_pad($value, 2, '0', STR_PAD_LEFT));
    }

    public function getCookingTimeAttribute($value){
        return (str_pad($value, 2, '0', STR_PAD_LEFT));
    }

    public function getServingPeoplesAttribute($value){
        return (str_pad($value, 2, '0', STR_PAD_LEFT));
    }

}
