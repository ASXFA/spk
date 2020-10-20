<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('users_model');
        $this->load->library('encrypt');
	}
	public function index($level)
	{
        // if ($this->session->userdata('isLogged') != 1) {
		// 	redirect('spk_admin');
        // }
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
            if ($level == 0) {
                redirect('dashboard-admin/manage-users/'.$level);
            }else{
                redirect(base_url('registrasi'));
            }
        }else{
            $file_name = $this->upload->data('file_name');
            $tambahData = $this->users_model->tambah($file_name,$level);
            if ($tambahData) {
                if ($level==0) {
                    $this->session->set_flashdata('kondisi','1');
                    $this->session->set_flashdata('userPesan','Tambah Data Berhasil, ingatkan Bahwa password default sama dengan Email :) ');
                    redirect('dashboard-admin/manage-users/'.$level);
                }else{
                    $this->session->set_flashdata('kondisi','1');
                    $this->session->set_flashdata('userPesan','Daftar berhasil, silahkan aktivasi akun anda pada link yang kami kirimkan diEmail :)');
                    $id_encrypt = $this->encrypt->encode($tambahData);
                    $id_encrypt_fix = str_replace(array('=','+','/'),array('-','_','~'),$id_encrypt);

                    // load mailer
                    $this->load->library('phpmailer_lib');

                    // php mailer object
                    $mail = $this->phpmailer_lib->load();

                    // SMTP CONFIG
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'rachman.agustian12@gmail.com';
                    $mail->Password = 'fahry12031995';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('info@ifunla.com','IFUNLA');
                    $mail->addReplyTo('info@ifunla.com','IFUNLA');

                    // tambah penerima
                    $mail->addAddress($this->input->post('email'));

                    // Email subject
                    $mail->Subject = 'Halo'.$this->input->post('nama').', Selamat bergabung';

                    // set email format to HTML
                    $mail->isHTML(true);
                    
                    // Email body content
                    $mailContent = "<h1> Selamat datang di aplikasi penyedia beasiswa </h1>
                        <p> terimakasih telah mendaftar di aplikasi penyedia beasiswa Universitas Langlangbuana, mohon lakukan verifikasi akun anda dengan meng-klik link yang kami berikan agar akun anda bisa login di aplikasi kami. </p>
                        <br>    
                        <p>".base_url('verifikasi/'.$id_encrypt_fix)."</p>
                        <br>
                        <h5> Regards, </h5>
                        <h5> Tim Administrasi </h5>    
                    ";
                    $mail->Body = $mailContent;
                    $mail->send();
                    redirect(base_url());
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

    public function verifikasi($id)
    {
        $id_encrypt_fix = str_replace(array('-','_','~'),array('=','+','/'),$id);
        $id_fix = $this->encrypt->decode($id_encrypt_fix);
        $request = $this->users_model->verifikasi($id_fix);
		$this->load->view('template/header');
		$this->load->view('verifikasi');
		$this->load->view('template/footer');
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
