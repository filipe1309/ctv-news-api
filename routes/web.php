<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Author\Author;
use App\Models\ImageNews\ImageNews;
use App\Models\News\News;

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

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Author', 'as' => Author::class], function () use ($router) {
    $router->post('/authors', [
        'uses' => 'AuthorController@create',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->get('/authors', 'AuthorController@findAll');

    $router->get('/authors/{id}', 'AuthorController@findOneBy');

    $router->put('/authors/{param}', [
        'uses' => 'AuthorController@editBy',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->patch('/authors/{param}', [
        'uses' => 'AuthorController@editBy',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->delete('/authors/{id}', 'AuthorController@delete');
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\News', 'as' => News::class], function () use ($router) {
    $router->post('/news', [
        'uses' => 'NewsController@create',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->get('/news', 'NewsController@findAll');

    $router->get('/news/author/{authorId}', 'NewsController@findByAuthor');

    $router->get('/news/{param}', 'NewsController@findBy');

    $router->put('/news/{param}', [
        'uses' => 'NewsController@editBy',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->patch('/news/{param}', [
        'uses' => 'NewsController@editBy',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->delete('/news/{param}', 'NewsController@deleteBy');

    $router->delete('/news/author/{authorId}', 'NewsController@deleteByAuthor');
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\ImageNews', 'as' => ImageNews::class], function () use ($router) {
    $router->post('/image-news', [
        'uses' => 'ImageNewsController@create',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->get('/image-news', 'ImageNewsController@findAll');

    $router->get('/image-news/news/{newsId}', 'ImageNewsController@findByNews');

    $router->get('/image-news/{id}', 'ImageNewsController@findOneBy');

    $router->put('/image-news/{param}', [
        'uses' => 'ImageNewsController@editBy',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->patch('/image-news/{param}', [
        'uses' => 'ImageNewsController@editBy',
        'middleware' => 'ValidateDataMiddleware'
    ]);

    $router->delete('/image-news/{id}', 'ImageNewsController@delete');

    $router->delete('/image-news/news/{newsId}', 'ImageNewsController@deleteByNews');
});
