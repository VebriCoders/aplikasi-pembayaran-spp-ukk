<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_siswa extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard_siswa');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_siswa_login_login();
		if ($this->session->userdata('siswa_login') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "dashboard_siswa",
			'namafileview'     => "v_dashboard_siswa",
			'menu'      => "Dashboard Siswa",
			//variable
			'sppBelumBayar' => $this->M_Dashboard_siswa->sppBelumBayar(),
			'sppSudahBayar' => $this->M_Dashboard_siswa->sppSudahBayar(),
			'HistoryPembayaran' => $this->M_Dashboard_siswa->HistoryPembayaran(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}
}
