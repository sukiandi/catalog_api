<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/register', 'Auth\\AuthController@getRegister');
Route::post('auth/register', 'Auth\\AuthController@postRegister');

Route::group([
    'namespace' => "Resource",
    'prefix'    => 'v1',
    'middleware' => 'apiAuth',
], function() {
    /**
     * Add product API
     */
   Route::post('product/add', 'ProductResource@store');

    /**
     * Product list API
     */
   Route::get('products', 'ProductResource@index');

    /**
     * Edit product API
     */
   Route::patch('product/edit/{productId}', 'ProductResource@update');

    /**
     * Delete product API
     */
   Route::delete('product/delete/{productId}', 'ProductResource@delete');

    /**
     * Add category API
     */
    Route::post('category/add', 'CategoryResource@store');

    /**
     * Category list API
     */
    Route::get('categories', 'CategoryResource@index');

    /**
     * Edit category API
     */
    Route::patch('category/edit/{categoryId}', 'CategoryResource@update');

    /**
     * Delete category API
     */
    Route::delete('category/delete/{categoryId}', 'CategoryResource@delete');
});
