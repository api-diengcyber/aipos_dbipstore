<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukarphone_model extends CI_Model
{

    public $table = 'tukarphone';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($id_toko)
    {
        $this->datatables->select('tp.id,tp.id_toko,tp.id_users,tp.tgl,tp.id_sales,tp.id_orders,tp.id_faktur,tp.nama_penukar,tp.alamat_penukar,tp.no_hp_penukar,o.no_faktur,f.no_faktur AS faktur_beli');
        $this->datatables->from('tukarphone tp');
        $this->datatables->join('orders o', 'tp.id_orders=o.id_orders_2 AND tp.id_toko=o.id_toko', 'left');
        $this->datatables->join('faktur_retail f', 'tp.id_faktur=f.id_faktur AND tp.id_toko=f.id_toko', 'left');
        $this->datatables->where('tp.id_toko', $id_toko);
        $this->datatables->add_column('action_1', anchor(site_url('admin/tukarphone/aksi/penjualan/$1'), '<button class="btn btn-xs btn-success">Penjualan</button>'), 'id');
        $this->datatables->add_column('action_2', anchor(site_url('admin/tukarphone/aksi/pembelian/$1'), '<button class="btn btn-xs btn-info">Pembelian</button>'), 'id');
        $this->datatables->add_column('action_3', anchor(site_url('admin/laporan_retail/detail_faktur/$1'), '$1'), 'no_faktur');
        $this->datatables->add_column('action_4', anchor(site_url('admin/pembelian/read/$2'), '$1'), 'faktur_beli,id_faktur');
        return $this->datatables->generate();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
}

/* End of file Tukarphone_model.php */
/* Location: ./application/models/Tukarphone_model.php */
