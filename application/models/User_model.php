<?php 
class User_model extends CI_model
{
    public function get_page_user_admin($limit, $start, $keyword=null){
        if($keyword){
            $this->db->like('name',$keyword);
        }
        $query = $this->db->get('user',$limit,$start);
        return $query->result_array();
    }
    public function get_detail_user($link){
        return $this->db->get_where('user',['id'=>$link]) -> row_array();
    }
}