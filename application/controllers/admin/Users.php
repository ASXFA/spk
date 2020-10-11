<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('users_model');
	}
	public function index($level)
	{
        $data['users'] = $this->users_model->getAllByLevel($level)->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/users',$data);
		$this->load->view('admin/template/footer');
    }
    
    public function detail($id)
    {
        $data['user'] = $this->users_model->getAllById($id)->row();
        $this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/detailUser',$data);
		$this->load->view('admin/template/footer');
    }

    public function tambah($level)
    {
        if ($level==0) {
            $config['upload_path']          = './assets/admin/img';
        }else{
            $config['upload_path']          = './assets/user/img';
        }
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 15000;
		$config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('userPesan','Gagal Upload Photo, Gunakan Photo maksimal ukuran 1Mb ');
            redirect('dashboard-admin/manage-users/'.$level);
        }else{
            $file_name = $this->upload->data('file_name');
            $tambahData = $this->users_model->tambah($file_name,$level);
            if ($tambahData) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('userPesan','Tambah Data Berhasil, ingatkan Bahwa password default sama dengan Email :) ');
                if ($level==0) {
                    redirect('dashboard-admin/manage-users/'.$level);
                }
            }
        }
    }

    public function edit($id,$level)
    {
        if ($level==0) {
            $config['upload_path']          = './assets/admin/img';
        }else{
            $config['upload_path']          = './assets/user/img';
        }
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 15000;
		$config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo_new')) {
            $file_name = $this->input->post('photo_old');
            $editData = $this->users_model->edit($id,$file_name,$level);
            if ($editData) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('userPesan','Edit Data Berhasil !');
                if ($level==0) {
                    redirect('dashboard-admin/manage-users/detail-user/'.$id);
                }
            }
        }else{
            $file_name = $this->upload->data('file_name');
            $editData = $this->users_model->edit($id,$file_name,$level);
            if ($editData) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('userPesan','Edit Data Berhasil !');
                if ($level==0) {
                    redirect('dashboard-admin/manage-users/detail-user/'.$id);
                }
            }
        }
    }

    public function hapus($id,$level)
    {
        $hapus = $this->users_model->hapus($id);
        if ($hapus) {
            if ($level == 1) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('userPesan','Data sudah dihapus !');
                redirect('dashboard-admin/manage-users/'.$level);
            }else{
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('userPesan','Data sudah dihapus !');
                redirect('dashboard-admin/manage-users/'.$level);
            }
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('userPesan','Data Gagal dihapus !');
            redirect('dashboard-admin/manage-users/'.$level);
        }
    }

    public function cekEmail()
    {
        $email = $this->input->post('email');
        $cek = $this->users_model->cekUserEmail($email);
        if ($cek->num_rows() > 0) {
            echo "1";
        }else{
            echo "0";
        }
    }
}
