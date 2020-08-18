<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\models\RecipeTags;
use App\models\Recipes;
use App\User;
use App\models\Categories;
use App\models\RecipeTagsSelected;

class RecipeController extends Controller
{

    
    /*
     * All Recipes List
     */
    public function recipesList(Request $request){

        $search = $request->get('search');
        return Recipes::withCount(['likes'])
            ->with([
            'category' => function($m){
                    $m->select('id','name','slug');
             },
            'user' => function($m){
                $m->select('id','first_name','last_name','display_name','photo');
            },
        ])
        ->where(['status' => '1'])
        ->where(function ($model) use ($search){
            if($search){
                $model->where('title','LIKE',"%$search%")
                    ->orWhere('short_desc','LIKE',"%$search%");
            }
        })
        ->orderBy('id','DESC')
        ->get()
        ->all();
    }

    /*
     * All Recipes List Category
     */
    public function recipesListByCategory(Request $request,$slug){
        $category = Categories::where(['slug' => $slug])->get()->first();
        if(!$category){
            return [];
        }else {
            return Recipes::withCount(['likes'])
            ->with([
                'category' => function($m){
                    $m->select('id','name','slug');
                },
                'user' => function($m){
                    $m->select('id','first_name','last_name','display_name','photo');
                },
            ])
            ->where(['status' => '1','category_id' => $category->id])
            ->orderBy('id','DESC')
            ->get()
            ->all();
        }
    }

    /*
     * All Recipes List By Tag
     */
    public function recipesListByTag(Request $request,$slug){
        $tag = RecipeTags::where(['slug' => $slug])->get()->first();
        if(!$tag){
            return [];
        }else {
            return Recipes::withCount(['likes'])
            ->with([
                'category' => function ($m) {
                    $m->select('id', 'name', 'slug');
                },
                'user' => function ($m) {
                    $m->select('id', 'first_name', 'last_name', 'display_name', 'photo');
                },
            ])
            ->whereHas('selectedTags',function ($query) use ($tag){
                $query->where(['tag_id' => $tag->id]);
            })
            ->where(['status' => '1'])
            ->orderBy('id', 'DESC')
            ->get()
            ->all();
        }
    }

    public function recipeDetail(Request $request,$slug){
        return Recipes::withCount(['views','likes','ratings'])
            ->with([
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
                'directions'=> function($m){
                    $m->select('id','recipe_id','time','description');
                },
            ])
            ->where(['slug' => $slug])
            ->get()->first();
    }

}
