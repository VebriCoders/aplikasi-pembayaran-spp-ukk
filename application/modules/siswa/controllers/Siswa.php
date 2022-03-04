<?php defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Siswa');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "siswa",
			'namafileview'     => "v_siswa",
			'menu'      => "Data Siswa",
			//variable
			'tampilDataSiswa' => $this->M_Siswa->tampilDataSiswa(),
			'joinKelas' => $this->M_Siswa->JoinKelas(),
			'joinSpp' => $this->M_Siswa->joinSpp(),
			// 'website' => $this->M_Setting->set_setting(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}

	public function Tambah()
	{
		$this->M_Siswa->Tambah();
		redirect('siswa');
	}

	public function Edit()
	{
		$this->M_Siswa->Edit();
		redirect('siswa');
	}

	public function Hapus()
	{
		$this->M_Siswa->Hapus();
		redirect('siswa');
	}
}
