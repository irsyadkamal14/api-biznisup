<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('user', 'UserController::index');
$routes->get('course', 'CourseController::index');
$routes->get('mentor', 'MentorController::index');
$routes->get('hardskill', 'HardskillController::index');
$routes->get('softskill', 'SoftskillController::index');
$routes->get('modul', 'ModulController::index');
$routes->get('reviewer', 'ReviewerController::index');

$routes->get('user/(:num)', 'UserController::show/$1');
$routes->get('course/(:num)', 'CourseController::show/$1');
$routes->get('mentor/(:num)', 'MentorController::show/$1');
$routes->get('hardskill/(:num)', 'hardskillController::show/$1');
$routes->get('softskill/(:num)', 'softskillController::show/$1');
$routes->get('modul/(:num)', 'ModulController::show/$1');
$routes->get('reviewer/(:num)', 'ReviewerController::show/$1');

$routes->post('user', 'UserController::create');
$routes->post('course', 'CourseController::create');
$routes->post('mentor', 'MentorController::create');

$routes->put('user/(:num)', 'UserController::update/$1');
$routes->put('course/(:num)', 'CourseController::update/$1');
$routes->put('mentor/(:num)', 'MentorController::update/$1');

$routes->delete('user/(:num)', 'UserController::delete/$1');
$routes->delete('course/(:num)', 'CourseController::delete/$1');
$routes->delete('mentor/(:num)', 'MentorController::delete/$1');

$routes->options('(:any)', 'Cors::handleOptions');
