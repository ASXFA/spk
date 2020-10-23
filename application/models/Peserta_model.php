<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {

    public function getById($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->get('peserta');
    }

    public function getByBeasiswa($id)
    {
        $this->db->where('beasiswa_id',$id);
        $this->db->order_by('total','DESC');
        return $this->db->get('peserta');
    }

    public function getAll()
    {
        return $this->db->get('peserta');
    }

    public function tambah($id_beasiswa,$nilai)
    {
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'beasiswa_id' => $id_beasiswa,
            'status' => 1,
            'total' => $nilai
        );
        $query = $this->db->insert('peserta',$data);
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