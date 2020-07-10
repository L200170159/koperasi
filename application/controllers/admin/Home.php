<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{   
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $data['judul']="Home";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/home');
        $this->load->view('admin/templates/footer');
	}}
}