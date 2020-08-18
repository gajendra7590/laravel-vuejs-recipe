<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','subject', 'message','ip_address'
    ];


    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->ip_address = getIpAddress();
        });
    }
}
