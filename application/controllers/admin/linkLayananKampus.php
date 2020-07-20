<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class linkLayananKampus extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("M_Auth");
            $this->load->model("M_linkLayananKampus");
        }

        public function table(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tabel Link Layanan Kampus";
              $this->load->view('admin/linkLayananKampus/table.php', $data);
            }
        }

        public function add(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tambah Link Layanan Kampus";
        
              $this->form_validation->set_rules($this->M_linkLayananKampus->rules());
              if ($this->form_validation->run() === TRUE) {
                $this->session->set_flashdata("notif", $this->M_linkLayananKampus->insert());
                redirect(site_url("admin/linkLayananKampus/add"),"refresh");
              } else {
                $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                if ($this->session->flashdata("notif")) {
                  $data["notif"] = $this->session->flashdata("notif");
                }
                $this->load->view('admin/linkLayananKampus/add.php', $data);
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
      
              $secret_key = $this->M_linkLayananKampus->secret_key ;
              $secret_iv = $this->M_linkLayananKampus->secret_iv ;
              $id_linkLayananKampus = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
              $data["linkLayananKampus"] = $this->M_linkLayananKampus->getById($id_linkLayananKampus);
      
              if ($data["linkLayananKampus"] == null) {
                redirect(site_url("admin/linkLayananKampus/table"),"refresh");
              } else {
                $this->form_validation->set_rules($this->M_linkLayananKampus->rules());
                if ($this->form_validation->run() === TRUE) {
                  $this->session->set_flashdata("notif", $this->M_linkLayananKampus->update($id_linkLayananKampus));
                  redirect(site_url("admin/linkLayananKampus/edit/$encrypt_id"),"refresh");
                } else {
                  $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                  if ($this->session->flashdata("notif")) {
                    $data["notif"] = $this->session->flashdata("notif");
                  }
                  $this->load->view('admin/linkLayananKampus/edit.php', $data);
                }
              }
            } else {
              redirect(site_url("admin/linkLayananKampus/table"),"refresh");
            }
          }
        }
    }
?>