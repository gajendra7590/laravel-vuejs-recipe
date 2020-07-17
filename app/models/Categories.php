<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $table = 'recipe_categories';
    protected $primaryKey = 'id';



    protected $fillable = [
        'name','slug','description', 'photo','status'
    ];


    
}
