<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier_retail_model extends CI_Model
{

    public $table = 'supplier';
    public $id = 'id_supplier';
    public $id_toko = 'id_toko';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        
        
    }

    // datatables
    function json($id_toko = NULL) {
        $this->datatables->select('s.id_supplier, s.id_toko, s.nama_supplier, s.alamat, s.kota, s.telp, s.fax, s.cp, s.telp_cp, s.ket');
        $this->datatables->from('supplier s');
        $this->datatables->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko');
        $this->datatables->where('s.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        // $this->datatables->where('u.level', 3);
        if($this->userdata->level == 1){
            $this->datatables->add_column('action', anchor(site_url('admin/supplier_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('admin/supplier_retail/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('admin/supplier_retail/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_supplier');
        }else if($this->userdata->level == 3){
            $this->datatables->add_column('action', anchor(site_url('outlet/supplier_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/supplier_retail/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/supplier_retail/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_supplier');
        }
        $this->datatables->group_by('s.id_supplier');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi($id_toko = NULL) {
        $this->datatables->select('s.id_supplier, s.id_toko, s.nama_supplier, s.alamat, s.kota, s.telp, s.fax, s.cp, s.telp_cp, s.ket');
        $this->datatables->from('supplier s');
        $this->datatables->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko');
        $this->datatables->where('s.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u.level', 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/supplier_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/supplier_retail/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/supplier_retail/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_supplier');
        $this->datatables->group_by('s.id_supplier');
        return $this->datatables->generate();
    }

    // get all
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

    // get data by id
    function get_by_id_toko($id_toko)
    {
        $this->db->where($this->id_toko, $this->userdata->id_toko);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_supplier', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('nama_supplier', $q);
    	$this->db->or_like('alamat', $q);
    	$this->db->or_like('kota', $q);
    	$this->db->or_like('telp', $q);
    	$this->db->or_like('fax', $q);
    	$this->db->or_like('cp', $q);
    	$this->db->or_like('telp_cp', $q);
    	$this->db->or_like('ket', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_supplier', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('nama_supplier', $q);
    	$this->db->or_like('alamat', $q);
    	$this->db->or_like('kota', $q);
    	$this->db->or_like('telp', $q);
    	$this->db->or_like('fax', $q);
    	$this->db->or_like('cp', $q);
    	$this->db->or_like('telp_cp', $q);
    	$this->db->or_like('ket', $q);
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
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Supplier_model.php */
/* Location: ./application/models/Supplier_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-29 08:59:55 */
/* http://harviacode.com */