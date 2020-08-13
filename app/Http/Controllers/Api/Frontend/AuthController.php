<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

//Models
use App\User;

class AuthController extends Controller
{

    //Function for Common Login Admin
    public function login(Request $request){
            $credentials = $request->only('email', 'password'); 
            $post = $request->all();
            $validator = Validator::make($credentials,[
                'email' => ['required','email'],
                'password' => ['required'],
            ]);
            if($validator->fails()){
                $allMessages = $validator->messages();
                $result = errorArrayCreate($allMessages);
                return response()->json([
                    'status'=>false,
                    'message'=>'Please fill proper form values',
                    'errors' => $result
                ]);
            }else{ //If Validation success
                $user = User::role(['author','user'])->where(['email' => $credentials['email']])->get()->first();
                if(!$user){
                    return response()->json([
                        'status' => false,
                        'message' => 'Sorry this '.$credentials['email'].' email is not associated with any user',
                        'errors' => [
                            'email' => 'Sorry this '.$credentials['email'].' email is not associated with any user'
                        ]
                    ]);
                }

                if ( ($user) && $user->status != '1' ){
                    return response()->json([
                        'status' => false,
                        'message' => 'Your account is not Activated',
                        'errors' => [
                            'email' => 'Your account is not Activated'
                        ]
                    ]);
                }

                if (Auth::attempt($credentials)) {
                    $user = $request->user();
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    if ($request->remember_me)
                        $token->expires_at = Carbon::now()->addWeeks(1);
                    $token->save();
                    return response()->json([
                        'status'=>true,
                        'message'=>'You have logged in successfully',
                        'current_user' => [
                            'id' => auth()->user()->id,
                            'first_name' => auth()->user()->first_name,
                            'last_name' => auth()->user()->last_name, 
                            'display_name' => auth()->user()->display_name,
                            'email' => auth()->user()->email,
                            'photo' => auth()->user()->photo,
                            'role' => auth()->user()->userRoleName,
                        ],
                        'role' => auth()->user()->userRoleName,
                        'token'=>[
                            'access_token' => $tokenResult->accessToken,
                            'token_type' => 'Bearer',
                            'expires_at' => Carbon::parse(
                                $tokenResult->token->expires_at
                            )->toDateTimeString()
                        ],
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid Email and Password combination',
                        'errors' => [
                            'email' => 'Invalid Email and Password combination'
                        ]
                    ]);
                }

            }
    }

