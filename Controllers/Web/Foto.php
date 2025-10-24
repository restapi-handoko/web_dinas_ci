<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Foto extends BaseController
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
        $data['dataAlbum'] = $this->_db->table('_tb_foto')
            ->select("*, count(album) as jumlah")
            ->where('status', 1)
            ->groupBy('album')
            ->orderBy('album', 'ASC')
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

        return view('web/foto/index', $data);
    }

    public function detail($album)
    {
        // Query database
        $data['fotos'] = $this->_db->table('_tb_foto')
            ->select("*")
            ->where('status', 1)
            ->where('album', $album)
            ->orderBy('created_at', 'DESC')
            ->get()->getResult();

        if (!$data['fotos']) {
            return view('404');
        }
        $data['title'] = 'Detail Album';
        $data['admin'] = false;
        $data['album'] = $album;

        $data['footer'] = getFooterPublik();
        $data['dataBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(10)
            ->get()->getResult();
        return view('web/foto/detail', $data);
    }
}
