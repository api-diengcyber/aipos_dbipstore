<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok_gudang_model extends CI_Model
{

    public $table = 'stok_gudang';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_qty_order($id_toko, $id_produk)
    {
        $tgl = date('Y-m-d');
        $row = $this->db->where('id_toko', $id_toko)->get('stok_gudang')->row();
        if ($row) {
            $tgl = $row->tgl;
        }
        $this->db->select('pr.*, SUM(od.jumlah) AS jml_jual');
        $this->db->from('produk_retail pr');
        $this->db->join('orders_detail od', 'pr.id_produk_2=od.id_produk AND pr.id_toko=od.id_toko', 'left');
        $this->db->join('orders o', 'od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko', 'left');
        $this->db->join('orders_verifikasi ov', 'o.id_orders_2=ov.id_orders AND o.id_toko=ov.id_toko', 'left');
        $this->db->where('pr.id_produk_2', $id_produk);
        $this->db->where('(DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) >= "'.$tgl.'" OR ov.tgl_kirim >= "'.$tgl.'")');
        $this->db->group_by('pr.id_produk_2');
        return $this->db->get()->row();
    }

    // datatables
    function json() {
        $this->datatables->select('sg.id, sg.id_toko, sg.id_gudang, sg.id_produk, sg.stok, g.nama_gudang, pr.nama_produk');
        $this->datatables->from('stok_gudang sg');
        //add this line for join
        $this->datatables->join('gudang g', 'sg.id_gudang=g.id AND sg.id_toko=g.id_toko');
        $this->datatables->join('produk_retail pr', 'sg.id_produk=pr.id_produk_2 AND sg.id_toko=pr.id_toko');
        $this->datatables->add_column('action', anchor(site_url('admin/stok_gudang/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('admin/stok_gudang/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('admin/stok_gudang/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
        $this->db->select('sg.*, g.nama_gudang, pr.nama_produk');
        $this->db->from($this->table.' sg');
        $this->db->join('gudang g', 'sg.id_gudang=g.id AND sg.id_toko=g.id_toko');
        $this->db->join('produk_retail pr', 'sg.id_produk=pr.id_produk_2 AND sg.id_toko=pr.id_toko');
        $this->db->where('sg.'.$this->id, $id);
        return $this->db->get()->row();
    }

    // get data by id
    function get_by_id_gudang($id_gudang)
    {
        $this->db->select('sg.id, sg.id_gudang, sg.id_produk, SUM(sg.stok) AS stok, g.nama_gudang, pr.nama_produk');
        $this->db->from($this->table.' sg');
        $this->db->join('gudang g', 'sg.id_gudang=g.id AND sg.id_toko=g.id_toko');
        $this->db->join('produk_retail pr', 'sg.id_produk=pr.id_produk_2 AND sg.id_toko=pr.id_toko');
        $this->db->where('sg.id_gudang', $id_gudang);
        $this->db->group_by('sg.id_produk');
        return $this->db->get()->result();
    }

    // get data by id
    function get_produk_by_id_gudang($id_gudang)
    {
        $this->db->select('pr.id_produk_2, SUM(sg.stok) AS stok, pr.nama_produk, ds.jml_stok');
        $this->db->from('produk_retail pr');
        $this->db->join($this->table.' sg', 'sg.id_produk=pr.id_produk_2 AND sg.id_toko=pr.id_toko AND sg.id_gudang="'.$id_gudang.'"', 'left');
        $this->db->join('(SELECT pr.id_produk_2 AS id_produk, pr.nama_produk, SUM((p.jml-od.jml)+IFNULL(ps.jml,0)) AS jml_stok
FROM produk_retail pr 
JOIN (SELECT od.id_produk, SUM(od.jumlah) AS jml FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko AND o.pembayaran != 5 WHERE od.id_toko="'.$this->userdata->id_toko.'" AND od.id_orders_2>0 GROUP BY od.id_produk) AS od ON pr.id_produk_2=od.id_produk
JOIN (SELECT id_produk, SUM(jumlah) AS jml FROM pembelian WHERE id_toko="'.$this->userdata->id_toko.'" GROUP BY id_produk) AS p ON pr.id_produk_2=p.id_produk 
LEFT JOIN (SELECT id_produk, SUM(stok) AS jml FROM penyesuaian_stok WHERE id_toko="'.$this->userdata->id_toko.'" GROUP BY id_produk) AS ps ON pr.id_produk_2=ps.id_produk 
GROUP BY pr.id_produk) AS ds', 'pr.id_produk_2=ds.id_produk', 'left');
        // $this->db->join('gudang g', 'sg.id_gudang=g.id AND sg.id_toko=g.id_toko');
        $this->db->group_by('pr.id_produk_2');
        $this->db->order_by('pr.id_produk_2', 'asc');
        return $this->db->get()->result();
    }

    // get data by id 
    function get_produk_stok()
    {
        $this->db->select('pr.id_toko, pr.id_produk_2, pr.nama_produk, ds.jml_stok');
        $this->db->from('produk_retail pr');
        $this->db->join('(SELECT pr.id_produk_2 AS id_produk, pr.nama_produk, SUM((p.jml-od.jml)+IFNULL(ps.jml,0)) AS jml_stok
FROM produk_retail pr 
JOIN (SELECT od.id_produk, SUM(od.jumlah) AS jml FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko AND o.pembayaran != 5 WHERE od.id_toko="'.$this->userdata->id_toko.'" AND od.id_orders_2>0 GROUP BY od.id_produk) AS od ON pr.id_produk_2=od.id_produk
JOIN (SELECT id_produk, SUM(jumlah) AS jml FROM pembelian WHERE id_toko="'.$this->userdata->id_toko.'" GROUP BY id_produk) AS p ON pr.id_produk_2=p.id_produk 
LEFT JOIN (SELECT id_produk, SUM(stok) AS jml FROM penyesuaian_stok WHERE id_toko="'.$this->userdata->id_toko.'" GROUP BY id_produk) AS ps ON pr.id_produk_2=ps.id_produk 
GROUP BY pr.id_produk) AS ds', 'pr.id_produk_2=ds.id_produk', 'left');
        $this->db->group_by('pr.id_produk');
        return $this->db->get()->result();
    }

    // get data by id gudang and id produk
    function get_cek($id_gudang, $id_produk)
    {
        $this->db->where('id_gudang', $id_gudang);
        $this->db->where('id_produk', $id_produk);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('id_toko', $q);
        $this->db->or_like('id_gudang', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('stok', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_toko', $q);
        $this->db->or_like('id_gudang', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('stok', $q);
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

/* End of file Stok_gudang_model.php */
/* Location: ./application/models/Stok_gudang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-20 05:16:29 */
/* http://harviacode.com */