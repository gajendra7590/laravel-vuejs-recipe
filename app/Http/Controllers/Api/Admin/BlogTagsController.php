<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//Models
use App\models\BlogTags;
use App\models\Blogs;



class BlogTagsController extends Controller
{ 
    /**
     * Blog Tags List
     */
    public function getBlogTags(Request $request){
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5; 
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);
        $result =  BlogTags::select('*')
                ->orderBy($params['sort'],$params['direction'])
                ->offset($offset)
                ->orWhere('name', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('slug', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('description', 'LIKE', '%'.$params['search'].'%')
                ->limit($limit)
                ->get()
                ->all(); 
        $count = $this->getBlogTagsCount($request);
        return [
            'data' => $result,
            'total' => $count
        ];
    }
    
    //Get Blog Tags List For Shows List
    public function blogTags(Request $request){
        return BlogTags::select('id','name','slug','description','status')
        ->where(['status' => '1'])
        ->get()
        ->all(); 
    }
   
    /**
     * Get Blog Tags List Count
     */
    private function getBlogTagsCount(Request $request){
        $params = $request->all(); 
        return BlogTags::orWhere('name', 'LIKE', '%'.$params['search'].'%')
        ->orWhere('description', 'LIKE', '%'.$params['search'].'%')
        ->orWhere('slug', 'LIKE', '%'.$params['search'].'%')  
        ->get()
        ->count(); 
    }

    /**
     * Edit Blog Tags
     */
    public function getBlogTag(Request $request,$id){
        return BlogTags::select('id','name','slug','description','status')
            ->where([
                'id' => $id 
            ])->get()->first();
    }

    public function createBlogTag(Request $request){
        $post = $request->all(); 
        $validator = Validator::make($post, array(
            'name' => 'required|unique:recipe_categories'
        )); 
        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json(['status'=>false,'message'=>'Incorrect form data','errors'=>$errors]);
        }else{

            $slug = slugCreator($post['name']);
            $tagModel = new BlogTags();
            $tagModel->name = $post['name'];
            $tagModel->slug = $slug;
            $tagModel->status = $post['status'];
            $tagModel->description = $post['description'];
            $save = $tagModel->save();
            if($save){
                return response()->json([
                    'status' => true,
                    'message'=>'New Tag created successfully'
                ]);
            }
        }
    }

    public function updateBlogTag(Request $request,$id){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'name' => "required|unique:recipe_tags,name,{$id}"
        ));

        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json([
                'status' => false,
                'message' => 'Incorrect form data',
                'errors' => $errors
            ]);
        }else{
            $tagModel = BlogTags::find($id);
            if(!$tagModel){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid tag ID'
                ]);
            }

            $slug = slugCreator($post['name']);
            $tagModel->name = $post['name'];
            $tagModel->slug = $slug;
            $tagModel->description = $post['description'];
            $tagModel->status = $post['status'];
            $save = $tagModel->save();
            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Tags Updated Successfully'
                ]);
            }
        }

    }


    public function deleteBlogTag(Request $request,$id){
        $tagModel = BlogTags::find($id);
        if(!$tagModel){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Tag ID'
            ]);
        }

        $isDelete =  $tagModel->update(['status' => '2']);
        if($isDelete){
            return response()->json([
                'status' => true,
                'message' => 'Tag Archived Successfully'
            ]);
        }
    }

}
