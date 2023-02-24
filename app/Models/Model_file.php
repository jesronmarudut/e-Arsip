<?php
namespace App\Models;
use CodeIgniter\Model;

class Model_file extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_file')
        ->join('tbl_dep', 'tbl_dep.id_dep = tbl_file.id_dep', 'left')
        ->join('tbl_user', 'tbl_user.id_user = tbl_file.id_user', 'left')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_file.id_kategori', 'left')
        ->orderBy('id_file','DESC')
        ->get()
        ->getResultArray();
    }

    // public function all_data1()
    // {
        // return $this->db->table('tbl_file')
        // ->join('tbl_dep', 'tbl_dep.id_dep = tbl_file.id_dep', 'left')
        //     ->join('tbl_user', 'tbl_user.id_user = tbl_file.id_user', 'left')
        //     ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_file.id_kategori', 'left')
        //     ->orderBy('id_file', 'DESC')
        //     ->get()
        //     ->getResultArray();
    // }

    public function file_where($kategori)
    {
        return $this->db->table('tbl_file')
        ->join('tbl_dep', 'tbl_dep.id_dep = tbl_file.id_dep', 'left')
        ->join('tbl_user', 'tbl_user.id_user = tbl_file.id_user', 'left')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_file.id_kategori', 'left')
        ->where('tbl_kategori.nama_kategori', $kategori)
        ->orderBy('id_file', 'DESC')
        ->get()
        ->getResultArray();
    }


    public function detail_data($id_file)
    {
        return $this->db->table('tbl_file')
        ->join('tbl_dep', 'tbl_dep.id_dep = tbl_file.id_dep', 'left')
        ->join('tbl_user', 'tbl_user.id_user = tbl_file.id_user', 'left')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_file.id_kategori', 'left')
        ->where('id_file', $id_file)
        ->get()
        ->getRowArray();
    }

    //MODEL UNTUK MENAMBAH USER
    public function add ($data)
    {
        $this->db->table('tbl_file')->insert($data);
    }

    //MODEL UNTUK MENGEDIT USER
    public function edit($data)
    {
        $this->db->table('tbl_file')
        ->where('id_file', $data['id_file'])
        ->update($data);
    }

    //MODEL UNTUK MENGHAPUS USER
    public function delete_data($data)
    {
        $this->db->table('tbl_file')
        ->where('id_file', $data['id_file'])
        ->delete($data);
    }
}