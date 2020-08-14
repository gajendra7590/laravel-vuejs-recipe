<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;
use App\Rules\MatchOldPassword;

//Models
use App\User;
use App\models\Recipes;
use App\models\RecipeTagsSelected;
use App\models\RecipeIngredients;
use App\models\RecipeNutritions;

class AccountController extends Controller
{
    /*
    * Get User Profile
    */
    public function getProfile(Request $request) {
        return array(
            'id' => auth()->user()->id,
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name,
            'display_name' => auth()->user()->display_name,
            'email' => auth()->user()->email,
            'photo_url' => auth()->user()->photo_url,
            'photo' => auth()->user()->photo,
            'phone' => auth()->user()->phone,
            'address_line_one' => auth()->user()->address_line_one,
            'address_line_two' => auth()->user()->address_line_two,
            'city' => auth()->user()->city,
            'state' => auth()->user()->state,
            'country' => auth()->user()->country,
            'zip' => auth()->user()->zip,
            'website_url' => auth()->user()->website_url,
            'youtube_url' => auth()->user()->youtube_url,
            'facebook_url' => auth()->user()->facebook_url,
            'twitter_url' => auth()->user()->twitter_url,
            'linkedin_url' => auth()->user()->linkedin_url,
            'instagram_url' => auth()->user()->instagram_url,
            'pinterest_url' => auth()->user()->pinterest_url,
            'instagram_url' => auth()->user()->instagram_url,
            'about_me' => auth()->user()->about_me,
            'speciality' => auth()->user()->speciality,
            'role' => auth()->user()->userRoleName
        );
    }

    /*
   * Save User Profile
   */
    public function saveProfile(Request $request) {
        $user =  User::where(['id' => Auth::user()->id ])->get()->first();//->toArray();
        $post = $request->all();
        $validator = Validator::make($post, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email','unique:recipe_users,email,'.$user->id],
            'phone' => 'nullable|numeric|digits:10',
            'zip' => 'nullable|numeric|digits:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ));
        if($validator->fails()){
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status' => false,
                'message'=>'Please correct form values',
                'errors' => $result
            ]);
        }else { //If Validation success

            if ($request->hasFile('image')) {
                $imageName = gen_uuid().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $post['photo'] = $imageName;
                }
            }

