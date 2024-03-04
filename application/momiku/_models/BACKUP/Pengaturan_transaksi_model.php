<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_transaksi_model extends CI_Model {

	public $table = 'pengaturan_transaksi';

	function __construct()
	{
		parent::__construct();
		$this->load->model('Jurnal_retail_model');
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	public function get_by_menu($menu)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('menu_proses', $menu);
		return $this->db->get()->row();
	}

	public function get_kode_by_menu($menu)
	{
		$this->db->select('*');
		$this->db->from('kode_transaksi');
		$this->db->where('var!=', '');
		$this->db->where('menu_proses', $menu);
		$this->db->order_by('kode', 'asc');
		return $this->db->get()->result();
	}

	public function testing($jenis, $string)
	{
		error_reporting(0);
		$text = $string;
		$res_kode = $this->get_kode_by_menu($jenis);
		$string_var = "";
		$string = str_replace('$', '(r)', $string);
		foreach ($res_kode as $key):
			$string_var .= $key->var." = null;";
			$string = str_replace("@".$key->kode.":", $key->var, $string);
		endforeach;
		$string = $this->toReplace($string, true);
		$r = eval($string_var.$string);
		return (Object) array(
			'status' => $r,
			'text' => $text,
		);
	}

	public $jenis = "";
	public $kodejurnal = "";
	public $ketjurnal = "";
	public $tgl = "";
	public $nofaktur = "";
	public $idproses = "";
	public $idhutang = "";
	public $idpiutang = "";

	private function toReplace($string, $trial = false)
	{
		$v = '$this->Pengaturan_transaksi_model->';
		$string = str_replace('@TANGGAL:', $v.'tgl', $string);
		$string = str_replace('@KODEJURNAL:', $v.'kodejurnal', $string);
		$string = str_replace('@NOFAKTUR:', $v.'nofaktur', $string);
		$string = str_replace('@IDPROSES:', $v.'idproses', $string);
		$string = str_replace('@IDHUTANG:', $v.'idhutang', $string);
		$string = str_replace('@IDPIUTANG:', $v.'idpiutang', $string);
		$string = str_replace('@KETJURNAL:', $v.'ketjurnal', $string);
		if ($trial==false) {
			$string = str_replace('@GETACCOUNTFROMID:(', $v.'get_akun_by_id(', $string);
			$string = str_replace('@DEBET:(', $v.'proses_debet(', $string);
			$string = str_replace('@KREDIT:(', $v.'proses_kredit(', $string);
		} else {
			$string = str_replace('@GETACCOUNTFROMID:(', $v.'proses_empty(', $string);
			$string = str_replace('@DEBET:(', $v.'proses_empty(', $string);
			$string = str_replace('@KREDIT:(', $v.'proses_empty(', $string);
		}
		return $string;
	}
	
	public $gen_kode = '';

	public function accounting($jenis)
	{
		$this->tgl = date('d-m-Y');
		$this->gen_kode = '';
		$string = "";
		$row = $this->get_by_menu($jenis);
		if ($row) {
			$this->jenis = $jenis;
			$string = $row->kode;
			$string = str_replace('$', '(r)', $string);
			$res_kode = $this->get_kode_by_menu($jenis);
			foreach ($res_kode as $key):
				$string = str_replace("@".$key->kode.":", $key->var, $string);
			endforeach;
			$string = $this->toReplace($string);
		}
		return $string;
	}

	public function generate_kode($kode)
	{
		$kode = htmlentities($kode);
		$pjg_kode = strlen($kode);
		if (empty($this->gen_kode)) {
			$row_last_jurnal = $this->db->where('SUBSTRING(kode, 1, '.$pjg_kode.')=', $kode)
										->order_by('DATE(CONCAT(SUBSTRING(tgl,7,4),"-",SUBSTRING(tgl,4,2),"-",SUBSTRING(tgl,1,2))) desc')
										->order_by('id', 'desc')
										->get('jurnal')->row();
			if ($row_last_jurnal) {
				$num = str_replace($kode.'-', '', $row_last_jurnal->kode)*1;
			} else {
				$num = 0;
			}
			$newkode = $kode.'-'.($num+1);
			$this->gen_kode = $newkode;
		} else {
			$newkode = $this->gen_kode;
		}
		return $newkode;
	}

	public function proses_debet($kode_akun, $nominal)
	{
		$row_akun = $this->db->where('kode', $kode_akun)->get('akun')->row();
		if ($row_akun) {
			$kode = strtoupper($this->jenis);
			if (!empty($this->kodejurnal)) {
				$kode = $this->kodejurnal;
			}
	 		$data_array = array(
	 			'id_toko' => $this->userdata->id_toko,
	 			'kode' => $this->generate_kode($kode),
	 			'tgl' => $this->tgl,
	 			'id_proses' => $this->idproses,
	 			'id_hutang' => $this->idhutang,
	 			'id_piutang' => $this->idpiutang,
	 			'no_faktur' => $this->nofaktur,
	 			'id_akun' => $row_akun->id,
	 			'debet' => $nominal*1,
	 			'kredit' => 0,
	 			'keterangan' => $this->ketjurnal
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
		}
	}

	public function proses_kredit($kode_akun, $nominal)
	{
		$row_akun = $this->db->where('kode', $kode_akun)->get('akun')->row();
		if ($row_akun) {
			$kode = strtoupper($this->jenis);
			if (!empty($this->kodejurnal)) {
				$kode = $this->kodejurnal;
			}
	 		$data_array = array(
	 			'id_toko' => $this->userdata->id_toko,
	 			'kode' => $this->generate_kode($kode),
	 			'tgl' => $this->tgl,
	 			'id_proses' => $this->idproses,
	 			'id_hutang' => $this->idhutang,
	 			'id_piutang' => $this->idpiutang,
	 			'no_faktur' => $this->nofaktur,
	 			'id_akun' => $row_akun->id,
	 			'debet' => 0,
	 			'kredit' => $nominal*1,
	 			'keterangan' => $this->ketjurnal
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
		}
	}

	public function proses_empty($kode_akun, $nominal)
	{
		return null;
	}

	public function get_akun_by_id($jenis, $id)
	{
		$row = $this->db->where('parent!=', '')
						->where('uid!=', '')
						->where('parent', $jenis)
						->where('uid', $id)
						->get('akun')->row();
		if ($row) {
			return $row->kode;
		} else {
			return null;
		}
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

}

/* End of file Pengaturan_transaksi_model.php */
/* Location: ./application/models/Pengaturan_transaksi_model.php */