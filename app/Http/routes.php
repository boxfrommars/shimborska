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

Route::get('/', ['as' => 'main', 'uses' => 'MainController@main']);
Route::get('about', ['as' => 'about', 'uses' => 'MainController@about']);
Route::get('author', ['as' => 'about', 'uses' => 'MainController@author']);

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::resource('collection', 'CollectionController');
    Route::resource('collection.poem', 'PoemController');
    Route::resource('page', 'PageController');
});

Route::post('sort', '\Rutorika\Sortable\SortableController@sort');

// Authentication routes...
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
});


Route::get('/{collectionSlug}/{poemSlug}', ['as' => 'poem', 'uses' => 'MainController@poem']);
Route::get('/{collectionSlug}', ['as' => 'collection', 'uses' => 'MainController@collection']);

