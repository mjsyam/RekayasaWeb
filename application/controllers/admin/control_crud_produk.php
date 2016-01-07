<?php
if (!defined("BASEPATH"))
    exit("TIDAK ADA AKSES SECARA LANGSUNG");

class Control_crud_produk extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('model_produk');
    }

    function tambah_data_produk() {
        $config['file_name'] = 'produk_oblonk';
        $config['upload_path'] = ("./include/gambar/");
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $config['overwrite'] = false;
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|xss_clean');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required|integer');
        if (!$this->upload->do_upload() && $this->form_validation->run() == false) {
            $data['error'] = array('error' => $this->upload->display_errors());
            $data['main_view'] = "/admin/view_form_tambah_produk";
            $this->load->view('admin/admin_dashboard', $data);
        } else {
            $config['image_library'] = 'gd2';
            $config['create_thumb'] = false;
            $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
            $config['maintain_ratio'] = true;
            $config['width'] = 400;
            $config['height'] = 400;
            $this->load->library('image_lib', $config);

            $data = array('upload_data' => $this->upload->data());
            $namafile = $data['upload_data']['file_name'];
            $db = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'gambar' => $namafile,
                'kategori' => $this->input->post('kategori')
            );
            if (!$this->image_lib->resize()) {
                $error = array('error' => $this->image_lib->display_errors());
                $this->load->view('/admin/form_tambah_produk', $error);
            }
            $this->db->insert('produk', $db);
            redirect('admin/control_crud_produk/lihat_produk');
        }
    }

    function lihat_produk() {
        $data = $this->model_produk->model_lihat_produk();
        if ($data == $this->model_produk->model_lihat_produk() && $data != NULL) {
            $data['produk'] = $data;
            $data['main_view'] = "admin/view_produk";
            $this->load->view('admin/admin_dashboard', $data);
        } else {
            echo "<h2>Data Masih Kosong</h2>";
            $this->tambah_data_produk();
        }
    }

    function show_form_edit_produk() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|xss_clean');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');
        $idproduk = $this->uri->segment(4);
        if ($this->form_validation->run() == false) {
            $data = $this->model_produk->model_ambil_data_update($idproduk);
            if ($data == $this->model_produk->model_ambil_data_update($idproduk)) {
                $lempar['updateproduk'] = $data;
                $this->load->view('admin/view_form_edit_produk', $lempar);
            }
        } else {
            $this->proses_update();
        }
    }

    private function proses_update() {
        $data = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'kategori' => $this->input->post('kategori')
        );
        $idproduk = $this->uri->segment(4);
        $this->db->where('id_produk', $idproduk);
        $this->db->update('produk', $data);
        $this->lihat_produk();
    }

    //fixed hapus file
    function delete_produk() {
        $idproduk = $this->uri->segment(4);
        $gambar = $this->model_produk->model_ambil_data_update($idproduk);
        foreach ($gambar as $baris) {
            $nama_gambar = $baris->gambar;
            $fullname = "./include/gambar/$nama_gambar";
            $hapusfisik = unlink($fullname);
            if ($hapusfisik) {
                $this->model_produk->model_delete_produk($idproduk);
                redirect('admin/control_crud_produk/lihat_produk');
            }
        }
    }

    function lihat_pesanan() {
        $pesanan = $this->model_produk->model_ambil_pesanan_admin();  
        $data['pesanan'] = $pesanan;
        $data['cek_nama'] = $this->session->flashdata('id_produk');
        $data['main_view'] = "/admin/view_pesanan";
        //$data['jmlpesanan'] = $this->cek_jumlah_pesanan();
        $this->load->view('admin/admin_dashboard', $data);
        
    }

    function cek_jumlah_pesanan() {
        $query = $this->model_produk->model_ambil_jumlah_pesanan();
        echo "statistik antrian pesanan :";
        echo "<table border='1'><th>Id Produk</th><th>Nama Produk</th><th>Total</th>";
        foreach ($query as $row) {
            $id = $row->id_produk;
            $this->db->select('nama_produk,id_produk,status');
            $this->db->select_sum('jumlah', 'total');
            $this->db->where('status', 'Awaiting Confirmation');
            $this->db->where('id_produk', $id);
            $query = $this->db->get('pesanan');
            foreach ($query->result() as $row) {
                $nama = $row->nama_produk;
                $total = $row->total;
                $idproduk = $row->id_produk;
                if ($total > 30) {
                    ?>
                    <tr color="red" bgcolor="green">
                        <td><font color="white" size="bolder"><?php echo $idproduk ?></font></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $total ?></td>
                    </tr>
                    <?php
                    if ($total > 50) {
                        $autostatus = array(
                            'status' => 'Confirmed'
                        );
                        $this->db->where('id_produk', $row->id_produk);
                        $this->db->update('pesanan', $autostatus);
                    }
                    ?>
                    <?php
                } else {
                    ?>
                    <tr>
                        <td><?php echo $idproduk ?></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $total ?></td>
                    </tr>
                    <?php
                }
            }
        }
        echo "</table>";
    }

    function lihat_detail_pemesan() {
        $id = $this->uri->segment(4);
        $data = $this->model_produk->model_ambil_data_pemesan($id);
        if ($data) {
            $data['self'] = $data;
            $this->load->view('admin/data_pemesan_produk', $data);
        } else {
            echo "err... data pemesan sudah terhapus";
        }
    }

    function lihat_detail_pesanan_produk() {
        $idproduk = $this->uri->segment(4);
        $data = $this->model_produk->model_ambil_data_update($idproduk);
        if ($data) {
            $data['produk'] = $data;
            $this->load->view('admin/view_produk', $data);
        } else {
            echo 'errr...data produk sudah terhapus';
        }
    }

    function ganti_status_pesanan() {
        $idpesanan = $this->input->post('idpesanan');
        $data = array(
            'status' => $this->input->post('status'),
        );

        $this->db->where('id_pesanan', $idpesanan);
        $this->db->update('pesanan', $data);
        redirect('/admin/control_crud_produk/lihat_pesanan');
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