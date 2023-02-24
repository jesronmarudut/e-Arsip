<?php
namespace App\Models;
use CodeIgniter\Model;

class Model_user extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_user')
        ->join('tbl_dep','tbl_dep.id_dep = tbl_user.id_dep', 'left')
        ->orderBy('id_user','DESC')
        ->get()
        ->getResultArray();
    }

    public function detail_data($id_user)
    {
        return $this->db->table('tbl_user')
        ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
        ->where('id_user', $id_user)
        ->get()
        ->getRowArray();
    }

    //MODEL UNTUK MENAMBAH USER
    public function add ($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    //MODEL UNTUK MENGEDIT USER
    public function edit($data)
    {
        $this->db->table('tbl_user')
        ->where('id_user', $data['id_user'])
        ->update($data);
    }

    //MODEL UNTUK MENGHAPUS USER
    public function delete_data($data)
    {
        $this->db->table('tbl_user')
        ->where('id_user', $data['id_user'])
        ->delete($data);
    }
}