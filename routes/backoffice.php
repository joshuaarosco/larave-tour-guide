<?php


/**
 *
 * ------------------------------------
 * Backoffice Routes
 * ------------------------------------
 *
 */
Route::group(['middleware' => "backoffice.guest", 'as' => "auth." ], function(){
    Route::get('login',['as' => "login", 'uses' => "LoginController@login"]);
    Route::post('login',['uses' => "LoginController@authenticate"]);

    Route::get('sign-up',['as' => "sign_up", 'uses' => "RegisterController@signUp"]);
    Route::post('sign-up',['uses' => "RegisterController@register"]);

    Route::get('tourist-sign-up',['as' => "sign_up_tourist", 'uses' => "RegisterController@signUpTourist"]);
    Route::post('tourist-sign-up',['uses' => "RegisterController@registerTourist"]);

    Route::get('verify',['as' => "verify", 'uses' => "LoginController@verify"]);
    Route::post('verify',['uses' => "LoginController@check"]);
});

Route::group(['middleware' => ["backoffice.auth"/*, "backoffice.superUserOnly"*/]], function(){
    Route::get('logout',['as' => "logout",'uses' => "LoginController@logout"]);

    Route::group(['middleware' => ["backoffice.superUserOnly"]], function(){
        Route::get('/',['as' => "index",'uses' => "DashboardController@index"]);

        Route::group(['as' => "account.", 'prefix' => "account"], function(){
            Route::get('/',['as' => "index",'uses' => "AccountController@index"]);
            Route::post('/',['uses' => "AccountController@update"]);
            Route::post('update-password',['as' => "update_password",'uses' => "AccountController@updatePassword"]);
            Route::get('send-verification',['as' => "send_verification",'uses' => "AccountController@sendVerification"]);
            Route::get('verify-account/{username}',['as' => "verify_account",'uses' => "AccountController@verifyAccount"]);

            Route::get('my-subscription',['as' => "subscription",'uses' => "AccountController@subscription"]);
            Route::post('my-subscription',['uses' => "AccountController@subscribe"]);
            
            Route::get('subscription-list',['as' => "subscription_list",'uses' => "AccountController@subscriptionList"]);
            Route::post('update-subscription',['as' => "update_subscription",'uses' => "AccountController@updateSub"]);
        });

        Route::group(['as' => "user.", 'prefix' => "user", 'middleware' => ["backoffice.superUserOnly"]], function(){
            Route::get('/',['as' => "index",'uses' => "UserController@index"]);
            Route::post('/',['as' => "create",'uses' => "UserController@create"]);
            Route::post('edit',['as' => "edit",'uses' => "UserController@edit"]);
            Route::get('view',['as' => "view",'uses' => "UserController@view"]);
            Route::post('update',['as' => "update",'uses' => "UserController@update"]);
            Route::any('delete/{id}',['as' => "delete",'uses' => "UserController@delete"]);

            Route::get('tour-guide',['as' => "tour_guide",'uses' => "UserController@tourGuide"]);
            Route::get('tour-guide/featured/{id}',['as' => "is_featured",'uses' => "UserController@isFeatured"]);
            Route::get('tourist',['as' => "tourist",'uses' => "UserController@tourist"]);
        });
        
        Route::group(['as' => "profile.", 'prefix' => "profile", 'middleware' => ["backoffice.memberOnly"]], function(){
            
            Route::group(['as' => "loan.", 'prefix' => "loan"], function(){
                Route::get('application',['as' => "application",'uses' => "LoanApplicationController@index"]);
                Route::post('application',['uses' => "LoanApplicationController@create"]);

                Route::get('current',['as' => "current",'uses' => "LoanApplicationController@current"]);
                Route::post('current',['uses' => "LoanApplicationController@updateCurrent"]);
                
                Route::get('cancel/{id}',['as' => "cancel",'uses' => "LoanApplicationController@cancel"]);

                Route::get('history',['as' => "history",'uses' => "LoanApplicationController@history"]);
                
                Route::get('view/{id}',['as' => "view",'uses' => "LoanApplicationController@view"]);
                Route::post('co-borrower',['as' => "co_borrower",'uses' => "UserController@editMember"]);
            });
        });

        Route::group(['as' => "destination.", 'prefix' => "destinations"], function(){
            Route::get('/',['as' => "index", 'middleware' => ["backoffice.superUserOnly"],'uses' => "DestinationController@index"]);
            Route::get('create',['as' => "create",'uses' => "DestinationController@create"]);
            Route::post('create',['uses' => "DestinationController@store"]);

            Route::get('edit/{id}',['as' => "edit", 'middleware' => ["backoffice.superUserOnly"],'uses' => "DestinationController@edit"]);
            Route::post('edit/{id}',['as' => "update",'uses' => "DestinationController@update"]);
            
            Route::get('view',['as' => "view",'uses' => "DestinationController@view"]);
            Route::any('delete/{id}',['as' => "delete", 'middleware' => ["backoffice.superUserOnly"],'uses' => "DestinationController@delete"]);
            
            Route::get('grid',['as' => "grid",'uses' => "DestinationController@grid"]);
        });

        Route::group(['as' => "tour.", 'prefix' => "tours"], function(){
            Route::get('/',['as' => "index", 'middleware' => ["backoffice.superUserOnly"],'uses' => "TourController@index"]);
            Route::get('create',['as' => "create",'uses' => "TourController@create"]);
            Route::post('create',['uses' => "TourController@store"]);

            Route::get('edit/{id}',['as' => "edit", 'middleware' => ["backoffice.superUserOnly"],'uses' => "TourController@edit"]);
            Route::post('edit/{id}',['as' => "update",'uses' => "TourController@update"]);
            
            Route::get('view',['as' => "view",'uses' => "TourController@view"]);
            Route::any('delete/{id}',['as' => "delete", 'middleware' => ["backoffice.superUserOnly"],'uses' => "TourController@delete"]);
            
            // Route::get('grid',['as' => "grid",'uses' => "TourController@grid"]);
            Route::get('gallery/{id}',['as' => "gallery",'uses' => "TourController@gallery"]);
            Route::post('gallery/{id}',['uses' => "TourController@upload"]);
            Route::any('gallery/{id}/{picId}',['as' => "gallery_delete",'uses' => "TourController@deletePic"]);
        });

        Route::group(['as' => "booking.", 'prefix' => "booking"], function(){
            Route::get('/',['as' => "index", 'middleware' => ["backoffice.superUserOnly"],'uses' => "BookingController@index"]);
            Route::get('view/{id}',['as' => "view",'uses' => "BookingController@view"]);
            Route::post('view/{id}',['uses' => "BookingController@update"]);
        });
    });
    
});
