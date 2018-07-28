<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'namespace'=> 'Api',
], function ($router) {

    $router->post('signin', [
        'as' => 'api.v1.signin',
        'uses' => 'PassportController@signIn'
    ]);

    $router->post('signup', [
        'as' => 'api.v1.signup',
        'uses' => 'PassportController@signUp'
    ]);

    $router->group(['middleware'=>'auth:api'], function ($router) {

        $router->post('send', [
            'as' => 'api.v1.send',
            'uses' => 'SendEmailController@send'
        ]);

    });
});