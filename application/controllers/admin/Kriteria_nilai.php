<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('kriteria_nilai_model');
	}
	public function index()
	{
        $this->load->model('kriteria_model');
        $data['kriteria_nilai'] = $this->kriteria_nilai_model->getAll();
        $data['kriteria'] = $this->kriteria_model->getAll()->result();
        $data['kriteria2'] = $this->kriteria_model->getAll()->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/kriteriaNilai',$data);
		$this->load->view('admin/template/footer');
    }

    public function ambil()
    {
        $datak= $this->kriteria_nilai_model->getAll()->result();
        echo json_encode($datak);
    }
    
    public function tambah()
    {
        $idfrom = $this->input->post('idfrom');
        $idto = $this->input->post('idto');
        $nilai = $this->input->post('nilai');

        $query = $this->kriteria_nilai_model->tambah($idfrom,$idto,$nilai);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus()
    {
        $table1 = $this->input->post('table1');
        $table2 = $this->input->post('table2');

        $query = $this->kriteria_nilai_model->hapus($table1,$table2);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
}
