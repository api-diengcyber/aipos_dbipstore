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
		/* $this->db->select('lo.tanggal');
		$this->db->from('laporan_order lo');
		$this->db->where('left(tanggal,10)',date('Y-m-d'));
		$this->db->group_by('left(tanggal,10)'); */

		$this->db->select('SUBSTRING(o.jam_order,1,2) AS jam, SUM(od.jumlah) AS jumlah');
		$this->db->from('orders o');
		$this->db->join('orders_detail od', 'o.id_orders_2=od.id_orders_2');
		$this->db->where('tgl_order',date('d-m-Y'));
		$this->db->group_by('SUBSTRING(o.jam_order,1,2)');
		$res_tanggal  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res_tanggal as $key) {
			// $data_order = $this->get_order(array("tanggal"=>$key->tanggal,"order"=>true));
			/* $data_order = $this->db->select('o.*')
														 ->from('orders o')
														 ->join('orders_detail od', 'o.id_orders_2=od.id_orders_2')
														 ->where('SUBSTRING(o.jam_order,1,2)=', $key->jam)
														 ->get()->row(); */
			$label[] = $key->jam;
			$value[] = $key->jumlah;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function grafik_order_per_kasir()
	{
		$this->db->select('SUBSTRING(o.tgl_order,1,2) AS tanggal, SUM(od.jumlah) AS jumlah, u.first_name');
		$this->db->from('orders o');
		$this->db->join('users u', 'o.id_sales=u.id_users');
		$this->db->join('orders_detail od', 'o.id_orders_2=od.id_orders_2', 'left');
		$this->db->where('RIGHT(o.tgl_order,7)=',date('m-Y'));
		$this->db->group_by('o.id_sales');
		$res  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res as $key) {
			$expfn = explode(" ", $key->first_name);
			$label[] = $expfn[0];
			$value[] = $key->jumlah;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function data_order_hari_ini(){
		$data_media = $this->db->get('pil_media')->result();
		$output = [];
		$total = 0;
		foreach($data_media as $media){
			/* $this->db->select('sum(lod.jumlah) as jumlah');
			$this->db->from('laporan_order lo');
			$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');
			$this->db->where('left(lo.tanggal,10)', date('Y-m-d'));
			$this->db->where('lo.media', $media->id); */
			
			$this->db->select('sum(od.jumlah) as jumlah');
			$this->db->from('orders o');
			$this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice', 'left');
			$this->db->join('orders_detail od', 'o.id_orders_2 = od.id_orders_2');
			$this->db->where('o.tgl_order', date('d-m-Y'));
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
		/* $this->db->select('lo.tanggal');
		$this->db->from('laporan_order lo');
		$this->db->where('left(tanggal,7)',date('Y-m'));
		$this->db->group_by('left(tanggal,10)'); */

		$this->db->select('SUBSTRING(o.tgl_order,1,2) AS tanggal, SUM(od.jumlah) AS jumlah');
		$this->db->from('orders o');
		$this->db->join('orders_detail od', 'o.id_orders_2=od.id_orders_2', 'left');
		$this->db->where('RIGHT(o.tgl_order,7)=',date('m-Y'));
		$this->db->group_by('o.tgl_order');
		$res_tanggal  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res_tanggal as $key) {
			/* $data_order = $this->get_order(array("tanggal"=>$key->tanggal,"order"=>true));
			$total = 0;
			foreach ($data_order as $order) {
				$total += ($order->hs * 1) + ($order->gc * 1);
			} */
			$label[] = $key->tanggal;
			$value[] = $key->jumlah;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function data_order_per_hari(){
		$data_media = $this->db->get('pil_media')->result();
		$output = [];
		$total = 0;
		foreach($data_media as $media){
			/* $this->db->select('sum(lod.jumlah) as jumlah');
			$this->db->from('laporan_order lo');
			$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');
			$this->db->where('left(lo.tanggal,7)', date('Y-m')); */
			
            $this->db->select('count(o.id_orders) as jumlah');
			$this->db->from('orders o');
			$this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice', 'left');
			//$this->db->join('orders_detail od', 'o.id_orders_2 = od.id_orders_2');
			$this->db->where('RIGHT(o.tgl_order,7)', date('m-Y'));
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
			/* $this->db->select('sum(lod.jumlah) as jumlah');
			$this->db->from('laporan_order lo');
			$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');
			$this->db->where('left(lo.tanggal,4)', date('Y')); */
			
		  $this->db->select('count(o.id_orders) as jumlah');
			$this->db->from('orders o');
			$this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice', 'left');
			//$this->db->join('orders_detail od', 'o.id_orders_2 = od.id_orders_2');
			$this->db->where('RIGHT(o.tgl_order,4)', date('Y'));
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


		/* $this->db->select('SUBSTR(tanggal FROM 6 FOR 2) as bulan,left(tanggal,7) as bulantahun');
		$this->db->from('laporan_order lo');
		$this->db->where('left(lo.tanggal,4)', date('Y'));
		$this->db->group_by('left(tanggal,7)'); */

		$this->db->select('SUBSTRING(o.tgl_order,4,2) AS bulan, CONCAT(RIGHT(o.tgl_order,4),"-",SUBSTRING(o.tgl_order,4,2)) AS bulantahun, SUM(od.jumlah) AS jumlah');
		$this->db->from('orders o');
		$this->db->join('orders_detail od', 'o.id_orders_2=od.id_orders_2', 'left');
		$this->db->where('RIGHT(o.tgl_order,4)=', date('Y'));
		$this->db->group_by('RIGHT(o.tgl_order,7)');
		$res_tanggal  = $this->db->get()->result();
		$label = [];
		$value = [];
		foreach ($res_tanggal as $key) {
			/* $data_order = $this->get_order(array("perbulan"=>$key->bulantahun,"order"=>true));
			$total = 0;
			foreach ($data_order as $order ) {
				$total += ($order->hs * 1) + ($order->gc * 1);
			} */
			$label[] = $arrBulan[$key->bulan];
			$value[] = $key->jumlah;
		}
		return array("label"=>$label,"value"=>$value);
	}

	function get_order_by_id($id_order)
	{
		$this->db->select("*,lo.id as id,lo.nominal as nominal, lo.bank as bank, lo.selisih as selisih, lo.status as id_status,u.first_name as nama_cs,u.phone as no_hp_cs,m.media as media,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status, lo.alamat AS alamat_penerima");
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
			"alamat_penerima"=>$row->alamat_penerima,
			"no_hp"=>$row->no_hp,
			"kode_pos"=>$row->kodepos,
			"tanggal_lahir"=>$row->tanggal_lahir,
			"alamat_email"=>$row->email,
			"hs"=>"",
			"gc"=>"",
			"harga"=>$row->harga,
			"ongkir"=>$row->ongkir,
			"status"=>$row->status,
			"nominal"=>$row->nominal,
			"selisih"=>$row->selisih,
			"bank" => $row->bank,
		);

		$this->db->select('*');
		$this->db->from('laporan_order_detail lod');
		$this->db->where('lod.id_order', $row->id);
		$detail = $this->db->get()->result();

		foreach ($detail as $laporan_detail) {
			if ($laporan_detail->id_produk == 1) {
				$output->hs += $laporan_detail->jumlah*1;
			} else {
				$output->gc += $laporan_detail->jumlah*1;
			} 
		}

		return $output;
	}

	function get_total_by_produk($params,$paginate = array())
	{
		$this->db->select('SUM(lod.jumlah) as jumlah');
		$this->db->from('laporan_order lo');
		$this->db->join('laporan_order_detail lod', 'lod.id_order = lo.id');

		if(!empty($params['id_produk'])){
		$this->db->where('lod.id_produk', $params['id_produk']);
		}
		if(!empty($params['tanggal'])){
		$this->db->where('lo.tanggal', $params['tanggal']);
		}
		if(!empty($params['perbulan'])){
		$this->db->where('left(lo.tanggal,7)', $params['perbulan']);	
		}
		if(!empty($params['status']) && $params['status'] != "SEMUA"){
		$exp_status = explode('-',$params['status']);
		if(count($exp_status) > 1){
		$this->db->where('lo.no_resi IS NULL');
		$this->db->where('lo.status', $exp_status[0]);
		}else{
		$this->db->where('lo.status', $params['status']);		
		}
		
		}
		if(!empty($params['status_in'])){
			$this->db->where_in('lo.status', $params['status_in']);
		}
		if(!empty($params['dari']) && !empty($params['sampai'])){
		    
		$dmyDari = new DateTime($params['dari']);
		$ymdDari = $dmyDari->format('Y-m-d');
		$dmySampai = new DateTime($params['sampai']);
		$ymdSampai = $dmySampai->format('Y-m-d');
		
		$exdari = explode("-",$params['dari']);
		$dari = $exdari[2].$exdari[1].$exdari[0];
		$this->db->where('left(lo.tanggal,10) BETWEEN "'.$ymdDari.'" AND "'.$ymdSampai.'"');
		}
		if(!empty($params['where_in'])){
		$this->db->where_in('lo.id', $params['where_in']);
		}
		if(!empty($params['id_users'])){
		$this->db->where('lo.id_cs', $params['id_users']);
		}
		if(!empty($params['media'])){
		$this->db->where('lo.media', $params['media']);
		}

		$total = $this->db->get()->row();
		if(!empty($total)){
			return $total->jumlah;
		}else{
			return 0;
		}
	}

	function get_order($params, $paginate = array())
	{
		$this->db1 = $this->_get_order($params);
		if (!empty($paginate)) {
			$page = $paginate['page'];
			$page = $page - 1;
			if ($page <= 1) {
				$page = 0;
			}
			$perpage = $paginate['perpage'];
			$from = $page * $perpage;
			$this->db1->limit($perpage,$from);
		}
		$res = $this->db1->get()->result();

		$output = [];
		$id = 0;
		foreach ($res as $item) {
	        $keterangan = explode("#",$item->keterangan);
	        
	        if (!empty($keterangan[10])) {
                $stringKet = $keterangan[10];
	        } else {
	            $stringKet = "";
	        }
		    
			$output[$id] = (object)array(
				"id_order"=>$item->id,
				"id_status"=>$item->id_status,
				"id_cs"=>$item->id_cs,
				"id_media"=>$item->id_media,
				"no_invoice"=>$item->no_invoice,
				"tanggal"=>$item->tanggal,
				"media"=>$item->media,
				"nama_cs"=>$item->nama_cs,
				"last_nama_cs"=>$item->last_nama_cs,
				"no_hp_cs"=>$item->no_hp_cs,
				"nama_penerima"=>$item->nama_pembeli,
				"alamat_penerima"=>$item->alamat,
				"no_hp"=>$item->no_hp,
				"kode_pos"=>$item->kodepos,
				"tanggal_lahir"=>$item->tanggal_lahir,
				"alamat_email"=>$item->email,
				"keterangan"=>$stringKet,
				"detail_order"=>array(),
				"harga"=>$item->harga,
				"ongkir"=>$item->ongkir,
				"status"=>$item->status,
				"no_resi"=>$item->no_resi,
				"nominal"=>$item->nominal,
				"nama_bank"=>$item->nama_bank,
				"selisih"=>$item->selisih,
				"biaya_lain"=>$item->biaya_lain,
				"saldo"=>$item->saldo,
				"id_expedisi"=>$item->id_expedisi,
				"jml_sama"=>$item->jml_sama,
				"kode_warna"=>$item->kode_warna, 
				"pembayaran"=>!empty($params['order'])?$item->pembayaran:null,
				"nama_expedisi" => $item->nama_expedisi,
				"d_nama" => $item->d_nama,
				"d_alamat" => $item->d_alamat,
				"d_hp" => $item->d_hp,
				"koli" => $item->koli,
			);

			$this->db->select('od.*,pr.nama_produk,pr.kode_produk,pr.harga_1,pr.harga_2,pr.harga_3,pr.harga_4,pr.harga_5,pr.harga_6');
			$this->db->from('orders_detail od');
			$this->db->join('produk_retail pr', 'pr.id_produk_2 = od.id_produk');
			$this->db->where('od.id_orders_2', $item->id);
			$detail = $this->db->get()->result();

			$output[$id]->detail_order = $detail;
			$id++;
		}

		return $output;
	}

	function _get_order($params)
	{
		$s_order = '';
		if (!empty($params['order'])) {
			$s_order = ', o.pembayaran';
		}
		$this->db->select("o.no_faktur AS no_invoice, o.id_sales AS id_cs, o.tgl_order AS tanggal, o.media, SUBSTRING_INDEX(o.bukan_member,'-',1) AS nama_pembeli, SUBSTRING_INDEX(o.bukan_member,'-',-1) AS alamat, o.no_hp, o.kodepos, o.nominal AS harga, o.ongkir, o.saldo, o.selisih, o.biaya_lain, o.subtotal AS nominal, o.tanggal_transfer, o.bank, o.email, o.tanggal_lahir, o.status, o.no_resi, o.id_expedisi, o.keterangan, o.media as id_media,o.id_orders_2 as id,o.status as id_status,u.first_name as nama_cs,u.last_name as last_nama_cs,u.phone as no_hp_cs,m.media as media, (CASE WHEN o.status = 1 THEN 'Menunggu Admin' WHEN o.status = 2 THEN 'Diproses' WHEN o.status = 3 THEN 'Dikirim' WHEN o.status = 4 THEN 'Selesai' WHEN o.status = 5 THEN 'Menunggu Gudang' WHEN o.status = 6 THEN 'Dibatalkan' END) AS status, b.bank as nama_bank, o2.jml AS jml_sama,e.kode_warna ".$s_order.", e.nama_expedisi, o.d_nama, o.d_alamat, o.d_hp, o.koli");
		$this->db->from('orders o');
		if(!empty($params['order_asc']) || !empty($params['order'])){
		// $this->db->join('(SELECT * FROM orders GROUP BY no_faktur) AS o', 'o.no_invoice=o.no_faktur');
		}
		$this->db->join('users u', 'u.id_users = o.id_sales','LEFT');
		$this->db->join('pil_media m', 'm.id = o.media','LEFT');
		$this->db->join('pil_bank b', 'b.id = o.bank','LEFT');
		$this->db->join('expedisi e', 'o.id_expedisi = e.id','LEFT');
		$this->db->join('(SELECT COUNT(id_orders_2) AS jml, tgl_order, SUBSTRING_INDEX(bukan_member,"-",1) AS nama_pembeli FROM orders GROUP BY CONCAT(tgl_order, nama_pembeli)) AS o2', 'SUBSTRING_INDEX(o.bukan_member,"-",1)=o2.nama_pembeli AND o.tgl_order=o2.tgl_order', 'left');
		
		if(!empty($params['no_invoice'])){
		$this->db->where('o.no_invoice', $params['no_invoice']);
		}
		if(!empty($params['id_media'])){
		$this->db->where('o.media', $params['id_media']);
		}
		if(!empty($params['tanggal'])){
		$this->db->where('o.tanggal', $params['tanggal']);
		}
		if(!empty($params['perbulan'])){
		$this->db->where('left(o.tanggal,7)', $params['perbulan']);	
		}
		if(!empty($params['status']) && $params['status'] != "SEMUA"){
		$exp_status = explode('-',$params['status']);
		if(count($exp_status) > 1){
		$this->db->where('o.no_resi IS NULL');
		$this->db->where('o.status', $exp_status[0]);
		}else{
		$this->db->where('o.status', $params['status']);
		}
		}

		$this->db->where('o.id_sales !=', 0);
		
		if(!empty($params['status_in'])){
			$this->db->where_in('o.status', $params['status_in']);
		}
		if(!empty($params['dari']) && !empty($params['sampai'])){
		    
		$dmyDari = new DateTime($params['dari']);
		$ymdDari = $dmyDari->format('Y-m-d');
		$dmySampai = new DateTime($params['sampai']);
		$ymdSampai = $dmySampai->format('Y-m-d');
		
		$exdari = explode("-",$params['dari']);
		$dari = $exdari[2].$exdari[1].$exdari[0];
		$this->db->where('left(o.tanggal,10) BETWEEN "'.$ymdDari.'" AND "'.$ymdSampai.'"');
		}
		if(!empty($params['where_in'])){
		$this->db->where_in('o.id_orders_2', $params['where_in']);
		}
		if(!empty($params['id_users'])){
		$this->db->where('o.id_sales', $params['id_users']);
		}
		if(!empty($params['media'])){
		$this->db->where('o.media', $params['media']);
		}
		if(!empty($params['pembayaran'])){
		$ex_p = (array) explode("|", $params['pembayaran']);
		if (count($ex_p) > 1) {
		$this->db->where_in('o.pembayaran', $ex_p);
		} else {
		$this->db->where('o.pembayaran', $params['pembayaran']);
		}
		}
		// $this->db->where('o.pembayaran', '2');
		if(!empty($params['q_order'])){
		$this->db->order_by($params['q_order']);
		}
		if(!empty($params['order_asc'])){
		$this->db->order_by($params['order_asc'], 'asc');
		}
		$this->db->order_by('o.id_orders_2', 'desc');
		$this->db->group_by('o.id_orders_2');
		return $this->db;
	}
	
	
	/*function get_order($params,$paginate = array())
	{
		$this->db->select("*,lo.keterangan,lo.media as id_media,lo.alamat as alamat,lo.id_cs,lo.id as id,lo.status as id_status,u.first_name as nama_cs,u.phone as no_hp_cs,m.media as media, (CASE WHEN lo.status = 1 THEN 'Menunggu Admin' WHEN lo.status = 2 THEN 'Diproses' WHEN lo.status = 3 THEN 'Dikirim' WHEN lo.status = 4 THEN 'Selesai' WHEN lo.status = 5 THEN 'Menunggu Gudang' WHEN lo.status = 6 THEN 'Dibatalkan' END) AS status, b.bank as nama_bank, lo2.jml AS jml_sama");
		$this->db->from('laporan_order lo');
		$this->db->join('users u', 'u.id_users = lo.id_cs','LEFT');
		$this->db->join('pil_media m', 'm.id = lo.media','LEFT');
		$this->db->join('pil_bank b', 'b.id = lo.bank','LEFT');
		$this->db->join('(SELECT COUNT(id) AS jml, tanggal, nama_pembeli FROM laporan_order GROUP BY CONCAT(SUBSTRING(tanggal,1,10), nama_pembeli)) AS lo2', 'lo.nama_pembeli=lo2.nama_pembeli AND (SUBSTRING(lo.tanggal,1,10))=(SUBSTRING(lo2.tanggal,1,10))', 'left');
		
		if(!empty($params['tanggal'])){
		$this->db->where('lo.tanggal', $params['tanggal']);
		}
		if(!empty($params['perbulan'])){
		$this->db->where('left(lo.tanggal,7)', $params['perbulan']);	
		}
		if(!empty($params['status']) && $params['status'] != "SEMUA"){
		$exp_status = explode('-',$params['status']);
		if(count($exp_status) > 1){
		$this->db->where('lo.no_resi IS NULL');
		$this->db->where('lo.status', $exp_status[0]);
		}else{
		$this->db->where('lo.status', $params['status']);		
		}
		
		}
		if(!empty($params['status_in'])){
			$this->db->where_in('lo.status', $params['status_in']);
		}
		if(!empty($params['dari']) && !empty($params['sampai'])){
		    
		$dmyDari = new DateTime($params['dari']);
		$ymdDari = $dmyDari->format('Y-m-d');
		$dmySampai = new DateTime($params['sampai']);
		$ymdSampai = $dmySampai->format('Y-m-d');
		
		$exdari = explode("-",$params['dari']);
		$dari = $exdari[2].$exdari[1].$exdari[0];
		$this->db->where('left(lo.tanggal,10) BETWEEN "'.$ymdDari.'" AND "'.$ymdSampai.'"');
		}
		if(!empty($params['where_in'])){
		$this->db->where_in('lo.id', $params['where_in']);
		}
		if(!empty($params['id_users'])){
		$this->db->where('lo.id_cs', $params['id_users']);
		}
		if(!empty($params['media'])){
		$this->db->where('lo.media', $params['media']);
		}
		
		if(!empty($paginate)){
		    $page = $paginate['page'];
		    $page = $page - 1;
		    if($page <= 1){
		        $page = 0;
		    }
		    $perpage = $paginate['perpage'];
		    $from = $page * $perpage;
		    $this->db->limit($perpage,$from);
		}
		$this->db->order_by('lo.id', 'desc');
		$this->db->group_by('lo.id');
		$res = $this->db->get()->result();

		$output = [];
		$id = 0;
		foreach ($res as $item) {
	        $keterangan = explode("#",$item->keterangan);
	        
	        if(!empty($keterangan[10])){
                $stringKet = $keterangan[10];
	        }else{
	            $stringKet = "";
	        }
		    
			$output[$id] = (object)array(
					"id_order"=>$item->id,
					"id_status"=>$item->id_status,
					"id_cs"=>$item->id_cs,
					"id_media"=>$item->id_media,
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
					"keterangan"=>$stringKet,
					"hs"=>"",
					"gc"=>"",
					"detail_order"=>array(),
					"harga"=>$item->harga,
					"ongkir"=>$item->ongkir,
					"status"=>$item->status,
					"no_resi"=>($item->no_resi != "null")?$item->no_resi:"",
					"nominal"=>$item->nominal,
					"nama_bank"=>$item->nama_bank,
					"selisih"=>$item->selisih,
					"biaya_lain"=>$item->biaya_lain,
					"saldo"=>$item->saldo,
					"id_expedisi"=>$item->id_expedisi,
					"jml_sama"=>$item->jml_sama,
			);

			$this->db->select('lod.*,pr.nama_produk');
			$this->db->from('laporan_order_detail lod');
			$this->db->join('produk_retail pr', 'pr.id_produk_2 = lod.id_produk');
			$this->db->where('lod.id_order', $item->id);
			$detail = $this->db->get()->result();

			$output[$id]->detail_order = $detail;

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
	}*/

	function get_diterima($dari = '', $sampai = '')
	{
		$this->db->select("*,lo.nominal,lo.alamat as alamat,lo.id_cs,lo.id as id,lo.status as id_status,u.first_name as nama_cs,u.phone as no_hp_cs,m.media as media,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status,b.bank as nama_bank,status_resi_terahir,e.kode AS kode_expedisi");
		$this->db->from('laporan_order lo');
		$this->db->join('users u', 'u.id_users = lo.id_cs');
		$this->db->join('pil_media m', 'm.id = lo.media');
		$this->db->join("expedisi e","e.id = lo.id_expedisi");
		$this->db->join('pil_bank b', 'b.id = lo.bank','LEFT');
		$this->db->where('u.level',2);
		if(!empty($dari) && !empty($sampai)){
		$exdari = explode("-",$dari);
		$exsampai = explode("-",$sampai);
		$dari = $exdari[2].'-'.$exdari[1].'-'.$exdari[0];
		$sampai = $exsampai[2].'-'.$exsampai[1].'-'.$exsampai[0];
		$this->db->where('left(lo.tanggal,10) BETWEEN "'.$dari.'" AND "'.$sampai.'"');
		}
		$this->db->where('lo.status = 3 or (m.id = 4 and lo.status = 2)');	
		if(!empty($dari) && !empty($sampai)){
		$exdari = explode("-",$dari);
		$exsampai = explode("-",$sampai);
		$dari = $exdari[2].'-'.$exdari[1].'-'.$exdari[0];
		$sampai = $exsampai[2].'-'.$exsampai[1].'-'.$exsampai[0];
		$this->db->where('left(lo.tanggal,10) BETWEEN "'.$dari.'" AND "'.$sampai.'"');
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
					"harga"=>$item->harga,
					"ongkir"=>$item->ongkir,
					"status"=>$item->status,
					"kode_expedisi"=>$item->kode_expedisi,
					"no_resi"=>($item->no_resi != "null")?$item->no_resi:"",
					"nominal"=>$item->nominal,
					"nama_bank"=>$item->nama_bank,
					"selisih"=>$item->selisih,
					"biaya_lain"=>$item->biaya_lain,
					"saldo"=>$item->saldo,
					"keterangan"=>$item->keterangan,
					"status_resi_terahir"=>$item->status_resi_terahir,
					"detail_order"=>array()
			);

			$this->db->select('lod.*,pr.nama_produk');
			$this->db->from('laporan_order_detail lod');
			$this->db->join('produk_retail pr', 'pr.id_produk_2 = lod.id_produk');
			$this->db->where('lod.id_order', $item->id);
			$detail = $this->db->get()->result();

			$output[$id]->detail_order = $detail;

			$id++;
		}

		return $output;
	}

	function get_res_order_by_resi($no_resi)
	{
		$this->db->select("*,lo.nominal,lo.alamat as alamat,lo.id_cs,lo.id as id,lo.status as id_status,u.first_name as nama_cs,u.phone as no_hp_cs,m.media as media,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status,b.bank as nama_bank");
		$this->db->from('laporan_order lo');
		$this->db->join('users u', 'u.id_users = lo.id_cs');
		$this->db->join('pil_media m', 'm.id = lo.media');
		$this->db->join('pil_bank b', 'b.id = lo.bank','LEFT');
		$this->db->where_in('lo.no_resi',$no_resi);
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
					"no_resi"=>($item->no_resi != "null")?$item->no_resi:"",
					"nominal"=>$item->nominal,
					"nama_bank"=>$item->nama_bank,
					"selisih"=>$item->selisih,
					"biaya_lain"=>$item->biaya_lain,
					"saldo"=>$item->saldo,
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
    
	function utf8ize($d) {
        if (is_array($d)) 
            foreach ($d as $k => $v) 
                $d[$k] = $this->utf8ize($v);
    
         else if(is_object($d))
            foreach ($d as $k => $v) 
                $d->$k = $this->utf8ize($v);
    
         else 
            return utf8_encode($d);
    
        return $d;
    }

	function verifikasi_pembayaran($params)
	{
		$id_order = $params['id_order'];
		$no_resi = $params['no_resi'];

		$this->load->model('Produk_retail_model');
		$this->load->model('Pengaturan_transaksi_model');
		// get laporan order
		$this->db->select('*');
		$this->db->from('laporan_order as lo');
		$this->db->where('lo.id', $id_order);
		$row_order = $this->db->get()->row();

		//get data detail
		$this->db->select('lod.id_order,lod.id_produk,lod.harga,pr.harga_1,lod.jumlah,pr.dibeli');
		$this->db->from('laporan_order_detail lod');
		$this->db->join('produk_retail pr', 'pr.id_produk_2 = lod.id_produk');
		$this->db->where('lod.id_order', $id_order);
		$res_laporan_order_detail = $this->db->get()->result();
		
		$jml_subtotal = 0;
		$jml_laba = 0;
		$jml_hpp = 0;
		foreach ($res_laporan_order_detail as $detail) {
			$jml_subtotal += $detail->harga * $detail->jumlah;
			$row_produk = $this->db->where('id_toko', 160)->where('id_produk_2', $detail->id_produk)->get('produk_retail')->row();
			if ($row_produk) {
				$laba = ($detail->harga*$detail->jumlah) - ($row_produk->harga_beli*$detail->jumlah);
				$jml_hpp += $row_produk->harga_beli*$detail->jumlah;
				$jml_laba += $laba;
			}
		}

		// row cs 
		$row_cs = $this->db->where('id_users', $row_order->id_cs)->get('users')->row();

		// cek email jika belum ada maka jadikan member
		$last_user = $this->db->order_by('id_users','DESC')->get('users')->row();
		$row_user = $this->db->where('email', $row_order->email)->get('users')->row();

		// kumpulan variabel
		$id_member = "";
		if(!empty($row_order->email)){
			if(empty($row_user)){
				$this->load->library('ion_auth');
				$email    = $row_order->email;
				$identity = $row_order->email;
				$password = "12341234";

				$additional_data = array(
					'id_users'   => $last_user + 1,
					'id_toko'    => 160,
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
					'id_toko'    => 160,
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
		$row_last_order = $this->db->where('id_toko', 160)->order_by('id_orders_2', 'desc')->get('orders')->row();
		if ($row_last_order) {
			$id_orders_2 = $row_last_order->id_orders_2+1;
		}

		$data_order = array(
			"id_toko"=>160,
			// "id_orders_2"=>$id_orders_2,
			"id_users"=>$row_order->id_cs,
			"id_sales"=>$row_order->id_cs,
			"no_faktur"=>$row_order->no_invoice,
			"tgl_order"=>$_tanggal,
			"jam_order"=>$_jam,
			// "nominal"=>$row_order->harga,
			"nominal"=>$jml_subtotal,
			"pembayaran"=>3, // TRANSFER
			"ongkir"=>$row_order->ongkir,
			"biaya_lain"=>$row_order->biaya_lain,
			"laba"=>$jml_laba,
		);

		//kondisi jika member dan bukan member
		$namaalamat = $row_order->nama_pembeli.'-'.$row_order->alamat.' '.$row_order->kodepos;
		if(!empty($id_member)){
			$data_order['pembeli'] = $id_member;
			$data_order['alamat_pembeli'] = $row_order->alamat;
			$data_order['bukan_member'] = htmlentities($namaalamat);
		}else{
			$data_order['bukan_member'] = htmlentities($namaalamat);
		}
		//end kondisi
		$this->db->insert('orders', $this->utf8ize($data_order));
		$id_tbl_order = $this->db->insert_id();
		
		$id_bank = $row_order->bank;

		$this->db->where('id_orders', $id_tbl_order);
		$this->db->update('orders', array('id_orders_2' => $id_tbl_order));

		// data ongkir

		$data_ongkir = array(
			"id_order"=>$id_order,
			"ongkir"=>$row_order->ongkir
		);
		$this->db->insert('ongkir', $data_ongkir);


		foreach ($res_laporan_order_detail as $detail) {
			$data_order_detail = array(
				"id_toko"=>$row_cs->id_toko,
				"id_orders_2"=>$id_tbl_order,
				"id_orders_sales"=>$detail->id_order,
				"id_produk"=>$detail->id_produk,
				"jumlah"=>$detail->jumlah,
				"harga_satuan"=>$detail->harga,
				"harga_jual"=>$detail->harga,				
				"sub_total"=>$detail->harga * $detail->jumlah,
			);
			$this->db->insert('orders_detail', $data_order_detail);

			$dibeli_baru = $detail->dibeli+$detail->jumlah;
          	$data_produk = array(
	            'dibeli' => $dibeli_baru,
          	);
          	$this->Produk_retail_model->update($detail->id_produk, $data_produk);
		}

		//update status diproses
		if(!empty($no_resi)){
			$this->db->where('id', $id_order);
			$this->db->update('laporan_order', array('status'=>'3','no_resi'=>$no_resi));
		}else{
			$this->db->where('id', $id_order);
			$this->db->update('laporan_order', array('status'=>'2'));
		}

        //harusnya ada biaya cod disini biar g ke gabung 
        
		$nominal_ongkir = $jml_subtotal+$row_order->ongkir;
		$no_invoice = $row_order->no_invoice;
		$media = $row_order->media;
		$biaya_lain = $row_order->biaya_lain;
		$ongkir = $row_order->ongkir;
		$row_bayar = (object) array(
		    'ongkir' => $row_order->ongkir,
		);
		$tgl = $_tanggal;

		eval($this->Pengaturan_transaksi_model->accounting('verifikasibayar'));

		//accounting
		$row_order = $this->db->where("id_orders_2",$id_tbl_order)->get("orders")->row();
		if($row_order){
			// $no_faktur = $row_order->no_faktur;
			// $id_orders = $row_order->id_orders_2;
			// $pembayaran = $row_order->pembayaran;
			// $total = $row_order->nominal;
			// $totall = $row_order->
			// $this->load->model('Pengaturan_transaksi_model');
			// eval($this->Pengaturan_transaksi_model->accounting('penjualan'));
		}
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

	function delete($id_order)
	{
		$row = $this->db->where('id', $id_order)->where('status', 1)->get('laporan_order')->row();
		if ($row) {
			$this->db->where('id', $id_order);
			$this->db->delete('laporan_order');
			$this->db->where('id_order', $id_order);
			$this->db->delete('laporan_order_detail');
		}
	}

}

/* End of file Sales_order_model.php */
/* Location: ./application/models/Sales_order_model.php */