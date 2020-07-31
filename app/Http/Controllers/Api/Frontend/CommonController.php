<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Categories;
use App\models\Recipes;
use App\models\RecipeTags;
use App\User;

class CommonController extends Controller
{

    public function getCategories(Request $request){
        return Categories::withCount('recipes')->where([
            'status' => '1'
        ])->get()->all();
    }



    public function authorsList(Request $request){
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })
        ->withCount(['recipes'])
        ->select()
        ->where(['status' => '1'])
        ->orderBy('id','DESC')
        ->get()
        ->all();
    }


    public function latestsRecipes(Request $request){
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


}
