<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;

//models
use App\models\CompanyDetail;


class CompanyDetailController extends Controller
{
    /*
     * Function for Get company Detail
     */
    public function getCompanyDetail(Request $request){
        return CompanyDetail::get()->first();
    }

    /*
     * Function Save Comapny Detail
     */
    public function saveCompanyDetail(Request $request){
        $post = $request->all();
        $validator = Validator::make($post, array(
            'company_name' => 'required',
            'company_contact' => 'required',
            'company_email' => 'required|email',
            'address_line_one' => 'required',
            'address_line_two' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'about' => 'required',
            'company_logo' => 'image|mimes:jpg,jpeg,png'
        ));
        if ($validator->fails()) {
            $errors = errorArrayCreate( $validator->errors() );
            return response()->json([
                'status'=>false,
                'message'=>'Incorrect form data',
                'errors'=> $errors
            ]);
        }else{
            //Upload Images
            if ($request->hasFile('image')) {
                $imageName = Uuid::generate().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $post['company_logo'] = $imageName;
                }
            }
            $id = ( isset($post['id']) && ($post['id']>0) ) ? intval($post['id']):0;
            unset($post['id']);
            $model = CompanyDetail::find($id);
            if(!$model) {
                $model = new CompanyDetail();
                $model->create($post);
                return response()->json([
                    'status' => true,
                    'message' => 'Company Detail Saved Successfully.'
                ]);
            } else {
                $model->update($post);
                return response()->json([
                    'status' => true,
                    'message' => 'Company Detail Updated Successfully.'
                ]);
            }
        }

    }

}
