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

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Author'], function () use ($router) {
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

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\News'], function () use ($router) {
    $router->post('/news', [
        'uses' => 'NewsController@create'
    ]);

    $router->get('/news', [
        'uses' => 'NewsController@findAll'
    ]);

    $router->get('/news/author/{authorId}', [
        'uses' => 'NewsController@findByAuthor'
    ]);

    $router->get('/news/{param}', [
        'uses' => 'NewsController@findBy'
    ]);

    $router->put('/news/{param}', [
        'uses' => 'NewsController@editBy'
    ]);

    $router->patch('/news/{param}', [
        'uses' => 'NewsController@editBy'
    ]);

    $router->delete('/news/{param}', [
        'uses' => 'NewsController@deleteBy'
    ]);

    $router->delete('/news/{authorId}', [
        'uses' => 'NewsController@deleteByAuthor'
    ]);
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\ImageNews'], function () use ($router) {
    $router->post('/image-news', [
        'uses' => 'ImageNewsController@create'
    ]);

    $router->get('/image-news', [
        'uses' => 'ImageNewsController@findAll'
    ]);

    $router->get('/image-news/news/{newsId}', [
        'uses' => 'ImageNewsController@findByNews'
    ]);

    $router->get('/image-news/{id}', [
        'uses' => 'ImageNewsController@findOneBy'
    ]);

    $router->put('/image-news/{param}', [
        'uses' => 'ImageNewsController@editBy'
    ]);

    $router->patch('/image-news/{param}', [
        'uses' => 'ImageNewsController@editBy'
    ]);

    $router->delete('/image-news/{newsId}', [
        'uses' => 'ImageNewsController@deleteByNews'
    ]);

    $router->delete('/image-news/{id}', [
        'uses' => 'ImageNewsController@delete'
    ]);
});
