<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardteknisi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_transaksiteknisi','Mod_kasir'));
    }

    function index()
    {   
        if($this->session->userdata('akses')=='Teknisi'){
            $data['countkasir'] = $this->Mod_kasir->totalRows('kasir');        
            $data['countteknisi'] = $this->Mod_kasir->totalRows('teknisi');
            $data['counttransaksiteknisi'] = $this->Mod_kasir->totalRows('transaksiteknisi');
            $data['counttransaksiteknisiproses'] = $this->Mod_transaksiteknisi->totalRows();
            //$data['counttransaksiteknisiselesai'] = $this->Mod_kasir->totalRows('selesaiservice');
            //$data['counttransaksiteknisiselesai'] = $this->Mod_kasir->totalRows('selesaiservice');
            $data['counttransaksiteknisiselesai'] = $this->Mod_transaksiteknisi->totalRowsselesai();
            
            $this->template->load('layoutteknisi', 'dashboard/dashboard_teknisi', $data);
        }else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }
        
    


}
/* End of file Controllername.php */
 