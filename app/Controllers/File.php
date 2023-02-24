<?php
namespace App\Controllers;

use App\Models\Model_dep;
use App\Models\Model_file;
use App\Models\Model_kategori;

class File extends BaseController
{

    public function __construct()
    {
        $this->Model_file = new Model_file();
        $this->Model_kategori = new Model_kategori();
        $this->Model_dep = new Model_dep();
        // $autoload['helper'] =array('tanggal');
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'File',
            'file' =>  $this->Model_file->all_data(),
            'isi' => 'file/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function kategori($kategori)
    {
        $data = array(
            'title' => 'File',
            'file' =>  $this->Model_file->file_where($kategori),
            'isi' => 'file/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Tambahkan Berkas',
            'kategori'=> $this->Model_kategori->all_data(),
            // 'dep' => $this->Model_dep->all_data(),
            'isi' => 'file/v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([

            'no_surat' => [
                'label' => 'Nomor Surat',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'nama_file' => [
                'label' => 'Nama File',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'pengirim' => [
                'label' => 'Pengirim Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'tujuan' => [
                'label' => 'Tujuan Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'tipe_file' => [
                'label' => 'File',
                'rules' => 'uploaded[tipe_file]|max_size[tipe_file,2048]|ext_in[tipe_file,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} max 2048 Kb',
                    'ext_in' => 'Format {field} wajib PDF',
                ]
            ],
        ])) {
            //  MENGAMBIL FIE FOTO YANG AKAN DI UPLOAD DI FORM
            $file = $this->request->getFile('tipe_file');
            //  MERANDOM NAMA FILE FOTO
            $nama_file = $file->getRandomName();
            // MENGAMBIL UKURAN FILE
            $namapdf = $file->getName();
            // JIKA VALID
            $data = array(
                'id_kategori' => $this->request->getPost('id_kategori'),
                'no_file' => $this->request->getPost('no_file'),
                'no_surat' => $this->request->getPost('no_surat'),
                'nama_file' => $this->request->getPost('nama_file'),
                'pengirim' => $this->request->getPost('pengirim'),
                'tujuan' => $this->request->getPost('tujuan'),
                'tgl_surat' => $this->request->getPost('Tanggal_Surat'),
                'tgl_diterima' => $this->request->getPost('Tanggal_Diterima'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
                'tipe_file' => $nama_file,
                'namapdf' => $namapdf,
            );

            $file->move('file_dokumen', $nama_file); //UNTUK FILE YG DIUPLOAD LANGSUNG DIPINDAHKAN KE DIREKTORI APPLIKASI
            $this->Model_file->add($data);
            session()->setFlashdata('pesan', 'File telah ditambahkan !');
            return redirect()->to(base_url('file'));
        } else {
            // JIKA TIDAK VALID
            Session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('file/add'));
        }
    }




    public function edit($id_file)
    {
        $data = array(
            'title' => 'Edit File',
            'kategori' => $this->Model_kategori->all_data(),
            'file' => $this->Model_file->detail_data($id_file),
            'isi' => 'file/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_file)
    {
        if ($this->validate([

            'no_surat' => [
                'label' => 'Nomor Surat',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'nama_file' => [
                'label' => 'Nama File',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'pengirim' => [
                'label' => 'Pengirim Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'tujuan' => [
                'label' => 'Tujuan Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            'tipe_file' => [
                'label' => 'File',
                'rules' => 'max_size[tipe_file,2048]|ext_in[tipe_file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 2048 Kb',
                    'ext_in' => 'Format {field} wajib PDF',
                ]
            ],
        ])) {




            // MENGANMBIL FILE YANG AKAN DI UPLOAD DI FORM
            $tipe_file = $this->request->getFile('tipe_file');

            if ($tipe_file->getError()==4) {
                // JIKA FILE TIDAK DIGANTI
                $data = array(
                    'id_file' =>  $id_file,
                    'no_file' => $this->request->getPost('no_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_surat' => $this->request->getPost('no_surat'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'tgl_surat' =>  $this->request->getPost('Tanggal_Surat'),
                    'tgl_diterima' => $this->request->getPost('Tanggal_Diterima'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'pengirim' => $this->request->getPost('pengirim'),
                    'tujuan' => $this->request->getPost('tujuan'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_file->edit($data);
            } else {
                // JIKA FILE DIGANTI / MENGHAPUS FILE LAMA
            $file = $this->Model_file->detail_data($id_file);
            if ($file['tipe_file'] !== "") {
                unlink('file_dokumen/'. $file['tipe_file']);
            }

                //  MERANDOM NAMA FILE FILE
                $nama_file = $tipe_file->getRandomName();
                // MENGAMBIL UKURAN FILE
                $namapdf = $tipe_file->getName();
                // JIKA VALID
                $data = array(
                    'id_file' =>  $id_file,
                    'no_file' => $this->request->getPost('no_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_surat' => $this->request->getPost('no_surat'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'tgl_surat' =>  $this->request->getPost('Tanggal_Surat'),
                    'tgl_diterima' => $this->request->getPost('Tanggal_Diterima'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'tipe_file' => $nama_file,
                    'namapdf' => $namapdf,
                );
                $tipe_file->move('file_dokumen', $nama_file); //UNTUK FILE YG DIUPLOAD LANGSUNG DIPINDAHKAN KE DIREKTORI APPLIKASI
                $this->Model_file->edit($data);
            }
            session()->setFlashdata('pesan', 'File telah ditambahkan !');
            return redirect()->to(base_url('file'));
        } else {
            // JIKA TIDAK VALID
            Session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('file/edit'. $id_file));
        }
    }




    public function delete($id_file)
    {
        // MENGHAPUS BERKAS LAMA
        $file = $this->Model_file->detail_data($id_file);
        if ($file['tipe_file'] != "") {
            unlink('file_dokumen/' . $file['tipe_file']);
        }
        $data = array(
            'id_file' => $id_file,
        );
        $this->Model_file->delete_data($data);
        session()->setFlashdata('pesan', 'File telah dihapus !');
        return redirect()->to(base_url('file'));
    }


    public function viewpdf($id_file)
    {
        $data = array(
            'title' => 'View File',
            'file' =>  $this->Model_file->detail_data($id_file),
            'isi' => 'file/v_viewpdf'
        );
        return view('layout/v_wrapper', $data);
    }
}