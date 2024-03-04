<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

	function get_data_sales()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where_in('level', [2,9]);
		$this->db->where('id_cabang', 2);
		return $this->db->get()->result();
	}	

}

/* End of file Sales_model.php */
/* Location: ./application/models/Sales_model.php */