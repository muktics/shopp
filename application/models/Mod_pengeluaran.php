<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengeluaran extends CI_Model {

    function getPengeluaran()
    {
        return $this->db->get('pengeluaran');
    }

    function getAll()
    {
        $this->db->order_by('pengeluaran.id_pengeluaran desc');
        return $this->db->get('pengeluaran');
    }

    function insertPengeluaran($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekPengeluaran($kode)
    {
        $this->db->where("id_pengeluaran", $kode);
        return $this->db->get("pengeluaran");
    }

    function updatePengeluaran($id_pengeluaran, $data)
    {
        $this->db->where('id_pengeluaran', $id_pengeluaran);
		$this->db->update('pengeluaran', $data);
    }

    function getDataPengeluaran($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('pengeluaran a');
        // $this->db->where('a.id_pengeluaran', $id_pengeluaran);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id_pengeluaran desc');
        return $this->db->get();
    }

    function getGambar($id_pengeluaran)
    {
        $this->db->select('image');
        $this->db->from('pengeluaran');
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        return $this->db->get();
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    // function getTotalRows()
    // {
    //     return $this->db->get('pengeluaran')->num_rows();
    // }

    
    function searchPengeluaran($cari, $limit, $offset)
    {
        $this->db->like("id_pengeluaran",$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('pengeluaran');
    }

    function deletePengeluaran($kode, $table)
    {
        $this->db->where('id_pengeluaran', $kode);
        $this->db->delete($table);
    }

}

/* End of file ModelPengeluaran.php */
