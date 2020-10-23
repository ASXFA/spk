<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
		}
		$this->load->model('beasiswa_model');
	}
	public function index()
	{
		$data['beasiswa'] = $this->beasiswa_model->getAll()->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/beasiswa',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/file/beasiswa/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 115000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_beasiswa')) {
			$this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('pesanBeasiswa','File anda bukan PDF !');
			redirect('dashboard-admin/manage-beasiswa');
		}else{
			$file_name = $this->upload->data('file_name');
			$data = $this->beasiswa_model->tambah($file_name);
			if ($data) {
				$this->session->set_flashdata('kondisi','1');
				$this->session->set_flashdata('pesanBeasiswa','Data beasiswa berhasil ditambahkan !');
				redirect('dashboard-admin/manage-beasiswa');
			}else{
				$this->session->set_flashdata('kondisi','0');
				$this->session->set_flashdata('pesanBeasiswa','Data beasiswa gagal ditambah !');
				redirect('dashboard-admin/manage-beasiswa');
			}
		}
	}

	public function edit($id)
	{
		$config['upload_path'] = './assets/file/beasiswa/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 115000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_beasiswa_new')) {
			$file_name = $this->input->post('file_beasiswa_old');
			$data = $this->beasiswa_model->edit($id,$file_name);
			if ($data) {
				$this->session->set_flashdata('kondisi','1');
				$this->session->set_flashdata('pesanBeasiswa','Data beasiswa berhasil diedit !');
				redirect('dashboard-admin/manage-beasiswa');
			}else{
				$this->session->set_flashdata('kondisi','0');
				$this->session->set_flashdata('pesanBeasiswa','Data beasiswa gagal diedit !');
				redirect('dashboard-admin/manage-beasiswa');
			}
		}else{
			$file_name = $this->upload->data('file_name');
			$data = $this->beasiswa_model->edit($id,$file_name);
			if ($data) {
				$this->session->set_flashdata('kondisi','1');
				$this->session->set_flashdata('pesanBeasiswa','Data beasiswa berhasil diedit !');
				redirect('dashboard-admin/manage-beasiswa');
			}else{
				$this->session->set_flashdata('kondisi','0');
				$this->session->set_flashdata('pesanBeasiswa','Data beasiswa gagal diedit !');
				redirect('dashboard-admin/manage-beasiswa');
			}
		}
	}

	public function hapus($id)
	{
		$query = $this->beasiswa_model->hapus($id);
		if ($query) {
			$this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('pesanBeasiswa','Data behasil dihapus !');
			redirect('dashboard-admin/manage-beasiswa');
		}else{
			$this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('pesanBeasiswa','Data gagal dihapus !');
			redirect('dashboard-admin/manage-beasiswa');
		}
	}

	public function editJumlahPeserta($id)
	{
		$ambil = $this->beasiswa_model->getById($id)->row();
		$jmlahpeserta = $ambil->jumlah_peserta;
		$tambah = 1 + $jmlahpeserta;
		$query = $this->beasiswa_model->editJumlahPeserta($id,$tambah);
		if ($query) {
			$this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('pesanBeasiswa','Anda berhasil bergabung, Tunggu notifikasi perihal kelolosan anda pada email yang anda gunakan saat ini, Terimakasih !');
			redirect('user-panel/beasiswa');
		}else{
			$this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('pesanBeasiswa','Anda gagal bergabung, silahkan coba kembali !');
			redirect('user-panel/beasiswa');
		}
	}

}
