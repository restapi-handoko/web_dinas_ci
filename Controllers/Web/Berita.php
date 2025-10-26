<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Berita extends BaseController
{
    var $folderImage = 'masterdata';
    private $_db;

    function __construct()
    {
        helper(['text', 'file', 'form', 'session', 'array', 'imageurl', 'web', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }

    public function index()
    {
        $data['title'] = 'Berita';
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

        $countBerita = $this->_db->table('_tb_berita')->where('status', 1)->countAllResults();
        $perPage = 10;

        // Get current page from URL, default to 1
        $currentPage = $this->request->getGet('page') ? (int)$this->request->getGet('page') : 1;
        $offset = ($currentPage - 1) * $perPage;

        // Calculate total pages
        $totalPages = ceil($countBerita / $perPage);

        // Get data dengan limit dan offset
        $data['dataBeritas'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)
            ->orderBy('a.tanggal', 'DESC')
            ->limit($perPage, $offset)
            ->get()
            ->getResult();

        // Data untuk pagination
        $data['pagination'] = [
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalItems' => $countBerita,
            'perPage' => $perPage,
            'hasPrevious' => $currentPage > 1,
            'hasNext' => $currentPage < $totalPages
        ];

        return view('web/berita/index', $data);
    }

    public function detail($tgl, $url)
    {
        // Validasi tambahan di controller jika perlu
        if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $tgl)) {
            return view('404');
        }

        // Query database
        $data['berita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.tanggal', $tgl)
            ->where('a.url', $url)
            ->where('a.status', 1)
            ->get()
            ->getRowObject();

        if (!$data['berita']) {
            return view('404');
        }
        $data['title'] = 'Berita';
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
        return view('web/berita/detail', $data);
    }
}
