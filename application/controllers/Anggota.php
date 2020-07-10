<?php 
defined('BASEPATH') or exit('No direct script access allowed');
    
    class Anggota extends CI_Controller{
        public function index(){
            $data['judul']='Daftar Anggota'; //harus ada
            $data['layanan']=$this->Layanan_model->get_layanan(); //harus ada
            $data['tentang']=$this->Tentang_model->get_tentang(); //harus ada
            $data['jumlah_anggota']=$this->Anggota_model->jumlah_anggota();
            $data['start']=$this->uri->segment(3);

            //pagintation
            $this->load->library('pagination'); 

            //search
            if($this->input->post('submit')){
                $data['keyword']=$this->input->post('keyword');
                $this->session->set_userdata('keyword',$data['keyword']);
            }else{
                $data['keyword']=$this->session->userdata('keyword');
            }

            // config pagintation
            $this->db->like('Nama',$data['keyword']);
            $this->db->from('Anggota');
            $config['base_url'] = 'http://localhost/codeigniter/anggota/index';
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 7;

            // initialize pagintation
            $this->pagination->initialize($config);

            $data['anggota']=$this->Anggota_model->get_page_anggota($config['per_page'],$data['start'],$data['keyword']);
            $this->load->view('templates/header',$data); //harus ada
            $this->load->view('pengguna/anggota');
            $this->load->view('templates/detail_footer'); //harus ada
            $this->load->view('templates/footer'); //harus ada
        }
    }