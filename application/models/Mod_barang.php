<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_barang extends CI_Model {

    private $table   = "barang";
    private $primary = "kode_barang";

    function searchBarang($cari, $limit, $offset)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("tipe",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    
    function getAll()
    {
        $this->db->order_by('barang.merk desc');
        return $this->db->get('barang');
    }

    function insertBarang($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekBarang($kode)
    {
        //$this->db->where("imei", $kode);
        $this->db->where("kode_barang", $kode);

        return $this->db->get("barang");
    }

    function updateBarang($kode_barang, $data)
    {
        $this->db->where('kode_barang', $kode_barang);
		$this->db->update('barang', $data);
    }

    function getGambar($kode_barang)
    {
        $this->db->select('image');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get();
    }

    function getQr($kode_barang)
    {
        $this->db->select('qrcode');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get();
    }

    function deleteBarang($kode, $table)
    {
        $this->db->where('kode_barang', $kode);
        $this->db->delete($table);
    }

    function BarangSearch($tipe)
    {
        $this->db->like($this->primary,$tipe);
        $this->db->or_like("tipe",$tipe);
        $this->db->limit(10);
        return $this->db->get($this->table);
    }



}

/* End of file ModelName.php */
