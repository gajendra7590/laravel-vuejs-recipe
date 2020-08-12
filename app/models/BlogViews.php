<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

//Models
use App\models\Blogs;

class BlogViews extends Model
{
    protected $table = 'blog_views';
    protected $primaryKey = 'id';

    protected $fillable = [
        'blog_id','ip_address'
    ];

    public function blogs()
    {
        return $this->hasOne(Blogs::class, 'id','blog_id');
    }

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->ip_address = getIpAddress();
		});
    }
}
