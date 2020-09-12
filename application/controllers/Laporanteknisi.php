<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanteknisi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model(array('Mod_laporan','Mod_barang','Mod_kasir','Mod_chart', 'Mod_transaksiteknisi'));
    }

    public function index(){
        if($this->session->userdata('akses')=='Admin'){                        
            $data['title']="Laporan Teknisi";
            $this->template->load('layoutadmin', 'laporan/laporanteknisi_data', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function cari_laporanteknisi()
    {
        if($this->session->userdata('akses')=='Admin'){
            // $tanggal1 = '2018-04-11';
            // $tanggal2 = '2018-04-17';
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $data['hasil_search'] = $this->Mod_laporan->searchLaporanteknisi($tanggal1,$tanggal2);
            $dataa = $this->Mod_chart->get_data_laporan_teknisi();
            $data['counttransaksiteknisi'] = $this->Mod_kasir->totalRows('transaksiteknisi');
            $data['counttransaksiteknisiproses'] = $this->Mod_transaksiteknisi->totalRows();
            $data['counttransaksiteknisiselesai'] = $this->Mod_transaksiteknisi->totalRowsselesai();
            $data['dataa'] = json_encode($dataa); 
            $this->load->view('laporan/cari_laporanteknisi', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }   

    public function detail_laporanteknisi()
    {
        if($this->session->userdata('akses')=='Admin'){
            $id_transaksi = $this->input->post('id_transaksi');
            $data['title']               = "Detail Service";
            $data['transaksiteknisi']        = $this->Mod_laporan->detailLaporanteknisi($id_transaksi)->row_array(); 
            $data['detailtransaksiteknisi'] = $this->Mod_laporan->detailLaporanteknisi($id_transaksi)->result();
            $this->load->view('laporan/laporanteknisi_detail', $data);

            // $id_transaksi = $this->uri->segment(3);
            // $data['title']               = "Detail laporanteknisi";
            // $data['laporanteknisi']        = $this->Mod_laporan->detaillaporanteknisi($id_transaksi)->row_array(); 
            // $data['detailjlaporanteknisi'] = $this->Mod_laporan->detaillaporanteknisi($id_transaksi)->result();
            // $this->template->load('layoutadmin', 'laporan/laporanteknisi_detail', $data);
            // echo "<pre>";
            // print_r($data['detailjlaporanteknisi']);
            // echo "</pre>";
        }
        else{
        echo "Anda Tidak Dapat mengakses Halaman ini";
        } 

    }

}

/* End of file Laporanteknisi.php */
