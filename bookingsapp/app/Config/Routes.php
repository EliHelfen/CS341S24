<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->post('/UserController/attemptRegister', 'UserController::attemptRegister', ['as' => 'attempt_register']);

$routes->get('/dashboard', 'UserController::dashboard');


