<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->post('/new-provider', 'HomeController@newProvider');
$router->post('/new-product', 'HomeController@newProduct');
$router->get('/deleteProduct/{id}', 'HomeController@deleteProduct');
$router->get('/editProduct/{id}', 'HomeController@editProduct');
$router->post('/editAction', 'HomeController@editAction');