            $updated = $user->update($post);
            if($updated){
                return response()->json([
                    'status' => true,
                    'message'=>'Profile Updated Successfully'
                ]);
            }
            else {
                return response()->json([
                    'status' => false,
                    'message'=>'Opps! Getting Server Error While Saving Data'
                ]);
            }
        }
    }

    /*
  * Change User Password
  */
   public function changePassword(Request $request){
        $data = $request->only(['old_password','new_password','new_password_confirmation']);
       // echo '<pre>';print_r($data);die;
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

    /*
   * Get Authors Recipe
   */
    public function getAuthorsRecipes(Request $request){
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5;
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);
        $sort = (isset($params['sort']))?$params['sort']:'created_at';
        $direction = (isset($params['direction']))?$params['direction']:'desc';
        $search = (isset($params['search']))?$params['search']:'';
        $recipes = Recipes::with([
            'user' => function($model){ $model->select('id','display_name'); },
            'category' => function($model){ $model->select('id','name'); },
        ])
        ->select('id','category_id','user_id','title','slug','photo','prepairation_time','cooking_time','serving_peoples','is_slider','status','updated_at')
        ->where(['user_id' => Auth::user()->id,'status' => '1'])
        //->orWhere('title', 'LIKE', '%'.$search.'%')
        ->orderBy($sort,$direction)
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->all();

        return [
            'total' => $this->getRecipesCount($request),
            'data' => $recipes
        ];
    }

    private function getRecipesCount(Request $request) {
        $params = $request->all();
        $search = (isset($params['search']))?$params['search']:'';
        return Recipes::select('*')
            ->where(['user_id' => Auth::user()->id])
           // ->orWhere('title', 'LIKE', '%'.$search.'%')
            ->count();
    }

    /*
    * Edit Author Recipe
    */
    public function editAuthorsRecipe(Request $request,$id){
        return Recipes::with([
            'nutritions'=> function($model){ $model->select('id','recipe_id','nutrition_name','nutrition_value'); },
            'ingredients' => function($model){ $model->select('id','recipe_id','name'); },
            'selectedTags' => function($model){ $model->select('id','recipe_id','tag_id'); },
        ])
        ->where(['id' => $id,'user_id' => Auth::user()->id])
        ->get()
        ->first();
    }

    /*
    * Create New Authors Recipe
    */
    public function createAuthorsRecipe(Request $request){
        $post = $request->all();
        $validator = Validator::make($post,[
            'category_id' => 'required',
            'title' => 'required|unique:recipes',
            'short_desc' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'prepairation_time' => 'required|numeric',
            'cooking_time' => 'required|numeric',
            'serving_peoples' => 'required|numeric',
            'recipe_ingredients' => 'required|array|min:1',
            'tags' => 'required|array|min:1',
            'recipe_ingredients.*.name' => 'required',
            'recipe_nutritions' => 'required|array|min:1',
            'recipe_nutritions.*.nutrition_name' => 'required',
            'recipe_nutritions.*.nutrition_value' => 'required'
        ],[
            'tags.*' => 'Please select recipe tag',
            'category_id.required' => 'Category field is required',
            'recipe_ingredients.*.name.required' => 'Ingredient name field is required',
            'recipe_nutritions.*.nutrition_name.required' => 'Nutrition name field is required',
            'recipe_nutritions.*.nutrition_value.required' => 'Nutrition value field is required'
        ]);

        if ($validator->fails()) {
            $result = errorArrayCreate( $validator->messages() );
            return response()->json([
                'status' => false,
                'message' => 'Incorrect form data',
                'errors' => $result
            ]);
        }else{

            $recipe = new Recipes();
            $slug = slugCreator($post['title']);
            $recipe->category_id = $post['category_id'];
            $recipe->user_id = Auth::user()->id;
            $recipe->title = $post['title'];
            $recipe->short_desc = $post['short_desc'];
            $recipe->slug = $slug;
            $recipe->description = $post['description'];
            $recipe->prepairation_time = $post['prepairation_time'];
            $recipe->cooking_time = $post['cooking_time'];
            $recipe->serving_peoples = $post['serving_peoples'];
            $recipe->photo = NULL;
            $recipe->is_slider = isset($post['is_slider'])?$post['is_slider']:0;
            $recipe->status = $post['status'];
            //Upload Images
            if ($request->hasFile('image')) {
                $imageName = Uuid::generate().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $recipe->photo = $imageName;
                }
            }

            $save = $recipe->save();
            if($save){
                $last_id = $recipe->id;

                //Save Recipe Tags
                if( isset($post['tags']) && count($post['tags']) > 0){
                    foreach ($post['tags'] as $tag){
                        $tagModel = new RecipeTagsSelected();
                        $tagModel->recipe_id = $last_id;
                        $tagModel->tag_id =  $tag;
                        $tagModel->status = '1';
                        $tagModel->save();
                    }
                }

                //Save Ingredients
                if( isset($post['recipe_ingredients']) && count($post['recipe_ingredients']) > 0){
                    foreach ($post['recipe_ingredients'] as $ingredient){
                        $IngModel = new RecipeIngredients();
                        $IngModel->recipe_id = $last_id;
                        $IngModel->name =  $ingredient['name'];
                        $IngModel->save();
                    }
                }

                //Save Nutritions
                if( isset($post['recipe_nutritions']) && count($post['recipe_nutritions']) > 0){
                    foreach ($post['recipe_nutritions'] as $nutrition){
                        $NutModel = new RecipeNutritions();
                        $NutModel->recipe_id = $last_id;
                        $NutModel->nutrition_name =  $nutrition['nutrition_name'];
                        $NutModel->nutrition_value =  $nutrition['nutrition_value'];
                        $NutModel->save();
                    }
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Recipe added successfully'
                ]);
            }
        }
    }

    /*
    * Update Authors Recipe
    */
    public function updateAuthorsRecipe(Request $request,$id){
        $recipeModel = Recipes::find($id);
        if(!$recipeModel){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Recipe ID'
            ]);
        }

        $post = $request->all();
        $validator = Validator::make($post,[
            'category_id' => 'required',
            'title' => "required|unique:recipes,title,{$id}",
            'short_desc' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
            'prepairation_time' => 'required|numeric',
            'cooking_time' => 'required|numeric',
            'serving_peoples' => 'required|numeric',
            'tags' => 'required|array|min:1',
            'recipe_ingredients' => 'required|array|min:1',
            'recipe_ingredients.*.name' => 'required',
            'recipe_nutritions' => 'required|array|min:1',
            'recipe_nutritions.*.nutrition_name' => 'required',
            'recipe_nutritions.*.nutrition_value' => 'required'
        ],[
            'tags.*' => 'Please select recipe tag',
            'category_id.required' => 'Category field is required',
            'recipe_ingredients.*.name.required' => 'Ingredient name field is required',
            'recipe_nutritions.*.nutrition_name.required' => 'Nutrition name field is required',
            'recipe_nutritions.*.nutrition_value.required' => 'Nutrition value field is required'
        ]);

        if ($validator->fails()) {
            $result = errorArrayCreate( $validator->messages() );
            return response()->json([
                'status' => false,
                'message '=> 'Incorrect form data',
                'errors' => $result
            ]);
        }else{
            $slug = slugCreator($post['title']);
            $recipeModel->category_id = $post['category_id'];
            $recipeModel->title = $post['title'];
            $recipeModel->short_desc = $post['short_desc'];
            $recipeModel->slug = $slug;
            $recipeModel->description = $post['description'];
            $recipeModel->prepairation_time = $post['prepairation_time'];
            $recipeModel->cooking_time = $post['cooking_time'];
            $recipeModel->serving_peoples = $post['serving_peoples'];
            $recipeModel->is_slider = isset($post['is_slider'])?$post['is_slider']:0;
            $recipeModel->status = $post['status'];

            //Upload Images
            if ($request->hasFile('image')) {
                $imageName = Uuid::generate().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $recipeModel->photo = $imageName;
                }
            }
            $save = $recipeModel->save();
            if($save){
                $last_id = $recipeModel->id;
                //Save Recipe Tags
                if( isset($post['tags']) && count($post['tags']) > 0){
                    foreach ($post['tags'] as $tag){
                        $find = RecipeTagsSelected::where(['recipe_id' => $last_id,'tag_id' => $tag])->get()->first();
                        if(!$find){
                            $tagModel = new RecipeTagsSelected();
                            $tagModel->recipe_id = $last_id;
                            $tagModel->tag_id =  $tag;
                            $tagModel->status = '1';
                            $tagModel->save();
                        }
                    }
                    //Delete If Any UnSelect
                    RecipeTagsSelected::where('recipe_id',$last_id)->whereNotIn('tag_id',$post['tags'])->delete();
                }

                //Save Ingredients
                if( isset($post['recipe_ingredients']) && count($post['recipe_ingredients']) > 0){
                    foreach ($post['recipe_ingredients'] as $ingredient){

                        if( isset($ingredient['id']) && ($ingredient['id'] > 0)){ //Update & Delete Case
                            $ingredientModel = RecipeIngredients::find($ingredient['id']);
                            if( isset($ingredient['is_deleted']) && ($ingredient['is_deleted'] == '1') ){
                                $ingredientModel->delete();
                            }else{
                                $ingredientModel->name =  $ingredient['name'];
                                $ingredientModel->save();
                            }
                        }else{  //Insert New Case
                            $IngModel = new RecipeIngredients();
                            $IngModel->recipe_id = $last_id;
                            $IngModel->name =  $ingredient['name'];
                            $IngModel->save();
                        }
                    }
                }

                //Save Nutritions
                if( isset($post['recipe_nutritions']) && count($post['recipe_nutritions']) > 0){
                    foreach ($post['recipe_nutritions'] as $nutrition){

                        if( isset($nutrition['id']) && ($nutrition['id'] > 0)){ //Update & Delete Case
                            $nutModel = RecipeNutritions::find($nutrition['id']);
                            if( (isset($nutrition['is_deleted'])) && ($nutrition['is_deleted'] == '1') ){
                                $nutModel->delete();
                            }else{
                                $nutModel->nutrition_name =  $nutrition['nutrition_name'];
                                $nutModel->nutrition_value = $nutrition['nutrition_value'];
                                $nutModel->save();
                            }
                        }else{  //Insert New Case
                            $nutModel = new RecipeNutritions();
                            $nutModel->recipe_id = $last_id;
                            $nutModel->nutrition_name =  $nutrition['nutrition_name'];
                            $nutModel->nutrition_value =  $nutrition['nutrition_value'];
                            $nutModel->save();
                        }
                    }
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Recipe detail updated successfully'
                ]);
            }
        }
    }

    /*
    * Delete Authors Recipe
    */
    public function deleteAuthorsRecipe(Request $request,$id){
        $recipeModel = Recipes::find($id);
        if(!$recipeModel){
            return response()->json([
                'status' => false,
                'message' => 'Opps! this recipe not found( Invalid ID )'
            ]);
        }

        $update = $recipeModel->update(['status' => '2']);
        if($update){
            return response()->json([
                'status' => true,
                'message' => 'Recipe deleted successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Opps! error in delete this recipe.'
            ]);
        }
    }
}
