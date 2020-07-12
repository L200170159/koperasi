<?php
// ===============================================================
// BaseCodeigniter
// Author : Ridwan Renaldi (RID1)
// Date Created : 10/05/2020
// License : freely distributed/modified with credit attribution.
// Contact Me : @rid1bdbx (instagram)
// ===============================================================
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_Account");
    $this->load->model("M_Commodity");
    $this->load->model("M_Student");
    $this->load->model("M_Layanan");
    $this->load->model("M_TentangKami");
    $this->load->model("M_Anggota");
  }

  public function account($mode=null){
    $sess = $this->M_Auth->session(array("root","admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/dashboard/logout"),"refresh");
    } else {
      $secret_key = $this->M_Account->secret_key ;
      $secret_iv = $this->M_Account->secret_iv ;

      if (strtolower($mode) == "data") {
        if ($sess["level"] != "root") {
          redirect(site_url("admin/dashboard/logout"),"refresh");
        } else {
          $query = $this->db->get("account");
          if ($query->num_rows() > 0) {
            $data = $query->result_array();
            foreach ($data as $key => $value) {
              $data[$key]["account_id"] = encrypt_decrypt("encrypt", $value["account_id"], $secret_key, $secret_iv);
            }
            echo json_encode($data);
          } else {
            echo json_encode(false);
          }
        }
      } 
      
      elseif (strtolower($mode) == "update") {
        if ($sess["level"] != "root") {
          redirect(site_url("admin/dashboard/logout"),"refresh");
        } else {
          $post = $this->input->post();
          if ( !empty($post["id"]) && !empty($post["isactive"]) ) {
            $isactive = "true";
            if ($post["isactive"] == "true") {
              $isactive = "false";
            }
            $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
            $account = $this->db->get_where("account", array("account_id" => $id) )->row_array();
            if ($account["account_level"] != "root") {
              $this->db->where("account_id", $id);
              if($this->db->update("account", array("account_isactive"=>$isactive)) ){
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
                "message" => "Root user cannot be disabled",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
          echo json_encode($response);
        }
      }

      elseif (strtolower($mode) == "delete"){
        if ($sess["level"] != "root") {
          redirect(site_url("admin/dashboard/logout"),"refresh");
        } else {
          $post = $this->input->post();
          if (!empty($post["id"])) {
            $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
            $account = $this->M_Account->getById($id);
            if ($account != null){
              $oldpath = "./uploads/account/".$account["account_image"];
              if (file_exists($oldpath)) {
                unlink($oldpath);
              }
              $this->db->where("account_id", $id);
              if($this->db->delete("account")){
                $response = array(
                  "status" => "success",
                  "message" => "Success delete data",
                );
              } else {
                $response = array(
                  "status" => "error",
                  "message" => "Failed delete data",
                );
              }
            } else {
              $response = array(
                "status" => "error",
                "message" => "Data not found!",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
          echo json_encode($response);
        }
      }

      elseif (strtolower($mode) == "delete-img"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $account = $this->M_Account->getById($id);
          if ($account != null){
            if ($account["account_image"] != "default.png") {
              $oldpath = "./uploads/account/".$account["account_image"];
              if (file_exists($oldpath)) {
                unlink($oldpath);
              }
              if ($this->db->update("account", array("account_image" => "default.png"))){
                $this->M_Auth->refreshSession($id);
                $response = array(
                  "status" => "success",
                  "message" => "Success delete image",
                );
              } else {
                $response = array(
                  "status" => "error",
                  "message" => "Failed delete image",
                );
              }
            } else {
              $response = array(
                "status" => "success",
                "message" => "Success delete image",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
        } else {
          $response = array(
            "status" => "error",
            "message" => "Data not found!",
          );
        }
        echo json_encode($response);
      }
    }
  }

  public function commodity($mode=null){
    $sess = $this->M_Auth->session(array("root","admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/dashboard/logout"),"refresh");
    } else {
      $secret_key = $this->M_Commodity->secret_key ;
      $secret_iv = $this->M_Commodity->secret_iv ;

      if (strtolower($mode) == "data") {
        $query = $this->db->get("commodity");
        if ($query->num_rows() > 0) {
          $this->load->helper('currency_helper');
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["commodity_id"] = encrypt_decrypt("encrypt", $value["commodity_id"], $secret_key, $secret_iv);
            $data[$key]["commodity_price"] = rupiah($value["commodity_price"]);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      } 

      elseif (strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $commodity = $this->M_Commodity->getById($id);
          if ($commodity != null){
            $this->db->where("commodity_id", $id);
            if($this->db->delete("commodity")){
              $response = array(
                "status" => "success",
                "message" => "Success delete data",
              );
            } else {
              $response = array(
                "status" => "error",
                "message" => "Failed delete data",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
        } else {
          $response = array(
            "status" => "error",
            "message" => "Data not found!",
          );
        }
        echo json_encode($response);
      }
    }
  }

  public function student($mode=null){
    $sess = $this->M_Auth->session(array("root","admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/dashboard/logout"),"refresh");
    } else {
      $secret_key = $this->M_Student->secret_key ;
      $secret_iv = $this->M_Student->secret_iv ;

      if (strtolower($mode) == "data") {
        $query = $this->db->get("student");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["student_id"] = encrypt_decrypt("encrypt", $value["student_id"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      } 

      elseif (strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $student = $this->M_Student->getById($id);
          if ($student != null){
            $this->db->where("student_id", $id);
            if($this->db->delete("student")){
              $response = array(
                "status" => "success",
                "message" => "Success delete data",
              );
            } else {
              $response = array(
                "status" => "error",
                "message" => "Failed delete data",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
        } else {
          $response = array(
            "status" => "error",
            "message" => "Data not found!",
          );
        }
        echo json_encode($response);
      }
    }
  }

  // layanan
  public function layanan($mode=null){
    $sess = $this->M_Auth->session(array("root","admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/dashboard/logout"),"refresh");
    } else {
      $secret_key = $this->M_Layanan->secret_key ;
      $secret_iv = $this->M_Layanan->secret_iv ;

      if (strtolower($mode) == "data") {
        $query = $this->db->get("layanan");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["id_layanan"] = encrypt_decrypt("encrypt", $value["id_layanan"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      } 

      elseif (strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $commodity = $this->M_Layanan->getById($id);
          if ($commodity != null){
            $this->db->where("id_layanan", $id);
            if($this->db->delete("layanan")){
              $response = array(
                "status" => "success",
                "message" => "Success delete data",
              );
            } else {
              $response = array(
                "status" => "error",
                "message" => "Failed delete data",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
        } else {
          $response = array(
            "status" => "error",
            "message" => "Data not found!",
          );
        }
        echo json_encode($response);
      }
    }
  }

  // tentang kami
  public function tentangkami($mode=null){
    $sess = $this->M_Auth->session(array("root","admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/dashboard/logout"),"refresh");
    } else {
      $secret_key = $this->M_TentangKami->secret_key ;
      $secret_iv = $this->M_TentangKami->secret_iv ;

      if (strtolower($mode) == "data") {
        $query = $this->db->get("tentang_kami");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["id_tentang"] = encrypt_decrypt("encrypt", $value["id_tentang"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      } 

      elseif (strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $tentangkami = $this->M_TentangKami->getById($id);
          if ($tentangkami != null){
            $this->db->where("id_tentang", $id);
            if($this->db->delete("tentang_kami")){
              $response = array(
                "status" => "success",
                "message" => "Success delete data",
              );
            } else {
              $response = array(
                "status" => "error",
                "message" => "Failed delete data",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
        } else {
          $response = array(
            "status" => "error",
            "message" => "Data not found!",
          );
        }
        echo json_encode($response);
      }
    }
  }

  // Anggota
  public function anggota($mode=null){
    $sess = $this->M_Auth->session(array("root","admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/dashboard/logout"),"refresh");
    } else {
      $secret_key = $this->M_Anggota->secret_key ;
      $secret_iv = $this->M_Anggota->secret_iv ;

      if (strtolower($mode) == "data") {
        $query = $this->db->get("anggota");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["id_anggota"] = encrypt_decrypt("encrypt", $value["id_anggota"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      } 

      elseif (strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $anggota = $this->M_Anggota->getById($id);
          if ($anggota != null){
            $this->db->where("id_anggota", $id);
            if($this->db->delete("anggota")){
              $response = array(
                "status" => "success",
                "message" => "Success delete data",
              );
            } else {
              $response = array(
                "status" => "error",
                "message" => "Failed delete data",
              );
            }
          } else {
            $response = array(
              "status" => "error",
              "message" => "Data not found!",
            );
          }
        } else {
          $response = array(
            "status" => "error",
            "message" => "Data not found!",
          );
        }
        echo json_encode($response);
      }
    }
  }

}
?>