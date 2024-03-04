<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_model extends CI_Model {


	function generate_wrapper()
	{
		$total_date = date('t');
		foreach ($total_date as $date) {
			
		}
	}

	function grafik_order_hari_ini()
	{
		$this->db->select('lo.tanggal');
		$this->db->from('laporan_order lo');
		$this->db->where('left(tanggal,10)',date('Y-m'));
		$this->db->group_by('left(tanggal,10)');
		$res_tanggal  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res_tanggal as $tanggal) {
			$data_order = $this->get_order($tanggal->tanggal);
			$total = 0;
			foreach ($data_order as $order ) {
				$total += ($order->hs * 1) + ($order->gc * 1);
			}
			$label[] = $tanggal->tanggal;
			$value[] = $total;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function data_order_hari_ini(){
		$data_media = $this->db->get('pil_media')->result();
		$output = [];
		$total = 0;
		foreach($data_media as $media){
			$this->db->select('sum(lod.jumlah) as jumlah');
			$this->db->from('laporan_order lo');
			$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');
			$this->db->where('left(lo.tanggal,10)', date('Y-m'));
			$this->db->where('lo.media', $media->id);
			$row_order = $this->db->get()->row();

			$output[] = array(
				"media"=>$media->media,
				"scheme"=>$media->scheme,
				"jumlah"=>($row_order->jumlah)?$row_order->jumlah:0
			);
			$total += ($row_order->jumlah)?$row_order->jumlah:0; 
		}
		return array("data"=>$output,"total"=>$total);
	}

	function grafik_order_per_hari()
	{
		$this->db->select('lo.tanggal');
		$this->db->from('laporan_order lo');
		$this->db->where('left(tanggal,7)',date('Y-m'));
		$this->db->group_by('left(tanggal,10)');
		$res_tanggal  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res_tanggal as $tanggal) {
			$data_order = $this->get_order($tanggal->tanggal);
			$total = 0;
			foreach ($data_order as $order ) {
				$total += ($order->hs * 1) + ($order->gc * 1);
			}
			$label[] = $tanggal->tanggal;
			$value[] = $total;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function data_order_per_hari(){
		$data_media = $this->db->get('pil_media')->result();
		$output = [];
		$total = 0;
		foreach($data_media as $media){
			$this->db->select('sum(lod.jumlah) as jumlah');
			$this->db->from('laporan_order lo');
			$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');
			$this->db->where('left(lo.tanggal,7)', date('Y-m'));
			$this->db->where('lo.media', $media->id);
			$row_order = $this->db->get()->row();

			$output[] = array(
				"media"=>$media->media,
				"scheme"=>$media->scheme,
				"jumlah"=>($row_order->jumlah)?$row_order->jumlah:0
			);
			$total += ($row_order->jumlah)?$row_order->jumlah:0; 
		}
		return array("data"=>$output,"total"=>$total);
	}

	function data_order_per_bulan(){
		$data_media = $this->db->get('pil_media')->result();
		$output = [];
		$total = 0;
		foreach($data_media as $media){
			$this->db->select('sum(lod.jumlah) as jumlah');
			$this->db->from('laporan_order lo');
			$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');
			$this->db->where('left(lo.tanggal,4)', date('Y'));
			$this->db->where('lo.media', $media->id);
			$row_order = $this->db->get()->row();

			$output[] = array(
				"media"=>$media->media,
				"scheme"=>$media->scheme,
				"jumlah"=>($row_order->jumlah)?$row_order->jumlah:0
			);
			$total += ($row_order->jumlah)?$row_order->jumlah:0; 
		}
		return array("data"=>$output,"total"=>$total);
	}

	function grafik_order_per_bulan()
	{
		$arrBulan = array(
			"01"=>"JANUARI",
			"02"=>"FEBRUARI",
			"03"=>"MARET",
			"04"=>"APRIL",
			"05"=>"MEI",
			"06"=>"JUNI",
			"07"=>"JULI",
			"08"=>"AGUSTUS",
			"09"=>"SEPTEMBER",
			"10"=>"OKTOBER",
			"11"=>"NOVEMBER",
			"12"=>"DESEMBER",
		);

		$this->db->select('SUBSTR(tanggal FROM 6 FOR 2) as bulan,left(tanggal,7) as bulantahun');
		$this->db->from('laporan_order lo');
		$this->db->where('left(lo.tanggal,4)', date('Y'));
		$this->db->group_by('left(tanggal,7)');
		$res_tanggal  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res_tanggal as $tanggal) {
			$data_order = $this->get_order('',$tanggal->bulantahun);
			$total = 0;
			foreach ($data_order as $order ) {
				$total += ($order->hs * 1) + ($order->gc * 1);
			}
			$label[] = $arrBulan[$tanggal->bulan];
			$value[] = $total;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function get_order_by_id($id_order)
	{
		$this->db->select("*,lo.id as id,lo.status as id_status,u.first_name as nama_cs,u.phone as no_hp_cs,m.media as media,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status");
		$this->db->from('laporan_order lo');
		$this->db->join('users u', 'u.id_users = lo.id_cs');
		$this->db->join('pil_media m', 'm.id = lo.media');
		$this->db->where('lo.id', $id_order);
		$row = $this->db->get()->row();

		$output = (object)array(
				"id_order"=>$row->id,
				"id_status"=>$row->id_status,
				"no_invoice"=>$row->no_invoice,
				"tanggal"=>$row->tanggal,
				"media"=>$row->media,
				"nama_cs"=>$row->nama_cs,
				"no_hp_cs"=>$row->no_hp_cs,
				"nama_penerima"=>$row->nama_pembeli,
				"alamat_penerima"=>$row->alamat,
				"no_hp"=>$row->no_hp,
				"kode_pos"=>$row->kodepos,
				"tanggal_lahir"=>$row->tanggal_lahir,
				"alamat_email"=>$row->email,
				"hs"=>"",
				"gc"=>"",
				"harga"=>$row->harga,
				"ongkir"=>$row->ongkir,
				"status"=>$row->status,
		);

		$this->db->select('*');
		$this->db->from('laporan_order_detail lod');
		$this->db->where('lod.id_order', $row->id);
		$detail = $this->db->get()->result();

		foreach ($detail as $laporan_detail) {
			if($laporan_detail->id_produk == 1){
				$output->hs += $laporan_detail->jumlah*1;
			}else{
				$output->gc += $laporan_detail->jumlah*1;
			} 
		}

		return $output;
	}

	function get_order($tanggal = '',$perbulan = '', $media = '', $status = '', $dari = '', $sampai = '',$where_in = '')
	{
		$this->db->select("*,lo.alamat as alamat,lo.id_cs,lo.id as id,lo.status as id_status,u.first_name as nama_cs,u.phone as no_hp_cs,m.media as media,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status");
		$this->db->from('laporan_order lo');
		$this->db->join('users u', 'u.id_users = lo.id_cs');
		$this->db->join('pil_media m', 'm.id = lo.media');
		if(!empty($tanggal)){
		$this->db->where('tanggal', $tanggal);
		}
		if(!empty($perbulan)){
		$this->db->where('left(tanggal,7)', $perbulan);	
		}
		if(!empty($status) && $status != "SEMUA"){
		$this->db->where('status', $status);
		}
		if(!empty($dari) && !empty($sampai)){
		$exdari = explode("-",$dari);
		$dari = $dar[2].$dari[1].$dari[0];
		$this->db->where('left(tanggal,10) BETWEEN "'.$dari.'" AND "'.$sampai.'"');
		}
		if(!empty($where_in)){
		$this->db->where_in('lo.id', $where_in);
		}

		$res = $this->db->get()->result();

		$output = [];
		$id = 0;
		foreach ($res as $item) {
			$output[$id] = (object)array(
					"id_order"=>$item->id,
					"id_status"=>$item->id_status,
					"id_cs"=>$item->id_cs,
					"no_invoice"=>$item->no_invoice,
					"tanggal"=>$item->tanggal,
					"media"=>$item->media,
					"nama_cs"=>$item->nama_cs,
					"no_hp_cs"=>$item->no_hp_cs,
					"nama_penerima"=>$item->nama_pembeli,
					"alamat_penerima"=>$item->alamat,
					"no_hp"=>$item->no_hp,
					"kode_pos"=>$item->kodepos,
					"tanggal_lahir"=>$item->tanggal_lahir,
					"alamat_email"=>$item->email,
					"hs"=>"",
					"gc"=>"",
					"harga"=>$item->harga,
					"ongkir"=>$item->ongkir,
					"status"=>$item->status,
					"no_resi"=>$item->no_resi,
			);

			$this->db->select('*');
			$this->db->from('laporan_order_detail lod');
			$this->db->where('lod.id_order', $item->id);
			$detail = $this->db->get()->result();

			foreach ($detail as $laporan_detail) {
				if($laporan_detail->id_produk == 1){
					$output[$id]->hs += $laporan_detail->jumlah*1;
				}else{
					$output[$id]->gc += $laporan_detail->jumlah*1;
				} 
			}
			$id++;
		}

		return $output;
	}

	function verifikasi_pembayaran($id_order)
	{
		$this->load->model('Produk_retail_model');
		//get laporan order
		$this->db->select('*');
		$this->db->from('laporan_order as lo');
		$this->db->where('lo.id', $id_order);
		$row_order = $this->db->get()->row();

		// row cs 
		$row_cs = $this->db->where('id_users',$row_order->id_cs)->get('users')->row();

		// cek email jika belum ada maka jadikan member
		$last_user = $this->db->order_by('id_users','DESC')->get('users')->row();
		$row_user = $this->db->where('email', $row_order->email)->get('users')->row();

		// kumpulan variabel
		$id_member = "";

		if(empty($row_user)){
			$this->load->library('ion_auth');
			$email    = $row_order->email;
			$identity = $row_order->email;
			$password = "12341234";

			$additional_data = array(
				'id_users'   => $last_user->id_users + 1,
				'id_toko'    => 158,
			    'first_name' => $row_order->nama_pembeli,
			    'last_name'  => "",
			    'company'    => "",
			    'phone'      => $row_order->no_hp,
			    'id_cabang'  => 2,
			    'level'      => 6,
			);
			$id_user = $this->ion_auth->register($identity, $password, $email, $additional_data);

		 	$last_member = $this->db->order_by('id_member',"DESC")->get('member')->row();
		 	if(!empty($last_member)){
			 	$currmember = $last_member + 1;
		 	}else{
			 	$currmember = 1;
		 	}

			//insert member 
			$data_member = array(
				'id_member'   => $currmember,
				'id_toko'    => 158,
			    'nama' => $exploded[0],
			    'id_users' => $id_user,
			    'id_sales' => $data['id_cs'],
			    'alamat' => $exploded[1],
			    'telp'=> $exploded[2],
			    'tgl_lahir' => $detail_pembeli[0]
			);
			$this->db->insert('member', $data_member);
			$id_member = $this->db->insert_id();
		}else{
			$this->db->where('id_users', $row_user->id_users);
			$row_member = $this->db->get('member')->row();
			if(!empty($row_member)){
				$id_member = $row_member->id_member;
			}else {
				$id_member = "";
			}
		}
		//end cek email

		//explode tanggal jadi tanggal dan jam
		$explode_datetime = explode(" ",$row_order->tanggal);

		$_tanggal = $explode_datetime[0];

		$explode_tanggal = explode("-",$_tanggal);
		$_tanggal = $explode_tanggal[2].'-'.$explode_tanggal[1].'-'.$explode_tanggal[0];

		$_jam = $explode_datetime[1];

		//end explode
		$id_orders_2 = 1;
		$row_last_order = $this->db->where('id_toko', 158)->order_by('id_orders_2', 'desc')->get('orders')->row();
		if ($row_last_order) {
			$id_orders_2 = $row_last_order->id_orders_2+1;
		}

		$data_order = array(
			"id_toko"=>158,
			// "id_orders_2"=>$id_orders_2,
			"id_users"=>$row_order->id_cs,
			"id_sales"=>$row_order->id_cs,
			"no_faktur"=>$row_order->no_invoice,
			"tgl_order"=>$_tanggal,
			"jam_order"=>$_jam,
			"nominal"=>$row_order->harga,
		);

		//kondisi jika member dan bukan member
		if(!empty($id_member)){
			$data_order['pembeli'] = $id_member;
			$data_order['alamat_pembeli'] = $row_order->alamat;
		}else{
			$data_order['bukan_member'] = $row_order->nama_pembeli;
		}
		//end kondisi
		$this->db->insert('orders', $data_order);
		$id_tbl_order = $this->db->insert_id();

		$this->db->where('id_orders', $id_tbl_order);
		$this->db->update('orders', array('id_orders_2' => $id_tbl_order));

		// data ongkir

		$data_ongkir = array(
			"id_order"=>$id_order,
			"ongkir"=>$row_order->ongkir
		);
		$this->db->insert('ongkir', $data_ongkir);

		//get data detail
		$this->db->select('lod.id_order,lod.id_produk,pr.harga_1,lod.jumlah,pr.dibeli');
		$this->db->from('laporan_order_detail lod');
		$this->db->join('produk_retail pr', 'pr.id_produk_2 = lod.id_produk');
		$this->db->where('lod.id_order', $id_order);
		$res_laporan_order_detail = $this->db->get()->result();


		foreach ($res_laporan_order_detail as $detail) {
			$data_order_detail = array(
				"id_toko"=>$row_cs->id_toko,
				"id_orders_2"=>$id_tbl_order,
				"id_orders_sales"=>$detail->id_order,
				"id_produk"=>$detail->id_produk,
				"harga_satuan"=>$detail->harga_1
			);
			$this->db->insert('orders_detail', $data_order_detail);

			$dibeli_baru = $detail->dibeli+$detail->jumlah;
          	$data_produk = array(
	            'dibeli' => $dibeli_baru,
          	);
          	$this->Produk_retail_model->update($detail->id_produk, $data_produk);
		}

		//update status diproses
		$this->db->where('id', $id_order);
		$this->db->update('laporan_order', array('status'=>'2'));
	}


	function get_table_order()
	{
		$data = $this->get_all();
		foreach ($data as $item) {
			$output[] = array(
				"media"=>$item->media,
				);
		}
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('pil_media');
		$res_media = $this->db->get()->result();
		
		$output = [];
		foreach ($res_media as $media) {
			$output[] = (object)array(
					"media"=>$media->media,
					"data"=>$this->get_by_media($media->id)
				);
		}
		return $output;
	}

	function get_by_media($media,$id_cs = "")
	{
		$this->db->select('lo.*,u.first_name as nama_cs,u.phone as no_hp_cs');
		$this->db->from('laporan_order lo');
		$this->db->where('media', $media);
		$this->db->join('users u', 'u.id_users = lo.id_cs');
		if(!empty($id_cs)){
		$this->db->where('id_cs', $id_cs);
		}
		$data = $this->db->get()->result();
		
		$output = [];
		foreach ($data as $item) {
			$laporan_order = (array) $item;
			$detail = array("detail"=>$this->get_laporan_detail($item->id));
			$output[] = array_merge($laporan_order,$detail);
		}
		return $output;
	}	

	function get_laporan_detail($id_order){
		$this->db->select('*');
		$this->db->from('laporan_order_detail lod');
		$this->db->where('id_order', $id_order);
		return $this->db->get()->result();
	}

}

/* End of file Sales_order_model.php */
/* Location: ./application/models/Sales_order_model.php */