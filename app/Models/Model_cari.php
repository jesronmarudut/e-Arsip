<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_cari extends Model

{
    
    public function pencarianFile()
    {
        return $this->db->table('tbl_file')
        ->select('nama_file')
        ->get()
        ->getResultArray();

    }

    public function hasilCari($param)
    {

        return $this->db->table('tbl_file')
        ->join('tbl_dep', 'tbl_dep.id_dep = tbl_file.id_dep', 'left')
        ->join('tbl_user', 'tbl_user.id_user = tbl_file.id_user', 'left')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_file.id_kategori', 'left')
        ->where('nama_file', $param)
        ->orderBy('id_file', 'DESC')
        ->get()
        ->getResultArray();
    }
}
