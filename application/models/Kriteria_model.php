<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('kriteria');
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('kriteria');
    }

    public function tambah()
    {
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria')
        );
        $query = $this->db->insert('kriteria',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id)
    {
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria')
        );
        $this->db->where('id',$id);
        $query = $this->db->update('kriteria',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('kriteria');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}