<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Model_cari;

class Cari extends BaseController
{

    public function __construct()
    {
        $this->Model_cari = new Model_cari();
        helper('form');

    }
    public function index()
    {
        $data = array(
            'title'=>'Pencarian',
            'isi' => 'cari/v_cari.php'
        );
        return view('layout/v_wrapper', $data);
    }

    public function hasil()
    {



        $q = $this->request->getPost('cari');
        // Create array for the names that are close to or match the search term
        $query = $this->Model_cari->pencarianFile();
        $results = array();
        foreach ($query as $name) {
            // Keep only relevant results
            if (levenshtein($q, $name['nama_file']) < 10) {
                array_push($results, $name['nama_file']);
            }
        }
        if(isset($results[0])){
            foreach ($results as $result) {
            $file = $this->Model_cari->hasilCari($results[0]);
            // print_r($file);
            }
        } else {
            $file = "404";
        }


        //    print_r($file);
        //    die;


        $data = array(
            'title' => 'Hasil',
            'hasilCari' => $file,
            'isi' => 'cari/v_hasil.php'
        );
        
        return view('layout/v_wrapper', $data);
    }

    public function cariData(){

    }
}
