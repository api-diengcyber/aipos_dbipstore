<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piutang_retail_model extends CI_Model
{

    public $table = 'piutang';
    public $id = 'id_piutang';
    public $id_toko = 'id_toko';
    public $no_faktur = 'no_faktur';
    public $id_pembeli = 'id_pembeli';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/piutang_retail/read/$1'),'<button class="btn btn-xs btn-success">Lihat</button>')."&nbsp;".anchor(site_url('outlet/piutang_retail/bayar/$1'),'<button class="btn btn-xs btn-primary">Bayar</button>')."&nbsp;".anchor(site_url('outlet/piutang_retail/delete/$1'),'<button class="btn btn-xs btn-danger">Hapus</button>','onclick="javasciprt:return confirm(\'Are You Sure ?\')"'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/piutang_retail/read/$1'),'<button class="btn btn-xs btn-success">Lihat</button>')."&nbsp;".anchor(site_url('produksi/piutang_retail/bayar/$1'),'<button class="btn btn-xs btn-primary">Bayar</button>')."&nbsp;".anchor(site_url('produksi/piutang_retail/delete/$1'),'<button class="btn btn-xs btn-danger">Hapus</button>','onclick="javasciprt:return confirm(\'Are You Sure ?\')"'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_v2($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/piutang_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/piutang_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/piutang_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_v2_produksi($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/piutang_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/piutang_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/piutang_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_kasir($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/piutang_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_kasir_produksi($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/piutang_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_kasir_v2($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/piutang_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // datatables
    function json_kasir_v2_produksi($id_toko) {
        $this->datatables->select('p.id, p.id_piutang, p.id_toko, p.no_faktur, p.id_pembeli, p.jumlah_hutang, p.jumlah_bayar, p.sisa, p.tanggal, p.deadline, m.nama AS pembeli');
        $this->datatables->from($this->table.' p');
        $this->datatables->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->datatables->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where("u.level", 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/piutang_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_piutang');
        $this->datatables->group_by('p.id_piutang');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('p.*');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->order_by('p.id_piutang', $this->order);
        $this->db->group_by('p.id_piutang');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('p.*, m.nama AS nama_member, m.alamat AS alamat_member');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND p.id_toko=m.id_toko', 'left');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('p.'.$this->id, $id);
        // $this->db->where("u.level", 2);
        return $this->db->get()->row();
    }

    // get data by id and toko
    function get_by_id_and_toko($id, $id_toko)
    {
        $this->db->select('p.*');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('p.id_piutang', $id);
        $this->db->group_by('p.id_piutang');
        return $this->db->get()->row();
    }

    // get data by id toko
    function get_by_id_toko($id_toko)
    {
        $this->db->select('p.*');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->order_by('p.id_piutang', $this->order);
        $this->db->group_by('p.id_piutang');
        return $this->db->get()->result();
    }

    // get data by no faktur
    function get_by_no_faktur($no_faktur)
    {
        $this->db->select('p.*');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('p.no_faktur', $no_faktur);
        $this->db->group_by('p.id_piutang');
        return $this->db->get()->row();
    }

    // get data by pembeli
    function get_by_pembeli($id_pembeli)
    {
        $this->db->select('p.*');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('p.id_pembeli', $id_pembeli);
        $this->db->order_by("DATE(CONCAT(SUBSTRING(p.deadline,7,4),'-',SUBSTRING(p.deadline,4,2),'-',SUBSTRING(p.deadline,1,2))) ASC");
        $this->db->group_by('p.id_piutang');
        return $this->db->get()->result();
    }

    // get data by between date
    function get_by_between_date($id_toko, $tgl1='', $tgl2='')
    {
        $this->db->select('p.*, m.nama AS pembeli');
        $this->db->from("piutang p");
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->join('member m', 'p.id_pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=u.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where("DATE(CONCAT(SUBSTRING(p.tanggal,7,4),'-',SUBSTRING(p.tanggal,4,2),'-',SUBSTRING(p.tanggal,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
        return $this->db->get()->result();
    }

    // get saldo piutang
    function get_saldo_piutang($id_pembeli)
    {
        $this->db->select('SUM(p.sisa) AS saldo_piutang');
        $this->db->from($this->table." p");
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->where("p.id_pembeli", $id_pembeli);
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->group_by("p.id_pembeli");
        return $this->db->get()->row();
    }

    // get data piutang penjualan

    function get_piutang_penjualan($jatuh_tempo, $id_toko='', $status=0){
        $this->db->select('p.*, m.*');
        $this->db->from('piutang p');
        $this->db->join("users u" ,"p.id_users=u.id_users AND p.id_toko=u.id_toko");
        $this->db->join('member m', 'm.id_member = p.id_pembeli AND m.id_toko=p.id_toko', 'left');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        if ($status==1) {
            // Masih 
            $this->db->where("DATE(CONCAT(SUBSTR(p.deadline,7,4),'-',SUBSTR(p.deadline,4,2),'-',SUBSTR(p.deadline,1,2))) <= '".$jatuh_tempo."' AND DATE(CONCAT(SUBSTR(p.deadline,7,4),'-',SUBSTR(p.deadline,4,2),'-',SUBSTR(p.deadline,1,2))) >= '".date('Y-m-d')."'");
        } else if($status==2) {
            // Jatuh tempo
            $this->db->where("DATE(CONCAT(SUBSTR(p.deadline,7,4),'-',SUBSTR(p.deadline,4,2),'-',SUBSTR(p.deadline,1,2))) < '".$jatuh_tempo."'");
        }
        $this->db->where('p.sisa > 0');
        $this->db->order_by('p.deadline', 'asc');
        $this->db->group_by('p.id_piutang');
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('no_faktur', $q);
    	$this->db->or_like('id_pembeli', $q);
    	$this->db->or_like('jumlah_hutang', $q);
    	$this->db->or_like('jumlah_bayar', $q);
    	$this->db->or_like('sisa', $q);
    	$this->db->or_like('tanggal', $q);
    	$this->db->or_like('deadline', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('no_faktur', $q);
    	$this->db->or_like('id_pembeli', $q);
    	$this->db->or_like('jumlah_hutang', $q);
    	$this->db->or_like('jumlah_bayar', $q);
    	$this->db->or_like('sisa', $q);
    	$this->db->or_like('tanggal', $q);
    	$this->db->or_like('deadline', $q);
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

/* End of file Piutang_retail_model.php */
/* Location: ./application/models/Piutang_retail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-09 04:18:37 */
/* http://harviacode.com */