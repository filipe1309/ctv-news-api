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
    $router->post('/authors', 'AuthorController@create');

    $router->get('/authors', 'AuthorController@findAll');

    $router->get('/authors/{id}', 'AuthorController@findOneBy');

    $router->put('/authors/{param}', 'AuthorController@editBy');

    $router->patch('/authors/{param}', 'AuthorController@editBy');

    $router->delete('/authors/{id}', 'AuthorController@delete');
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\News'], function () use ($router) {
    $router->post('/news', 'NewsController@create');

    $router->get('/news', 'NewsController@findAll');

    $router->get('/news/author/{authorId}', 'NewsController@findByAuthor');

    $router->get('/news/{param}', 'NewsController@findBy');

    $router->put('/news/{param}', 'NewsController@editBy');

    $router->patch('/news/{param}', 'NewsController@editBy');

    $router->delete('/news/{param}', 'NewsController@deleteBy');

    $router->delete('/news/author/{authorId}', 'NewsController@deleteByAuthor');
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\ImageNews'], function () use ($router) {
    $router->post('/image-news', 'ImageNewsController@create');

    $router->get('/image-news', 'ImageNewsController@findAll');

    $router->get('/image-news/news/{newsId}', 'ImageNewsController@findByNews');

    $router->get('/image-news/{id}', 'ImageNewsController@findOneBy');

    $router->put('/image-news/{param}', 'ImageNewsController@editBy');

    $router->patch('/image-news/{param}', 'ImageNewsController@editBy');

    $router->delete('/image-news/{id}', 'ImageNewsController@delete');

    $router->delete('/image-news/news/{newsId}', 'ImageNewsController@deleteByNews');
});
