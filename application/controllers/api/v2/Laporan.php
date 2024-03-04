<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');
    }
    
    public function index()
    {
        
    }

    public function stok_produk() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();
		$this->load->model('Mutasi_stok_model');

        $limit = 100;
        $currPage = ($this->xjson->post('page') == 1)?0:$this->xjson->post('page');
        $start = $limit * $currPage;

        $query = $this->xjson->post('query');
        if(!empty($query) && $query != "null"){
        $this->db->where('pr.nama_produk LIKE "%'.$query.'%"');
        }

        $id_toko = $this->input->post('id_toko');
        
        $this->db->select('CONCAT("'.base_url('assets/gambar_produk/').'",gambar) as url_gambar,p.satuan as id_satuan,p.id_kategori,p.id_produk, p.id_produk_2, p.id_toko, p.barcode, p.id_kategori, p.nama_produk, p.deskripsi, p.harga_1, p.harga_2, p.harga_3, s.satuan, p.berat, p.mingros, p.diskon, p.rak, p.dibeli, p.gambar, k.nama_kategori, b.harga_satuan, b.jumlah, b.harga_satuan AS harga_beli, '.$this->Mutasi_stok_model->select_stok_mutasi());
        $this->db->from('produk_retail p');
        $this->db->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_toko="'.$id_toko.'"','left');
        $this->db->join('pembelian b', 'p.id_produk_2=b.id_produk AND b.id_toko="'.$id_toko.'"','left');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $id_toko, null, 'p.id_produk_2');
        // $this->db->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=b.id_pembelian AND stok.id_toko="'.$id_toko.'"','left');
        $this->db->join('satuan_produk s', 'p.satuan=s.id_satuan AND s.id_toko="'.$id_toko.'"','left');
        $this->db->where('p.id_toko', $id_toko);
        $this->db->group_by('p.id_produk_2');
        $this->db->limit($limit,$start);
        $data = $this->db->get()->result();

        // $this->db->select('pr.*, sp.satuan AS satuan_produk, SUM(stok.stok) AS stok,b.harga_satuan,k.nama_kategori');
        // $this->db->from('produk_retail pr');
        // $this->db->join('stok_produk stok', 'pr.id_produk_2=stok.id_produk and stok.id_toko=pr.id_toko','left');
        // $this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan and sp.id_toko=pr.id_toko','left');
        // $this->db->join('kategori_produk k', 'pr.id_kategori=k.id_kategori_2 AND k.id_toko="'.$id_toko.'"','left');
        // $this->db->join('pembelian b', 'pr.id_produk_2=b.id_produk AND b.id_toko="'.$id_toko.'"','left');
        // $this->db->where('pr.id_toko', $this->xjson->post('id_toko'));
        // $this->db->group_by('stok.id_produk');
        
        // $data = $this->db->get()->result();

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();

    }

    public function stok_mati() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $limit = 100;
        $currPage = ($this->xjson->post('page') == 1)?0:$this->xjson->post('page');
        $start = $limit * $currPage;

        $query = $this->xjson->post('query');
        if(!empty($query) && $query != "null"){
        $this->db->where('produk_retail.nama_produk LIKE "%'.$query.'%"');
        }

        $data = $this->db->select('produk_retail.*, satuan_produk.satuan AS satuan_produk, SUM(stok_produk.stok) AS stok')
        ->from('produk_retail')
        ->join('stok_produk', 'produk_retail.id_produk_2=stok_produk.id_produk and stok_produk.id_toko = '.$this->xjson->post('id_toko'),'left')
        ->join('satuan_produk', 'produk_retail.satuan=satuan_produk.id_satuan and satuan_produk.id_toko = '.$this->xjson->post('id_toko'),'left')
        ->where('produk_retail.id_toko', $this->xjson->post('id_toko'))
        ->where('(SELECT SUM(stok) FROM stok_produk WHERE id_produk=produk_retail.id_produk_2) < 1')
        ->group_by('stok_produk.id_produk')
        ->limit($limit,$start)
        ->get()->result();

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();

    }

}

/* End of file Laporan.php */
    