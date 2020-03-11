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

