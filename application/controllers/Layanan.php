<?php 
defined('BASEPATH') or exit('No direct script access allowed');
    
    class Layanan extends CI_Controller{
        public function detail($link){
            $data['judul']='Layanan'; //harus ada
            $data['layanan']=$this->Layanan_model->get_layanan(); //harus ada
            $data['tentang']=$this->Tentang_model->get_tentang(); //harus ada
            $data['detail']=$this->Layanan_model->get_detail_layanan($link);
            $this->load->view('templates/header',$data); //harus ada
            $this->load->view('pengguna/layanan');
            $this->load->view('templates/detail_footer'); //harus ada
            $this->load->view('templates/footer'); //harus ada
        }
    }