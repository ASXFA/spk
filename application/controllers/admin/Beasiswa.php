<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

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
		$this->load->view('admin/beasiswa');
		$this->load->view('admin/template/footer');
	}
}
