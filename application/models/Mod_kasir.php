<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kasir extends CI_Model {

    function getKasir()
    {
        $data = $this->db->query("SELECT * from petugas WHERE jenis_user = 'Kasir'");
		return $data->result();
        //return $this->db->get('petugas');
    }

    function getAll()
    {
        $this->db->order_by('petugas.id_petugas desc');
        $data = $this->db->query("SELECT * from petugas WHERE jenis_user = 'Kasir'");
		return $data->result();
    }

    function insertKasir($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekKasir($kode)
    {
        $this->db->where("id_petugas", $kode);
        return $this->db->get("petugas");
    }

    function updateKasir($id_petugas, $data)
    {
        $this->db->where('id_petugas', $id_petugas);
		$this->db->update('petugas', $data);
    }

    function getDataKasir($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('petugas a');
        // $this->db->where('a.id_petugas', $id_petugas);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id_petugas desc');
        return $this->db->get();
    }

    function getGambar($id_petugas)
    {
        $this->db->select('image');
        $this->db->from('petugas');
        $this->db->where('id_petugas', $id_petugas);
        return $this->db->get();
    }

    function totalRows($table)
	{   
        //$this->db->query("SELECT * from petugas WHERE jenis_user = '2'");
		return $this->db->count_all_results($table);
    }

    // function getTotalRows()
    // {
    //     return $this->db->get('petugas')->num_rows();
    // }

    
    function searchKasir($cari, $limit, $offset)
    {
        $this->db->like("id_petugas",$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('petugas');
    }

    function deleteKasir($kode, $table)
    {
        $this->db->where('id_petugas', $kode);
        $this->db->delete($table);
    }

}

/* End of file ModelKasir.php */
