<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_akuntansi_model extends CI_Model {

	public $table = 'pengaturan_akuntansi';
	public $id = 'id';
	public $id_toko = 'id_toko';
	public $kode = 'kode';
	public $order = 'ASC';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurnal_retail_model');
		
	}

	// get data by kode
	function get_by_kode($id_toko, $kode)
	{
		$this->db->where($this->id_toko, $id_toko);
		$this->db->where($this->kode, $kode);
		$this->db->order_by($this->kode, $this->order);
		return $this->db->get($this->table)->result();
	}

	// insert
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}



	/*
	 proses jurnal
	*/
	function insert_akuntansi($id_toko, $kode, $tgl, $id_proses, $debet, $kredit, $data=array())
	{
	 	//get last id jurnal 
	 	$row_last = $this->db->where('id_toko',$id_toko)->order_by('id','desc')->get('jurnal')->row();
	 	$id_last = 1;
	 	if(!empty($row_last)){
	 		$id_last = $row_last->id_jurnal;
	 	}

	 	$res = $this->get_by_kode($id_toko, $kode);
	 	foreach ($res as $key) {
	 		// debet //
	 		$data['id_jurnal'] = $id_last;
	 		$data['id_toko'] = $id_toko;
	 		$data['kode'] = $kode;
	 		$data['tgl'] = $tgl;
	 		$data['id_proses'] = $id_proses;
	 		$data['id_akun'] = 0;
	 		$data['debet'] = 0;
	 		$data['kredit'] = 0;
	 		if($key->debet == "1"){
	 			$data['id_akun'] = $key->id_akun;
	 			$data['debet'] = $debet;
	 		}
	 		// kredit //
	 		if($key->kredit == "1"){   
	 			$data['id_akun'] = $key->id_akun;
	 			$data['kredit'] = $kredit;
	 		}
	 		
	 		$this->Jurnal_retail_model->insert($data);

	 	}
	 }

	 function insert_akuntansi_penjualan($id_toko, $kode, $tgl, $id_proses, $debet, $kredit, $data=array())
	 {
	 	$res = $this->get_by_kode($id_toko, $kode);
	 	foreach ($res as $key) {

	 		$data['id_toko'] = $id_toko;
	 		$data['kode'] = $kode;
	 		$data['tgl'] = $tgl;
	 		$data['id_proses'] = $id_proses;
	 		$id_akun = 0;
	 		$id_piutang = "";
	 		$no_faktur = $data["no_faktur"];
	 		$keterangan = $data["keterangan"];
	 		$s_debet = 0;
	 		$s_kredit = 0;

	 		if(!empty($data['id_piutang'])){
	 			$id_piutang = $data['id_piutang'];
	 		}

	 		if($key->level == "2"){
	 			// HPP //

	 			$hpp = $data["hpp"];
		 		// debet //
		 		if($key->debet == "1"){
		 			$id_akun = $key->id_akun;
		 			$s_debet = $hpp;
		 		}
		 		// kredit //
		 		if($key->kredit == "1"){   
		 			$id_akun = $key->id_akun;
		 			$s_kredit = $hpp;
		 		}
		 		
	 		} else {
	 			// UMUM //

		 		// debet //
		 		if($key->debet == "1"){
		 			$id_akun = $key->id_akun;
		 			$s_debet = $debet;
		 		}
		 		// kredit //
		 		if($key->kredit == "1"){   
		 			$id_akun = $key->id_akun;
		 			$s_kredit = $kredit;
		 		}
		 		
	 		}

	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => $kode,
	 			'tgl' => $tgl,
	 			'id_proses' => $id_proses,
	 			'id_akun' => $id_akun,
	 			'debet' => $s_debet,
	 			'kredit' => $s_kredit,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => $keterangan,
	 			'id_piutang' => $id_piutang,
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);

	 	}
	 }

	 public $id_akun_kas = 5;
	 public $id_akun_kas_besar = 67;

	 public function jurnal_penjualan_tunai($id_toko, $tgl_order, $id_orders, $no_faktur, $total, $hpp, $id_pembeli)
	 {		
	 		$ppn_nominal = $total*(10/100); 
	 		$total_ppn = $total+$ppn_nominal; 
	        // FAKTUR PAJAK PKP //
	        if ($id_pembeli*1!=0) {
	          $row_member = $this->db->select('*')
	                                 ->from('member')
	                                 ->where('id_toko', $id_toko)
	                                 ->where('id_member', $id_pembeli)
	                                 ->get()->row();
	          if ($row_member) {
	            if ($row_member->pkp!="1") {
	            	if ($row_member->persen_pajak > 0) {
				 		$ppn_nominal = $total*($row_member->persen_pajak/100); 
				 		$total_ppn = $total+$ppn_nominal; 
	            	} else {
				 		$ppn_nominal = 0; 
				 		$total_ppn = $total+$ppn_nominal; 
	            	}
	            }
		 		// PPN BARU [MARKETING] //
		 		$data_array = array(
		 			'id_toko' => $id_toko,
		 			'kode' => 'RT-PENJUALAN-TUNAI',
		 			'tgl' => $tgl_order,
		 			'id_proses' => $id_orders,
		 			'id_akun' => 75,
		 			'debet' => 0,
		 			'kredit' => $ppn_nominal,
		 			'no_faktur' => $no_faktur,
		 			'keterangan' => 'Penjualan Barang Bayar Tunai'
		 		);
		 		$this->Jurnal_retail_model->insert($data_array);
	          }
	        }
	 		// KAS //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-TUNAI',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => $this->id_akun_kas_besar,
	 			'debet' => $total_ppn,
	 			'kredit' => 0,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// PPN Keluaran //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-TUNAI',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '59',
	 			'debet' => 0,
	 			'kredit' => $ppn_nominal,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Penjualan //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-TUNAI',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '19',
	 			'debet' => 0,
	 			'kredit' => $total,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// HPP //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-TUNAI',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '44',
	 			'debet' => $hpp,
	 			'kredit' => 0,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Persediaan //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-TUNAI',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '46',
	 			'debet' => 0,
	 			'kredit' => $hpp,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 }

	 public function jurnal_penjualan_kredit($id_toko, $tgl_order, $id_orders, $no_faktur, $total, $bayar, $hpp, $id_piutang, $id_pembeli)
	 {		
	 		$ppn_nominal = $total*(10/100); 
	 		$total_ppn = $total+$ppn_nominal; 
	        // FAKTUR PAJAK PKP //
	        if ($id_pembeli*1!=0) {
	          $row_member = $this->db->select('*')
	                                 ->from('member')
	                                 ->where('id_toko', $id_toko)
	                                 ->where('id_member', $id_pembeli)
	                                 ->get()->row();
	          if ($row_member) {
	            if ($row_member->pkp!="1") {
	            	if ($row_member->persen_pajak > 0) {
				 		$ppn_nominal = $total*($row_member->persen_pajak/100); 
				 		$total_ppn = $total+$ppn_nominal; 
	            	} else {
				 		$ppn_nominal = 0; 
				 		$total_ppn = $total+$ppn_nominal; 
	            	}
	            }
		 		// PPN BARU [MARKETING] //
		 		$data_array = array(
		 			'id_toko' => $id_toko,
		 			'kode' => 'RT-PENJUALAN-KREDIT',
		 			'tgl' => $tgl_order,
		 			'id_proses' => $id_orders,
		 			'id_akun' => 75,
		 			'debet' => 0,
		 			'kredit' => $ppn_nominal,
		 			'no_faktur' => $no_faktur,
		 			'keterangan' => 'Penjualan Barang Bayar Kredit',
		 			'id_piutang' => $id_piutang,
		 		);
		 		$this->Jurnal_retail_model->insert($data_array);
	          }
	        }
	 		// KAS //
	 		if ($bayar > 0) {
		 		$data_array = array(
		 			'id_toko' => $id_toko,
		 			'kode' => 'RT-PENJUALAN-KREDIT',
		 			'tgl' => $tgl_order,
		 			'id_proses' => $id_orders,
		 			'id_akun' => $this->id_akun_kas_besar,
		 			'debet' => $bayar,
		 			'kredit' => 0,
		 			'no_faktur' => $no_faktur,
		 			'keterangan' => 'Penjualan Barang Bayar Kredit',
		 			'id_piutang' => $id_piutang,
		 		);
		 		$this->Jurnal_retail_model->insert($data_array);
	 		}
	 		// Piutang //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-KREDIT',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '45',
	 			'debet' => $total_ppn-$bayar,
	 			'kredit' => 0,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Kredit',
	 			'id_piutang' => $id_piutang
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// PPN Keluaran //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-KREDIT',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '59',
	 			'debet' => 0,
	 			'kredit' => $ppn_nominal,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Kredit',
	 			'id_piutang' => $id_piutang
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Penjualan //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-KREDIT',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '19',
	 			'debet' => 0,
	 			'kredit' => $total,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Kredit',
	 			'id_piutang' => $id_piutang
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// HPP //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-KREDIT',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '44',
	 			'debet' => $hpp,
	 			'kredit' => 0,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Kredit',
	 			'id_piutang' => $id_piutang
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Persediaan //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PENJUALAN-KREDIT',
	 			'tgl' => $tgl_order,
	 			'id_proses' => $id_orders,
	 			'id_akun' => '46',
	 			'debet' => 0,
	 			'kredit' => $hpp,
	 			'no_faktur' => $no_faktur,
	 			'keterangan' => 'Penjualan Barang Bayar Kredit',
	 			'id_piutang' => $id_piutang
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 }

	 public function jurnal_pembelian_tunai($id_toko, $tgl_masuk, $id_pembelian, $total_bayar)
	 {
	 		// Persediaan //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PEMBELIAN-TUNAI',
	 			'tgl' => $tgl_masuk,
	 			'id_proses' => $id_pembelian,
	 			'id_akun' => '46',
	 			'debet' => $total_bayar,
	 			'kredit' => 0,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembelian Barang Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Kas //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PEMBELIAN-TUNAI',
	 			'tgl' => $tgl_masuk,
	 			'id_proses' => $id_pembelian,
	 			'id_akun' => $this->id_akun_kas_besar,
	 			'debet' => 0,
	 			'kredit' => $total_bayar,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembelian Barang Tunai'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 }

	 public function jurnal_pembelian_hutang($id_toko, $tgl_masuk, $id_pembelian, $total_bayar)
	 {
	 		// Persediaan //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PEMBELIAN-HUTANG',
	 			'tgl' => $tgl_masuk,
	 			'id_proses' => $id_pembelian,
	 			'id_akun' => '46',
	 			'debet' => $total_bayar,
	 			'kredit' => 0,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembelian Barang Hutang'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Kas //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PEMBELIAN-HUTANG',
	 			'tgl' => $tgl_masuk,
	 			'id_proses' => $id_pembelian,
	 			'id_akun' => '43',
	 			'debet' => 0,
	 			'kredit' => $total_bayar,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembelian Barang Hutang'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 }

	 public function jurnal_piutang($id_toko, $tgl, $total_bayar, $id_piutang)
	 {
	 	if ($total_bayar > 0) {
	 		// Kas //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PIUTANG-BAYAR',
	 			'tgl' => $tgl,
	 			'id_piutang' => $id_piutang,
	 			'id_akun' => $this->id_akun_kas_besar,
	 			'debet' => $total_bayar,
	 			'kredit' => 0,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembayaran Piutang'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Piutang //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-PIUTANG-BAYAR',
	 			'tgl' => $tgl,
	 			'id_piutang' => $id_piutang,
	 			'id_akun' => '45',
	 			'debet' => 0,
	 			'kredit' => $total_bayar,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembayaran Piutang'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 	}
	 }

	 public function jurnal_faktur_tunai($id_toko, $tgl, $id_faktur, $bayar)
	 {
	 	/*
	 	if ($bayar > 0) {
	 		// Kas //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-FAKTUR-TUNAI',
	 			'tgl' => $tgl,
	 			'id_piutang' => $id_piutang,
	 			'id_akun' => $this->id_akun_kas_besar,
	 			'debet' => 0,
	 			'kredit' => 0,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembayaran Piutang'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 		// Piutang //
	 		$data_array = array(
	 			'id_toko' => $id_toko,
	 			'kode' => 'RT-FAKTUR-TUNAI',
	 			'tgl' => $tgl,
	 			'id_piutang' => $id_piutang,
	 			'id_akun' => '45',
	 			'debet' => 0,
	 			'kredit' => 0,
	 			'no_faktur' => "",
	 			'keterangan' => 'Pembayaran Piutang'
	 		);
	 		$this->Jurnal_retail_model->insert($data_array);
	 	}
	 	*/
	 }

	 public function jurnal_faktur_hutang($id_toko, $tgl, $id_faktur, $bayar)
	 {
	 	# code...
	 }

}

/* End of file Pengaturan_akuntansi_model.php */
/* Location: ./application/models/Pengaturan_akuntansi_model.php */