<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 


//Categories API ROUTES
Route::get('categories/getCategories', array('as' => 'categories', 'uses' => 'CategoriesController@getCategories')); 
Route::get('categories/getCategories/{id}', array('as' => 'categories', 'uses' => 'CategoriesController@getCategory')); 
Route::post('categories/create', array('as' => 'categories', 'uses' => 'CategoriesController@save')); 
Route::post('categories/update/{id}', array('as' => 'categories', 'uses' => 'CategoriesController@update')); 
Route::delete('categories/delete/{id}', array('as' => 'categories', 'uses' => 'CategoriesController@delete'));


//Recipes API ROUTES
Route::get('recipes/getRecipes', array('as' => 'recipes', 'uses' => 'RecipesController@getRecipes'));
Route::get('recipes/getRecipe/{id}', array('as' => 'recipes', 'uses' => 'RecipesController@getRecipe'));
Route::post('recipes/create', array('as' => 'recipes', 'uses' => 'RecipesController@save'));
Route::post('recipes/update/{id}', array('as' => 'recipes', 'uses' => 'RecipesController@update'));
Route::delete('recipes/delete/{id}', array('as' => 'recipes', 'uses' => 'RecipesController@delete'));

