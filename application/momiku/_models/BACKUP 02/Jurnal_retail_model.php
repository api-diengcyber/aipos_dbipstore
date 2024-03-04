<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal_retail_model extends CI_Model {

    public $table = 'jurnal';
    public $id = 'id';
    public $id_toko = 'id_toko';
    public $id_akun = 'id_akun';
    public $kode = 'kode';
    public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
		
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get data by id toko
	function get_by_id_toko($id_toko)
	{
		$this->db->where($this->id_toko, $id_toko);
		return $this->db->get($this->table)->result();
	}

	// get data by between date
	function get_by_between_date($id_toko, $tgl1='', $tgl2='')
	{
		$this->db->where($this->id_toko, $id_toko);
		$this->db->where("DATE(CONCAT(SUBSTRING(tgl,7,4),'-',SUBSTRING(tgl,4,2),'-',SUBSTRING(tgl,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."' ");
		return $this->db->get($this->table)->result();
	}

	// get data by kode
	function get_by_kode($id_toko, $kode)
	{
		$panjang_kode = strlen($kode);
		$this->db->where($this->id_toko, $id_toko);
		$this->db->where('SUBSTRING(kode,1,'.$panjang_kode.')', $kode);
		return $this->db->get($this->table)->row();
	}

	// get data by id_akun
	function get_by_id_akun($id_toko, $id_akun)
	{
		$this->db->where($this->id_toko, $id_toko);
		$this->db->where($this->id_akun, $id_akun);
		return $this->db->get($this->table)->result();
	}

	// get kode baru
	function get_kode_baru($id_toko, $kode)
	{
		$panjang_kode = strlen($kode);
		$awalnomor = $panjang_kode+1;
		$cek_kode = $this->get_by_kode($id_toko, $kode);
		$hasil = '';
		if($cek_kode){
			// ada kode //
			$res = $this->db->select('kode, SUBSTRING(kode,'.$awalnomor.',10) AS nomor')
							->from($this->table)
							->where("SUBSTRING(kode,1,".$panjang_kode.")", $kode)
							->order_by('nomor', $this->order)
							->get()->row();
			$nomor_baru = $res->nomor+1;
			$hasil = $kode.$nomor_baru;
		} else {
			// tidak ada kode //
			$hasil = $kode."1";
		}
		return $hasil;
	}

	// insert
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

}

/* End of file Jurnal_retail_model.php */
/* Location: ./application/models/Jurnal_retail_model.php */