<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_kategori_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('Nilai_kategori');
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('Nilai_kategori');
    }

    public function tambah()
    {
        $data = array(
            'nama_nilai' => $this->input->post('nama_nilai')
        );
        $query = $this->db->insert('nilai_kategori',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id)
    {
        $data = array(
            'nama_nilai' => $this->input->post('nama_nilai')
        );
        $this->db->where('id',$id);
        $query = $this->db->update('nilai_kategori',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('nilai_kategori');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}