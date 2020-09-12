<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_transaksitukartambah extends CI_Model 
{

    private $table = "transaksitukartambah";
    private $tmp   = "tmp";
    private $tmptrttbyr   = "tmptrttbyr";
    
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];
        
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        
        $nextNoUrut   = $lastNoUrut+1;
        
        $nextNoTransaksitukartambah = $today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksitukartambah;
    }

    function getTmp()
    {
        return $this->db->get("tmp");
    }
    
    function getTmptrttbyr()
    {
        return $this->db->get("tmptrttbyr");
    }

    function cekTmp($kode)
    {
        $this->db->where("kode_barang",$kode);
        return $this->db->get("tmp");
    }

    function cekTmptrttbyr($kode)
    {
        $this->db->where("tunai",$kode);
        return $this->db->get("tmptrttbyr");
    }

    function InsertTmp($data)
    {
        //$this->db->insert("transaksitukartambah",$info);
        $this->db->insert($this->tmp, $data);    
    }

    function InsertTmptrttbyr($data)
    {
        //$this->db->insert("transaksitukartambah",$info);
        $this->db->insert($this->tmptrttbyr, $data);    
    }

    function InsertTransaksitukartambah($data)
    {
        $this->db->insert($this->table, $data);
    }

    function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }
    function jumlah_harga()
    {   
        //$this->db->query("SELECT a.*, b.id_petugas, b.full_name FROM transaksikasir a, petugas b WHERE a.tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2'                                AND a.id_petugas = b.id_petugas                                 GROUP BY a.id_transaksi");
        return $this->db->count("harga");
    }

    function deleteTmp($kode_barang)
    {
        $this->db->where("kode_barang",$kode_barang);
        $this->db->delete($this->tmp);
    }

    function deleteTmptrttbyr($tunai)
    {
        $this->db->where("tunai",$tunai);
        $this->db->delete($this->tmptrttbyr);
    }

    function getTransaksitukartambah()
    {
        return $this->db->get($this->table);
    }

    function sumLabaharian(){
        return $this->db->query("SELECT a.*,b.kode_barang, b.imei, b.merk, b.tipe, SUM(b.harga) as totaltt FROM transaksitukartambah a, barang b WHERE SUBSTR(a.tanggal_transaksi, 1,10)=DATE(NOW()) /*a.tanggal_transaksi = /*DATE_ADD(CURDATE(), INTERVAL -1 DAY) YEAR(a.tanggal_transaksi)=YEAR(NOW())*/
        AND a.kode_barang = b.kode_barang");

        /*$this->db->select("SUM(nilai) as total");
        $this->db->from(transaksikasir);
        return $this->db->get()->row()->total;*/
    }
}

/* End of file Mod_Transaksitukartambah.php */
