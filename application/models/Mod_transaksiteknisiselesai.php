<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_transaksiteknisiselesai extends CI_Model {

    private $table_transaksiteknisi    = 'transaksiteknisi';
    private $table_transaksiteknisiselesai = 'selesaiservice';
    private $table_teknisi     = 'teknisi';  
    //private $table_barang         = 'barang'; 
    private $tmptrserviceselesai   = "tmptrserviceselesai";    

    function getTmptrserviceselesai()
    {
        return $this->db->get("tmptrserviceselesai");
    }

    function cekTmptrserviceselesai($kode)
    {
        $this->db->where("tunai",$kode);
        return $this->db->get("tmptrserviceselesai");
    }

    function deleteTmptrserviceselesai($tunai)
    {
        $this->db->where("tunai",$tunai);
        $this->db->delete($this->tmptrserviceselesai);
    }

    function InsertTmptrserviceselesai($data)
    {
        //$this->db->insert("transaksikasir",$info);
        $this->db->insert($this->tmptrserviceselesai, $data);    
    }

    public function SearchImei($imei)
    {
        $data = $this->db->query("SELECT * FROM $this->table_transaksiteknisi WHERE id_transaksi 
                                  NOT IN(SELECT id_transaksi FROM $this->table_transaksiteknisiselesai)
                                  AND imei LIKE '%$imei%' GROUP BY imei");
        return $data;
    }

    public function SearchTransaksi($no_transaksi)
    {
        $query = $this->db->query("SELECT a.*, b.merk FROM $this->table_transaksiteknisi a, $this->table_teknisi                            b WHERE a.id_transaksi = '$no_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_transaksiteknisiselesai c)
                                   AND a.imei = b.imei");
        return $query;
    }
    
    function cekTransaksi($kode)
    {
        $this->db->where("id_transaksi", $kode);
        return $this->db->get("transaksiteknisi");
    }

    public function showTransaksiteknisi($no_transaksi)
    {
        $query = $this->db->query("SELECT *
                                   FROM $this->table_transaksiteknisi 
                                   WHERE a.id_transaksi = '$no_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_transaksiteknisiselesai c)");
        return $query;
    }

    public function insertTransaksiteknisiselesai($data)
    {
        $this->db->insert($this->table_transaksiteknisiselesai, $data);
    }

    public function UpdateStatus($no_transaksi, $data)
    {
        $this->db->where("id_transaksi", $no_transaksi);
        $this->db->update($this->table_transaksiteknisi, $data);
        
    }


}

/* End of file Mod_transaksiteknisiselesai.php */
