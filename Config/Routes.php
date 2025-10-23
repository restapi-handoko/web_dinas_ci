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
$routes->get('/webadmin/data/jabatan/add', 'Webadmin\Data\Jabatan::add');
$routes->post('/webadmin/data/jabatan/edit', 'Webadmin\Data\Jabatan::edit');
$routes->post('/webadmin/data/jabatan/getAll', 'Webadmin\Data\Jabatan::getAll');
$routes->post('/webadmin/data/jabatan/getParent', 'Webadmin\Data\Jabatan::getParent');
$routes->post('/webadmin/data/jabatan/delete', 'Webadmin\Data\Jabatan::delete');
$routes->post('/webadmin/data/jabatan/addSave', 'Webadmin\Data\Jabatan::addSave');
$routes->post('/webadmin/data/jabatan/editSave', 'Webadmin\Data\Jabatan::editSave');

$routes->get('/webadmin/data/pegawai', 'Webadmin\Data\Pegawai::index');
$routes->get('/webadmin/data/pegawai/data', 'Webadmin\Data\Pegawai::data');
$routes->get('/webadmin/data/pegawai/add', 'Webadmin\Data\Pegawai::add');
$routes->post('/webadmin/data/pegawai/edit', 'Webadmin\Data\Pegawai::edit');
$routes->post('/webadmin/data/pegawai/getAll', 'Webadmin\Data\Pegawai::getAll');
$routes->post('/webadmin/data/pegawai/detail', 'Webadmin\Data\Pegawai::detail');
$routes->post('/webadmin/data/pegawai/delete', 'Webadmin\Data\Pegawai::delete');
$routes->post('/webadmin/data/pegawai/addSave', 'Webadmin\Data\Pegawai::addSave');
$routes->post('/webadmin/data/pegawai/editSave', 'Webadmin\Data\Pegawai::editSave');
$routes->post('/webadmin/data/pegawai/createAkun', 'Webadmin\Data\Pegawai::createAkun');
$routes->post('/webadmin/data/pegawai/resetAkun', 'Webadmin\Data\Pegawai::resetAkun');
$routes->post('/webadmin/data/pegawai/getParent', 'Webadmin\Data\Pegawai::getParent');

$routes->get('/webadmin/web/maklumat', 'Webadmin\Web\Maklumat::index');
$routes->get('/webadmin/web/maklumat/edit', 'Webadmin\Web\Maklumat::edit');
$routes->post('/webadmin/web/maklumat/save', 'Webadmin\Web\Maklumat::save');
$routes->post('/webadmin/web/maklumat/uploadImage', 'Webadmin\Web\Maklumat::uploadImage');
