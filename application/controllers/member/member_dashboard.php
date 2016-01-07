<?php

if (!defined("BASEPATH"))
    exit("tidak ada akses langsung");

class Member_dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('model_produk');
    }

    function index() {
        $this->load->model('model_pengguna');
        $nama = $this->session->userdata('username');
        $queryself = $this->model_pengguna->model_show_self();
        $data['sambutan'] = "selamat datang $nama";
        $data['cart_list'] = $this->cart->contents();
        $data['self'] = $queryself;
                $row = $this->model_produk->isset_produk();
        if($row->num_rows > 0){
                $data['produk'] = $this->model_produk->model_lihat_produk();
        }else{
            $data['produk'] = "Data Masih Kosong";
        }
        $data['main_view'] = "tampil_barang";
        $this->load->view('member/member_dashboard', $data);
    }

    private function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $akses = $this->session->userdata("akses");
        if (!isset($is_logged_in) || $is_logged_in != true || $akses != md5(6)) {
            redirect('login/show_form');
        }
    }

}

?>