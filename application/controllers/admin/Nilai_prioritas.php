<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_prioritas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('nilai_prioritas_model');
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
        $nilai_id = $this->input->post('nilai_id');
        $prioritas = $this->input->post('prioritas');
        $subprioritas = $this->input->post('subprioritas');

        $query = $this->nilai_prioritas_model->tambah($nilai_id,$prioritas,$subprioritas);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
