<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Video extends BaseController
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
        $data['title'] = 'Video';
        $data['admin'] = false;
        $data['dataWidgetBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();

        $data['footer'] = getFooterPublik();
        $data['dataVideo'] = $this->_db->table('_tb_video')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()->getResult();

        // $countBerita = $this->_db->table('_tb_berita')->where('status', 1)->countAllResults();
        // $perPage = 10;

        // // Get current page from URL, default to 1
        // $currentPage = $this->request->getGet('page') ? (int)$this->request->getGet('page') : 1;
        // $offset = ($currentPage - 1) * $perPage;

        // // Calculate total pages
        // $totalPages = ceil($countBerita / $perPage);

        // // Get data dengan limit dan offset
        // $data['dataBeritas'] = $this->_db->table('_tb_berita a')
        //     ->select("a.*, b.kategori")
        //     ->join("_tb_kategori_berita b", "b.kid = a.k_id")
        //     ->where('a.status', 1)
        //     ->orderBy('a.tanggal', 'DESC')
        //     ->limit($perPage, $offset)
        //     ->get()
        //     ->getResult();

        // // Data untuk pagination
        // $data['pagination'] = [
        //     'currentPage' => $currentPage,
        //     'totalPages' => $totalPages,
        //     'totalItems' => $countBerita,
        //     'perPage' => $perPage,
        //     'hasPrevious' => $currentPage > 1,
        //     'hasNext' => $currentPage < $totalPages
        // ];

        return view('web/galeri/video/index', $data);
    }
}
