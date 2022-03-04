<?php defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MY_Controller
{
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->load->model('M_Template');
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		echo "INI TEMPLATE KOSONG :v";
	}

	public function TemplateAdminLte($data)
	{
		$this->load->view('v_template_admin_lte', $data);
	}
}
