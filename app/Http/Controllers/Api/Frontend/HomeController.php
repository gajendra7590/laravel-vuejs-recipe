<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\User;
use App\models\Recipes;
use App\models\Categories;
use App\models\RecipeTags;

class HomeController extends Controller
{

    /*
     * Home Slider & Below 3 Post
     */
    public function getHomeSlider(Request $request){
        return [
            'slider' => $this->homeSliderArea(),
            'padbottom18' => $this->homePaddingBottom18()
        ];
    }

    /*
     * Trending 7 Recipe Section
     */
    public function homeTrendingRecipe(Request $request){
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()')
        ->limit(5)
        ->get()
        ->all();
    }

    /*
     * After Trending 3 Sections
     */
    public function homeSection3In1(Request $request){
        return [
            'editorsChoice' => $this->editorsChoice(),
            'popular' => $this->popular()
        ];
    }

    /*
     * Sidebar 3 Sections
     */
    public function homeSidebarSection3In1(Request $request){
        return [
            'RecipesCategories' => $this->categories(),
            'popuplar_tags' => $this->popuplarTags(),
            'about_me' => $this->aboutMe(),
        ];
    } 

    //Below functions are callback
    private function homeSliderArea(){
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderBy('is_slider','DESC')
        ->limit(3)
        ->get()
        ->all();
    }

    private function homePaddingBottom18(){
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

    private function editorsChoice(){
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

    private function popular(){
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()')
        ->limit(2)
        ->get()
        ->all();
    }

    private function categories(){
        return Categories::where(['status' => '1'])->limit(6)->get()->all();
    }


    private function popuplarTags(){
        return RecipeTags::where(['status' => '1'])->limit(6)->get()->all();
    }


    private function aboutMe(){
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })->where(['status' => '1'])->get()->first();
    }
}
