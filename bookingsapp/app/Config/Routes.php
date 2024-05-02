<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->get('/UserController/logout', 'UserController::logout');
$routes->post('/UserController/attemptRegister', 'UserController::attemptRegister', ['as' => 'attempt_register']);
$routes->post('/UserController/attemptLogin', 'UserController::attemptLogin', ['as' => 'attempt_login']);

$routes->get('/dashboard', 'UserController::dashboard');

$routes->get('/appointment/book', 'AppointmentController::book');
$routes->get('/appointment/create', 'AppointmentController::createAppointment');
$routes->post('/AppointmentController/addAppointment', 'AppointmentController::addAppointment', ['as' => 'addAppointment']);
$routes->post('/AppointmentController/viewAvailable', 'AppointmentController::viewAvailable', ['as' => 'viewAvailable']);
$routes->get('/appointment/claimAppointment/(:segment)', 'AppointmentController::claimAppointment/$1');

$routes->get('/appointment/cancelAppointment/(:segment)', 'AppointmentController::cancelAppointment/$1');


$routes->get('/adminDashboard', 'UserController::adminDashboard');
$routes->get('/admin/search', 'UserController::adminSearch');
$routes->post('/UserController/generateAdminReport', 'UserController::generateAdminReport');


$routes->get('/adminDashboardAccounts', 'UserController::adminDashboardUsers');
$routes->get('/serviceProviderDashboard', 'UserController::serviceProviderDashboard');

$routes->get('/appointment/deleteAppointment/(:segment)', 'AppointmentController::deleteAppointment/$1');
$routes->get('/admin/enableAccount/(:segment)', 'UserController::enableAccount/$1');
$routes->get('/admin/disableAccount/(:segment)', 'UserController::disableAccount/$1');
$routes->get('/error', 'UserController::error');
$routes->get('/appointment/cancelAppointmentAdmin/(:segment)', 'AppointmentController::cancelAppointmentAdmin/$1');








