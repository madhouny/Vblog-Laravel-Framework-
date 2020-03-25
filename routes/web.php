<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['middleware'=>['web']], function(){
    //Authentification routes
    Route::get('auth/login','UserController@getLogin');
    Route::post('auth/login','UserController@postLogin');
    Route::get('auth/logout','UserController@getLogout');

    //Registration Routes
    Route::get('auth/register','UserController@getRegister');
    Route::post('auth/register','UserController@postRegister');

    Route::get('/blog',[
        'uses'=>'BlogController@getIndex',
        'as'=>'blog.index'
    ]);
    Route::get('/contact', 'PagesController@getContact');
    Route::get('/about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts','PostController');
    

});