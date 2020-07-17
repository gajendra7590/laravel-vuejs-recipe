<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\models\Categories;

class Recipes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
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


}
