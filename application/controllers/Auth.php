<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['name' => $username])->row_array(); //sama halnya dengan select * from table user where name = username

        //jika usernya ada didb
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                //mengecek password yang dimasukkan sama atau tidak dgn di db
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    //menyimpan data ke session
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun anda belum aktiv! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun anda belum terdaftar. Silahkan daftar terlebih dahulu! </div>');
            redirect('auth');
            //ketika user tidak ada di db maka muncul alert 
            //danger = warna merah
        }
    }

    // public function registration()
    // {
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     //name adalah name dari form dgn placeholder full name
    //     //Name adalah alias dari name
    //     //required supaya field harus diisi semua
    //     //trim supaya spasi tak masuk ke database
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [

    //         'is_unique' => 'This email has already registered!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
    //         'matches' => 'Password doesnt match!',
    //         'min_length' => 'Password too short!'

    //     ]);

    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    //     if ($this->form_validation->run() == false) {

    //         $this->load->view('templates/auth_header');
    //         $this->load->view('auth/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'name' => htmlspecialchars($this->input->post('name', true)),
    //             'email' => htmlspecialchars($this->input->post('email', true)),
    //             'image' => 'default.jpg',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id' => 1,
    //             //defaultnya ke admin
    //             'is_active' => 1,
    //             //otomatis aktif 
    //             'date_created' => time()
    //         ];

    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Akun anda sudah terdaftar. Silahkan login! </div>');
    //         redirect('auth');
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Akun anda sudah terdaftar. Silahkan login! </div>');
    //         redirect('auth');
    //     }
    // }

    //tugas function logout membersihkan session dan mengembalikan ke halaman login
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda sudah logout! </div>');
        redirect('auth/index');
    }
}
