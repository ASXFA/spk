<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function cekUserEmail($email)
	{
        $this->db->where('email',$email);
        return $this->db->get('user');
	}

	public function getAllByLevel($level)
	{
		$this->db->where('level',$level);
		$this->db->not_like('id',$this->session->userdata('id'));
		return $this->db->get('user');
	}

	public function getAllById($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('user');
	}

	public function tambah($file_name,$level)
	{
		if ($level == 0) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'photo' => $file_name,
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'password' => password_hash($this->input->post('email'), PASSWORD_DEFAULT),
				'status' => 0,
				'level' => 0
			);
			$query = $this->db->insert('user',$data);
			if ($query) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($level == 1){
			$data = array(
				'nama' => $this->input->post('nama'),
				'npm' => $this->input->post('npm'),
				'email' => $this->input->post('email'),
				'fakultas'=> $this->input->post('fakultas'),
				'jurusan'=> $this->input->post('jurusan'),
				'photo' => $file_name,
				'password' => password_hash($this->input->post('npm'), PASSWORD_DEFAULT) ,
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'status' => 0,
				'level' => 1
			);
			$this->db->insert('user',$data);
			$query =  $this->db->insert_id();
			if ($query) {
				return $query;
			}else{
				return FALSE;
			}
		}
	}

	public function edit($id,$file_name,$level)
	{
		if ($level == 0) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'photo' => $file_name,
				'jenis_kelamin' => $this->input->post('jenis_kelamin')
			);
			$this->db->where('id',$id);
			$query = $this->db->update('user',$data);
			if ($query) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($level == 1){
			$data = array(
				'nama' => $this->input->post('nama'),
				'npm' => $this->input->post('npm'),
				'email' => $this->input->post('email'),
				'fakultas'=> $this->input->post('fakultas'),
				'jurusan'=> $this->input->post('jurusan'),
				'photo' => $file_name,
				'password' => password_hash($this->input->post('npm'), PASSWORD_DEFAULT) ,
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'level' => 1
			);
			$query = $this->db->insert('user',$data);
			if ($query) {
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function verifikasi($id)
	{
		$data = array('status'=>1);
		$this->db->where('id',$id);
		$data = $this->db->update('user',$data);
		if ($data) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function hapus($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('user');
		if ($query) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
