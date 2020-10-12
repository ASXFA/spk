<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('kriteria_model');
	}
	public function index()
	{
        $data['kriteria'] = $this->kriteria_model->getAll()->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/kriteria',$data);
		$this->load->view('admin/template/footer');
    }
    
    public function tambah()
    {
        $data = $this->kriteria_model->tambah();
        if ($data) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('kriteriaPesan','Kriteria berhasil ditambahkan !');
            redirect('dashboard-admin/manage-kriteria');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('kriteriaPesan','Kriteria gagal ditambahkan !');
            redirect('dashboard-admin/manage-kriteria');
        }
    }

    public function edit($id)
    {
        $data = $this->kriteria_model->edit($id);
        if ($data) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('kriteriaPesan','Kriteria berhasil ditambahkan !');
            redirect('dashboard-admin/manage-kriteria');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('kriteriaPesan','Kriteria gagal ditambahkan !');
            redirect('dashboard-admin/manage-kriteria');
        }
    }

    public function hapus($id)
	{
		$query = $this->kriteria_model->hapus($id);
        if ($query) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('kriteriaPesan','Kriteria berhasil dihapus !');
            redirect('dashboard-admin/manage-kriteria');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('kriteriaPesan','Kriteria gagal dihapus !');
            redirect('dashboard-admin/manage-kriteria');
        }
	}
}
