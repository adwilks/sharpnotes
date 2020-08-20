<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('', function() {
    return view('login');
});


$router->post('/login','AuthController@postLogin');
$router->get('/notesdash', 'NotesDashController@showNotePage');
$router->group(['middleware'=>'jwt.auth'], function () use ($router){

    $router->post('/notesdash', 'NotesDashController@storeNote');
    $router->get('/notesdash/{id}', 'NotesDashController@editNote');
    $router->post('/notesdash/delete/{id}', 'NotesDashController@deleteNote');
});



//$router->group([
//    'prefix' => 'auth'
//], function ($router) {
//
//    $router->post('logout', 'AuthController@logout');
//    $router->post('refresh', 'AuthController@refresh');
//    $router->post('me', 'AuthController@me');
//});


