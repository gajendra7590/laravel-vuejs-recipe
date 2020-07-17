<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\CommonEmail;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\UserSubscriptions;
use App\Models\UsersArtistCategory;
use App\Models\Arts;
use App\Models\ArtsCategories;


//get Unique uuid
if (! function_exists('gen_uuid')) {
    function gen_uuid(){
        return sprintf('%04x%04x_%04x_%04x_%04x_%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
} 

//Create laravel errors array
if (! function_exists('errorArrayCreate')) {
    function errorArrayCreate($obj) {
        try{
            $obj = $obj->toArray();
            $errors = array();
            if( is_array($obj) && !empty($obj)){
                foreach($obj as $k => $v){
                    if( count($v) > 1 ){
                        $err = '';
                        foreach ($v as $value) {
                            $err.= $value.' && ';
                        }
                        trim($err,'&&');
                        $errors[$k] = $err;
                    }else{
                        $errors[$k] = $v[0];
                    }

                }
            }
            return $errors;
        }
        catch(\Exception $e){
            throw $e;
        }
    }
} 


