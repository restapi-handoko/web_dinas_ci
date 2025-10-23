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
$routes->get('/webadmin/data/jabatan', 'Webadmin\Data\Jabatan::index');
$routes->get('/webadmin/data/jabatan/data', 'Webadmin\Data\Jabatan::data');
$routes->get('/webadmin/data/jabatan/getAll', 'Webadmin\Data\Jabatan::getAll');
$routes->get('/webadmin/data/jabatan/add', 'Webadmin\Data\Jabatan::add');
$routes->get('/webadmin/data/jabatan/edit', 'Webadmin\Data\Jabatan::edit');
$routes->post('/webadmin/data/jabatan/getParent', 'Webadmin\Data\Jabatan::getParent');
$routes->post('/webadmin/data/jabatan/delete', 'Webadmin\Data\Jabatan::delete');
$routes->post('/webadmin/data/jabatan/addSave', 'Webadmin\Data\Jabatan::addSave');
$routes->post('/webadmin/data/jabatan/editSave', 'Webadmin\Data\Jabatan::editSave');
