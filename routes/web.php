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
   

    Route::get('/blog','BlogController@getIndex')->name('blog.index');
    Route::get('/blog/{id}','BlogController@getSingle')->name('blog.single');
        
    
    Route::get('/contact', 'PagesController@getContact');
    Route::get('/about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex')->name('home');
    Route::resource('posts','PostController');
    
    //Categories routes

    Route::resource('categories','CategoryController',['except'=> ['create']]);


});

// Authentification routes
Auth::routes();

