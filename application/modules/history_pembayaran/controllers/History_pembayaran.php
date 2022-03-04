<?php defined('BASEPATH') or exit('No direct script access allowed');

class History_pembayaran extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_History_pembayaran');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1" && $this->session->userdata('id_level') != "2") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "history_pembayaran",
			'namafileview'     => "v_history_pembayaran",
			'menu'      => "History Pembayaran",
			//variable
			'HistoryPembayaran' => $this->M_History_pembayaran->HistoryPembayaran(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}
}
