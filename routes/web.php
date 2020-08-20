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


$router->post('/login','AuthController@login');


$router->group(['middleware'=>'auth'], function () use ($router){
    $router->get('/notesdash', 'NotesDashController@getUserNotes');
    $router->post('/notesdash', 'NotesDashController@storeNote');
    $router->post('/notesdash/{id}', 'NotesDashController@editNote');
    $router->post('/notesdash/delete/{id}', 'NotesDashController@deleteNote');
    $router->post('/logout','AuthController@logout');#ecf0f1
});



