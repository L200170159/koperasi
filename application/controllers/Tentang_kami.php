<?php 
defined('BASEPATH') or exit('No direct script access allowed');
    
    class Tentang_kami extends CI_Controller{
        public function detail($link){
            $data['judul']='Tentang Kami'; //harus ada
            $data['layanan']=$this->Layanan_model->get_layanan(); //harus ada
            $data['tentang']=$this->Tentang_model->get_tentang(); //harus ada
            $data['detail']=$this->Tentang_model->get_detail_tentang($link);
            $this->load->view('templates/header',$data); //harus ada
            $this->load->view('pengguna/tentang_kami');
            $this->load->view('templates/detail_footer'); //harus ada
            $this->load->view('templates/footer'); //harus ada
        }

    }
