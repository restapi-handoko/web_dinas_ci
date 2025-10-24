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
        $data['dataBeritas'] = $this->_db->table('_tb_berita')->where('status', 1)->orderBy('tanggal', 'DESC')->get()->getResult();

        return view('web/home/index', $data);
    }
}
