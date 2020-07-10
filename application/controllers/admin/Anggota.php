<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller{
    public function index(){
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $data['judul']='Daftar Anggota';
        $data['jumlah_anggota']=$this->Anggota_model->jumlah_anggota();
        $data['start']=$this->uri->segment(4);

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
        $this->db->or_like('NIK',$data['keyword']);
        $this->db->from('Anggota');
        $config['base_url'] = 'http://localhost/codeigniter/admin/anggota/index';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 7;

        // initialize pagintation
        $this->pagination->initialize($config);

        $data['anggota']=$this->Anggota_model->get_page_anggota_admin($config['per_page'],$data['start'],$data['keyword']);
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/anggota/anggota');
        $this->load->view('admin/templates/footer');}
    }
    public function tambah()
        {       $sess=$this->session->has_userdata('username');
                if ($sess === FALSE) {
                        redirect(site_url("auth"),"refresh");
                } else {
                $this->form_validation->set_rules('nik','NIK','required|trim');
                $this->form_validation->set_rules('nama','Nama','required|trim');

                if($this->form_validation->run()==TRUE){
                        $post=$this->input->post();
                        $search  = array('.', "'");
                        $replace = array('\.', "\'");
                        $postdata=array(
                                "id_anggota"=>NULL,
                                "NIK"=>$post['nik'],
                                "Nama"=>$post['nama']
                        );
                        if($this->db->insert('anggota',$postdata)){
                                $this->session->set_flashdata('notif', 'Berhasil Menambahkan');
                        } else {
                                $this->session->set_flashdata('notif', 'Gagal Menambahkan');
                        }
                        redirect(site_url("admin/anggota"), "refresh");
                }else{
                        $data['judul']="Tambah anggota";
                        $this->load->view('admin/templates/header',$data);
                        $this->load->view('admin/anggota/tambah');
                        $this->load->view('admin/templates/footer'); 
                }}
        }
    public function edit($link)
        {       $sess=$this->session->has_userdata('username');
                if ($sess === FALSE) {
                        redirect(site_url("auth"),"refresh");
                } else {
                $this->form_validation->set_rules('nik','NIK','required|trim');
                $this->form_validation->set_rules('nama','Nama','required|trim');

                if($this->form_validation->run()==TRUE){
                        $post=$this->input->post();
                        $postdata=array(
                                "NIK"=>$post['nik'],
                                "Nama"=>$post['nama']
                        );
                        $this->db->where('id_anggota', $post['idhidden']);
                        if($this->db->update('anggota',$postdata)){
                                $this->session->set_flashdata('notif', 'Berhasil Mengubah');
                        } else {
                                $this->session->set_flashdata('notif', 'Gagal Mengubah');
                        }
                        redirect(site_url("admin/anggota"), "refresh");
                }else{
                        $data['detail']=$this->Anggota_model->get_detail_anggota($link);
                        $data['judul']="Tambah anggota";
                        $this->load->view('admin/templates/header',$data);
                        $this->load->view('admin/anggota/edit');
                        $this->load->view('admin/templates/footer'); 
                }}
        }
        public function hapus($id){
            $this->db->where('id_anggota', $id);
            if($this->db->delete('anggota')){
                    $this->session->set_flashdata('notif', 'Berhasil Menghapus');
            }else {
                    $this->session->set_flashdata('notif', 'Gagal Menghapus!');
            }
            redirect(site_url("admin/anggota"), "refresh");
    }
}