<?php

if (!defined("BASEPATH"))
    exit("TIDAK ADA AKSES SECARA LANGSUNG");

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->model('model_pengguna');
        $data['alert'] = $this->session->flashdata('alert');
        $this->form_validation->set_rules('usernamex', 'Username', 'required|min_length[5]|max_length[15]xss_clean');
        $this->form_validation->set_rules('surename', 'Surename', 'required|min_length[5]|max_length[25]xss_clean');
        $this->form_validation->set_rules('passwordx', 'Password', 'required|matches[passconf]md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
//            $data['main_view'] = "login/register";
//            $this->load->view('template', $data);
            $this->load->view('login/register', $data);
        } else {
            $nama = $this->input->post('usernamex');
            $lanjutcek = $this->model_pengguna->model_cek_signup($nama);
            if ($lanjutcek == true) {
                $this->proses_tambah();
            } else {
                $this->session->set_flashdata('alert', 'Username already in use');
                redirect('login/register/');
            }
        }
    }

    function proses_tambah() {
        $this->load->model('model_pengguna');
        $nama = $this->input->post('usernamex');
        $data = array(
            'nama' => $this->input->post('usernamex'),
            'pass' => md5($this->input->post('passwordx')),
            'nama_asli' => $this->input->post('surename'),
            'email' => $this->input->post('email')
        );
        if ($data['nama'] != null or 0) {
            $this->model_pengguna->model_tambah_data_pengguna($data);
            redirect('login/show_form');
        }
    }

}

?>