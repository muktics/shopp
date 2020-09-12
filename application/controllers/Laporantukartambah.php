<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporantukartambah extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model(array('Mod_laporan','Mod_barang','Mod_kasir','Mod_chart'));
    }

    public function index(){
        if($this->session->userdata('akses')=='Admin'){        
            $data['title']="Laporan Tukar Tambah";
            $this->template->load('layoutadmin', 'laporan/laporantukartambah_data', $data);            
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }    
    
    public function cari_laporantukartambah()
    {
        if($this->session->userdata('akses')=='Admin'){
            // $tanggal1 = '2018-04-19';
            // $tanggal2 = '2018-04-21';
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $data['hasil_search'] = $this->Mod_laporan->searchLaporantukartambah($tanggal1,$tanggal2);
            $this->load->view('laporan/cari_laporantukartambah', $data);
        }
        else{
        echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
        
    }
    
    public function detail_laporantukartambah()
    {
        if($this->session->userdata('akses')=='Admin'){
            //$id_transaksi = $this->uri->segment(3);
            $id_transaksi = $this->input->post('id_transaksi');
        
            $data['title']        = "Detail Pembelian dengan Tukar Tambah";
            $data['transaksitukartambah']       = $this->Mod_laporan->detailLaporantukartambah($id_transaksi)->row_array(); 
            $data['detailtransaksitukartambah'] = $this->Mod_laporan->detailLaporantukartambah($id_transaksi)->result();           
            $this->load->view('laporan/laporantukartambah_detail', $data);

            // $id_transaksi = $this->uri->segment(3);
            // $data['title']        = "Detail laporantukartambah";
            // $data['pinjam']       = $this->Mod_laporan->detailPinjaman($id_transaksi)->row_array(); 
            // $data['detailpinjam'] = $this->Mod_laporan->detailPinjaman($id_transaksi)->result();
            // $this->template->load('layoutadmin', 'laporan/laporantukartambah_detail', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    

}

/* End of file Laporantukartambah.php */
