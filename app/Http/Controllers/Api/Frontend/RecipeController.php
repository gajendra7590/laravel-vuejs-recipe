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

    
    /*
     * All Recipes List
     */
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
        ->get()
        ->all();
    }

    /*
     * All Recipes List Category
     */
    public function recipesListByCategory(Request $request,$slug){
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
            ->get()
            ->all();
    }

    /*
     * All Recipes List By Tag
     */
    public function recipesListByTag(Request $request,$slug){
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
            ->get()
            ->all();
    }

    public function recipeDetail(Request $request,$slug){
        return Recipes::with([
            'category' => function($m){
                $m->select('id','name','slug');
            },
            'selectedTags' => function($m){
                $m->select('id','recipe_id','tag_id')->with(['tag' =>function($q){ $q->select('id','name','slug'); }]);
            },
            'user' => function($m){
                $m->select('*')->with([
                    'recipes' => function($query){
                        $query->with([
                            'category' => function($q){ $q->select('id','name','slug'); },
                            'user' => function($q){ $q->select('id','first_name','last_name','display_name'); }
                        ])
                        ->select('id','category_id','user_id','title','slug','photo')
                        ->where(['status' => '1'])
                        ->limit(3);
                    }
                ]);
            },
            'nutritions'=> function($m){
                $m->select('id','recipe_id','nutrition_name','nutrition_value');
            },
            'ingredients'=> function($m){
                $m->select('id','recipe_id','name');
            },
        ])
        ->select('*')
        ->where(['slug' => $slug])
        ->get()->first();
    }

}
