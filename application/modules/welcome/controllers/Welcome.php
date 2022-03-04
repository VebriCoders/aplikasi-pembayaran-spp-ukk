<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->load->model('M_Welcome');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
