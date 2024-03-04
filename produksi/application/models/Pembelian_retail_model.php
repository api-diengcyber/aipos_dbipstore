<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian_retail_model extends CI_Model
{

    public $table = 'pembelian';
    public $id = 'id_pembelian';
    public $id_toko = 'id_toko';
    public $id_produk = 'id_produk';
    public $id_faktur = 'id_faktur';
    public $id_supplier = 'id_supplier';
    public $tgl_expire = 'tgl_expire';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json($id_toko) {
        $this->datatables->select('p.id, p.id_pembelian, p.id_toko, p.tgl, p.no_faktur, p.barcode, p.nm_barang, p.supplier, p.harga_satuan, p.jumlah, p.total_bayar, pr.nama_produk');
        $this->datatables->from('pembelian p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('outlet/pembelian_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pembelian_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pembelian');
        $this->datatables->group_by('p.id_pembelian');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi($id_toko) {
        $this->datatables->select('p.id, p.id_pembelian, p.id_toko, p.tgl, p.no_faktur, p.barcode, p.nm_barang, p.supplier, p.harga_satuan, p.jumlah, p.total_bayar, pr.nama_produk');
        $this->datatables->from('pembelian p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/pembelian_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pembelian_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pembelian');
        $this->datatables->group_by('p.id_pembelian');
        return $this->datatables->generate();
    }

    // datatables
    function json_faktur($id_toko, $id_faktur) {
        $this->datatables->select('p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, produk_retail.nama_produk, supplier.nama_supplier');
        $this->datatables->from('pembelian p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('produk_retail', 'p.id_produk=produk_retail.id_produk_2 AND produk_retail.id_users=u.id_users AND produk_retail.id_toko=p.id_toko');
        $this->datatables->join('supplier', 'p.id_supplier=supplier.id_supplier AND supplier.id_users=u.id_users AND supplier.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('p.id_faktur', $id_faktur);
        $this->datatables->add_column('action', anchor(site_url('outlet/pembelian_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pembelian_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pembelian');
        $this->datatables->group_by('p.id_pembelian');
        return $this->datatables->generate();
    }

    // datatables
    function json_faktur_produksi($id_toko, $id_faktur) {
        $this->datatables->select('p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, produk_retail.nama_produk, supplier.nama_supplier');
        $this->datatables->from('pembelian p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('produk_retail', 'p.id_produk=produk_retail.id_produk_2 AND produk_retail.id_users=u.id_users AND produk_retail.id_toko=p.id_toko');
        $this->datatables->join('supplier', 'p.id_supplier=supplier.id_supplier AND supplier.id_users=u.id_users AND supplier.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('p.id_faktur', $id_faktur);
        $this->datatables->add_column('action', anchor(site_url('produksi/pembelian_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pembelian_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pembelian');
        $this->datatables->group_by('p.id_pembelian');
        return $this->datatables->generate();
    }

    function json_by_expire($id_toko, $tgl_expire)
    {
        $this->datatables->select('pr.id_produk_2,p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, pr.nama_produk, s.nama_supplier, fr.no_faktur');
        $this->datatables->from($this->table.' p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->datatables->join('supplier s', 'p.id_supplier=s.id_supplier AND s.id_users=u.id_users AND s.id_toko=p.id_toko');
        $this->datatables->join('faktur_retail fr', 'p.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('DATE(CONCAT(SUBSTRING(p.tgl_expire,7,4),"-",SUBSTRING(p.tgl_expire,4,2),"-",SUBSTRING(p.tgl_expire,1,2))) <= ', $tgl_expire);
        $this->datatables->add_column('action', anchor(site_url('outlet/pembelian_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_pembelian');
        $this->datatables->group_by('p.id_pembelian');
        return $this->datatables->generate();
    }

    function json_by_expire_produksi($id_toko, $tgl_expire)
    {
        $this->datatables->select('pr.id_produk_2,p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, pr.nama_produk, s.nama_supplier, fr.no_faktur');
        $this->datatables->from($this->table.' p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->datatables->join('supplier s', 'p.id_supplier=s.id_supplier AND s.id_users=u.id_users AND s.id_toko=p.id_toko');
        $this->datatables->join('faktur_retail fr', 'p.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=p.id_toko');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('DATE(CONCAT(SUBSTRING(p.tgl_expire,7,4),"-",SUBSTRING(p.tgl_expire,4,2),"-",SUBSTRING(p.tgl_expire,1,2))) <= ', $tgl_expire);
        $this->datatables->add_column('action', anchor(site_url('produksi/pembelian_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id_pembelian');
        $this->datatables->group_by('p.id_pembelian');
        return $this->datatables->generate();
    }

    function get_by_search($id_toko, $term, $tgl)
    {
        $this->db->select('pr.barcode,pr.id_produk_2,p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, pr.nama_produk, s.nama_supplier, fr.no_faktur');
        $this->db->from($this->table.' p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->db->join('supplier s', 'p.id_supplier=s.id_supplier AND s.id_users=u.id_users AND s.id_toko=p.id_toko', 'left');
        $this->db->join('faktur_retail fr', 'p.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->like('nama_produk', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->or_like('barcode', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->group_by('p.id_pembelian');
        $this->db->limit(25);
        return $this->db->get()->result();
    }

    function get_by_search_produksi($id_toko, $term, $tgl)
    {
        $this->db->select('pr.barcode,pr.id_produk_2,p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, pr.nama_produk, s.nama_supplier, fr.no_faktur');
        $this->db->from($this->table.' p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->db->join('supplier s', 'p.id_supplier=s.id_supplier AND s.id_users=u.id_users AND s.id_toko=p.id_toko', 'left');
        $this->db->join('faktur_retail fr', 'p.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->like('nama_produk', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->or_like('barcode', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->group_by('p.id_pembelian');
        $this->db->limit(25);
        return $this->db->get()->result();
    }

    // get all
    function get_all()
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id, $id_toko)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id toko
    function get_by_id_toko($id_toko)
    {
        $this->db->select('p.*, supplier.nama_supplier, pr.nama_produk,fr.no_faktur');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->db->join('faktur_retail fr', 'p.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND fr.id_toko=p.id_toko');
        $this->db->join('supplier', 'p.id_supplier=supplier.id_supplier AND supplier.id_users=u.id_users AND supplier.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->group_by('p.id_pembelian');
        return $this->db->get()->result();
    }

    // get data by id produk
    function get_by_id_produk($id_produk, $id_toko)
    {
        $this->db->select('p.*, SUM(sp.stok) AS stok');
        $this->db->from('(SELECT p.*, u.id_cabang FROM pembelian p JOIN users u ON p.id_users=u.id_users AND p.id_toko=u.id_toko) AS p');
        $this->db->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND sp.id_toko=p.id_toko', "left");
        $this->db->where('p.id_produk', $id_produk);
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('p.id_cabang', $this->userdata->id_cabang);
        // FIFO //
        $this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) ASC'); 
        $this->db->order_by('p.id_pembelian', 'ASC');
        // FIFO //
        $this->db->group_by('p.id_pembelian');
        return $this->db->get()->result();
    }

    public function get_by_id_produk_penjualan($id_produk, $id_toko)
    {
        $this->db->select('p.*, SUM(sp.stok) AS stok');
        $this->db->from('(SELECT p.*, u.id_cabang FROM pembelian p JOIN users u ON p.id_users=u.id_users AND p.id_toko=u.id_toko) AS p');
        $this->db->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND sp.id_toko=p.id_toko');
        $this->db->where('p.id_produk', $id_produk);
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('p.id_cabang', $this->userdata->id_cabang);
        // $this->db->where('DATE(CONCAT(SUBSTRING(p.tgl_expire,7,4),"-",SUBSTRING(p.tgl_expire,4,2),"-",SUBSTRING(p.tgl_expire,1,2))) > "'.date('Y-m-d').'"');
        // FIFO //
        $this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) ASC'); 
        $this->db->order_by('p.id_pembelian', 'ASC');
        // FIFO //
        $this->db->group_by('sp.id');
        return $this->db->get()->result();
    }

    // get data by tgl_expire
    function get_by_tgl_expire($tgl_expire, $id_toko , $limit = '')
    {
        $this->db->select('p.*, f.no_faktur,pr.nama_produk');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('faktur_retail f', 'p.id_faktur=f.id_faktur AND f.id_users=u.id_users AND f.id_toko=p.id_toko');
        $this->db->join('produk_retail pr', 'pr.id_produk_2=p.id_produk AND pr.id_toko=p.id_toko');
        $this->db->join('supplier s', 's.id_supplier=p.id_supplier AND s.id_users=u.id_users AND s.id_toko=p.id_toko');
        $this->db->where("DATE(CONCAT(SUBSTRING(p.tgl_expire,7,4),'-',SUBSTRING(p.tgl_expire,4,2),'-',SUBSTRING(p.tgl_expire,1,2))) <= ", $tgl_expire);
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        if(!empty($order)){
            $this->db->order_by($order, 'desc');
        }
        return $this->db->get()->result();
    }

    // get data by no faktur
    function get_by_id_faktur($id_faktur, $id_toko)
    {
        $this->db->select('p.*');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('p.id_faktur', $id_faktur);
        $this->db->group_by('p.id_pembelian');
        return $this->db->get()->result();
    }

    // get data by id supplier
    function get_by_id_supplier($id_supplier, $id_toko)
    {
        $this->db->select('p.*');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('p.id_supplier', $id_supplier);
        $this->db->group_by('p.id_pembelian');
        return $this->db->get()->result();
    }

    // get by between date 
    function get_by_between_date($id_toko, $tgl1='', $tgl2='')
    {
        $this->db->select('p.*, supplier.nama_supplier, pr.nama_produk');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko=p.id_toko');
        $this->db->join('supplier', 'p.id_supplier=supplier.id_supplier AND supplier.id_users=u.id_users AND supplier.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where("DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),'-',SUBSTRING(p.tgl_masuk,4,2),'-',SUBSTRING(p.tgl_masuk,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
        $this->db->order_by("DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),'-',SUBSTRING(p.tgl_masuk,4,2),'-',SUBSTRING(p.tgl_masuk,1,2))) ASC");
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('tgl', $q);
    	$this->db->or_like('barcode', $q);
    	$this->db->or_like('nm_barang', $q);
    	$this->db->or_like('supplier', $q);
    	$this->db->or_like('harga_satuan', $q);
    	$this->db->or_like('jumlah', $q);
    	$this->db->or_like('total_bayar', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('tgl', $q);
    	$this->db->or_like('barcode', $q);
    	$this->db->or_like('nm_barang', $q);
    	$this->db->or_like('supplier', $q);
    	$this->db->or_like('harga_satuan', $q);
    	$this->db->or_like('jumlah', $q);
    	$this->db->or_like('total_bayar', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $data['id_toko'] = $this->userdata->id_toko;
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

/* End of file Pembelian_retail_model.php */
/* Location: ./application/models/Pembelian_retail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-01 06:05:21 */
/* http://harviacode.com */