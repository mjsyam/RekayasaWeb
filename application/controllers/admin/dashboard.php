<?php

if (!defined("BASEPATH"))
    exit("TIDAK ADA AKSES SECARA LANGSUNG");

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
    }

    function index() {
        $nama = $this->session->userdata('username');
        $data['sambutan'] = "Selamat Datang $nama";   
        $data['main_view'] = "admin/home";
        $this->load->view('admin/admin_dashboard', $data);
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $akses = $this->session->userdata("akses");
        if (!isset($is_logged_in) || $is_logged_in != true || $akses != md5(3)) {
            redirect('login/show_form/index');
        }
    }

}

?>