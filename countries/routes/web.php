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
    return 'Coding Rocks';
});

// routes for countries
$router->get('/countries', [
    'as' => 'countries.index', 'uses' => 'CountryController@index']);
$router->post('/countries', [
    'as' => 'countries.store', 'uses' => 'CountryController@store']);
$router->get('/countries/{id}', [
    'as' => 'countries.show', 'uses' => 'CountryController@show']);
$router->put('/countries/{id}', [
    'as' => 'countries.update', 'uses' => 'CountryController@update']);
$router->delete('/countries/{id}', [
    'as' => 'countries.destroy', 'uses' => 'CountryController@destroy']);
