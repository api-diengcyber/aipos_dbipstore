<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Xjson');
	}

	public function get_default_cart()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$id_toko = $this->input->post('id_toko');
		$id_users = $this->input->post('user_id');

        $ar_produk = [3,2,1,4,5,6,7];
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->where('pr.id_toko', $id_toko);
        $this->db->where_in('pr.id_produk_2', $ar_produk);
        $this->db->order_by('FIELD(pr.id_produk_2, '.implode(',', $ar_produk).')');
        $array_produk = $this->db->get()->result();

		$ar = [];

		foreach ($array_produk as $key) {
			$ar[] = [
				'id_produk_2' => $key->id_produk_2,
				'nama_produk' => $key->nama_produk,
				'harga' => $key->harga_1,
				'harga_1' => $key->harga_1,
				'harga_2' => $key->harga_2,
				'harga_3' => $key->harga_3,
				'mingros' => $key->mingros,
				'qty' => '',
				'total' => 0,
				'diskon_nominal' => '',
				'diskon' => 0,
			];
		}

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $ar);
		$this->xjson->result();
	}

	public function get_sales() 
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$nama = $this->input->post('query');

		$start_item = [[
			'nama' => '-- Tidak ada sales --',
			'id_users' => 0,
		]];

		$this->db->select('first_name AS nama, id_users');
		$this->db->from('users');
		$this->db->where('first_name LIKE "%'.$nama.'%"');
		$this->db->where('level', 2);
		$this->db->where('id_toko', $this->input->post('id_toko'));
		$data = $this->db->get()->result();

		$li = (array) array_merge($start_item, (array) $data);
		// sort($li);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $li);
		$this->xjson->result();
	}

	public function test() {
		echo 'here';
	}

	public function cek()
	{
		$row_orders = $this->penjualan_by_id(35,158);
		print_r($row_orders);
	}

	public function print_nota() {
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		// $id_toko = 159;
		// $id_users = 2;

		$id_toko = $this->input->post('id_toko');
		$id_users = $this->input->post('user_id');
		$id = $this->input->post('id');

		$row_orders = $this->penjualan_by_id($id,$id_toko);
        $bayar = $row_orders->bayar;

		$res_orders_detail = $this->db->select("orders_detail.*, produk_retail.barcode, produk_retail.nama_produk, produk_retail.harga_1, produk_retail.harga_2, produk_retail.harga_3, produk_retail.diskon AS diskon_produk, produk_retail.mingros")
										->from("orders_detail")
										->join("produk_retail", "orders_detail.id_produk = produk_retail.id_produk_2 AND produk_retail.id_toko=orders_detail.id_toko")
										->where('orders_detail.id_toko', $id_toko)
										->where("orders_detail.id_orders_2", $row_orders->id_orders_2)
										->get()->result();
		//$row_member = $this->db->where('id_toko', $id_toko)->where('id_member', $row_orders->pembeli)->get('member')->row();
		$row_member = $this->db->where('id_member', $row_orders->pembeli)->get('member')->row();
		
		$pembeli = array();
		$nama_pembeli = " - ";
		if ($row_member) { // MEMBER
			$pembeli = $row_member;
			$nama_pembeli = $row_member->nama;
		} else { 
			$row_orders_lain = $this->db->where('id_orders', $row_orders->id_orders_2)->get('orders_lainnya')->row();
			if ($row_orders_lain) { // PENJUALAN LAINNYA
				$nama_pembeli = $row_orders_lain->nama_pembeli;
			} else {
				if (!empty($row_orders->bukan_member)) {
					$nama_pembeli = $row_orders->bukan_member;
				} else {
					$nama_pembeli = $row_orders->pembeli;
				}
			}
		}
		$nama_kasir = "";
		$row_user = $this->db->where('id_users', $row_orders->id_users)->get('users')->row();
		
		if ($row_user) {
			$nama_kasir = $row_user->first_name;
		}
		$row_ucapan = $this->db->where('id_toko', $id_toko)->get('ucapan')->row();
		if(!empty($row_ucapan)){
			$ucapan = $row_ucapan->ucapan;
		}else{
			$ucapan = 'Terimakasih dan Selamat Berbelanja Kembali';
		}
		$row_fn = $this->db->select('*')
						->from('format_nota')
						->where('id_toko', $id_toko)
						->where('id_users', $id_users)
						->get()->row();
		$format_nota = 'kecil';
		if ($row_fn) {
			$format_nota = $row_fn->format;
		}

		//opsi diskon
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_opsi', 2);
        $opsi_diskon = $this->db->get('opsi')->row();

		$dataValue = array(
			'print' => 1,
			'toko' => $this->db->where('id', $id_toko)->get('toko')->row(),
			'orders' => $row_orders,
			'orders_detail' => $res_orders_detail,
			'nama_kasir' => $nama_kasir,
			'pembeli' => $pembeli,
			'nama_pembeli' => $nama_pembeli,
			'user' => $row_user,
			'bayar' => $bayar,
			'piutang' => [],
			'opsi_diskon' => (!empty($opsi_diskon))?$opsi_diskon->opsi:2,
			// 'piutang' => $this->Piutang_retail_model->get_by_no_faktur($faktur),
			// 'opsi_diskon' => $this->Pengaturan_opsi_model->get_opsi_diskon()->opsi,
			'faktur' => $row_orders->no_faktur,
			'ucapan' => $ucapan
		);

		$format = $this->input->post('format');
		if (!empty($format)) {
			$format_nota = $format;
		}
		
		$html = "";
// 		if ($format_nota == 'praktis2') {
//             $html = $this->load->view('retail/penjualan/cetak_nota_penjualan_praktis2', $dataValue,TRUE);
//         } else if ($format_nota == 'praktis') {
//             $html = $this->load->view('retail/penjualan/cetak_nota_penjualan_praktis', $dataValue,TRUE);
//         } else if ($format_nota == 'besar') {
//             $html = $this->load->view('retail/penjualan/cetak_nota_penjualan_besar', $dataValue,TRUE);
//         } else {
//             $html = $this->load->view('retail/penjualan/cetak_nota_penjualan', $dataValue,TRUE);
//         }
            $html = $this->load->view('admin/penjualan/cetak_nota_penjualan_besar', $dataValue,TRUE);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $html);
		$this->xjson->result();
	}

	function penjualan_by_id($id,$id_toko)
	{
		$this->db->where('id_toko', $id_toko);
		$this->db->where('id_orders', $id);
		return $this->db->get('orders')->row();
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

	public function get_expedisi() {
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$this->db->select('*');
		$this->db->from('expedisi');
		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_product() 
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$this->load->model('Mutasi_stok_model');
		
		$nama_produk = $this->input->post('query');
		$id_kategori = $this->input->post('kategori');

		$this->db->select('*, harga_1 AS harga, "" AS qty, "" AS diskon_nominal, 0 AS diskon, 0 AS total, CONCAT("'.base_url('assets/gambar_produk/').'",gambar) as url_gambar,produk_retail.id_kategori as id_kategori,kp.nama_kategori, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->db->from('produk_retail');
		$this->db->join('kategori_produk kp', 'kp.id_kategori_2 = produk_retail.id_kategori and kp.id_toko='.$this->input->post('id_toko'), 'left');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->input->post('id_toko'), null, 'produk_retail.id_produk_2');
		$this->db->where('(nama_produk LIKE "%'.$nama_produk.'%" OR barcode LIKE "%'.$nama_produk.'%")');
		$this->db->where('produk_retail.id_toko', $this->input->post('id_toko'));

		// if(!empty($id_kategori) && $id_kategori != "undefined"){
		// 	$this->db->where('kp.id_kategori',$id_kategori);
		// } else {
		// 	$this->db->where('(kp.id_kategori="1" OR kp.id_kategori="7")');
		// }
		$this->db->where('(kp.id_kategori="1" OR kp.id_kategori="7")');

		$this->db->limit(30);
		$this->db->order_by('kp.id_kategori ASC, TRIM(produk_retail.nama_produk) ASC');
		$this->db->group_by('produk_retail.id_produk');
		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_product_by_barcode() 
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$barcode = $this->input->post('barcode');

		$this->db->select('*,CONCAT("'.base_url('assets/gambar_produk/').'",gambar) as url_gambar,produk_retail.id_kategori as id_kategori,kp.nama_kategori');
		$this->db->from('produk_retail');
		$this->db->join('kategori_produk kp', 'kp.id_kategori_2 = produk_retail.id_kategori and kp.id_toko='.$this->input->post('id_toko'), 'left');
		$this->db->where('barcode LIKE "%'.$barcode.'%"');
		$this->db->where('produk_retail.id_toko', $this->input->post('id_toko'));
		// $this->db->limit(30);
		$this->db->group_by('produk_retail.id_produk');
		$data = $this->db->get()->row();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_member() 
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$nama_produk = $this->input->post('query');

		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('nama LIKE "%'.$nama_produk.'%"');
		$this->db->where('id_toko', $this->input->post('id_toko'));
		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_history_order()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		

		$id_user = $this->xjson->post('user_id');
		$id_toko = $this->xjson->post('id_toko');
		$query = $this->xjson->post('query');
		$dari = $this->xjson->post('dari');
		$sampai = $this->xjson->post('sampai');

		if(!empty($query)){
			$this->db->where('nama_pembeli = "'.$query.'" OR bukan_member = "'.$query.'" OR alamat_pembeli = "'.$query.'" OR no_faktur = "'.$query.'"');
		}

		$res_order = $this->db->select("*")
		->where("id_users",$id_user)
		->where("id_toko",$id_toko)
		->where("DATE(CONCAT(SUBSTRING(tgl_order,7,4),'-',SUBSTRING(tgl_order,4,2),'-',SUBSTRING(tgl_order,1,2))) BETWEEN '".$dari."' AND '".$sampai."'")
		->order_by('id_orders','desc')->get("orders")->result();

		$result = [];
		foreach ($res_order as $row_order) {
			$keterangan = ($row_order->nama_pembeli)?$row_order->nama_pembeli:$row_order->bukan_member.','.$row_order->alamat_pembeli.'<br>';
			$res_detail = $this->db->select("pr.nama_produk,od.jumlah")->from("orders_detail od")->join("produk_retail pr","pr.id_produk_2 = od.id_produk")->where('od.id_orders_2', $row_order->id_orders_2)->group_by("od.id_produk")->order_by('id_orders','desc')->get()->result();
			// foreach ($res_detail as $item) {
			// 	$keterangan .= $item->jumlah."(".$item->nama_produk."),";
			// }
			$keterangan .= 'Rp '.number_format($row_order->nominal,0,',','.');

			$result[] = (object)array(
					"id"=>$row_order->id_orders,
					"no"=>$row_order->no_faktur,
					"no_hp"=>(!empty($no_hp))?$no_hp:"",
					"status"=>(!empty($row_order->status))?$row_order->status:"",
					"keterangan"=>$keterangan,
					"keterangan_full"=>"",
					"tanggal_jam"=>$row_order->tgl_order.' '.$row_order->jam_order,
					"nama"=>($row_order->nama_pembeli)?$row_order->nama_pembeli:$row_order->bukan_member,
					"alamat"=>$row_order->alamat_pembeli,
					"nominal"=>'Rp '.number_format($row_order->nominal,0,',','.'),
					"resi"=>(!empty($row_order->no_resi))?$row_order->no_resi:"" 
				);
		}


		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	public function get_detail_order()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$id_toko = $this->input->post('id_toko');
		$id = $this->input->post('id');
		$query = $this->input->post('query');

        $this->db->select('o.*, o.nama_pembeli AS nama_kustomer, rj.id_retur AS id_retur, rj.id_retur, rj.total AS retur_total');
		$this->db->where("o.id_toko", $id_toko);
		if(!empty($id)){
		$this->db->where("o.id_orders", $id);
		}else if(!empty($query)){
		$this->db->where("o.no_faktur", $query);
		}
        $this->db->join('retur_jual rj', 'o.id_toko=rj.id_toko AND rj.no_faktur=o.no_faktur', 'left');
        $this->db->order_by("o.id_orders", "DESC");
		$data = $this->db->get("orders o")->row();
		
		if(!empty($data)){
		// $detail_order = $this->db->select('od.*, pr.nama_produk, pr.mingros, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, b.harga_satuan,o.diskon_member')
		// ->from('orders_detail od')
		// ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko=od.id_toko')
		// ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_toko=od.id_toko')
		// ->join('pembelian b', 'pr.id_produk_2=b.id_produk AND b.id_toko=pr.id_toko','left')
		// ->where('od.id_toko', $id_toko)
		// ->where('od.id_orders_2',$data->id_orders_2)
		// ->group_by('pr.id_produk_2')
		// ->get()->result();
		$detail_order = $this->db->select('od.*, IF(od.subtotal IS NOT NULL AND od.subtotal!="" AND od.subtotal!=0, od.subtotal, od.sub_total) AS subtotal, pr.nama_produk, pr.mingros, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, b.harga_satuan,o.diskon_member, od.harga_satuan AS hargabeli, rjd.jumlah AS jumlah_retur')
		->from('orders_detail od')
		->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko=od.id_toko')
		->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_toko=od.id_toko')
		->join('pembelian b', 'pr.id_produk_2=b.id_produk AND b.id_toko=pr.id_toko','left')
		->join('retur_jual_detail rjd', 'rjd.id_produk=od.id_produk AND rjd.id_toko=od.id_toko AND rjd.id_retur="'.$data->id_retur.'"','left')
		->where('od.id_toko', $id_toko)
		->where('od.id_orders_2',$data->id_orders_2)
		->group_by('pr.id_produk_2')
		->get()->result();
		}

		$data->detail_order = $detail_order;

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
	}

	public function get_order_by_id()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$this->db->select('*, 0 as cart');
		$this->db->from('laporan_order');
		$this->db->where('id', $this->xjson->post('id'));
		$data = $this->db->get()->row();
		
		$this->db->select('lod.id,lod.id_order,pr.id_produk_2,lod.jumlah as qty,pr.nama_produk,lod.harga');
		$this->db->from('laporan_order_detail lod');
		$this->db->join('produk_retail pr', 'pr.id_produk_2 = lod.id_produk');
		$this->db->where('lod.id_order', $this->input->post('id'));
		$data_detail = $this->db->get()->result();
		$data->cart = $data_detail;

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $this->utf8ize($data));
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
		$id_toko = $this->xjson->post('id_toko');

		$id_user = $this->xjson->post('user_id');
		$media = $this->xjson->post('media');
		$tanggal = $this->xjson->post('tanggal');
		$bank = $this->xjson->post('bank');
		$ongkir = $this->xjson->post('ongkir');
		$keterangan = $this->xjson->post('keterangan');
		$detail_pembeli = $this->xjson->post('detail_pembeli');
		$tanggal_transfer = $this->xjson->post('tanggal_transfer');
		$no_resi = $this->input->post('no_resi');

		$nama_pembeli = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$nominal = $this->input->post('nominal') * 1;
		$id_expedisi = $this->input->post('expedisi');
		$cart = $this->input->post('cart');
		$harga = $this->input->post('harga') * 1;
		$pembayaran = $this->input->post('pembayaran');
		$deadline = $this->input->post('deadline');
		$id_member = $this->input->post('id_member');
		$bayar = $this->input->post('bayar');
		$diskon_member = $this->input->post('diskon_member');

		$biaya_cod = $this->input->post('biaya_cod');
		$nama_pengirim = $this->input->post('nama_pengirim');
		$alamat_pengirim = $this->input->post('alamat_pengirim');
		$no_hp_pengirim = $this->input->post('no_hp_pengirim');
		$nama_penerima = $this->input->post('nama_penerima');
		$alamat_penerima = $this->input->post('alamat_penerima');
		$no_hp_penerima = $this->input->post('no_hp_penerima');

		$transfer = $this->input->post('transfer');

		$data = array(
			"id"=>$id,
			"id_toko"=>$id_toko,
			"id_cs"=>$id_user,
			"media"=>$media,
			"tanggal"=>date("d-m-Y"),
			"bank"=>!empty($bank) ? $bank : 0,
			"ongkir"=>!empty($ongkir) ? $ongkir : 0,
			"keterangan"=>!empty($keterangan) ? $keterangan : "",
			"detail_pembeli"=>!empty($detail_pembeli) ? $detail_pembeli : "",
			"tanggal_transfer"=>!empty($tanggal_transfer) ? $tanggal_transfer : "",
			"nama_pembeli"=>!empty($nama_pembeli) ? $nama_pembeli : "",
			"alamat"=>!empty($alamat) ? $alamat : "",
			"no_hp"=>!empty($no_hp) ? $no_hp : "",
			"nominal"=>!empty($nominal) ? $nominal : 0,
			"id_expedisi"=>!empty($id_expedisi) ? $id_expedisi : 0,
			"cart"=>!empty($cart) ? $cart : 0,
			"harga"=>!empty($harga) ? $harga : 0,
			"no_resi"=>!empty($no_resi) ? $no_resi : "",
			"pembayaran"=>!empty($pembayaran) ? $pembayaran : 0,
			"deadline"=>!empty($deadline) ? $deadline : 0,
			"id_member"=>!empty($id_member) ? $id_member : 0,
			"bayar"=>!empty($bayar) ? $bayar : 0,
			"diskon_member"=>!empty($diskon_member) ? $diskon_member : 0,
			"biaya_cod"=>!empty($biaya_cod) ? $biaya_cod : 0,
			"nama_pengirim"=>!empty($nama_pengirim) ? $nama_pengirim : "",
			"alamat_pengirim"=>!empty($alamat_pengirim) ? $alamat_pengirim : "",
			"no_hp_pengirim"=>!empty($no_hp_pengirim) ? $no_hp_pengirim : "",
			"nama_penerima"=>!empty($nama_penerima) ? $nama_penerima : "",
			"alamat_penerima"=>!empty($alamat_penerima) ? $alamat_penerima : "",
			"no_hp_penerima"=>!empty($no_hp_penerima) ? $no_hp_penerima : "",
			"transfer"=>!empty($transfer) ? $transfer : 0
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

	// get data by id produk
    function get_by_id_produk($id_produk, $id_toko)
    {
        $this->db->select('p.*, SUM(stok_produk.stok) AS stok');
        $this->db->from('pembelian AS p');
        $this->db->join('stok_produk', 'p.id_pembelian = stok_produk.id_pembelian AND stok_produk.id_toko = '.$id_toko, "left");
        $this->db->where('p.id_produk', $id_produk);
        $this->db->where('p.id_toko',$id_toko);
        // FIFO //
        $this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) ASC'); 
        $this->db->order_by('p.id_pembelian', 'ASC');
        // FIFO //
        return $this->db->get()->result();
    }

	function _save_order($data)
	{
		$this->load->model('Pembelian_retail_model');
		$this->load->model('Pengaturan_opsi_model');
		$this->load->model('Stok_produk_model');
		$this->load->model('Orders_detail_retail_model');
		$this->load->model('Piutang_retail_model');
		

		$last_order = $this->db->order_by('id_orders_2','desc')->get('orders', 1)->row();

		$data_order['id_orders_2'] = ((!empty($last_order) && $last_order->id_orders_2)?$last_order->id_orders_2:0) + 1;
		$data_order['id_users'] = $data['id_cs'];
		$data_order['id_toko'] = $data['id_toko'];
		$data_order['tgl_order'] = date('d-m-Y');
		$data_order['jam_order'] = date('H:i:s');
		$data_order['bayar'] = $data['bayar'];
		$data_order['diskon_member'] = $data['diskon_member'];

		$current_order = $data_order['id_orders_2'];

		$data_order['biaya_lain'] = $data['biaya_cod'];
		$data_order["p_nama"] = $data['nama_pengirim'];
		$data_order["p_alamat"] = $data['alamat_pengirim'];
		$data_order["p_hp"] = $data['no_hp_pengirim'];
		$data_order["d_nama"] = $data['nama_penerima'];
		$data_order["d_alamat"] = $data['alamat_penerima'];
		$data_order["d_hp"] = $data['no_hp_penerima'];

		$data_order["nominal_transfer"] = $data['transfer'];

		// $data_order['tanggal_transfer'] = $data['tanggal_transfer'];
		// $data_order['media'] = $data['media'];
		// $data_order['bank'] = $data['bank'];
		$data_order['bukan_member'] = $data['nama_pembeli'];
		$data_order['alamat_pembeli'] = $data['alamat'];
		// $data_order['no_hp'] = $data['no_hp'];
		$data_order['nominal'] = $this->only_number($data['harga']);
		// $data_order['ongkir'] = $this->only_number($data['ongkir']);
		// $data_order['keterangan'] = $data['keterangan'];
		// $data_order['id_expedisi'] = $data['id_expedisi'];
		// $data_order['harga'] = $data['harga'];
		// $data_order['no_resi'] = $data['no_resi'];


		$data_order['no_faktur'] = sprintf('%02d',$data['id_cs']).date("y").date("m").date("d").$current_order;


		$cek_invoice = $this->db->where('no_faktur', $data_order['no_faktur'])->get('orders')->row();
		if ($cek_invoice) {
			$data_order['no_faktur'] = $data['id_cs'].date("y").date("m").date("d").($current_order+1);
		}

		$nama_pembeli   = '';
		$alamat_kustomer = '';
		if(!empty($data['id_member']) && $data['id_member'] != "null"){
			$row_member = $this->db->where('id_member',$data['id_member'])->where('id_toko',$data['id_toko'])->get('member')->row();
			$data_order['nama_pembeli']   = $row_member->nama;
			$data_order['pembeli'] = $data['id_member'];
			$data_order['diskon_member'] = $data_order['nominal'] * ($row_member->diskon / 100);
		}

		$pembayaran = $data['pembayaran'];
		$data_order['pembayaran'] = $pembayaran;

		if($pembayaran=="1"){
            // tunai //
            $data_order['deadline'] = 0;
        } else if($pembayaran=="2"){
            // kredit //
            $deadline = $data['deadline'];
            $str_deadline = mktime(0,0,0,date('m'),date('d')+$deadline,date('Y'));
            $tgl_deadline = date('d-m-Y', $str_deadline);
            $row_last_piutang = $this->db->where('id_toko', $data['id_toko'])->order_by('id_piutang', 'desc')->get('piutang')->row();
            $id_piutang = 1;
            if ($row_last_piutang) {
                $id_piutang = $row_last_piutang->id_piutang + 1;
            }
            $data_piutang = array(
                'id_piutang' => $id_piutang,
                'id_toko' => $data['id_toko'],
                'no_faktur' => $data_order['no_faktur'],
                'id_pembeli' => $data['id_member'],
                'jumlah_hutang' => $data['nominal'],
                'jumlah_bayar' => $data['bayar'],
                'sisa' => $data['nominal'] - $data['bayar'],
                'tanggal' => date('d-m-Y'),
                'deadline' => $tgl_deadline,
            );
            $this->Piutang_retail_model->insert($data_piutang);
            
            $data_order['deadline'] = $deadline;
        }

		$last_order = $this->db->select('count(id_orders) + 1 as next_order')->where('tgl_order', date('d-m-Y'))->order_by('id_orders','desc ')->get('orders')->row();
		if(!empty($last_order)){
			$current_order = $last_order->next_order;
		}else{
			$current_order = 1;
		}
		
		//inserting data

		$this->db->insert('orders', $data_order);
		$id_orders = $this->db->insert_id();

		$orders = $this->db->where('id_orders', $id_orders)->get("orders")->row();

		$total_harga = 0;
        $total_laba = 0;	

		//insert orders detail
		$cart = json_decode(($data['cart'])?$data['cart']:'[{}]');
		foreach($cart as $produk) {
			if ($produk->qty > 0) {
				$res_pembelian = $this->get_by_id_produk($produk->id_produk_2, $data['id_toko']);
				
				$data_stok = 0;
				$hp_barang = 0;
				$sisa_beli = $produk->qty;
				$jml_sisa_stok = 0;
				$harga_satuan = 0;
	
				$harga_barang = $produk->total - $produk->diskon_nominal;
				$total_harga += $harga_barang;
				/* 
					pembelian
				*/
				$harga_satuan = 0;
				// get setting hpp
				$set_hpp = 0;
				// $row_set_hpp = $this->db->where('id_toko', $data['id_toko'])->get('setting_hpp')->row();
				// if ($row_set_hpp) {
				// 	$set_hpp = $row_set_hpp->setting_hpp;
				// }
				if ($set_hpp == 0 || $set_hpp == 1) { // HPP TERAKHIR PEMBELIAN
					$this->db->select('h.hpp_lifo');
					$this->db->from('hpp h');
					$this->db->where('h.id_produk', $produk->id_produk_2);
					$this->db->where('h.hpp_lifo > 0');
					$this->db->where('h.id_toko', $data['id_toko']);
					$this->db->order_by('h.id', 'desc');
					$row_hpp = $this->db->get()->row();
					if ($row_hpp) {
						$harga_satuan = $row_hpp->hpp_lifo;
					}else{
						$this->db->select('harga_satuan');
						$this->db->from('pembelian');
						$this->db->where('id_toko', $data['id_toko']);
						$this->db->where('id_produk', $produk->id_produk_2);
						$this->db->order_by('DATE(CONCAT(SUBSTRING(tgl_masuk,7,4),"-",SUBSTRING(tgl_masuk,4,2),"-",SUBSTRING(tgl_masuk,1,2))) DESC');
						$this->db->order_by('id', 'desc');
						$this->db->limit(1);
						$row_phs = $this->db->get()->row();
					if ($row_phs) {
						$harga_satuan = $row_phs->harga_satuan;
					}
					}
					
				} else if ($set_hpp == 2) { //  HPP RATA RATA PEMBELIAN
					$this->db->select('IFNULL(IFNULL(SUM(harga_satuan),0)/COUNT(id)),0) AS harga_satuan');
					$this->db->from('pembelian');
					$this->db->where('id_toko', $data['id_toko']);
					$this->db->where('id_produk', $produk->id_produk_2);
					$this->db->limit(1);
					$row_phs = $this->db->get()->row();
					if ($row_phs) {
						$harga_satuan = $row_phs->harga_satuan;
					}
				} else if ($set_hpp == 3) { // HPP FIFO PEMBELIAN
				}
	
				if (empty($harga_satuan)) {
					$this->db->select('h.hpp_lifo');
					$this->db->from('hpp h');
					$this->db->where('h.id_produk', $produk->id_produk_2);
					$this->db->where('h.hpp_lifo > 0');
					$this->db->where('h.id_toko', $data['id_toko']);
					$this->db->order_by('h.id', 'desc');
					$row_hpp = $this->db->get()->row();
					if ($row_hpp) {
						$harga_satuan = $row_hpp->hpp_lifo;
					}
				}
	
				// foreach ($res_pembelian as $pembelian) {
				//     $data_stok += $pembelian->stok;
				//     if($sisa_beli > $pembelian->stok){
				//         $k_beli = $pembelian->stok;
				//     } else {
				//         $k_beli = $sisa_beli;
				//     }
				//     //Opsi Minus Stok
				//     $qry = $this->Pengaturan_opsi_model->get_opsi_stok($data['id_toko']);
				//     if(!empty($qry) && $qry->opsi == 1){
				//         $k_beli = $sisa_beli;
				//     }
				//     //End Opsi Minus Stok
				//     $sisa_stok = $pembelian->stok - $k_beli;
				//     $jml_sisa_stok += $sisa_stok;
	
				//     // --- //
				//     $harga_satuan = $pembelian->harga_satuan;
				//     $hp_barang += $k_beli * $pembelian->harga_satuan;
				//     $data_sp = array(
				//         'stok' => $sisa_stok,
				//     );
				//     $this->Stok_produk_model->update_by_id_pembelian($pembelian->id_pembelian, $data_sp);
				//     // --- //
	
				//     $sisa_beli -= $pembelian->stok;
				//     if($sisa_beli > 0){
				//         $sisa_beli = $sisa_beli;
				//     } else {
				//         $sisa_beli = 0;
				//     }
				// }
	
				$hp_barang = $harga_satuan * $produk->qty;
				$total_laba += $harga_barang - $hp_barang;
	
				$data_temp = array(
					'id_orders_2' => $orders->id_orders_2,
					'id_toko' => $data['id_toko'],
					'id_produk' => $produk->id_produk_2,
					'jumlah' => $produk->qty,
					'harga_satuan' => $harga_satuan*1,
					'harga_jual' => $produk->harga*1,
					'subtotal' => $harga_barang,
					'potongan' => $produk->diskon_nominal,
				);
	
				$this->Orders_detail_retail_model->insert($data_temp);
	
				$stok_baru = $data_stok-$produk->qty;
				
				$this->db->query("UPDATE produk_retail SET dibeli = dibeli + ".$produk->qty." WHERE id_toko = ".$data['id_toko']);
			}
		}
		//end insert

		$update = array(
			'laba' => $total_laba,
			'laba_bersih' => $total_laba - $data_order['diskon_member'],
		);
		$this->db->where('id_orders', $id_orders);		
		$this->db->update('orders', $update);

		return (object)array("status"=>true,"append"=>true,"msg"=>"Order berhasil dibuat","data"=>$id_orders);
	}

	function _update_order($data)
	{
		$this->load->model('Pembelian_retail_model');

		$id = $data['id'];
		
		//update laporan order
		$data_order['id_cs'] = $data['id_cs'];
		$data_order['tanggal_transfer'] = $data['tanggal_transfer'];
		$data_order['media'] = $data['media'];
		$data_order['bank'] = $data['bank'];
		$data_order['bukan_member'] = $data['nama_pembeli'];
		$data_order['alamat_pembeli'] = $data['alamat'];
		$data_order['no_hp'] = $data['no_hp'];
		$data_order['nominal'] = $this->only_number($data['nominal']);
		$data_order['ongkir'] = $this->only_number($data['ongkir']);
		$data_order['keterangan'] = $data['keterangan'];
		$data_order['id_expedisi'] = $data['id_expedisi'];
		$data_order['harga'] = $data['harga'];
		$data_order['no_resi'] = $data['no_resi'];

		$this->db->where('id', $data['id']);
		$this->db->update('laporan_order', $data_order);
		//end update laporan order
		
		//update laporan detail
		$this->db->where('id_order', $data['id']);
		$this->db->delete('laporan_order_detail');

		$cart = json_decode(($data['cart'])?$data['cart']:'[{}]');
		foreach($cart as $produk) {
			$data_detail = array(
				"id_order"=>$data['id'],
				"id_produk"=>$produk->id_produk_2,
				"jumlah"=>$produk->qty,
				"harga"=>$produk->harga,
			);
			$this->db->insert('laporan_order_detail', $data_detail);
		}
		//end update laporan detail

		return (object)array("status"=>true,"append"=>false,"msg"=>"Perubahan berhasil disimpan","data"=>array());
	}

	private function only_number($input)
	{
		return preg_replace('/[^0-9]/', '', $input);
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/api/Order.php */