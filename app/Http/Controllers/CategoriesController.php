<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\models\Categories;
use Validator;
use Webpatser\Uuid\Uuid;


class CategoriesController extends Controller
{

    /**
     * Get All Categories List
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories(Request $request){ 
        $result = Categories::all();
        if($result){
            $result = $result->toArray();
        }
        return response()->json(['success'=>true,'data'=>$result]);
    }


    /**
     * Get One Category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Request $request,$id){
        $result = Categories::where(['id'=>$id,'status'=>'1'])->first();

        if($result){
            $result = $result->toArray();
        }
        return response()->json(['success'=>true,'data'=>$result]);
    }


    /**
     * Create New Categories
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'name' => 'required|unique:categories',
            'desc' => 'required',
            'img' => 'required|image|mimes:jpg,jpeg,png'
        ));

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['success'=>false,'message'=>'Incorrect form data','errors'=>$errors]);
        }else{
            $category = new Categories();
            $category->name = $post['name'];
            $category->desc = $post['desc'];

            if ($request->hasFile('img')) {
                $imageName = Uuid::generate().'.'.$request->img->getClientOriginalExtension();
                $is_uploaded = $request->img->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $category->img = $imageName;
                }
            }

            $save = $category->save();
            if($save){
                return response()->json(['success'=>true,'message'=>'Category created successfully']);
            }
        }
    }

    /***
     * Update Categories
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'name' => "required|unique:categories,name,{$id}",
            'desc' => 'required',
            'img' => 'image|mimes:jpg,jpeg,png'
        ));

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['success'=>false,'message'=>'Incorrect form data','errors'=>$errors]);
        }else{
            $category = Categories::find($id);
            if(!$category){
                return response()->json(['success'=>false,'message'=>'Invalid category ID']);
            }

            $category->name = $post['name'];
            $category->desc = $post['desc'];

            if ($request->hasFile('img')) {
                $imageName = Uuid::generate().'.'.$request->img->getClientOriginalExtension();
                $is_uploaded = $request->img->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $category->img = $imageName;
                }
            }


            $save = $category->save();
            if($save){
                return response()->json(['success'=>true,'message'=>'Category Updated Successfully']);
            }
        }

    }


    public function delete(Request $request,$id){
        $category = Categories::find($id);
        if(!$category){
            return response()->json(['success'=>false,'message'=>'Invalid category ID']);
        }

        $isDelete =  $category->delete();
        if($isDelete){
            return response()->json(['success'=>true,'message'=>'Category Deleted Successfully']);
        }
    }

}
