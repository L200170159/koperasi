<?php 
class Layanan_model extends CI_model{
    public function get_all_layanan(){
        return $this->db->get('layanan')->result_array();
    }
}