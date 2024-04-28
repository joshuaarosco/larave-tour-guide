<?php

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

Route::get('/',['as' => "index",'uses' => "PageController@index"]);

Route::group(['as' => "tour.", 'prefix' => "tour"], function(){
    Route::get('list',['as' => "index", 'uses' => "TourController@index"]);
    Route::get('detail/{id}',['as' => "detail", 'uses' => "TourController@detail"]);
    Route::get('book/{id}',['as' => "book", 'uses' => "TourController@book"]);
    Route::post('book/{id}',['uses' => "TourController@bookSave"]);
});

Route::group(['as' => "destination.", 'prefix' => "destination" ], function(){
    Route::get('list',['as' => "index", 'uses' => "DestinationController@index"]);
    Route::get('detail/{id}',['as' => "detail", 'uses' => "DestinationController@detail"]);
});

Route::group(['as' => "tour_guide.", 'prefix' => "tour-guide" ], function(){
    Route::get('list',['as' => "index", 'uses' => "TourGuideController@index"]);
    Route::get('detail/{id}',['as' => "detail", 'uses' => "TourGuideController@detail"]);
});

Route::group(['as' => "booking.", 'prefix' => "booking" ], function(){
    Route::get('list',['as' => "index", 'uses' => "BookingController@index"]);
    Route::get('detail/{id}',['as' => "detail", 'uses' => "BookingController@detail"]);
});

Route::group(['as' => "messages.", 'prefix' => "messages" ], function(){
    Route::get('inbox',['as' => "index", 'uses' => "MessageController@index"]);
    Route::get('create/{id}',['as' => "create", 'uses' => "MessageController@createMessage"]);
    Route::get('thread/{id}',['as' => "thread", 'uses' => "MessageController@thread"]);
    Route::post('thread/{id}',['uses' => "MessageController@send"]);
});

