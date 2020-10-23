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
		$this->load->model('users_model');
		$this->load->model('beasiswa_model');
		$this->load->model('kriteria_model');
		$this->load->model('nilai_kategori_model');
		$data['users'] = $this->users_model->getAll()->num_rows();
		$data['beasiswa'] = $this->beasiswa_model->getAll()->num_rows();
		$data['kriteria'] = $this->kriteria_model->getAll()->num_rows();
		$data['nilai'] = $this->nilai_kategori_model->getAll()->num_rows();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/template/footer');
	}
}
