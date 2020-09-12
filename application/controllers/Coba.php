<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('myfunction_helper');
        $this->load->model('Mod_coba');
    }
    /*public function get_berita($id_berita) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role',’id_berita’);
        $query = $this->db->get();
        return $query->result();
       }*/
	public function index()
	{
        $data['petugas'] = $this->Mod_coba->getUser();
		$this->load->view('coba',$data);
	}
}
