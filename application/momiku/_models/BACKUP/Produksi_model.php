<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produksi_model extends CI_Model {

	public $table = 'produksi';

	function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function json()
	{
		$this->datatables->select('p.id, p.id_toko, p.id_users, p.tgl, p.pengupasan_mulai, p.pengupasan_selesai, p.pengepresan_mulai, p.pengepresan_selesai, p.catatan');
		$this->datatables->from('produksi p');
		$this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->add_column('action', anchor(site_url('produksi/produksi/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/produksi/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id');
        // ."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/produksi/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')
        return $this->datatables->generate();
	}

    function get_produk_search($term, $tgl)
    {
        $this->db->select('pr.barcode,pr.id_produk_2,p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, pr.nama_produk, supplier.nama_supplier, faktur_retail.no_faktur');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_toko=p.id_toko');
        $this->db->join('supplier', 'p.id_supplier=supplier.id_supplier AND supplier.id_toko=p.id_toko', 'left');
        $this->db->join('faktur_retail', 'p.id_faktur=faktur_retail.id_faktur AND faktur_retail.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('u.level', 2);
        $this->db->where('pr.jenis', 0);
        $this->db->like('nama_produk', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('u.level', 2);
        $this->db->where('pr.jenis', 0);
        $this->db->or_like('barcode', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('u.level', 2);
        $this->db->where('pr.jenis', 0);
        $this->db->limit(25);
        return $this->db->get()->result();
    }

    function get_bahan_search($term, $tgl)
    {
        $this->db->select('pr.barcode,pr.id_produk_2,p.id, p.id_pembelian, p.id_toko, p.id_faktur, p.id_produk, p.tgl_masuk, p.tgl_expire, p.id_supplier, p.pembayaran, p.harga_satuan,jumlah, p.total_bayar, pr.nama_produk, supplier.nama_supplier, faktur_retail.no_faktur');
        $this->db->from('pembelian p');
        $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
        $this->db->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND pr.id_toko=p.id_toko');
        $this->db->join('supplier', 'p.id_supplier=supplier.id_supplier AND supplier.id_toko=p.id_toko', 'left');
        $this->db->join('faktur_retail', 'p.id_faktur=faktur_retail.id_faktur AND faktur_retail.id_toko=p.id_toko');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('u.level', 2);
        $this->db->where('pr.jenis', 1);
        $this->db->like('nama_produk', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('u.level', 2);
        $this->db->where('pr.jenis', 1);
        $this->db->or_like('barcode', $term, 'BOTH');
        $this->db->where('p.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        $this->db->where('u.level', 2);
        $this->db->where('pr.jenis', 1);
        $this->db->limit(25);
        return $this->db->get()->result();
    }

}

/* End of file Produksi_model.php */
/* Location: ./application/models/Produksi_model.php */