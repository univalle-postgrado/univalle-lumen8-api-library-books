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

$router->group(['prefix' => 'v1', 'middleware' => 'checkAuthorization'], function () use ($router) {
    $router->get('/books', ['uses' => 'BookController@index']);
    $router->get('/books/{id}', ['uses' => 'BookController@read']);
    $router->post('/books', ['uses' => 'BookController@create']);
    $router->put('/books/{id}', ['uses' => 'BookController@update']);
    $router->patch('/books/{id}', ['uses' => 'BookController@patch']);
    $router->delete('/books/{id}', ['uses' => 'BookController@delete']);
});
