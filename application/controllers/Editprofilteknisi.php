<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofilteknisi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_editprofil');
    }

    public function edit()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            if($this->session->userdata['id_petugas']){
                $id = $this->uri->segment(3);
                $data['edit']    = $this->Mod_editprofil->cekEditprofil($id)->row_array();
                // $data['kasir'] =  $this->Mod_kasir->getAll()->result_array();
                // print_r($data['edit']); die();
                $this->template->load('layoutteknisi', 'editprofil/editprofil_teknisi', $data);
            }
            else{
                echo "Anda Tidak Dapat mengakses Halaman ini";
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function update()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            if($this->session->userdata['id_petugas']){
                if(isset($_POST['update'])) {

                    //apabila ada gambar yg diupload
                    if(!empty($_FILES['userfile']['name'])) {
                        

                        $this->_set_rules_update();

                        //apabila user mengkosongkan form input
                        if($this->form_validation->run()==true){
                            // echo "masuk"; die();
                            
                            $id_petugaslama = $this->input->post('id_petugaslama'); 
                            $id_petugas = $this->input->post('id_petugas');
                            
                            $full_name = slug($this->input->post('full_name'));
                            $config['upload_path']   = './assets/img/teknisi/';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $config['max_size']	     = '1000';
                            $config['max_width']     = '2000';
                            $config['max_height']    = '1024';
                            $config['file_name']     = $full_name; 
                                    
                            $this->upload->initialize($config);

                                //apabila ada gambar yg diupload
                            if ($this->upload->do_upload('userfile')){
                                
                                $image = $this->upload->data();

                                $save  = array(
                                    'id_petugas'   => $this->input->post('id_petugas'),
                                    'full_name'  => $this->input->post('full_name'),
                                    'username'   => $this->input->post('username'),
                                    'password'   => get_hash($this->input->post('password')),
                                    'jk'    => $this->input->post('jenis'),
                                    'tanggal_lahir'   => $this->input->post('tanggal_lahir'),
                                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                                    'nohp' => $this->input->post('nohp'),
                                    'image' => $image['file_name']
                                );

                                $g = $this->Mod_editprofil->getGambar($id_petugas)->row_array();
                                
                                //hapus gambar yg ada diserver
                                unlink('assets/img/teknisi/'.$g['image']);

                                $this->Mod_editprofil->updateKasir($id_petugaslama, $save);
                                // echo "berhasil"; die();
                                redirect('dashboard');

                            }
                            //apabila tidak ada gambar yg diupload
                            else{
                                $data['message'] = "<div class='alert alert-block alert-danger'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                                $this->template->load('layoutteknisi', 'editprofilteknisi/editprofilteknisi_create', $data);
                            } 
                                
                            
                        }
                        //jika tidak mengkosongkan
                        else{
                            $id_petugas = $this->input->post('id_petugas');
                            $data['edit']    = $this->Mod_editprofil->cekKasir($id_petugas)->row_array();
                            $data['message']="";
                            $this->template->load('layoutteknisi', 'editprofil/editprofil_teknisi', $data);
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
                                    'username'   => $this->input->post('username'),
                                    'password'   => get_hash($this->input->post('password')),
                                    'full_name'          => $this->input->post('full_name'),
                                    'jk'            => $this->input->post('jenis'),
                                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                                    'tempat_lahir'  => $this->input->post('tempat_lahir'),
                                    'nohp'          => $this->input->post('nohp'),                            
                                );
                                $this->Mod_editprofil->updateKasir($id_petugaslama, $save);
                                // echo "berhasil"; die();
                                redirect('dashboard');

                        }
                        //jika tidak mengkosongkan input
                        else{
                            $id_petugas = $this->input->post('id_petugas');
                            $data['edit']    = $this->Mod_editprofil->cekKasir($id_petugas)->row_array();
                            $data['message']="";
                            $this->template->load('layoutteknisi', 'editprofil/editprofil_teknisi', $data);
                        }

                    }    

                } //end post update
            }
            else{
                echo "Anda Tidak Dapat mengakses Halaman ini";
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }//end function update

    public function _set_rules_update()
    {
        $this->form_validation->set_rules('id_petugas','No Identitas','required|max_length[20]');        
        $this->form_validation->set_rules('full_name','Nama','required|max_length[50]');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('jenis','Jenis kelamin','required|max_length[11]');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required'); 
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[25]');
        $this->form_validation->set_rules('nohp','Nohp','required|max_length[14]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file editprofilteknisi.php */
 