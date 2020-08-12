<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

//Models
use App\User;
use App\models\Blogs;

class BlogRating extends Model
{

    protected $table = 'blog_rating';
    protected $primaryKey = 'id';

    protected $fillable = [
       'blog_id','user_id','rating', 'comment'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function blog()
    {
        return $this->hasOne(Blogs::class, 'id','blog_id');
    }

}
