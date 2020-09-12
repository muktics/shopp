<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardkasir extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kasir');
    }

    function index()
    {   
        if($this->session->userdata('akses')=='Kasir'){                      
            $data['countkasir'] = $this->Mod_kasir->totalRows('kasir');        
            $data['countteknisi'] = $this->Mod_kasir->totalRows('teknisi');
            $data['counttransaksiteknisi'] = $this->Mod_kasir->totalRows('transaksiteknisi');
            $data['countservice'] = $this->Mod_kasir->totalRows('service');
            $data['countbarang'] = $this->Mod_kasir->totalRows('barang');
            $data['countbarangterjual'] = $this->Mod_kasir->totalRows('transaksiteknisi');
            $this->template->load('layoutkasir', 'dashboard/dashboard_kasir', $data);
        }else{
        echo "Anda tidak berhak mengakses halaman ini";
        }
    }
        
    


}
/* End of file Controllername.php */
 