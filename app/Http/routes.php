<?php
//use Event;
//use App\Events\UserLoginEvent;
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

    return view('registration.registration');

});
//Route::get('updatedUserProfile','RegistrationController@getUpdatedUserProfile');

Route::controller('registration','RegistrationController');
