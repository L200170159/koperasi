<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kami extends CI_Controller
{
    public function index()
    {
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $data['tentang']=$this->Tentang_model->get_tentang();
        $data['judul']="Tentang Kami | Admin";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/tentang/tentang_kami');
        $this->load->view('admin/templates/footer');
        
    }}

    public function tambah()
    {   
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $this->form_validation->set_rules('namatentang','Judul','required|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');

        if($this->form_validation->run()==TRUE){
                $post=$this->input->post();
                $postdata=array(
                        "id_tentang"=>NULL,
                        "nama_tentang"=>$post['namatentang'],
                        "isi"=>$post['deskripsi'],
                        "link"=>str_replace(" ","",$post['namatentang'])
                );
                if($this->db->insert('tentang_kami',$postdata)){
                        $this->session->set_flashdata('notif', 'Berhasil Menambahkan');
                } else {
                        $this->session->set_flashdata('notif', 'Gagal Menambahkan');
                }
                redirect(site_url("admin/tentang_kami/"), "refresh");
        }else{
                $data['judul']="Tambah";
                $this->load->view('admin/templates/header',$data);
                $this->load->view('admin/tentang/tambahtentang');
                $this->load->view('admin/templates/footer'); 
        }
    }}

    public function edit($link){
                $sess=$this->session->has_userdata('username');
                if ($sess === FALSE) {
                        redirect(site_url("auth"),"refresh");
                } else {
                $this->form_validation->set_rules('namatentang','Judul','required|trim');
                $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');

                if($this->form_validation->run()==TRUE){
                        $post=$this->input->post();
                        $postdata=array(
                                "nama_tentang"=>$post['namatentang'],
                                "isi"=>$post['deskripsi'],
                                "link"=>str_replace(" ","",$post['namatentang'])
                        );
                        $this->db->where('id_tentang', $post['idhidden']);
                        if($this->db->update('tentang_kami',$postdata)){
                                $this->session->set_flashdata('notif', 'Berhasil Mengedit');
                        } else {
                                $this->session->set_flashdata('notif', 'Gagal Mengedit');
                        }
                        redirect(site_url("admin/tentang_kami"), "refresh");
                }else{
                        $data['judul']="Edit Tentang Kami";
                        $data['detail']=$this->Tentang_model->get_detail_tentang($link);
                        $this->load->view('admin/templates/header',$data);
                        $this->load->view('admin/tentang/edit_tentang',$data);
                        $this->load->view('admin/templates/footer'); 
                }
        }}

        public function hapus($id){
                $this->db->where('id_tentang', $id);
                if($this->db->delete('tentang_kami')){
                        $this->session->set_flashdata('notif', 'Berhasil Menghapus');
                }else {
                        $this->session->set_flashdata('notif', 'Gagal Menghapus');
                }
                redirect(site_url("admin/tentang_kami"), "refresh");
        }
}