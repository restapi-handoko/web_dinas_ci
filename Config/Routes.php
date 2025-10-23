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

$routes->get('/webadmin/setting/appslider', 'Webadmin\Setting\Appslider::index');
$routes->get('/webadmin/setting/appslider/data', 'Webadmin\Setting\Appslider::data');
$routes->get('/webadmin/setting/appslider/add', 'Webadmin\Setting\Appslider::add');
$routes->post('/webadmin/setting/appslider/edit', 'Webadmin\Setting\Appslider::edit');
$routes->post('/webadmin/setting/appslider/getAll', 'Webadmin\Setting\Appslider::getAll');
$routes->post('/webadmin/setting/appslider/delete', 'Webadmin\Setting\Appslider::delete');
$routes->post('/webadmin/setting/appslider/addSave', 'Webadmin\Setting\Appslider::addSave');
$routes->post('/webadmin/setting/appslider/editSave', 'Webadmin\Setting\Appslider::editSave');

$routes->get('/webadmin/setting/hakaccess', 'Webadmin\Setting\Hakaccess::index');
$routes->get('/webadmin/setting/hakaccess/data', 'Webadmin\Setting\Hakaccess::data');
$routes->post('/webadmin/setting/hakaccess/edit', 'Webadmin\Setting\Hakaccess::edit');
$routes->post('/webadmin/setting/hakaccess/getAll', 'Webadmin\Setting\Hakaccess::getAll');
$routes->post('/webadmin/setting/hakaccess/save', 'Webadmin\Setting\Hakaccess::save');

$routes->get('/webadmin/setting/menulain', 'Webadmin\Setting\Menulain::index');
$routes->get('/webadmin/setting/menulain/data', 'Webadmin\Setting\Menulain::data');
$routes->get('/webadmin/setting/menulain/add', 'Webadmin\Setting\Menulain::add');
$routes->post('/webadmin/setting/menulain/edit', 'Webadmin\Setting\Menulain::edit');
$routes->post('/webadmin/setting/menulain/detail', 'Webadmin\Setting\Menulain::detail');
$routes->post('/webadmin/setting/menulain/getAll', 'Webadmin\Setting\Menulain::getAll');
$routes->post('/webadmin/setting/menulain/delete', 'Webadmin\Setting\Menulain::delete');
$routes->post('/webadmin/setting/menulain/addSave', 'Webadmin\Setting\Menulain::addSave');
$routes->post('/webadmin/setting/menulain/editSave', 'Webadmin\Setting\Menulain::editSave');
$routes->post('/webadmin/setting/menulain/uploadImage', 'Webadmin\Setting\Menulain::uploadImage');

$routes->get('/webadmin/setting/pengguna', 'Webadmin\Setting\Pengguna::index');
$routes->get('/webadmin/setting/pengguna/data', 'Webadmin\Setting\Pengguna::data');
$routes->get('/webadmin/setting/pengguna/add', 'Webadmin\Setting\Pengguna::add');
$routes->post('/webadmin/setting/pengguna/edit', 'Webadmin\Setting\Pengguna::edit');
$routes->post('/webadmin/setting/pengguna/getAll', 'Webadmin\Setting\Pengguna::getAll');
$routes->post('/webadmin/setting/pengguna/reset', 'Webadmin\Setting\Pengguna::reset');
$routes->post('/webadmin/setting/pengguna/delete', 'Webadmin\Setting\Pengguna::delete');
$routes->post('/webadmin/setting/pengguna/addSave', 'Webadmin\Setting\Pengguna::addSave');
$routes->post('/webadmin/setting/pengguna/editSave', 'Webadmin\Setting\Pengguna::editSave');

$routes->get('/webadmin/setting/portallayanan', 'Webadmin\Setting\Portallayanan::index');
$routes->get('/webadmin/setting/portallayanan/data', 'Webadmin\Setting\Portallayanan::data');
$routes->get('/webadmin/setting/portallayanan/add', 'Webadmin\Setting\Portallayanan::add');
$routes->post('/webadmin/setting/portallayanan/edit', 'Webadmin\Setting\Portallayanan::edit');
$routes->post('/webadmin/setting/portallayanan/getAll', 'Webadmin\Setting\Portallayanan::getAll');
$routes->post('/webadmin/setting/portallayanan/delete', 'Webadmin\Setting\Portallayanan::delete');
$routes->post('/webadmin/setting/portallayanan/addSave', 'Webadmin\Setting\Portallayanan::addSave');
$routes->post('/webadmin/setting/portallayanan/editSave', 'Webadmin\Setting\Portallayanan::editSave');

$routes->get('/webadmin/setting/website', 'Webadmin\Setting\Website::index');
$routes->get('/webadmin/setting/website/data', 'Webadmin\Setting\Website::data');
$routes->post('/webadmin/setting/website/edit', 'Webadmin\Setting\Website::edit');
$routes->post('/webadmin/setting/website/save', 'Webadmin\Setting\Website::save');
$routes->post('/webadmin/setting/website/getAll', 'Webadmin\Setting\Website::getAll');

$routes->get('/webadmin/galeri/foto', 'Webadmin\Galer\Foto::index');
$routes->get('/webadmin/galeri/foto/data', 'Webadmin\Galer\Foto::data');
$routes->get('/webadmin/galeri/foto/add', 'Webadmin\Galer\Foto::add');
$routes->post('/webadmin/galeri/foto/edit', 'Webadmin\Galer\Foto::edit');
$routes->post('/webadmin/galeri/foto/getAll', 'Webadmin\Galer\Foto::getAll');
$routes->post('/webadmin/galeri/foto/delete', 'Webadmin\Galer\Foto::delete');
$routes->post('/webadmin/galeri/foto/addSave', 'Webadmin\Galer\Foto::addSave');
$routes->post('/webadmin/galeri/foto/editSave', 'Webadmin\Galer\Foto::editSave');

$routes->get('/webadmin/galeri/slider', 'Webadmin\Galer\Slider::index');
$routes->get('/webadmin/galeri/slider/data', 'Webadmin\Galer\Slider::data');
$routes->get('/webadmin/galeri/slider/add', 'Webadmin\Galer\Slider::add');
$routes->post('/webadmin/galeri/slider/edit', 'Webadmin\Galer\Slider::edit');
$routes->post('/webadmin/galeri/slider/getAll', 'Webadmin\Galer\Slider::getAll');
$routes->post('/webadmin/galeri/slider/delete', 'Webadmin\Galer\Slider::delete');
$routes->post('/webadmin/galeri/slider/addSave', 'Webadmin\Galer\Slider::addSave');
$routes->post('/webadmin/galeri/slider/editSave', 'Webadmin\Galer\Slider::editSave');

$routes->get('/webadmin/galeri/video', 'Webadmin\Galer\Video::index');
$routes->get('/webadmin/galeri/video/data', 'Webadmin\Galer\Video::data');
$routes->get('/webadmin/galeri/video/add', 'Webadmin\Galer\Video::add');
$routes->post('/webadmin/galeri/video/edit', 'Webadmin\Galer\Video::edit');
$routes->post('/webadmin/galeri/video/getAll', 'Webadmin\Galer\Video::getAll');
$routes->post('/webadmin/galeri/video/delete', 'Webadmin\Galer\Video::delete');
$routes->post('/webadmin/galeri/video/addSave', 'Webadmin\Galer\Video::addSave');
$routes->post('/webadmin/galeri/video/editSave', 'Webadmin\Galer\Video::editSave');
