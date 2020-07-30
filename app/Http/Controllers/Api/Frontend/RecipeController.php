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

    public function latestRecipes(Request $request) {
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()')
        ->limit(4)
        ->get()
        ->all();
    }


    public function featuredRecipes(Request $request) {
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
            ->where(['status' => '1'])
            ->orderByRaw('RAND()')
            ->limit(3)
            ->get()
            ->all();
    }

    public function onInstagramRecipes(Request $request){
        return Recipes::where(['status' => '1'])
            ->select('id','title','photo')
            ->orderByRaw('RAND()')
            ->limit(9)
            ->get()
            ->all();
    }

    public function popuplarTags(Request $request){
        return RecipeTags::where(['status' => '1'])->limit(6)->get()->all();
    }

}
