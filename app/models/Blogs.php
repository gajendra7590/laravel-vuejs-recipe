<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


use App\User;
use App\models\BlogCategories;
use App\models\BlogTagsSelected;

class Blogs extends Model
{
    protected $appends = ['photo_url'];


    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','user_id','title', 'slug','photo','short_desc','description','status'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function category()
    {
        return $this->hasOne(BlogCategories::class, 'id','category_id');
    }

    public function selectedTags()
    {
        return $this->hasMany(BlogTagsSelected::class, 'blog_id','id');
    }


    public function getPhotoUrlAttribute(){
        if($this->photo !=''){
            return \url('/').'/images/'.$this->photo;
        } else{
            return \url('/').'/default_img/default.jpg';
        }
    }
}
