<?php 
defined('BASEPATH') or exit('No direct script access allowed');
    
    class Kontak extends CI_Controller{
        public function index(){
            $data['judul']='Kontak'; //harus ada
            $data['layanan']=$this->Layanan_model->get_layanan(); //harus ada
            $data['tentang']=$this->Tentang_model->get_tentang(); //harus ada
            $this->load->view('templates/header',$data); //harus ada
            $this->load->view('pengguna/kontak');
            $this->load->view('templates/detail_footer'); //harus ada
            $this->load->view('templates/footer'); //harus ada
        }
    }
