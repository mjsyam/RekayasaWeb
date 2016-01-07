<?php

if (!defined("BASEPATH"))
    exit("TIDAK ADA AKSES SECARA LANGSUNG");

class Control_crud_pengguna extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('model_pengguna');
    }

    //ADMINISTRASI PENGGUNA    
    function lihat_daftar_pengguna() {
        $querymember = $this->model_pengguna->model_show_member();
        $queryself = $this->model_pengguna->model_show_self();

        if ($this->session->userdata('akses') == md5(3)) {
            $data['member'] = $querymember;
            $data['self'] = $queryself;
            $data['main_view'] = "admin/data_pemesan_produk"; 
            $this->load->view('admin/admin_dashboard', $data);
        }
    }

    function show_form_tambah_pengguna() {
        $data['alert'] = $this->session->flashdata('alert');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usernamex', 'Username', 'required|min_length[5]|max_length[15]xss_clean');
        $this->form_validation->set_rules('surename', 'Surename', 'required|min_length[5]|max_length[25]xss_clean');
        $this->form_validation->set_rules('passwordx', 'Password', 'required|matches[passconf]md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/view_form_tambah_pengguna', $data);
        } else {
            $nama = $this->input->post('usernamex');
            $lanjutcek = $this->model_pengguna->model_cek_signup($nama);
            if ($lanjutcek == true) {
                $this->proses_tambah();
            } else {
                $this->session->set_flashdata('alert', 'Username already in use');
                redirect('admin/control_crud_pengguna/show_form_tambah_pengguna');
            }
        }
    }

    function proses_tambah() {
        $nama = $this->input->post('usernamex');
        $data = array(
            'nama' => $this->input->post('usernamex'),
            'pass' => md5($this->input->post('passwordx')),
            'nama_asli' => $this->input->post('surename'),
            'email' => $this->input->post('email'),
            'akses' => md5($this->input->post('akses'))
        );
        if ($data['nama'] != null or 0) {
            $this->model_pengguna->model_tambah_data_pengguna($data);
            redirect('admin/control_crud_pengguna/lihat_daftar_pengguna');
        }
    }

    function show_form_edit_pengguna() {
        $id = $this->uri->segment(4);

        if ($query = $this->model_pengguna->model_show_form_edit($id)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('usernamex', 'Username', 'required|min_length[5]|max_length[15]xss_clean');
            $this->form_validation->set_rules('surename', 'Surename', 'required|min_length[5]|max_length[25]xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == false) {
                $data['editmember'] = $query;
                $this->load->view('admin/view_form_edit_pengguna', $data);
            } else {
                $this->proses_update();
            }
        }
    }

    function proses_update() {
        $id = $this->uri->segment(4);
        $data = array(
            'nama' => $this->input->post('usernamex'),
            'nama_asli' => $this->input->post('surename'),
            'email' => $this->input->post('email'),
        );
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);
        redirect('admin/control_crud_pengguna/lihat_daftar_pengguna');
    }

    function delete_member() {
        $id = $this->uri->segment(4);
        $this->model_pengguna->delete_member($id);
        $this->lihat_daftar_pengguna();
    }

    function ganti_password() {
        $data['alert'] = $this->session->flashdata('alert');
        $passconf = $this->model_pengguna->model_cek_password();
        $pass = md5($this->input->post('oldpasswordx'));
        $this->form_validation->set_rules('newpasswordx', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('oldpasswordx', 'Old Password', "required");
        if ($this->form_validation->run() == false) {
            $data['main_view'] ="admin/view_form_edit_password";
            $this->load->view('admin/admin_dashboard', $data);
        } else {
            if ($pass == $passconf) {
                $this->model_pengguna->model_do_change_password();
                $this->lihat_daftar_pengguna();
            } else {
                $this->session->set_flashdata('alert', 'incorrect old password');
                redirect('admin/control_crud_pengguna/ganti_password');
            }
        }
    }

    //END ADMINISTRASI PENGGUNA

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $akses = $this->session->userdata("akses");
        if (!isset($is_logged_in) || $is_logged_in != true || $akses != md5(3)) {
            redirect('login/show_form/index');
        }
    }

}

?>