<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
        
    }

    // datatables
    function json($id_toko) {
      $tgl1 = date('Y-m-d');
      $tujuh_hari = mktime(0,0,0,date("n"),date("j")-7,date("Y"));
      $tgl2 = date('Y-m-d', $tujuh_hari);
      $this->datatables->select('o.*, od.rows AS list_produk, u_cs.first_name AS nama_cs');
      $this->datatables->from('orders o');
      $this->datatables->join('orders o2', 'SUBSTRING(o.bukan_member,1,20)=SUBSTRING(o2.bukan_member,1,20) AND o.id_orders_2 != o2.id_orders_2 AND o.tgl_order=o2.tgl_order');
      $this->datatables->join('(SELECT od.id_orders_2, GROUP_CONCAT(pr.nama_produk, " : ", od.harga_jual, "<br>") AS `rows` FROM orders_detail od JOIN produk_retail pr ON od.id_produk=pr.id_produk_2 GROUP BY od.id_orders_2) AS od', 'od.id_orders_2=o.id_orders_2');
      // $this->datatables->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
      $this->datatables->join('users u_cs', 'u_cs.id_users=o.id_sales');
      $this->datatables->where('o.id_toko', $this->userdata->id_toko);
      $this->datatables->where('o.valid IS NULL');
       $this->datatables->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$tgl1.'" AND "'.$tgl2.'"');
      $this->datatables->add_column('action', anchor(site_url('admin/validasi/update/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>', 'onclick="return confirm(`Anda yakin validasi ? `)"')."&nbsp;&nbsp;&nbsp;&nbsp;".'<button type="button" class="btn btn-xs btn-danger btn-confirm-delete" data-id="$1"><i class="ace-icon fa fa-trash bigger-120"></i></button>', 'o.id_orders');
      $this->datatables->group_by('o.id_orders_2');
      return $this->datatables->generate();
    }

    // datatables
    function json2($id_toko) {
      $tgl1 = date('Y-m-d');
      $tujuh_hari = mktime(0,0,0,date("n"),date("j")-7,date("Y"));
      $tgl2 = date('Y-m-d', $tujuh_hari);
      $this->datatables->select('o.*, od.rows AS list_produk, u_cs.first_name AS nama_cs');
      $this->datatables->from('orders o');
      $this->datatables->join('orders o2', 'SUBSTRING(o.bukan_member,1,20)=SUBSTRING(o2.bukan_member,1,20) AND o.id_orders_2 != o2.id_orders_2 AND o.tgl_order=o2.tgl_order');
      $this->datatables->join('(SELECT od.id_orders_2, GROUP_CONCAT(pr.nama_produk, " : ", od.harga_jual, "<br>") AS `rows` FROM orders_detail od JOIN produk_retail pr ON od.id_produk=pr.id_produk_2 GROUP BY od.id_orders_2) AS od', 'od.id_orders_2=o.id_orders_2');
      // $this->datatables->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
      $this->datatables->join('users u_cs', 'u_cs.id_users=o.id_sales');
      $this->datatables->where('o.id_toko', $this->userdata->id_toko);
      $this->datatables->where('o.valid IS NULL');
    //   $this->datatables->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$tgl1.'" AND "'.$tgl2.'"');
      $this->datatables->add_column('action', anchor(site_url('admin/validasi/update/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>', 'onclick="return confirm(`Anda yakin validasi ? `)"')."&nbsp;&nbsp;&nbsp;&nbsp;".'<button type="button" class="btn btn-xs btn-danger btn-confirm-delete" data-id="$1"><i class="ace-icon fa fa-trash bigger-120"></i></button>', 'o.id_orders');
      $this->datatables->group_by('o.id_orders_2');
      $this->db->limit(5);
      return $this->datatables->generate();
    }

    // datatables
    function json_invoice($id_toko) {
      $this->datatables->select('o.*, od.rows AS list_produk, u_cs.first_name AS nama_cs, COUNT(o.bukan_member) AS cnt_np, COUNT(o.no_faktur) AS cnt_nf');
      $this->datatables->from('orders o');
      $this->datatables->join('(SELECT od.id_orders_2, GROUP_CONCAT(pr.nama_produk, " : ", od.harga_jual, "<br>") AS `rows` FROM orders_detail od JOIN produk_retail pr ON od.id_produk=pr.id_produk_2 GROUP BY od.id_orders_2) AS od', 'od.id_orders_2=o.id_orders_2');
      // $this->datatables->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
      $this->datatables->join('users u_cs', 'u_cs.id_users=o.id_sales');
      $this->datatables->where('o.id_toko', $this->userdata->id_toko);
      $this->datatables->where('o.valid IS NULL');
      // bulan tahun ini 
      $blnthnini = date('m')."-".date('Y');
      // $this->datatables->where('substring(o.tgl_order,4,7',$blntnini);
      $this->db->having('cnt_nf >', 1);
      $this->datatables->add_column('action', anchor(site_url('admin/validasi/update/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>', 'onclick="return confirm(`Anda yakin validasi ? `)"')."&nbsp;&nbsp;&nbsp;&nbsp;".'<button type="button" class="btn btn-xs btn-danger btn-confirm-delete" data-id="$1"><i class="ace-icon fa fa-trash bigger-120"></i></button>', 'o.id_orders');
      $this->datatables->group_by('o.no_faktur');
      $this->db->limit(1);
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
        $this->datatables->add_column('action', anchor(site_url('produksi/supplier_retail/update/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/supplier_retail/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/supplier_retail/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_supplier');
        $this->datatables->group_by('s.id_supplier');
        return $this->datatables->generate();
    }

    function get_jurnal_couple($id_toko = NULL)
    {
      $this->db->select('j.*, a.akun, COUNT(j2.kode) AS c');
      $this->db->from('(SELECT * FROM jurnal WHERE LEFT(kode,3)="VER" GROUP BY kode) AS j');
      $this->db->join('(SELECT kode FROM jurnal WHERE LEFT(kode,3)="VER" GROUP BY kode) AS j2', 'SUBSTRING(j.kode,1,27)=SUBSTRING(j2.kode,1,27)');
      $this->db->join('akun a', 'j.id_akun=a.id');
      $this->db->where('j.id_toko', $id_toko);
      $this->db->where('LEFT(j.kode, 3) = ', "VER");
      $this->db->group_by('j.id');
      $this->db->having('c > 1');
    //   $this->db->limit(5);
      return $this->db->get()->result();
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