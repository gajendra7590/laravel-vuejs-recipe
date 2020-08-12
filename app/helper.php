<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\CommonEmail;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\UserSubscriptions;
use App\Models\UsersArtistCategory;
use App\Models\Arts;
use App\Models\ArtsCategories;


//Common Email Send Function
if (!function_exists('emailSend')) {
    function emailSend($view, $email, $data)
    {
        if (view()->exists('emails.' . $view)) {
            $data['view'] = $view;
            return Mail::to($email)
                ->send(new CommonEmail($data));
        } else {
            return false;
        }
    }
}

//get Unique uuid
if (!function_exists('getIpAddress')) {
    function getIpAddress()
    {
        $ip = null;
        //whether ip is from the share internet
        if (!emptyempty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } //whether ip is from the proxy
        elseif (!emptyempty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } //whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;

    }
}


//get Unique uuid
if (!function_exists('gen_uuid')) {
    function gen_uuid()
    {
        return sprintf('%04x%04x_%04x_%04x_%04x_%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}


//Function for slug creator
if (!function_exists('slugCreator')) {
    function slugCreator($name)
    {
        $name = strtolower($name);
        $name = preg_replace('/\s+/', '-', $name);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
        return $name;
    }
}

//Create laravel errors array
if (!function_exists('errorArrayCreate')) {
    function errorArrayCreate($obj)
    {
        try {
            $obj = $obj->toArray();
            $errors = array();
            if (is_array($obj) && !empty($obj)) {
                foreach ($obj as $k => $v) {
                    if (count($v) > 1) {
                        $err = '';
                        foreach ($v as $value) {
                            $err .= $value . ' && ';
                        }
                        trim($err, '&&');
                        $errors[$k] = $err;
                    } else {
                        $errors[$k] = $v[0];
                    }

                }
            }
            return $errors;
        } catch (\Exception $e) {
            throw $e;
        }
    }
} 


