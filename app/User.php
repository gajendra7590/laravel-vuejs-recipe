<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

//Models
use App\models\Recipes;

class User extends Authenticatable
{
    use Notifiable,HasRoles,HasApiTokens;

    protected $appends = ['photo_url'];

    protected $table = 'recipe_users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','display_name', 'email', 'password',
        'phone','photo','address_line_one','address_line_two','city',
        'state','country','zip','last_login','ip_address','speciality',
        'website_url','youtube_url','facebook_url','twitter_url','linkedin_url',
        'instagram_url','pinterest_url', 'reset_token','reset_token_at','status',
        'about_me','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'reset_token_at' => 'datetime',
        'last_login' => 'datetime',
    ];


    public function recipes()
    {
        return $this->hasMany(Recipes::class, 'user_id','id');
    }


    public function getUserRoleNameAttribute(){
        if( $this->hasRole('admin') ){
            return 'admin';
        } else if( $this->hasRole('author') ){
            return 'author';
        } else if( $this->hasRole('user') ){
            return 'user';
        }else{
            return null;
        }
    }

    public function getDisplayNameAttribute($value){ 
        if($value!=''){
            return $value;
        }else{
            return "{$this->first_name} {$this->last_name}";
        }

    }

    public function getPhotoUrlAttribute(){  
        if($this->photo !=''){
            return \url('/').'/images/'.$this->photo;
        } else{
            return \url('/').'/default_img/user_default.png';
        }
 
     }


}