    //Function For Send reset Password Link
    public function register(Request $request)
    {
        $post = $request->only('first_name','last_name','email','user_role','password');
        $validator = Validator::make($post, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:recipe_users',
            'user_role' => 'required',
            'password' => 'required',
        ));
        if ($validator->fails()) {
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status' => false,
                'message' => 'Please correct form values',
                'errors' => $result
            ]);
        } else {
            $role = (in_array($post['user_role'],['user','author']))?$post['user_role']:'user';
            unset($post['user_role']);
            $post['password'] = Hash::make($post['password']);

            $token = Str::random(40);
            $post['reset_token'] = $token;
            $post['reset_token_at'] = date('Y-m-d h:i:s');

            $user = new User();
            $userModel = $user->create($post);
            if($userModel){
                User::find($userModel->id)->assignRole($role);
                $email = emailSend('verify-email',$userModel->email,[
                    'subject' => 'Recipe - Verify Your Account',
                    'display_name' => ucwords($userModel->display_name),
                    'email' => $userModel->email,
                    'message' => 'Verify Your Account',
                    'token' => $token
                ]);
                return response()->json([
                    'status' => true,
                    'message'=>'Your account has been created successfully'
                ]);
            }
        }
    }
     
    //Function For Send reset Password Link
    public function sendResetPasswordLink(Request $request){ 
        $post = $request->all();
        $validator = Validator::make($request->all(),[
            'email' => ['required','email']
        ]);
        if($validator->fails()){
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $result
            ]);
        }else{ //If Validation success

            $user = User::role(['user','author'])->where(['email' => $post['email']])->get()->first();
            if(!$user){
                return response()->json([
                    'status' => false,
                    'message' => 'Sorry this '.$post['email'].' email is not associated with any user',
                    'errors' => [
                        'email' => 'Sorry this '.$post['email'].' email is not associated with any user'
                    ]
                ]);
            }

            if ( ($user) && $user->status != '1' ){
                return response()->json([
                    'status' => false,
                    'message' => 'Your account is freezed/not activated',
                    'errors' => [
                        'email' => 'Your account is freezed/not activated'
                    ]
                ]);
            }

            $token = Str::random(40);
            $user->reset_token = $token;
            $user->reset_token_at = date('Y-m-d h:i:s');
            $user->save();
            //Email Send
            $email = emailSend('reset-password',$user->email,[
                'subject' => 'Recipe - Reset Account Password',
                'display_name' => ucwords($user->display_name),
                'email' => $user->email,
                'message' => 'Reset Account Password',
                'token' => $token
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Reset password link sent successfully,Please check email,for reset password link',
                'errors' => ''
            ]);

        }
    }

    public function verifyEmail(Request $request){
        $post = $request->all();
        $validator = Validator::make($request->all(),[
            'token' => ['required']
        ]);
        if($validator->fails()){
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $result
            ]);
        }else{ //If Validation success
            $model = User::where(['reset_token' => $post['token']])->get()->first();
            if(!$model){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid token',
                    'errors' => '',
                ]);
            } else {
                $model->update(['status' => '1','reset_token' => null,'reset_token_at' => null,'email_verified_at' => date('Y-m-d h:i:s')]);
                //Auto Login Code
                $tokenResult = $model->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                return response()->json([
                    'status'=>true,
                    'message'=>'You have logged in successfully',
                    'current_user' => [
                        'id' => $token->id,
                        'first_name' => $model->first_name,
                        'last_name' => $model->last_name,
                        'display_name' => $model->display_name,
                        'email' => $model->email,
                        'photo' => $model->photo,
                        'role' => $model->userRoleName,
                    ],
                    'role' => $model->userRoleName,
                    'token'=>[
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer',
                        'expires_at' => Carbon::parse(
                            $tokenResult->token->expires_at
                        )->toDateTimeString()
                    ],
                ]);
            }

        }
    }

    public function verifyTokenStatus(Request $request){
        $post = $request->all();
        $validator = Validator::make($request->all(),[
            'token' => ['required']
        ]);
        if($validator->fails()){
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $result
            ]);
        }else{ //If Validation success
            $model = User::where(['reset_token' => $post['token']])->get()->first();
            if(!$model){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid token',
                    'errors' => '',
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'active',
                    'errors' => '',
                ]);
            }

        }
    }

    //Function For Reset Password Save New Password
    public function ResetPasswordSetNew(Request $request){
        $post = $request->all();
        $validator = Validator::make($request->all(),[
            'token' => ['required'],
            'newPassword' => ['required']  
        ]);
        if($validator->fails()){
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $result
            ]);
        }else{ //If Validation success

            $model = User::where(['reset_token' => $post['token']])->get()->first();
            if(!$model){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid password reset token',
                    'errors' => '',
                ]);
            }

            $userModel = User::role(['author','user'])->where([
                'id' => $model->id
            ])->get()->first();

            if($userModel){
                $userModel->password = Hash::make($post['newPassword']);
                if($userModel->save()){
                    $userModel->reset_token = null;
                    $userModel->reset_token_at = null;
                    $userModel->save();
                    return response()->json([
                        'status' => true,
                        'message' => 'New password saved successfully', 
                        'errors' => ''
                    ]);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid token',
                    'errors' => [
                        'newPassword' => 'Opps! your are not authorised to change password'
                    ]
                ]);
            }  
        } 
    }

    //Function For Common Logout & Delete Token
    public function logout(Request $request){ 
        if (Auth::check()) {
            $token = Auth::user()->token();
            $token->delete(); 
            return response()->json([
                'status' => true,
                'message' => 'You have been logged out successfully'
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'You already been signout'
            ]);
        }
    }

    //Function for logged out from all other
    public function logoutAll(Request $request){
        if (Auth::check()) {
            $token = Auth::user()->token();
            $deleteCount = DB::table('oauth_access_tokens')
                ->where('id', '!=', $token->id)
                ->delete();
            if($deleteCount == 0){

                return response()->json([
                    'status' => true,
                    'message' => 'You have no other active session to logged out'
                ]);

            }else{

                return response()->json([
                    'status' => true,
                    'message' => 'We have logged out '.$deleteCount.' active session'
                ]);
            }
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'You already been signout'
            ]);
        }
    }

} //Main Class Closed Here
