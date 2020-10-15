<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_pasang_model extends CI_Model {

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('nilai_pasang');
        $this->db->join('nilai_prioritas','nilai_prioritas.nilai_id=nilai_pasang.nilai_id_from');
        $this->db->order_by('nilai_id_from');
        $this->db->order_by('nilai_id_to','ASC');
        $this->db->order_by('nilai_id','ASC');
        return $this->db->get();
    }

    public function tambah($id_from, $id_to, $nilai)
    {
        $data = array(
            'nilai_id_from' => $id_from,
            'nilai_id_to' => $id_to,
            'nilai_pasangan' => $nilai
        );
        $query = $this->db->insert('nilai_pasang',$data);
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