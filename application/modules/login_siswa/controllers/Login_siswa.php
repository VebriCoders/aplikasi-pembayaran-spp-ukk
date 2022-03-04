<?php defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class Login_siswa extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login_siswa');
	}

	public function index()
	{
		if ($this->session->userdata('is_login')) {
			redirect('dashboard_siswa');
		} else {
			$this->load->view('v_login_siswa');
		}
	}


	function proses_login()
	{
		$nisn_siswa = $this->input->post('nisn_siswa');

		$ceksiswa = $this->M_Login_siswa->ceksiswa($nisn_siswa);
		if ($ceksiswa) {

			foreach ($ceksiswa as $data_siswa)

				if ($data_siswa->active == 1) {
					$userdata = array(
						'is_login'    	=> true,
						'nisn_siswa'    => $data_siswa->nisn_siswa,
						'nis_siswa'     => $data_siswa->nis_siswa,
						'nama_siswa'    => $data_siswa->nama_siswa,
						'telp_siswa'    => $data_siswa->telp_siswa,
						'alamat_siswa'  => $data_siswa->alamat_siswa,
						'foto_siswa'    => $data_siswa->foto_siswa,
						'id_kelas'      => $data_siswa->id_kelas,
						'id_spp'        => $data_siswa->id_spp,
						'created_on'    => $data_siswa->created_on,
						'update_at'     => $data_siswa->update_at,
						'active'        => $data_siswa->active,
						'siswa_login'   => 1,
					);
					$this->session->set_userdata($userdata);


					// Update Last Login dan Online Indikator
					$nisn_siswa = $this->session->userdata('nisn_siswa');
					$data_update = [
						'last_login' => date('Y-m-d H:i:s'),
						'siswa_online' => 1,
					];
					$this->db->where('nisn_siswa', $nisn_siswa)->update('tbl_siswa', $data_update);

					print_r($this->session->userdata());
					redirect('dashboard_siswa');
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-exclamation-triangle"></i> Akun Login Siswa Tidak Aktif!</h5>
								Akun Login Siswa Tidak Aktif, Silahkan Hubungi Administrator!.
							</div>');
					redirect('login_siswa');
				}
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-circle"></i> NISN Siswa Kosong!</h5>
				NISN Anda Tidak Terdaftar!.
			</div>');
			redirect('login_siswa');
		}
	}

	public function logout()
	{
		date_default_timezone_set("Asia/Bangkok");

		// Update Last Logout dan Offline Indikator
		$data_update = [
			'last_logout' => date('Y-m-d  H:i:s'),
			'siswa_online' => 0,
		];
		$this->db->where('nisn_siswa', $this->session->userdata('nisn_siswa'))->update('tbl_siswa', $data_update);

		// Menghapus Semua Session
		$this->session->sess_destroy();
		redirect('login_siswa');
	}
}
