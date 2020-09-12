<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksiteknisiselesai extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model('Mod_transaksiteknisiselesai');
        //$this->load->library('MPDF56/mpdf');
        $this->load->library('cetak_pdf');
    }


    public function index()
    {   
        if($this->session->userdata('akses')=='Teknisi'){
            $data['title'] = "Transaksi Teknisi Selesai";
            $data['tanggal_selesai']  = date('Y-m-d');
            $this->template->load('layoutteknisi', 'transaksiteknisiselesai/transaksiteknisiselesai_data', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    /*function doprint()
	{
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR BARANG',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(100,6,'Nama Barang',1,0,'C');
        $pdf->Cell(35,6,'Harga',1,0,'C');
        $pdf->Cell(15,6,'Stok',1,1,'C');

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(0,7,'Pelanggan',0,0,'L');
        $pdf->Cell(0,7,'Petugas',0,0,'R');
        $pdf->Cell(8,6,'No',0,1,'C');
        $pdf->Cell(100,6,'Nama Barang',0,0,'C');
        $data['no_transaksi'] = $this->input->post('id_transaksi');
        
        $data['title']        = "Detail Service";
        $data['tanggal_selesai']  = date('Y-m-d');
        $data['tmptrserviceselesai']       = $this->Mod_transaksiteknisiselesai->getTmptrserviceselesai()->result();
        //$data['autonumber'] = $this->Mod_transaksiteknisiselesai->AutoNumbering();
        
        
        //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
        //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
        //$pdf->Cell($this->load->view('transaksiteknisiselesai/transaksiteknisiselesai_cetaknota', $data));
        
        $pdf->Output();
	}

    /*public function _gen_pdf($html,$paper='A4'){
        ob_end_clean();
        
        $mpdf=new mPDF('utf-8', $paper );
        $mpdf->debug = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function doprint($pdf=false){
        $data['tes'] = 'ini print dari HTML ke PDF';
        $output = $this->load->view('transaksiteknisiselesai/transaksiteknisiselesai_cnota',$data, true);
        return $this->_gen_pdf($output);
    }*/


    public function cari_imei()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $imei = $this->input->post('imei');
            // $imei = 121210;
            $data['pencarian'] = $this->Mod_transaksiteknisiselesai->SearchImei($imei);
            // print_r($data['pencarian']);
            $this->load->view('transaksiteknisiselesai/transaksiteknisiselesai_pencarian', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }  
         
    }

    public function cari_transaksi()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $no_transaksi = $this->input->get_post('no_transaksi');
            // $no_transaksi = 20180411002;
            $hasil = $this->Mod_transaksiteknisiselesai->cekTransaksi($no_transaksi);
            if($hasil->num_rows() > 0) {
                $dtrans = $hasil->row_array();
                echo $dtrans['imei']."|".$dtrans['tanggal_service']."|".$dtrans['merk']."|".$dtrans['kerusakan'];
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function tampil_transaksiteknisi()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            $no_transaksi = $this->input->get('no_transaksi');
            $data['transaksiteknisi'] = $this->Mod_transaksiteknisiselesai->showTransaksiteknisi($no_transaksi)->result();
            $this->load->view('transaksiteknisiselesai/transaksiteknisiselesai_tampil_transaksiteknisi', $data);
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

    public function detail_transaksiteknisiselesai()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            
            $tunai = $this->input->post('tunai');
            // echo $kode_barang; die();
            $cek = $this->Mod_transaksiteknisiselesai->cekTmptrserviceselesai($tunai);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array(
                    'tunai' => str_replace('.', '', $this->input->post('tunai')),
                    'kembalian' => str_replace('.', '', $this->input->post('kembalian')),
                    'nama_pelanggan'        => $this->input->post('nama_pelanggan'),
                    'garansi'        => $this->input->post('garansi'),
                    'tanggal_service'        => $this->input->post('tanggal_service'),
                    'imei'        => $this->input->post('imei'),
                    'merk'        => $this->input->post('merk'),
                    'id_transaksi'        => $this->input->post('no_transaksi'),
                    'kerusakan'        => $this->input->post('kerusakan'),
                    'biaya' => str_replace('.', '', $this->input->post('biaya'))
                );
                $this->Mod_transaksiteknisiselesai->InsertTmptrserviceselesai($data);
            }
            
            //$id_transaksi = $this->uri->segment(3);
            $data['no_transaksi'] = $this->input->post('id_transaksi');
        
            $data['title']        = "Detail Service";
            $data['tanggal_selesai']  = date('Y-m-d');
            $data['tmptrserviceselesai']       = $this->Mod_transaksiteknisiselesai->getTmptrserviceselesai()->result();
            //$data['autonumber'] = $this->Mod_transaksiteknisiselesai->AutoNumbering();
            
            
            //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            $this->load->view('transaksiteknisiselesai/transaksiteknisiselesai_cetaknota', $data);

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

    public function cetak_nota_tselesai()
    {
        if($this->session->userdata('akses')=='Teknisi'){
            
            //$id_transaksi = $this->uri->segment(3);
            $data['no_transaksi'] = $this->input->post('id_transaksi');
        
            $data['title']        = "Detail Service";
            $data['tanggal_selesai']  = date('Y-m-d');
            $data['tmptrserviceselesai']       = $this->Mod_transaksiteknisiselesai->getTmptrserviceselesai()->result();
            //$data['autonumber'] = $this->Mod_transaksiteknisiselesai->AutoNumbering();
            
            
            //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            //$this->template->load('layoutteknisi', 'transaksiteknisiselesai/transaksiteknisiselesai_cnota', $data);
            $this->load->view('transaksiteknisiselesai/transaksiteknisiselesai_cnota', $data);

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

    public function resettmp(){
        if($this->session->userdata('akses')=='Teknisi'){ 
            $table_tmptrserviceselesai = $this->Mod_transaksiteknisiselesai->getTmptrserviceselesai()->result();
            foreach($table_tmptrserviceselesai as $data){

                $tunai = $data->tunai; 
                
                $data = array(
                    'tunai'        => $this->input->post('tunai'),
                    'kembalian'        => $this->input->post('kembalian'),
                    'nama_pelanggan'        => $this->input->post('nama_pelanggan'),
                    'garansi'        => $this->input->post('garansi'),                
                    'tanggal_service'        => $this->input->post('tanggal_service'),
                    'imei'        => $this->input->post('imei'),
                    'merk'        => $this->input->post('merk'),
                    'id_transaksi'        => $this->input->post('no_transaksi'),
                    'kerusakan'        => $this->input->post('kerusakan'),
                    'biaya'        => $this->input->post('biaya')
                );
                    //hapus table tmp
                    $this->Mod_transaksiteknisiselesai->deleteTmptrserviceselesai($tunai);                
            
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
            $table_tmptrserviceselesai = $this->Mod_transaksiteknisiselesai->getTmptrserviceselesai()->result();
            $simpan = array(
                'id_transaksi'     => $this->input->post('no_transaksi'),
                'tanggal_selesai' => date('Y-m-d'),    
                'garansi' => $this->input->post('garansi'),                    
                'biaya' => str_replace('.', '', $this->input->post('biaya')),
                'tunai' => str_replace('.', '', $this->input->post('tunai')),
                'kembalian' => str_replace('.', '', $this->input->post('kembalian')),
                'id_petugas'       => $id_petugas
            );
            $this->Mod_transaksiteknisiselesai->insertTransaksiteknisiselesai($simpan);

            //update status peminjaman dari N menjadi Y
            $no_transaksi = $this->input->post('no_transaksi');
            $data = array(
                'status' => "Y"
            );

            $this->Mod_transaksiteknisiselesai->UpdateStatus($no_transaksi, $data);

            foreach($table_tmptrserviceselesai as $data){

                $tunai = $data->tunai; 
                
                $data = array(
                    'tunai'        => $this->input->post('tunai'),
                    'kembalian'        => $this->input->post('kembalian'),
                    'nama_pelanggan'        => $this->input->post('nama_pelanggan'),
                    'garansi'        => $this->input->post('garansi'),                
                    'tanggal_service'        => $this->input->post('tanggal_service'),
                    'imei'        => $this->input->post('imei'),
                    'merk'        => $this->input->post('merk'),
                    'id_transaksi'        => $this->input->post('no_transaksi'),
                    'kerusakan'        => $this->input->post('kerusakan'),
                    'biaya'        => $this->input->post('biaya')
                );
                    //hapus table tmp
                    $this->Mod_transaksiteknisiselesai->deleteTmptrserviceselesai($tunai);                
            
            }
        }
        else{
            echo "Anda Tidak Dapat mengakses Halaman ini";
        }
    }

}

/* End of file Transaksiteknisiselesai.php */








