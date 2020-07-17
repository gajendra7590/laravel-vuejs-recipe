<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//Models
use App\models\Categories;



class CategoriesController extends Controller
{


    public function getCategories(Request $request){
        return Categories::all();
    }

    public function getCategory(Request $request,$id){
        return Categories::where([
                'id' => $id,
                'status'=>'1'
            ])
            ->first();
    }

    public function createCategory(Request $request){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'name' => 'required|unique:recipe_categories',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ));

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['success'=>false,'message'=>'Incorrect form data','errors'=>$errors]);
        }else{

            $slug = slugCreator($post['name']);

            $category = new Categories();
            $category->name = $post['name'];
            $category->slug = $slug;
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
                    'success' => true,
                    'message'=>'Category created successfully'
                ]);
            }
        }
    }

    public function updateCategory(Request $request,$id){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'name' => "required|unique:recipe_categories,name,{$id}",
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ));

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'message' => 'Incorrect form data',
                'errors' => $errors
            ]);
        }else{
            $category = Categories::find($id);
            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid category ID'
                ]);
            }

            $slug = slugCreator($post['name']);
            $category->name = $post['name'];
            $category->slug = $slug;
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
                    'success' => true,
                    'message' => 'Category Updated Successfully'
                ]);
            }
        }

    }


    public function deleteCategory(Request $request,$id){
        $category = Categories::find($id);
        if(!$category){
            return response()->json([
                'success' => false,
                'message' => 'Invalid category ID'
            ]);
        }

        $isDelete =  $category->update(['status' => '2']);
        if($isDelete){
            return response()->json([
                'success' => true,
                'message' => 'Category Deleted Successfully'
            ]);
        }
    }

}
