<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("Layanan_model");
        }

	public function index()
	{
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $data['layanan']= $this->Layanan_model->get_layanan();  
        $data['judul']="Layanan | Admin";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/layanan/layanan');
        $this->load->view('admin/templates/footer');
        }}
        
        public function tambah()
        {       
                $sess=$this->session->has_userdata('username');
                if ($sess === FALSE) {
                        redirect(site_url("auth"),"refresh");
                } else {
                $this->form_validation->set_rules('namalayanan','Nama Layanan','required|trim');
                $this->form_validation->set_rules('deskripsi','Deskripsi Layanan','required|trim');

                if($this->form_validation->run()==TRUE){
                        $post=$this->input->post();
                        $postdata=array(
                                "id_layanan"=>NULL,
                                "nama_layanan"=>$post['namalayanan'],
                                "isi"=>$post['deskripsi'],
                                "link"=>str_replace(" ","",$post['namalayanan'])
                        );
                        if($this->db->insert('layanan',$postdata)){
                                $this->session->set_flashdata('notif', 'Berhasil Menambahkan');
                        } else {
                                $this->session->set_flashdata('notif', 'Gagal Menambahkan');
                        }
                        redirect(site_url("admin/layanan"), "refresh");
                }else{
                        $data['judul']="Tambah Layanan";
                        $this->load->view('admin/templates/header',$data);
                        $this->load->view('admin/layanan/tambahlayanan');
                        $this->load->view('admin/templates/footer'); 
                }}
        }

        public function edit($link){
                $sess=$this->session->has_userdata('username');
                if ($sess === FALSE) {
                        redirect(site_url("auth"),"refresh");
                } else {
                $this->form_validation->set_rules('namalayanan','Nama Layanan','required|trim');
                $this->form_validation->set_rules('deskripsi','Deskripsi Layanan','required|trim');

                if($this->form_validation->run()==TRUE){
                        $post=$this->input->post();
                        $postdata=array(
                                "nama_layanan"=>$post['namalayanan'],
                                "isi"=>$post['deskripsi'],
                                "link"=>str_replace(" ","",$post['namalayanan'])
                        );
                        $this->db->where('link', $post['linkhidden']);
                        if($this->db->update('layanan',$postdata)){
                                $this->session->set_flashdata('notif', 'Berhasil Mengedit');
                        } else {
                                $this->session->set_flashdata('notif', 'Gagal Mengedit');
                        }
                        redirect(site_url("admin/layanan"), "refresh");
                }else{
                        $data['judul']="Tambah Layanan";
                        $data['detail']=$this->Layanan_model->get_detail_layanan($link);
                        $this->load->view('admin/templates/header',$data);
                        $this->load->view('admin/layanan/edit_layanan',$data);
                        $this->load->view('admin/templates/footer'); 
                }
        }}

        public function hapus($id){
                $this->db->where('id_layanan', $id);
                if($this->db->delete('layanan')){
                        $this->session->set_flashdata('notif', 'Berhasil Menghapus');
                }else {
                        $this->session->set_flashdata('notif', 'Gagal Menghapus!');
                }
                redirect(site_url("admin/layanan"), "refresh");
        }
}