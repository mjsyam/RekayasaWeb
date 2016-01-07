<?php if(!defined("BASEPATH")) exit ("tidak ada akses secara langsung");

class Show_form extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_produk');
    }
    function index(){
        //$this->load->view('login/view_form_login');
        $data['main_view'] = 'tampil_barang';
        $row = $this->model_produk->isset_produk();
        if($row->num_rows > 0){
                $data['produk'] = $this->model_produk->model_lihat_produk();
        }else{
            $data['produk'] = "Data Masih Kosong";
        }
        $this->load->view('template', $data);
    }
    function daftar(){
        $data['main_view'] = "login/register";
        $this->load->view('template', $data);
    }
}
?>