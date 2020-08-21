<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

//Models
use App\User;
use App\models\Blogs;
use App\models\BlogLikes;
use App\models\BlogRating;
use App\models\BlogViews;

class BlogExtraController extends Controller
{
    public function getBlogRatings(Request $request,$id) {
        return Blogs::select('id','user_id')
            ->withCount('ratings')
            ->with([
                'ratings' => function($query){
                    $query->with([
                        'user' => function($query){
                            $query->select('id','first_name','last_name','display_name','photo');
                        }
                    ])->select('id', 'blog_id', 'user_id','rating','comment',DB::Raw('updated_at as rating_time'));
                }
            ])
            ->where(['id' => $id])
            ->get()
            ->first();
    }

    public function createNewBlogRating(Request $request,$id) {
        $find = Blogs::find($id);
        if (!$find) {
            return response()->json([
                'status' => false,
                'message' => 'Blog not found'
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
            $post['blog_id'] = $id;
            $model = BlogRating::where(['user_id' => Auth::user()->id, 'blog_id' => $id])->get()->first();
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
                $model = new BlogRating();
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

    public function createNewBlogLike(Request $request,$id) {
        $find = Blogs::find($id);
        $post = array();
        if (!$find) {
            return response()->json([
                'status' => false,
                'message' => 'Blog not found'
            ]);
        }

        $post['user_id'] = Auth::user()->id;
        $post['blog_id'] = $id;
        $model = BlogLikes::where(['user_id' => Auth::user()->id, 'blog_id' => $id])->get()->first();
        if ($model) {
            $model->delete();
            return response()->json([
                'status' => true,
                'message' => 'You have been unlike successfully'
            ]);
        } else {
            $model = new BlogLikes();
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

    public function createNewBlogView(Request $request,$id) {
        $find = Blogs::find($id);
        $post = array();
        if (!$find) {
            return response()->json([
                'status' => false,
                'message' => 'Blog not found'
            ]);
        }
        $post['blog_id'] = $id;
        $post['ip_address'] = getIpAddress();
        $model = BlogViews::where($post)->get()->first();
        if (!$model) {
            $model = new BlogViews();
            $save = $model->create(['blog_id' => $id]);
        }
    }

    public function getUsersBlogRating(Request $request, $id){
        $result = BlogRating::where(['blog_id' => $id,'user_id' => Auth::user()->id])->get()->first();
        if(!$result){
            return null;
        }
        return $result;
    }



}
