<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//models
use App\User;

class AuthorsController extends Controller
{
    public function getAuthors(Request $request){ 
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5; 
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);

        $result = User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })
        ->where(function($q) use ($params) {
            $q->orWhere('first_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('last_name', 'LIKE', '%'.$params['search'].'%') 
            ->orWhere('display_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('email', 'LIKE', '%'.$params['search'].'%');
         }) 
        ->orderBy($params['sort'],$params['direction'])
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->all();   
        $count = $this->getAuthorsCount($request);
        return [
            'data' => $result,
            'total' => $count
        ]; 
    }

     /**
     * Get Clients Total Count
     */
    private function getAuthorsCount(Request $request){  
        $params = $request->all(); 
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })
        ->where(function($q) use ($params) {
            $q->orWhere('first_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('last_name', 'LIKE', '%'.$params['search'].'%') 
            ->orWhere('display_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('email', 'LIKE', '%'.$params['search'].'%');
         }) 
        ->get()
        ->count();  
    }

    /**
     * Edit Author
     */
    public function editAuthors(Request $request,$id) {
        $user = User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })->find($id);

        if(!$user){
            return [
                'status' => false,
                'message' => 'Invalid Author ID'
            ];
        } else {
            return $user;
        }
    }

    /**
     * Create Author
     */
    public function createAuthors(Request $request) {
        $post = $request->all();
        $validator = Validator::make($post, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:recipe_users',
            'phone' => 'nullable|numeric|digits:10',
            'zip' => 'nullable|numeric|digits:5',
            'password' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ));
        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json([
                'status'=>false,
                'message'=>'Incorrect form data',
                'errors'=> $errors
            ]);
        }else{
            $post['password'] = Hash::make($post['password']);
            if ($request->hasFile('image')) {
                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $post['photo'] = $imageName;
                }
            }
            $model = new User();
            $save = $model->create($post);
            if($save){

                User::find($save->id)->assignRole('author');
                return response()->json([
                    'status' => true,
                    'message'=>'Data saved successfully'
                ]);
            } else{
                return response()->json([
                    'status' => false,
                    'message'=>'Opps! Server error in save data'
                ]);
            }
        }
    }

    /**
     * Update Author
     * @param $id
     */
    public function updateAuthors(Request $request,$id){
        $model = User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })->find($id);
        if(!$model){
            return response()->json([
                'status' => false,
                'message'=>'Invalid Author ID'
            ]);
        }

        $post = $request->all();
        $validator = Validator::make($post, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email','unique:recipe_users,email,'.$id],
            'phone' => 'nullable|numeric|digits:10',
            'zip' => 'nullable|numeric|digits:5',
            'status' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ));
        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json([
                'status'=>false,
                'message'=>'Incorrect form data',
                'errors'=> $errors
            ]);
        }else{

            if( isset($post['password'])  && ($post['password']!='')) {
                $post['password'] = Hash::make($post['password']);
            } else {
                unset($post['password']);
            }

            if ($request->hasFile('image')) {
                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $post['photo'] = $imageName;
                }
            }
            $save = $model->update($post);
            if($save){
                return response()->json([
                    'status' => true,
                    'message'=>'Data updated successfully'
                ]);
            } else{
                return response()->json([
                    'status' => false,
                    'message'=>'Opps! Server error in save data'
                ]);
            }
        }

    }


    /**
     * Archieved Author
     * @param $id
     */
    public function deleteAuthors(Request $request,$id){
        $model = User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'author');
        })->find($id);
        if(!$model){
            return response()->json([
                'status' => false,
                'message'=>'Invalid Author ID'
            ]);
        }

        $save = $model->update(['status' => '2']);
        if($save){
            return response()->json([
                'status' => true,
                'message'=>'Data updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message'=>'Opps! Server error in save data'
            ]);
        }
    }
}
