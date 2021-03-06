<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_teknisi');
    }


    public function index()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $data['teknisi']      = $this->Mod_teknisi->getAll();
            // print_r($data['countteknisi']); die();

            if($this->uri->segment(3)=="create-success") {
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                $data['teknisi']      = $this->Mod_teknisi->getAll();
                $this->template->load('layoutadmin', 'teknisi/teknisi_data', $data); 
            }
            else if($this->uri->segment(3)=="update-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                $data['teknisi']      = $this->Mod_teknisi->getAll();
                $this->template->load('layoutadmin', 'teknisi/teknisi_data', $data);
            }
            else if($this->uri->segment(3)=="delete-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                $data['teknisi']      = $this->Mod_teknisi->getAll();
                $this->template->load('layoutadmin', 'teknisi/teknisi_data', $data);
            }
            else{
                $data['message'] = "";
                $data['teknisi']      = $this->Mod_teknisi->getAll();
                $this->template->load('layoutadmin', 'teknisi/teknisi_data', $data);
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function create()
    {   
        if($this->session->userdata('akses')=='Admin'){
              $this->template->load('layoutadmin', 'teknisi/teknisi_create');
            }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function insert()
    {
        if($this->session->userdata('akses')=='Admin'){
            if(isset($_POST['save'])) {
                
                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    $id_petugas = $this->input->post('id_petugas');
                    $cek = $this->Mod_teknisi->cekTeknisi($id_petugas);
                    //cek id yg sudah digunakan
                    if($cek->num_rows() > 0){
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>ID</strong> Sudah Digunakan...!</p></div>"; 
                        $this->template->load('layoutadmin', 'teknisi/teknisi_create', $data); 
                    }
                    else{
                        $nama = slug($this->input->post('nama'));
                        $config['upload_path']   = './assets/img/teknisi/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png'; //mencegah upload backdor
                        $config['max_size']	     = '1000';
                        $config['max_width']     = '2000';
                        $config['max_height']    = '1024';
                        $config['file_name']     = $nama; 
                                
                        $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                        if ($this->upload->do_upload('userfile')){
                            
                            $image = $this->upload->data();

                            $save  = array(
                                'id_petugas'   => $this->input->post('id_petugas'),
                                'full_name'  => $this->input->post('full_name'),
                                //'username'   => $this->input->post('username'),
                                //'password'   => get_hash($this->input->post('password')),
                                'jk'    => $this->input->post('jenis'),
                                'tanggal_lahir'   => $this->input->post('tanggal_lahir'),
                                'tempat_lahir' => $this->input->post('tempat_lahir'),
                                'nohp' => $this->input->post('nohp'),
                                'jenis_user' => $this->input->post('jenis_user'),
                                'image' => $image['file_name']
                            );
                            $this->Mod_teknisi->insertTeknisi("petugas", $save);
                            // echo "berhasil"; die();
                            redirect('teknisi/index/create-success');

                        }
                        //apabila tidak ada gambar yg diupload
                        else{
                            $data['message'] = "<div class='alert alert-block alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                            $this->template->load('layoutadmin', 'teknisi/teknisi_create', $data);
                        } 
                    }
                }
                //jika tidak mengkosongkan
                else{
                    $data['message'] = "";
                    $this->template->load('layoutadmin', 'teknisi/teknisi_create', $data);
                }
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function edit()
    {
        if($this->session->userdata('akses')=='Admin'){
            $id = $this->uri->segment(3);
            $data['edit']    = $this->Mod_teknisi->cekTeknisi($id)->row_array();
            // $data['teknisi'] =  $this->Mod_teknisi->getAll()->result_array();
            // print_r($data['edit']); die();
            $this->template->load('layoutadmin', 'teknisi/teknisi_edit', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
        
    }

    public function update()
    {   
        if($this->session->userdata('akses')=='Admin'){
            if(isset($_POST['update'])) {

                //apabila ada gambar yg diupload
                if(!empty($_FILES['userfile']['name'])) {
                    

                    $this->_set_rules_update();

                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $id_petugaslama = $this->input->post('id_petugaslama'); 
                        $id_petugas = $this->input->post('id_petugas');
                        
                        $nama = slug($this->input->post('nama'));
                        $config['upload_path']   = './assets/img/teknisi/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']	     = '1000';
                        $config['max_width']     = '2000';
                        $config['max_height']    = '1024';
                        $config['file_name']     = $nama; 
                                
                        $this->upload->initialize($config);

                            //apabila ada gambar yg diupload
                        if ($this->upload->do_upload('userfile')){
                            
                            $image = $this->upload->data();

                            $save  = array(
                                'id_petugas'   => $this->input->post('id_petugas'),
                                'full_name'  => $this->input->post('full_name'),
                                //'username'   => $this->input->post('username'),
                                //'password'   => get_hash($this->input->post('password')),
                                'jk'    => $this->input->post('jenis'),
                                'tanggal_lahir'   => $this->input->post('tanggal_lahir'),
                                'tempat_lahir' => $this->input->post('tempat_lahir'),
                                'nohp' => $this->input->post('nohp'),
                                'image' => $image['file_name']
                            );

                            $g = $this->Mod_teknisi->getGambar($id_petugas)->row_array();
                            
                            //hapus gambar yg ada diserver
                            unlink('assets/img/teknisi/'.$g['image']);

                            $this->Mod_teknisi->updateTeknisi($id_petugaslama, $save);
                            // echo "berhasil"; die();
                            redirect('teknisi/index/update-success');

                        }
                        //apabila tidak ada gambar yg diupload
                        else{
                            $data['message'] = "<div class='alert alert-block alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                            $this->template->load('layoutadmin', 'teknisi/teknisi_create', $data);
                        } 
                            
                        
                    }
                    //jika tidak mengkosongkan
                    else{
                        $id_petugas = $this->input->post('id_petugas');
                        $data['edit']    = $this->Mod_teknisi->cekTeknisi($id_petugas)->row_array();
                        $data['message']="";
                        $this->template->load('layoutadmin', 'teknisi/teknisi_edit', $data);
                    }

                }else{
                    $this->_set_rules_update();
                    
                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $id_petugaslama = $this->input->post('id_petugaslama'); 
                        $id_petugas = $this->input->post('id_petugas');
                        
                        

                            $save  = array(
                                'id_petugas'         => $this->input->post('id_petugas'),
                                //'username'   => $this->input->post('username'),
                                //'password'   => get_hash($this->input->post('password')),
                                'full_name'          => $this->input->post('full_name'),
                                'jk'            => $this->input->post('jenis'),
                                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                                'tempat_lahir'  => $this->input->post('tempat_lahir'),
                                'nohp'          => $this->input->post('nohp'),                            
                            );
                            $this->Mod_teknisi->updateTeknisi($id_petugaslama, $save);
                            // echo "berhasil"; die();
                            redirect('teknisi/index/update-success');

                    
                            
                        
                    }
                    //jika tidak mengkosongkan
                    else{
                        $id_petugas = $this->input->post('id_petugas');
                        $data['edit']    = $this->Mod_teknisi->cekteknisi($id_petugas)->row_array();
                        $data['message']="";
                        $this->template->load('layoutadmin', 'teknisi/teknisi_edit', $data);
                    }

                }    

            } //end post update
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }//end function update

    public function delete()
    {
        if($this->session->userdata('akses')=='Admin'){
            // $id_petugas  = $this->uri->segment(3);

            $id_petugas = $this->input->post('kode');

            $g = $this->Mod_teknisi->getGambar($id_petugas)->row_array();
            
            //hapus gambar yg ada diserver
            unlink('assets/img/teknisi/'.$g['image']);

            $this->Mod_teknisi->deleteTeknisi($id_petugas, 'petugas');
            // echo "berhasil"; die();
            redirect('teknisi/index/delete-success');
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
        
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('id_petugas','No Identitas','required|max_length[20]');
        $this->form_validation->set_rules('jenis_user','Jenis User','required|max_length[10]');
        $this->form_validation->set_rules('full_name','Nama','required|max_length[50]');
        //$this->form_validation->set_rules('username','Username','required|trim');
        //$this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('jenis','Jenis kelamin','required|max_length[11]');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required'); 
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[25]');
        $this->form_validation->set_rules('nohp','Nohp','required|max_length[14]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }
    public function _set_rules_update()
    {
        $this->form_validation->set_rules('id_petugas','No Identitas','required|max_length[20]');        
        $this->form_validation->set_rules('full_name','Nama','required|max_length[50]');
      //  $this->form_validation->set_rules('username','Username','required|trim');
       // $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('jenis','Jenis kelamin','required|max_length[11]');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required'); 
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[25]');
        $this->form_validation->set_rules('nohp','Nohp','required|max_length[14]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file Teknisi.php */
 