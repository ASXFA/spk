<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
		}
	}
	public function index()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/template/footer');
	}
}
