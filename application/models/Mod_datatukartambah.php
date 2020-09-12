<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_datatukartambah extends CI_Model {

    private $table   = "transaksitukartambah";
    private $primary = "id_transaksi";

    function searchTransaksiteknisi($cari, $limit, $offset)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("judul",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    
    function getAll()
    {
        return $this->db->query("SELECT a.*,   b.id_petugas, b.full_name,     c.kode_barang, c.merk, c.tipe, c.harga                                                                
                                 FROM transaksitukartambah a, petugas b, barang c   
                                 WHERE a.id_petugas = b.id_petugas
                                 GROUP BY a.id_transaksi");
        //$this->db->order_by('transaksitukartambah.id_transaksi desc');
        //return $this->db->get('transaksitukartambah');
    }

    function insertDatatukartambah($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekDatatukartambah($kode)
    {
        $this->db->where("id_transaksi", $kode);
        return $this->db->query("SELECT a.*,   b.id_petugas, b.full_name,     c.kode_barang, c.merk, c.tipe, c.harga                                                                
                                 FROM transaksitukartambah a, petugas b, barang c   
                                 WHERE a.id_petugas = b.id_petugas AND id_transaksi= '$kode'
                                 GROUP BY a.id_transaksi");
    }

    function updateDatatukartambah($kode_transaksitukartambah, $data)
    {
        $this->db->where('id_transaksi', $kode_transaksitukartambah);
		$this->db->update('transaksitukartambah', $data);
    }

    function getGambar($id_transaksi)
    {
        $this->db->select('image');
        $this->db->from('transaksitukartambah');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get();
    }

    function deleteDatatukartambah($kode, $table)
    {
        $this->db->where('id_transaksi', $kode);
        $this->db->delete($table);
    }

}

/* End of file ModelName.php */
