<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_opsi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function get_opsi_stok($id_toko){
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_opsi', 1);
		return $this->db->get('opsi')->row();
	}

	function get_opsi_diskon($id_toko){
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_opsi', 2);
		return $this->db->get('opsi')->row();
	}

	function get_ppn($id_toko){
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_opsi', 6);
		$row = $this->db->get('opsi')->row();
		if ($row) {
			return $row;
		} else {
			return 0;
		}
	}

	function get_opsi_pilihan($id_toko){
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_opsi', 3);
		return $this->db->get('opsi')->row();
	}

	function get_opsi_tProduk($id_toko){
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_opsi', 4);
		return $this->db->get('opsi')->row();
	}

	function get_opsi_printer($id_toko, $id_users){
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_user', $id_users);
		return $this->db->get('printer_mode')->row();
	}

	function get_opsi_popup($id_toko){
		$this->db->where('id_toko', $id_toko);
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