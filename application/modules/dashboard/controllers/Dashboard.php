<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1" && $this->session->userdata('id_level') != "2") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "dashboard",
			'namafileview'     => "v_dashboard",
			'menu'      => "Dashboard",
			//variable
			// 'website' => $this->M_Setting->set_setting(),
			'jmlKelas' => $this->M_Dashboard->jmlKelas(),
			'jmlSpp' => $this->M_Dashboard->jmlSpp(),
			'jmlSiswa' => $this->M_Dashboard->jmlSiswa(),
			'jmlPembayaran' => $this->M_Dashboard->jmlPembayaran(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}
}
