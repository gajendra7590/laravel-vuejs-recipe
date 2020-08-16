<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;


//Models
use App\User;
use App\models\Recipes;
use App\models\RecipeLikes;
use App\models\RecipeRating;
use App\models\RecipeViews;

class RecipeExtraController extends Controller
{
    public function getRecipeRatings(Request $request, $id)
    {
        return Recipes::select('id','user_id')
            ->withCount('ratings')
            ->with([
                'ratings' => function($query){
                $query->with([
                    'user' => function($query){
                        $query->select('id','first_name','last_name','display_name','photo');
                    }
                ])->select('id', 'recipe_id', 'user_id','rating','comment',DB::Raw('updated_at as rating_time'));
             }
        ])
        ->where(['id' => $id])
        ->get()
        ->first();
    }

    public function createNewRecipeRating(Request $request, $id)
    {
        $find = Recipes::find($id);
        if (!$find) {
            return response()->json([
                'status' => false,
                'message' => 'Recipe not found'
            ]);
        }

        $post = $request->only('rating', 'comment');
        $validator = Validator::make($post, [
            'rating' => 'required|numeric|between:1,5',
            'comment' => 'required'
        ]);
        if ($validator->fails()) {
            $result = errorArrayCreate($validator->messages());
            return response()->json([
                'status' => false,
                'message' => 'Incorrect form data',
                'errors' => $result
            ]);
        } else {
            $post['user_id'] = Auth::user()->id;
            $post['recipe_id'] = $id;
            $model = RecipeRating::where(['user_id' => Auth::user()->id, 'recipe_id' => $id])->get()->first();
            if ($model) {
                $model->update([
                    'rating' => $post['rating'],
                    'comment' => $post['comment'],
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Your rating has been updated'
                ]);
            } else {
                $model = new RecipeRating();
                $save = $model->create($post);
                if ($save) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Your rating has been saved'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Opps! Error in submitted'
                    ]);
                }
            }
        }

    }

    public function createNewRecipeLike(Request $request, $id)
    {
        $find = Recipes::find($id);
        $post = array();
        if (!$find) {
            return response()->json([
                'status' => false,
                'message' => 'Recipe not found'
            ]);
        }

        $post['user_id'] = Auth::user()->id;
        $post['recipe_id'] = $id;
        $model = RecipeLikes::where(['user_id' => Auth::user()->id, 'recipe_id' => $id])->get()->first();
        if ($model) {
            $model->delete();
            return response()->json([
                'status' => true,
                'message' => 'You have been unlike successfully'
            ]);
        } else {
            $model = new RecipeLikes();
            $save = $model->create($post);
            if ($save) {
                return response()->json([
                    'status' => true,
                    'message' => 'You have been liked successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Opps! Error in submitted'
                ]);
            }
        }
    }

    public function createNewRecipeView(Request $request, $id)
    {
        $find = Recipes::find($id);
        $post = array();
        if (!$find) {
            return response()->json([
                'status' => false,
                'message' => 'Recipe not found'
            ]);
        }
        $post['recipe_id'] = $id;
        $post['ip_address'] = getIpAddress();
        $model = RecipeViews::where($post)->get()->first();
        if (!$model) {
            $model = new RecipeViews();
            $save = $model->create(['recipe_id' => $id]);
        }
    }

    public function getUsersLike(Request $request, $id){
        $result = RecipeLikes::where(['recipe_id' => $id,'user_id' => Auth::user()->id])->get()->first();
        if(!$result){
            return null;
        }
        return $result;
    }
    public function getUsersRating(Request $request, $id){
        $result = RecipeRating::where(['recipe_id' => $id,'user_id' => Auth::user()->id])->get()->first();
        if(!$result){
            return null;
        }
        return $result;
    }

}
