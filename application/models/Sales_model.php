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

	public function get_by_group_cs($id_users)
	{
		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->join('group_cs_detail gcd', 'u.id_users=gcd.id_cs');
		$this->db->join('group_cs gc', 'gcd.id_group=gc.id');
		$this->db->where_in('u.level', [2,9]);
		$this->db->where('u.id_cabang', 2);
		$this->db->where('gc.id_advertiser', $id_users);
		return $this->db->get()->result();
	}

}



/* End of file Sales_model.php */

/* Location: ./application/models/Sales_model.php */