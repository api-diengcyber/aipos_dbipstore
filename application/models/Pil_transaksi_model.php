<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pil_transaksi_model extends CI_Model
{

    public $table = 'pil_transaksi';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('pt.id, pt.id_toko, pt.kode_transaksi, pt.nama_transaksi, pt.id_debet, pt.id_kredit, a_d.akun AS akun_debet, a_k.akun AS akun_kredit');
        $this->datatables->from('pil_transaksi pt');
        $this->datatables->join('akun a_d', 'pt.id_debet = a_d.id', 'left');
        $this->datatables->join('akun a_k', 'pt.id_kredit = a_k.id', 'left');
        $this->datatables->add_column('action', anchor(site_url('outlet/pil_transaksi/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pil_transaksi/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pil_transaksi/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi() {
        $this->datatables->select('pt.id, pt.id_toko, pt.kode_transaksi, pt.nama_transaksi, pt.id_debet, pt.id_kredit, a_d.akun AS akun_debet, a_k.akun AS akun_kredit');
        $this->datatables->from('pil_transaksi pt');
        $this->datatables->join('akun a_d', 'pt.id_debet = a_d.id', 'left');
        $this->datatables->join('akun a_k', 'pt.id_kredit = a_k.id', 'left');
        $this->datatables->add_column('action', anchor(site_url('produksi/pil_transaksi/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pil_transaksi/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pil_transaksi/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_toko', $q);
	$this->db->or_like('kode_transaksi', $q);
	$this->db->or_like('nama_transaksi', $q);
	$this->db->or_like('id_debet', $q);
	$this->db->or_like('id_kredit', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_toko', $q);
	$this->db->or_like('kode_transaksi', $q);
	$this->db->or_like('nama_transaksi', $q);
	$this->db->or_like('id_debet', $q);
	$this->db->or_like('id_kredit', $q);
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

/* End of file Pil_transaksi_model.php */
/* Location: ./application/models/Pil_transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-03 04:14:42 */
/* http://harviacode.com */