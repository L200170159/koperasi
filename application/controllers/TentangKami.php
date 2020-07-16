<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TentangKami extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_TentangKami");
		$this->load->model("M_linkDinasTerkait");
    }
    
    public function index(){
        redirect(site_url(),"refresh");
    }

    public function detail($encrypt_id=null){
        
        if ($encrypt_id != null) {
            $secret_key = $this->M_TentangKami->secret_key ;
            $secret_iv = $this->M_TentangKami->secret_iv ;
            $id_tentang = encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);

            $data["tentang"] = $this->M_TentangKami->getById($id_tentang);

            if ($data["tentang"] == null) {
                redirect(site_url(),"refresh");
            } else {
                $data['linkDinasTerkait']=$this->M_linkDinasTerkait->getAll();
                $data['lainnya']=$this->M_TentangKami->showAll();
                $data['judul']=$data['tentang']['nama_tentang'];
                $data['halaman']="inner";
                $this->load->view('user/TentangKami/detailTentangKami.php',$data);
            }
        }else{
            redirect(site_url(),"refresh");
        }

	}
}
?>