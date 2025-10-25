<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Agenda extends BaseController
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
        $data['title'] = 'Agenda';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['dataWidgetBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();

        $countBerita = $this->_db->table('_tb_agenda')->where('status', 1)->countAllResults();
        $perPage = 10;

        // Get current page from URL, default to 1
        $currentPage = $this->request->getGet('page') ? (int)$this->request->getGet('page') : 1;
        $offset = ($currentPage - 1) * $perPage;

        // Calculate total pages
        $totalPages = ceil($countBerita / $perPage);

        // Get data dengan limit dan offset
        $data['dataAgenda'] = $this->_db->table('_tb_agenda a')
            ->select("a.*")
            ->where('a.status', 1)
            ->orderBy('a.created_at', 'DESC')
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

        return view('web/agenda/index', $data);
    }

    public function detail($url)
    {
        // Query database
        $data['agenda'] = $this->_db->table('_tb_agenda a')
            ->select("a.*")
            ->where('a.url', $url)
            ->where('a.status', 1)
            ->get()
            ->getRowObject();

        if (!$data['agenda']) {
            return view('404');
        }
        $data['title'] = 'Detail Agenda';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['dataWidgetBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();
        return view('web/agenda/detail', $data);
    }

    public function viewAgenda()
    {
        $url = htmlspecialchars($this->request->getVar('agenda_id'), true);

        $x['agenda'] = $this->_db->table('_tb_agenda')->where('url', $url)->get()->getRowObject();

        if (!$x['agenda']) {

            $response = new \stdClass;
            $response->message = "Agenda tidak ditemukan";
            return json_encode($response);
        }

        $response = new \stdClass;
        $response->sukses = view('web/agenda/view', $x);
        return json_encode($response);
    }
}
