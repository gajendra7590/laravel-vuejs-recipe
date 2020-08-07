<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//Models
use App\models\BlogCategories;



class BlogCategoriesController extends Controller
{ 
    /**
     * Categories List
     */
    public function getBlogCategories(Request $request){
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5; 
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);
        $result =  BlogCategories::select('*')
                ->orderBy($params['sort'],$params['direction'])
                ->offset($offset)
                ->orWhere('name', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('slug', 'LIKE', '%'.$params['search'].'%') 
                ->limit($limit)
                ->get()
                ->all(); 
        $count = $this->getBlogCategoriesCount($request);
        return [
            'data' => $result,
            'total' => $count
        ];
    }
    
    //Get Categories List For Shows List
    public function blogCategories(Request $request){
        return BlogCategories::select('id','name','slug','photo')
        ->where(['status' => '1'])
        ->get()
        ->all(); 
    }
   
    /**
     * Get Categories List Count
     */
    private function getBlogCategoriesCount(Request $request){
        $params = $request->all(); 
        return BlogCategories::orWhere('name', 'LIKE', '%'.$params['search'].'%')
        ->orWhere('slug', 'LIKE', '%'.$params['search'].'%')  
        ->get()
        ->count(); 
    }

    /**
     * Edit Category
     */
    public function getBlogCategory(Request $request,$id){
        return BlogCategories::select('id','name','slug','description','status','photo')
            ->where([
                'id' => $id 
             ])
            ->get()
            ->first();
    }

    public function createBlogCategory(Request $request){
        $post = $request->all(); 
        $validator = Validator::make($post, array(
            'name' => 'required|unique:recipe_categories',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        )); 
        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json(['status'=>false,'message'=>'Incorrect form data','errors'=>$errors]);
        }else{

            $slug = slugCreator($post['name']);

            $category = new BlogCategories();
            $category->name = $post['name'];
            $category->slug = $slug;
            $category->status = $post['status'];
            $category->description = $post['description'];

            if ($request->hasFile('image')) {
                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $category->photo = $imageName;
                }
            }
            $save = $category->save();
            if($save){
                return response()->json([
                    'status' => true,
                    'message'=>'Category created successfully'
                ]);
            }
        }
    }

    public function updateBlogCategory(Request $request,$id){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'name' => "required|unique:recipe_categories,name,{$id}",
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ));

        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json([
                'status' => false,
                'message' => 'Incorrect form data',
                'errors' => $errors
            ]);
        }else{
            $category = BlogCategories::find($id);
            if(!$category){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid category ID'
                ]);
            }

            $slug = slugCreator($post['name']);
            $category->name = $post['name'];
            $category->slug = $slug;
            $category->description = $post['description'];
            $category->status = $post['status'];

            if ($request->hasFile('image')) {
                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $category->photo = $imageName;
                }
            }


            $save = $category->save();
            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Category Updated Successfully'
                ]);
            }
        }

    }


    public function deleteBlogCategory(Request $request,$id){
        $category = BlogCategories::find($id);
        if(!$category){
            return response()->json([
                'status' => false,
                'message' => 'Invalid category ID'
            ]);
        }

        $isDelete =  $category->update(['status' => '2']);
        if($isDelete){
            return response()->json([
                'status' => true,
                'message' => 'Category Deleted Successfully'
            ]);
        }
    }

}
