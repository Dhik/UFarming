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

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('plant', 'Admin\AdminPlantController@index');
    $router->get('plant/add', 'Admin\AdminPlantController@addPlant');
    $router->post('plant/store', 'Admin\AdminPlantController@store');
    $router->get('plant/edit/{id}','Admin\AdminPlantController@editPlant');
    $router->post('plant/update','Admin\AdminPlantController@update');
    $router->get('plant/delete/{id}','Admin\AdminPlantController@delete');
});

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('article', 'Admin\AdminArticleController@index');
    $router->get('article/add', 'Admin\AdminArticleController@addArticle');
    $router->post('article/store', 'Admin\AdminArticleController@store');
    $router->get('article/edit/{id}','Admin\AdminArticleController@editArticle');
    $router->post('article/update','Admin\AdminArticleController@update');
    $router->get('article/delete/{id}','Admin\AdminArticleController@delete');
});

$router->post('register', 'AuthController@register');
$router->post('login', 'AuthController@login');

$router->get('profile','UserController@profile');
$router->post('profile','UserController@update');
$router->post('update_pic','UserController@update_picture');

$router->get('plants','PlantController@list');
$router->get('plants/detail/{id}','PlantController@detail');

$router->get('articles','ArticleController@list');
$router->get('articles/detail/{id}','ArticleController@detail');

$router->post('my_plants', 'MyPlantController@store');
$router->get('my_plants', 'MyPlantController@list');

$router->post('checklist/new', 'ChecklistController@store');
$router->post('checklist/default', 'ChecklistController@storeDefault');
$router->put('checklist/check', 'ChecklistController@doCheck');
$router->get('checklist/{id}', 'ChecklistController@my_plant');

$router->delete('myplant/{id}', 'MyPlantController@delete');

$router->post('activity/new', 'ActivityController@store');
$router->get('activity/{id}', 'ActivityController@list');
$router->delete('activity/{id}', 'ActivityController@delete');