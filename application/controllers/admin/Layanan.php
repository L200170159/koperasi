<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Layanan extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("M_Auth");
            $this->load->model("M_Layanan");
        }

        public function table(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tabel Layanan";
              $this->load->view('admin/layanan/table.php', $data);
            }
        }

        public function add(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tambah Layanan";
        
              $this->form_validation->set_rules($this->M_Layanan->rules());
              if ($this->form_validation->run() === TRUE) {
                $this->session->set_flashdata("notif", $this->M_Layanan->insert());
                redirect(site_url("admin/layanan/add"),"refresh");
              } else {
                $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                if ($this->session->flashdata("notif")) {
                  $data["notif"] = $this->session->flashdata("notif");
                }
                $this->load->view('admin/layanan/add.php', $data);
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
      
              $secret_key = $this->M_Layanan->secret_key ;
              $secret_iv = $this->M_Layanan->secret_iv ;
              $id_layanan = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
              $data["layanan"] = $this->M_Layanan->getById($id_layanan);
      
              if ($data["layanan"] == null) {
                redirect(site_url("admin/layanan/table"),"refresh");
              } else {
                $this->form_validation->set_rules($this->M_Layanan->rules());
                if ($this->form_validation->run() === TRUE) {
                  $this->session->set_flashdata("notif", $this->M_Layanan->update($id_layanan));
                  redirect(site_url("admin/layanan/edit/$encrypt_id"),"refresh");
                } else {
                  $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                  if ($this->session->flashdata("notif")) {
                    $data["notif"] = $this->session->flashdata("notif");
                  }
                  $this->load->view('admin/layanan/edit.php', $data);
                }
              }
            } else {
              redirect(site_url("admin/layanan/table"),"refresh");
            }
          }
        }
    }
?>