<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->post('/UserController/attemptRegister', 'UserController::attemptRegister', ['as' => 'attempt_register']);
$routes->post('/UserController/attemptLogin', 'UserController::attemptLogin', ['as' => 'attempt_login']);

$routes->get('/dashboard', 'UserController::dashboard');

$routes->get('/appointment/book', 'AppointmentController::book');
$routes->get('/appointment/create', 'AppointmentController::createAppointment');
$routes->post('/AppointmentController/addAppointment', 'AppointmentController::addAppointment', ['as' => 'addAppointment']);




