<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faktur_produk_retail_model extends CI_Model {

	public $table = "faktur_produk_retail";
	public $id = "id_faktur";
	public $id_toko = "id_toko";
	public $no_faktur = "no_faktur";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function get_by_id($id)
	{
		$this->db->where($this->id_toko, $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	function get_by_id_toko($id_toko)
	{
		$this->db->where($this->id_toko, $this->userdata->id_toko);
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->table)->result();
	}

	function insert($data)
	{
        $data['id_toko'] = $this->userdata->id_toko;
		$this->db->insert($this->table, $data);
	}


	function update($id, $data)
	{
		$this->db->where($this->id_toko, $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

}

/* End of file Faktur_retail_model.php */
/* Location: ./application/models/Faktur_retail_model.php */