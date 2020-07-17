<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Load Admin Vue
Route::get('/admin/{any}', 'HomeController@vueAdmin')->where('any', '.*');

//VueJS Load Main Page
Route::get('/', 'HomeController@vueFrontEnd');
Route::get('/{any}', 'HomeController@vueFrontEnd')->where('any', '.*');


