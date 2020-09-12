<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Datatukartambah extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_datatukartambah');
    }


    public function index()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $data['transaksitukartambah'] = $this->Mod_datatukartambah->getAll();
                
            if($this->uri->segment(3)=="create-success") {
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                $data['transaksitukartambah'] = $this->Mod_datatukartambah->getAll();
                $this->template->load('layoutadmin', 'datatukartambah/tukartambah_data', $data); 
            }
            else if($this->uri->segment(3)=="update-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                $data['transaksitukartambah'] = $this->Mod_datatukartambah->getAll();
                $this->template->load('layoutadmin', 'datatukartambah/tukartambah_data', $data);
            }
            else if($this->uri->segment(3)=="delete-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                $data['transaksitukartambah'] = $this->Mod_datatukartambah->getAll();
                $this->template->load('layoutadmin', 'datatukartambah/tukartambah_data', $data);
            }
            else{
                $data['message'] = "";
                $this->template->load('layoutadmin', 'datatukartambah/tukartambah_data', $data);
            }
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    /*public function create()
    {
        $this->template->load('layoutadmin', 'service/service_data');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $id_transaksi = $this->input->post('id_transaksi');
                $cek = $this->Mod_datatukartambah->cekTransaksiteknisi($id_transaksi);
                //cek nis yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Id Data Service</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutadmin', 'service/service_data', $data); 
                }
                else{
                   
                            
                    $this->upload->initialize($config);

                     //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')){
                        
                        $image = $this->upload->data();

                        $save  = array(
                            'id_transaksi'   => $this->input->post('id_transaksi'),
                            'tanggalservice' => $this->input->post('tanggalservice'),
                            'merk'       => $this->input->post('merk'),
                            'garansi'   => $this->input->post('garansi'),
                            'kerusakan'   => $this->input->post('kerusakan'),
                            'lama' => $this->input->post('lama'),
                            'biaya' => $this->input->post('biaya'),
                            'image'       => $image['file_name']
                        );
                        $this->Mod_datatukartambah->insertTransaksiteknisi("datatukartambah", $save);
                        // echo "berhasil"; die();
                        redirect('datatukartambah/index/create-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutadmin', 'service/service_data', $data);
                    } 
                }
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutadmin', 'service/service_data', $data);
            }

        }
    }*/

    public function edit()
    {
        if($this->session->userdata('akses')=='Admin'){
            $id_transaksi = $this->uri->segment(3);
            
            $data['edit']    = $this->Mod_datatukartambah->cekDatatukartambah($id_transaksi)->row_array();
            // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
            // print_r($data['edit']); die();
            $this->template->load('layoutadmin', 'datatukartambah/tukartambah_edit', $data);
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function update()
    {
        if($this->session->userdata('akses')=='Admin'){
            if(isset($_POST['update'])) {

                // echo "proses update"; die();
                //apabila ada gambar yg diupload
                if(!empty($_FILES['userfile']['name'])) {

                    $this->_set_rules();

                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $id_transaksi = $this->input->post('id_transaksi');
                        
                    
                                
                        $this->upload->initialize($config);

                            //apabila ada gambar yg diupload
                        if ($this->upload->do_upload('userfile')){
                            
                            $image = $this->upload->data();

                            $save  = array(
                                'id_transaksi'   => $this->input->post('id_transaksi'),
                                'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
                                'nama_pelanggan'       => $this->input->post('nama_pelanggan'),
                                'detail'   => $this->input->post('detail'),
                                'alasan'   => $this->input->post('alasan'),
                                'harga_jual' => $this->input->post('harga_jual')                          
                                //'image'       => $image['file_name']
                            );

                            $g = $this->Mod_datatukartambah->getGambar($id_transaksi)->row_array();
                            
                            //hapus gambar yg ada diserver
                            unlink('assets/img/datatukartambah/'.$g['image']);

                            $this->Mod_datatukartambah->updateDatatukartambah($id_transaksi, $save);
                            // echo "berhasil"; die();
                            redirect('datatukartambah/index/update-success');

                        }
                        //apabila tidak ada gambar yg diupload
                        else{
                            $data['message'] = "<div class='alert alert-block alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                            $this->template->load('layoutadmin', 'datatukartambah/tukartambah_edit', $data);
                        } 
                            
                        
                    }
                    //jika tidak mengkosongkan
                    else{

                        $id_transaksi = $this->input->post('id_transaksi');
                        $data['edit']    = $this->Mod_datatukartambah->cekDatatukartambah($id_transaksi)->row_array();
                        $data['message'] = "";
                        $this->template->load('layoutadmin', 'datatukartambah/tukartambah_edit', $data);
                    }
                
                }
                //jika tidak ada gambar yg diupload
                else{
                    $this->_set_rules();
                    
                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $id_transaksi = $this->input->post('id_transaksi');
                        
                        $save  = array(
                            'id_transaksi'   => $this->input->post('id_transaksi'),
                                'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
                                'nama_pelanggan'       => $this->input->post('nama_pelanggan'),
                                'detail'   => $this->input->post('detail'),
                                'alasan'   => $this->input->post('alasan'),
                                'harga_jual' => $this->input->post('harga_jual') 
                        );
                        $this->Mod_datatukartambah->updateDatatukartambah($id_transaksi, $save);
                        // echo "berhasil"; die();
                        redirect('datatukartambah/index/update-success');      
                    }
                    //jika tidak mengkosongkan
                    else{
                        $id_transaksi = $this->input->post('id_transaksi');
                        $data['edit']    = $this->Mod_datatukartambah->cekDatatukartambah($id_transaksi)->row_array();
                        $data['message'] = "";
                        $this->template->load('layoutadmin', 'datatukartambah/tukartambah_edit', $data);
                    }

                } //end empty $_FILES

            } // end $_POST['update']
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    
    }

    public function delete()
    {   
        if($this->session->userdata('akses')=='Admin'){
            // $nis  = $this->uri->segment(3);

            $id_transaksi = $this->input->post('id_transaksi');
            
            //$g = $this->Mod_datatukartambah->getGambar($id_transaksi)->row_array();
            
            //hapus gambar yg ada diserver
            //unlink('assets/img/datatukartambah/'.$g['image']);

            $this->Mod_datatukartambah->deleteDatatukartambah($id_transaksi, 'transaksitukartambah');
            // echo "berhasil"; die();
            redirect('datatukartambah/index/delete-success');
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('id_transaksi','Id transaksi','required|max_length[12]');
        $this->form_validation->set_rules('tanggal_transaksi','Tanggal Transaksi','required');
        $this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','required|max_length[50]');
        $this->form_validation->set_rules('detail','Detail Tukar Tambah','required|max_length[100]');
        $this->form_validation->set_rules('alasan','Alasan Tukar Tambah','required|max_length[100]'); 
        $this->form_validation->set_rules('harga_jual','Harga Jual','required|max_length[200]');          
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file datatukartambah.php */
