<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_persyaratan_model extends CI_Model {

    public function getById($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->get('user_persyaratan');
    }

    public function getAll()
    {
        return $this->db->get('user_persyaratan');
    }

    public function tambah($data)
    {
        $query = $this->db->insert('user_persyaratan',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    // public function edit($id)
    // {
    //     $data = array(
    //         'nama_subkriteria' => $this->input->post('nama_subkriteria')
    //     );
    //     $this->db->where('id',$id);
    //     $query = $this->db->update('subkriteria',$data);
    //     if ($query) {
    //         return TRUE;
    //     }else{
    //         return FALSE;
    //     }
    // }

    // public function hapus($id)
    // {
    //     $this->db->where('id',$id);
    //     $query = $this->db->delete('subkriteria');
    //     if ($query) {
    //         return TRUE;
    //     }else{
    //         return FALSE;
    //     }
    // }

}