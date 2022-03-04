<?php defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login');
	}

	public function index()
	{
		if ($this->session->userdata('is_login')) {
			redirect('dashboard');
		} else {
			$this->load->view('v_login');
		}
	}


	function proses_login()
	{
		$email_username = $this->input->post('email_username');
		$password = md5($this->input->post('password'));

		$cekuser = $this->M_Login->cekuser($email_username);
		if ($cekuser) {

			$ceklogin = $this->M_Login->ceklogin($email_username, $password);

			if ($ceklogin) {
				foreach ($ceklogin as $data_user)

					if ($data_user->active == 1) {
						$userdata = array(
							'is_login'    		=> true,
							'id_admin'         => $data_user->id_admin,
							'email_username'    => $data_user->email_username,
							'password'     		=> $data_user->password,
							'nama_admin'        => $data_user->nama_admin,
							'telp_admin'        => $data_user->telp_admin,
							'id_level'       	=> $data_user->id_level,
							'foto_admin'       	=> $data_user->foto_admin,
							'active'       		=> $data_user->active,
							'admin_online'      => $data_user->admin_online,
							'created_on'  		=> $data_user->created_on,
						);
						$this->session->set_userdata($userdata);

						// Mengarahkan Sesuai Level Admin (OPTIONAL)
						if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "2") {

							// Update Last Login dan Online Indikator
							$id_admin = $this->session->userdata('id_admin');
							$data_update = [
								'last_login' => date('Y-m-d H:i:s'),
								'admin_online' => 1,
							];
							$this->db->where('id_admin', $id_admin)->update('tbl_admin', $data_update);

							print_r($this->session->userdata());
							redirect('dashboard');
						} else {
							$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-exclamation"></i> Anda Tidak Ada Hak Akses!</h5>
								Akun Anda Tidak Memiliki Hak Akses, Silahkan Hubungi Administrator!.
							</div>');
							redirect('login');
						}
					} else {
						$this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-exclamation-triangle"></i> Akun Tidak Aktif!</h5>
								Akun Anda Tidak Aktif, Silahkan Hubungi Administrator!.
							</div>');
						redirect('login');
					}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-info"></i> Password Salah!</h5>
					Masukkan Password Yang Benar Sesuai Yang Di Daftarkan!.
				</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-circle"></i> Data User Kosong!</h5>
				Data User Tidak Terdaftar!.
			</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		date_default_timezone_set("Asia/Bangkok");

		// Update Last Logout dan Offline Indikator
		$data_update = [
			'last_logout' => date('Y-m-d  H:i:s'),
			'admin_online' => 0,
		];
		$this->db->where('id_admin', $this->session->userdata('id_admin'))->update('tbl_admin', $data_update);

		// Menghapus Semua Session
		$this->session->sess_destroy();
		redirect('login');
	}
}
