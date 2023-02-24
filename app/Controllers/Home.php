<?php
namespace App\Controllers;

use App\Models\Model_home;
class Home extends BaseController
{
	public function __construct()
	{
		$this->Model_home = new Model_home();
	}

	public function index()
	{
		$data = array(
			'title' => 'Home',
			'tot_file' => $this->Model_home->tot_file(),
			'tot_dep' => $this->Model_home->tot_dep(),
			'tot_user' => $this->Model_home->tot_user(),
			'tot_kategori' => $this->Model_home->tot_kategori(),
			// 'tot_suratmasuk' => $this->Model_home->tot_suratmasuk(),
			'isi' => 'v_home'
		);
		return view('layout/v_wrapper', $data);
	}
}
	//--------------------------------------------------------------------
	// public function grafik()
	// {
	// 	$data=array(
	// 		'title' => 'Grafik',
	// 		'isi' => 'v_home',
	// 	);
	// echo view('layout/v_wrapper', $data);
	// }