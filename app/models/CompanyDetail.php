<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $appends = ['photo_url'];


    protected $table = 'company_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_name','company_name','company_email', 'company_logo','address_line_one',
        'address_line_two','city','state', 'country','zip','website_url','youtube_url',
        'facebook_url','twitter_url','linkedin_url', 'instagram_url','pinterest_url',
        'telegram_url','about'
    ];

    public function getPhotoUrlAttribute(){
        if($this->company_logo !=''){
            return \url('/').'/images/'.$this->company_logo;
        } else{
            return \url('/').'/default_img/default.jpg';
        }
    }
}
