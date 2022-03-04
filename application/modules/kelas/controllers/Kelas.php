<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Kelas');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "kelas",
			'namafileview'     => "v_kelas",
			'menu'      => "Data Kelas",
			//variable
			'tampilDataKelas' => $this->M_Kelas->tampilDataKelas(),
			// 'website' => $this->M_Setting->set_setting(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}

	public function Tambah()
	{
		$this->M_Kelas->Tambah();
		redirect('kelas');
	}

	public function Edit()
	{
		$this->M_Kelas->Edit();
		redirect('kelas');
	}

	public function Hapus()
	{
		$this->M_Kelas->Hapus();
		redirect('kelas');
	}
}
