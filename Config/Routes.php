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
$routes->get('/auth', 'Auth::index');
$routes->get('/auth/logout', 'Auth::logout');
$routes->post('/auth/login', 'Auth::login');
// $routes->get('/auth/login', 'Auth::login');

$routes->get('/webadmin/home', 'Webadmin\Home::index');
$routes->get('/webadmin/data/jabatan', 'Webadmin\Jabatan::index');
$routes->get('/webadmin/data/jabatan/data', 'Webadmin\Jabatan::data');
$routes->get('/webadmin/data/jabatan/getAll', 'Webadmin\Jabatan::getAll');
$routes->get('/webadmin/data/jabatan/add', 'Webadmin\Jabatan::add');
$routes->get('/webadmin/data/jabatan/edit', 'Webadmin\Jabatan::edit');
$routes->post('/webadmin/data/jabatan/getParent', 'Webadmin\Jabatan::getParent');
$routes->post('/webadmin/data/jabatan/delete', 'Webadmin\Jabatan::delete');
$routes->post('/webadmin/data/jabatan/addSave', 'Webadmin\Jabatan::addSave');
$routes->post('/webadmin/data/jabatan/editSave', 'Webadmin\Jabatan::editSave');
