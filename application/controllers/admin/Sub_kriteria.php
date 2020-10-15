<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
		}
		$this->load->model('kriteria_model');
		$this->load->model('sub_kriteria_model');
	}
	public function index($id)
	{
		$data['kriteria'] = $this->kriteria_model->getById($id)->row();
		$data['subkriteria'] = $this->sub_kriteria_model->getById($id)->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/sub_kriteria',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah($id)
	{
		$query = $this->sub_kriteria_model->tambah($id);
		if ($query) {
			$this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('subPesan','Sub Kriteria berhasil ditambahkan !');
			redirect('dashboard-admin/manage-subkriteria/'.$id);
		}else{
			$this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('subPesan','Sub Kriteria gagal ditambahkan !');
			redirect('dashboard-admin/manage-subkriteria/'.$id);
		}
	}

	public function edit($id,$kriteria_id)
	{
		$query = $this->sub_kriteria_model->edit($id);
		if ($query) {
			$this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('subPesan','Sub Kriteria berhasil ditambahkan !');
			redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
		}else{
			$this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('subPesan','Sub Kriteria gagal ditambahkan !');
			redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
		}
	}

	public function hapus($id,$kriteria_id)
	{
		$query = $this->sub_kriteria_model->hapus($id);
        if ($query) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('subPesan','Sub Kriteria berhasil dihapus !');
            redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('subPesan','Sub Kriteria gagal dihapus !');
            redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
        }
	}

}
