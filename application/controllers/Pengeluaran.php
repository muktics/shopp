<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_pengeluaran');
    }


    public function index()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $data['pengeluaran']      = $this->Mod_pengeluaran->getAll();
            // print_r($data['countpengeluaran']); die();

            if($this->uri->segment(3)=="create-success") {
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>"; 
                $data['pengeluaran']      = $this->Mod_pengeluaran->getAll();   
                $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_data', $data); 
            }
            else if($this->uri->segment(3)=="update-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>";
                $data['pengeluaran']      = $this->Mod_pengeluaran->getAll(); 
                $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_data', $data);
            }
            else if($this->uri->segment(3)=="delete-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                $data['pengeluaran']      = $this->Mod_pengeluaran->getAll();
                $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_data', $data);
            }
            else{
                $data['message'] = "";
                $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_data', $data);
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function create()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_create');
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
                $id_pengeluaran = $this->input->post('id_pengeluaran');
                $cek = $this->Mod_pengeluaran->cekPengeluaran($id_pengeluaran);
                //cek id_pengeluaran yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>id_pengeluaran</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_create', $data); 
                }
                else{                  
                        $save  = array(
                            'id_pengeluaran'   => $this->input->post('id_pengeluaran'),                            
                            'tanggal_pengeluaran'   => $this->input->post('tanggal_pengeluaran'),
                            'jenis_pengeluaran'   => $this->input->post('jenis'),
                            'deskripsi' => $this->input->post('deskripsi'),
                            'biaya' => str_replace('.', '', $this->input->post('biaya'))                        
                        );
                        $this->Mod_pengeluaran->insertPengeluaran("pengeluaran", $save);
                        // echo "berhasil"; die();
                        redirect('pengeluaran/index/create-success');

                    }                 
            }
            //jika tidak mengkosongkan
            else{
                $data['message'] = "";
                $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_create', $data);
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
            $data['edit']    = $this->Mod_pengeluaran->cekPengeluaran($id)->row_array();
            // $data['pengeluaran'] =  $this->Mod_pengeluaran->getAll()->result_array();
            // print_r($data['edit']); die();
            $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_edit', $data);
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
                    

                    $this->_set_rules();

                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $id_pengeluaran = $this->input->post('id_pengeluaran');
                        
                        $nama = slug($this->input->post('nama'));
                        $config['upload_path']   = './assets/img/pengeluaran/';
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
                                'id_pengeluaran'   => $this->input->post('id_pengeluaran'),                            
                                'tanggal_pengeluaran'   => $this->input->post('tangal_pengeluaran'),
                                'jenis_pengeluaran'   => $this->input->post('jenis'),
                                'deskripsi' => $this->input->post('deskripsi'),
                                'biaya' => str_replace('.', '', $this->input->post('biaya'))                        
                            );

                            $g = $this->Mod_pengeluaran->getGambar($id_pengeluaran)->row_array();
                            
                            //hapus gambar yg ada diserver
                            unlink('assets/img/pengeluaran/'.$g['image']);

                            $this->Mod_pengeluaran->updatePengeluaran($id_pengeluaran, $save);
                            // echo "berhasil"; die();
                            redirect('pengeluaran/index/update-success');

                        }
                        //apabila tidak ada gambar yg diupload
                        else{
                            $data['message'] = "<div class='alert alert-block alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                            $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_create', $data);
                        } 
                            
                        
                    }
                    //jika tidak mengkosongkan
                    else{
                        $id_pengeluaran = $this->input->post('id_pengeluaran');
                        $data['edit']    = $this->Mod_pengeluaran->cekPengeluaran($id_pengeluaran)->row_array();
                        $data['message']="";
                        $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_edit', $data);
                    }

                }else{
                    $this->_set_rules();
                    
                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $id_pengeluaran = $this->input->post('id_pengeluaran');
                        
                        

                            $save  = array(
                                'id_pengeluaran'   => $this->input->post('id_pengeluaran'),                            
                                'tanggal_pengeluaran'   => $this->input->post('tanggal_pengeluaran'),
                                'jenis_pengeluaran'   => $this->input->post('jenis'),
                                'deskripsi' => $this->input->post('deskripsi'),
                                'biaya' => str_replace('.', '', $this->input->post('biaya'))                        
                            );
                            $this->Mod_pengeluaran->updatePengeluaran($id_pengeluaran, $save);
                            // echo "berhasil"; die();
                            redirect('pengeluaran/index/update-success');

                    
                            
                        
                    }
                    //jika tidak mengkosongkan
                    else{
                        $id_pengeluaran = $this->input->post('id_pengeluaran');
                        $data['edit']    = $this->Mod_pengeluaran->cekPengeluaran($id_pengeluaran)->row_array();
                        $data['message']="";
                        $this->template->load('layoutadmin', 'pengeluaran/pengeluaran_edit', $data);
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
            // $id_pengeluaran  = $this->uri->segment(3);
            $id_pengeluaran = $this->input->post('kode');

            $this->Mod_pengeluaran->deletePengeluaran($id_pengeluaran, 'pengeluaran');
            // echo "berhasil"; die();
            redirect('pengeluaran/index/delete-success');
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    //function global buat validasi input
    public function _set_rules()
    {        
        $this->form_validation->set_rules('tanggal_pengeluaran','Tanggal Pengeluaran','required');         
        $this->form_validation->set_rules('jenis','Jenis Pengeluaran','required|max_length[30]');        
        $this->form_validation->set_rules('deskripsi','Deskripsi Pengeluaran','required|max_length[100]');
        $this->form_validation->set_rules('biaya','Biaya Pengeluaran','required');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file pengeluaran.php */
 