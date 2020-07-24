<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $appends = ['photo_url'];


    protected $table = 'recipe_categories';
    protected $primaryKey = 'id'; 



    protected $fillable = [
        'name','slug','description', 'photo','status'
    ];



    public function getPhotoUrlAttribute(){  
       if($this->photo !=''){
           return \url('/').'/images/'.$this->photo;
       } else{
           return \url('/').'/images/default/default.jpg';
       }

    }


    
}
