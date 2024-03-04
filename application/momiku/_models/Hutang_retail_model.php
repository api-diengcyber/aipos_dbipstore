<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hutang_retail_model extends CI_Model
{

    public $table = 'hutang';
    public $id = 'id';
    public $id_toko = 'id_toko';
    public $no_faktur = 'no_faktur';
    public $id_supplier = 'id_supplier';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json() {
        $this->datatables->select('h.id, h.tgl, h.id_toko, h.id_users, h.id_faktur, h.barcode, h.barang, h.hutang, h.bayar, h.kurang, s.nama_supplier, fr.no_faktur, fr.deadline, fr.dp');
        $this->datatables->from("hutang h");
        $this->datatables->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->datatables->join("faktur_retail fr", "h.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=h.id_toko", "left");
        $this->datatables->join("supplier s", "h.id_supplier=s.id_supplier AND s.id_users=u.id_users AND h.id_toko=s.id_toko", "left");
        $this->datatables->where("h.id_toko", $this->userdata->id_toko);
        $this->datatables->where("u.id_cabang", $this->userdata->id_cabang);
        if($this->userdata->level == 1){
        $this->datatables->add_column('action', anchor(site_url('outlet/hutang_retail/read/$1'),'<button type="button" class="btn btn-success btn-xs">Lihat</button>')." ".anchor(site_url('outlet/jurnal_retail/bayar_hutang_create/$1'),'<button type="button" class="btn btn-primary btn-xs">Bayar</button>')." ".anchor(site_url('outlet/hutang_retail/delete/$1'),'<button type="button" class="btn btn-danger btn-xs">Hapus</button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        }else if($this->userdata->level == 2){
        $this->datatables->add_column('action', anchor(site_url('outlet/hutang_retail/read/$1'),'<button type="button" class="btn btn-success btn-xs">Lihat</button>')." ".anchor(site_url('outlet/jurnal_retail/bayar_hutang_create/$1'),'<button type="button" class="btn btn-primary btn-xs">Bayar</button>')." ".anchor(site_url('outlet/hutang_retail/delete/$1'),'<button type="button" class="btn btn-danger btn-xs">Hapus</button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        }
        $this->db->group_by("h.id");
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi() {
        $this->datatables->select('h.id, h.tgl, h.id_toko, h.id_users, h.id_faktur, h.barcode, h.barang, h.hutang, h.bayar, h.kurang, s.nama_supplier, fr.no_faktur, fr.deadline, fr.dp');
        $this->datatables->from("hutang h");
        $this->datatables->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->datatables->join("faktur_retail fr", "h.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=h.id_toko", "left");
        $this->datatables->join("supplier s", "h.id_supplier=s.id_supplier AND s.id_users=u.id_users AND h.id_toko=s.id_toko", "left");
        $this->datatables->where("h.id_toko", $this->userdata->id_toko);
        $this->datatables->where("u.id_cabang", $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/hutang_retail/read/$1'),'<button type="button" class="btn btn-success btn-xs">Lihat</button>')." ".anchor(site_url('produksi/jurnal_retail/bayar_hutang_create/$1'),'<button type="button" class="btn btn-primary btn-xs">Bayar</button>')." ".anchor(site_url('produksi/hutang_retail/delete/$1'),'<button type="button" class="btn btn-danger btn-xs">Hapus</button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        $this->db->group_by("h.id");
        return $this->datatables->generate();
    }

    function get_all_hutang() {
        $this->db->select('h.id,s.nama_supplier,h.tgl, h.id_toko, h.id_users, h.id_faktur, h.barcode, h.barang, h.hutang, h.bayar, h.kurang');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->join('supplier s','s.id_supplier=h.id_supplier AND s.id_users=u.id_users AND s.id_toko=h.id_toko');
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    } 

    function get_all_hutang_produksi() {
        $this->db->select('h.id,s.nama_supplier,h.tgl, h.id_toko, h.id_users, h.id_faktur, h.barcode, h.barang, h.hutang, h.bayar, h.kurang');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->join('supplier s','s.id_supplier=h.id_supplier AND s.id_users=u.id_users AND s.id_toko=h.id_toko');
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    } 

    // get all
    function get_all()
    {
        $this->db->select('h.*');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->order_by("h.id", $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('h.*');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->where('h.id', $id);
        return $this->db->get()->row();
    }

    // get data by no faktur
    function get_by_no_faktur($no_faktur)
    {
        $this->db->select('h.*');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->where('h.no_faktur', $no_faktur);
        return $this->db->get()->row();
    }

    // get data by id faktur
    function get_by_id_faktur($id_faktur){
        $this->db->select('h.*');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.id_faktur', $id_faktur);
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    }

    // get data by id faktur
    function get_by_id_faktur_produksi($id_faktur){
        $this->db->select('h.*');
        $this->db->from('hutang h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.id_faktur', $id_faktur);
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    }

    // get data by id supplier
    function get_by_id_supplier($id_supplier)
    {
        $this->db->select('h.*');
        $this->db->from($this->table.' h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.'.$this->id_supplier, $id_supplier);
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    }

    // get data by id supplier produksi
    function get_by_id_supplier_produksi($id_supplier)
    {
        $this->db->select('h.*');
        $this->db->from($this->table.' h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.'.$this->id_supplier, $id_supplier);
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    }

    // get saldo hutang
    function get_saldo_hutang($id_supplier)
    {
        $this->db->select('SUM(kurang) AS saldo_hutang');
        $this->db->from($this->table.' h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.'.$this->id_supplier, $id_supplier);
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->row();
    }

    // get saldo hutang produksi
    function get_saldo_hutang_produksi($id_supplier)
    {
        $this->db->select('SUM(kurang) AS saldo_hutang');
        $this->db->from($this->table.' h');
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->where('h.'.$this->id_supplier, $id_supplier);
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->row();
    }

    // get data by between date
    function get_by_between_date($id_toko, $tgl1='', $tgl2='')
    {
        $this->db->select('h.id, h.tgl, h.id_toko, h.id_users, h.id_faktur, h.barcode, h.barang, h.hutang, h.bayar, h.kurang, s.nama_supplier, fr.no_faktur, fr.deadline, fr.dp');
        $this->db->from("hutang h");
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->join("faktur_retail fr", "h.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=h.id_toko", "left");
        $this->db->join("supplier s", "h.id_supplier=s.id_supplier AND s.id_users=u.id_users AND h.id_toko=s.id_toko", "left");
        $this->db->where("DATE(CONCAT(SUBSTRING(h.tgl,7,4),'-',SUBSTRING(h.tgl,4,2),'-',SUBSTRING(h.tgl,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    }

    // get data by between date produksi
    function get_by_between_date_produksi($id_toko, $tgl1='', $tgl2='')
    {
        $this->db->select('h.id, h.tgl, h.id_toko, h.id_users, h.id_faktur, h.barcode, h.barang, h.hutang, h.bayar, h.kurang, s.nama_supplier, fr.no_faktur, fr.deadline, fr.dp');
        $this->db->from("hutang h");
        $this->db->join("users u" ,"h.id_users=u.id_users AND h.id_toko=u.id_toko");
        $this->db->join("faktur_retail fr", "h.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=h.id_toko", "left");
        $this->db->join("supplier s", "h.id_supplier=s.id_supplier AND s.id_users=u.id_users AND h.id_toko=s.id_toko", "left");
        $this->db->where("DATE(CONCAT(SUBSTRING(h.tgl,7,4),'-',SUBSTRING(h.tgl,4,2),'-',SUBSTRING(h.tgl,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
        $this->db->where('h.id_toko', $this->userdata->id_toko);
        $this->db->where("u.id_cabang", $this->userdata->id_cabang);
        $this->db->group_by('h.id');
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('tgl', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('id_users', $q);
    	$this->db->or_like('no_faktur', $q);
    	$this->db->or_like('barcode', $q);
    	$this->db->or_like('barang', $q);
    	$this->db->or_like('hutang', $q);
    	$this->db->or_like('bayar', $q);
    	$this->db->or_like('kurang', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('tgl', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('id_users', $q);
    	$this->db->or_like('no_faktur', $q);
    	$this->db->or_like('barcode', $q);
    	$this->db->or_like('barang', $q);
    	$this->db->or_like('hutang', $q);
    	$this->db->or_like('bayar', $q);
    	$this->db->or_like('kurang', $q);
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

/* End of file Hutang_retail_model.php */
/* Location: ./application/models/Hutang_retail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-09 04:44:55 */
/* http://harviacode.com */