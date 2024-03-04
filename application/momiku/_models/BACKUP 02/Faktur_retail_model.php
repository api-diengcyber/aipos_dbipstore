<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faktur_retail_model extends CI_Model {

	public $table = "faktur_retail";
	public $id = "id";
	public $id_toko = "id_toko";
	public $no_faktur = "no_faktur";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hutang_retail_model');
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	function get_by_id_faktur($id_faktur,$id_toko = ''){
		$this->db->where('id_faktur', $id_faktur);
		// if(!empty($id_toko)){
		// $this->db->where('id_toko', $id_toko);
		// }
		return $this->db->get($this->table)->row();
	}

	function get_by_id_toko($id_toko='',$deadline='',$status='',$opsi='')
	{
		$this->db->select('*, fr.id as id, fr.id_faktur as id_faktur, h.bayar, fr.tgl AS tgl_faktur');
		$this->db->from('faktur_retail fr');
		$this->db->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko');
		$this->db->join('supplier s', 'fr.id_supplier=s.id_supplier AND s.id_users=u.id_users AND s.id_toko=fr.id_toko', 'left');
		$this->db->join('hutang h', 'fr.id_faktur=h.id_faktur AND h.id_users=u.id_users AND h.id_toko=s.id_toko', 'left');
		$this->db->where('fr.id_supplier > 0');
		$this->db->where('fr.id_toko', $this->userdata->id_toko);
		$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		if (!empty($deadline)) {
			if ($status == 1) {
			$this->db->where('DATE(CONCAT(SUBSTRING(fr.deadline,7,4),"-",SUBSTRING(fr.deadline,4,2),"-",SUBSTRING(fr.deadline,1,2))) <= "'.$deadline.'" AND DATE(CONCAT(SUBSTRING(fr.deadline,7,4),"-",SUBSTRING(fr.deadline,4,2),"-",SUBSTRING(fr.deadline,1,2))) > "'.date('Y-m-d').'"');
			} else if($status == 2) {
			$this->db->where('DATE(CONCAT(SUBSTRING(fr.deadline,7,4),"-",SUBSTRING(fr.deadline,4,2),"-",SUBSTRING(fr.deadline,1,2))) < "'.$deadline.'"');
			}
		}
		// opsi pembayaran kredit
		if ($opsi == 1) {
			$this->db->where('fr.pembayaran', 1);
		}
		$this->db->order_by('fr.id', 'desc');
		$this->db->group_by('fr.id');
		return $this->db->get()->result();
	}

	function get_all_by_id_toko($id_toko = '', $deadline='', $status='', $opsi=''){
		$output = array();
		$data_faktur = $this->get_by_id_toko($id_toko,$deadline,$status,$opsi);
		foreach ($data_faktur as $df) {
			$total = 0;
			$total_hutang = 0;
			$total_bayar = 0;
			$item = 0;
		    $data_transaksi = $this->db->select('p.*')
		    						   ->from('pembelian p')
		    						   ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
		    						   ->where('p.id_toko', $this->userdata->id_toko)
		    						   ->where('u.id_cabang', $this->userdata->id_cabang)
						        	   ->where('p.id_faktur', $df->id_faktur)
						        	   ->group_by('p.id_produk')
						        	   ->group_by('p.id_pembelian')
									   ->limit(50)
						        	   ->get()->result();
			foreach ($data_transaksi as $dt) {
				$item  += $dt->jumlah;
				if ($dt->pembayaran == 1) {
					$data_hutang = $this->Hutang_retail_model->get_by_id_faktur($dt->id_faktur);
					foreach ($data_hutang as $dh) {
						$total_hutang += $dh->kurang;
					}
				}
				$total += $dt->total_bayar+$dt->ppn;
			}

			$tot_hutang = $total_hutang;
			if($total_hutang > 0){
				$total_hutang -= $df->dp;
			}

			$output[] = (object)array(
				 'id'=>$df->id,
				 'id_faktur'=>$df->id_faktur,
				 'no_faktur'=>$df->no_faktur,
				 'tgl'=>$df->tgl,
				 'tgl_faktur'=>$df->tgl_faktur,
				 'nama_supplier'=>$df->nama_supplier,
				 'dp'=>$df->dp,
				 'deadline'=>$df->deadline,
				 'bayar'=>$df->bayar,
				 'pembayaran'=>$df->pembayaran,
				 'total'=> $total,
				 'total_hutang'=> $total_hutang,
				 'jml_produk'=>count($data_transaksi),
				 'jml_item'=>$item,
				 'tot_hutang'=>$tot_hutang
			);
		}
		return $output;
	}

	function get_all2_by_id_toko($id_toko = '',$deadline = ''){
		$output = array();
		$data_faktur = $this->get_by_id_toko($id_toko,$deadline);
		foreach ($data_faktur as $df) {

			$total = 0;
			$total_hutang = 0;
			$item = 0;
		    $data_transaksi = $this->db->where('id_toko', $this->userdata->id_toko)
						        	   ->where('id_faktur', $df->id_faktur)
						        	   ->get("pembelian")->result();
			//$data_transaksi = $this->Pembelian_retail_model->get_by_id_faktur($df->id_faktur, $id_toko); // data pembelian per faktur
			foreach ($data_transaksi as $dt) {
				$item  += $dt->jumlah;
				$total += $dt->total_bayar;
				if($dt->pembayaran == 2){
					$data_hutang = $this->Hutang_retail_model->get_by_id_faktur($dt->id_faktur);
					foreach ($data_hutang as $dh) {
						$total_hutang += $dh->kurang;
					}
				}
			}

			$tot_hutang = $total_hutang;
			if($total_hutang > 0){
				$total_hutang -= $df->dp;
			}

			$output[] = (object)array(
						 'id'=>$df->id,
						 'id_faktur'=>$df->id_faktur,
						 'no_faktur'=>$df->no_faktur,
						 'tgl'=>$df->tgl,
						 'nama_supplier'=>$df->nama_supplier,
						 'dp'=>$df->dp,
						 'deadline'=>$df->deadline,
						 'pembayaran'=>$df->pembayaran,
						 'total'=>$total,
						 'total_hutang'=>$total_hutang,
						 'jml_produk'=>count($data_transaksi),
						 'jml_item'=>$item,
						 'tot_hutang'=>$tot_hutang
						);
		}
		return $output;
	}
	function get_faktur_hari_ini(){
		$this->db->select('count(tgl) as count');
		$this->db->where('tgl', date('d-m-Y'));
		return $this->db->get('faktur_retail')->row();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

}

/* End of file Faktur_retail_model.php */
/* Location: ./application/models/Faktur_retail_model.php */