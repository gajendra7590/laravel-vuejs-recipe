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
use App\models\Categories;
use App\models\Recipes;
use App\models\RecipeTags;
use App\models\Blogs;
use App\models\BlogCategories;
use App\models\BlogTags;

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
            'recipeTags' => RecipeTags::count(),
            'recipeBlogs' => Blogs::count(),
            'recipeBlogCategories' => BlogCategories::count(),
            'recipeBlogTags' => BlogTags::count()
        ]); 
    }    
}