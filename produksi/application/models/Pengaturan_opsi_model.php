<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_opsi_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function get_opsi_stok(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 1);
        return $this->db->get('opsi')->row();
	}
	function get_opsi_diskon(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 2);
        return $this->db->get('opsi')->row();

	}
	function get_ppn(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 6);
        $row = $this->db->get('opsi')->row();
		if ($row) {
			return $row;
		} else {
			return 0;
		}

	}
	function get_opsi_pilihan(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 3);
        return $this->db->get('opsi')->row();

	}
	function get_opsi_tProduk(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 4);
        return $this->db->get('opsi')->row();
	}
	function get_opsi_printer(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_user', $this->userdata->id_users);
        return $this->db->get('printer_mode')->row();
	}
	function get_opsi_popup(){
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 5);
		$row = $this->db->get('opsi')->row();
		if ($row) {
			return $row;
		} else {
			return 0;
		}
	}


}

/* End of file Pengaturan_opsi_model.php */
/* Location: ./application/models/Pengaturan_opsi_model.php */