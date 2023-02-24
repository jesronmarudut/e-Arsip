<?php
namespace App\Controllers;
use App\Models\Model_dep;

class Dep extends BaseController
{

    public function __construct()
    {
        $this->Model_dep = new Model_dep();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Departemen',
            'dep' => $this->Model_dep->all_data(),
            'isi' => 'v_dep'
        );
        return view('layout/v_wrapper', $data);
    }

    // Ctrl ADD
    public function add()
    {
        $data = array('nama_dep' => $this->request->getPost('nama_dep'));
        $this->Model_dep->add($data);
        session()->setFlashdata('pesan','Departemen telah ditambahkan !');
        return redirect()->to(base_url('dep'));
    }

    // CTRL EDIT
    public function edit($id_dep)
    {
        $data = array(
            'id_dep' => $id_dep,
            'nama_dep' => $this->request->getPost('nama_dep'),
        );
        $this->Model_dep->edit($data);
        session()->setFlashdata('pesan', 'Departemen telah diperbarui !');
        return redirect()->to(base_url('dep'));
    }

    // Ctrl DELETE
    public function delete($id_dep)
    {
        $data = array(
            'id_dep' => $id_dep,
        );
        $this->Model_dep->delete_data($data);
        session()->setFlashdata('pesan', 'Departemen telah dihapus !');
        return redirect()->to(base_url('dep'));
    }
}