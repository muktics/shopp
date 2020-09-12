<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_kasir', 'Mod_chart', 'Mod_transaksikasir' ,'Mod_transaksitukartambah'));
    }

    function index()
    {
        if($this->session->userdata('akses')=='Admin'){
            //$countlaba1 = $this->Mod_transaksikasir->sumLabaharian();
            //$countlaba2 = 228695000;
            $data['countlaba'] = $this->Mod_transaksikasir->sumLabaharian();
            $data['countlabatt'] = $this->Mod_transaksitukartambah->sumLabaharian();
            //$data['countlaba'] = $countlaba1-$countlaba2;

            $data['countkasir'] = $this->Mod_kasir->totalRows('petugas');
            $data['countteknisi'] = $this->Mod_kasir->totalRows('teknisi');
            $data['counttransaksiteknisi'] = $this->Mod_kasir->totalRows('transaksiteknisi');
            $data['countservice'] = $this->Mod_kasir->totalRows('service');
            $data['countbarang'] = $this->Mod_kasir->totalRows('barang');
            $data['countbarangterjual'] = $this->Mod_kasir->totalRows('transaksiteknisi');
            $data['counttotalpengeluaran'] = $this->Mod_kasir->totalRows('pengeluaran');

            $dataa = $this->Mod_chart->get_data();
            $data['dataa'] = json_encode($dataa);        
            //$this->load->view('dashboard/dashboard_data',$data);
            $this->template->load('layoutadmin', 'dashboard/dashboard_data', $data);
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        } 
    }

        
    


}
/* End of file Controllername.php */
 