<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksiteknisi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_transaksiteknisi');
    }

    public function index()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $data['tanggal_service']  = date('Y-m-d');
            //$data['tanggal_selesai'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tanggal_service'])));
            $data['autonumber'] = $this->Mod_transaksiteknisi->AutoNumbering();
            $data['tmptrservice']       = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            //$data['kasir']    = $this->Mod_kasir->getKasir()->result();
            //$data['transaksiteknisi']      = $this->Mod_transaksiteknisi->getAll();
            $this->template->load('layoutteknisi', 'transaksiteknisi/transaksiteknisi_data', $data);
        }
        else{
            echo "Anda Tidak Berhak Mengaskses Halaman Ini";
        }
    }

    /*public function tampil_tmp()
    {
        $data['tmp']       = $this->Mod_transaksiteknisi->getTmp()->result();
        $data['jumlahTmp'] = $this->Mod_transaksiteknisi->jumlahTmp();
        $this->load->view('transaksiteknisi/transaksiteknisi_tampil_tmp',$data);
    }*/

    /*public function cari_kasir()
    {
        $nis = $this->input->post('nis');
        $cari = $this->Mod_kasir->cekKasir($nis);
        //jika ada data kasir
        if($cari->num_rows() > 0) {
            $dkasir = $cari->row_array();
            echo $dkasir['nama'];
        }
    }*/

    /*public function cari_service()
    {
        $cariservice = $this->input->post('cariservice');
        $data['service'] = $this->Mod_service->BookSearch($cariservice);
        $this->load->view('transaksiteknisi/transaksiteknisi_searchbook', $data);
        // foreach($data['service'] as $d) {
        //     print_r($d); die();
        // }
    }*/

    /*public function cari_kode_service()
    {
        //$kode_service = 7611;
        $kode_service = $this->input->post('kode_service');
        $hasil = $this->Mod_service->cekService($kode_service);
        //jika ada service dalam database
        if($hasil->num_rows() > 0) {
            $dservice = $hasil->row_array();
            echo $dservice['imei']."|".$dservice['merk'];
        }
    }*/

    /*public function save_tmp()
    {
        // $kode = $this->Mod_transaksiteknisi->getTransaksiteknisi()->result_array();
        
        // if($kode->num_rows()==1) {
        //     echo "sudah ada";
        // }
        // else{

            $kode_service = $this->input->post('kode_service');
            // echo $kode_service; die();
            $cek = $this->Mod_transaksiteknisi->cekTmp($kode_service);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array(
                    'kode_service' => $this->input->post('kode_service'),
                    'imei'     => $this->input->post('imei'),
                    'merk' => $this->input->post('merk')
                );
                $this->Mod_transaksiteknisi->InsertTmp($data);
            }
    
        //}


    }*/

    /*public function hapus_tmp()
    {
        $kode_service = $this->input->post('kode_service');
        $this->Mod_transaksiteknisi->deleteTmp($kode_service);
    }*/

    public function save_tmptrservis()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            // $kode = $this->Mod_transaksikasir->getTransaksi()->result_array();
            
            // if($kode->num_rows()==1) {
            //     echo "sudah ada";
            // }
            // else{

                $imei = $this->input->post('imei');
                // echo $kode_barang; die();
                $cek = $this->Mod_transaksiteknisi->cekTmptrservice($imei);
                //cek apakah data masih kosong di tabel tmp
                if($cek->num_rows() < 1) {
                    $data = array(
                        'estimasi' => $this->input->post('estimasi'),
                        'kerusakan'     => $this->input->post('kerusakan'),
                        'imei'     => $this->input->post('imei'),                    
                        'merk' => $this->input->post('merk')
                    );
                    $this->Mod_transaksiteknisi->InsertTmptrservice($data);
                }
                $id_transaksi = $this->input->post('id_transaksi');
                $autonumber = $this->Mod_transaksiteknisi->AutoNumbering();
                $id_petugas = $this->session->userdata['id_petugas'];
            // $title        = "Detail Service";
                $tanggal_service  = date('Y-m-d');
                //$tanggal_service  = $this->input->get('tanggal_service');
                //$data['autonumber'] = $this->Mod_transaksiteknisi->AutoNumbering();
                $tmptrservice       = $this->Mod_transaksiteknisi->getTmptrservice()->result();
                $data = array(
                    //'id_transaksi'     => $this->input->post('no_transaksi'),                
                    'imei'              => $this->input->post('imei'),
                    'merk'              => $this->input->post('merk'),                                
                    'kerusakan'              => $this->input->post('kerusakan'),
                    //'garansi'              => $this->input->post('garansi'),
                    'estimasi'              => $this->input->post('estimasi'),
                    //'biaya'              => $this->input->post('biaya'),
                    
                    //'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
                    //'status'           => "N",
                    //'title'   => $title,
                    'tmptrservice'  =>$tmptrservice,
                    'tanggal_service'   => $tanggal_service,
                    'autonumber' =>$autonumber,
                    'id_petugas'       => $id_petugas
                );
                
                //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
                //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
                $this->load->view('transaksiteknisi/transaksiteknisi_cetaknota', $data);
        
            //}
        }
        else{
            echo "Anda Tidak Berhak Mengaskses Halaman Ini";
        }

    }

    public function save_tmptrservice()
    {
        // $kode = $this->Mod_transaksikasir->getTransaksi()->result_array();
        
        // if($kode->num_rows()==1) {
        //     echo "sudah ada";
        // }
        // else{
        if($this->session->userdata('akses')=='Teknisi'){
            $imei = $this->input->post('imei');
            // echo $kode_barang; die();
            $cek = $this->Mod_transaksiteknisi->cekTmptrteknisi($imei);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array(
                    'kerusakan' => $this->input->post('kerusakan'),
                    'estimasi'     => $this->input->post('estimasi'),
                    'imei'     => $this->input->post('imei'),                    
                    'merk' => $this->input->post('merk')
                );
                $this->Mod_transaksiteknisi->InsertTmptrservice($data);
            }
            //$id_transaksi = $this->input->post('id_transaksi');        
            //$data['title']        = "Detail Pembelian";
            //$data['tanggal_service']  = date('Y-m-d');
            //$data['autonumber'] = $this->Mod_transaksiteknisi->AutoNumbering();
            //$data['tmptrteknisi']       = $this->Mod_transaksiteknisi->getTmptrteknisi()->result();
            //$data['jumlahTmp'] = $this->Mod_transaksiteknisi->jumlahTmp(); 
            
            //$this->load->view('transaksiteknisi/transaksiteknisi_cetaknota', $data);
            //redirect('transaksiteknisi/detail_transaksiteknisi');
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 

    }

    public function hapus_tmptrservice()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $imei = $this->input->post('imei');
            $this->Mod_transaksiteknisi->deleteTmptrservice($imei);
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function redi(){
        if($this->session->userdata('akses')=='Teknisi'){
            redirect('transaksiteknisi/detail_transaksiteknisi');
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function detail_transaksiteknisi()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            //$id_transaksi = $this->uri->segment(3);
            $id_transaksi = $this->input->post('id_transaksi');
            $autonumber = $this->Mod_transaksiteknisi->AutoNumbering();
            $id_petugas = $this->session->userdata['id_petugas'];
           // $title        = "Detail Service";
            $tanggal_service  = date('Y-m-d');
            $tmptrservice       = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            //$tanggal_service  = $this->input->get('tanggal_service');
            //$data['autonumber'] = $this->Mod_transaksiteknisi->AutoNumbering();
            $data = array(
                //'id_transaksi'     => $this->input->post('no_transaksi'),                
                'imei'              => $this->input->post('imei'),
                'merk'              => $this->input->post('merk'),                                
                'kerusakan'              => $this->input->post('kerusakan'),
                //'garansi'              => $this->input->post('garansi'),
                'estimasi'              => $this->input->post('estimasi'),
                //'biaya'              => $this->input->post('biaya'),
                
                //'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
                //'status'           => "N",
                //'title'   => $title,
                'tmptrservice'  => $tmptrservice,
                'tanggal_service'   => $tanggal_service,
                'autonumber' =>$autonumber,
                'id_petugas'       => $id_petugas
            );
            //$data['tmptrservice']       = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            
            //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            $this->load->view('transaksiteknisi/transaksiteknisi_cetaknota', $data);

            // $id_transaksi = $this->uri->segment(3);
            // $data['title']        = "Detail laporankasir";
            // $data['pinjam']       = $this->Mod_laporan->detailPinjaman($id_transaksi)->row_array(); 
            // $data['detailpinjam'] = $this->Mod_laporan->detailPinjaman($id_transaksi)->result();
            // $this->template->load('layoutadmin', 'laporan/laporankasir_detail', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function cetak_nota_tservice()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            //$id_transaksi = $this->uri->segment(3);
            $id_transaksi = $this->input->post('id_transaksi');
            $autonumber = $this->Mod_transaksiteknisi->AutoNumbering();
            $id_petugas = $this->session->userdata['id_petugas'];
           // $title        = "Detail Service";
            $tanggal_service  = date('Y-m-d');
            $tmptrservice       = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            //$tanggal_service  = $this->input->get('tanggal_service');
            //$data['autonumber'] = $this->Mod_transaksiteknisi->AutoNumbering();
            $data = array(
                //'id_transaksi'     => $this->input->post('no_transaksi'),                
                'imei'              => $this->input->post('imei'),
                'merk'              => $this->input->post('merk'),                                
                'kerusakan'              => $this->input->post('kerusakan'),
                //'garansi'              => $this->input->post('garansi'),
                'estimasi'              => $this->input->post('estimasi'),
                //'biaya'              => $this->input->post('biaya'),
                
                //'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
                //'status'           => "N",
                //'title'   => $title,
                'tmptrservice'  => $tmptrservice,
                'tanggal_service'   => $tanggal_service,
                'autonumber' =>$autonumber,
                'id_petugas'       => $id_petugas
            );
            //$data['tmptrservice']       = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            
            //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            $this->load->view('transaksiteknisi/cetak_nota', $data);

            // $id_transaksi = $this->uri->segment(3);
            // $data['title']        = "Detail laporankasir";
            // $data['pinjam']       = $this->Mod_laporan->detailPinjaman($id_transaksi)->row_array(); 
            // $data['detailpinjam'] = $this->Mod_laporan->detailPinjaman($id_transaksi)->result();
            // $this->template->load('layoutadmin', 'laporan/laporankasir_detail', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function simpan_transaksiteknisi()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $id_petugas = $this->session->userdata['id_petugas'];
            //ambil data tmp lakukan looping . setelah looping lakukan insert ke table transaksiteknisi
            //$table_tmp = $this->Mod_transaksiteknisi->getTmp()->result();
            
                $data = array(
                    'id_transaksi'     => $this->input->post('no_transaksi'),
                    'imei'              => $this->input->post('imei'),
                    'merk'              => $this->input->post('merk'),                                
                    'kerusakan'              => $this->input->post('kerusakan'),
                    //'garansi'              => $this->input->post('garansi'),
                    'estimasi'              => $this->input->post('estimasi'),
                    //'biaya'              => $this->input->post('biaya'),
                    'tanggal_service'   => $this->input->post('tanggal_service'),
                    //'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
                    'status'           => "N",
                    'id_petugas'       => $id_petugas
                );
            // print_r($data);
            
                //insert data ke table transaksiteknisi
                $this->Mod_transaksiteknisi->InsertTransaksiteknisi($data); 


                //hapus table tmp
                $this->Mod_transaksiteknisi->deleteTmptrservice($imei);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function resettmpservice(){
        if($this->session->userdata('akses')=='Teknisi'){
            $table_tmptrservice = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            foreach($table_tmptrservice as $data){        
                $imei = $data->imei; 
                $data = array(
                    //'id_transaksi'     => $this->input->post('no_transaksi'),
                    //'nis'              => $this->input->post('nis'),
                    'imei'        => $this->input->post('imei'),
                    'merk'        => $this->input->post('merk'),
                    'kerusakan'        => $this->input->post('kerusakan'),
                    'estimasi'        => $this->input->post('estimasi')
                    //'status'        => $this->input->post('status'),
                    //'imei'        => $data->imei,
                    //'tipe'        => $data->tipe,
                    //'merk'        => $data->merk,
                    //'harga'        => $data->harga,
                    //'tanggal_service'   => $this->input->post('tanggal_service'),
                    //'tanggal_kembali'  => $this->input->post('tgl_kembali'),
                    //'status'           => "N",
                    //'id_petugas'       => $id_petugas
                );
            //hapus table tmptrservice
            $this->Mod_transaksiteknisi->deleteTmptrservice($imei);
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function simpan_transaksi()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $id_petugas = $this->session->userdata['id_petugas'];
            $table_tmptrservice = $this->Mod_transaksiteknisi->getTmptrservice()->result();
            foreach($table_tmptrservice as $data){        
                $imei = $data->imei; 
                $data = array(
                    'id_transaksi'     => $this->input->post('no_transaksi'),
                    //'nis'              => $this->input->post('nis'),
                    'imei'        => $this->input->post('imei'),
                    'merk'        => $this->input->post('merk'),
                    'kerusakan'        => $this->input->post('kerusakan'),
                    'estimasi'        => $this->input->post('estimasi'),
                    //'status'        => $this->input->post('status'),
                    //'imei'        => $data->imei,
                    //'tipe'        => $data->tipe,
                    //'merk'        => $data->merk,
                    //'harga'        => $data->harga,
                    'tanggal_service'   => $this->input->post('tanggal_service'),
                    //'tanggal_kembali'  => $this->input->post('tgl_kembali'),
                    'status'           => "N",
                    'id_petugas'       => $id_petugas
                );
            // print_r($data);
            
                //insert data ke table transaksiservice
                $this->Mod_transaksiteknisi->InsertTransaksiteknisi($data); 

                //hapus table tmptrservice
                $this->Mod_transaksiteknisi->deleteTmptrservice($imei);
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }


}

/* End of file Transaksiteknisi.php */
