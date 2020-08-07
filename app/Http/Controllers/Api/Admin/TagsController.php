<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//Models
use App\models\RecipeTags;
use App\models\Recipes;



class TagsController extends Controller
{ 
    /**
     * Categories List
     */
    public function getTags(Request $request){
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5; 
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);
        $result =  RecipeTags::select('*')
                ->orderBy($params['sort'],$params['direction'])
                ->offset($offset)
                ->orWhere('name', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('slug', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('description', 'LIKE', '%'.$params['search'].'%')
                ->limit($limit)
                ->get()
                ->all(); 
        $count = $this->getTagsCount($request);
        return [
            'data' => $result,
            'total' => $count
        ];
    }
    
    //Get Categories List For Shows List
    public function tags(Request $request){
        return RecipeTags::select('id','name','slug','description','status')
        ->where(['status' => '1'])
        ->get()
        ->all(); 
    }
   
    /**
     * Get Categories List Count
     */
    private function getTagsCount(Request $request){
        $params = $request->all(); 
        return RecipeTags::orWhere('name', 'LIKE', '%'.$params['search'].'%')
        ->orWhere('description', 'LIKE', '%'.$params['search'].'%')
        ->orWhere('slug', 'LIKE', '%'.$params['search'].'%')  
        ->get()
        ->count(); 
    }

    /**
     * Edit Category
     */
    public function getTag(Request $request,$id){
        return RecipeTags::select('id','name','slug','description','status')
            ->where([
                'id' => $id 
            ])->get()->first();
    }

    public function createTag(Request $request){
        $post = $request->all(); 
        $validator = Validator::make($post, array(
            'name' => 'required|unique:recipe_categories'
        )); 
        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json(['status'=>false,'message'=>'Incorrect form data','errors'=>$errors]);
        }else{

            $slug = slugCreator($post['name']);
            $tagModel = new RecipeTags();
            $tagModel->name = $post['name'];
            $tagModel->slug = $slug;
            $tagModel->status = $post['status'];
            $tagModel->description = $post['description'];

//            if ($request->hasFile('image')) {
//                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
//                $is_uploaded = $request->image->move(public_path('images'), $imageName);
//                if( $is_uploaded){
//                    $category->photo = $imageName;
//                }
//            }
            $save = $tagModel->save();
            if($save){
                return response()->json([
                    'status' => true,
                    'message'=>'New Tag created successfully'
                ]);
            }
        }
    }

    public function updateTag(Request $request,$id){
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
            $tagModel = RecipeTags::find($id);
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

//            if ($request->hasFile('image')) {
//                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
//                $is_uploaded = $request->image->move(public_path('images'), $imageName);
//                if( $is_uploaded){
//                    $category->photo = $imageName;
//                }
//            }


            $save = $tagModel->save();
            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Tags Updated Successfully'
                ]);
            }
        }

    }


    public function deleteTag(Request $request,$id){
        $tagModel = RecipeTags::find($id);
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
