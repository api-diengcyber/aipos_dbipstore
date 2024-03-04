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

		$res_order = $this->db->select("no_resi,id as id_order,nama_pembeli,alamat,harga,no_invoice as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status")->where("id_cs",$id_user)->where("left(tanggal,10)",date("Y-m-d"))->order_by('id','desc')->get("laporan_order")->result();

		$result = [];
		foreach ($res_order as $row_order) {
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			$res_detail = $this->db->select("pr.nama_produk,lod.jumlah")->from("laporan_order_detail lod")->join("produk_retail pr","pr.id_produk = lod.id_produk")->where('id_order', $row_order->id_order)->order_by('id','desc')->get()->result();
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			$keterangan .= $row_order->harga;

			$result[] = (object)array(
					"no"=>$row_order->no,
					"status"=>$row_order->status,
					"keterangan"=>$keterangan,
					"resi"=>$row_order->no_resi
			 	);
		}


		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}


	public function get_history_order()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		

		$id_user = $this->xjson->post('user_id');

		$res_order = $this->db->select("no_resi,id as id_order,nama_pembeli,alamat,harga,no_invoice as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status")->where("id_cs",$id_user)->order_by('id','desc')->get("laporan_order")->result();

		$result = [];
		foreach ($res_order as $row_order) {
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			$res_detail = $this->db->select("pr.nama_produk,lod.jumlah")->from("laporan_order_detail lod")->join("produk_retail pr","pr.id_produk = lod.id_produk")->where('id_order', $row_order->id_order)->order_by('id','desc')->get()->result();
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			$keterangan .= $row_order->harga;

			$result[] = (object)array(
					"no"=>$row_order->no,
					"status"=>$row_order->status,
					"keterangan"=>$keterangan,
					"resi"=>$row_order->no_resi
			 	);
		}


		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	public function save_order()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$id_user = $this->xjson->post('user_id');
		$media = $this->xjson->post('media');
		$tanggal = $this->xjson->post('tanggal');
		$bank = $this->xjson->post('bank');
		$biaya_cod = $this->xjson->post('biaya_cod');
		$keterangan = $this->xjson->post('keterangan');
		$detail_pembeli = $this->xjson->post('detail_pembeli');
		$tanggal_transfer = $this->xjson->post('tanggal_transfer');

		$data = array(
			"id_cs"=>$id_user,
			"media"=>$media,
			"tanggal"=>date("d-m-Y"),
			"bank"=>$bank,
			"biaya_lain"=>$biaya_cod,
			"keterangan"=>$keterangan,
			"detail_pembeli"=>$detail_pembeli,
			"tanggal_transfer"=>$tanggal_transfer,
		);

		$proses = $this->_save_order($data);

		if($proses->status ==  true){
			$this->xjson->ok("Sukses");
			$this->xjson->add("data", $proses->data);
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
					    'id_users' => $id_user,
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

			$data_order['id_cs'] = $data['id_cs'];
			$data_order['tanggal_transfer'] = $data['tanggal_transfer'];
			$data_order['media'] = $data['media'];
			$data_order['bank'] = $data['bank'];
			$data_order['biaya_lain'] = $this->only_number($data['biaya_lain']);
			$data_order['nama_pembeli'] = $exploded[0];
			$data_order['alamat'] = $exploded[1];
			$data_order['no_hp'] = $exploded[2];
			$data_order['kodepos'] = $exploded[3];
			$data_order['harga'] = $this->only_number($exploded[6]);
			$data_order['ongkir'] = $this->only_number($exploded[7]);
			$data_order['selisih'] = $this->only_number($exploded[9]);

			$media = $data["media"];
			$data_order['nominal'] = 0;
			$data_order['saldo'] = 0;

			$last_order = $this->db->select('count(id) + 1 as next_order')->where('left(tanggal,10)', date('Y-m-d'))->order_by('id','desc ')->get('laporan_order')->row();
			if(!empty($last_order)){
				$current_order = $last_order->next_order;
			}else{
				$current_order = 1;
			}

			$data_order['no_invoice'] = $media.sprintf('%02d',$data['id_cs']).date("y").date("m").date("d").$current_order;


			$data_info = $exploded[8];
			if($media == 1 && $media == 4){
				$data_order['nominal'] = $this->only_number($data_info);
			}else if($media == 2 && $media == 3){
				$data_order['saldo'] = $this->only_number($data_info);
			}

			$this->db->insert('laporan_order', $data_order);
			$id_order = $this->db->insert_id();

			
			//insert laporan detail
			$hs = $exploded[4];
			$gc = $exploded[5];

			if($hs > 0){
				$data_detail = array(
					"id_order"=>$id_order,
					"id_produk"=>1,
					"jumlah"=>$hs
				);
				$this->db->insert('laporan_order_detail', $data_detail);
			}

			if($gc > 0){
				$data_detail = array(
					"id_order"=>$id_order,
					"id_produk"=>2,
					"jumlah"=>$gc
				);
				$this->db->insert('laporan_order_detail', $data_detail);
			}

			//send back result
			$row_order = $this->db->select("nama_pembeli,alamat,harga,no_invoice as no,CASE WHEN status = 1 THEN 'Menunggu Admin' WHEN status = 2 THEN 'Diproses' WHEN status = 3 THEN 'Dikirim' END as status,no_resi")->where('id', $id_order)->get("laporan_order")->row();
			$res_detail = $this->db->select("pr.nama_produk,lod.jumlah")->from("laporan_order_detail lod")->join("produk_retail pr","pr.id_produk = lod.id_produk")->where('id_order', $id_order)->get()->result();
			
			$keterangan = $row_order->nama_pembeli.','.$row_order->alamat.',';
			foreach ($res_detail as $item) {
				if($item->nama_produk == "HERBASKIN"){
					$keterangan .= $item->jumlah."(HS),";
				}else if($item->nama_produk == "GRACILLI"){
					$keterangan .= $item->jumlah."(GC),";
				}
			}
			$keterangan .= $row_order->harga;

			$result = (object)array(
						"no"=>$row_order->no,
						"status"=>$row_order->status,
						"keterangan"=>$keterangan,
						"resi"=>$row_order->no_resi,
					 );

			return (object)array("status"=>true,"data"=>$result);
		}
	}

	private function only_number($input)
	{
		return preg_replace('/[^0-9]/', '', $input);
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/api/Order.php */