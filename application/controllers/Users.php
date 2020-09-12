<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_users');
    }


    public function index()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $data['users'] = $this->Mod_users->getAll()->result();

            if($this->uri->segment(3)=="create-success") {
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                $data['users'] = $this->Mod_users->getAll()->result();
                $this->template->load('layoutadmin', 'users/users_data', $data);
            }
            else if($this->uri->segment(3)=="update-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                $data['users'] = $this->Mod_users->getAll()->result();
                $this->template->load('layoutadmin', 'users/users_data', $data);
            }
            else if($this->uri->segment(3)=="delete-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                $data['users'] = $this->Mod_users->getAll()->result();
                $this->template->load('layoutadmin', 'users/users_data', $data);
            }
            else{
                $this->template->load('layoutadmin', 'users/users_data', $data);
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }       
    }

    public function create()
    {
        if($this->session->userdata('akses')=='Admin'){
            $this->template->load('layoutadmin', 'users/users_create');
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function insert()
    {   
        if($this->session->userdata('akses')=='Admin'){
            if(isset($_POST['save'])) {
            
                //function validasi
                $this->_set_rules();

                //apabila users mengisi form
                if($this->form_validation->run()==true){
                    $username = $this->input->post('username');
                    $cek = $this->Mod_users->cekUsername($username);
                    //cek nis yg sudah digunakan
                    if($cek->num_rows() > 0){
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Username</strong> Sudah Digunakan...!</p></div>"; 
                        $this->template->load('layoutadmin', 'users/users_create', $data); 
                    }
                    //kalo blm digunakan lakukan insert data kedatabase
                    else{
                        
                        $save  = array(
                            'id_petugas'   => $this->input->post('id_petugas'),
                            'username'   => $this->input->post('username'),
                            'full_name'  => $this->input->post('full_name'),
                            'password'   => get_hash($this->input->post('password')),
                            'jk'            => $this->input->post('jenis'),
                            'jenis_user'            => $this->input->post('jenis_user'),
                            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                            'tempat_lahir'  => $this->input->post('tempat_lahir'),
                            'nohp'          => $this->input->post('nohp')
                        );
                        $this->Mod_users->insertUsers("petugas", $save);
                        // echo "berhasil"; die();
                        redirect('users/index/create-success');
                    }
                }
                //jika users mengkosongkan form input
                else{
                    $this->template->load('layoutadmin', 'users/users_create');
                } 

            } //end $_POST['save']
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function edit($id)
    {
        if($this->session->userdata('akses')=='Admin'){
            $data['edit']    = $this->Mod_users->getUsers($id)->row_array();
            // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
            // print_r($data['edit']); die();
            $this->template->load('layoutadmin', 'users/users_edit', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function update()
    {   if($this->session->userdata('akses')=='Admin'){
            if(isset($_POST['update'])) {
            
                $this->_set_rules();

                //apabila user apabila user mengisi form input
                if($this->form_validation->run()==true){

                    //apabila password diganti
                    if($this->input->post('password') != "") {
                        $id_petugaslama = $this->input->post('id_petugaslama');
                        $id_petugas      = $this->input->post('id_petugas');
                        
                        $save  = array(
                            'id_petugas' => $this->input->post('id_petugas'),
                            'username'   => $this->input->post('username'),
                            'full_name'  => $this->input->post('full_name'),
                            'password'   => get_hash($this->input->post('password')),
                            'jk'            => $this->input->post('jenis'),
                            'jenis_user'            => $this->input->post('jenis_user'),
                            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                            'tempat_lahir'  => $this->input->post('tempat_lahir'),
                            'nohp'          => $this->input->post('nohp')
                        );
                        $this->Mod_users->updateUsers($id_petugaslama, $save);
                        // echo "berhasil"; die();
                        redirect('users/index/update-success'); 

                    //jika password tidak diganit    
                    }
                    else{
                        $id_petugaslama = $this->input->post('id_petugaslama');
                        $id_petugas      = $this->input->post('id_petugas');
                        
                        $save  = array(
                            'id_petugas' => $this->input->post('id_petugas'),
                            'username'   => $this->input->post('username'),
                            'full_name'  => $this->input->post('full_name'),
                            'jk'            => $this->input->post('jenis'),
                            'jenis_user'            => $this->input->post('jenis_user'),
                            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                            'tempat_lahir'  => $this->input->post('tempat_lahir'),
                            'nohp'          => $this->input->post('nohp')
                        );
                        $this->Mod_users->updateUsers($id_petugaslama, $save);
                        // echo "berhasil"; die();
                        redirect('users/index/update-success'); 
                    }
                    
                    
                    

                }
                //jika mengkosongkan
                else{
                    $id_petugas      = $this->input->post('id_petugas');
                    $data['edit']    = $this->Mod_users->getUsers($id_petugas)->row_array();
                    $this->template->load('layoutadmin', 'users/users_edit', $data);
                }
            
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function delete()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $id_petugas = $this->input->post('id_petugas');

            $this->Mod_users->deleteUsers($id_petugas, 'petugas');
            // echo "berhasil"; die();
            redirect('users/index/delete-success');
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function _set_rules(){
        $this->form_validation->set_rules('id_petugas','NIP','required|trim');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('full_name','Full Name','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('jenis','Jenis kelamin','required|max_length[11]');
        $this->form_validation->set_rules('jenis_user','Jenis User','required|max_length[10]');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required'); 
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[25]');
        $this->form_validation->set_rules('nohp','Nohp','required|max_length[14]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file Users.php */
