<?php
namespace App\Controllers;
use CodeIgniter\Session\Session;
use App\Models\Model_auth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' =>[
                    'required' => '{field} Wajib diisi !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules'=> 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !'
                ]
            ]
        ])) {
            //jika Valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->Model_auth->login($email,$password);
            if ($cek) {
                // Jika datanya cocok dengan database
                session()->set('log',true);
                session()->set('id_user', $cek['id_user']);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                session()->set('id_dep', $cek['id_dep']);
                return redirect()->to(base_url('home'));
            } else {
                Session()->setFlashdata('pesan', 'Login gagal, Username atau Password salah !' );
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            //jika tidak valid
            Session()->setFlashdata('errors',\config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        };
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');

        Session()->setFlashdata('pesan', 'Anda telah Logout !');
        return redirect()->to(base_url('auth'));
    }
}
