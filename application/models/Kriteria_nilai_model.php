<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_nilai_model extends CI_Model {

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('kriteria_nilai');
        $this->db->join('kriteria_prioritas','kriteria_prioritas.kriteria_id=kriteria_nilai.kriteria_id_from');
        $this->db->order_by('kriteria_id_from');
        $this->db->order_by('kriteria_id_to','ASC');
        $this->db->order_by('kriteria_id','ASC');
        return $this->db->get();
    }

    public function tambah($id_from, $id_to, $nilai)
    {
        $data = array(
            'kriteria_id_from' => $id_from,
            'kriteria_id_to' => $id_to,
            'nilai' => $nilai
        );
        $query = $this->db->insert('kriteria_nilai',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus($table1, $table2){
        $this->db->empty_table($table1);
        $this->db->empty_table($table2);
        return TRUE;
    }
}