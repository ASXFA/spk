<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('isLogged') != 1) {
		// 	redirect('spk_admin');
        // }
        $this->load->model('user_persyaratan_model');
	}
	// public function index()
	// {
    //     $data['nilai'] = $this->nilai_kategori_model->getAll()->result();
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/sider');
	// 	$this->load->view('admin/template/navbar');
	// 	$this->load->view('admin/nilai_kategori',$data);
	// 	$this->load->view('admin/template/footer');
    // }
    
    public function tambah()
    {

		// $config['encrypt_name'] 		= true;
        
        $kriteria_id = $this->input->post('kriteria_id');
        $subkriteria_id = $this->input->post('subkriteria_id');
        $jumlah_berkas = count($_FILES['photo']['name']);
        for($i=0; $i<$jumlah_berkas; $i++){
            // echo $_FILES['photo']['name'][$i];
            if(!empty($_FILES['photo']['name'][$i])){
                $_FILES['file']['name'] = $_FILES['photo']['name'][$i];
                $_FILES['file']['type'] = $_FILES['photo']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['photo']['error'][$i];
                $_FILES['file']['size'] = $_FILES['photo']['size'][$i];
                
                $config['upload_path']          = './assets/user/img/persyaratan/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5500;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;
                $this->load->library('upload',$config);
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data('file_name');
                    $image[$i] = $uploadData;
                    $data = array(
                        'user_id' => $this->session->userdata('id'),
                        'kriteria_id' => $kriteria_id[$i],
                        'subkriteria_id' => $subkriteria_id[$i],
                        'photo' => $image[$i]
                    );
                    $this->user_persyaratan_model->tambah($data);
                }
            }
        }
        $this->session->set_flashdata('kondisi','1');
        $this->session->set_flashdata('userPesan','Pengisian berhasil :)');
        redirect(base_url('user-panel/persyaratan'));
    }

    public function cek_persyaratan()
    {
        $data = $this->user_persyaratan_model->getById($this->session->userdata('id'));
        if ($data->num_rows() > 0) {
            echo "1";
        }else{
            echo "2";
        }
    }

    // public function edit($id)
    // {
    //     $data = $this->nilai_kategori_model->edit($id);
    //     if ($data) {
    //         $this->session->set_flashdata('kondisi','1');
    //         $this->session->set_flashdata('nilaiPesan','Kriteria berhasil ditambahkan !');
    //         redirect('dashboard-admin/manage-nilai/');
    //     }else{
    //         $this->session->set_flashdata('kondisi','0');
    //         $this->session->set_flashdata('nilaiPesan','Kriteria gagal ditambahkan !');
    //         redirect('dashboard-admin/manage-nilai/');
    //     }
    // }

    // public function hapus($id)
	// {
	// 	$query = $this->nilai_kategori_model->hapus($id);
    //     if ($query) {
    //         $this->session->set_flashdata('kondisi','1');
    //         $this->session->set_flashdata('nilaiPesan','Kriteria berhasil dihapus !');
    //         redirect('dashboard-admin/manage-nilai/');
    //     }else{
    //         $this->session->set_flashdata('kondisi','0');
    //         $this->session->set_flashdata('nilaiPesan','Kriteria gagal dihapus !');
    //         redirect('dashboard-admin/manage-nilai/');
    //     }
	// }
}
