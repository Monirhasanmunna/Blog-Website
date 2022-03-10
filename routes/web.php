<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/',function(){
    return view('website.home');
});


Route::get('/category',function(){
    return view('website.category');
});

Route::get('/post',function(){
    return view('website.post');
});

Route::get('/contact',function(){
    return view('website.contact');
});


// admin routes   

Route::group(['prefix' => 'admin','middleware' => ['auth'] ], function () {

    Route::resource('category','CategoryController');
    Route::resource('tag','TagsController');
}); 









