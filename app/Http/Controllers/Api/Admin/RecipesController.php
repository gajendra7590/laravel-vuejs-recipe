<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;
use Webpatser\Uuid\Uuid;

use App\models\Recipes;
use App\models\RecipeTags;
use App\models\RecipeTagsSelected;
use App\models\RecipeNutritions;
use App\models\RecipeIngredients;
use App\models\RecipeImages;
use App\models\RecipeSteps;


class RecipesController extends Controller
{
    /**
     * Get All Recipes
     */
    public function getRecipes(Request $request)
    {
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
        ->select('id','category_id','user_id','title','photo','prepairation_time','cooking_time','serving_peoples','is_slider','status')
        ->orderBy($sort,$direction)
        ->offset($offset)
        ->orWhere('title', 'LIKE', '%'.$search.'%') 
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
                ->orWhere('title', 'LIKE', '%'.$search.'%') 
                ->count();
    }

    /**
     * Edit Recipes
     */
    public function editRecipes(Request $request,$id)
    {
        return Recipes::with([  
            'nutritions'=> function($model){ $model->select('id','recipe_id','nutrition_name','nutrition_value'); },
            'ingredients' => function($model){ $model->select('id','recipe_id','name'); },
            'directions' => function($model){ $model->select('id','recipe_id','time','description'); },
            'selectedTags' => function($model){ $model->select('id','recipe_id','tag_id'); },
        ])
        ->where(['id' => $id])
        ->get()
        ->first();
    }

    /**
     * Create Recipes
     */
    public function createRecipes(Request $request)
    {
        $post = $request->all();
       // print_r($post);die;

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
            'recipe_nutritions.*.nutrition_value' => 'required',
            'recipe_directions' => 'required|array|min:1',
            'recipe_directions.*.time' => 'required|numeric',
            'recipe_directions.*.description' => 'required'
        ],[
            'tags.*' => 'Please select recipe tag',
            'category_id.required' => 'Category field is required',
            'recipe_ingredients.*.name.required' => 'Ingredient name field is required',
            'recipe_nutritions.*.nutrition_name.required' => 'Nutrition name field is required',
            'recipe_nutritions.*.nutrition_value.required' => 'Nutrition value field is required',
            'recipe_directions.*.time.required' => 'Direction time field is required',
            'recipe_directions.*.time.numeric' => 'Direction time field has invalid time',
            'recipe_directions.*.description.required' => 'Direction description is required',

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

                //Save Directions
                if( isset($post['recipe_directions']) && count($post['recipe_directions']) > 0){
                    foreach ($post['recipe_ingredients'] as $ingredient){
                        $recStepModel = new RecipeSteps();
                        $recStepModel->recipe_id = $last_id;
                        $recStepModel->time = $ingredient['time'];
                        $recStepModel->description =  $ingredient['description'];
                        $recStepModel->save();
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

    /**
     * Update Recipes
     */
    public function updateRecipes(Request $request,$id){
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
            'recipe_nutritions.*.nutrition_value' => 'required',
            'recipe_directions' => 'required|array|min:1',
            'recipe_directions.*.time' => 'required|numeric',
            'recipe_directions.*.description' => 'required'
        ],[
            'tags.*' => 'Please select recipe tag',
            'category_id.required' => 'Category field is required',
            'recipe_ingredients.*.name.required' => 'Ingredient name field is required',
            'recipe_nutritions.*.nutrition_name.required' => 'Nutrition name field is required',
            'recipe_nutritions.*.nutrition_value.required' => 'Nutrition value field is required',
            'recipe_directions.*.time.required' => 'Direction time field is required',
            'recipe_directions.*.time.numeric' => 'Direction time field has invalid time',
            'recipe_directions.*.description.required' => 'Direction description is required',
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

                //Save Directions
                if( isset($post['recipe_directions']) && count($post['recipe_directions']) > 0){
                    foreach ($post['recipe_directions'] as $direction){

                        if( isset($direction['id']) && ($direction['id'] > 0)){ //Update & Delete Case
                            $recDirModel = RecipeSteps::find($direction['id']);
                            if( isset($direction['is_deleted']) && ($direction['is_deleted'] == '1') ){
                                $recDirModel->delete();
                            }else{
                                $recDirModel->time =  $direction['time'];
                                $recDirModel->description =  $direction['description'];
                                $recDirModel->save();
                            }
                        }else{  //Insert New Case
                            $recDirModel = new RecipeSteps();
                            $recDirModel->recipe_id = $last_id;
                            $recDirModel->time =  $direction['time'];
                            $recDirModel->description =  $direction['description'];
                            $recDirModel->save();
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

    /**
     * Delete Recipes
     */
    public function deleteRecipes($id){
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
