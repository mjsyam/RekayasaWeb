<?php

if (!defined("BASEPATH"))
    exit("tidak ada akses langsung");

class Control_crud_produk extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->is_logged_in();
        $this->load->model('model_produk');
    }
    function index(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        $akses = $this->session->userdata("akses");
        if($this->session->userdata('is_logged_in') == TRUE && $akses == md5(6)){
            $this->lihat_produk();
        }  else {
            $this->session->set_flashdata('message', 'Maaf sebelum selanja Anda harus login terlebih dahulu');
        }
    }
    function lihat_produk() {
        $data = $this->model_produk->model_lihat_produk();
        if ($data == $this->model_produk->model_lihat_produk() && $data != NULL) {
            $lempar['produk'] = $data;
            if ($this->is_logged_in() == FALSE) {
                $lempar['main_view'] = "tampil_barang";
            } else {
                $lempar['main_view'] = "member/view_produk";
            }
            $this->load->view('template',$lempar);
        } else {
            echo "<h2>Data Masih Kosong Silahkan tambahakan pada form dibawah</h2>";
        }
    }

    function masuk_cart() {
        $idproduk = $this->input->post('idprdk');
        $produk_cart = $this->model_produk->model_ambil_data_cart($idproduk);
        $qty = $this->input->post('quantity');


        $data = array(
            'id' => "$produk_cart->id_produk",
            'qty' => $qty,
            'price' => "$produk_cart->harga",
            'name' => "$produk_cart->nama_produk"
        );
        $insert = $this->cart->insert($data);
        if($insert){
         $this->session->set_flashdata('alert','data berhasil kami simpan');
         redirect('member/member_dashboard');
        }else{
            $this->session->set_flashdata('alert','data gagal disimpan');
         redirect('member/member_dashboard');   
        }
    }

    function lihat_cart() {
        $data['cart_list'] = $this->cart->contents();
        $this->load->view('member/view_cart', $data);
    }

    function update_cart() {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty,
        );
        $this->cart->update($data);
        redirect("member/member_dashboard");
    }

    function order_produk() {
        foreach ($this->cart->contents() as $order) {
            $data = array(
                'id_produk' => $order['id'],
                'id_pengguna' => $this->session->userdata('id'),
                'nama_produk' => $order['name'],
                'nama_pemesan' => $this->session->userdata('username'),
                'jumlah' => $order['qty'],
                'harga_satuan' => $order['price'],
                'total_harga_pesanan' => $order['subtotal'],
                'status' => 'Awaiting Confirmation',
            );
            $query = $this->db->insert('pesanan', $data);
        }

        if ($query === TRUE) {
            $this->cart->destroy();
            redirect('member/control_crud_produk/lihat_pesanan');
        } else {
            echo 'data gagal disimpan';
        }
    }

    function lihat_pesanan() {
        $idpengguna = $this->session->userdata('id');
        $pesanan['pesanan'] = $this->model_produk->model_ambil_pesanan_member($idpengguna);
        if ($pesanan == null) {
            echo 'anda belum memesan';
        } else {
            $pesanan['main_view'] = 'member/view_pesanan';
            $this->load->view('member/member_dashboard', $pesanan);
        }
    }

    private function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $akses = $this->session->userdata("akses");
        if (!isset($is_logged_in) || $is_logged_in != true || $akses != md5(6)) {
            $this->session->set_flashdata('message', 'Maaf sebelum selanja Anda harus login terlebih dahulu');
            redirect('login/show_form/index');
        }
    }

}

?>
