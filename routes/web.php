<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@listar');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/products', 'ProductController')->names('products')->middleware('auth');

//Route::get('/productos', 'ProductController@listar')->name('productos');
