<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_prioritas_model extends CI_Model {

    // public function getAll()
    // {
    //     $this->db->order_by('kriteria_id_from');
    //     $this->db->order_by('kriteria_id_to','ASC');
    //     return $this->db->get('kriteria_nilai');
    // }

    public function tambah($nilai_id, $prioritas, $subprioritas)
    {
        $data = array(
            'nilai_id' => $nilai_id,
            'prioritas' => $prioritas,
            'subprioritas' => $subprioritas
        );
        $query = $this->db->insert('nilai_prioritas',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}