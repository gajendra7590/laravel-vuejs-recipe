<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

//Models
use App\models\Recipes;

class RecipeViews extends Model
{
    protected $table = 'recipe_views';
    protected $primaryKey = 'id';

    protected $fillable = [
        'recipe_id','ip_address'
    ];

    public function recipes()
    {
        return $this->hasMany(Recipes::class, 'id','recipe_id');
    }


    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->ip_address = getIpAddress();
        });
    }

}
