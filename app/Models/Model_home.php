<?php
namespace App\Models;
use CodeIgniter\Model;
class Model_home extends Model
{


    public function tot_file()
    {
        return $this->db->table('tbl_file')->countAll();
    }

    public function tot_dep()
    {
        return $this->db->table('tbl_dep')->countAll();
    }

    // public function tot_suratmasuk()
    // {
    //     return $this->db->table('tbl_kategori/nama_kategori' . 'Surat Masuk')->countAll();
    // }

    // public function sumSk()
    // {
    //     // (SELECT COUNT(tbl_file.id_kategori) AS sm FROM tbl_file WHERE tbl_file.id_kategori=15)
    //     // (SELECT COUNT(tbl_file.id_kategori) AS sk FROM tbl_file WHERE tbl_file.id_kategori=16)
    //     $query = $db->query('(SELECT COUNT(tbl_file.id_kategori) AS sm FROM tbl_file WHEREtbl_file.id_kategori=15)');
    //     return $this->db->table('tbl_file/id_kategori' . 'Surat Masuk')->countAll();
    // }

    public function tot_user()
    {
        return $this->db->table('tbl_user')->countAll();
    }

    public function tot_kategori()
    {
        return $this->db->table('tbl_kategori')->countAll();
    }

    // public function tot_surat($d){
        // db->query('SELECT count(id_kategori) as s FROM tbl_file WHERE id_kategori=$d');
    // }

}