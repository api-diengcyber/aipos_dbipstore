<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Toko_retail_model extends CI_Model
{

    public $table = 'toko';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($id_toko)
    {
        $this->datatables->select('toko.id, toko.nama_toko, toko.alamat, toko.telp, versi_aipos.versi_aipos');
        $this->datatables->from('toko');
        $this->datatables->join('versi_aipos', 'toko.versi_aipos=versi_aipos.id');
        $this->datatables->where('toko.id', $id_toko);
        $this->datatables->add_column('action', anchor(site_url('outlet/toko_retail/read'), '<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>') . "&nbsp;&nbsp;&nbsp;&nbsp;" . anchor(site_url('outlet/toko_retail/update'), '<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi($id_toko)
    {
        $this->datatables->select('toko.id, toko.nama_toko, toko.alamat, toko.telp, versi_aipos.versi_aipos');
        $this->datatables->from('toko');
        $this->datatables->join('versi_aipos', 'toko.versi_aipos=versi_aipos.id');
        $this->datatables->where('toko.id', $id_toko);
        $this->datatables->add_column('action', anchor(site_url('outlet/toko_retail/read'), '<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>') . "&nbsp;&nbsp;&nbsp;&nbsp;" . anchor(site_url('outlet/toko_retail/update'), '<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id');
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
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('nama_toko', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('telp', $q);
        $this->db->or_like('versi_aipos', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nama_toko', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('telp', $q);
        $this->db->or_like('versi_aipos', $q);
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

/* End of file Toko_model.php */
/* Location: ./application/models/Toko_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-31 09:19:41 */
/* http://harviacode.com */
