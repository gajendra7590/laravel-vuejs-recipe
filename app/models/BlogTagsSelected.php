<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

//model
use App\models\BlogTags;

class BlogTagsSelected extends Model
{
    protected $table = 'blog_tags_selected';
    protected $primaryKey = 'id';

    protected $fillable = [
        'blog_id','tag_id','status'
    ];


    public function tag() {
        return $this->hasOne(BlogTags::class, 'id','tag_id');
    }
}
