<?php

if (!defined("BASEPATH"))
    exit("tidak ada akses langsung");

class Control_crud_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_pengguna');
    }

    function index() {
        $data = $this->model_pengguna->minta_login();
        $ambil_status_akses = element('akses', $data);
        $ambil_identitas = element('id', $data);
      
        if ($ambil_status_akses == md5(3) && $ambil_status_akses == true) {
            $session = array(
                'username' => $this->input->post('usernamex'),
                'is_logged_in' => true,
                'akses' => $ambil_status_akses,
                'id' => $ambil_identitas
            );
            $this->session->set_userdata($session);

            redirect("/admin/dashboard/index");
        } else if ($ambil_status_akses == md5(6) && $ambil_status_akses == true) {
            $session = array(
                'username' => $this->input->post('usernamex'),
                'is_logged_in' => true,
                'akses' => $ambil_status_akses,
                'id' => $ambil_identitas
            );
            $this->session->set_userdata($session);

            redirect("member/member_dashboard");
        } else {
            redirect("login/show_form");
        }
    }

}

?>