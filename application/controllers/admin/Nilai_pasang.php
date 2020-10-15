<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_pasang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('nilai_pasang_model');
	}
	public function index()
	{
        $this->load->model('nilai_kategori_model');
        $data['nilai_pasang'] = $this->nilai_pasang_model->getAll();
        $data['nilai'] = $this->nilai_kategori_model->getAll()->result();
        $data['nilai2'] = $this->nilai_kategori_model->getAll()->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/nilai_pasang',$data);
		$this->load->view('admin/template/footer');
    }

    public function ambil()
    {
        $datak= $this->nilai_pasang_model->getAll()->result();
        echo json_encode($datak);
    }
    
    public function tambah()
    {
        $idfrom = $this->input->post('idfrom');
        $idto = $this->input->post('idto');
        $nilai = $this->input->post('nilai');

        $query = $this->nilai_pasang_model->tambah($idfrom,$idto,$nilai);
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

        $query = $this->nilai_pasang_model->hapus($table1,$table2);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
}
