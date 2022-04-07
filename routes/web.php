<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//frontend route
Route::get('/','frontendController@home')->name('website');
Route::get('/category','frontendController@category')->name('website');
Route::get('/post','frontendController@post')->name('website');
Route::get('/contact','frontendController@contact')->name('website');

// admin routes   
Route::group(['prefix' => 'admin','middleware' => ['auth'] ], function () {

    Route::resource('category','CategoryController');
    Route::resource('tag','TagsController');
    Route::resource('post','PostController');

}); 

//Factory tinker dummy image
Route::get('/test',function(){

    $posts = App\Post::all();
    $id = 200;
    foreach($posts as $post){
        $post->image = "https://picsum.photos/id/".$id."/600/400";
        $post->save();
        $id++;
    }
    return $post;

});








