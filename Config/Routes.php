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
$routes->get('/', 'Web\Home::index');
$routes->get('/web/home', 'Web\Home::index');
$routes->get('/web/sejarah', 'Web\Home::sejarah');
$routes->get('/web/visi-misi', 'Web\Home::visiMisi');
$routes->get('/web/struktur', 'Web\Home::struktur');
$routes->get('/web/tugas-fungsi', 'Web\Home::tugasFungsi');

$routes->get('/web/berita', 'Web\Berita::index');
$routes->get('/web/berita/(:segment)/(:segment)', 'Web\Berita::detail/$1/$2');

$routes->get('/web/pengumuman', 'Web\Pengumuman::index');
$routes->get('/web/pengumuman/(:segment)', 'Web\Pengumuman::detail/$1');

$routes->get('/web/agenda', 'Web\Agenda::index');
// $routes->get('/web/agenda/(:segment)', 'Web\Agenda::detail/$1');
$routes->post('/web/agenda/formlihatagenda', 'Web\Agenda::viewAgenda');

$routes->get('/web/foto', 'Web\Foto::index');
$routes->get('/web/foto/(:segment)', 'Web\Foto::detail/$1');
$routes->get('/web/video', 'Web\Video::index');

$routes->get('/web/lihatpoling', 'Web\Home::viewPoling');
$routes->post('/web/ubahpoling', 'Web\Home::postPoling');

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

$routes->get('/webadmin/galeri/foto', 'Webadmin\Galeri\Foto::index');
$routes->get('/webadmin/galeri/foto/data', 'Webadmin\Galeri\Foto::data');
$routes->get('/webadmin/galeri/foto/add', 'Webadmin\Galeri\Foto::add');
$routes->get('/webadmin/galeri/foto/getAlbums', 'Webadmin\Galeri\Foto::getAlbums');
$routes->post('/webadmin/galeri/foto/edit', 'Webadmin\Galeri\Foto::edit');
$routes->post('/webadmin/galeri/foto/getAll', 'Webadmin\Galeri\Foto::getAll');
$routes->post('/webadmin/galeri/foto/delete', 'Webadmin\Galeri\Foto::delete');
$routes->post('/webadmin/galeri/foto/addSave', 'Webadmin\Galeri\Foto::addSave');
$routes->post('/webadmin/galeri/foto/editSave', 'Webadmin\Galeri\Foto::editSave');

$routes->get('/webadmin/galeri/slider', 'Webadmin\Galeri\Slider::index');
$routes->get('/webadmin/galeri/slider/data', 'Webadmin\Galeri\Slider::data');
$routes->get('/webadmin/galeri/slider/add', 'Webadmin\Galeri\Slider::add');
$routes->post('/webadmin/galeri/slider/edit', 'Webadmin\Galeri\Slider::edit');
$routes->post('/webadmin/galeri/slider/getAll', 'Webadmin\Galeri\Slider::getAll');
$routes->post('/webadmin/galeri/slider/delete', 'Webadmin\Galeri\Slider::delete');
$routes->post('/webadmin/galeri/slider/addSave', 'Webadmin\Galeri\Slider::addSave');
$routes->post('/webadmin/galeri/slider/editSave', 'Webadmin\Galeri\Slider::editSave');

$routes->get('/webadmin/galeri/video', 'Webadmin\Galeri\Video::index');
$routes->get('/webadmin/galeri/video/data', 'Webadmin\Galeri\Video::data');
$routes->get('/webadmin/galeri/video/add', 'Webadmin\Galeri\Video::add');
$routes->post('/webadmin/galeri/video/edit', 'Webadmin\Galeri\Video::edit');
$routes->post('/webadmin/galeri/video/getAll', 'Webadmin\Galeri\Video::getAll');
$routes->post('/webadmin/galeri/video/delete', 'Webadmin\Galeri\Video::delete');
$routes->post('/webadmin/galeri/video/addSave', 'Webadmin\Galeri\Video::addSave');
$routes->post('/webadmin/galeri/video/editSave', 'Webadmin\Galeri\Video::editSave');

$routes->get('/webadmin/informasi/agenda', 'Webadmin\Informasi\Agenda::index');
$routes->get('/webadmin/informasi/agenda/data', 'Webadmin\Informasi\Agenda::data');
$routes->get('/webadmin/informasi/agenda/add', 'Webadmin\Informasi\Agenda::add');
$routes->post('/webadmin/informasi/agenda/edit', 'Webadmin\Informasi\Agenda::edit');
$routes->post('/webadmin/informasi/agenda/detail', 'Webadmin\Informasi\Agenda::detail');
$routes->post('/webadmin/informasi/agenda/getAll', 'Webadmin\Informasi\Agenda::getAll');
$routes->post('/webadmin/informasi/agenda/delete', 'Webadmin\Informasi\Agenda::delete');
$routes->post('/webadmin/informasi/agenda/addSave', 'Webadmin\Informasi\Agenda::addSave');
$routes->post('/webadmin/informasi/agenda/editSave', 'Webadmin\Informasi\Agenda::editSave');
$routes->post('/webadmin/informasi/agenda/uploadImage', 'Webadmin\Informasi\Agenda::uploadImage');

