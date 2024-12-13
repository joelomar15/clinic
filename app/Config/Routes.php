<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'LoginController::login');
$routes->post('/logueado', 'LoginController::logueado');

$routes->get('/ad/home', 'HomeController::index');

$routes->get('/ad/doctor', 'DoctorController::index');
$routes->get('/ad/doctor/new', 'DoctorController::new');
$routes->post('/ad/doctor', 'DoctorController::create');

