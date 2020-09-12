<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksitukartambah extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('myfunction_helper');
        $this->load->model(array('Mod_transaksitukartambah','Mod_kasir','Mod_barang'));
    }

    public function index()
    {
        if($this->session->userdata('akses')=='Kasir'){
            $data['tanggal_transaksi']  = date('Y-m-d');
            //$data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tanggal_transaksi'])));
            $data['autonumber'] = $this->Mod_transaksitukartambah->AutoNumbering();
            //$data['kasir']    = $this->Mod_kasir->getKasir();
            $this->template->load('layoutkasir', 'transaksitukartambah/transaksitukartambah_data', $data);
        }else{
            echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }
    }

    public function tampil_tmp()
    {
        if($this->session->userdata('akses')=='Kasir'){
            //$data['jumlah_harga'] = $this->Mod_transaksitukartambah->jumlah_harga();
            $data['tmp']       = $this->Mod_transaksitukartambah->getTmp()->result();
            $data['jumlahTmp'] = $this->Mod_transaksitukartambah->jumlahTmp();
            
            $this->load->view('transaksitukartambah/transaksitukartambah_tampil_tmp',$data);
        }else{
            echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }
    }

    public function cari_barang()
    {   
        if($this->session->userdata('akses')=='Kasir'){
            $caribarang = $this->input->post('caribarang');
            $data['barang'] = $this->Mod_barang->BarangSearch($caribarang);
            $this->load->view('transaksitukartambah/transaksitukartambah_cari', $data);
            // foreach($data['barang'] as $d) {
            //     print_r($d); die();
            // }
        }else{
            echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }
    }

 

    public function cari_kode_barang()
    {
        if($this->session->userdata('akses')=='Kasir'){
            //$kode_barang = 7611;
            $kode_barang = $this->input->post('kode_barang');
            $hasil = $this->Mod_barang->cekBarang($kode_barang);
            //jika ada barang dalam database
            if($hasil->num_rows() > 0) {
                $dbarang = $hasil->row_array();
                echo $dbarang['tipe']."|".$dbarang['merk']."|".$dbarang['harga']."|".$dbarang['imei'];
            }
        }else{
            echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }
    }

    public function save_tmp()
    {
        if($this->session->userdata('akses')=='Kasir'){
            // $kode = $this->Mod_transaksitukartambah->getTransaksi()->result_array();
            
            // if($kode->num_rows()==1) {
            //     echo "sudah ada";
            // }
            // else{

                $kode_barang = $this->input->post('kode_barang');
                // echo $kode_barang; die();
                $cek = $this->Mod_transaksitukartambah->cekTmp($kode_barang);
                //cek apakah data masih kosong di tabel tmp
                if($cek->num_rows() < 1) {
                    $data = array(
                        'kode_barang' => $this->input->post('kode_barang'),
                        'tipe'     => $this->input->post('tipe'),
                        'imei'     => $this->input->post('imei'),
                        'harga' => str_replace('.', '', $this->input->post('harga')),
                        'merk' => $this->input->post('merk')
                    );
                    $this->Mod_transaksitukartambah->InsertTmp($data);
                }
        
            //}
        }else{
            echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }

    }

    public function hapus_tmp()
    {
        if($this->session->userdata('akses')=='Kasir'){
            $kode_barang = $this->input->post('kode_barang');
            $this->Mod_transaksitukartambah->deleteTmp($kode_barang);
        }else{
            echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }
    }

    public function detail_transaksitukartambah()
    {
        if($this->session->userdata('akses')=='Kasir'){
            
            $tunai = $this->input->post('tunai');
            // echo $kode_barang; die();
            $cek = $this->Mod_transaksitukartambah->cekTmptrttbyr($tunai);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array(
                    'tunai' => str_replace('.', '', $this->input->post('tunai')),
                    'kembalian' => str_replace('.', '', $this->input->post('kembalian')),
                    'harga_jual' => str_replace('.', '', $this->input->post('harga_jual')),
                    'alasan' => $this->input->post('alasan'),
                    'detail' => $this->input->post('detail'),
                    'nama_pelanggan' => $this->input->post('nama_pelanggan')
                );
                $this->Mod_transaksitukartambah->InsertTmptrttbyr($data);
            }

            //$id_transaksi = $this->uri->segment(3);
            $id_transaksi = $this->input->post('id_transaksi');
        
            $data['title']        = "Detail Tukar Tambah";
            $data['tanggal_transaksi']  = date('Y-m-d');
            $data['autonumber'] = $this->Mod_transaksitukartambah->AutoNumbering();
            $data['tmp']       = $this->Mod_transaksitukartambah->getTmp()->result();
            $data['tmptrttbyr']       = $this->Mod_transaksitukartambah->getTmptrttbyr()->result();
            $data['jumlahTmp'] = $this->Mod_transaksitukartambah->jumlahTmp();
            //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            $this->load->view('transaksitukartambah/transaksitukartambah_cetaknota', $data);

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
 
    public function cetak_nota_ttt(){
        if($this->session->userdata('akses')=='Kasir'){                        
            //$id_transaksi = $this->uri->segment(3);
            $id_transaksi = $this->input->post('id_transaksi');
        
            $data['title']        = "Detail Tukar Tambah";
            $data['tanggal_transaksi']  = date('Y-m-d');
            $data['autonumber'] = $this->Mod_transaksitukartambah->AutoNumbering();
            $data['tmp']       = $this->Mod_transaksitukartambah->getTmp()->result();
            $data['tmptrttbyr']       = $this->Mod_transaksitukartambah->getTmptrttbyr()->result();
            $data['jumlahTmp'] = $this->Mod_transaksitukartambah->jumlahTmp();
            //$data['transaksikasir']       = $this->Mod_laporan->detailLaporankasir($id_transaksi)->row_array(); 
            //$data['detailtransaksikasir'] = $this->Mod_laporan->detailLaporankasir($id_transaksi)->result();           
            $this->load->view('transaksitukartambah/cetak_nota_tt', $data);

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


    public function resettmptt(){
        if($this->session->userdata('akses')=='Kasir'){
            $table_tmp = $this->Mod_transaksitukartambah->getTmp()->result();
            $table_tmptrttbyr = $this->Mod_transaksitukartambah->getTmptrttbyr()->result();
            foreach($table_tmp as $data){

                $kode_barang = $data->kode_barang; 
                
                $data = array(
                    
                    //'nis'              => $this->input->post('nis'),
                    'kode_barang'        => $data->kode_barang,
                    'imei'        => $data->imei,
                    'tipe'        => $data->tipe,
                    'harga'        => $data->harga,
                    'merk'        => $data->merk                
                    //'tanggal_kembali'  => $this->input->post('tgl_kembali'),
                    //'status'           => "N",
                    
                );
            
                //hapus table tmp
                $this->Mod_transaksitukartambah->deleteTmp($kode_barang);
            
            }

            foreach($table_tmptrttbyr as $data){

                $tunai = $data->tunai; 
                
                $data = array(
                    'tunai'        => $this->input->post('tunai'),
                    'kembalian'        => $this->input->post('kembalian'),
                    'nama_pelanggan'        => $this->input->post('nama_pelanggam')
                );
                    //hapus table tmp
                    $this->Mod_transaksitukartambah->deleteTmptrttbyr($tunai);                
            
            }
            }else{
                echo "Anda Tidak Berhak Mengakses Halaman Ini";
            }
    }

    public function simpan_transaksi()
    {
        if($this->session->userdata('akses')=='Kasir'){
            $id_petugas = $this->session->userdata['id_petugas'];
            //ambil data tmp lakukan looping . setelah looping lakukan insert ke table transaksi
            $table_tmp = $this->Mod_transaksitukartambah->getTmp()->result();
            $table_tmptrttbyr = $this->Mod_transaksitukartambah->getTmptrttbyr()->result();
            foreach($table_tmp as $data){

                $kode_barang = $data->kode_barang; 
                
                $data = array(
                    'id_transaksi'     => $this->input->post('no_transaksi'),
                    //'nis'              => $this->input->post('nis'),
                    'kode_barang'        => $data->kode_barang,
                    //'imei'        => $data->imei,
                    //'tipe'        => $data->tipe,
                    //'merk'        => $data->merk,
                    //'harga'        => $data->harga,
                    'tanggal_transaksi'   => $this->input->post('tanggal_transaksi'),
                    'nama_pelanggan'   => $this->input->post('nama_pelanggan'),
                    'detail'   => $this->input->post('detail'),
                    'alasan'   => $this->input->post('alasan'),
                    'harga_jual' => str_replace('.', '', $this->input->post('harga_jual')),
                    //'tanggal_kembali'  => $this->input->post('tgl_kembali'),
                    //'status'           => "N",
                    'id_petugas'       => $id_petugas
                );
            // print_r($data);
            
                //insert data ke table transaksi
                $this->Mod_transaksitukartambah->InsertTransaksitukartambah($data); 


                //hapus table tmp
                $this->Mod_transaksitukartambah->deleteTmp($kode_barang);
            
            }

            foreach($table_tmptrttbyr as $data){

                $tunai = $data->tunai; 
                
                $data = array(
                    'tunai'        => $this->input->post('tunai'),
                    'kembalian'        => $this->input->post('kembalian'),
                    'nama_pelanggan'        => $this->input->post('nama_pelanggam')
                );
                    //hapus table tmp
                    $this->Mod_transaksitukartambah->deleteTmptrttbyr($tunai);                
            
            }
        }
        else{
        echo "Anda Tidak Berhak Mengakses Halaman Ini";
        }
    }
    

}

/* End of file Transaksitukartambah.php */
