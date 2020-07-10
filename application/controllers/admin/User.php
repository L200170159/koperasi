<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{
    public function index(){
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $data['judul']='Daftar User';
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
        $this->db->like('name',$data['keyword']);
        $this->db->from('user');
        $config['base_url'] = 'http://localhost/codeigniter/admin/user/index';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 7;
        
    // initialize pagintation
    $this->pagination->initialize($config);

    $data['user']=$this->User_model->get_page_user_admin($config['per_page'],$data['start'],$data['keyword']);
    $this->load->view('admin/templates/header',$data);
    $this->load->view('admin/user/user');
    $this->load->view('admin/templates/footer');
    }}

    public function registration()
    {
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        //name adalah name dari form dgn placeholder full name
        //Name adalah alias dari name
        //required supaya field harus diisi semua
        //trim supaya spasi tak masuk ke database
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [

            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password too short!'

        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul']='Tambah User';
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/user/tambah');
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                //defaultnya ke admin
                'is_active' => 1,
                //otomatis aktif 
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('notif', 'Akun anda sudah berhasil di tambahkan');
            redirect('admin/user');
            $this->session->set_flashdata('notif', 'Akun anda sudah berhasil di tambahkan');
            redirect('admin/user');
        }}
    }

    public function ubahpass($id){
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $user=$this->User_model->get_detail_user($id);
        $data['detail']=$this->User_model->get_detail_user($id);
        $password = $this->input->post('password');
        if (password_verify($password, $user['password'])) {

            $this->form_validation->set_rules('password', 'Password Lama', 'required|trim');

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
                'matches' => 'Password doesnt match!',
                'min_length' => 'Password too short!'
    
            ]);
    
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            if ($this->form_validation->run() == false) {
                $data['judul']='Ubah Password';
                $this->load->view('admin/templates/header',$data);
                $this->load->view('admin/user/ubahpass');
                $this->load->view('admin/templates/footer');
            } else {
                $postdata = [
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
                ];
                $this->db->where('id', $user['id']);
                if($this->db->update('user',$postdata)){
                    $this->session->set_flashdata('notif', 'Berhasil Mengedit');
                } else {
                        $this->session->set_flashdata('notif', 'Gagal Mengedit');
                }
                redirect(site_url("admin/user"), "refresh");
                }
        }else{
            $data['judul']='Ubah Password';
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/user/ubahpass');
            $this->load->view('admin/templates/footer');
        }

    }}

    public function hapus($id){
        $sess=$this->session->has_userdata('username');
        if ($sess === FALSE) {
                redirect(site_url("auth"),"refresh");
        } else {
        $this->db->where('id', $id);
        if($this->db->delete('user')){
                $this->session->set_flashdata('notif', 'Berhasil Menghapus');
        }else {
                $this->session->set_flashdata('notif', 'Gagal Menghapus!');
        }
        redirect(site_url("admin/user"), "refresh");
}
}}