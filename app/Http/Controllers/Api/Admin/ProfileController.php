<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;

use DataTables;
use Validator;
use Carbon\Carbon;

//Models
use App\User;

class ProfileController extends Controller
{

    /**
     * @param Request $request
     * @return array
     */
    public function getProfile(Request $request){
        return User::find( Auth::user()->id);
    }

     /**
     * @param Request $request
     * @return array
     */
    public function loggedProfile(Request $request){
        return array(
            'id' => auth()->user()->id,
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name, 
            'display_name' => auth()->user()->display_name,
            'email' => auth()->user()->email,
            'photo_url' => auth()->user()->photo_url,
            'photo' => auth()->user()->photo,
            'role' => auth()->user()->userRoleName
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProfile(Request $request){
        $post = $request->all();
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(),[
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email','unique:recipe_users,email,'.$id],
            'status' => ['required'],
            'phone' => 'nullable|numeric|digits:10',
            'zip' => 'nullable|numeric|digits:5',
        ]);

        if($validator->fails()) { 
            $result = errorArrayCreate( $validator->messages() );
            return response()->json([
                'status' => false,
                'message' => 'Please fill correct form value',
                'errors' => $result
            ]);
        }else{
            if ($request->hasFile('image')) {
                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $post['photo'] = $imageName;
                }
            }
            $id = Auth::user()->id;
            $model = User::where(['id' => $id])->get()->first();
            $update = $model->update($post);
            if($update){
                return response()->json([
                    'status' => true,
                    'message' => 'Profile detail updated successfully',
                    'errors' => null,
                    'redirect' => ''
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Error in update profile',
                    'errors' => null,
                    'redirect' => ''
                ]);
            }
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword(Request $request){
        $data = $request->only(['old_password','new_password','new_password_confirmation']);
        $validator = Validator::make($data,[
            'old_password' => ['required','min:6', new MatchOldPassword],
            'new_password' => ['required','min:6','confirmed'],
            'new_password_confirmation' => ['required','min:6']
        ],['confirmed' => 'New password & confirm new password does not match']);

        if($validator->fails()) {
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status' => false,
                'message' => 'Please fill correct form value',
                'errors' => $result
            ]);
        }else{

            $id = Auth::user()->id;
            $model = User::where(['id' => $id])->get()->first();
            $update = $model->update(['password'=> Hash::make($request->new_password_confirmation)]);
            if($update){
                return response()->json([
                    'status' => true,
                    'message' => 'Password changed successfully',
                    'errors' => null,
                    'redirect' => ''
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Error in update profile',
                    'errors' => null
                ]);
            }

        }
    }


}
