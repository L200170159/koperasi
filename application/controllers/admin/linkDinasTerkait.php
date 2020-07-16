<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class linkDinasTerkait extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("M_Auth");
            $this->load->model("M_linkDinasTerkait");
        }

        public function table(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tabel Link Dinas Terkait";
              $this->load->view('admin/linkDinasTerkait/table.php', $data);
            }
        }

        public function add(){
            $sess = $this->M_Auth->session(array("root","admin"));
            if ($sess === FALSE) {
              redirect(site_url("admin/dashboard/logout"),"refresh");
            } else {
              $data["session"] = $sess;
              $data["sidebar"] = "Tambah Link Dinas Terkait";
        
              $this->form_validation->set_rules($this->M_linkDinasTerkait->rules());
              if ($this->form_validation->run() === TRUE) {
                $this->session->set_flashdata("notif", $this->M_linkDinasTerkait->insert());
                redirect(site_url("admin/linkDinasTerkait/add"),"refresh");
              } else {
                $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                if ($this->session->flashdata("notif")) {
                  $data["notif"] = $this->session->flashdata("notif");
                }
                $this->load->view('admin/linkDinasTerkait/add.php', $data);
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
      
              $secret_key = $this->M_linkDinasTerkait->secret_key ;
              $secret_iv = $this->M_linkDinasTerkait->secret_iv ;
              $id_linkDinasTerkait = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
              $data["linkDinasTerkait"] = $this->M_linkDinasTerkait->getById($id_linkDinasTerkait);
      
              if ($data["linkDinasTerkait"] == null) {
                redirect(site_url("admin/linkDinasTerkait/table"),"refresh");
              } else {
                $this->form_validation->set_rules($this->M_linkDinasTerkait->rules());
                if ($this->form_validation->run() === TRUE) {
                  $this->session->set_flashdata("notif", $this->M_linkDinasTerkait->update($id_linkDinasTerkait));
                  redirect(site_url("admin/linkDinasTerkait/edit/$encrypt_id"),"refresh");
                } else {
                  $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                  if ($this->session->flashdata("notif")) {
                    $data["notif"] = $this->session->flashdata("notif");
                  }
                  $this->load->view('admin/linkDinasTerkait/edit.php', $data);
                }
              }
            } else {
              redirect(site_url("admin/linkDinasTerkait/table"),"refresh");
            }
          }
        }
    }
?>