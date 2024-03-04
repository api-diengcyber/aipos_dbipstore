<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_detail_retail_model extends CI_Model {

    public $table = 'orders_detail';
    public $id = 'id_orders';
    public $id_toko = 'id_toko';
    public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	// get data by id_orders
	function get_by_id($id)
	{
        $this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->result();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function delete($id)
	{
        $this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}

/* End of file Orders_detail_retail_model.php */
/* Location: ./application/models/Orders_detail_retail_model.php */