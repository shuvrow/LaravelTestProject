<?php

Route::group(array('module' => 'Users', 'namespace' => 'App\Modules\Users\Controllers'), function() {
    Route::get('logout','UsersController@getLogout');
    Route::group(array('middleware'=>['App\Http\Middleware\AuthenticUser']),function(){
        Route::controller('Users', 'UsersController');
    });

    
});	