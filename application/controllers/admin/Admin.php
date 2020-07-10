<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        //mengambil data diuser berdasarkan username yang ada disession
        // var_dump($this->session->userdata('username'));
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        echo ' Selamat datang ' . $data['user']['name'];
        var_dump($data['user']['name']);
    }
}
