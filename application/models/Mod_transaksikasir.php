<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_transaksikasir extends CI_Model 
{

    private $table = "transaksikasir";
    private $tmp   = "tmp"; 
    private $tmptrbelibyr   = "tmptrbelibyr"; 
    
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];
        
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        
        $nextNoUrut   = $lastNoUrut+1;
        
        $nextNoTransaksikasir = $today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksikasir;
    }

    function getTmp()
    {
        return $this->db->get("tmp");
    }

    function getTmptrbelibyr()
    {
        return $this->db->get("tmptrbelibyr");
    }
    
    function cekTmp($kode)
    {
        $this->db->where("kode_barang",$kode);
        return $this->db->get("tmp");
    }

    function cekTmptrbelibyr($kode)
    {
        $this->db->where("tunai",$kode);
        return $this->db->get("tmptrbelibyr");
    }

    function InsertTmp($data)
    {
        //$this->db->insert("transaksikasir",$info);
        $this->db->insert($this->tmp, $data);    
    }

    function InsertTmptrbelibyr($data)
    {
        //$this->db->insert("transaksikasir",$info);
        $this->db->insert($this->tmptrbelibyr, $data);    
    }

    function InsertTransaksikasir($data)
    {
        $this->db->insert($this->table, $data);
    }

    function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }
    /*function jumlahHarga()
    {   
        $this->db->select('harga');
        $this->db->from('tmp');
        return $this->db->get();
    }*/

    function deleteTmp($kode_barang)
    {
        $this->db->where("kode_barang",$kode_barang);
        $this->db->delete($this->tmp);
    }

    function deleteTmptrbelibyr($tunai)
    {
        $this->db->where("tunai",$tunai);
        $this->db->delete($this->tmptrbelibyr);
    }

    function getTransaksikasir()
    {
        return $this->db->get($this->table);
    }

    function sumLabaharian(){
        return $this->db->query("SELECT a.*,b.kode_barang, b.imei, b.merk, b.tipe, SUM(b.harga) as total FROM transaksikasir a, barang b WHERE SUBSTR(a.tanggal_transaksi, 1,10)=DATE(NOW()) /*a.tanggal_transaksi = /*DATE_ADD(CURDATE(), INTERVAL -1 DAY) YEAR(a.tanggal_transaksi)=YEAR(NOW())*/
        AND a.kode_barang = b.kode_barang");

        /*$this->db->select("SUM(nilai) as total");
        $this->db->from(transaksikasir);
        return $this->db->get()->row()->total;*/
    }

}

/* End of file Mod_transaksikasir.php */
