<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_jurnal_model extends CI_Model {

	public $table = 'pengaturan_jurnal';
	public $id = 'id';
	public $id_pil_jurnal = 'id_pil_jurnal';
	public $debet = 'debet';
	public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
		
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get data by id pil jurnal
	function get_by_id_pil_jurnal($id_toko, $id_pil_jurnal)
	{
		$this->db->select('pengaturan_jurnal.*, akun.kode, akun.akun');
		$this->db->from($this->table);
		$this->db->join('akun', 'pengaturan_jurnal.id_akun=akun.id');
		$this->db->where('pengaturan_jurnal.id_pil_jurnal', $id_pil_jurnal);
		$this->db->order_by('kode', 'asc');
		return $this->db->get()->result();
	}

	// insert
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// delete
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}

/* End of file Pengaturan_jurnal_model.php */
/* Location: ./application/models/Pengaturan_jurnal_model.php */