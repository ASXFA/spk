<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_prioritas_model extends CI_Model {

    public function getAll()
    {
        $this->db->order_by('kriteria_id','ASC');
        return $this->db->get('kriteria_prioritas');
    }

    public function tambah($kriteria_id, $prioritas)
    {
        $data = array(
            'kriteria_id' => $kriteria_id,
            'prioritas' => $prioritas
        );
        $query = $this->db->insert('kriteria_prioritas',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}