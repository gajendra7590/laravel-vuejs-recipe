<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ShopProducts extends Model
{
    protected $table = 'shop_products';
    protected $primaryKey = 'id';

    protected $fillable = [
        //'recipe_id','tag_id','status'
    ];
}
