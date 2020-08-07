<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BlogTagsSelected extends Model
{
    protected $table = 'blog_tags_selected';
    protected $primaryKey = 'id';

    protected $fillable = [
        'blog_id','tag_id','status'
    ];
}
