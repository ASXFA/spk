<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_prioritas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('kriteria_prioritas_model');
	}
	// public function index()
	// {
    //     $this->load->model('kriteria_model');
    //     $data['kriteria_nilai'] = $this->kriteria_nilai_model->getAll();
    //     $data['kriteria'] = $this->kriteria_model->getAll()->result();
    //     $data['kriteria2'] = $this->kriteria_model->getAll()->result();
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/sider');
	// 	$this->load->view('admin/template/navbar');
	// 	$this->load->view('admin/kriteriaNilai',$data);
	// 	$this->load->view('admin/template/footer');
    // }

    // public function ambil()
    // {
    //     $data= $this->kriteria_nilai_model->getAll()->result();
    //     echo json_encode($data);
    // }
    
    public function tambah()
    {
        $kriteria_id = $this->input->post('kriteria_id');
        $prioritas = $this->input->post('prioritas');

        $query = $this->kriteria_prioritas_model->tambah($kriteria_id,$prioritas);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
