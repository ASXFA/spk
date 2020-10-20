<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authent extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function loginUser()
	{
		$this->load->view('template/header');
		$this->load->view('loginUser');
		$this->load->view('template/footer');
	}

	public function registrasi()
	{
		$this->load->view('template/header');
		$this->load->view('registrasi');
		$this->load->view('template/footer');
	}

	public function aksi_login($level)
	{
		// load model 
		$this->load->model('users_model');

		$email = $this->input->post('email');
		$password = $this->input->post('pass');
		$cekUserEmail = $this->users_model->cekUserEmail($email);

		if ($cekUserEmail->num_rows() > 0 ) {
			$ambilDataUser = $cekUserEmail->row();
			if (password_verify($password,$ambilDataUser->password)) {
				$sessionData = array(
					'isLogged' => 1,
					'id' => $ambilDataUser->id,
					'nama' => $ambilDataUser->nama,
					'npm' => $ambilDataUser->npm,
					'email' => $ambilDataUser->email,
					'photo' => $ambilDataUser->photo,
					'status' => $ambilDataUser->status,
					'level' => $ambilDataUser->level
				);

				if ($ambilDataUser->status == 0) {
					if ($level==0) {
						$this->session->set_flashdata('kondisi','0');
						$this->session->set_flashdata('pesan','Akun anda belum diaktifkan, mohon hubungi Administrator !');
						redirect('spk_admin');
					}else{
						$this->session->set_flashdata('kondisi','0');
						$this->session->set_flashdata('userPesan','Akun anda belum melakukan verifikasi via Link yang kami kirimkan via Email ');
						redirect('login-user');
					}
				}else{
					$this->session->set_userdata($sessionData);
					if ($ambilDataUser->level == 0) {
						$this->session->set_flashdata('kondisi','1');
						$this->session->set_flashdata('pesan','Selamat Datang ');
						redirect('dashboard-admin');
					}else if ($ambilDataUser->level == 1) {
						$this->session->set_flashdata('kondisi','1');
						$this->session->set_flashdata('pesan','Selamat Datang ');
						echo "USER";
					}
				}

			}else{
				if ($level==0) {
					$this->session->set_flashdata('kondisi','0');
					$this->session->set_flashdata('pesan','Password Tidak Cocok . . . !');
					redirect('spk_admin');
				}else{
					$this->session->set_flashdata('kondisi','0');
					$this->session->set_flashdata('userPesan','Password Tidak Cocok . . . !');
					redirect('login-user');
				}
			}
		}else{
			$this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('pesan','Email Tidak ada . . . !');
			redirect('spk_admin');
		}
	}

	public function logout()
	{
		$this->session->set_userdata('isLogged',0);
		$this->session->sess_destroy();
		redirect('spk_admin');
	}

}
