<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Home extends BaseController
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
        $data['title'] = 'Dashboard';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['dataSliders'] = $this->_db->table('_tb_slider')->where('status', 1)->orderBy('urut', 'ASC')->get()->getResult();
        $data['dataBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')
            ->limit(5)
            ->get()->getResult();

        return view('web/home/index', $data);
    }

    public function sejarah()
    {
        $data['title'] = 'Sejarah Instansi';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['data'] = $this->_db->table('_web_profil')->where('id', 1)->get()->getRowObject();
        $data['dataBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')->get()->getResult();

        return view('web/home/sejarah', $data);
    }

    public function visiMisi()
    {
        $data['title'] = 'Visi & Misi Instansi';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['data'] = $this->_db->table('_web_profil')->where('id', 2)->get()->getRowObject();
        $data['dataBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')->get()->getResult();

        return view('web/home/visi-misi', $data);
    }

    public function struktur()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['data'] = $this->_db->table('_web_profil')->where('id', 5)->get()->getRowObject();
        $data['dataBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')->get()->getResult();

        return view('web/home/struktur', $data);
    }

    public function tugasFungsi()
    {
        $data['title'] = 'Tugas Pokok & Fungsi';
        $data['admin'] = false;

        $data['footer'] = getFooterPublik();
        $data['data'] = $this->_db->table('_web_profil')->where('id', 4)->get()->getRowObject();
        $data['dataBerita'] = $this->_db->table('_tb_berita a')
            ->select("a.*, b.kategori")
            ->join("_tb_kategori_berita b", "b.kid = a.k_id")
            ->where('a.status', 1)->orderBy('a.tanggal', 'DESC')->get()->getResult();

        return view('web/home/tugas-fungsi', $data);
    }

    public function postPoling()
    {
        $nilaiPoling = htmlspecialchars($this->request->getVar('poling_id'), true);

        if ((int)$nilaiPoling > 0) {
            $this->_db->transBegin();
            $data = [
                'nilai' => $nilaiPoling,
                'created_at' => date('Y-m-d H:i:s')
            ];

            try {
                $this->_db->table('_tb_polling_layanan')->insert($data);
                if ($this->_db->affectedRows() > 0) {
                    $this->_db->transCommit();
                    $response = new \stdClass;
                    $response->sukses = "Polling berhasil disimpan.";
                    return json_encode($response);
                } else {
                    $this->_db->transRollback();
                    $response = new \stdClass;
                    $response->gagal = "Gagal menyimpan polling.";
                    return json_encode($response);
                }
            } catch (\Throwable $th) {
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->gagal = "Gagal menyimpan polling.";
                return json_encode($response);
            }
        }

        $response = new \stdClass;
        $response->error = "Permintaan diizinkan";
        return json_encode($response);
    }
}
