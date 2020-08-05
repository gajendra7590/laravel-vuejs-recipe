<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\models\Recipes;

class Categories extends Model
{

    protected $appends = ['photo_url','counts'];


    protected $table = 'recipe_categories';
    protected $primaryKey = 'id';  

    protected $fillable = [
        'name','slug','description', 'photo','status'
    ];


    public function recipes()
    {
        return $this->hasMany(Recipes::class, 'category_id','id');
    }


    //Get Total Arts Count
    public function getCountsAttribute(){
        return Recipes::where(['category_id' => $this->id])->get()->count();
    }

    public function getPhotoUrlAttribute(){  
       if($this->photo !=''){
           return \url('/').'/images/'.$this->photo;
       } else{
           return \url('/').'/default_img/default.jpg';
       } 
    }


    
}
