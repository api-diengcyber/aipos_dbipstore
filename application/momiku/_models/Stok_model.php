<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	public function json($jenis = 0)
	{
		$this->datatables->select('pr.id_produk_2, pr.barcode, pr.id_toko, pr.id_users, pr.nama_produk, kp.nama_kategori, SUM(sp.stok) AS stok');
		$this->datatables->from('produk_retail pr');
		$this->datatables->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		$this->datatables->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND kp.id_users=u.id_users AND pr.id_toko=kp.id_toko');
		$this->datatables->join('pembelian b', 'pr.id_produk_2=b.id_produk AND b.id_users=u.id_users AND pr.id_toko=b.id_toko');
		$this->datatables->join('stok_produk sp', 'pr.id_produk_2=sp.id_produk AND sp.id_pembelian=sp.id_pembelian AND pr.id_toko=sp.id_toko');
		$this->datatables->where('pr.id_toko', $this->userdata->id_toko);
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
		$this->datatables->where('pr.jenis', $jenis);
		$this->datatables->group_by('pr.id_produk_2');
        return $this->datatables->generate();
	}

}

/* End of file Stok_model.php */
/* Location: ./application/models/Stok_model.php */