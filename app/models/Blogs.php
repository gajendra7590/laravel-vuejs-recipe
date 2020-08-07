<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


use App\User;
use App\models\BlogCategories;

class Blogs extends Model
{
    protected $appends = ['photo_url'];


    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','user_id','title', 'slug','photo','description','status'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'user_id','id');
    }

    public function category()
    {
        return $this->hasOne(BlogCategories::class, 'category_id','id');
    }


    public function getPhotoUrlAttribute(){
        if($this->photo !=''){
            return \url('/').'/images/'.$this->photo;
        } else{
            return \url('/').'/default_img/default.jpg';
        }
    }
}
