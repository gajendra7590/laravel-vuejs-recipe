<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\models\RecipeTags;
use App\models\Recipes;
use App\User;
use App\models\Categories;

class RecipeController extends Controller
{

    public function recipesList(Request $request){
        return Recipes::with([
            'category' => function($m){
                    $m->select('id','name','slug');
             },
            'user' => function($m){
                $m->select('id','first_name','last_name','display_name','photo');
            },
        ])
        ->where(['status' => '1'])
        ->orderBy('id','DESC')
       // ->limit(8)
        ->get()
        ->all();
    } 

}
