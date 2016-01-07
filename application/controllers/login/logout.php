<?php

if (!defined('BASEPATH'))
    exit('tidak ada akses langsung');

class Logout extends CI_controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('akses');
        $this->session->sess_destroy();
        redirect('login/show_form/index');
    }

}

?>