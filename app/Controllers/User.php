<?php

namespace App\Controllers;
use App\Models\Model_user;
use App\Models\Model_dep;
use CodeIgniter\Email\Email;

class User extends BaseController
{

    public function __construct()
    {
        $this->Model_user = new Model_user();
        $this->Model_dep = new Model_dep();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'User',
            'user' =>  $this->Model_user->all_data(),
            'isi' => 'user/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    // ---------ADD DAN INSERT-----------
    public function add()
    {
        $data = array(
            'title' => 'Tambah User',
            'dep' =>  $this->Model_dep->all_data(),
            'isi' => 'user/v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' =>[
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'email' => [
                'label' => 'E-mail',
                'rules'=> 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                    'is_unique' => '{field} Sudah ada, silahkan input {field} lain!',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'id_dep' => [
                'label' => 'Departemen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/svg]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} max 1024 Kb',
                    'mime_in' => 'Format {field} wajib png, jpg, jpeg, dan svg',
                ]
            ],
        ])) {

            //  MENGAMBIL FIE FOTO YANG AKAN DI UPLOAD DI FORM
            $foto = $this->request->getFile('foto');
            //  MERANDOM NAMA FILE FOTO
            $nama_file = $foto->getRandomName();
            // JIKA VALID
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
                'foto' => $nama_file,
            );

            $foto->move('foto', $nama_file); //UNTUK FILE YG DIUPLOAD LANGSUNG DIPINDAHKAN KE DIREKTORI APPLIKASI
            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'User telah ditambahkan !');
            return redirect()->to(base_url('user'));
        }else {
            // JIKA TIDAK VALID
            Session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }

    // ------------EDIT DAN UPDATE--------
    public function edit($id_user)
    {
        $data = array(
            'title' => 'Edit User',
            'dep' =>  $this->Model_dep->all_data(),
            'user' => $this->Model_user->detail_data($id_user),
            'isi' => 'user/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],

            // ------EMAIL TIDAK ADA KARNA TIDAK PERLU DI UPDATE -----------------
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'id_dep' => [
                'label' => 'Departemen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/svg]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 Kb',
                    'mime_in' => 'Format {field} wajib png, jpg, jpeg, dan svg',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_dep' => $this->request->getPost('id_dep'),
                );

                $this->Model_user->edit($data);
            }else {
                // MENGHAPUS FOTO LAMA
                $user=$this->Model_user->detail_data($id_user);
                if ($user['foto'] !="") {
                    unlink('foto/'.$user['foto']);
                }
                // MERANDOM NAMA FILE FOTO
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_dep' => $this->request->getPost('id_dep'),
                    'foto' => $nama_file,
                );

                $foto->move('foto', $nama_file); //UNTUK FILE YG DIUPLOAD LANGSUNG DIPINDAHKAN KE DIREKTORI APPLIKASI
                $this->Model_user->edit($data);
            }
            session()->setFlashdata('pesan', 'Data user telah diperbarui !');
            return redirect()->to(base_url('user'));
        } else {
            // JIKA TIDAK VALID
            Session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/'.$id_user));
        }
    }

    public function delete($id_user)
    {
        // MENGHAPUS FOTO LAMA
        $user = $this->Model_user->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }
        $data = array(
            'id_user' => $id_user,
        );
        $this->Model_user->delete_data($data);
        session()->setFlashdata('pesan', 'User telah dihapus !');
        return redirect()->to(base_url('user'));
    }
}
