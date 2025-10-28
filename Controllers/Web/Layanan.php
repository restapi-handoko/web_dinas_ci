<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Layanan extends BaseController
{
    var $folderImage = 'masterdata';
    private $_db;

    function __construct()
    {
        helper(['text', 'file', 'form', 'session', 'array', 'imageurl', 'web', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }

    public function detail($url)
    {
        // Query database
        $data['data'] = $this->_db->table('_tb_menu_lain a')
            ->select("a.*")
            // ->join("_tb_kategori_pengadaan b", "b.kid = a.k_id")
            ->where('a.status', 1)
            ->where('a.url', $url)
            ->get()
            ->getRowObject();

        if (!$data['data']) {
            return view('404');
        }
        $data['title'] = 'Detail Layanan';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['dataSliderAds'] = $this->_db->table('_tb_sliderads')->where('status', 1)->orderBy('urut', 'ASC')->get()->getResult();
        $data['dataWidgetBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();
        $data['dataWidgetPengumuman'] = $this->_db->table('_tb_pengumuman a')
            ->select("a.*")
            ->where('a.status', 1)
            ->orderBy('a.created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResult();
        return view('web/layanan/detail', $data);
    }
}
