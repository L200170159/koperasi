<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class tentangkami extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("M_Auth");
            $this->load->model("M_TentangKami");
        }

        public function table(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tabel Tentang Kami";
              $this->load->view('admin/tentangkami/table.php', $data);
            }
        }

        public function add(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tambah Tentang Kami";
        
              $this->form_validation->set_rules($this->M_TentangKami->rules());
              if ($this->form_validation->run() === TRUE) {
                $this->session->set_flashdata("notif", $this->M_TentangKami->insert());
                redirect(site_url("admin/tentangkami/add"),"refresh");
              } else {
                $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                if ($this->session->flashdata("notif")) {
                  $data["notif"] = $this->session->flashdata("notif");
                }
                $this->load->view('admin/tentangkami/add.php', $data);
              }
            }
        }

        public function edit($encrypt_id=null){
          $sess = $this->M_Auth->session(array("root","admin"));
          if ($sess === FALSE) {
            redirect(site_url("admin/dashboard/logout"),"refresh");
          } else {
            if ($encrypt_id != null) {
              $data["session"] = $sess;
              $data["sidebar"] = NULL;
              $data["encrypt_id"] = $encrypt_id;
      
              $secret_key = $this->M_TentangKami->secret_key ;
              $secret_iv = $this->M_TentangKami->secret_iv ;
              $id_tentang = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
              $data["tentangkami"] = $this->M_TentangKami->getById($id_tentang);
      
              if ($data["tentangkami"] == null) {
                redirect(site_url("admin/tentangkami/table"),"refresh");
              } else {
                $this->form_validation->set_rules($this->M_TentangKami->rules());
                if ($this->form_validation->run() === TRUE) {
                  $this->session->set_flashdata("notif", $this->M_TentangKami->update($id_tentang));
                  redirect(site_url("admin/tentangkami/edit/$encrypt_id"),"refresh");
                } else {
                  $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                  if ($this->session->flashdata("notif")) {
                    $data["notif"] = $this->session->flashdata("notif");
                  }
                  $this->load->view('admin/tentangkami/edit.php', $data);
                }
              }
            } else {
              redirect(site_url("admin/tentangkami/table"),"refresh");
            }
          }
        }
    }
?>