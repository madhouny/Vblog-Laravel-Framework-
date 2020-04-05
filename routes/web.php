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
   
    //Blog routes
    Route::get('/blog','BlogController@getIndex')->name('blog.index');
    Route::get('/blog/{id}','BlogController@getSingle')->name('blog.single');
        
    
    Route::get('/contact', 'PagesController@getContact')->name('getContact');
    Route::post('/postcontact', 'PagesController@postContact')->name('postContact');
    Route::get('/about', 'PagesController@getAbout')->name('about');
    Route::get('/', 'PagesController@getIndex')->name('home');
    Route::resource('posts','PostController');
    
    //Categories routes
    Route::resource('categories','CategoryController',['except'=> ['create']]);

     //Tags routes
     Route::resource('tags','TagController',['except'=> ['create']]);

     //Commentaire routes
     Route::post('comments/{post_id}',[
         'uses'=>'CommentsController@store',
        'as'=>'comments.store']);

});

// Authentification routes
Auth::routes();

