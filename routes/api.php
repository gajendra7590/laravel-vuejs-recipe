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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// }); 

//All Routes For FrontEnd
Route::group(['namespace' => 'Api'], function () {


    //All FrontEnd Routes
    Route::group(['namespace' => 'Frontend','prefix' => '/'], function () {

        //Common Routes
        Route::get('followOnInstagram', 'CommonController@followOnInstagram');
        Route::get('latestsRecipes' ,'CommonController@latestsRecipes');
        Route::get('randomRecipes' ,'CommonController@randomRecipes');
        Route::get('featuredRecipes' ,'CommonController@featuredRecipes'); 
        Route::get('popularTags' ,'CommonController@popularTags');
        Route::get('getSidebarCategories' ,'CommonController@getSidebarCategories');



        //All Home Page
        Route::get('getHomeSlider', 'HomeController@getHomeSlider');
        Route::get('homeTrendingRecipe', 'HomeController@homeTrendingRecipe');
        Route::get('homeSection3In1', 'HomeController@homeSection3In1');
        Route::get('homeSidebarSection3In1', 'HomeController@homeSidebarSection3In1');

        //Categories Page
        Route::get('getCategories', 'CommonController@getCategories');

        //Recipe Page
        Route::get('recipesList' ,'RecipeController@recipesList');
        Route::get('recipesListByCategory/{slug}' ,'RecipeController@recipesListByCategory');
        Route::get('recipesListByTag/{slug}' ,'RecipeController@recipesListByTag');

        //Recipe Detail Page
        Route::get('recipeDetail/{slug}' ,'RecipeController@recipeDetail');

        //Authors Page
        Route::get('authorsList' ,'CommonController@authorsList');
        Route::get('authorsRecipe/{id}' ,'CommonController@authorsRecipe');
        Route::get('authorsDetail/{id}' ,'CommonController@authorsDetail');


    }); 


    //['middleware' => ['auth:api', 'role:artist']
    //All Admin End Routes
    Route::group(['namespace' => 'Admin','prefix' => '/admin'], function () {

        //Auth Routes
        Route::post('login', 'AuthController@login');
        Route::post('forgot-password', 'AuthController@sendResetPasswordLink');
        Route::post('forgot-password-save', 'AuthController@ResetPasswordSetNew');
        Route::post('resendAccountVerifyLink', 'AuthController@sendResetPasswordLink');
        Route::post('verifyTokenStatus', 'AuthController@verifyTokenStatus');


        //Admin All Routes Need Authentication
        Route::group(['middleware' => ['auth:api', 'role:admin']], function () {
            //Admin Profile
            Route::get('getProfile', 'ProfileController@getProfile');
            Route::get('loggedProfile', 'ProfileController@loggedProfile');
            Route::post('updateProfile', 'ProfileController@updateProfile');
            Route::post('changePassword', 'ProfileController@changePassword');
            Route::post('logout', 'AuthController@logout');
            Route::post('logoutAll', 'AuthController@logoutAll'); 
            Route::get('getDashboardData', 'CommonController@index');
            //Manage Recipes
            Route::get('getRecipes', 'RecipesController@getRecipes');
            Route::get('getRecipe/{id}','RecipesController@getRecipe');
            Route::post('createRecipe', 'RecipesController@createRecipe');
            Route::post('updateRecipe/{id}', 'RecipesController@updateRecipe');
            Route::delete('deleteRecipe/{id}', 'RecipesController@deleteRecipe');
            //Manage Recipes Categories
            Route::get('categories', 'CategoriesController@categories');
            Route::get('getCategories', 'CategoriesController@getCategories');
            Route::get('getCategory/{id}','CategoriesController@getCategory');
            Route::post('createCategory', 'CategoriesController@createCategory');
            Route::post('updateCategory/{id}', 'CategoriesController@updateCategory');
            Route::delete('deleteCategory/{id}', 'CategoriesController@deleteCategory');
            //Manage Recipes Tags
            Route::get('tags', 'TagsController@tags');
            Route::get('getTags', 'TagsController@getTags');
            Route::get('getTag/{id}','TagsController@getTag');
            Route::post('createTag', 'TagsController@createTag');
            Route::post('updateTag/{id}', 'TagsController@updateTag');
            Route::delete('deleteTag/{id}', 'TagsController@deleteTag');
            //Manage Blogs
            Route::get('getBlogs', 'BlogsController@getBlogs');
            Route::get('editBlog/{id}','BlogsController@editBlog');
            Route::post('createBlog', 'BlogsController@createBlog');
            Route::post('updateBlog/{id}', 'BlogsController@updateBlog');
            Route::delete('deleteBlog/{id}', 'BlogsController@deleteBlog');
            //Manage Blog Categories
            Route::get('blogCategories', 'BlogCategoriesController@blogCategories');
            Route::get('getBlogCategories', 'BlogCategoriesController@getBlogCategories');
            Route::get('getBlogCategory/{id}','BlogCategoriesController@getBlogCategory');
            Route::post('createBlogCategory', 'BlogCategoriesController@createBlogCategory');
            Route::post('updateBlogCategory/{id}', 'BlogCategoriesController@updateBlogCategory');
            Route::delete('deleteBlogCategory/{id}', 'BlogCategoriesController@deleteBlogCategory');
            //Manage Blog Tags
            Route::get('blogTags', 'BlogTagsController@blogTags');
            Route::get('getBlogTags', 'BlogTagsController@getBlogTags');
            Route::get('getBlogTag/{id}','BlogTagsController@getBlogTag');
            Route::post('createBlogTag', 'BlogTagsController@createBlogTag');
            Route::post('updateBlogTag/{id}', 'BlogTagsController@updateBlogTag');
            Route::delete('deleteBlogTag/{id}', 'BlogTagsController@deleteBlogTag');
            //Manage Clients
            Route::get('getClients', 'ClientsController@getClients');  
            Route::get('editClients/{id}', 'ClientsController@editClients');
            Route::post('createClients', 'ClientsController@createClients');
            Route::post('updateClients/{id}', 'ClientsController@updateClients');
            Route::delete('deleteClients/{id}', 'ClientsController@deleteClients');
            //Manage Authors
            Route::get('getAuthors', 'AuthorsController@getAuthors'); 
            Route::get('editAuthors/{id}', 'AuthorsController@editAuthors');
            Route::post('createAuthors', 'AuthorsController@createAuthors');
            Route::post('updateAuthors/{id}', 'AuthorsController@updateAuthors');
            Route::delete('deleteAuthors/{id}', 'AuthorsController@deleteAuthors');

        });

    });  
     

});


// //Recipes API ROUTES
// Route::get('recipes/getRecipes', array('as' => 'recipes', 'uses' => 'RecipesController@getRecipes'));
// Route::get('recipes/getRecipe/{id}', array('as' => 'recipes', 'uses' => 'RecipesController@getRecipe'));
// Route::post('recipes/create', array('as' => 'recipes', 'uses' => 'RecipesController@save'));
// Route::post('recipes/update/{id}', array('as' => 'recipes', 'uses' => 'RecipesController@update'));
// Route::delete('recipes/delete/{id}', array('as' => 'recipes', 'uses' => 'RecipesController@delete'));

