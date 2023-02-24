<?php
namespace App\Models;
use CodeIgniter\Model;

class Model_dep extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_dep')
        ->orderBy('id_dep','DESC')
        ->get()
        ->getResultArray();
    }

    //MODEL UNTUK MENAMBAH DEPARTEMEN
    public function add ($data)
    {
        $this->db->table('tbl_dep')->insert($data);
    }

    //MODEL UNTUK MENGEDIT DEPARTEMEN
    public function edit($data)
    {
        $this->db->table('tbl_dep')
        ->where('id_dep', $data['id_dep'])
        ->update($data);
    }

    //MODEL UNTUK MENGHAPUS DEPARTEMEN
    public function delete_data($data)
    {
        $this->db->table('tbl_dep')
        ->where('id_dep', $data['id_dep'])
        ->delete($data);
    }
}