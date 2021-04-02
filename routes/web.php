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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'Author'], function () use ($router) {
    $router->post('/authors', [
        'uses' => 'AuthorController@create'
    ]);

    $router->get('/authors', [
        'uses' => 'AuthorController@findAll'
    ]);

    $router->get('/authors/{id}', [
        'uses' => 'AuthorController@findOneBy'
    ]);

    $router->put('/authors/{param}', [
        'uses' => 'AuthorController@editBy'
    ]);

    $router->patch('/authors/{param}', [
        'uses' => 'AuthorController@editBy'
    ]);

    $router->delete('/authors/{id}', [
        'uses' => 'AuthorController@delete'
    ]);
});
