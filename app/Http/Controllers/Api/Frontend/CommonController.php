<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\models\RecipeRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\models\Categories;
use App\models\Recipes;
use App\models\RecipeTags;
use App\User;
use App\models\CompanyDetail;
use App\models\ContactUs;

class CommonController extends Controller
{

    public function companyDetail(Request $request) {
        return CompanyDetail::get()->first();
    }

    public function saveContactUsEnquiry(Request $request){
        $post = $request->only('name','email','phone','comment');
        $validator = Validator::make($post,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'comment' => 'required'
        ]);
        if ($validator->fails()) {
            $result = errorArrayCreate( $validator->messages() );
            return response()->json([
                'status' => false,
                'message' => 'Incorrect form data',
                'errors' => $result
            ]);
        }else{
            $model = new ContactUs();
            $save = $model->create($post);
            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Enquiry submitted successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Opps! Error in submitted enquiry'
                ]);
            }
        }
    }

    public function getSocialLinks(Request $request) {
        return CompanyDetail::select('website_url','youtube_url','facebook_url','twitter_url',
            'linkedin_url','instagram_url','pinterest_url','telegram_url')
            ->get()->first();
    }

    public function getCategories(Request $request){
        return Categories::withCount('recipes')->where([
            'status' => '1'
        ])->get()->all();
    }

    public function authorsList(Request $request){ 
        return User::withCount(['recipes'])
            ->whereHas('roles', function ($q) {
                $q->where('roles.name', '=', 'author');
            })
        ->where(['status' => '1'])
        ->orderBy('id','DESC')
        ->get()
        ->all();
    }

    public function authorsDetail(Request $request,$id){
        return User::select('id','first_name','last_name','display_name','photo','about_me')
        ->where(['id' => $id,'status' => '1'])->get()->first();
    }

    public function authorsRecipe(Request $request,$id){
        return Recipes::withCount(['views','likes'])
            ->with([
            'category' => function($m){
                    $m->select('id','name','slug');
             },
            'user' => function($m){
                $m->select('id','first_name','last_name','display_name','photo');
            },
        ])
        ->where(['user_id' => $id,'status' => '1'])
        ->orderBy('id','DESC')
        ->get()->all();
    }

    public function followOnInstagram(Request $request){
        $limit = $request->get('limit');
        $limit = ($limit)?$limit:8; 
        return Recipes::where(['status' => '1'])
            ->select('id','title','photo','slug')
            ->orderByRaw('RAND()')
            ->limit($limit)
            ->get()
            ->all();
    }  

    public function popularTags(Request $request){
        $limit = $request->get('limit');
        $limit = ($limit)?$limit:20; 
        return RecipeTags::where(['status' => '1'])
            ->select('id','name','slug')
            ->limit($limit)
            ->get()
            ->all();
    }

    public function getSidebarCategories(Request $request){
        $limit = $request->get('limit');
        $limit = ($limit)?$limit:20;
        return Categories::with('recipes')
            ->where(['status' => '1'])
            ->select('*')
            ->limit($limit)
            ->get()
            ->all();
    }

    public function latestsRecipes(Request $request){
        $limit = $request->get('limit');
        $limit = ($limit)?$limit:3;
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('id','DESC')
        ->limit($limit)
        ->get()
        ->all();
    }

    public function randomRecipes(Request $request){
        $limit = $request->get('limit');
        $limit = ($limit)?$limit:3;
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()')
        ->limit($limit)
        ->get()
        ->all();
    }

    public function featuredRecipes(Request $request){
        $limit = $request->get('limit');
        $limit = ($limit)?$limit:3;
        return Recipes::with([
            'category' => function($m){ $m->select('id','name','slug'); },
            'user' => function($m){ $m->select('id','first_name','last_name','display_name','photo'); },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()')
        ->limit($limit)
        ->get()
        ->all();
    }
}
