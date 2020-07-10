<?php 
class Layanan_model extends CI_model
{
    public function get_layanan(){
        // $this->db->select('id_layanan,nama_layanan,link,isi');
        $query = $this->db->get('layanan');
        return $query->result_array();
    }
    public function get_detail_layanan($link){
       return $this->db->get_where('layanan',['link'=>$link]) -> row_array();
    }
}