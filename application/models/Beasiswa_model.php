<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('beasiswa');
    }

    public function tambah($file_name)
    {
        $data = array(
            'nama' => $this->input->post('nama_beasiswa'),
            'vendor' => $this->input->post('vendor'),
            'file' => $file_name,
            'kuota' => $this->input->post('kuota'),
            'jumlah_peserta' => 0,
            'periode_awal' => $this->input->post('periode_awal'),
            'periode_akhir' => $this->input->post('periode_akhir'),
            'status' => 0
        );
        $query = $this->db->insert('beasiswa',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id,$file_name)
    {
        $data = array(
            'nama' => $this->input->post('nama_beasiswa'),
            'vendor' => $this->input->post('vendor'),
            'file' => $file_name,
            'kuota' => $this->input->post('kuota'),
            'periode_awal' => $this->input->post('periode_awal'),
            'periode_akhir' => $this->input->post('periode_akhir')
        );
        $this->db->where('id',$id);
        $query = $this->db->update('beasiswa',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('beasiswa');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}