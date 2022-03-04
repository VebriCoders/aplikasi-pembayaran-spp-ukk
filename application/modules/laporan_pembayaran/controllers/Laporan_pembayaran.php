<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pembayaran extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Laporan_pembayaran');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "laporan_pembayaran",
			'namafileview'     => "v_laporan_pembayaran",
			'menu'      => "Laporan Pembayaran",
			//variable
			// 'HistoryPembayaran' => $this->M_History_pembayaran->HistoryPembayaran(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}

	public function cari_tgl()
	{
		$awalTgl = $this->input->post('awal');
		$akhirTgl = $this->input->post('akhir');

		$data = array(
			'awalTgl' => $awalTgl,
			'akhirTgl' => $akhirTgl,
			'tampilPembayaran' =>  $this->M_Laporan_pembayaran->tampil_data_pembayaran($awalTgl, $akhirTgl),
			'admin' => $this->M_Laporan_pembayaran->set_admin_tampil($this->session->userdata('id_admin')),
		);
		$this->load->view('v_cari_lunas', $data);
	}

	public function cari_status()
	{
		$status_pembayaran = $this->input->post('status_pembayaran');

		$data = array(
			'status_pembayaran' => $status_pembayaran,
			'tampilPembayaran' =>  $this->M_Laporan_pembayaran->cari_status_data_pembayaran($status_pembayaran),
			'admin' => $this->M_Laporan_pembayaran->set_admin_tampil($this->session->userdata('id_admin')),
		);
		$this->load->view('v_cari_status', $data);
	}
}
