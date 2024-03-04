<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_retail_model extends CI_Model
{

    public $table = 'produk_retail';
    public $id = 'id_produk_2';
    public $barcode = 'barcode';
    public $nama_produk = 'nama_produk';
    public $id_toko = 'id_toko';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library("PHPExcel");
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json($id_toko) {
        $this->datatables->select('p.id_produk, p.id_produk_2, p.id_toko, p.barcode, p.id_kategori, p.nama_produk, p.deskripsi, p.harga_1, p.harga_2, p.harga_3, p.harga_4, p.harga_5, p.harga_6, p.harga_7, s.satuan, p.berat, p.mingros, p.diskon, p.rak, p.dibeli, p.gambar, k.nama_kategori, SUM(stok.stok) AS stok, b.harga_satuan AS harga_beli, sup.nama_supplier');
        $this->datatables->from('produk_retail p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=p.id_toko', 'left');
        $this->datatables->join('supplier sup', 'k.id_supplier=sup.id_supplier AND sup.id_users=u.id_users AND k.id_toko=sup.id_toko', 'left');
        $this->datatables->join('pembelian b', 'p.id_produk_2=b.id_produk AND b.id_users=u.id_users AND b.id_toko=p.id_toko', 'left');
        $this->datatables->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=b.id_pembelian AND stok.id_toko=p.id_toko', 'left');
        $this->datatables->join('satuan_produk s', 'p.satuan=s.id_satuan AND s.id_users=u.id_users AND s.id_toko=p.id_toko', 'left');
        $this->datatables->add_column('action', anchor(site_url('outlet/produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/produk_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/produk_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_produk_2');
        $this->datatables->add_column('read_action', anchor(site_url('outlet/produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>'), 'id_produk_2');
        $this->datatables->add_column('input_harga_beli', 'Rp <input type="number" class="text-right" name="harga_beli[]" id="harga_beli" data-id="$1" class="form-control" value="$2" maxlength="13" readonly >', 'id_produk_2, harga_satuan');
        $this->datatables->add_column('input_stok', '<input type="number" name="stok[]" id="stok" data-id="$1" class="form-control" style="width:50px;" value="$2" readonly >', 'id_produk_2, stok_total');
        $this->datatables->add_column('tambah_stok', '<input type="number" name="tambah_stok[]" id="tambah_stok" data-id="$1" class="input-sm" style="width:50px;" value="" maxlength="13">', 'id_produk_2');
        $this->datatables->add_column('btn_update', '<button type="button" id="btn_update" data-id="$1" class="btn btn-primary btn-xs" disabled>Update</button>', 'id_produk_2');
        $this->datatables->add_column('input_diskon', '<input type="number" name="diskon[]" class="form-control" style="width:50px;" value="$1" maxlength="13">%', 'diskon');       
        $this->datatables->add_column('hidden_id', '<input type="hidden" name="id_produk[]" class="form-control" value="$1">', 'id_produk_2');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        // $this->datatables->where('u.level', 3);
        $this->datatables->group_by('p.id_produk_2');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi($id_toko) {
        $this->datatables->select('p.id_produk, p.id_produk_2, p.id_toko, p.barcode, p.id_kategori, p.nama_produk, p.deskripsi, p.harga_1, p.harga_2, p.harga_3, p.harga_4, p.harga_5, p.harga_6, p.harga_7, s.satuan, p.berat, p.mingros, p.diskon, p.rak, p.dibeli, p.gambar, k.nama_kategori, SUM(stok.stok) AS stok, b.harga_satuan AS harga_beli, sup.nama_supplier');
        $this->datatables->from('produk_retail p');
        $this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->datatables->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=p.id_toko', 'left');
        $this->datatables->join('supplier sup', 'k.id_supplier=sup.id_supplier AND sup.id_users=u.id_users AND k.id_toko=sup.id_toko', 'left');
        $this->datatables->join('pembelian b', 'p.id_produk_2=b.id_produk AND b.id_users=u.id_users AND b.id_toko=p.id_toko', 'left');
        $this->datatables->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=b.id_pembelian AND stok.id_toko=p.id_toko', 'left');
        $this->datatables->join('satuan_produk s', 'p.satuan=s.id_satuan AND s.id_users=u.id_users AND s.id_toko=p.id_toko', 'left');
        $this->datatables->add_column('action', anchor(site_url('produksi/produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/produk_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/produk_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_produk_2');
        $this->datatables->add_column('read_action', anchor(site_url('produksi/produk_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>'), 'id_produk_2');
        $this->datatables->add_column('input_harga_beli', 'Rp <input type="number" class="text-right" name="harga_beli[]" id="harga_beli" data-id="$1" class="form-control" value="$2" maxlength="13" readonly >', 'id_produk_2, harga_satuan');
        $this->datatables->add_column('input_stok', '<input type="number" name="stok[]" id="stok" data-id="$1" class="form-control" style="width:50px;" value="$2" readonly >', 'id_produk_2, stok_total');
        $this->datatables->add_column('tambah_stok', '<input type="number" name="tambah_stok[]" id="tambah_stok" data-id="$1" class="input-sm" style="width:50px;" value="" maxlength="13">', 'id_produk_2');
        $this->datatables->add_column('btn_update', '<button type="button" id="btn_update" data-id="$1" class="btn btn-primary btn-xs" disabled>Update</button>', 'id_produk_2');
        $this->datatables->add_column('input_diskon', '<input type="number" name="diskon[]" class="form-control" style="width:50px;" value="$1" maxlength="13">%', 'diskon');       
        $this->datatables->add_column('hidden_id', '<input type="hidden" name="id_produk[]" class="form-control" value="$1">', 'id_produk_2');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        // $this->datatables->where('u.level', 2);
        $this->datatables->group_by('p.id_produk_2');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->order_by('pr.id_produk_2', $this->order);
        $this->db->group_by('pr.id_produk_2');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id, $id_toko)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.id_produk_2', $id);
        return $this->db->get()->row();
    }

    // get data by id produk
    function get_by_id_produk($id, $id_toko)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.id_produk_2', $id);
        return $this->db->get()->row();
    }

    // get data by barcode
    function get_by_barcode($barcode, $id_toko)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.barcode', $barcode);
        return $this->db->get()->row();
    }

    // get data by barcode
    function get_by_barcode_all($barcode, $id_toko)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.barcode', $barcode);
        return $this->db->get()->row();
    }

    // get data by barcode 2
    function get_by_barcode2($barcode)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.barcode', $barcode);
        return $this->db->get()->row();
    }

    // get data by barcode
    function get_by_nama_barang($nama_produk, $id_toko)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.nama_produk', $nama_produk);
        return $this->db->get()->row();
    }
    
    // get data by id toko
    function get_by_id_toko($id_toko)
    {
        $this->db->select('p.*, s.satuan AS satuan_produk, k.nama_kategori, stok.stok as stok');
        $this->db->from('produk_retail p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('satuan_produk s', 'p.satuan = s.id_satuan AND s.id_users=u.id_users AND s.id_toko=p.id_toko','left');
        $this->db->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=p.id_toko','left');
        $this->db->join('pembelian b', 'b.id_produk=p.id_produk_2 AND b.id_users=u.id_users AND b.id_toko=p.id_toko', 'left');
        $this->db->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_toko=p.id_toko AND stok.id_pembelian=b.id_pembelian', 'left');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->group_by('p.id_produk_2');
        $this->db->order_by('p.id_toko', $this->order);
        $this->db->limit(20);
        return $this->db->get()->result();
    }
    
    // get data by id toko
    function get_by_id_toko_produksi($id_toko)
    {
        $this->db->select('p.*, s.satuan AS satuan_produk, k.nama_kategori, stok.stok as stok');
        $this->db->from('produk_retail p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('satuan_produk s', 'p.satuan = s.id_satuan AND s.id_users=u.id_users AND s.id_toko=p.id_toko','left');
        $this->db->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=p.id_toko','left');
        $this->db->join('pembelian b', 'b.id_produk=p.id_produk_2 AND b.id_users=u.id_users AND b.id_toko=p.id_toko', 'left');
        $this->db->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_toko=p.id_toko AND stok.id_pembelian=b.id_pembelian','left');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->group_by('p.id_produk_2');
        $this->db->order_by('p.id_toko', $this->order);
        $this->db->limit(20);
        return $this->db->get()->result();
    }
    
    // get data by id toko
    function get_all_by_id_toko($id_toko)
    {
        $this->db->select('p.*, s.satuan AS satuan_produk, k.nama_kategori, stok.stok as stok');
        $this->db->from('produk_retail p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('satuan_produk s', 'p.satuan = s.id_satuan AND s.id_users=u.id_users AND s.id_toko=p.id_toko','left');
        $this->db->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=p.id_toko','left');
        $this->db->join('pembelian beli', 'p.id_produk_2=beli.id_produk AND beli.id_users=u.id_users AND beli.id_toko=p.id_toko','left');
        $this->db->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=beli.id_pembelian AND stok.id_toko=p.id_toko','left');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->order_by('p.nama_produk', 'asc');
        $this->db->order_by('p.id_toko', $this->order);
        $this->db->group_by('p.id_produk_2');
        return $this->db->get()->result();
    }
    
    // get data by per kategori
    function get_by_per_kategori($id_toko, $id_kategori)
    {
        $this->db->select('p.*, s.satuan AS satuan_produk, k.nama_kategori, SUM(stok.stok) as stok');
        $this->db->from('produk_retail p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('satuan_produk s', 'p.satuan=s.id_satuan AND s.id_users=u.id_users AND s.id_toko=p.id_toko','left');
        $this->db->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=p.id_toko','left');
        $this->db->join('pembelian beli', 'p.id_produk_2=beli.id_produk AND beli.id_users=u.id_users AND beli.id_toko=p.id_toko','left');
        $this->db->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=beli.id_pembelian AND stok.id_toko=p.id_toko','left');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('k.id_kategori_2', $id_kategori);
        $this->db->group_by('p.id_produk_2');
        $this->db->order_by('p.id_toko', $this->order);
        return $this->db->get()->result();
    }

    // get data by nama produk
    function get_by_produk($nama_produk, $id_toko)
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('pr.nama_produk', $nama_produk);
        return $this->db->get()->row();
    }

    // get data by stok 0
    function get_by_stok_mati()
    {
        $this->db->select('p.*, s.satuan AS satuan_produk');
        $this->db->from('produk_retail p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('satuan_produk s', 'p.satuan=s.id_satuan AND s.id_users=p.id_users AND s.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->where('p.stok', '0');
        $this->db->where('p.stok', '');
        $this->db->group_by('p.id_produk_2');
        return $this->db->get()->result();
    }

    // get data by search
    function get_by_search($id_toko, $term, $tgl='', $jenis='')
    {
        $this->db->select('pr.*');
        $this->db->from($this->table.' pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->like('pr.nama_produk', $term, 'BOTH');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        if ($jenis == 'bahan') {
            $this->db->where('pr.jenis <> 0');
        } else {
            $this->db->where('pr.jenis', 0);
        }
        // $this->db->where('u.level', 2);
        // $this->db->where('pr.jenis', 0);
        $this->db->or_like('pr.barcode', $term, 'BOTH');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        if($jenis == 'bahan'){
            $this->db->where('pr.jenis <> 0');
        } else {
            $this->db->where('pr.jenis', 0);
        }
        // $this->db->where('u.level', 2);
        $this->db->group_by('pr.id_produk_2');
        $this->db->limit(25);
        return $this->db->get()->result();
    }

    function get_popular_produk(){
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        }
        $this->db->order_by('pr.dibeli', 'desc');
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_produk_2', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('barcode', $q);
    	$this->db->or_like('id_kategori', $q);
    	$this->db->or_like('id_supplier', $q);
    	$this->db->or_like('nama_produk', $q);
    	$this->db->or_like('deskripsi', $q);
    	$this->db->or_like('harga', $q);
    	$this->db->or_like('harga_grosir', $q);
    	$this->db->or_like('harga_pokok', $q);
    	$this->db->or_like('stok', $q);
    	$this->db->or_like('satuan', $q);
    	$this->db->or_like('berat', $q);
    	$this->db->or_like('mingros', $q);
    	$this->db->or_like('diskon', $q);
    	$this->db->or_like('tgl_masuk', $q);
    	$this->db->or_like('tgl_expire', $q);
    	$this->db->or_like('rak', $q);
    	$this->db->or_like('dibeli', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_produk_2', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('barcode', $q);
    	$this->db->or_like('id_kategori', $q);
    	$this->db->or_like('id_supplier', $q);
    	$this->db->or_like('nama_produk', $q);
    	$this->db->or_like('deskripsi', $q);
    	$this->db->or_like('harga', $q);
    	$this->db->or_like('harga_grosir', $q);
    	$this->db->or_like('harga_pokok', $q);
    	$this->db->or_like('stok', $q);
    	$this->db->or_like('satuan', $q);
    	$this->db->or_like('berat', $q);
    	$this->db->or_like('mingros', $q);
    	$this->db->or_like('diskon', $q);
    	$this->db->or_like('tgl_masuk', $q);
    	$this->db->or_like('tgl_expire', $q);
    	$this->db->or_like('rak', $q);
    	$this->db->or_like('dibeli', $q);
    	$this->db->or_like('gambar', $q);
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
        $row = $this->get_by_id($id, $this->userdata->id_toko);
        if ($row) {
            $this->db->where('id_toko', $row->id_toko);
            $this->db->where('id_produk', $row->id_produk);
            $this->db->update($this->table, $data);
        }
    }

    // update data by barcode
    function update_by_barcode($barcode, $data)
    {
        $row = $this->get_by_barcode($barcode, $this->userdata->id_toko);
        if ($row) {
            $this->db->where('id_toko', $row->id_toko);
            $this->db->where('id_produk', $row->id_produk);
            $this->db->update($this->table, $data);
        }
    }

    // delete data
    function delete($id)
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
        $this->db->query('DELETE t1 FROM produk_retail t1 INNER JOIN users u ON t1.id_users=u.id_users AND t1.id_toko=u.id_toko WHERE t1.id_toko="'.$this->userdata->id_toko.'" AND u.id_cabang="'.$this->userdata->id_cabang.'" AND t1.id_produk_2="'.$id.'"');
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
    }

    function import_excel($file_input, $id_toko)
    {
        ini_set('memory_limit', '-1');
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($file_input);      
        } catch (Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }
        $totalrows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
        $ins = array();
        $t = 0;
        for($i=2;$i<=$totalrows;$i++)
        {
            $barcode = $objWorksheet->getCellByColumnAndRow(1, $i)->getValue();
            $ins[$t] = array(
                "id_toko" => $id_toko,
                "id_users" => $this->userdata->id_users,
                "barcode"  => $barcode,
                "id_kategori"  => $objWorksheet->getCellByColumnAndRow(2, $i)->getValue(),
                "nama_produk" => $objWorksheet->getCellByColumnAndRow(3, $i)->getValue(),
                "deskripsi" => $objWorksheet->getCellByColumnAndRow(4, $i)->getValue(),
                "harga_1" => $objWorksheet->getCellByColumnAndRow(5, $i)->getValue(),
                "harga_2" => $objWorksheet->getCellByColumnAndRow(6, $i)->getValue(),
                "harga_3" => $objWorksheet->getCellByColumnAndRow(7, $i)->getValue(),
                "satuan" => $objWorksheet->getCellByColumnAndRow(9, $i)->getValue(),
                "mingros" => $objWorksheet->getCellByColumnAndRow(10, $i)->getValue(),
                "diskon" => $objWorksheet->getCellByColumnAndRow(11, $i)->getValue(),
            );
            $row = $this->get_by_barcode($barcode, $this->userdata->id_toko);
            if ($row) {
                $this->db->where('id_produk', $row->id_produk);
                $this->db->update('produk_retail', $ins[$t]);
            } else {
                $this->db->insert('produk_retail', $ins[$t]);
            }
            $t++;
        }
        return $ins;
    }

    function import_temp_excel($file_input, $id_toko)
    {
        ini_set('memory_limit', '-1');
        try {
            $objPHPExcel= PHPExcel_IOFactory::load($file_input);      
        } catch(Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }
        $totalrows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
        $ins = array();
        $t = 0;
        for($i=2;$i<=$totalrows;$i++)
        {
            $barcode = mt_rand(100000, 999999).date("is");
            $nama_produk = $objWorksheet->getCellByColumnAndRow(2, $i)->getValue();
            $kategori = $objWorksheet->getCellByColumnAndRow(3, $i)->getValue();
            $harga_1 = $objWorksheet->getCellByColumnAndRow(4, $i)->getValue();
            $harga_2 = $objWorksheet->getCellByColumnAndRow(5, $i)->getValue();
            $harga_3 = $objWorksheet->getCellByColumnAndRow(6, $i)->getValue();
            $hpp = $objWorksheet->getCellByColumnAndRow(7, $i)->getValue();
            $stok = $objWorksheet->getCellByColumnAndRow(8, $i)->getValue();
            $ins[$t] = array(
                "id_temp" => $t,
                "id_toko" => $id_toko,
                "barcode"  => $barcode,
                "nama_produk" => $nama_produk,
                "kategori" => $kategori,
                "harga_1" => $harga_1*1,
                "harga_2" => $harga_2*1,
                "harga_3" => $harga_3*1,
                "hpp" => $hpp*1,
                "stok" => $stok*1,
                "status" => '0',
            );
            $this->db->insert('produk_retail_temp', $ins[$t]);
            $t++;
        }
        return $ins;
    }

    // TOUCHSCREEN
    function get_data_kat($start,$limit,$data_login){
        $data = $this->db->where('id_toko', $this->userdata->id_toko)->get('kategori_produk');
        $data_limit = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_kategori', 'asc')->limit($limit,$start)->get('kategori_produk');
        $total_rows = $data->num_rows();
        $status_rows = $total_rows - $start;
        if($status_rows < $limit && $status_rows > 0){
            $limit = $status_rows;
            $dt = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_kategori', 'asc')->limit($limit,$start)->get('kategori_produk')->result();
            return $data = array('kategori'=>$dt,'total'=>$total_rows);
        }
        else {
            return $data = array('kategori'=>$data_limit->result(),'total'=>$total_rows);
        }
    }

    function get_data_prod($start,$limit,$id_kategori,$id_toko){
       $id_toko = $this->userdata->id_toko;
       $qry     = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_opsi',1)->get('opsi')->row();
       $status  = $qry->opsi;
       $data    = $this->query_dat_produk(false,'','',$id_kategori,$status);
       $data_limit  = $this->query_dat_produk(true,$start,$limit,$id_kategori,$status);
       $total_rows  = count($data);
       $status_rows = $total_rows - $start;
       if($status_rows < $limit && $status_rows > 0){
            $limit = $status_rows;
            $dt    = $this->query_dat_produk(true,$start,$limit,$id_kategori,$status);
            return $data = array('produk'=>$dt,'total'=>$total_rows);
        }
        else {
            return $data = array('produk'=>$data_limit,'total'=>$total_rows);
        }
    }
    function query_dat_produk($status,$start,$limit,$id_kategori,$status_opsi){
        $id_toko = $this->userdata->id_toko;
        $opsi    = '';
        if ($status_opsi == 1 || $status == 2) {
          $opsi = '';
        } else {
          $opsi = ' and sk.stok > 0';
        }
        $this->db->select('pr.*,k.nama_kategori');
        $this->db->from('produk_retail pr');
        $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
        $this->db->join('kategori_produk k','pr.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko=pr.id_toko');
        $this->db->join('pembelian b', 'b.id_produk=pr.id_produk_2 AND b.id_users=u.id_users AND b.id_toko=pr.id_toko', 'left');
        $this->db->join('stok_produk sk','pr.id_produk_2=sk.id_produk AND sk.id_toko=pr.id_toko'.$opsi);
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('pr.id_kategori',$id_kategori);
        if ($status == true) {
            $this->db->limit($limit,$start);
        }
        $this->db->order_by('pr.nama_produk', 'ASC');
        return $this->db->group_by('nama_produk')->get()->result();
    }
    // END TOUCH SCREEN
    
    // get data by faktur
    function get_by_id_faktur($id_toko, $id_faktur)
    {
        $this->db->select('p.*, b.id_faktur');
        $this->db->from('pembelian b');
        $this->db->join('users u', 'b.id_users=u.id_users AND b.id_toko=u.id_toko');
        $this->db->join('produk_retail p', 'b.id_produk=p.id_produk_2 AND p.id_users=u.id_users AND p.id_toko=b.id_toko');
        $this->db->where('b.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_users', $this->userdata->id_users);
        $this->db->where('b.id_faktur', $id_faktur);
        $this->db->group_by('b.id_produk');
        return $this->db->get()->result();
    }

}

/* End of file Produk_retail_model.php */
/* Location: ./application/models/Produk_retail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-26 06:49:27 */
/* http://harviacode.com */