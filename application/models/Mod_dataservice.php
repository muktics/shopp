<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_dataservice extends CI_Model {

    private $table   = "transaksiteknisi";
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
        return $this->db->query("SELECT a.*,   b.id_petugas, b.full_name,    c.  id_petugas, c.biaya, c.tanggal_selesai, c.garansi,
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih dalam perbaikan'
                                 ELSE 'Perbaikan sudah selesai' 
                                 END AS status_transaksi                                 
                                 FROM transaksiteknisi a, petugas b, selesaiservice c   
                                 WHERE a.id_petugas = b.id_petugas  
                                 GROUP BY a.id_transaksi");
        /*$this->db->order_by('transaksiteknisi.id_transaksi desc');
        return $this->db->get('transaksiteknisi');*/
    }

    function insertTransaksiteknisi($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekTransaksiteknisi($kode)
    {
        /*$this->db->where("id_transaksi", $kode);
        //return $this->db->get("transaksiteknisi");
        return $this->db->query("SELECT a.*,   b.id_petugas, b.full_name,     c.  id_petugas, c.biaya, c.tanggal_selesai, c.garansi                                                               
                                 FROM transaksiteknisi a, petugas b, selesaiservice c 
                                 WHERE a.id_petugas = b.id_petugas  
                                 GROUP BY a.id_transaksi");
        //$this->db->where("id_transaksi", $kode);
        return $this->db->query("SELECT a.*,   b.id_petugas, b.full_name,  c.id_transaksi,   c.  id_petugas, c.biaya, c.tanggal_selesai, c.garansi                                                               
                                    FROM transaksiteknisi a, petugas b, selesaiservice c   
                                    WHERE a.id_petugas = b.id_petugas AND id_transaksi= '$kode' AND a.id_transaksi = c.id_transaksi
                                    GROUP BY a.id_transaksi");     */
                                    return $this->db->query("SELECT a.*,   b.id_petugas, b.full_name,     c.biaya, c.tanggal_selesai, c.garansi,
                                    CASE 
                                       WHEN a.status = 'N' THEN 'Masih dalam perbaikan'
                                    ELSE 'Perbaikan sudah selesai' 
                                    END AS status_transaksi                                 
                                    FROM transaksiteknisi a, petugas b, selesaiservice c   
                                    WHERE a.id_petugas = b.id_petugas  AND a.id_transaksi = '$kode'
                                    GROUP BY a.id_transaksi");                            
    }

    function updateTransaksiteknisi($kode_transaksiteknisi, $data)
    {
        $this->db->where('id_transaksi', $kode_transaksiteknisi);
		$this->db->update('transaksiteknisi', $data);
    }

    function getGambar($id_transaksi)
    {
        $this->db->select('image');
        $this->db->from('transaksiteknisi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get();
    }

    function deleteTransaksiteknisi($kode, $table)
    {
        $this->db->where('id_transaksi', $kode);
        $this->db->delete($table);
    }




}

/* End of file ModelName.php */
