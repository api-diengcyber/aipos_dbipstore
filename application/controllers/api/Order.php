<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Xjson');
	}

	public function get_pil_media()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$this->db->select('*');
		$this->db->from('pil_media');
		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_pil_bank()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$this->db->select('*');
		$this->db->from('pil_bank');
		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_order_hari_ini()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		

		$id_user = $this->xjson->post('user_id');

		$res_order = $this->db->select("no_resi,no_hp,keterangan as keterangan_full,id_orders_2 as id_order, SUBSTRING_INDEX(bukan_member,'-',1) AS nama_pembeli, SUBSTRING_INDEX(bukan_member,'-',-1) AS alamat, nominal AS harga,no_faktur as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'DIKIRIM' END as status")->where("id_sales",$id_user)->where("tgl_order",date("d-m-Y"))->order_by('id_orders_2','desc')->get("orders")->result();

		$result = [];
		foreach ($res_order as $row_order) {
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			$res_detail = $this->db->select("pr.nama_produk,od.jumlah")->from("orders_detail od")->join("produk_retail pr","pr.id_produk = od.id_produk")->where('id_orders_2', $row_order->id_order)->order_by('id_orders','desc')->get()->result();
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			$keterangan .= $row_order->harga;

			$no_hp = $row_order->no_hp;
			if(substr($no_hp, 0, 1) == 0){
				$no_hp = "62".substr($no_hp, 1);
			}else{
				$no_hp = "62".$no_hp;
			}

			$result[] = (object)array(
					"id"=>$row_order->id_order,
					"no"=>$row_order->no,
					"no_hp"=>$no_hp,
					"status"=>$row_order->status,
					"keterangan"=>$keterangan,
					"keterangan_full"=>$row_order->keterangan_full,
					"resi"=>$row_order->no_resi
			 	);
		}


		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	public function get_order_by_id()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('id_orders_2', $this->xjson->post('id'));
		$data = $this->db->get()->row();
		
		$res_detail = $this->db->where('id_orders_2', $data->id_orders_2)->get('orders_detail')->result();
		$data->hargahs = 0;
		$data->hargagc = 0;
		foreach ($res_detail as $key):
		    if ($key->id_produk=="1") {
        		$data->hargahs = $key->harga_jual;
		    }
		    if ($key->id_produk=="2") {
        		$data->hargagc = $key->harga_jual;
		    }
	    endforeach;

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $this->utf8ize($data));
		$this->xjson->result();
	}

	public function get_history_order()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		

		$id_user = $this->xjson->post('user_id');
		$q = $this->xjson->post('q');
		// 

		$res_order = $this->db->select("no_resi,no_hp,keterangan as keterangan_full,id_orders_2 as id_order, SUBSTRING_INDEX(bukan_member,'-',1) AS nama_pembeli, SUBSTRING_INDEX(bukan_member,'-',-1) AS alamat, nominal AS harga,no_faktur as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'DIKIRIM' END as status")->where("id_cs",$id_user)->where("nama_pembeli LIKE '%".$q."%'")->order_by('id_orders','desc')->limit(100)->get("orders")->result();

		$result = [];
		
		foreach ($res_order as $row_order) {
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			$res_detail = $this->db->select("pr.nama_produk,od.jumlah")->from("orders_detail od")->join("produk_retail pr","pr.id_produk = od.id_produk")->where('id_orders_2', $row_order->id_order)->order_by('id_orders','desc')->get()->result();
			
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			
			$keterangan .= $row_order->harga;

			$no_hp = $row_order->no_hp;
			if(substr($no_hp, 0, 1) == 0){
				$no_hp = "62".substr($no_hp, 1);
			}else{
				$no_hp = "62".$no_hp;
			}

			$result[] = (object)array(
					"id"=>$row_order->id_order,
					"no"=>$row_order->no,
					"no_hp"=>$no_hp,
					"status"=>strtoupper($row_order->status),
					"keterangan"=>$keterangan,
					"resi"=>$row_order->no_resi
			 	);
		}

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $this->utf8ize($result));
		$this->xjson->result();
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

	public function save_order()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$id = $this->xjson->post('id');
		$id_user = $this->xjson->post('user_id');
		$media = $this->xjson->post('media');
		$tanggal = $this->xjson->post('tanggal');
		$bank = $this->xjson->post('bank');
		$biaya_cod = $this->xjson->post('biaya_cod');
		$keterangan = $this->xjson->post('keterangan');
		$hargagc = $this->xjson->post('hargagc');
		$hargahs = $this->xjson->post('hargahs');
		$detail_pembeli = $this->xjson->post('detail_pembeli');
		$tanggal_transfer = $this->xjson->post('tanggal_transfer');

		$data = array(
			"id"=>$id,
			"id_cs"=>$id_user,
			"media"=>$media,
			"tanggal"=>date("d-m-Y"),
			"bank"=>$bank,
			"biaya_lain"=>$biaya_cod,
			"keterangan"=>$keterangan,
			"hargahs"=>$hargahs,
			"hargagc"=>$hargagc,
			"detail_pembeli"=>$detail_pembeli,
			"tanggal_transfer"=>$tanggal_transfer,
		);

		if(!empty($id) && $id != 'null'){
			$proses = $this->_update_order($data);
		}else{
			$proses = $this->_save_order($data);
		}

		if($proses->status ==  true){
			$this->xjson->ok("Sukses");
			$this->xjson->add("data", $proses->data);
			$this->xjson->add("append", $proses->append);
		}else{
			$this->xjson->error($proses->message);
		}
		$this->xjson->result();
	}

	function _save_order($data)
	{
		$exploded = explode("#",$data["keterangan"]);
		if(count($exploded)<10){
			$message = "Format keterangan tidak valid";
			return (object)array("status"=>false,"message"=>$message);
		}else{
			
			$n_id_member = '';
			$n_alamat_member = '';
			$detail_pembeli = explode("#",$data['detail_pembeli']);
			if(count($detail_pembeli) > 1){
				$data_order['tanggal_lahir'] = $detail_pembeli[0];
				$data_order['email'] = $detail_pembeli[1];

				$last_user = $this->db->order_by('id_users','DESC')->get('users')->row();
				$row_user = $this->db->where('email', $detail_pembeli[1])->get('users')->row();

				if(empty($row_user)){
					$this->load->library('ion_auth');
					$email    = $detail_pembeli[1];
					$identity = $detail_pembeli[1];
					$password = "12341234";

					$additional_data = array(
						'id_users'   => $last_user->id_users + 1,
						'id_toko'    => 158,
						'first_name' => $exploded[0],
						'last_name'  => "",
						'company'    => "",
						'phone'      => $exploded[2],
						'id_cabang'  => 2,
						'level'      => 6,
					);
					$id_user = $this->ion_auth->register($identity, $password, $email, $additional_data);

					$last_member = $this->db->order_by('id_member',"DESC")->get('member')->row();
					if(!empty($last_member)){
					$currmember = $last_member->id_member + 1;
					}else{
					$currmember = 1;
					}
					$n_id_member = $currmember;
					$n_alamat_member = $exploded[1];
					//insert member 
					$data_member = array(
						'id_member'   => $currmember,
						'id_toko'    => 158,
					    'nama' => $exploded[0],
					    'id_users' => $last_user->id_users + 1,
					    'id_sales' => $data['id_cs'],
					    'alamat' => $exploded[1],
					    'telp'=> $exploded[2],
					    'tgl_lahir' => $detail_pembeli[0]
					);
					$this->db->insert('member', $data_member);
				}
			}else if(count($detail_pembeli) > 0) {
				$data_order['tanggal_lahir'] = $detail_pembeli[0];
			}

			$data_order['id_toko'] = 158;
			$data_order['id_users'] = $data['id_cs'];
			$data_order['id_sales'] = $data['id_cs'];
			$data_order['tgl_order'] = date('d-m-Y');
			$data_order['jam_order'] = date('H:i:s');
			$data_order['pembeli'] = $n_id_member;
			$data_order['alamat_pembeli'] = $n_alamat_member;
			$data_order['tanggal_transfer'] = $data['tanggal_transfer'];
			$data_order['media'] = $data['media'];
			$data_order['bank'] = $data['bank'];
			$data_order['biaya_lain'] = $this->only_number($data['biaya_lain']);
			// $data_order['nama_pembeli'] = $exploded[0];
			// $data_order['alamat'] = $exploded[1];
			$data_order['bukan_member'] = $exploded[0].'-'.$exploded[1];
			$data_order['no_hp'] = $exploded[2];
			$data_order['kodepos'] = $exploded[3];
			$data_order['nominal'] = $this->only_number($exploded[6]);
			$data_order['ongkir'] = $this->only_number($exploded[7]);
			$data_order['selisih'] = $this->only_number($exploded[9]);
			$data_order['keterangan'] = $data['keterangan'];
			// $data_order['detail_pembeli'] = $data['detail_pembeli'];

			$media = $data["media"];
			$data_order['pembayaran'] = 3;
			if ($media != "1") {
				$data_order['pembayaran'] = 2;
			}
			// $data_order['nominal'] = 0;
			$data_order['saldo'] = 0;

			$last_order = $this->db->select('count(id_orders_2) + 1 as next_order')->where('tgl_order', date('d-m-Y'))->order_by('id_orders_2','desc')->get('orders')->row();
			if(!empty($last_order)){
				$current_order = $last_order->next_order;
			}else{
				$current_order = 1;
			}

               $jumlah_nol = strlen($current_order);
               $angka_nol = 3 - $jumlah_nol;
               $nol = "";
               for($i=1;$i<=$angka_nol;$i++)
               {
                  $nol .= '0';
               }
               $current_order = $nol.$current_order;


			$last_order2 = $this->db->select('id_orders_2')->order_by('id_orders_2','desc')->get('orders')->row();
			if(!empty($last_order2)){
				$current_order2 = $last_order2->id_orders_2+1;
			}else{
				$current_order2 = 1;
			}
            $data_order['id_orders_2'] = $current_order2;
			$data_order['no_faktur'] = $media.date("y").date("m").date("d").$current_order;


			$cek_invoice = $this->db->where('no_faktur', $data_order['no_faktur'])->get('orders')->row();
			if ($cek_invoice) {
				$data_order['no_faktur'] = $media.date("y").date("m").date("d").($current_order+1);
			}
			
			
			$data_info = $exploded[8];
			if($media == 1 || $media == 4){
				$data_order['subtotal'] = $this->only_number($data_info);
			}else if($media == 2 || $media == 3){
				//$data_order['saldo'] = $this->only_number($data_info);
				$data_order['subtotal'] = $this->only_number($data_info);
			}
			
			//inserting data

			$this->db->insert('orders', $data_order);
			// $id_order = $this->db->insert_id();
			$id_order = $current_order2;

			
			// insert orders detail
			$hs = $exploded[4];
			$gc = $exploded[5];
			$t_laba = 0;

			if($hs > 0){
				$harga_satuan = 0;
				$row_pr = $this->db->where('id_produk_2', 1)->get('produk_retail')->row();
				if ($row_pr) {
					$harga_satuan = $row_pr->harga_beli;
				}
				$t_laba += ($data['hargahs']*$hs)-($harga_satuan*$hs);
				$data_detail = array(
					"id_orders_2" => $current_order2,
					"id_toko" => 158,
					"id_produk" => 1,
					"jumlah" => $hs,
					"harga_satuan" => $harga_satuan,
					"harga_jual" => $data['hargahs'],
					"sub_total" => $data['hargahs']*$hs,
				);
				$this->db->insert('orders_detail', $data_detail);
			}

			if ($gc > 0) {
				$harga_satuan = 0;
				$row_pr = $this->db->where('id_produk_2', 2)->get('produk_retail')->row();
				if ($row_pr) {
					$harga_satuan = $row_pr->harga_beli;
				}
				$t_laba += ($data['hargags']*$gs)-($harga_satuan*$gs);
				$data_detail = array(
					"id_orders_2" => $current_order2,
					"id_toko" => 158,
					"id_produk" => 2,
					"jumlah" => $gc,
					"harga_satuan" => $harga_satuan,
					"harga_jual" => $data['hargagc'],
					"sub_total" => $data['hargagc']*$gc,
				);
				$this->db->insert('orders_detail', $data_detail);
			}
			
			// end insert
			
			
			// update laba orders
			$data_update_o = array(
				'laba' => $t_laba,
			);
			$this->db->where('id_orders_2', $current_order2);
			$this->db->update('orders', $data_update_o);

			//send back result
			$row_order = $this->db->select("id_orders_2 as id_order,no_hp,SUBSTRING_INDEX(bukan_member,'-',1) AS nama_pembeli, SUBSTRING_INDEX(bukan_member,'-',-1) AS alamat, nominal AS harga,no_faktur as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'DIKIRIM' END as status,no_resi")->where('id_orders_2', $id_order)->get("orders")->row();
			$res_detail = $this->db->select("pr.nama_produk,od.jumlah")->from("orders_detail od")->join("produk_retail pr","pr.id_produk = od.id_produk")->where('id_orders_2', $id_order)->get()->result();
			
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			$keterangan .= $row_order->harga;

			$no_hp = $row_order->no_hp;
			if(substr($no_hp, 0, 1) == 0){
				$no_hp = "62".substr($no_hp, 1);
			}else{
				$no_hp = "62".$no_hp;
			}

			$result = (object)array(
						"id"=>$row_order->id_order,
						"no"=>$row_order->no,
						"no_hp"=>$no_hp,
						"status"=>$row_order->status,
						"keterangan"=>$keterangan,
						"keterangan_full"=>$data['keterangan'],
						"resi"=>$row_order->no_resi,
					 );

			return (object)array("status"=>true,"append"=>true,"data"=>$result);
		}
	}

	function _update_order($data)
	{
		$exploded = explode("#",$data["keterangan"]);
		if(count($exploded)<10){
			$message = "Format keterangan tidak valid";
			return (object)array("status"=>false,"message"=>$message);
		}else{
			
			$detail_pembeli = explode("#",$data['detail_pembeli']);
			if(count($detail_pembeli) > 1){
				$data_order['tanggal_lahir'] = $detail_pembeli[0];
				$data_order['email'] = $detail_pembeli[1];

				$last_user = $this->db->order_by('id_users','DESC')->get('users')->row();
				$row_user = $this->db->where('email', $detail_pembeli[1])->get('users')->row();

				if(empty($row_user)){
					$this->load->library('ion_auth');
					$email    = $detail_pembeli[1];
					$identity = $detail_pembeli[1];
					$password = "12341234";

					$additional_data = array(
						'id_users'   => $last_user->id_users + 1,
						'id_toko'    => 158,
					    'first_name' => $exploded[0],
					    'last_name'  => "",
					    'company'    => "",
					    'phone'      => $exploded[2],
					    'id_cabang'  => 2,
					    'level'      => 6,
					);
					$id_user = $this->ion_auth->register($identity, $password, $email, $additional_data);

					$last_member = $this->db->order_by('id_member',"DESC")->get('member')->row();
					if(!empty($last_member)){
					$currmember = $last_member->id_member + 1;
					}else{
					$currmember = 1;
					}
					//insert member 
					$data_member = array(
						'id_member'   => $currmember,
						'id_toko'    => 158,
					    'nama' => $exploded[0],
					    'id_users' => $last_user->id_users + 1,
					    'id_sales' => $data['id_cs'],
					    'alamat' => $exploded[1],
					    'telp'=> $exploded[2],
					    'tgl_lahir' => $detail_pembeli[0]
					);
					$this->db->insert('member', $data_member);
				}
			}else if(count($detail_pembeli) > 0) {
				$data_order['tanggal_lahir'] = $detail_pembeli[0];
			}

			$data_order['id_sales'] = $data['id_cs'];
			$data_order['tanggal_transfer'] = $data['tanggal_transfer'];
			$data_order['media'] = $data['media'];
			$data_order['bank'] = $data['bank'];
			$data_order['biaya_lain'] = $this->only_number($data['biaya_lain']);
			// $data_order['nama_pembeli'] = $exploded[0];
			// $data_order['alamat'] = $exploded[1];
			$data_order['bukan_member'] = $exploded[0].'-'.$exploded[1];
			$data_order['no_hp'] = $exploded[2];
			$data_order['kodepos'] = $exploded[3];
			$data_order['nominal'] = $this->only_number($exploded[6]);
			$data_order['ongkir'] = $this->only_number($exploded[7]);
			$data_order['selisih'] = $this->only_number($exploded[9]);
			$data_order['keterangan'] = $data['keterangan'];
			// $data_order['detail_pembeli'] = $data['detail_pembeli'];

			$media = $data["media"];
			$data_order['subtotal'] = 0;
			$data_order['saldo'] = 0;

			$data_info = $exploded[8];
			if($media == 1 || $media == 4){
				$data_order['subtotal'] = $this->only_number($data_info);
			}else if($media == 2 || $media == 3){
				$data_order['saldo'] = $this->only_number($data_info);
			}

			$this->db->where('id_orders_2', $data['id']);
			$this->db->update('orders', $data_order);

			
			//insert laporan detail
			$hs = $exploded[4];
			$gc = $exploded[5];
            
			if($hs > 0){
				$data_detail = array(
					"jumlah" => $hs,
					"harga" => $data['hargahs'],
				);
				$this->db->where('id_orders_2', $data['id']);
				$this->db->where('id_produk', 1);
				$this->db->update('orders_detail', $data_detail);
			}

			if($gc > 0){
				$data_detail = array(
					"jumlah" => $gc,
					"harga" => $data['hargagc'],
				);
				$this->db->where('id_orders_2', $data['id']);
				$this->db->where('id_produk', 2);
				$this->db->update('orders_detail', $data_detail);
			}

			//send back result
			$row_order = $this->db->select("id_orders_2 as id_order,no_hp,SUBSTRING_INDEX(bukan_member,'-',1) AS nama_pembeli, SUBSTRING_INDEX(bukan_member,'-',-1) AS alamat, nominal AS harga,no_faktur as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'DIKIRIM' END as status,no_resi")->where('id_orders_2', $data['id'])->get("orders")->row();
			$res_detail = $this->db->select("pr.nama_produk,od.jumlah")->from("orders od")->join("produk_retail pr","pr.id_produk = od.id_produk")->where('id_orders_2', $data['id'])->get()->result();
			
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			$keterangan .= $row_order->harga;

			$no_hp = $row_order->no_hp;
			if(substr($no_hp, 0, 1) == 0){
				$no_hp = "62".substr($no_hp, 1);
			}else{
				$no_hp = "62".$no_hp;
			}

			$result = (object)array(
						"id"=>$row_order->id_order,
						"no"=>$row_order->no,
						"no_hp"=>$no_hp,
						"status"=>$row_order->status,
						"keterangan"=>$keterangan,
						"keterangan_full"=>$data['keterangan'],
						"resi"=>$row_order->no_resi,
					 );

			return (object)array("status"=>true,"append"=>false,"data"=>$result);
		}
	}

	private function only_number($input)
	{
		return preg_replace('/[^0-9]/', '', $input);
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/api/Order.php */