<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'LoginController::login');
$routes->post('/logueado', 'LoginController::logueado');
$routes->get('/home', 'HomeController::index');

