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

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
    Route::resource('collection', 'CollectionController');
    Route::resource('collection.poem', 'PoemController');
    Route::resource('page', 'PageController');
});

Route::post('sort', '\Rutorika\Sortable\SortableController@sort');


Route::get('/{collectionSlug}/{poemSlug}', ['as' => 'poem', 'uses' => 'MainController@poem']);
Route::get('/{collectionSlug}', ['as' => 'collection', 'uses' => 'MainController@collection']);

