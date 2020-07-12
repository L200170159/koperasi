<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_TentangKami extends CI_Model {
        private $table = "tentang_kami"; // table in database
        public $secret_key = "TentangKamiKey" ; // random character
        public $secret_iv = "TentangKamiIV"; // random character

        public function __construct(){
            parent::__construct();
        }

        public function rules(){
            return array(
              array(  'field' => '_judul_',
                      'label' => 'Judul',
                      'rules' => 'required|trim'),
        
              array(  'field' => '_deskripsi_',
                      'label' => 'Deskripsi',
                      'rules' => 'required|trim'),
            );
        }

        public function getById($id){
            return $this->db->get_where($this->table, array("id_tentang" => $id) )->row_array();
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

        public function insert(){
            $post = $this->input->post();
            if (!empty($post)){
              $data = array(
                "id_tentang"=>NULL,
                "nama_tentang"=>$post['_judul_'],
                "isi"=>$post['_deskripsi_']
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
                "nama_tentang"=>$post['_judul_'],
                "isi"=>$post['_deskripsi_']
              );
        
              $data = $this->security->xss_clean($data);
              $this->db->where("id_tentang", $id);
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