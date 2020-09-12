<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model(array('Mod_barang', 'Mod_qrcode'));
    }


    public function index()
    {
        if($this->session->userdata('akses')=='Admin'){
            $data['barang']      = $this->Mod_barang->getAll();
            $data['barang']=$this->Mod_qrcode->get_all_barang();
        
        
            if($this->uri->segment(3)=="create-success") {
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                $data['barang']      = $this->Mod_barang->getAll();
                $data['barang']=$this->Mod_qrcode->get_all_barang();
                $this->template->load('layoutadmin', 'barang/barang_data', $data); 
            }
            else if($this->uri->segment(3)=="update-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Diperbarui...!</p></div>"; 
                $data['barang']      = $this->Mod_barang->getAll();
                $data['barang']=$this->Mod_qrcode->get_all_barang();
                $this->template->load('layoutadmin', 'barang/barang_data', $data);
            }
            else if($this->uri->segment(3)=="delete-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                $data['barang']      = $this->Mod_barang->getAll();
                $data['barang']=$this->Mod_qrcode->get_all_barang();
                $this->template->load('layoutadmin', 'barang/barang_data', $data);
            }
            else{
                $data['message'] = "";
                $this->template->load('layoutadmin', 'barang/barang_data', $data);
            }
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";     
        }
        
    }

    public function create()
    {
        if($this->session->userdata('akses')=='Admin'){
            $this->template->load('layoutadmin', 'barang/barang_create');
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";     
        }
    }

    public function insert()
    {
        if($this->session->userdata('akses')=='Admin'){
            if(isset($_POST['save'])) {

                //function validasi
                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    $kode_barang = $this->input->post('kode_barang');
                    
                    $cek = $this->Mod_barang->cekBarang($kode_barang);
                    
                    //cek kode barang yg sudah digunakan
                    if($cek->num_rows() > 0){
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Kode Barang</strong> Sudah Digunakan...!</p></div>"; 
                        $this->template->load('layoutadmin', 'barang/barang_create', $data); 
                    }
                    else{
                        $judul = slug($this->input->post('judul'));
                        $config['upload_path']   = './assets/img/barang/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']	     = '2048';
                        $config['max_width']     = '2048';
                        $config['max_height']    = '2048';
                        $config['file_name']     = $judul; 
                                
                        $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                        if ($this->upload->do_upload('userfile')){
                            
                            $image = $this->upload->data();
                            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    
                            $config['cacheable']    = true; //boolean, the default is true
                            $config['cachedir']     = './assets/'; //string, the default is application/cache/
                            $config['errorlog']     = './assets/'; //string, the default is application/logs/
                            $config['imagedir']     = './assets/img/qr/'; //direktori penyimpanan qr code
                            $config['quality']      = true; //boolean, the default is true
                            $config['size']         = '1024'; //interger, the default is 1024
                            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
                            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
                            $this->ciqrcode->initialize($config);

                            $save  = array(
                                'kode_barang'   => $this->input->post('kode_barang'),
                                'merk'       => $this->input->post('merk'),
                                'tipe'   => $this->input->post('tipe'),
                                'harga' => str_replace('.', '', $this->input->post('harga')),
                                'imei'   => $this->input->post('imei'),
                                'spesifikasi' => $this->input->post('spesifikasi'),
                                //$image_qr=>$this->input->post('kode_barang').'.png', //buat name dari qr code sesuai dengan nim
                                'qrcode'=>$this->input->post('kode_barang').'.png', //buat name dari qr code sesuai dengan nim
                                'image'       => $image['file_name']
                            );
                            $image_qr=$kode_barang.'.png'; //buat name dari qr code sesuai dengan nim
                            $params['data'] = $kode_barang; //data yang akan di jadikan QR CODE
                            $params['level'] = 'H'; //H=High
                            $params['size'] = 10;
                            $params['savename'] = FCPATH.$config['imagedir'].$image_qr; //simpan image QR CODE ke folder assets/images/
                            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
                            $this->Mod_barang->insertBarang("barang", $save);
                            // echo "berhasil"; die();
                            redirect('barang/index/create-success');
                        }
                        //apabila tidak ada gambar yg diupload
                        else{
                            $data['message'] = "<div class='alert alert-block alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                            $this->template->load('layoutadmin', 'barang/barang_create', $data);
                        } 
                    }
                
                }
                //jika tidak mengkosongkan form
                else{
                    $data['message'] = "";
                    $this->template->load('layoutadmin', 'barang/barang_create', $data);
                }

            }
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";     
        }
    }

    public function edit()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $kode_barang = $this->uri->segment(3);
            
            $data['edit']    = $this->Mod_barang->cekBarang($kode_barang)->row_array();
            // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
            // print_r($data['edit']); die();
            $this->template->load('layoutadmin', 'barang/barang_edit', $data);
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
                        
                        //$kode_baranglama = $this->input->post('kode_baranglama');
                        $kode_barang = $this->input->post('kode_barang');
                        //$harga = str_replace('.', '',$harga);
                        //$merk = $this->input->post('merk');
                        //$tipe = $this->input->post('tipe');
                        //$spesifikasi = $this->input->post('spesifikasi');
                        
                        $judul = slug($this->input->post('judul'));
                        $config['upload_path']   = './assets/img/barang/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']	     = '2048';
                        $config['max_width']     = '2048';
                        $config['max_height']    = '2048';
                        $config['file_name']     = $judul; 
                                
                        $this->upload->initialize($config);

                            //apabila ada gambar yg diupload
                        if ($this->upload->do_upload('userfile')){
                            
                            $image = $this->upload->data();
                            $this->load->library('ciqrcode'); //pemanggilan library QR CODE

                            $config['cacheable']    = true; //boolean, the default is true
                            $config['cachedir']     = './assets/'; //string, the default is application/cache/
                            $config['errorlog']     = './assets/'; //string, the default is application/logs/
                            $config['imagedir']     = './assets/img/qr/'; //direktori penyimpanan qr code
                            $config['quality']      = true; //boolean, the default is true
                            $config['size']         = '1024'; //interger, the default is 1024
                            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
                            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
                            $this->ciqrcode->initialize($config);

                            $save  = array(
                                'kode_barang'   => $this->input->post('kode_barang'),
                                'merk'       => $this->input->post('merk'),
                                'tipe'   => $this->input->post('tipe'),
                                'harga' => str_replace('.', '', $this->input->post('harga')),
                                'imei'   => $this->input->post('imei'),
                                'spesifikasi' => $this->input->post('spesifikasi'),
                                'qrcode'=>$this->input->post('kode_barang').'.png', //buat name dari qr code sesuai dengan nim
                                'image'       => $image['file_name']
                            );
                            $image_qr=$kode_barang.'.png'; //buat name dari qr code sesuai dengan nim
                            $params['data'] = $kode_barang/*.$merk.$tipe.$spesifikasi*/; //data yang akan di jadikan QR CODE
                            $params['level'] = 'H'; //H=High
                            $params['size'] = 10;
                            $params['savename'] = FCPATH.$config['imagedir'].$image_qr; //simpan image QR CODE ke folder assets/images/
                            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

                            $g = $this->Mod_barang->getGambar($kode_barang)->row_array();
                            
                            //hapus gambar yg ada diserver
                            unlink('assets/img/barang/'.$g['image']);

                            $this->Mod_barang->updateBarang($kode_baranglama, $save);
                            $this->Mod_barang->updateBarang($kode_barang, $save);
                            // echo "berhasil"; die();
                            redirect('barang/index/update-success');

                        }
                        //apabila tidak ada gambar yg diupload
                        else{
                            $data['message'] = "<div class='alert alert-block alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                            $this->template->load('layoutadmin', 'barang/barang_edit', $data);
                        } 
                            
                        
                    }
                    //jika tidak mengkosongkan
                    else{

                        $kode_barang = $this->input->post('kode_barang');
                        $data['edit']    = $this->Mod_barang->cekBarang($kode_barang)->row_array();
                        $data['message'] = "";
                        $this->template->load('layoutadmin', 'barang/barang_edit', $data);
                    }
                
                }
                //jika tidak ada gambar yg diupload
                else{
                    $this->_set_rules();
                    
                    //apabila user mengkosongkan form input
                    if($this->form_validation->run()==true){
                        // echo "masuk"; die();
                        
                        $kode_baranglama = $this->input->post('kode_baranglama');
                        $kode_barang = $this->input->post('kode_barang');
                        //$merk = $this->input->post('merk');
                        //$tipe = $this->input->post('tipe');
                        //$spesifikasi = $this->input->post('spesifikasi');
                        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

                        $config['cacheable']    = true; //boolean, the default is true
                        $config['cachedir']     = './assets/'; //string, the default is application/cache/
                        $config['errorlog']     = './assets/'; //string, the default is application/logs/
                        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
                        $config['quality']      = true; //boolean, the default is true
                        $config['size']         = '1024'; //interger, the default is 1024
                        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
                        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
                        $this->ciqrcode->initialize($config);

                        $save  = array(
                            'kode_barang'   => $this->input->post('kode_barang'),
                                'merk'       => $this->input->post('merk'),
                                'tipe'   => $this->input->post('tipe'),
                                'harga' => str_replace('.', '', $this->input->post('harga')),
                                'imei'   => $this->input->post('imei'),
                                'qrcode'=>$this->input->post('kode_barang').'.png', //buat name dari qr code sesuai dengan nim
                                'spesifikasi' => $this->input->post('spesifikasi')                            
                        );
                        $image_qr=$kode_barang.'.png'; //buat name dari qr code sesuai dengan nim
                            $params['data'] = $kode_barang/*.$merk.$tipe.$spesifikasi*/; //data yang akan di jadikan QR CODE
                            $params['level'] = 'H'; //H=High
                            $params['size'] = 10;
                            $params['savename'] = FCPATH.$config['imagedir'].$image_qr; //simpan image QR CODE ke folder assets/images/
                            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
                        
                        //$this->Mod_barang->updateBarang($kode_baranglama, $save);                            
                        $this->Mod_barang->updateBarang($kode_barang, $save);
                        // echo "berhasil"; die();
                        redirect('barang/index/update-success');      
                    }
                    //jika tidak mengkosongkan
                    else{
                        $kode_barang = $this->input->post('kode_barang');
                        $data['edit']    = $this->Mod_barang->cekBarang($kode_barang)->row_array();
                        $data['message'] = "";
                        $this->template->load('layoutadmin', 'barang/barang_edit', $data);
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

            $kode_barang = $this->input->post('kode_barang');
            
            $g = $this->Mod_barang->getGambar($kode_barang)->row_array();
            $qr = $this->Mod_barang->getQr($kode_barang)->row_array();

            //hapus gambar yg ada diserver
            unlink('assets/img/barang/'.$g['image']);
            unlink('assets/img/qr/'.$qr['qrcode']);

            $this->Mod_barang->deleteBarang($kode_barang, 'barang');
            // echo "berhasil"; die();
            redirect('barang/index/delete-success');
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";     
        }
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('kode_barang','Kode barang','required|max_length[20]');
        $this->form_validation->set_rules('merk','Merk','required|max_length[50]');
        $this->form_validation->set_rules('tipe','Tipe / Model Barang','required|max_length[50]');
        $this->form_validation->set_rules('harga','Harga','required|max_length[12]');
        $this->form_validation->set_rules('imei','IMEI','required|max_length[25]');
        $this->form_validation->set_rules('spesifikasi','Spesifikasi','required|max_length[145]'); 
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file Barang.php */
