<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Anggota extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("M_Auth");
            $this->load->model("M_Anggota");
        }

        public function table(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tabel Anggota";
              $this->load->view('admin/anggota/table.php', $data);
            }
        }

        public function add(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tambah Anggota";
        
              $this->form_validation->set_rules($this->M_Anggota->rules());
              if ($this->form_validation->run() === TRUE) {
                $this->session->set_flashdata("notif", $this->M_Anggota->insert());
                redirect(site_url("admin/anggota/add"),"refresh");
              } else {
                $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                if ($this->session->flashdata("notif")) {
                  $data["notif"] = $this->session->flashdata("notif");
                }
                $this->load->view('admin/anggota/add.php', $data);
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
      
              $secret_key = $this->M_Anggota->secret_key ;
              $secret_iv = $this->M_Anggota->secret_iv ;
              $id_anggota = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
              $data["anggota"] = $this->M_Anggota->getById($id_anggota);
      
              if ($data["anggota"] == null) {
                redirect(site_url("admin/anggota/table"),"refresh");
              } else {
                $this->form_validation->set_rules($this->M_Anggota->rules());
                if ($this->form_validation->run() === TRUE) {
                  $this->session->set_flashdata("notif", $this->M_Anggota->update($id_anggota));
                  redirect(site_url("admin/anggota/edit/$encrypt_id"),"refresh");
                } else {
                  $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                  if ($this->session->flashdata("notif")) {
                    $data["notif"] = $this->session->flashdata("notif");
                  }
                  $this->load->view('admin/anggota/edit.php', $data);
                }
              }
            } else {
              redirect(site_url("admin/anggota/table"),"refresh");
            }
          }
        }
    }
?>