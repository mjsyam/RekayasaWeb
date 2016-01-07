<?php if(!defined("BASEPATH")) exit("tidak ada direct aksess");

    class Model_pengguna extends CI_Model{
        function minta_login(){
            
            $nama = $this->input->post('usernamex');
            $password = md5($this->input->post('passwordx'));
            
            $this->db->where('nama',$nama);
            $this->db->where('pass',$password);
            $ambil = $this->db->get('pengguna');
            if ($ambil-> num_rows == 1){
                foreach ($ambil->result() as $row)
                {
                        $data = array(
                            'akses' => $row->akses,
                            'id'=>$row->id_pengguna
                                ); 
                }
                return $data;
            }
        }// akhir dari query untuk meminta
       
       function model_show_member(){
           $this->db->where('akses', md5(6));
           $member = $this->db->get('pengguna');
           return $member->result();           
       } 
       
       
       function model_show_self(){
           $nama = $this->session->userdata('username');
           $this->db->where('nama',$nama);
           $self = $this->db->get('pengguna');
           return $self->result();
       }
       
       function model_cek_signup($nama){
           $this->db->where('nama',$nama);
           $cek = $this->db->get('pengguna');
           if($cek->num_rows == 0){
               return true;
           }else{
               return false;
           }
       }
       
       function model_tambah_data_pengguna($data){
        $this->db->insert('pengguna',$data);
        return;
        }
        
        function delete_member($id){
            $this->db->where('id_pengguna', $id);
            $this->db->where('akses != ',md5(3));
            $this->db->delete('pengguna');
        }
        
        function model_show_form_edit($id){
            $this->db->where('id_pengguna',$id);
            $edit = $this->db->get('pengguna');
            return $edit->result();
        }
        
        function model_cek_password(){
            $id = $this->session->userdata('id');
            $this->db->where('id_pengguna',$id);
            $kondisi = $this->db->get('pengguna');
            if($kondisi-> num_rows == 1){
                foreach ($kondisi->result() as $row){
                    $data = $row->pass;
                    return $data;
                };
            }else{
                return FALSE;
            };
        }
        
       function model_do_change_password(){
           $newpass = md5($this->input->post('newpasswordx'));
           $id = $this->session->userdata('id');
           $this->db->where('id_pengguna',$id);
           $this->db->set('pass',$newpass);
           $this->db->update('pengguna');
       }
} 
?>