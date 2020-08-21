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
        //Auth
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('forgot-password', 'AuthController@sendResetPasswordLink');
        Route::post('verify-token', 'AuthController@verifyTokenStatus');
        Route::post('verifyEmail', 'AuthController@verifyEmail');
        Route::post('forgot-password-save', 'AuthController@ResetPasswordSetNew');
        Route::post('signout', 'AuthController@logout')->middleware('auth:api');
        Route::post('signoutAll', 'AuthController@logoutAll')->middleware('auth:api');

        //Profile saveProfile
        Route::get('getProfile', 'AccountController@getProfile')->middleware('auth:api');
        Route::post('saveProfile', 'AccountController@saveProfile')->middleware('auth:api');
        Route::post('changePassword', 'AccountController@changePassword')->middleware('auth:api');
        //My Account Recipes
        Route::get('getAuthorsRecipes', 'AccountController@getAuthorsRecipes')->middleware('auth:api');
        Route::get('editAuthorsRecipe/{id}', 'AccountController@editAuthorsRecipe')->middleware('auth:api');
        Route::post('createAuthorsRecipe', 'AccountController@createAuthorsRecipe')->middleware('auth:api');
        Route::post('updateAuthorsRecipe/{id}', 'AccountController@updateAuthorsRecipe')->middleware('auth:api');
        Route::delete('deleteAuthorsRecipe/{id}', 'AccountController@deleteAuthorsRecipe')->middleware('auth:api');

        //Recipe Detail & Enquiry common
        Route::post('saveContactUsEnquiry', 'CommonController@saveContactUsEnquiry');
        Route::post('createNewRecipeRating/{id}', 'RecipeExtraController@createNewRecipeRating')->middleware('auth:api');
        Route::post('createNewRecipeLike/{id}', 'RecipeExtraController@createNewRecipeLike')->middleware('auth:api');
        Route::post('createNewRecipeView/{id}', 'RecipeExtraController@createNewRecipeView');
        Route::get('getRecipeRatings/{id}', 'RecipeExtraController@getRecipeRatings');
        Route::get('getUsersLike/{id}', 'RecipeExtraController@getUsersLike')->middleware('auth:api');
        Route::get('getUsersRating/{id}', 'RecipeExtraController@getUsersRating')->middleware('auth:api');

        Route::post('createNewBlogRating/{id}', 'BlogExtraController@createNewBlogRating')->middleware('auth:api');
        Route::post('createNewBlogLike/{id}', 'BlogExtraController@createNewBlogLike')->middleware('auth:api');
        Route::post('createNewBlogView/{id}', 'BlogExtraController@createNewBlogView');
        Route::get('getBlogRatings/{id}', 'BlogExtraController@getBlogRatings');
        Route::get('getUsersBlogRating/{id}', 'BlogExtraController@getUsersBlogRating')->middleware('auth:api');

        //Common Routes
        Route::get('companyDetail', 'CommonController@companyDetail');
        Route::get('getSocialLinks', 'CommonController@getSocialLinks');
        Route::get('followOnInstagram', 'CommonController@followOnInstagram');
        Route::get('latestsRecipes' ,'CommonController@latestsRecipes');
        Route::get('randomRecipes' ,'CommonController@randomRecipes');
        Route::get('featuredRecipes' ,'CommonController@featuredRecipes'); 
        Route::get('popularTags' ,'CommonController@popularTags');
        Route::get('getSidebarCategories' ,'CommonController@getSidebarCategories');
        Route::get('getAvgRating/{id}' ,'CommonController@getAvgRating');

        //All Home Page Routes
        Route::get('getHomeSlider', 'HomeController@getHomeSlider');
        Route::get('homeTrendingRecipe', 'HomeController@homeTrendingRecipe');
        Route::get('homeSection3In1', 'HomeController@homeSection3In1');
        Route::get('homeSidebarSection3In1', 'HomeController@homeSidebarSection3In1');

        //Recipes Categories Routes
        Route::get('getCategories', 'CommonController@getCategories');

        //Recipe Section Routes
        Route::get('recipesList' ,'RecipeController@recipesList');
        Route::get('recipesListByCategory/{slug}' ,'RecipeController@recipesListByCategory');
        Route::get('recipesListByTag/{slug}' ,'RecipeController@recipesListByTag');
        Route::get('recipeDetail/{slug}' ,'RecipeController@recipeDetail');

        //Authors Section Routes
        Route::get('authorsList' ,'CommonController@authorsList');
        Route::get('authorsRecipe/{id}' ,'CommonController@authorsRecipe');
        Route::get('authorsDetail/{id}' ,'CommonController@authorsDetail');

        //Blog Section Routes
        Route::get('getBlogList' ,'BlogsController@getBlogList');
        Route::get('getBlogListByTags/{slug}' ,'BlogsController@getBlogListByTags');
        Route::get('getBlogListByCategories/{slug}' ,'BlogsController@getBlogListByCategories');
        Route::get('getBlogDetail/{slug}' ,'BlogsController@getBlogDetail');
        Route::get('getBlogFeatured' ,'BlogsController@getBlogFeatured');
        Route::get('getBlogLatest' ,'BlogsController@getBlogLatest');
        Route::get('getBlogInstagrams' ,'BlogsController@getBlogInstagrams');
        Route::get('getBlogCategories' ,'BlogsController@getBlogCategories');
        Route::get('getBlogTags' ,'BlogsController@getBlogTags');
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
            //Admin Profile & Auth
            Route::get('getProfile', 'ProfileController@getProfile');
            Route::get('loggedProfile', 'ProfileController@loggedProfile');
            Route::post('updateProfile', 'ProfileController@updateProfile');
            Route::post('changePassword', 'ProfileController@changePassword');
            Route::post('logout', 'AuthController@logout');
            Route::post('logoutAll', 'AuthController@logoutAll');
            //Dashboard
            Route::get('getDashboardData', 'CommonController@index');
            //Company Detail
            Route::get('getCompanyDetail', 'CompanyDetailController@getCompanyDetail');
            Route::post('saveCompanyDetail', 'CompanyDetailController@saveCompanyDetail');
            //Manage Recipes
            Route::get('getRecipes', 'RecipesController@getRecipes');
            Route::get('editRecipes/{id}','RecipesController@editRecipes');
            Route::post('createRecipes', 'RecipesController@createRecipes');
            Route::post('updateRecipes/{id}', 'RecipesController@updateRecipes');
            Route::delete('deleteRecipes/{id}', 'RecipesController@deleteRecipes');
            //Manage Recipe Categories
            Route::get('getCategories', 'CategoriesController@getCategories');
            Route::get('categories', 'CategoriesController@categories');
            Route::get('getCategory/{id}','CategoriesController@getCategory');
            Route::post('createCategory', 'CategoriesController@createCategory');
            Route::post('updateCategory/{id}', 'CategoriesController@updateCategory');
            Route::delete('deleteCategory/{id}', 'CategoriesController@deleteCategory');
            //Manage Recipe Tags
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

