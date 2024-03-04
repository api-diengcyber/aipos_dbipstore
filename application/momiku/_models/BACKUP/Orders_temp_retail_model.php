<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_temp_retail_model extends CI_Model {

    public $table = 'orders_temp';
    public $id = 'id_orders_temp';
    public $id_users = 'id_users';
    public $id_toko = 'id_toko';
    public $id_produk = 'id_produk';
    public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

    function get_barang_temp($id_users, $id_toko)
    {
        $this->db->select('ot.*, p.id_produk_2 AS produk_id, p.id_produk_2, p.nama_produk, p.harga_1, p.harga_2, p.harga_3, p.harga_4, p.harga_5, p.harga_6, p.diskon AS diskon_produk, p.mingros, p.dibeli');
        $this->db->from('orders_temp ot');
        $this->db->join('produk_retail p', 'ot.id_produk = p.id_produk_2 AND p.id_toko=ot.id_toko');
        // $this->db->join('stok_produk sp', 'p.id_produk_2=sp.id_produk AND p.id_toko=sp.id_toko');
        $this->db->where('ot.id_toko', $this->userdata->id_toko);
        $this->db->where('ot.id_users', $id_users);
        $this->db->order_by('ot.id_orders_temp', $this->order);
        return $this->db->get()->result();
    }

    function get_by_top()
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->order_by($this->id, 'ASC');
        return $this->db->get($this->table)->row();
    }

    // get data by barcode
    function cek_barang($id_produk, $id_toko, $id_users)
    {
        $this->db->where($this->id_produk, $id_produk);
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id_users, $id_users);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data   
    function update($id, $data)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    // delete all data by users and toko
    function deleteAll($id_users, $id_toko)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id_users, $id_users);
        $this->db->delete($this->table);
    }

}

/* End of file Orders_retail_model.php */
/* Location: ./application/models/Orders_retail_model.php */