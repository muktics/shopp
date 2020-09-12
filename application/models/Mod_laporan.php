<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_laporan extends CI_Model {

    public function searchLaporanteknisi($tanggal1, $tanggal2)
    {
        // $this->db->select('*');
        // $this->db->from('transaksi');
        // $this->db->where('tanggal_pinjam <','$tanggal1');
        // $this->db->where('tanggal_kembali >','$tanggal2');

        // return $this->db->get();
        return $this->db->query(  
                                 /*CASE 
                                    WHEN a.status = 'N' THEN 'Masih dalam perbaikan'
                                 ELSE 'Perbaikan sudah selesai' 
                                 END AS status_service                                 */
                                 "SELECT a.*, b.id_petugas, b.full_name, /*c.id_petugas, c.tanggal_selesai,*/
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih dalam perbaikan'
                                 ELSE 'Perbaikan sudah selesai' 
                                 END AS status_service   
                                  FROM transaksiteknisi a, petugas b/*, selesaiservice c*/ WHERE a.tanggal_service BETWEEN '$tanggal1' AND '$tanggal2'
                                 AND a.id_petugas = b.id_petugas
                                 GROUP BY a.id_transaksi");
    }
    public function searchLaporankasir($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT a.*, b.id_petugas, b.full_name FROM transaksikasir a, petugas b WHERE a.tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2'
                                 AND a.id_petugas = b.id_petugas 
                                 GROUP BY a.id_transaksi");
    }

    public function detailLaporankasir($id_transaksi)
    {
        
        return $this->db->query("SELECT a.*,b.kode_barang, b.imei, b.merk, b.tipe, b.harga FROM transaksikasir a, barang b WHERE a.id_transaksi = $id_transaksi
                                 AND a.kode_barang = b.kode_barang");
    }
    public function detailLaporanteknisi($id_transaksi)
    {
        return $this->db->query(/*"SELECT a.*, b.id_petugas, b.full_name, c.id_petugas, c.tanggal_selesai,
                                CASE 
                                    WHEN b.status = 'N' THEN 'Masih dalam perbaikan'
                                ELSE 'Perbaikan sudah selesai' 
                                END AS status_service
        FROM transaksiteknisi a, petugas b, selesaiservice c WHERE a.id_transaksi = $id_transaksi AND a.id_petugas = b.id_petugas"*/
        /*"SELECT a.*,   b.id_petugas, b.full_name,     c.  id_petugas, c.biaya, c.tanggal_selesai, c.garansi,
        CASE 
           WHEN a.status = 'N' THEN 'Masih dalam perbaikan'
        ELSE 'Perbaikan sudah selesai' 
        END AS status_transaksi                                 
        FROM transaksiteknisi a, petugas b, selesaiservice c   WHERE a.id_transaksi = $id_transaksi
        /*AND a.id_transaksi = c.id_transaksi*/
        
        /*GROUP BY a.id_transaksi");*/
        "SELECT a.*,   b.id_petugas, b.full_name,     c.id_petugas, c.biaya, c.tanggal_selesai, c.garansi, c.biaya, c.id_transaksi,
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Dalam Perbaikan'
                                 ELSE 'Perbaikan Selesai' 
                                 END AS status_transaksi                                 
                                 FROM transaksiteknisi a, petugas b, selesaiservice c   
                                 WHERE  a.id_petugas = b.id_petugas AND a.id_transaksi = $id_transaksi
                                 GROUP BY a.id_transaksi");
    }

    public function searchLaporantukartambah($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT a.*, b.id_petugas, b.full_name FROM transaksitukartambah a, petugas b WHERE a.tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2'
                                 AND a.id_petugas = b.id_petugas 
                                 GROUP BY a.id_transaksi");
    }

    public function detailLaporantukartambah($id_transaksi)
    {
        
        return $this->db->query("SELECT a.*,b.kode_barang, b.imei, b.merk, b.tipe, b.harga FROM transaksitukartambah a, barang b WHERE a.id_transaksi = $id_transaksi
                                 AND a.kode_barang = b.kode_barang");
    }
    
}

/* End of file Mod_laporan.php */
