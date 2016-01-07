<?php if(!defined("BASEPATH")) exit ("tidak ada akses langsung");

class Control_crud_member extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('model_pengguna');
    }
    
    function lihat_daftar_pengguna(){
        $queryself = $this->model_pengguna->model_show_self();
        
        if($this->session->userdata('akses')== md5(6)){
            $data['self'] = $queryself;
            $this->load->view('member/member_view_pengguna',$data);
        }
    }
    
    function show_form_edit_pengguna(){
        $id=  $this->uri->segment(4);
        
        if($query = $this->model_pengguna->model_show_form_edit($id)){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usernamex', 'Username', 'required|min_length[5]|max_length[15]xss_clean');
        $this->form_validation->set_rules('surename', 'Surename', 'required|min_length[5]|max_length[25]xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if($this->form_validation->run() == false){
            $data['editmember'] = $query;
            $this->load->view('admin/view_form_edit_pengguna',$data);   
        }else{
                $this->proses_update();
             }
       }
        
    }
    
    function proses_update(){
      $id = $this->uri->segment(4);
      $data = array(
            'nama' => $this->input->post('usernamex'),
            'nama_asli' => $this->input->post('surename'),
            'email' => $this->input->post('email'),
            );
        $this->db->where('id_pengguna',$id);
        $this->db->update('pengguna',$data);
        redirect('member/control_crud_member/lihat_daftar_pengguna');
    }
    
 function ganti_password(){
       $data['alert'] = $this->session->flashdata('alert');
        $passconf = $this->model_pengguna->model_cek_password();
        $pass = md5($this->input->post('oldpasswordx'));
        $this->form_validation->set_rules('newpasswordx', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('oldpasswordx','Old Password',"required");
        if($this->form_validation->run() == false){
         $this->load->view('admin/view_form_edit_password',$data);   
        }else{
                if($pass == $passconf){
                $this->model_pengguna->model_do_change_password();
                $this->lihat_daftar_pengguna();
                }else{
                    $this->session->set_flashdata('alert','incorrect old password');
                    redirect('member/control_crud_member/ganti_password');
                }
             } 
        
    }

        function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $akses = $this->session->userdata("akses");
        if(!isset ($is_logged_in) || $is_logged_in != true || $akses != md5(6))
        {
            redirect('login/show_form/index');
        }
    }
}
?>
