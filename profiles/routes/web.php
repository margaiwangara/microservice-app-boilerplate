<?php
use Webpatser\Uuid\Uuid;

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

$router->get('/', function () {

    return "Coding Rocks!";
});

// routes for profile_categories
$router->get('/categories', [
    'as' => 'categories.index', 'uses' => 'ProfileCategoryController@index']);

$router->post('/categories', [
    'as' => 'categories.store', 'uses' => 'ProfileCategoryController@store']);

$router->get('/categories/{id}', [
    'as' => 'categories.show', 'uses' => 'ProfileCategoryController@show']);

$router->put('/categories/{id}', [
    'as' => 'categories.update', 'uses' => 'ProfileCategoryController@update']);

$router->delete('/categories/{id}', [
    'as' => 'categories.destroy', 'uses' => 'ProfileCategoryController@destroy']);

// routes for profile
$router->get('/profile', [
    'as' => 'profile.index', 'uses' => 'ProfileController@index']);

$router->post('/profile', [
    'as' => 'profile.store', 'uses' => 'ProfileController@store']);

$router->get('/profile/{id}', [
    'as' => 'profile.show', 'uses' => 'ProfileController@show']);

$router->put('/profile/{id}', [
    'as' => 'profile.update', 'uses' => 'ProfileController@update']);

$router->delete('/profile/{id}', [
    'as' => 'profile.destroy', 'uses' => 'ProfileController@destroy']);

// routes for profile info
// $router->get('/profile', [
//     'as' => 'profile.index', 'uses' => 'ProfileController@index']);

// $router->post('/profile', [
//     'as' => 'profile.store', 'uses' => 'ProfileController@store']);

// $router->get('/profile/{id}', [
//     'as' => 'profile.show', 'uses' => 'ProfileController@show']);

// $router->put('/profile/{id}', [
//     'as' => 'profile.update', 'uses' => 'ProfileController@update']);

// $router->delete('/profile/{id}', [
//     'as' => 'profile.destroy', 'uses' => 'ProfileController@destroy']);
