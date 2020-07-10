<?php 
class Tentang_model extends CI_model
{
    public function get_tentang(){
        // $this->db->select('nama_tentang,link');
        $query = $this->db->get('tentang_kami');
        return $query->result_array();
    }
    public function get_detail_tentang($link){
       return $this->db->get_where('tentang_kami',['link'=>$link]) -> row_array();
    }
}