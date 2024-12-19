<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'LoginController::login');
$routes->post('/logueado', 'LoginController::logueado');
$routes->get('/salir', 'LoginController::salir');

$routes->get('/ad/home', 'HomeController::index');

$routes->get('/ad/doctor', 'DoctorController::index');
$routes->get('/ad/doctor/new', 'DoctorController::new');
$routes->post('/ad/doctor', 'DoctorController::create');
$routes->get('/ad/doctor/(:num)/edit', 'DoctorController::edit/$1');
$routes->put('/ad/doctor/(:num)', 'DoctorController::update/$1');
$routes->get('/ad/doctor/delete/(:num)', 'DoctorController::delete/$1');
$routes->get('/ad/doctor/resetPass/(:num)/(:num)', 'DoctorController::resetPass/$1/$2');
$routes->get('/ad/doctor/newPass', 'DoctorController::newPass');
$routes->post('/ad/doctor/changePass', 'DoctorController::changePass');

$routes->get('/ad/cliente', 'ClienteController::index');
$routes->get('/ad/cliente/new', 'ClienteController::new');
$routes->post('/ad/cliente', 'ClienteController::create');
$routes->get('/ad/cliente/(:num)/edit', 'ClienteController::edit/$1');
$routes->put('/ad/cliente/(:num)', 'ClienteController::update/$1');
$routes->get('/ad/cliente/delete/(:num)', 'ClienteController::delete/$1');

$routes->get('/ad/horario', 'HorarioController::index');
$routes->get('/ad/horario/new', 'HorarioController::new');
$routes->post('/ad/horario', 'HorarioController::create');
$routes->get('/ad/horario/(:num)/edit', 'HorarioController::edit/$1');
$routes->put('/ad/horario/(:num)', 'HorarioController::update/$1');
$routes->get('/ad/horario/delete/(:num)', 'HorarioController::delete/$1');

$routes->get('/ad/producto', 'ProductoController::index');
$routes->get('/ad/producto/new', 'ProductoController::new');
$routes->post('/ad/producto', 'ProductoController::create');
$routes->get('/ad/producto/(:num)/edit', 'ProductoController::edit/$1');
$routes->put('/ad/producto/(:num)', 'ProductoController::update/$1');
$routes->get('/ad/producto/delete/(:num)', 'ProductoController::delete/$1');

$routes->get('/ad/oferta', 'OfertaController::index');
$routes->get('/ad/oferta/new', 'OfertaController::new');
$routes->post('/ad/oferta', 'OfertaController::create');
$routes->get('/ad/oferta/(:num)/edit', 'OfertaController::edit/$1');
$routes->put('/ad/oferta/(:num)', 'OfertaController::update/$1');
$routes->get('/ad/oferta/delete/(:num)', 'OfertaController::delete/$1');

$routes->get('/ad/asignar', 'AsignarController::index');
$routes->get('/ad/asignar/new', 'AsignarController::new');
$routes->post('/ad/asignar', 'AsignarController::create');
$routes->get('/ad/asignar/(:num)/edit', 'AsignarController::edit/$1');
$routes->put('/ad/asignar/(:num)', 'AsignarController::update/$1');
$routes->get('/ad/asignar/delete/(:num)', 'AsignarController::delete/$1');