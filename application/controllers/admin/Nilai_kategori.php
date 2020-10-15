<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('nilai_kategori_model');
	}
	public function index()
	{
        $data['nilai'] = $this->nilai_kategori_model->getAll()->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/nilai_kategori',$data);
		$this->load->view('admin/template/footer');
    }
    
    public function tambah()
    {
        $data = $this->nilai_kategori_model->tambah();
        if ($data) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('nilaiPesan','Kriteria berhasil ditambahkan !');
            redirect('dashboard-admin/manage-nilai/');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('nilaiPesan','Kriteria gagal ditambahkan !');
            redirect('dashboard-admin/manage-nilai/');
        }
    }

    public function edit($id)
    {
        $data = $this->nilai_kategori_model->edit($id);
        if ($data) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('nilaiPesan','Kriteria berhasil ditambahkan !');
            redirect('dashboard-admin/manage-nilai/');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('nilaiPesan','Kriteria gagal ditambahkan !');
            redirect('dashboard-admin/manage-nilai/');
        }
    }

    public function hapus($id)
	{
		$query = $this->nilai_kategori_model->hapus($id);
        if ($query) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('nilaiPesan','Kriteria berhasil dihapus !');
            redirect('dashboard-admin/manage-nilai/');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('nilaiPesan','Kriteria gagal dihapus !');
            redirect('dashboard-admin/manage-nilai/');
        }
	}
}
