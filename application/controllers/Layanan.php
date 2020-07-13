<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Layanan");
    }
    
    public function index(){
        redirect(site_url(),"refresh");
    }

    public function detail($encrypt_id=null){
        
        if ($encrypt_id != null) {
            $secret_key = $this->M_Layanan->secret_key ;
            $secret_iv = $this->M_Layanan->secret_iv ;
            $id_layanan = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);

            $data["layanan"] = $this->M_Layanan->getById($id_layanan);

            if ($data["layanan"] == null) {
                redirect(site_url(),"refresh");
            } else {
                $data['layananlain']=$this->M_Layanan->showAll();
                $data['judul']=$data['layanan']['nama_layanan'];
                $data['halaman']="inner";
                $this->load->view('user/layanan/detailLayanan.php',$data);
            }
        }else{
            redirect(site_url(),"refresh");
        }

	}
}
?>