$routes->get('/webadmin/informasi/berita', 'Webadmin\Informasi\Berita::index');
$routes->get('/webadmin/informasi/berita/data', 'Webadmin\Informasi\Berita::data');
$routes->get('/webadmin/informasi/berita/add', 'Webadmin\Informasi\Berita::add');
$routes->post('/webadmin/informasi/berita/edit', 'Webadmin\Informasi\Berita::edit');
$routes->post('/webadmin/informasi/berita/detail', 'Webadmin\Informasi\Berita::detail');
$routes->post('/webadmin/informasi/berita/getAll', 'Webadmin\Informasi\Berita::getAll');
$routes->post('/webadmin/informasi/berita/delete', 'Webadmin\Informasi\Berita::delete');
$routes->post('/webadmin/informasi/berita/addSave', 'Webadmin\Informasi\Berita::addSave');
$routes->post('/webadmin/informasi/berita/editSave', 'Webadmin\Informasi\Berita::editSave');
$routes->post('/webadmin/informasi/berita/uploadImage', 'Webadmin\Informasi\Berita::uploadImage');

$routes->get('/webadmin/informasi/pengadaan', 'Webadmin\Informasi\Pengadaan::index');
$routes->get('/webadmin/informasi/pengadaan/data', 'Webadmin\Informasi\Pengadaan::data');
$routes->get('/webadmin/informasi/pengadaan/add', 'Webadmin\Informasi\Pengadaan::add');
$routes->post('/webadmin/informasi/pengadaan/edit', 'Webadmin\Informasi\Pengadaan::edit');
$routes->post('/webadmin/informasi/pengadaan/detail', 'Webadmin\Informasi\Pengadaan::detail');
$routes->post('/webadmin/informasi/pengadaan/getAll', 'Webadmin\Informasi\Pengadaan::getAll');
$routes->post('/webadmin/informasi/pengadaan/delete', 'Webadmin\Informasi\Pengadaan::delete');
$routes->post('/webadmin/informasi/pengadaan/addSave', 'Webadmin\Informasi\Pengadaan::addSave');
$routes->post('/webadmin/informasi/pengadaan/editSave', 'Webadmin\Informasi\Pengadaan::editSave');
$routes->post('/webadmin/informasi/pengadaan/uploadImage', 'Webadmin\Informasi\Pengadaan::uploadImage');

$routes->get('/webadmin/informasi/dokumen', 'Webadmin\Informasi\Dokumen::index');
$routes->get('/webadmin/informasi/dokumen/data', 'Webadmin\Informasi\Dokumen::data');
$routes->get('/webadmin/informasi/dokumen/add', 'Webadmin\Informasi\Dokumen::add');
$routes->post('/webadmin/informasi/dokumen/edit', 'Webadmin\Informasi\Dokumen::edit');
$routes->post('/webadmin/informasi/dokumen/detail', 'Webadmin\Informasi\Dokumen::detail');
$routes->post('/webadmin/informasi/dokumen/getAll', 'Webadmin\Informasi\Dokumen::getAll');
$routes->post('/webadmin/informasi/dokumen/delete', 'Webadmin\Informasi\Dokumen::delete');
$routes->post('/webadmin/informasi/dokumen/addSave', 'Webadmin\Informasi\Dokumen::addSave');
$routes->post('/webadmin/informasi/dokumen/editSave', 'Webadmin\Informasi\Dokumen::editSave');

$routes->get('/webadmin/informasi/katberita', 'Webadmin\Informasi\Katberita::index');
$routes->get('/webadmin/informasi/katberita/data', 'Webadmin\Informasi\Katberita::data');
$routes->get('/webadmin/informasi/katberita/add', 'Webadmin\Informasi\Katberita::add');
$routes->post('/webadmin/informasi/katberita/edit', 'Webadmin\Informasi\Katberita::edit');
$routes->post('/webadmin/informasi/katberita/detail', 'Webadmin\Informasi\Katberita::detail');
$routes->post('/webadmin/informasi/katberita/getAll', 'Webadmin\Informasi\Katberita::getAll');
$routes->post('/webadmin/informasi/katberita/delete', 'Webadmin\Informasi\Katberita::delete');
$routes->post('/webadmin/informasi/katberita/addSave', 'Webadmin\Informasi\Katberita::addSave');
$routes->post('/webadmin/informasi/katberita/editSave', 'Webadmin\Informasi\Katberita::editSave');

