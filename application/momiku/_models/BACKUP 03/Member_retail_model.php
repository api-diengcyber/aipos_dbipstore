<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_retail_model extends CI_Model
{

    public $table = 'member';
    public $id = 'id_member';
    public $id_toko = 'id_toko';
    public $id_pembeli = 'id_pembeli';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json() {
        $this->datatables->select('k.nama_kota as cabang,m.id,m.id_member,m.id_toko,m.kode,m.nama,m.alamat,m.telp,m.tgl_lahir,m.diskon, (SELECT SUM(sisa) FROM piutang WHERE id_pembeli=m.id) AS hutang, (CONCAT(u.first_name)) AS nama_sales, (CASE WHEN m.pkp=1 THEN "PKP" ELSE CONCAT("BUKAN PKP (", m.persen_pajak, "%)") END) AS jenis_pkp');
        $this->datatables->from('member m');
        $this->datatables->join('users u2', 'm.id_users=u2.id_users AND m.id_toko=u2.id_toko');
        $this->datatables->join('kota k', 'k.id=m.id_kota', 'left');
        $this->datatables->join('users u','m.id_sales=u.id_users AND m.id_toko=u.id_toko AND u.level=5', 'left');
        $this->datatables->where('m.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u2.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u2.level', 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/member_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/member_retail/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/member_retail/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_member');
        $this->datatables->group_by('m.id');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi() {
        $this->datatables->select('k.nama_kota as cabang,m.id,m.id_member,m.id_toko,m.kode,m.nama,m.alamat,m.telp,m.tgl_lahir,m.diskon, (SELECT SUM(sisa) FROM piutang WHERE id_pembeli=m.id) AS hutang, (CONCAT(u.first_name)) AS nama_sales, (CASE WHEN m.pkp=1 THEN "PKP" ELSE CONCAT("BUKAN PKP (", m.persen_pajak, "%)") END) AS jenis_pkp');
        $this->datatables->from('member m');
        $this->datatables->join('users u2', 'm.id_users=u2.id_users AND m.id_toko=u2.id_toko');
        $this->datatables->join('kota k', 'k.id=m.id_kota', 'left');
        $this->datatables->join('users u','m.id_sales=u.id_users AND m.id_toko=u.id_toko AND u.level=5', 'left');
        $this->datatables->where('m.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u2.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u2.level', 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/member_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/member_retail/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/member_retail/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_member');
        $this->datatables->group_by('m.id');
        return $this->datatables->generate();
    }

    // datatables
    function json_kasir($id_toko) {
        $this->datatables->select('k.nama_kota as cabang,(CONCAT(u.first_name)) AS nama_sales,m.id, m.id_member, m.id_toko, m.kode, m.nama, m.alamat, m.telp, m.tgl_lahir, m.diskon, (SELECT SUM(sisa) FROM piutang WHERE id_pembeli=m.id) AS hutang, (CONCAT(u.first_name)) AS nama_sales, (CASE WHEN m.pkp=1 THEN "PKP" ELSE CONCAT("BUKAN PKP (", m.persen_pajak, "%)") END) AS jenis_pkp');
        $this->datatables->from('member m');
        $this->datatables->join('users u2','m.id_users=u2.id_users AND m.id_toko=u2.id_toko');
        $this->datatables->join('kota k', 'k.id=m.id_kota', 'left');
        $this->datatables->join('users u','m.id_sales=u.id_users AND m.id_toko=u.id_toko AND u.level=5', 'left');
        $this->datatables->where('m.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u2.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u2.level', 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/member_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>'), 'id_member');
        return $this->datatables->generate();
    }

    // datatables
    function json_kasir_produksi($id_toko) {
        $this->datatables->select('k.nama_kota as cabang,(CONCAT(u.first_name)) AS nama_sales,m.id, m.id_member, m.id_toko, m.kode, m.nama, m.alamat, m.telp, m.tgl_lahir, m.diskon, (SELECT SUM(sisa) FROM piutang WHERE id_pembeli=m.id) AS hutang, (CONCAT(u.first_name)) AS nama_sales, (CASE WHEN m.pkp=1 THEN "PKP" ELSE CONCAT("BUKAN PKP (", m.persen_pajak, "%)") END) AS jenis_pkp');
        $this->datatables->from('member m');
        $this->datatables->join('users u2','m.id_users=u2.id_users AND m.id_toko=u2.id_toko');
        $this->datatables->join('kota k', 'k.id=m.id_kota', 'left');
        $this->datatables->join('users u','m.id_sales=u.id_users AND m.id_toko=u.id_toko AND u.level=5', 'left');
        $this->datatables->where('m.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u2.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u2.level', 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/member_retail/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>'), 'id_member');
        return $this->datatables->generate();
    }

    // datatables
    function json_sales($id_toko) {
        $this->datatables->select('m.id, m.id_member, m.id_toko, m.kode, m.nama, m.alamat, m.telp, m.tgl_lahir, m.diskon, (SELECT SUM(sisa) FROM piutang WHERE id_pembeli=m.id) AS hutang');
        $this->datatables->from('member m');
        $this->datatables->join('users u','m.id_users=u.id_users AND m.id_toko=u.id_toko');
        $this->datatables->where('m.id_toko', $this->userdata->id_toko);
        $this->datatables->where('m.id_sales', $this->userdata->id_users);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u.level', 3);
        return $this->datatables->generate();
    }

    // datatables
    function json_sales_produksi($id_toko) {
        $this->datatables->select('m.id, m.id_member, m.id_toko, m.kode, m.nama, m.alamat, m.telp, m.tgl_lahir, m.diskon, (SELECT SUM(sisa) FROM piutang WHERE id_pembeli=m.id) AS hutang');
        $this->datatables->from('member m');
        $this->datatables->join('users u','m.id_users=u.id_users AND m.id_toko=u.id_toko');
        $this->datatables->where('m.id_toko', $this->userdata->id_toko);
        $this->datatables->where('m.id_sales', $this->userdata->id_users);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u.level', 2);
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
        $this->db->select('m.*');
        $this->db->from('member m');
        $this->db->join('users u', 'm.id_users=u.id_users AND u.id_toko=m.id_toko');
        $this->db->where('m.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->order_by('m.id', $this->order);
        return $this->db->get()->row();
    }
    
    // get data by id toko
    function get_by_id_toko($id_toko)
    {
        $this->db->select('m.*, u2.first_name, u2.last_name');
        $this->db->from('member m');
        $this->db->join('users u', 'm.id_users=u.id_users AND u.id_toko=m.id_toko');
        $this->db->join('users u2', 'm.id_sales=u.id_users AND u.id_toko=m.id_toko AND u.level=5', 'left');
        $this->db->where('m.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->order_by('m.id', $this->order);
        $this->db->group_by('m.id_member');
        return $this->db->get()->result();
    }
    
    // get data by id sales
    function get_by_id_sales($id_sales)
    {
        $this->db->select('m.*');
        $this->db->from('member m');
        $this->db->join('users u', 'm.id_users=u.id_users AND u.id_toko=m.id_toko');
        $this->db->where('m.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('m.id_sales', $id_sales);
        $this->db->order_by('m.nama', 'asc');
        $this->db->order_by('m.alamat', 'asc');
        $this->db->group_by('m.id_member');
        return $this->db->get()->result();
    }
    
    // get data by id sales
    function get_by_id_sales_and_not($id_sales = "")
    {
        $this->db->select('m.*');
        $this->db->from('member m');
        $this->db->join('users u', 'm.id_users=u.id_users AND u.id_toko=m.id_toko');
        $this->db->where('m.id_sales', '0');
        $this->db->where('m.id_toko', $this->userdata->id_toko);
        if (!empty($id_sales)) {
            $this->db->or_where('m.id_sales', $id_sales);
            $this->db->where('m.id_toko', $this->userdata->id_toko);
        }
        $this->db->order_by('m.nama', 'asc');
        $this->db->order_by('m.alamat', 'asc');
        $this->db->group_by('m.id_member');
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('kode', $q);
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('alamat', $q);
    	$this->db->or_like('telp', $q);
    	$this->db->or_like('tgl_lahir', $q);
    	$this->db->or_like('diskon', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('kode', $q);
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('alamat', $q);
    	$this->db->or_like('telp', $q);
    	$this->db->or_like('tgl_lahir', $q);
    	$this->db->or_like('diskon', $q);
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

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-01 04:12:06 */
/* http://harviacode.com */
