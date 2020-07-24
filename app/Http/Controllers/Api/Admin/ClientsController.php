<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\User;

class ClientsController extends Controller
{
    public function getClients(Request $request) {  
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'user');
        })->orderBy('id','DESC')->get()->all();  
    }

    public function editClients(Request $request,$id) {  
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'user');
        })->find($id);  
    }


}
