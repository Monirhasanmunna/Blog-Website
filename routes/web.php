<?php

use Illuminate\Support\Facades\Route;




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











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
