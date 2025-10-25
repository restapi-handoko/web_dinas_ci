<?php

namespace App\Controllers\Webadmin\Informasi;

use App\Controllers\BaseController;
use App\Models\Webadmin\DokumenModel;
use Config\Services;
use App\Libraries\Profilelib;

class Dokumen extends BaseController
{
    var $folderImage = 'masterdata';
    private $_db;
    private $model;

    function __construct()
    {
        helper(['text', 'file', 'form', 'session', 'array', 'imageurl', 'web', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }

    public function getAll()
    {
        $request = Services::request();
        $datamodel = new DokumenModel($request);


        $lists = $datamodel->get_datatables();
        // $lists = [];
        $data = [];
        $no = $request->getPost("start");
        foreach ($lists as $list) {
            $no++;
            $row = [];

            $row[] = $no;
            $action = '<a href="javascript:actionEdit(\'' . $list->id . '\', \'' . str_replace("'", "", $list->judul) . '\');"><button type="button" class="btn btn-secondary btn-sm btn-rounded waves-effect waves-light mr-2 mb-1">
                        <i class="bx bx-edit font-size-16 align-middle"></i></button>
                        </a>
                        <a href="javascript:actionHapus(\'' . $list->id . '\', \'' . str_replace("'", "", $list->judul) . '\');" class="delete" id="delete"><button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light mr-2 mb-1">
                        <i class="bx bx-trash font-size-16 align-middle"></i></button>
                        </a>';
            // Handle multiple files lampiran
            $lampiran = "-";
            if ($list->lampiran !== null) {
                $files = json_decode($list->lampiran, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($files) && count($files) > 0) {
                    $lampiran = '';
                    foreach ($files as $index => $file) {
                        $fileName = isset($file['custom_name']) ? $file['custom_name'] : (isset($file['original_name']) ? $file['original_name'] : 'File ' . ($index + 1));
                        $savedName = isset($file['saved_name']) ? $file['saved_name'] : $file;
                        $lampiran .= '<a target="_blank" href="' . base_url() . '/uploads/dokumen/' . $savedName . '" class="badge badge-pill badge-soft-success mr-1 mb-1" title="' . $fileName . '">' . $fileName . '</a>&nbsp;&nbsp;';
                    }
                } else {
                    // Fallback untuk data lama (single file)
                    $lampiran = '<a target="_blank" href="' . base_url() . '/uploads/dokumen/' . $list->lampiran . '" class="badge badge-pill badge-soft-success">Lampiran</a>';
                }
            }
            $row[] = $action;
            switch ((int)$list->status) {
                case 1:
                    $row[] = '<span class="badge badge-pill badge-soft-success">Terpublish</span>';
                    break;
                default:
                    $row[] = '<span class="badge badge-pill badge-soft-danger">Tidak Terpublish</span>';
                    break;
            }
            $row[] = $list->judul;
            $row[] = $list->tahun;
            $row[] = $lampiran;

            $data[] = $row;
        }
        $output = [
            "draw" => $request->getPost('draw'),
            // "recordsTotal" => 0,
            // "recordsFiltered" => 0,
            "recordsTotal" => $datamodel->count_all(),
            "recordsFiltered" => $datamodel->count_filtered(),
            "data" => $data
        ];
        echo json_encode($output);
    }

    public function index()
    {
        return redirect()->to(base_url('webadmin/informasi/dokumen/data'));
    }

    public function data()
    {
        $data['title'] = 'Dokumen';
        $Profilelib = new Profilelib();
        $user = $Profilelib->user();
        if ($user->code != 200) {
            delete_cookie('jwt');
            session()->destroy();
            return redirect()->to(base_url('auth'));
        }

        $data['user'] = $user->data;

        return view('webadmin/informasi/dokumen/index', $data);
    }

    public function add()
    {
        $Profilelib = new Profilelib();
        $user = $Profilelib->user();
        if ($user->code != 200) {
            delete_cookie('jwt');
            session()->destroy();
            $response = new \stdClass;
            $response->status = 401;
            $response->message = "Permintaan diizinkan";
            return json_encode($response);
        }

        $response = new \stdClass;
        $response->status = 200;
        $response->message = "Permintaan diizinkan";
        $response->data = view('webadmin/informasi/dokumen/add');
        return json_encode($response);
    }

    public function edit()
    {
        // if ($this->request->getMethod() != 'post') {
        //     $response = new \stdClass;
        //     $response->status = 400;
        //     $response->message = "Permintaan tidak diizinkan";
        //     return json_encode($response);
        // }

        $rules = [
            'id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Id tidak boleh kosong. ',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('id');
            return json_encode($response);
        } else {
            $id = htmlspecialchars($this->request->getVar('id'), true);

            $current = $this->_db->table('_tb_dokumen')
                ->where('id', $id)->get()->getRowObject();

            if ($current) {
                $data['data'] = $current;
                $response = new \stdClass;
                $response->status = 200;
                $response->message = "Permintaan diizinkan";
                $response->data = view('webadmin/informasi/dokumen/edit', $data);
                return json_encode($response);
            } else {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data tidak ditemukan";
                return json_encode($response);
            }
        }
    }

    public function delete()
    {
        // if ($this->request->getMethod() != 'post') {
        //     $response = new \stdClass;
        //     $response->status = 400;
        //     $response->message = "Permintaan tidak diizinkan";
        //     return json_encode($response);
        // }

        $rules = [
            'id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Id tidak boleh kosong. ',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('id');
            return json_encode($response);
        } else {
            $id = htmlspecialchars($this->request->getVar('id'), true);

            $Profilelib = new Profilelib();
            $user = $Profilelib->user();
            if ($user->code != 200) {
                delete_cookie('jwt');
                session()->destroy();
                $response = new \stdClass;
                $response->status = 401;
                $response->message = "Permintaan diizinkan";
                return json_encode($response);
            }
            $current = $this->_db->table('_tb_dokumen')
                ->where('id', $id)->get()->getRowObject();

            if ($current) {
                $this->_db->transBegin();
                try {
                    $this->_db->table('_tb_dokumen')->where('id', $id)->delete();

                    if ($this->_db->affectedRows() > 0) {
                        if ($current->lampiran !== null) {
                            try {
                                $dir = FCPATH . "uploads/dokumen";
                                unlink($dir . '/' . $current->lampiran);
                            } catch (\Throwable $err) {
                            }
                        }
                        $this->_db->transCommit();
                        $response = new \stdClass;
                        $response->status = 200;
                        $response->message = "Data berhasil dihapus.";
                        return json_encode($response);
                    } else {
                        $this->_db->transRollback();
                        $response = new \stdClass;
                        $response->status = 400;
                        $response->message = "Data gagal dihapus.";
                        return json_encode($response);
                    }
                } catch (\Throwable $th) {
                    $this->_db->transRollback();
                    $response = new \stdClass;
                    $response->status = 400;
                    $response->message = "Data gagal dihapus.";
                    return json_encode($response);
                }
            } else {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data tidak ditemukan";
                return json_encode($response);
            }
        }
    }

    public function addSave()
    {
        // if ($this->request->getMethod() != 'post') {
        //     $response = new \stdClass;
        //     $response->status = 400;
        //     $response->message = "Permintaan tidak diizinkan";
        //     return json_encode($response);
        // }

        $rules = [
            'judul' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Judul dokumen tidak boleh kosong. ',
                ]
            ],
            'tahun' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tahun tidak boleh kosong. ',
                ]
            ],
            'sumber_data' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Sumber data tidak boleh kosong. ',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong. ',
                ]
            ],
            '_file_lampiran.*' => [
                'rules' => 'uploaded[_file_lampiran.0]|max_size[_file_lampiran,5148]|mime_in[_file_lampiran,image/jpeg,image/jpg,image/png,application/pdf]',
                'errors' => [
                    'uploaded' => 'Pilih minimal satu file. ',
                    'max_size' => 'Ukuran file terlalu besar. ',
                    'mime_in' => 'Ekstensi yang anda upload harus berekstensi gambar/pdf. '
                ]
            ],
            'file_names.*' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama file tidak boleh kosong. '
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('judul')
                . $this->validator->getError('tahun')
                . $this->validator->getError('sumber_data')
                . $this->validator->getError('status')
                . $this->validator->getError('_file_lampiran.*')
                . $this->validator->getError('file_names.*');
            return json_encode($response);
        } else {
            $Profilelib = new Profilelib();
            $user = $Profilelib->user();
            if ($user->code != 200) {
                delete_cookie('jwt');
                session()->destroy();
                $response = new \stdClass;
                $response->status = 401;
                $response->message = "Permintaan diizinkan";
                return json_encode($response);
            }

            $judul = htmlspecialchars($this->request->getVar('judul'), true);
            $tahun = htmlspecialchars($this->request->getVar('tahun'), true);
            $sumber_data = htmlspecialchars($this->request->getVar('sumber_data'), true);
            $status = htmlspecialchars($this->request->getVar('status'), true);

            $slug = generateSlug($judul);

            $cekData = $this->_db->table('_tb_dokumen')->where(['url' => $slug . '.html'])->get()->getRowObject();

            if ($cekData) {
                $slug = $slug . "-" . date('Y-m-d');
            }

            $data = [
                'judul' => $judul,
                'tahun' => $tahun,
                'sumber_data' => $sumber_data,
                'status' => $status,
                'url' => $slug . '.html',
                'user_created' => $user->data->uid,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $dir = FCPATH . "uploads/dokumen";
            // Handle multiple files dengan nama custom
            $lampiranFiles = $this->request->getFiles();
            $fileNames = $this->request->getPost('file_names');
            $uploadedFiles = [];
            $failedUploads = [];

            foreach ($lampiranFiles['_file_lampiran'] as $index => $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $originalName = $file->getName();
                    $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);
                    $customFileName = $fileNames[$index] . '.' . $fileExtension;
                    $newName = _create_name_foto($customFileName);

                    $file->move($dir, $newName);
                    $uploadedFiles[] = [
                        'original_name' => $originalName,
                        'custom_name' => $fileNames[$index],
                        'saved_name' => $newName,
                        'extension' => $fileExtension
                    ];
                } else {
                    $failedUploads[] = $file->getErrorString();
                }
            }

            // Jika ada file yang gagal diupload
            if (!empty($failedUploads)) {
                // Hapus file yang sudah berhasil diupload
                foreach ($uploadedFiles as $uploadedFile) {
                    if (file_exists($dir . '/' . $uploadedFile['saved_name'])) {
                        unlink($dir . '/' . $uploadedFile['saved_name']);
                    }
                }

                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Gagal mengupload file: " . implode(', ', $failedUploads);
                return json_encode($response);
            }

            // Simpan informasi files sebagai JSON
            $data['lampiran'] = json_encode($uploadedFiles);

            $this->_db->transBegin();
            try {
                $this->_db->table('_tb_dokumen')->insert($data);
            } catch (\Exception $e) {
                foreach ($uploadedFiles as $uploadedFile) {
                    if (file_exists($dir . '/' . $uploadedFile['saved_name'])) {
                        unlink($dir . '/' . $uploadedFile['saved_name']);
                    }
                }
                // unlink($dir . '/' . $newNamelampiranFile);
                $this->_db->transRollback();

                $response = new \stdClass;
                $response->status = 400;
                $response->error = var_dump($e);
                $response->message = "Gagal menyimpan data.";
                return json_encode($response);
            }

            if ($this->_db->affectedRows() > 0) {
                $this->_db->transCommit();
                $response = new \stdClass;
                $response->status = 200;
                $response->message = "Data berhasil disimpan.";
                $response->redirect = base_url('webadmin/informasi/dokumen/data');
                return json_encode($response);
            } else {
                foreach ($uploadedFiles as $uploadedFile) {
                    if (file_exists($dir . '/' . $uploadedFile['saved_name'])) {
                        unlink($dir . '/' . $uploadedFile['saved_name']);
                    }
                }
                // unlink($dir . '/' . $newNamelampiranFile);
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Gagal menyimpan data";
                return json_encode($response);
            }
        }
    }

    public function editSave()
    {
        // if ($this->request->getMethod() != 'post') {
        //     $response = new \stdClass;
        //     $response->status = 400;
        //     $response->message = "Permintaan tidak diizinkan";
        //     return json_encode($response);
        // }

        $rules = [
            'id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Id tidak boleh kosong. ',
                ]
            ],
            'judul' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong. ',
                ]
            ],
            'tahun' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tahun tidak boleh kosong. ',
                ]
            ],
            'sumber_data' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Sumber data tidak boleh kosong. ',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong. ',
                ]
            ],
        ];

        $filenamelampiranFile = dot_array_search('_file_lampiran.name', $_FILES);
        if ($filenamelampiranFile != '') {
            $lampiranValFile = [
                '_file_lampiran' => [
                    'rules' => 'uploaded[_file_lampiran]|max_size[_file_lampiran,5148]|mime_in[_file_lampiran,image/jpeg,image/jpg,image/png,application/pdf]',
                    'errors' => [
                        'uploaded' => 'Pilih file terlebih dahulu. ',
                        'max_size' => 'Ukuran file terlalu besar. ',
                        'mime_in' => 'Ekstensi yang anda upload harus berekstensi gambar/pdf. '
                    ]
                ],
            ];
            $rules = array_merge($rules, $lampiranValFile);
        }

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('id')
                . $this->validator->getError('judul')
                . $this->validator->getError('tahun')
                . $this->validator->getError('sumber_data')
                . $this->validator->getError('status')
                . $this->validator->getError('_file_lampiran');
            return json_encode($response);
        } else {

            $Profilelib = new Profilelib();
            $user = $Profilelib->user();
            if ($user->code != 200) {
                delete_cookie('jwt');
                session()->destroy();
                $response = new \stdClass;
                $response->status = 401;
                $response->message = "Permintaan diizinkan";
                return json_encode($response);
            }

            $id = htmlspecialchars($this->request->getVar('id'), true);
            $judul = htmlspecialchars($this->request->getVar('judul'), true);
            $tahun = htmlspecialchars($this->request->getVar('tahun'), true);
            $sumber_data = htmlspecialchars($this->request->getVar('sumber_data'), true);
            $status = htmlspecialchars($this->request->getVar('status'), true);

            $oldData =  $this->_db->table('_tb_dokumen')->where('id', $id)->get()->getRowObject();

            if (!$oldData) {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data tidak ditemukan.";
                return json_encode($response);
            }

            $data = [
                'judul' => $judul,
                'tahun' => $tahun,
                'sumber_data' => $sumber_data,
                'status' => $status,
                'user_updated' => $user->data->uid,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($judul !== $oldData->judul) {
                $slug = generateSlug($judul);
                $cekData = $this->_db->table('_tb_dokumen')->where(['url' => $slug . '.html'])->get()->getRowObject();

                if ($cekData) {
                    $slug = $slug . "-" . date('Y-m-d');
                }

                $data['url'] = $slug . '.html';
            }

            if (
                (int)$status === (int)$oldData->status
                && $judul === $oldData->judul
                && $tahun === $oldData->tahun
                && $sumber_data === $oldData->sumber_data
            ) {
                if ($filenamelampiranFile == '') {
                    $response = new \stdClass;
                    $response->status = 201;
                    $response->message = "Tidak ada perubahan data yang disimpan.";
                    $response->redirect = base_url('webadmin/informasi/dokumen/data');
                    return json_encode($response);
                }
            }

            $dir = FCPATH . "uploads/dokumen";

            if ($filenamelampiranFile != '') {
                $lampiranFile = $this->request->getFile('_file_lampiran');
                $filesNamelampiranFile = $lampiranFile->getName();
                $newNamelampiranFile = _create_name_foto($filesNamelampiranFile);

                if ($lampiranFile->isValid() && !$lampiranFile->hasMoved()) {
                    $lampiranFile->move($dir, $newNamelampiranFile);
                    $data['lampiran'] = $newNamelampiranFile;
                } else {
                    $response = new \stdClass;
                    $response->status = 400;
                    $response->message = "Gagal mengupload file.";
                    return json_encode($response);
                }
            }
            $this->_db->transBegin();
            try {
                $this->_db->table('_tb_dokumen')->where('id', $oldData->id)->update($data);
            } catch (\Exception $e) {
                if ($filenamelampiranFile != '') {
                    unlink($dir . '/' . $newNamelampiranFile);
                }
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data gagal disimpan.";
                return json_encode($response);
            }

            if ($this->_db->affectedRows() > 0) {
                if ($filenamelampiranFile != '') {
                    if ($oldData->lampiran !== null) {
                        try {
                            unlink($dir . '/' . $oldData->lampiran);
                        } catch (\Throwable $th) {
                        }
                    }
                }
                $this->_db->transCommit();
                $response = new \stdClass;
                $response->status = 200;
                $response->message = "Data berhasil diupdate.";
                $response->redirect = base_url('webadmin/informasi/dokumen/data');
                return json_encode($response);
            } else {
                if ($filenamelampiranFile != '') {
                    unlink($dir . '/' . $newNamelampiranFile);
                }
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Gagal mengupate data";
                return json_encode($response);
            }
        }
    }
}
