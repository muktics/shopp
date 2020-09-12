<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_service','Mod_kasir','Mod_barang'));
    }

    public function index()
    {   
        if($this->session->userdata('akses')=='Admin'){
            $data['tanggal_service']  = date('Y-m-d');
            $data['tanggal_selesai'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tanggal_service'])));
            $data['autonumber'] = $this->Mod_service->AutoNumbering();
            $data['kasir']    = $this->Mod_kasir->getKasir()->result();
            $this->template->load('layoutteknisi', 'service/service_data', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function tampil_tmp()
    {
        $data['tmp']       = $this->Mod_service->getTmp()->result();
        $data['jumlahTmp'] = $this->Mod_service->jumlahTmp();
        $this->load->view('service/service_tampil_tmp',$data);
    }

    public function cari_kasir()
    {
        $nis = $this->input->post('nis');
        $cari = $this->Mod_kasir->cekKasir($nis);
        //jika ada data kasir
        if($cari->num_rows() > 0) {
            $dkasir = $cari->row_array();
            echo $dkasir['nama'];
        }
    }

    public function cari_barang()
    {
        $caribarang = $this->input->post('caribarang');
        $data['barang'] = $this->Mod_barang->BookSearch($caribarang);
        $this->load->view('service/service_searchbook', $data);
        // foreach($data['barang'] as $d) {
        //     print_r($d); die();
        // }
    }

    public function cari_kode_barang()
    {
        //$kode_barang = 7611;
        $kode_barang = $this->input->post('kode_barang');
        $hasil = $this->Mod_barang->cekBarang($kode_barang);
        //jika ada barang dalam database
        if($hasil->num_rows() > 0) {
            $dbarang = $hasil->row_array();
            echo $dbarang['judul']."|".$dbarang['pengarang'];
        }
    }

    public function save_tmp()
    {
        // $kode = $this->Mod_service->getTransaksi()->result_array();
        
        // if($kode->num_rows()==1) {
        //     echo "sudah ada";
        // }
        // else{

            $kode_barang = $this->input->post('kode_barang');
            // echo $kode_barang; die();
            $cek = $this->Mod_service->cekTmp($kode_barang);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array(
                    'kode_barang' => $this->input->post('kode_barang'),
                    'judul'     => $this->input->post('judul'),
                    'pengarang' => $this->input->post('pengarang')
                );
                $this->Mod_service->InsertTmp($data);
            }
    
        //}


    }

    public function hapus_tmp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $this->Mod_service->deleteTmp($kode_barang);
    }

    public function simpan_transaksi()
    {
        $id_petugas = $this->session->userdata['id_petugas'];
        //ambil data tmp lakukan looping . setelah looping lakukan insert ke table transaksi
        $table_tmp = $this->Mod_service->getTmp()->result();
        foreach($table_tmp as $data){

            $kode_barang = $data->kode_barang; 
            
            $data = array(
                'id_transaksi'     => $this->input->post('no_transaksi'),                                
                'tanggal_service'   => $this->input->post('tanggal_service'),
                'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
                'status'           => "N",
                'id_petugas'       => $id_petugas
            );
           // print_r($data);
           
            //insert data ke table transaksi
            $this->Mod_service->InsertTransaksi($data); 


            //hapus table tmp
            $this->Mod_service->deleteTmp($kode_barang);
           
        }
    }


}

/* End of file Service.php */
