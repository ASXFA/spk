<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kriteria_model extends CI_Model {

    public function getById($id)
    {
        $this->db->where('kriteria_id',$id);
        return $this->db->get('subkriteria');
    }

    public function getAll()
    {
        return $this->db->get('subkriteria');
    }

    public function tambah($id)
    {
        $data = array(
            'kriteria_id' => $id,
            'nama_subkriteria' => $this->input->post('nama_subkriteria')
        );
        $query = $this->db->insert('subkriteria',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id)
    {
        $data = array(
            'nama_subkriteria' => $this->input->post('nama_subkriteria')
        );
        $this->db->where('id',$id);
        $query = $this->db->update('subkriteria',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('subkriteria');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}