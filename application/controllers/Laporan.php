<?php 
/*defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model(array('Mod_laporan','Mod_barang','Mod_kasir','Mod_chart'));
    }

    public function index(){
        if($this->session->userdata('akses')=='Admin'){
            if($this->uri->segment(3)=="kasir") {
                $data['title']="Laporan Kasir";
                $this->template->load('layoutadmin', 'laporan/laporankasir_data', $data);
                redirect('laporan/kasir');
            }
            if($this->uri->segment(3)=="teknisi") {
                $data['title']="Laporan Teknisi";
                $this->template->load('layoutadmin', 'laporan/laporanteknisi_data', $data);
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }
    public function kasir()
    {
        if($this->session->userdata('akses')=='Admin'){
            $data['title']="Laporan Kasir";
            $this->template->load('layoutadmin', 'laporan/laporankasir_data', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function teknisi()
    {
        if($this->session->userdata('akses')=='Admin'){
            $data['title']="Laporan Teknisi";
            $this->template->load('layoutadmin', 'laporan/laporanteknisi_data', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

    public function cari_laporankasir()
    {
        if($this->session->userdata('akses')=='Admin'){
            // $tanggal1 = '2018-04-19';
            // $tanggal2 = '2018-04-21';
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $data['hasil_search'] = $this->Mod_laporan->searchLaporankasir($tanggal1,$tanggal2);
            $this->load->view('laporan/cari_laporankasir', $data);
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
            $data['dataa'] = json_encode($dataa); 
            $this->load->view('laporan/cari_laporanteknisi', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }
    public function detail_laporankasir()
    {
        if($this->session->userdata('akses')=='Admin'){
            //$id_transaksi = $this->uri->segment(3);
            $id_transaksi = $this->input->post('id_transaksi');
        
            $data['title']        = "Detail Pembelian";
            $data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            $data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            $this->load->view('laporan/laporankasir_detail', $data);

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

/* End of file Laporan.php */
