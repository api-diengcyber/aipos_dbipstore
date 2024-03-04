<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok_produk_model extends CI_Model {

	public $table = "stok_produk";
	public $id = "id";
	public $id_toko = "id_toko";
	public $id_produk = "id_produk";
	public $id_pembelian = "id_pembelian";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function get_by_id($id)
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}
	
	function get_by_id_produk($id_produk, $id_toko)
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id_produk, $id_produk);
		return $this->db->get($this->table)->row();
	}
	
	function get_total_stok_by_id_produk($id_produk, $id_toko)
	{
		$this->db->select('SUM(stok) AS stok');
		$this->db->from($this->table);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id_produk, $id_produk);
		return $this->db->get()->row();
	}

	function insert($data)
	{
        $data['id_toko'] = $this->userdata->id_toko;
		$this->db->insert($this->table, $data);
	}

	function update($id, $data)
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	function update_by_id_pembelian($id_pembelian, $data , $id_produk)
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id_pembelian, $id_pembelian);
		//
		$this->db->where('id_produk', $id_produk);
		//
		$this->db->update($this->table, $data);
	}

	function delete($id)
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}

/* End of file Stok_produk_model.php */
/* Location: ./application/models/Stok_produk_model.php */