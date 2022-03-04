<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pembayaran');

		// Cek Login Agar Module Hanya Bisa Di Buka Ketika Session Login Ada
		$this->check_login();
		if ($this->session->userdata('id_level') != "1" && $this->session->userdata('id_level') != "2") {
			redirect('', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'namamodule'     => "pembayaran",
			'namafileview'     => "v_pembayaran",
			'menu'      => "Pembayaran SPP",
			//variable
			// 'website' => $this->M_Setting->set_setting(),
		);
		echo Modules::run('template/TemplateAdminLte', $data);
	}

	public function cari()
	{
		$cek_nisn = $this->M_Pembayaran->cek_nisn($this->input->post('nisn_siswa'));
		if ($cek_nisn) {
			$nisn_siswa = $this->input->post('nisn_siswa');
			$data = array(
				'namamodule'     => "pembayaran",
				'namafileview'     => "v_pembayaran",
				'menu'      => "Cari Pembayaran SPP",
				//variable
				'tampilDataSiswa' => $this->M_Pembayaran->tampilDataSiswa($nisn_siswa),
			);
			echo Modules::run('template/TemplateAdminLte', $data);
		} else {
			echo "nisn kosong / tidak di temukan";
		}
	}

	public function siswa($nisn_siswa_link)
	{
		$cek_nisn = $this->M_Pembayaran->cek_nisn($nisn_siswa_link);
		if ($cek_nisn) {
			$nisn_siswa = $nisn_siswa_link;
			$data = array(
				'namamodule'     => "pembayaran",
				'namafileview'     => "v_detail_pembayaran",
				'menu'      => "Detail Pembayaran SPP",
				//variable
				'tampilDataSiswa' => $this->M_Pembayaran->tampilDataSiswa($nisn_siswa),
				'tampilDataSppSiswa' => $this->M_Pembayaran->tampilDataSppSiswa($nisn_siswa),
			);
			echo Modules::run('template/TemplateAdminLte', $data);
		} else {
			echo "nisn kosong / tidak di temukan";
		}
	}

	public function bayar()
	{
		$ke_detail_siswa = $this->input->post('nisn_siswa');

		if (!empty($this->input->post('query_id_pembayaran'))) {

			//Membuat Kode Pembayaran Dari NISN dan Bulan (SPP-NISN-BULAN)
			//1 Ambil NISN
			$nisn_siswa_kode = $this->input->post('nisn_siswa');
			//2 Explode Bulan Dari Jatuh Tempo
			$Pecah_tgl = explode("-", $this->input->post('jatuh_tempo'));
			$bulan_kode = $Pecah_tgl[1];
			$hasil_kode = "SPP-" . $nisn_siswa_kode . "-" . $bulan_kode;

			$data_bayar = [
				'id_admin' => $this->session->userdata('id_admin'),
				'kode_pembayaran' => $hasil_kode,
				'tgl_bayar' => date('Y-m-d H:i:s'),
				'status_bayar' => 1,
			];
			$this->db->where('id_pembayaran', $this->input->post('query_id_pembayaran'))->update("tbl_pembayaran", $data_bayar);

			redirect('pembayaran/siswa/' . $ke_detail_siswa);
		} else {
			echo "salah bayar kosong bruh";
		}
	}

	public function batal()
	{
		$ke_detail_siswa = $this->input->post('nisn_siswa');

		if (!empty($this->input->post('query_id_pembayaran'))) {

			$data_bayar = [
				'id_admin' => $this->session->userdata('id_admin'),
				'kode_pembayaran' => null,
				'tgl_bayar' => null,
				'status_bayar' => 0,
			];
			$this->db->where('id_pembayaran', $this->input->post('query_id_pembayaran'))->update("tbl_pembayaran", $data_bayar);

			redirect('pembayaran/siswa/' . $ke_detail_siswa);
		} else {
			echo "salah bayar kosong bruh";
		}
	}


	public function cetak_pembayaran_bulanan($kode_pembayaran)
	{
		$cek_nota = $this->M_Pembayaran->cek_data_pembayaran_bulanan($kode_pembayaran);
		if ($cek_nota) {
			$data = array(
				'printDataSpp' => $this->M_Pembayaran->cek_data_pembayaran_bulanan($kode_pembayaran),
				'admin' => $this->M_Pembayaran->set_admin_tampil($this->session->userdata('id_admin')),
			);
			$this->load->view('v_print_spp_bulanan', $data);
		} else {
			echo "kode cetak salah";
		}
	}

	public function cetak_pembayaran($nisn_siswa)
	{
		$cek_nota = $this->M_Pembayaran->cek_data_pembayaran($nisn_siswa);
		if ($cek_nota) {
			$data = array(
				'printDataSpp' => $this->M_Pembayaran->cek_data_pembayaran($nisn_siswa),
				'admin' => $this->M_Pembayaran->set_admin_tampil($this->session->userdata('id_admin')),
				'siswa' => $this->M_Pembayaran->tampilDataSiswa($nisn_siswa),
			);
			$this->load->view('v_print_spp', $data);
		} else {
			echo "kode cetak salah";
		}
	}
}
