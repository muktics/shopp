<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_coba extends CI_Model {
    function getUser()
    {
        $data = $this->db->query("SELECT * from petugas WHERE jenis_user = '1'");
		return $data->result();
    }
}