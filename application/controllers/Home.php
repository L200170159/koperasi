<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Layanan");
		$this->load->model("M_TentangKami");
	}
    public function index(){
		$data['layanan']=$this->M_Layanan->showAll();
		$data['tentang']=$this->M_TentangKami->showAll();
		// var_dump($data['layanan']);
		$this->load->view('user/home/home.php',$data);
	}
}
?>