$routes->get('/webadmin/informasi/katpengadaan', 'Webadmin\Informasi\Katpengadaan::index');
$routes->get('/webadmin/informasi/katpengadaan/data', 'Webadmin\Informasi\Katpengadaan::data');
$routes->get('/webadmin/informasi/katpengadaan/add', 'Webadmin\Informasi\Katpengadaan::add');
$routes->post('/webadmin/informasi/katpengadaan/edit', 'Webadmin\Informasi\Katpengadaan::edit');
$routes->post('/webadmin/informasi/katpengadaan/detail', 'Webadmin\Informasi\Katpengadaan::detail');
$routes->post('/webadmin/informasi/katpengadaan/getAll', 'Webadmin\Informasi\Katpengadaan::getAll');
$routes->post('/webadmin/informasi/katpengadaan/delete', 'Webadmin\Informasi\Katpengadaan::delete');
$routes->post('/webadmin/informasi/katpengadaan/addSave', 'Webadmin\Informasi\Katpengadaan::addSave');
$routes->post('/webadmin/informasi/katpengadaan/editSave', 'Webadmin\Informasi\Katpengadaan::editSave');

$routes->get('/webadmin/informasi/katregulasi', 'Webadmin\Informasi\Katregulasi::index');
$routes->get('/webadmin/informasi/katregulasi/data', 'Webadmin\Informasi\Katregulasi::data');
$routes->get('/webadmin/informasi/katregulasi/add', 'Webadmin\Informasi\Katregulasi::add');
$routes->post('/webadmin/informasi/katregulasi/edit', 'Webadmin\Informasi\Katregulasi::edit');
$routes->post('/webadmin/informasi/katregulasi/detail', 'Webadmin\Informasi\Katregulasi::detail');
$routes->post('/webadmin/informasi/katregulasi/getAll', 'Webadmin\Informasi\Katregulasi::getAll');
$routes->post('/webadmin/informasi/katregulasi/delete', 'Webadmin\Informasi\Katregulasi::delete');
$routes->post('/webadmin/informasi/katregulasi/addSave', 'Webadmin\Informasi\Katregulasi::addSave');
$routes->post('/webadmin/informasi/katregulasi/editSave', 'Webadmin\Informasi\Katregulasi::editSave');

$routes->get('/webadmin/informasi/pengumuman', 'Webadmin\Informasi\Pengumuman::index');
$routes->get('/webadmin/informasi/pengumuman/data', 'Webadmin\Informasi\Pengumuman::data');
$routes->get('/webadmin/informasi/pengumuman/add', 'Webadmin\Informasi\Pengumuman::add');
$routes->post('/webadmin/informasi/pengumuman/edit', 'Webadmin\Informasi\Pengumuman::edit');
$routes->post('/webadmin/informasi/pengumuman/detail', 'Webadmin\Informasi\Pengumuman::detail');
$routes->post('/webadmin/informasi/pengumuman/getAll', 'Webadmin\Informasi\Pengumuman::getAll');
$routes->post('/webadmin/informasi/pengumuman/delete', 'Webadmin\Informasi\Pengumuman::delete');
$routes->post('/webadmin/informasi/pengumuman/addSave', 'Webadmin\Informasi\Pengumuman::addSave');
$routes->post('/webadmin/informasi/pengumuman/editSave', 'Webadmin\Informasi\Pengumuman::editSave');
$routes->post('/webadmin/informasi/pengumuman/uploadImage', 'Webadmin\Informasi\Pengumuman::uploadImage');

$routes->get('/webadmin/informasi/regulasi', 'Webadmin\Informasi\Regulasi::index');
$routes->get('/webadmin/informasi/regulasi/data', 'Webadmin\Informasi\Regulasi::data');
$routes->get('/webadmin/informasi/regulasi/add', 'Webadmin\Informasi\Regulasi::add');
$routes->post('/webadmin/informasi/regulasi/edit', 'Webadmin\Informasi\Regulasi::edit');
$routes->post('/webadmin/informasi/regulasi/detail', 'Webadmin\Informasi\Regulasi::detail');
$routes->post('/webadmin/informasi/regulasi/getAll', 'Webadmin\Informasi\Regulasi::getAll');
$routes->post('/webadmin/informasi/regulasi/delete', 'Webadmin\Informasi\Regulasi::delete');
$routes->post('/webadmin/informasi/regulasi/addSave', 'Webadmin\Informasi\Regulasi::addSave');
$routes->post('/webadmin/informasi/regulasi/editSave', 'Webadmin\Informasi\Regulasi::editSave');

$routes->get('/webadmin/informasi/sop', 'Webadmin\Informasi\Sop::index');
$routes->get('/webadmin/informasi/sop/data', 'Webadmin\Informasi\Sop::data');
$routes->get('/webadmin/informasi/sop/add', 'Webadmin\Informasi\Sop::add');
$routes->post('/webadmin/informasi/sop/edit', 'Webadmin\Informasi\Sop::edit');
$routes->post('/webadmin/informasi/sop/detail', 'Webadmin\Informasi\Sop::detail');
$routes->post('/webadmin/informasi/sop/getAll', 'Webadmin\Informasi\Sop::getAll');
$routes->post('/webadmin/informasi/sop/delete', 'Webadmin\Informasi\Sop::delete');
$routes->post('/webadmin/informasi/sop/addSave', 'Webadmin\Informasi\Sop::addSave');
$routes->post('/webadmin/informasi/sop/editSave', 'Webadmin\Informasi\Sop::editSave');
$routes->post('/webadmin/informasi/sop/uploadImage', 'Webadmin\Informasi\Sop::uploadImage');
