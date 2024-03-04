<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');
    }
    
    public function index()
    {
        
    }

    public function get_data_retur() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        
        $this->db->select('r.id_retur, r.id_toko, r.tgl, r.no_retur, r.no_faktur, r.total');
        $this->db->from('retur_jual r');
        $this->db->where('r.id_toko', $id_toko);
        $this->db->order_by('r.id_retur', 'desc');
        $this->db->limit(100);
        $data = $this->db->get()->result();

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function get_detail_retur() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        $id = $this->input->post('id_retur');

        $data  = array();
        $row_retur = $this->db->select('rj.*, o.tgl_order, o.jam_order')
							  ->from('retur_jual rj')
                              ->join('orders o', 'rj.no_faktur=o.no_faktur AND rj.id_toko=o.id_toko')
							  ->where('rj.id_toko', $id_toko)
							  ->where('rj.id_retur', $id)
							  ->get()->row();
		if ($row_retur) {
            $pembeli = "";
            $diskon_member = '';
            $row_member = $this->db->select('*')
                                   ->from('member')
                                   ->where('id_toko', $id_toko)
                                   ->where('id_member', $row_retur->pembeli)
                                   ->get()->row();
            if ($row_member) {
                $diskon_member = $row_member->diskon;
                $pembeli = $row_member->nama.", Alamat : ".$row_member->alamat.", Telp : ".$row_member->telp."<br><span class='badge badge-warning'>Member</span>";
            } else {
                $pembeli = $row_retur->bukan_member." <br> <span class='badge badge-danger'>Bukan member</span> ";
            }

            $this->db->select('rd.*, p.nama_produk, p.mingros, p.harga_1, p.harga_2, p.harga_3, p.diskon AS diskon_produk, b.harga_satuan,r.diskon_member');
            $this->db->from('retur_jual_detail rd');
            $this->db->join('retur_jual r', 'rd.id_retur=r.id_retur AND r.id_toko="'.$id_toko.'"');
            $this->db->join('produk_retail p', 'rd.id_produk=p.id_produk_2 AND p.id_toko="'.$id_toko.'"');
            $this->db->join('pembelian AS b', 'p.id_produk_2=b.id_produk AND b.id_toko="'.$id_toko.'"','left');
            $this->db->where('r.id_toko', $id_toko);
            $this->db->where('rd.id_retur', $id);
            $this->db->group_by('p.id_produk_2');
            $res_retur_detail = $this->db->get()->result();

			$data = [
				'id_retur' => $row_retur->id_retur,
                'tgl' => $row_retur->tgl,
				'no_retur' => $row_retur->no_retur,
				'no_faktur' => $row_retur->no_faktur,
                'tgl_order' => $row_retur->tgl_order,
                'jam_order' => $row_retur->jam_order,
                'pembeli' => $pembeli,
                'diskon_member' => $row_retur->diskon_member,
                'nominal' => $row_retur->total,
                'data_detail' => $res_retur_detail,
            ];
        }else{
            $data = array();
        }

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function create_action_faktur() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $no_faktur = $this->input->post('no_faktur', true);
        $id_toko = $this->input->post('id_toko');
        $id_users = $this->input->post('user_id');
        
        
        $data = $this->_cek_faktur($id_toko, $no_faktur);
        $output = [];
		if ($data['status']=='1') {
            $row_last_retur = $this->db->select('id_retur')
                                        ->from('retur_jual')
                                        ->where('id_toko', $id_toko)
                                        ->order_by('id_retur', 'desc')
                                        ->get()->row();
            $id_retur = 1;
            if ($row_last_retur) {
                $id_retur = $row_last_retur->id_retur+1;
            }
	        $no_retur = $this->get_retur($id_toko);
            $data_retur_jual = array(
                'id_retur' => $id_retur,
                'id_toko' => $id_toko,
                'id_users' => $id_users,
                'no_retur' => $no_retur,
                'no_faktur' => $no_faktur,
                'tgl' => date('d-m-Y H:i:s'),
                'pembeli' => $data['data_orders']->pembeli,
                'bukan_member' => $data['data_orders']->bukan_member,
                'total' => $data['data_orders']->nominal,
                'diskon_member' => $data['data_orders']->diskon_member,
                'nama_pembeli' => $data['data_orders']->nama_pembeli,
                'alamat_pembeli'=> $data['data_orders']->alamat_pembeli,
            );
            $this->db->insert('retur_jual', $data_retur_jual);
            $setting_update_stok = 0;
            $row_setting_retur_jual = $this->db->select('*')
                                               ->from('setting_retur')
                                               ->where('id_toko', $id_toko)
                                               ->where('jenis', 'jual')
                                               ->get()->row();
            if ($row_setting_retur_jual) {
                $setting_update_stok = $row_setting_retur_jual->update_stok;
            }
			$res_orders_detail = $this->db->select('*')
										  ->from('orders_detail')
										  ->where('id_toko', $id_toko)
										  ->where('id_orders_2', $data['data_orders']->id_orders_2)
										  ->get()->result();
			foreach ($res_orders_detail as $key) {
                if ($setting_update_stok=='1') {
                    $row_stok_produk = $this->db->select('*')
                                                ->from('stok_produk')
                                                ->where('id_toko', $id_toko)
                                                ->where('id_produk', $key->id_produk)
                                                ->order_by('id', 'desc')
                                                ->get()->row();
                    if ($row_stok_produk) {
                        $data_stok = array(
                            'stok' => $row_stok_produk->stok+$key->jumlah,
                        );
                        $this->db->where('id', $row_stok_produk->id);
                        $this->db->update('stok_produk', $data_stok);
                    }
                }
                $data_temp = array(
                    'id_retur' => $id_retur,
                    'id_toko' => $id_toko,
                    'id_users' => $id_users,
                    'id_produk' => $key->id_produk,
                    'id_orders_detail' => $key->id_orders,
                    'jumlah' => $key->jumlah,
                    'harga_satuan' => $key->harga_satuan,
                    'harga_jual' => $key->harga_jual,
                    'diskon' => $key->diskon,
                    'potongan' => $key->potongan,
                    'subtotal' => $key->subtotal,
                );
                $this->db->insert('retur_jual_detail', $data_temp);
			}
        	$output =  json_encode(array(
        		'status' => 1,
        		'no_retur' => $no_retur
        	));
		} else {
			$output = json_encode($data);
        }
        
        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $output);
		$this->xjson->result();
    }

    public function create_action() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        $id_users = $this->input->post('id_users',TRUE);
        $tgl_retur = date('d-m-Y');
        $jam_retur = date('H:i:s');
        $no_retur = $this->get_retur($id_toko);
        $id_pembeli = $this->input->post('id_pembeli',TRUE);
        $pembeli = $this->input->post('pembeli',TRUE);
        $status_member = $this->input->post('status_member',TRUE);
        $nama_bukan_member = $this->input->post('nama_bukan_member',TRUE);
        $alamat_bukan_member = $this->input->post('alamat_bukan_member',TRUE);
        $pembayaran = $this->input->post('pembayaran',TRUE);
        $deadline = $this->input->post('deadline',TRUE);
        $deposit = str_replace('.', '', $this->input->post('deposit',TRUE));
        $deposit_pakai = str_replace('.', '', $this->input->post('deposit_pakai',TRUE));
        $total = str_replace('.', '', $this->input->post('nominal',TRUE));
        $statBayar = $this->input->post('statBayar',TRUE);
        $bayar = str_replace('.', '', $this->input->post('bayar',TRUE));
        $sisa = str_replace('.', '', $this->input->post('sisa',TRUE));
        $cb_deposit = (bool) $this->input->post('cb_deposit',TRUE);
        $diskon_member = $this->input->post('diskon_member',TRUE);
        $pembeli = $id_pembeli;
        $bukan_member = "";
        $cart = $this->input->post('cart',TRUE);

        if (!empty($id_pembeli)) { // BUKAN MEMBER
            if(!empty($nama_bukan_member)){
                $bukan_member = $nama_bukan_member." - ".$alamat_bukan_member;
            }else{
                $bukan_member = "";
            }
        } else if ($status_member == '2') { // MEMBER
            $bukan_member = "";
        }

        $row_last_retur = $this->db->select('id_retur')
                                    ->from('retur_jual')
                                    ->where('id_toko', $id_toko)
                                    ->order_by('id_retur', 'desc')
                                    ->get()->row();
        $id_retur = 1;

        if ($row_last_retur) {
            $id_retur = $row_last_retur->id_retur+1;
        }

        $nama_kustomer   = '';
        $alamat_kustomer = '';

        if (!empty($id_pembeli)) {
            $row_member = $this->db->where('id_member', $id_pembeli)->where('id_toko', $id_toko)->get('member')->row();
            $nama_kustomer   = $row_member->nama;
            $alamat_kustomer = $row_member->alamat;
        } else {
            $alamat_kustomer = $alamat_bukan_member;
        }
        $data = array(
            'id_retur' => $id_retur,
            'id_toko' => $id_toko,
            'id_users' => $id_users,
            'no_retur' => $no_retur,
            'tgl' => $tgl_retur.' '.$jam_retur,
            'pembeli' => $pembeli,
            'bukan_member' => $bukan_member,
            'total' => $total,
            'diskon_member' => $this->input->post('dm', true),
            'nama_kustomer' => $nama_kustomer,
            'alamat_pembeli'=> $alamat_kustomer,
        );
        $this->db->insert('retur_jual', $data);
        $setting_update_stok = 0;
        $row_setting_retur_jual = $this->db->select('*')
                                            ->from('setting_retur')
                                            ->where('id_toko', $id_toko)
                                            ->where('jenis', 'jual')
                                            ->get()->row();
        if ($row_setting_retur_jual) {
            $setting_update_stok = $row_setting_retur_jual->update_stok;
        }

        $result = $this->db->select('r.*, p.id_produk_2 AS produk_id, p.id_produk_2, p.nama_produk, p.diskon AS diskon_produk, p.mingros, p.dibeli')
                                ->from('retur_jual_temp r')
                                ->join('produk_retail p', 'r.id_produk = p.id_produk_2 AND p.id_toko="'.$id_toko.'"')
                                ->where('r.id_users', $id_users)
                                ->where('r.id_toko', $id_toko)
                                ->order_by('r.id', 'desc')
                                ->get()->result();
        $cart = json_decode(($cart)?$cart:'[{}]');
        foreach ($cart as $key) {
            $harga_satuan = 0;
            $res_pembelian = $this->get_by_id_produk($key->id_produk_2, $id_toko);
            foreach ($res_pembelian as $key2) {
                $harga_satuan = $key2->harga_satuan;
            }
            if ($setting_update_stok=='1') {
                $row_stok_produk = $this->db->select('*')
                                            ->from('stok_produk')
                                            ->where('id_toko', $id_toko)
                                            ->where('id_produk', $key->id_produk_2)
                                            ->order_by('id', 'desc')
                                            ->get()->row();
                if ($row_stok_produk) {
                    $data_stok = array(
                        'stok' => $row_stok_produk->stok+$key->jumlah,
                    );
                    $this->db->where('id', $row_stok_produk->id);
                    $this->db->update('stok_produk', $data_stok);
                }
            }
            $data_temp = array(
                'id_retur' => $id_retur,
                'id_toko' => $id_toko,
                'id_produk' => $key->id_produk_2,
                'jumlah' => $key->qty,
                'harga_satuan' => $setting_update_stok,
                'harga_jual' => $key->harga*1,
                'subtotal' => $key->qty*$key->harga,
            );
            $this->db->insert('retur_jual_detail', $data_temp);
        }
        $this->db->where('id_users', $id_users);
        $this->db->where('id_toko', $id_toko);
        $this->db->delete('retur_jual_temp');
        
        $data = array('no_retur' => $no_retur);

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    private function get_retur($id_toko)
    {
		$digit = 8;
        $row = $this->db->select('RIGHT(no_retur,'.$digit.') AS no')
                        ->from('retur_jual')
                        ->where('id_toko', $id_toko)
                        ->order_by('no_retur', 'desc')
                        ->get()->row();
        $no = 1;
        if ($row) {
        	$no = $row->no+1;
        }
        $kode = 'RJ'.sprintf('%0'.$digit.'d', $no);
        return $kode;
    }

    private function _cek_faktur($id_toko, $no_faktur)
	{
		$row_retur = $this->db->select('*')
							  ->from('retur_jual')
							  ->where('id_toko', $id_toko)
							  ->where('no_faktur', $no_faktur)
							  ->get()->row();
		$data_orders = array();
		$status = 0;
		$message = "";
		$action_link = "";
		if (!$row_retur) {
			$row_orders = $this->db->select('*')
								   ->from('orders')
								   ->where('id_toko', $id_toko)
								   ->where('no_faktur', $no_faktur)
								   ->get()->row();
			if ($row_orders) {
				$data_orders = $row_orders;
				$status = 1;
				$action_link = site_url().'laporan_retail/detail_faktur/'.$no_faktur;
			} else {
				$message = "No faktur tidak ditemukan";
			}
		} else {
			$message = "No faktur sudah ada";
		}
		$data = array(
			'data_orders' => $data_orders,
			'status' => $status,
			'message' => $message,
			'no_faktur' => $no_faktur,
			'action_link' => $action_link,
		);
		return $data;
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

}

/* End of file Retur.php */
