<?php
class Mod_chart extends CI_Model{
 
  //get data from database
  function get_data(){
      //$this->db->select('bulan', 'purchase', 'sale', 'profit');
      $this->db->from('laporantabel');
      //$result = $this->db->get('laporantabel');
      return $this->db->get()->result();
  }
  function get_data_laporan_teknisi(){
    //$this->db->select('bulan', 'purchase', 'sale', 'profit');
    //$this->db->from('transaksiteknisi');
    //$result = $this->db->get('laporantabel');
    //return $this->db->get()->result();
    return $this->db->select('status')->from("transaksiteknisi")->get()->result();
}
 
}