<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//models
use App\User;
use App\Models\Categories;
use App\Models\Recipes; 

class CommonController extends Controller
{
    public function index(){ 
        return response()->json([
            'categories' => Categories::count(),
            'recipes' => Recipes::count(),
            'clients' =>  User::whereHas('roles', function ($q) {
                $q->where('roles.name', '=', 'user');
            })->count(),
            'authors' =>  User::whereHas('roles', function ($q) {
                $q->where('roles.name', '=', 'author');
            })->count(),
        ]); 
    }    
}