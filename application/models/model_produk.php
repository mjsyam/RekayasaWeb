<?php

if (!defined("BASEPATH"))
    exit("tidak ada akses langsung");

class Model_produk extends CI_Model {

    function model_lihat_produk() {
        $query = $this->db->get('produk');
        return $query->result();
    }
    function isset_produk(){
        return $this->db->get('produk');
    }

    function model_ambil_data_update($idproduk) {
        $this->db->where('id_produk', $idproduk);
        $query = $this->db->get('produk');
        return $query->result();
    }

    function model_delete_produk($idproduk) {
        $this->db->where('id_produk', $idproduk);
        $this->db->delete('produk');
    }

    function model_ambil_data_cart($idproduk) {
        $this->db->where('id_produk', $idproduk);
        $query = $this->db->get('produk');
        return $query->row();
    }

    function model_ambil_pesanan_member($idpengguna) {
        $this->db->where('id_pengguna', $idpengguna);
        $query = $this->db->get('pesanan');
        return $query->result();
    }

    function model_ambil_pesanan_admin() {
        $this->db->order_by('tanggal');
        $this->db->where('status !=','Success');
        $query = $this->db->get('pesanan');
        return $query->result();
    }

    function model_ambil_data_pemesan($id) {
        $this->db->where('id_pengguna', $id);
        $query = $this->db->get('pengguna');
        return $query->result();
    }

    function model_ambil_jumlah_pesanan() {
        $this->db->select('id_produk');
        $this->db->distinct();
        $query = $this->db->get('pesanan');
        return $query->result();
    }

}

?>