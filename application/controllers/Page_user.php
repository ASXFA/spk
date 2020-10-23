<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('login-user');
		}
	}

	public function dashboard()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar-user');
		$this->load->view('dashboardUser');
		$this->load->view('template/footer');
	}

	public function profil()
	{
		$this->load->model('users_model');
		$data['user'] = $this->users_model->getAllById($this->session->userdata('id'))->row();
		$this->load->view('template/header');
		$this->load->view('template/navbar-user');
		$this->load->view('profil',$data);
		$this->load->view('template/footer');
	}

	public function persyaratan()
	{
		$this->load->model('kriteria_model');
		$this->load->model('sub_kriteria_model');
		$this->load->model('user_persyaratan_model');
		$data['kriteria'] = $this->kriteria_model->getAll()->result();
		$data['subkriteria'] = $this->sub_kriteria_model->getAll()->result();
		$data['user_persyaratan'] = $this->user_persyaratan_model->getById($this->session->userdata('id'))->result();
		$this->load->view('template/header');
		$this->load->view('template/navbar-user');
		$this->load->view('persyaratan',$data);
		$this->load->view('template/footer2');
	}

	public function isi_persyaratan()
	{
		$this->load->model('kriteria_model');
		$this->load->model('sub_kriteria_model');
		$this->load->model('user_persyaratan_model');
		$data['kriteria'] = $this->kriteria_model->getAll()->result();
		$data['subkriteria'] = $this->sub_kriteria_model->getAll()->result();
		$data['user_persyaratan'] = $this->user_persyaratan_model->getById($this->session->userdata('id'))->result();
		$this->load->view('template/header');
		$this->load->view('template/navbar-user');
		$this->load->view('isi_persyaratan',$data);
		$this->load->view('template/footer2');
	}

	public function beasiswa()
	{
		$this->load->model('beasiswa_model');
		$this->load->model('peserta_model');
		$data['beasiswa'] = $this->beasiswa_model->getAll()->result();
		$data['peserta'] = $this->peserta_model->getById($this->session->userdata('id'));
		$this->load->view('template/header');
		$this->load->view('template/navbar-user');
		$this->load->view('beasiswa',$data);
		$this->load->view('template/footer2');
	}

}
