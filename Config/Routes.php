<?php

use CodeIgniter\Router\RouteCollection;

// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/home', 'Home::index');
// $routes->get('/auth', 'Auth::index');
// $routes->get('/auth/login', 'Auth::login');
