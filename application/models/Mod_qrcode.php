<?php
class Mod_qrcode extends CI_Model{
 
    function get_all_barang(){
        $hasil=$this->db->get('barang');
        return $hasil;
    }
     
    function insertBarang($kode_barang,$merk,$tipe,$spesifikasi,$image,$harga,$imei,$image_qr){
        $data = array(
            'kode_barang'       => $kode_barang,
            'merk'      => $merk,
            'tipe'     => $tipe, 
            'spesifikasi'     => $spesifikasi, 
            'image'     => $image, 
            'harga'     => $harga, 
            'imei'     => $imei, 
            'qrcode'   => $image_qr
        );
        $this->db->insert('barang',$data);
    }
}