<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_linkLayananKampus extends CI_Model {
        private $table = "linkLayananKampus"; // table in database
        public $secret_key = "linkLayananKampusKey" ; // random character
        public $secret_iv = "linkLayananKampusIV"; // random character

        public function __construct(){
            parent::__construct();
        }

        public function rules(){
            return array(
              array(  'field' => '_Nama_',
                      'label' => 'Nama',
                      'rules' => 'required|trim'),
        
              array(  'field' => '_Link_',
                      'label' => 'Link',
                      'rules' => 'required|trim'),
            );
        }

        public function getById($id){
            return $this->db->get_where($this->table, array("id_linkLayananKampus" => $id) )->row_array();
        }

        public function getAll($fields=null) {
            if($fields != null){
              $this->db->select($fields);
            }
        
            $query = $this->db->get($this->table);
            if ($query->num_rows() > 0) {
              return $query->result_array();
            } else {
              return null;
            }
        }

        public function countAll(){
          $query = $this->db->get($this->table);
          return $query->num_rows();
        }

        public function insert(){
            $post = $this->input->post();
            if (!empty($post)){
              $data = array(
                "id_linkLayananKampus"=>NULL,
                "nama"=>$post['_Nama_'],
                "link"=>$post['_Link_']
              );
        
              $data = $this->security->xss_clean($data);
              if($this->db->insert($this->table, $data)){
                $response = array(
                  "status" => "success",
                  "message" => "Success insert data",
                );
              } else {
                $response = array(
                  "status" => "error",
                  "message" => "Failed insert data",
                );
              }
            } else {
              $response = array(
                "status" => "error",
                "message" => "Data not found!",
              );
            }
            return $response;
        }

        public function update($id){
            $post = $this->input->post();
            if (!empty($post)){
              $data = array(
                "nama"=>$post['_Nama_'],
                "link"=>$post['_Link_']
              );
        
              $data = $this->security->xss_clean($data);
              $this->db->where("id_linkLayananKampus", $id);
              if($this->db->update($this->table, $data)){
                $response = array(
                  "status" => "success",
                  "message" => "Success update data",
                );
              } else {
                $response = array(
                  "status" => "error",
                  "message" => "Failed update data",
                );
              }
            } else {
              $response = array(
                "status" => "error",
                "message" => "Data not found!",
              );
            }
            return $response;
        }
    }
?>