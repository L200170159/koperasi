<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_linkDinasTerkait extends CI_Model {
        private $table = "linkDinasTerkait"; // table in database
        public $secret_key = "linkDinasTerkaitKey" ; // random character
        public $secret_iv = "linkDinasTerkaitIV"; // random character

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
            return $this->db->get_where($this->table, array("id_linkDinasTerkait" => $id) )->row_array();
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
                "id_linkDinasTerkait"=>NULL,
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
              $this->db->where("id_linkDinasTerkait", $id);
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