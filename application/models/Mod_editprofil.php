<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_editprofil extends CI_Model {


    function getAll()
    {
        $this->db->order_by('petugas.id_petugas desc');
        $data = $this->db->query("SELECT * from petugas WHERE id_petugas = '".$this->session->userdata['id_petugas']."'");
		return $data->result();
    }


    function cekEditprofil($kode)
    {
        $this->db->where("id_petugas", $kode);
        return $this->db->get("petugas");
    }

    function updateKasir($id_petugas, $data)
    {
        $this->db->where('id_petugas', $id_petugas);
		$this->db->update('petugas', $data);
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


}

/* End of file Modeleditprofil.php */
