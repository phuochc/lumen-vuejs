<?php

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
// Author route
$router->group([
    'prefix' => 'authors'
], function () use ($router) {
    $router->get('', [
        'uses' => 'AuthorController@index',
    ]);
    $router->get('/{author}', [
        'uses' => 'AuthorController@show',
    ]);
    $router->post('', [
        'uses' => 'AuthorController@store',
    ]);
    $router->put('/{author}', [
        'uses' => 'AuthorController@update',
    ]);
    $router->patch('/{author}', [
        'uses' => 'AuthorController@update',
    ]);
    $router->delete('/{author}', [
        'uses' => 'AuthorController@destroy',
    ]);
});
// Book route
$router->group([
    'prefix' => 'books'
], function () use ($router) {
    $router->get('', [
        'uses' => 'BookController@index',
    ]);
    $router->get('/{book}', [
        'uses' => 'BookController@show',
    ]);
    $router->post('', [
        'uses' => 'BookController@store',
    ]);
    $router->put('/{book}', [
        'uses' => 'BookController@update',
    ]);
    $router->patch('/{book}', [
        'uses' => 'BookController@update',
    ]);
    $router->delete('/{book}', [
        'uses' => 'BookController@destroy',
    ]);
});
