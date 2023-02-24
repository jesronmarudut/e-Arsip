<?php
namespace App\Controllers;

class Menu extends BaseController
{
    public function menu_kaprodi()
    {
        if (session()->get('level') <>1) {
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'title'=> 'Menu Kaprodi',
            'isi'=> 'v_menu'
        );
        return view('layout/v_wrapper',$data);
    }

    public function menu_staff()
    {
        if (session()->get('level') <> 2) {
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'title' => 'Menu Staff',
            'isi' => 'v_menu'
        );
        return view('layout/v_wrapper', $data);
    }

}