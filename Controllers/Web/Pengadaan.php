<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Pengadaan extends BaseController
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
        $data['title'] = 'Informasi Pengadaan';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['dataWidgetBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();

        $katPengadaan = $this->_db->table('_tb_kategori_pengadaan')->where('status', 1)->get()->getResult();

        $data['dataPengadaan'] = [];

        if (count($katPengadaan) > 0) {
            $perPage = 10;
            $currentPage = $this->request->getGet('page') ? (int)$this->request->getGet('page') : 1;
            foreach ($katPengadaan as $key => $value) {
                $countPengadaan[$value->kid] = $this->_db->table('_tb_pengadaan')->where('status', 1)->where('k_id', $value->kid)->countAllResults();

                // Get current page from URL, default to 1
                $offset = ($currentPage - 1) * $perPage;

                // Calculate total pages
                $totalPages[$value->kid] = ceil($countPengadaan[$value->kid] / $perPage);

                $pengadaan = $value;

                // Get data dengan limit dan offset
                $pengadaan->items = $this->_db->table('_tb_pengadaan a')
                    ->select("a.*, b.kategori")
                    ->join("_tb_kategori_pengadaan b", "b.kid = a.k_id")
                    ->where('a.status', 1)
                    ->where('a.k_id', $value->kid)
                    ->orderBy('a.created_at', 'DESC')
                    ->limit($perPage, $offset)
                    ->get()
                    ->getResult();

                // Data untuk pagination
                $pengadaan->pagination = [
                    'currentPage' => $currentPage,
                    'totalPages' => $totalPages[$value->kid],
                    'totalItems' => $countPengadaan[$value->kid],
                    'perPage' => $perPage,
                    'hasPrevious' => $currentPage > 1,
                    'hasNext' => $currentPage < $totalPages
                ];

                $data['dataPengadaan'][] = $pengadaan;
            }
        }

        return view('web/pengadaan/index', $data);
    }

    public function detail($url)
    {
        // Query database
        $data['pengadaan'] = $this->_db->table('_tb_pengadaan a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_pengadaan b", "b.kid = a.k_id")
            ->where('a.status', 1)
            ->where('a.url', $url)
            ->get()
            ->getRowObject();

        if (!$data['pengadaan']) {
            return view('404');
        }
        $data['title'] = 'Detail Pengadaan';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['dataWidgetBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();
        return view('web/pengadaan/detail', $data);
    }
}
