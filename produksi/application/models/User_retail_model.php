<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_retail_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id_users';
    public $id_toko = 'id_toko';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json_user($user) {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,alamat,phone,level,foto');
        $this->datatables->from('users');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('id_users', $user);
            $this->datatables->add_column('action', anchor(site_url('outlet/user_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/user_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_users');
        return $this->datatables->generate();
    }

    // datatables
    function json_user_produksi($user) {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,alamat,phone,level,foto');
        $this->datatables->from('users');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('id_users', $user);
            $this->datatables->add_column('action', anchor(site_url('produksi/user_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/user_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_users');
        return $this->datatables->generate();
    }

    function json_id_toko($id_toko) {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,alamat,phone,level,foto, IF(active=1, "Aktif", "Tidak Aktif") AS t_active,( CASE WHEN level = 1 THEN "ADMIN" WHEN level = 2 THEN "KASIR" WHEN level = 3 THEN "GUDANG" WHEN level = 4 THEN "SALES" WHEN level = 5 THEN "MARKETING" ELSE "PRINCIPAL" END ) AS t_level');
        $this->datatables->from('users');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('outlet/user_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/user_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/user_retail/nonactive/$1'),'<button class="btn btn-xs btn-danger" id="btnActive"><i id="iconActive" class="ace-icon glyphicon glyphicon-off bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        $this->db->order_by('active', 'desc');
        $this->db->order_by('level', 'asc');
        $this->db->order_by('first_name', 'asc');
        return $this->datatables->generate();
    }

    function json_id_toko_produksi($id_toko) {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,alamat,phone,level,foto, IF(active=1, "Aktif", "Tidak Aktif") AS t_active,( CASE WHEN level = 1 THEN "ADMIN" WHEN level = 2 THEN "KASIR" WHEN level = 3 THEN "GUDANG" WHEN level = 4 THEN "SALES" WHEN level = 5 THEN "MARKETING" ELSE "PRINCIPAL" END ) AS t_level');
        $this->datatables->from('users');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/user_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/user_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/user_retail/nonactive/$1'),'<button class="btn btn-xs btn-danger" id="btnActive"><i id="iconActive" class="ace-icon glyphicon glyphicon-off bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        $this->db->order_by('active', 'desc');
        $this->db->order_by('level', 'asc');
        $this->db->order_by('first_name', 'asc');
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('ip_address', $q);
    	$this->db->or_like('username', $q);
    	$this->db->or_like('password', $q);
    	$this->db->or_like('salt', $q);
    	$this->db->or_like('email', $q);
    	$this->db->or_like('activation_code', $q);
    	$this->db->or_like('forgotten_password_code', $q);
    	$this->db->or_like('forgotten_password_time', $q);
    	$this->db->or_like('remember_code', $q);
    	$this->db->or_like('created_on', $q);
    	$this->db->or_like('last_login', $q);
    	$this->db->or_like('active', $q);
    	$this->db->or_like('first_name', $q);
    	$this->db->or_like('last_name', $q);
    	$this->db->or_like('company', $q);
    	$this->db->or_like('phone', $q);
    	$this->db->or_like('level', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('ip_address', $q);
    	$this->db->or_like('username', $q);
    	$this->db->or_like('password', $q);
    	$this->db->or_like('salt', $q);
    	$this->db->or_like('email', $q);
    	$this->db->or_like('activation_code', $q);
    	$this->db->or_like('forgotten_password_code', $q);
    	$this->db->or_like('forgotten_password_time', $q);
    	$this->db->or_like('remember_code', $q);
    	$this->db->or_like('created_on', $q);
    	$this->db->or_like('last_login', $q);
    	$this->db->or_like('active', $q);
    	$this->db->or_like('first_name', $q);
    	$this->db->or_like('last_name', $q);
    	$this->db->or_like('company', $q);
    	$this->db->or_like('phone', $q);
    	$this->db->or_like('level', $q);
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

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-31 10:45:44 */
/* http://harviacode.com */