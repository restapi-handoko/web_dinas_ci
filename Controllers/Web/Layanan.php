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

    public function simpankritik()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong. ',
                ]
            ],
            'no_hpusr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor handphone tidak boleh kosong. ',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong. ',
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih topik boleh kosong. ',
                ]
            ],
            'isi_kritik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi kritik tidak boleh kosong. ',
                ]
            ],
        ];


        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $resEror = new \stdClass;
            $resEror->nama = $this->validator->getError('nama');
            $resEror->no_hpusr =  $this->validator->getError('no_hpusr');
            $resEror->email =  $this->validator->getError('email');
            $resEror->judul =  $this->validator->getError('judul');
            $resEror->isi_kritik =  $this->validator->getError('isi_kritik');
            $response->error = $resEror;
            return json_encode($response);
        } else {

            $nama = htmlspecialchars($this->request->getVar('nama'), true);
            $nohp = htmlspecialchars($this->request->getVar('no_hpusr'), true);
            $email = htmlspecialchars($this->request->getVar('email'), true);
            $topic = htmlspecialchars($this->request->getVar('judul'), true);
            $isi = htmlspecialchars($this->request->getVar('isi'), true);

            $data = [
                'nama_pengirim' => $nama,
                'nohp_pengirim' => $nohp,
                'email_pengirim' => $email,
                'topic' => $topic,
                'isi' => $isi,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->_db->transBegin();
            try {
                $this->_db->table('_tb_kritik_saran')->insert($data);
            } catch (\Exception $e) {
                $this->_db->transRollback();

                $response = new \stdClass;
                $response->gagal = "Gagal menyimpan data.";
                return json_encode($response);
            }

            if ($this->_db->affectedRows() > 0) {
                $this->_db->transCommit();
                $response = new \stdClass;
                $response->sukses = "Data berhasil disimpan.";
                return json_encode($response);
            } else {
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->gagal = "Gagal menyimpan data";
                return json_encode($response);
            }
        }
    }
}
