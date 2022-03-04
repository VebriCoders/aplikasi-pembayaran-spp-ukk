<?php defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Spp');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "spp",
			'namafileview'     => "v_spp",
			'menu'      => "Data SPP",
			//variable
			'tampilDataSpp' => $this->M_Spp->tampilDataSpp(),
			// 'website' => $this->M_Setting->set_setting(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}

	public function Tambah()
	{
		$this->M_Spp->Tambah();
		redirect('spp');
	}

	public function Edit()
	{
		$this->M_Spp->Edit();
		redirect('spp');
	}

	public function Hapus()
	{
		$this->M_Spp->Hapus();
		redirect('spp');
	}
}
