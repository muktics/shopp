<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dataservice extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_dataservice');
    }


    public function index()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $data['transaksiteknisi'] = $this->Mod_dataservice->getAll();
            //$data['transaksiteknisibelum'] = $this->Mod_dataservice->getAllbelum();
                
            if($this->uri->segment(3)=="create-success") {
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>"; 
                $data['transaksiteknisi'] = $this->Mod_dataservice->getAll();   
                $this->template->load('layoutadmin', 'dataservice/dataservice_data', $data); 
            }
            else if($this->uri->segment(3)=="update-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                $data['transaksiteknisi'] = $this->Mod_dataservice->getAll();
                $this->template->load('layoutadmin', 'dataservice/dataservice_data', $data);
            }
            else if($this->uri->segment(3)=="delete-success"){
                $data['message'] = "<div class='alert alert-block alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                $data['transaksiteknisi'] = $this->Mod_dataservice->getAll();
                $this->template->load('layoutadmin', 'dataservice/dataservice_data', $data);
            }
            else{
                $data['message'] = "";
                $this->template->load('layoutadmin', 'dataservice/dataservice_data', $data);
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
                $cek = $this->Mod_dataservice->cekTransaksiteknisi($id_transaksi);
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
                            'tangga_lservice' => $this->input->post('tanggal_service'),
                            'merk'       => $this->input->post('merk'),
                            'garansi'   => $this->input->post('garansi'),
                            'kerusakan'   => $this->input->post('kerusakan'),
                            'lama' => $this->input->post('lama'),
                            'biaya' => $this->input->post('biaya'),
                            'image'       => $image['file_name']
                        );
                        $this->Mod_dataservice->insertTransaksiteknisi("dataservice", $save);
                        // echo "berhasil"; die();
                        redirect('dataservice/index/create-success');

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
            
            $data['edit']    = $this->Mod_dataservice->cekTransaksiteknisi($id_transaksi)->row_array();
            // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
            // print_r($data['edit']); die();
            $this->template->load('layoutadmin', 'dataservice/dataservice_edit', $data);
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
                            $save  = array(
                                'id_transaksi'   => $this->input->post('id_transaksi'),
                                'tanggal_service' => $this->input->post('tanggal_service'),
                                'merk'       => $this->input->post('merk'),
                                'imei'       => $this->input->post('imei'),
                                //'estimasi'       => $this->input->post('estimasi'),
                                //'garansi'   => $this->input->post('garansi'),
                                'kerusakan'   => $this->input->post('kerusakan'),
                                //'lama' => $this->input->post('lama'),
                                //'biaya' => $this->input->post('biaya')                            
                            );

                            $this->Mod_dataservice->updateDataservice($id_transaksi, $save);
                            // echo "berhasil"; die();
                            redirect('dataservice/index/update-success');                                    
                    }
                    //jika tidak mengkosongkan
                    else{

                        $id_transaksi = $this->input->post('id_transaksi');
                        $data['edit']    = $this->Mod_dataservice->cekTransaksiteknisi($id_transaksi)->row_array();
                        $data['message'] = "";
                        $this->template->load('layoutadmin', 'dataservice/dataservice_edit', $data);
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
                            'tanggal_service' => $this->input->post('tanggal_service'),
                            'merk'       => $this->input->post('merk'),
                            'imei'       => $this->input->post('imei'),
                            //'estimasi'       => $this->input->post('estimasi'),
                            //'garansi'   => $this->input->post('garansi'),
                            'kerusakan'   => $this->input->post('kerusakan'),
                            //'lama' => $this->input->post('lama'),
                            //'biaya' => $this->input->post('biaya')
                        );
                        $this->Mod_dataservice->updateTransaksiteknisi($id_transaksi, $save);
                        // echo "berhasil"; die();
                        redirect('dataservice/index/update-success');      
                    }
                    //jika tidak mengkosongkan
                    else{
                        $id_transaksi = $this->input->post('id_transaksi');
                        $data['edit']    = $this->Mod_dataservice->cekTransaksiteknisi($id_transaksi)->row_array();
                        $data['message'] = "";
                        $this->template->load('layoutadmin', 'dataservice/dataservice_edit', $data);
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
            
            //$g = $this->Mod_dataservice->getGambar($id_transaksi)->row_array();
            
            //hapus gambar yg ada diserver
            //unlink('assets/img/dataservice/'.$g['image']);

            $this->Mod_dataservice->deleteTransaksiteknisi($id_transaksi, 'transaksiteknisi');
            // echo "berhasil"; die();
            redirect('dataservice/index/delete-success');
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('id_transaksi','Id transaksi','required|max_length[12]');
        //$this->form_validation->set_rules('tanggal_service','Tanggal Service','required');
        $this->form_validation->set_rules('merk','Detail Barang','required|max_length[20]');
        $this->form_validation->set_rules('imei','IMEI Barang','required|max_length[30]');
        //$this->form_validation->set_rules('estimasi','Estimasi Penyelesaian Service','required|max_length[10]');
        //$this->form_validation->set_rules('garansi','Harga','required|max_length[20]');
        $this->form_validation->set_rules('kerusakan','Kerusakan','required|max_length[100]'); 
        //$this->form_validation->set_rules('estimasi','Estimasi Pengerjaan','required|max_length[10]'); 
        //$this->form_validation->set_rules('biaya','Biaya','required|max_length[200]'); 
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file Dataservice.php */
