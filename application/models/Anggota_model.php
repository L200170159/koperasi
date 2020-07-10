<?php 
class Anggota_model extends CI_model
{
    public function get_anggota(){
        // $this->db->select('id_layanan,nama_layanan,link,isi');
        $query = $this->db->get('anggota');
        return $query->result_array();
    }
    public function jumlah_anggota(){
        $query = $this->db->get('anggota');
        return $query->num_rows();
    }
    public function get_page_anggota($limit, $start, $keyword=null){
        if($keyword){
            $this->db->like('Nama',$keyword);
        }
        $query = $this->db->get('anggota',$limit,$start);
        return $query->result_array();
    }
    public function get_page_anggota_admin($limit, $start, $keyword=null){
        if($keyword){
            $this->db->like('Nama',$keyword);
            $this->db->or_like('NIK',$keyword);
        }
        $query = $this->db->get('anggota',$limit,$start);
        return $query->result_array();
    }
    public function get_detail_anggota($link){
        return $this->db->get_where('anggota',['id_anggota'=>$link]) -> row_array();
    }
}