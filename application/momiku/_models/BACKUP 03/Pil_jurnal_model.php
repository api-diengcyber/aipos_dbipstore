<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pil_jurnal_model extends CI_Model {

    public $table = 'pil_jurnal';
    public $id = 'id';
    public $kode = 'kode';
    public $order = 'ASC';

	public function __construct()
	{
		parent::__construct();
		
	}

	// get all data
	function get_all()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get data by kode
	function get_by_kode($kode)
	{
		$this->db->where($this->kode, $kode);
		return $this->db->get($this->table)->row();
	}

	// get data by retail
	function get_by_retail()
	{
		$this->db->where('SUBSTRING(kode,1,2)', 'RT');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

}

/* End of file  */
/* Location: ./application/models/ */