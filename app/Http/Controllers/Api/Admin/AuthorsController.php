<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\User;

class AuthorsController extends Controller
{
    public function getAuthors(Request $request){ 
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })->orderBy('id','DESC')->get()->all(); 
    }

    public function editAuthors(Request $request,$id){ 
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })->find($id); 
    }
}
