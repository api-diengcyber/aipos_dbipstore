<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_produk_retail_model extends CI_Model
{

    public $table = 'kategori_produk';
    public $id = 'id_kategori_2';
    public $id_toko = 'id_toko';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json($id_toko) {
        $this->datatables->select('kp.id_kategori, kp.id_kategori_2, kp.id_toko, kp.nama_kategori, kp.id_supplier, s.nama_supplier');
        $this->datatables->from('kategori_produk kp');
        $this->datatables->join('users u', 'kp.id_users=u.id_users AND kp.id_toko=u.id_toko');
        $this->datatables->join('supplier s', 'kp.id_supplier=s.id_supplier AND s.id_users=u.id_users AND kp.id_toko=s.id_toko');
        $this->datatables->where('kp.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        if($this->userdata->level == 1){
        $this->datatables->add_column('action', anchor(site_url('admin/kategori_produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('admin/kategori_produk_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('admin/kategori_produk_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kategori_2');
        }else if($this->userdata->level == 3){
        $this->datatables->add_column('action', anchor(site_url('outlet/kategori_produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/kategori_produk_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/kategori_produk_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kategori_2');
        }
        $this->datatables->group_by('kp.id_kategori_2');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi($id_toko) {
        $this->datatables->select('kp.id_kategori, kp.id_kategori_2, kp.id_toko, kp.nama_kategori, kp.id_supplier, s.nama_supplier');
        $this->datatables->from('kategori_produk kp');
        $this->datatables->join('users u', 'kp.id_users=u.id_users AND kp.id_toko=u.id_toko');
        $this->datatables->join('supplier s', 'kp.id_supplier=s.id_supplier AND s.id_users=u.id_users AND kp.id_toko=s.id_toko');
        $this->datatables->where('kp.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/kategori_produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/kategori_produk_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/kategori_produk_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kategori_2');
        $this->datatables->group_by('kp.id_kategori_2');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get data by id toko
    function get_by_id_toko($id_toko)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->order_by($this->id_toko, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kategori', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('nama_kategori', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kategori', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('nama_kategori', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

}

/* End of file Kategori_produk_model.php */
/* Location: ./application/models/Kategori_produk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-31 06:40:53 */
/* http://harviacode.com */