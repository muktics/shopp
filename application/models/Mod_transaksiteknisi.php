<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_transaksiteknisi extends CI_Model 
{

    private $table = "transaksiteknisi";
    private $tmptrservice   = "tmptrservice";
    
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];
        
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        
        $nextNoUrut   = $lastNoUrut+1;
        
        $nextNoTransaksiteknisi = $today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksiteknisi;
    }
    
    function getTmptrservice()
    {
        return $this->db->get("tmptrservice");
    }
    
    function cekTmptrservice($kode)
    {
        $this->db->where("imei",$kode);
        return $this->db->get("tmptrservice");
    }

    function InsertTmptrservice($data)
    {
        //$this->db->insert("transaksi",$info);
        $this->db->insert($this->tmptrservice, $data);    
    }

    function InsertTransaksiteknisi($data)
    {
        $this->db->insert($this->table, $data);
    }

    /*function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }*/

    function deleteTmptrservice($imei)
    {
        $this->db->where("imei",$imei);
        $this->db->delete($this->tmptrservice);
    }

    function deleteAllTmptrservice($imei)
    {
        return $this->db->query("SELECT FROM tmptrservice");
    }

    function getAll()
    {
        $this->db->order_by('transaksiteknisi.id_transaksi desc');
        return $this->db->get('transaksiteknisi');
    }
    
    function getTransaksiteknisi()
    {
        return $this->db->get($this->table);
    }
    function totalRows()
	{   
        //$aaa = $this->db->query("SELECT * from transaksiteknisi WHERE status = 'N'");
        //return $aaa->count_all_results();
        //return $this->db->count_all_results("SELECT * from transaksiteknisi WHERE status = 'N'");
        return $this->db->where(['status'=>'N'])->from("transaksiteknisi")->count_all_results();
    }
    function totalRowsselesai()
	{   
        //$aaa = $this->db->query("SELECT * from transaksiteknisi WHERE status = 'N'");
        //return $aaa->count_all_results();
        //return $this->db->count_all_results("SELECT * from transaksiteknisi WHERE status = 'N'");
        return $this->db->where(['status'=>'Y'])->from("transaksiteknisi")->count_all_results();
    }
}

/* End of file Mod_transaksiteknisi.php */
