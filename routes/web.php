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

$router->get('/hello', function () {
    return '<h1 style="color: red">Hello semua, selamat belajar Lumen</h1>';
});

$router->get('/hello/{name}', function ($name) {
    return "<h1 style='color: blue'>Hello $name, 
    selamat belajar Lumen</h1>";
});

$router->get('/api/v1/customers', 'ExampleController@showListCustomers');
$router->get('/api/v1/customers/{id}', 'ExampleController@getCustomerByID');

$router->get('/api/v1/mahasiswa', 'MahasiswaController@index');
$router->get('/api/v1/mahasiswa/{id}', 'MahasiswaController@getByID');
$router->post('/api/v1/mahasiswa', 'MahasiswaController@insert');
$router->put('/api/v1/mahasiswa/{id}', 'MahasiswaController@update');
$router->delete('/api/v1/mahasiswa/{id}', 'MahasiswaController@delete');
