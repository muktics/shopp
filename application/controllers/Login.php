<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_kasir', 'Mod_barang', 'Mod_login'));        
    }

    
    public function index()
    {
        if(isset($_POST['proses'])) {            
            //form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
            $this->form_validation->set_error_delimiters('<span class="peringatan">', '</span>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('formlogin/login_data');
            }
            else{
                // jika username bukan huruf dan angka berikan pesan peringatan
                // if(!ctype_alnum($username) OR !ctype_alnum($password)){
                //     $data['pesan'] = "<div class='alert alert-danger'>
                //                                             <a href='#' class='close' data-dismiss='alert'>&times;</a>
                //                                             <strong>Maaf!</strong> Sistem tidak bisa di injeksi. </div>";

                //     $this->load->view('formlogin/login_data', $data);
                // }
                // else{
                    //cek username database
                $username = $this->input->post('username');
                
                /*$pelogin = $this->db->get_where('petugas',array('username' => $username))->row();
                $pelogin = $this->Mod_login->check_db($username)->row();
                    if($pelogin->level == '1'){
                        redirect('dashboard');
                    }elseif($pelogin->level == '2'){
                        redirect('dashboardkasir');
                    }elseif($pelogin->level == '3'){
                        redirect('dashboardteknisi');
                    }*/
                
                if($this->Mod_login->check_db($username)->num_rows()==1) {

                    //cek verfied bycrpt menyamakan data yg di input dengan ada yg di database 
                    $db = $this->Mod_login->check_db($username)->row();
                    
                if(hash_verified($this->input->post('password'), $db->password)) {

                    //cek username dan password dengan ada yg di database
                    //$data = $this->Mod_login->Auth($username, $password)->result();
                    // print_r($data); die();
                   // if($data) {
                        $userdata = array(
                            'id_petugas'  => $db->id_petugas,
                            'username'    => $db->username,
                            'full_name'   => $db->full_name,
                            'password'    => $db->password,
                            'image'    => $db->image,
                            'jenis_user'       =>$db->jenis_user,  
                        );

                    // print_r($userdata); die();    

                    $this->session->set_userdata($userdata);
                    
                //redirect('dashboard');
                $pelogin = $this->Mod_login->check_db($username)->row();
                if($pelogin->jenis_user == 'Admin'){                    
                    $this->session->set_userdata('akses','Admin');
                    $this->session->set_userdata('ses_id',$data['id_petugas']);
                    $this->session->set_userdata('ses_nama',$data['full_name']);
                    $this->session->set_userdata('ses_image',$data['image']);
                    redirect('dashboard');
                }elseif($pelogin->jenis_user == 'Kasir'){
                    $this->session->set_userdata('akses','Kasir');
                    $this->session->set_userdata('ses_id',$data['id_petugas']);
                    $this->session->set_userdata('ses_nama',$data['full_name']);
                    $this->session->set_userdata('ses_image',$data['image']);
                    redirect('dashboardkasir');
                }elseif($pelogin->jenis_user == 'Teknisi'){
                    $this->session->set_userdata('akses','Teknisi');
                    $this->session->set_userdata('ses_id',$data['id_petugas']);
                    $this->session->set_userdata('ses_nama',$data['full_name']);
                    $this->session->set_userdata('ses_image',$data['image']);
                    redirect('dashboardteknisi');
                }
                
                }
                    else{
                        $data['pesan'] = "<div class='alert alert-danger'>
                                                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                                                <strong>Maaf</strong> Username dan Password anda salah. </div>";
                        $this->load->view('formlogin/login_data', $data);
                    }

                }
                else{
                    $data['pesan'] = "<div class='alert alert-danger'>
                                                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                                                <strong>Sorry</strong> User Not Found. </div>";
                        $this->load->view('formlogin/login_data', $data); 
                }    
               // } //end cek sql injeqtion
            }
        }
        else{
            $this->load->view('formlogin/login_data');
        }        
    }//end function index
    

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    
}

