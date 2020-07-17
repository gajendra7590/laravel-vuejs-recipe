<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;
use Webpatser\Uuid\Uuid;

use App\models\Recipes;
use App\models\RecipeNutritions;
use App\models\RecipeIngredients;
use App\models\RecipeImages;


class RecipesController extends Controller
{

    public function getRecipes(Request $request)
    {
        return Recipes::with([
            'user' => function($model){ $model->select('id','first_name','last_name','display_name','email','photo'); },
            'category' => function($model){ $model->select('id','name','slug','description','photo'); },
        ])->get()->all();
    }

    public function getRecipe(Request $request,$id)
    {
        return Recipes::with([
            'user' => function($model){ $model->select('id','first_name','last_name','display_name','email','photo'); },
            'category' => function($model){ $model->select('id','name','slug','description','photo'); },
            'nutritions',
            'ingredients'
        ])->where(['id' => $id])->get()->all();
    }


    public function createRecipe(Request $request)
    {
        $post = $request->all();
        $validator = Validator::make($post, array(
            'category_id' => 'required',
            'title' => 'required|unique:recipes',
            'description' => 'required',
            'prepairation_time' => 'required',
            'recipe_image' => 'required|image|mimes:jpg,jpeg,png',
            'cooking_time' => 'required',
            'serving_peoples' => 'required',
            'recipe_nutritions' => 'required|array|min:1',
            'recipe_nutritions.*.name' => 'required',
            'recipe_nutritions.*.value' => 'required',
            'recipe_ingredients' => 'required|array|min:1',
            'recipe_ingredients.*.name' => 'required',
            'recipe_ingredients.*.value' => 'required'
        ));

        //echo '<pre>';print_r($post);die;

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'message' => 'Incorrect form data',
                'errors' => $errors
            ]);
        }else{

            $recipe = new Recipes();
            $slug = slugCreator($post['title']);

            $recipe->category_id = $post['category_id'];
            $recipe->user_id = Auth::user()->id;
            $recipe->title = $post['title'];
            $recipe->slug = $slug;
            $recipe->description = $post['description'];
            $recipe->prepairation_time = $post['prepairation_time'];
            $recipe->cooking_time = $post['cooking_time'];
            $recipe->serving_peoples = $post['serving_peoples'];
            $recipe->photo = NULL;

            //Upload Images
            if ($request->hasFile('recipe_image')) {
                $imageName = Uuid::generate().'.'.$request->recipe_image->getClientOriginalExtension();
                $is_uploaded = $request->recipe_image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $recipe->photo = $imageName;
                }
            }

            $save = $recipe->save();
            if($save){
                $last_id = $recipe->id;
                //Save Ingredients
                if( isset($post['recipe_ingredients']) && count($post['recipe_ingredients']) > 0){
                    foreach ($post['recipe_ingredients'] as $ingredient){
                        $IngModel = new RecipeIngredients();
                        $IngModel->recipe_id = $last_id;
                        $IngModel->ingredient_name =  $ingredient['name'];
                        $IngModel->ingredient_value =  $ingredient['value'];
                        $IngModel->save();
                    }
                }

                //Save Nutritions
                if( isset($post['recipe_nutritions']) && count($post['recipe_nutritions']) > 0){
                    foreach ($post['recipe_nutritions'] as $nutrition){
                        $NutModel = new RecipeNutritions();
                        $NutModel->recipe_id = $last_id;
                        $NutModel->nutrition_name =  $nutrition['name'];
                        $NutModel->nutrition_value =  $nutrition['value'];
                        $NutModel->save();
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Recipe added successfully'
                ]);
            }
        }
    }

    public function updateRecipe(Request $request,$id){
        $recipeModel = Recipes::find($id);
        if(!$recipeModel){
            return response()->json([
                'success' => false,
                'message' => 'Invalid Recipe ID'
            ]);
        }


        $post = $request->all();
        $validator = Validator::make($post, array(
            'category_id' => 'required',
            'title' => "required|unique:recipes,title,{$id}",
            'description' => 'required',
            'prepairation_time' => 'required',
            'cooking_time' => 'required',
            'serving_peoples' => 'required',
            'recipe_image' => 'image|mimes:jpg,jpeg,png',
            'recipe_nutritions' => 'required|array|min:1',
            'recipe_nutritions.*.name' => 'required',
            'recipe_nutritions.*.value' => 'required',
            'recipe_ingredients' => 'required|array|min:1',
            'recipe_ingredients.*.name' => 'required',
            'recipe_ingredients.*.value' => 'required'
        ));

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'message '=> 'Incorrect form data',
                'errors' => $errors
            ]);
        }else{
            $slug = strtolower($post['title']);
            $slug = preg_replace('/\s+/', '-',$slug);
            $recipeModel->category_id = $post['category_id'];
            $recipeModel->title = $post['title'];
            $recipeModel->slug = $slug;
            $recipeModel->description = $post['description'];
            $recipeModel->prepairation_time = $post['prepairation_time'];
            $recipeModel->cooking_time = $post['cooking_time'];
            $recipeModel->serving_peoples = $post['serving_peoples'];

            //Upload Images
            if ($request->hasFile('recipe_image')) {
                $imageName = Uuid::generate().'.'.$request->recipe_image->getClientOriginalExtension();
                $is_uploaded = $request->recipe_image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $recipeModel->photo = $imageName;
                }
            }
            $save = $recipeModel->save();
            if($save){

                $last_id = $recipeModel->id;
                //Save Ingredients
                if( isset($post['recipe_ingredients']) && count($post['recipe_ingredients']) > 0){
                    foreach ($post['recipe_ingredients'] as $ingredient){

                        if( isset($ingredient['id']) && ($ingredient['id'] > 0)){ //Update & Delete Case
                            $ingredientModel = RecipeIngredients::find($ingredient['id']);
                            if( isset($ingredient['is_deleted']) && ($ingredient['is_deleted'] =='1') ){
                                $ingredientModel->delete();
                            }else{
                                $ingredientModel->ingredient_name =  $ingredient['name'];
                                $ingredientModel->ingredient_value =  $ingredient['value'];
                                $ingredientModel->save();
                            }
                        }else{  //Insert New Case
                            $IngModel = new RecipeIngredients();
                            $IngModel->recipe_id = $last_id;
                            $IngModel->ingredient_name =  $ingredient['name'];
                            $IngModel->ingredient_value =  $ingredient['value'];
                            $IngModel->save();
                        }

                    }
                }

                //Save Nutritions
                if( isset($post['recipe_nutritions']) && count($post['recipe_nutritions']) > 0){
                    foreach ($post['recipe_nutritions'] as $nutrition){

                        if( isset($ingredient['id']) && ($ingredient['id'] > 0)){ //Update & Delete Case
                            $nutModel = RecipeNutritions::find($ingredient['id']);
                            if( isset($ingredient['is_deleted']) && ($ingredient['is_deleted'] =='1') ){
                                $nutModel->delete();
                            }else{
                                $nutModel->nutrition_name =  $ingredient['name'];
                                $nutModel->nutrition_value =  $ingredient['value'];
                                $nutModel->save();
                            }
                        }else{  //Insert New Case
                            $nutModel = new RecipeNutritions();
                            $nutModel->recipe_id = $last_id;
                            $nutModel->nutrition_name =  $nutrition['name'];
                            $nutModel->nutrition_value =  $nutrition['value'];
                            $nutModel->save();
                        }
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Recipe detail updated successfully'
                ]);
            }
        }

    }

    public function deleteRecipe($id){
        $recipeModel = Recipes::find($id);
        if(!$recipeModel){
            return response()->json([
                'success' => false,
                'message' => 'Opps! this recipe not found( Invalid ID )'
            ]);
        }

        $update = $recipeModel->update(['status' => '2']);
        if($update){
            return response()->json([
                'success' => true,
                'message' => 'Recipe deleted successfully'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Opps! error in delete this recipe.'
            ]);
        }
    }
}
