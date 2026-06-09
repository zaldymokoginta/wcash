<?php

use App\Core\Router;

$router = new Router();

$router->get('/', 'AuthController@login');

$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@authenticate');

$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@store');

$router->get('/logout', 'AuthController@logout');

$router->get('/dashboard', 'DashboardController@index');

$router->get('/test', 'TestController@index');

$router->get('/categories', 'CategoryController@index');

$router->get('/categories/create', 'CategoryController@create');
$router->post('/categories/store', 'CategoryController@store');

$router->get('/categories/edit', 'CategoryController@edit');
$router->post('/categories/update', 'CategoryController@update');

$router->get('/categories/delete', 'CategoryController@delete');

// Transactions
$router->get('/transactions', 'TransactionController@index');

$router->get('/transactions/create', 'TransactionController@create');
$router->post('/transactions/store', 'TransactionController@store');

$router->get('/transactions/edit', 'TransactionController@edit');
$router->post('/transactions/update', 'TransactionController@update');

$router->get('/transactions/delete', 'TransactionController@delete');

$router->get('/report/pdf', 'ReportController@exportPdf');

return $router;
