<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User_management');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "user_management",
			'namafileview'     => "v_user_management",
			'menu'      => "User Management",
			//variable
			'tampilDataAdmin' => $this->M_User_management->tampilDataAdmin(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}

	public function Tambah()
	{
		$this->M_User_management->Tambah();
		redirect('user_management');
	}

	public function Edit()
	{
		$this->M_User_management->Edit();
		redirect('user_management');
	}

	public function Hapus()
	{
		$this->M_User_management->Hapus();
		redirect('user_management');
	}

	public function Password()
	{
		$this->M_User_management->Password();
		redirect('user_management');
	}
}
