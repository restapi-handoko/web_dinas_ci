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
$routes->get('/webadmin/notallow', 'Webadmin\Notallow::index');

$routes->get('/webadmin/pengguna', 'Webadmin\Pengguna::index');
$routes->get('/webadmin/pengguna/data', 'Webadmin\Pengguna::data');
$routes->get('/webadmin/pengguna/add', 'Webadmin\Pengguna::add');
$routes->post('/webadmin/pengguna/edit', 'Webadmin\Pengguna::edit');
$routes->post('/webadmin/pengguna/getAll', 'Webadmin\Pengguna::getAll');
$routes->post('/webadmin/pengguna/reset', 'Webadmin\Pengguna::reset');
$routes->post('/webadmin/pengguna/delete', 'Webadmin\Pengguna::delete');
$routes->post('/webadmin/pengguna/addSave', 'Webadmin\Pengguna::addSave');
$routes->post('/webadmin/pengguna/editSave', 'Webadmin\Pengguna::editSave');

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

$routes->get('/webadmin/web/motto', 'Webadmin\Web\Motto::index');
$routes->get('/webadmin/web/motto/edit', 'Webadmin\Web\Motto::edit');
$routes->post('/webadmin/web/motto/save', 'Webadmin\Web\Motto::save');
$routes->post('/webadmin/web/motto/uploadImage', 'Webadmin\Web\Motto::uploadImage');

$routes->get('/webadmin/web/sambutan', 'Webadmin\Web\Sambutan::index');
$routes->get('/webadmin/web/sambutan/edit', 'Webadmin\Web\Sambutan::edit');
$routes->post('/webadmin/web/sambutan/save', 'Webadmin\Web\Sambutan::save');
$routes->post('/webadmin/web/sambutan/uploadImage', 'Webadmin\Web\Sambutan::uploadImage');

$routes->get('/webadmin/web/sejarah', 'Webadmin\Web\Sejarah::index');
$routes->get('/webadmin/web/sejarah/edit', 'Webadmin\Web\Sejarah::edit');
$routes->post('/webadmin/web/sejarah/save', 'Webadmin\Web\Sejarah::save');
$routes->post('/webadmin/web/sejarah/uploadImage', 'Webadmin\Web\Sejarah::uploadImage');

$routes->get('/webadmin/web/skm', 'Webadmin\Web\Skm::index');
$routes->get('/webadmin/web/skm/edit', 'Webadmin\Web\Skm::edit');
$routes->post('/webadmin/web/skm/save', 'Webadmin\Web\Skm::save');
$routes->post('/webadmin/web/skm/uploadImage', 'Webadmin\Web\Skm::uploadImage');

$routes->get('/webadmin/web/struktur', 'Webadmin\Web\Struktur::index');
$routes->get('/webadmin/web/struktur/edit', 'Webadmin\Web\Struktur::edit');
$routes->post('/webadmin/web/struktur/save', 'Webadmin\Web\Struktur::save');
$routes->post('/webadmin/web/struktur/uploadImage', 'Webadmin\Web\Struktur::uploadImage');

$routes->get('/webadmin/web/tugasfungsi', 'Webadmin\Web\Tugasfungsi::index');
$routes->get('/webadmin/web/tugasfungsi/edit', 'Webadmin\Web\Tugasfungsi::edit');
$routes->post('/webadmin/web/tugasfungsi/save', 'Webadmin\Web\Tugasfungsi::save');
$routes->post('/webadmin/web/tugasfungsi/uploadImage', 'Webadmin\Web\Tugasfungsi::uploadImage');

$routes->get('/webadmin/web/visimisi', 'Webadmin\Web\Visimisi::index');
$routes->get('/webadmin/web/visimisi/edit', 'Webadmin\Web\Visimisi::edit');
$routes->post('/webadmin/web/visimisi/save', 'Webadmin\Web\Visimisi::save');
$routes->post('/webadmin/web/visimisi/uploadImage', 'Webadmin\Web\Visimisi::uploadImage');
