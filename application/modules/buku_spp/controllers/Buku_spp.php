<?php defined('BASEPATH') or exit('No direct script access allowed');

class Buku_spp extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Buku_spp');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_siswa_login_login();
		if ($this->session->userdata('siswa_login') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "buku_spp",
			'namafileview'     => "v_buku_spp",
			'menu'      => "Buku Siswa",
			//variable
			'TampilSPP' => $this->M_Buku_spp->TampilSPP(),
			'tampilDataSiswa' => $this->M_Buku_spp->tampilDataSiswa(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}
}
