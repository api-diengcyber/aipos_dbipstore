<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_jual extends CI_Controller {

	public $active = array('active_retur_penjualan' => 'active');

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->library(array('ion_auth','form_validation'));
		$this->lang->load('auth');
        $this->load->model('Retur_jual_model');
        $this->load->model('Member_retail_model');
        $this->load->model('Pengaturan_opsi_model');
        $this->load->model('Produk_retail_model');
        $this->load->model('Pembelian_retail_model');
        $this->load->model('Pengaturan_transaksi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_outlet();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_retur_penjualan_create' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_outlet('retur_jual/retur_jual_list', $data);
	}

	public function read($id)
	{
		$row_retur = $this->db->select('*')
							  ->from('retur_jual')
							  ->where('id_toko', $this->userdata->id_toko)
							  ->where('id_retur', $id)
							  ->get()->row();
		if ($row_retur) {
            $pembeli = "";
            $diskon_member = '';
            $row_member = $this->db->select('*')
                                   ->from('member')
                                   ->where('id_toko', $this->userdata->id_toko)
                                   ->where('id_member', $row_retur->pembeli)
                                   ->get()->row();
            if ($row_member) {
                $diskon_member = $row_member->diskon;
                $pembeli = $row_member->nama.", Alamat : ".$row_member->alamat.", Telp : ".$row_member->telp."<br><span class='badge badge-warning'>Member</span>";
            } else {
                $pembeli = $row_retur->bukan_member." <br> <span class='badge badge-danger'>Bukan member</span> ";
            }
            $res_retur_detail = $this->db->select('rd.*, p.nama_produk, p.mingros, p.harga_1, p.harga_2, p.harga_3, p.diskon AS diskon_produk, b.harga_satuan,r.diskon_member')
                                        ->from('retur_jual_detail rd')
                                        ->join('retur_jual r', 'rd.id_retur=r.id_retur AND r.id_toko="'.$this->userdata->id_toko.'"')
                                        ->join('produk_retail p', 'rd.id_produk=p.id_produk_2 AND p.id_toko="'.$this->userdata->id_toko.'"')
                                        ->join('pembelian AS b', 'p.id_produk_2=b.id_produk AND b.id_toko="'.$this->userdata->id_toko.'"')
                                        ->where('r.id_toko', $this->userdata->id_toko)
                                        ->where('rd.id_retur', $id)
                                        ->group_by('p.id_produk_2')
                                        ->get()->result();
			$data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_retur_penjualan_create' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'level' => $this->userdata->level,
				'id_retur' => $row_retur->id_retur,
                'tgl' => $row_retur->tgl,
				'no_retur' => $row_retur->no_retur,
				'no_faktur' => $row_retur->no_faktur,
                'pembeli' => $pembeli,
                'diskon_member' => $row_retur->diskon_member,
                'nominal' => $row_retur->total,
                'ppn' => $row_retur->ppn,
                'total_ppn' => $row_retur->total_ppn,
                'data_detail' => $res_retur_detail,
			);
            $this->view->render_outlet('retur_jual/retur_jual_read', $data);
		} else {
            $this->session->set_flashdata('message', 'Record not found');
            redirect(site_url('outlet/retur_jual'));
		}
	}

	public function json()
	{
        header('Content-Type: application/json');
		echo $this->Retur_jual_model->json($this->userdata->id_toko);
	}

    public function json_cari_faktur()
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term', true);
        $res_faktur = $this->db->select('o.id_orders_2 AS value, CONCAT(o.no_faktur, " - ", IF(o.pembayaran="2", "Hutang", "Tunai"), " - ", o.tgl_order, " ", o.jam_order) AS label')
                               ->from('orders o')
                               ->join('users u', 'u.id_users=o.id_users AND u.id_toko=o.id_toko')
                               ->where('o.id_toko', $this->userdata->id_toko)
                               ->where('u.id_cabang', $this->userdata->id_cabang)
                               ->like('o.no_faktur', $term, 'both')
                               ->order_by('o.id_orders', 'desc')
                               ->limit(50)
                               ->get()->result();
        $data = array(
            'status' => 'ok',
            'data' => $res_faktur,
        );
        echo json_encode($data);
    }

    public function tabelTemp()
    {
        header('Content-Type: application/json');
        $id_orders = $this->input->post('id', true);
        $html = '';
        $row_orders = $this->db->select('o.*')
                               ->from('orders o')
                               ->join('users u', 'o.id_users=u.id_users AND o.id_toko=u.id_toko')
                               // ->join('piutang p', 'o.no_faktur=p.no_faktur AND o.id_toko=p.id_toko', 'left')
                               ->where('o.id_toko', $this->userdata->id_toko)
                               ->where('u.id_cabang', $this->userdata->id_cabang)
                               ->where('o.id_orders_2', $id_orders)
                               ->get()->row();
        $data_piutang = array(
            'jumlah_hutang' => 0,
            'sisa' => 0,
            'deadline' => 0,
        );
        if ($row_orders) {
            $row_piutang = $this->db->where('id_toko', $this->userdata->id_toko)->where('no_faktur', $row_orders->no_faktur)->get('piutang')->row();
            if ($row_piutang) {
                $data_piutang = array(
                    'jumlah_hutang' => $row_piutang->jumlah_hutang,
                    'sisa' => $row_piutang->sisa,
                    'deadline' => $row_piutang->deadline,
                );
            }
            $status = "ok";
            $res_detail = $this->db->select('od.*, pr.nama_produk, sp.satuan, SUM(rjd.jumlah) AS jumlah_retur')
                                   ->from('orders_detail od')
                                   ->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko')
                                   ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND od.id_toko=pr.id_toko')
                                   ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
                                   ->join('retur_jual_detail rjd', 'od.id_orders=rjd.id_orders_detail AND od.id_toko=rjd.id_toko', 'left')
                                   ->where('od.id_toko', $this->userdata->id_toko)
                                   ->where('u.id_cabang', $this->userdata->id_cabang)
                                   ->where('od.id_orders_2', $id_orders)
                                   ->group_by('od.id_orders')
                                   ->get()->result();
            $no = 0;
            foreach ($res_detail as $key) {
                $jumlah_tersedia_u_diretur = $key->jumlah-$key->jumlah_retur;
                if ($jumlah_tersedia_u_diretur > 0) {
                    $no++;
                    $harga_satuan_retur = ($key->subtotal/$key->jumlah);
                    $html .= '
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$key->nama_produk.' ('.$key->satuan.')</td>
                        <td class="text-center">'.$key->diskon.'</td>
                        <td class="text-center">'.$key->diskon2.'</td>
                        <td class="text-center">'.$key->diskon3.'</td>
                        <td class="text-right"><span class="harga_satuan" data-id="'.$key->id_orders.'">'.number_format($harga_satuan_retur,0,',','.').'</span></td>
                        <td class="text-right"><span class="jumlah_jual" data-id="'.$key->id_orders.'">'.$jumlah_tersedia_u_diretur.'</span></td>
                        <td style="padding:0px;background-color:yellow;"><input type="text" class="form-control text-right jumlah" name="jumlah['.$key->id_orders.']" data-id="'.$key->id_orders.'" style="border:none!important;background-color:yellow;color:#000;" /></td>
                        <td class="text-right"><span class="subtotal" data-id="'.$key->id_orders.'">0</span></td>
                    </tr>';
                }
            }
        } else {
            $status = "error";
        }
        $data = array(
            'status' => $status,
            'data' => array(
                'orders' => $row_orders,
                'piutang' => $data_piutang,
                'html' => $html,
            ),
        );
        echo json_encode($data);
    }
/*
	public function create()
	{
		$active = array('active_retur_penjualan_create' => 'active');
		$data = array(
			'action' => site_url().'outlet/retur_jual/create_action',
			'no_retur' => '',
            'id_modul' => $this->userdata->id_modul,
            'button' => 'Selesai',
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_users,
            'pembeli' => set_value('pembeli'),
            'pembayaran' => set_value('pembayaran'),
            'tgl_retur' => date("d-m-Y"),
            'nominal' => set_value('nominal'),
            'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            'opsi_pilihan' => $this->Pengaturan_opsi_model->get_opsi_pilihan(),
            'opsi_popup' => $this->Pengaturan_opsi_model->get_opsi_popup(),
		);
		$this->Tampilan_retail_model->tampilan('', $active, 'retail/retur_jual/retur_jual_form', $data);
	}

	public function create_action()
	{
        $this->_rules_create();
        if ($this->form_validation->run() == FALSE) {
            echo "Gagal";
        } else {
            $id_toko = $this->userdata->id_toko;
            $id_users = $this->input->post('id_users',TRUE);
            $tgl_retur = $this->input->post('tgl_retur',TRUE);
            $jam_retur = date("H:i:s");
            $no_retur = $this->get_retur();
            $id_pembeli = $this->input->post('id_pembeli',TRUE);
            $pembeli = $this->input->post('pembeli',TRUE);
            $status_member = $this->input->post('status_member',TRUE);
            $nama_bukan_member = $this->input->post('nama_bukan_member',TRUE);
            $alamat_bukan_member = $this->input->post('alamat_bukan_member',TRUE);
            $pembayaran = $this->input->post('pembayaran',TRUE);
            $deadline = $this->input->post('deadline',TRUE);
            $deposit = str_replace('.', '', $this->input->post('deposit',TRUE));
            $deposit_pakai = str_replace('.', '', $this->input->post('deposit_pakai',TRUE));
            $total = str_replace('.', '', $this->input->post('total',TRUE));
            $statBayar = $this->input->post('statBayar',TRUE);
            $bayar = str_replace('.', '', $this->input->post('bayar',TRUE));
            $sisa = str_replace('.', '', $this->input->post('sisa',TRUE));
            $cb_deposit = (bool) $this->input->post('cb_deposit',TRUE);
            $diskon_member = $this->input->post('diskon_member',TRUE);
            $pembeli = $id_pembeli;
            $bukan_member = "";
            if ($this->userdata->id_modul == '2') { // BASIC
                if ($status_member == '1') { // BUKAN MEMBER
                    if(!empty($nama_bukan_member)){
                        $bukan_member = $nama_bukan_member." - ".$alamat_bukan_member;
                    }else{
                        $bukan_member = "";
                    }
                } else if ($status_member == '2') { // MEMBER
                    $bukan_member = "";
                }
            }
            $row_last_retur = $this->db->select('id_retur')
                                        ->from('retur_jual')
                                        ->where('id_toko', $this->userdata->id_toko)
                                        ->order_by('id_retur', 'desc')
                                        ->get()->row();
            $id_retur = 1;
            if ($row_last_retur) {
                $id_retur = $row_last_retur->id_retur+1;
            }
            $nama_kustomer   = '';
            $alamat_kustomer = '';
            if (!empty($id_pembeli)) {
                $row_member = $this->db->where('id_member', $id_pembeli)->where('id_toko', $this->userdata->id_toko)->get('member')->row();
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
                'diskon_member' => $this->input->post('dm'),
                'nama_kustomer' => $nama_kustomer,
                'alamat_pembeli'=> $alamat_kustomer,
            );
            $this->db->insert('retur_jual', $data);
            $data_jurnal_debet = array(
                'id_toko' => $this->userdata->id_toko,
                'kode' => 'RT-RETUR-PENJUALAN',
                'tgl' => date('d-m-Y'),
                'id_akun' => 62, // RETUR PENJUALAN
                'keterangan' => 'Retur Penjualan ('.$no_retur.') Total = '.$total.', tgl = '.date('d-m-Y'),
                'debet' => $total
            );
            $this->db->insert('jurnal', $data_jurnal_debet);
            $data_jurnal_kredit = array(
                'id_toko' => $this->userdata->id_toko,
                'kode' => 'RT-RETUR-PENJUALAN',
                'tgl' => date('d-m-Y'),
                'id_akun' => 67, // KAS BESAR
                'keterangan' => 'Retur Penjualan ('.$no_retur.') Total = '.$total.', tgl = '.date('d-m-Y'),
                'kredit' => $total
            );
            $this->db->insert('jurnal', $data_jurnal_kredit);
            $setting_update_stok = 0;
            $row_setting_retur_jual = $this->db->select('*')
            								   ->from('setting_retur')
            								   ->where('id_toko', $this->userdata->id_toko)
            								   ->where('jenis', 'jual')
            								   ->get()->row();
            if ($row_setting_retur_jual) {
            	$setting_update_stok = $row_setting_retur_jual->update_stok;
            }
	        $result = $this->db->select('r.*, p.id_produk_2 AS produk_id, p.id_produk_2, p.nama_produk, p.diskon AS diskon_produk, p.mingros, p.dibeli')
				        		 ->from('retur_jual_temp r')
				        		 ->join('produk_retail p', 'r.id_produk = p.id_produk_2 AND p.id_toko="'.$this->userdata->id_toko.'"')
				        		 ->where('r.id_users', $id_users)
				        		 ->where('r.id_toko', $this->userdata->id_toko)
				        		 ->order_by('r.id', 'desc')
				        		 ->get()->result();
            foreach ($result as $key) { 
                $harga_satuan = 0;
                $res_pembelian = $this->Pembelian_retail_model->get_by_id_produk($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key2) {
                    $harga_satuan = $key2->harga_satuan;
                }
                //if ($setting_update_stok=='1') {
                	$row_stok_produk = $this->db->select('*')
                								->from('stok_produk')
                								->where('id_toko', $this->userdata->id_toko)
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
                //}
                $data_temp = array(
                    'id_retur' => $id_retur,
                    'id_toko' => $id_toko,
                    'id_produk' => $key->id_produk_2,
                    'jumlah' => $key->jumlah,
                    'harga_satuan' => $harga_satuan,
                    'harga_jual' => $key->harga_jual*1,
                    'subtotal' => $key->jumlah*$key->harga_jual,
                );
                $this->db->insert('retur_jual_detail', $data_temp);
            }
            $this->db->where('id_users', $id_users);
            $this->db->where('id_toko', $id_toko);
            $this->db->delete('retur_jual_temp');
            echo json_encode(array('no_retur' => $no_retur));
        }
	}*/

    public function create()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_retur_penjualan_create' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'action' => site_url().'outlet/retur_jual/create_action',
            'id_toko' => $this->userdata->id_toko,
            'nama_cs' => set_value('nama_cs'),
            'tgl_retur' => set_value('tgl_retur', date("d-m-Y")),
        );
        $this->view->render_outlet('retur_jual/retur_jual_form', $data);
    }

    private function get_retur()
    {
        $digit = 8;
        $row = $this->db->select('RIGHT(no_retur,'.$digit.') AS no')
                        ->from('retur_jual')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->order_by('no_retur', 'desc')
                        ->get()->row();
        $no = 1;
        if ($row) {
            $no = $row->no+1;
        }
        $kode = 'RJ'.sprintf('%0'.$digit.'d', $no);
        return $kode;
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $tgl_retur = $this->input->post('tgl_retur', true);
            $id_faktur = $this->input->post('id_faktur', true);
            $jumlah = $this->input->post('jumlah');
            $row_faktur = $this->db->select('o.*')
                                   ->from('orders o')
                                   ->join('users u', 'o.id_users=u.id_users AND o.id_toko=u.id_toko')
                                   ->where('o.id_toko', $this->userdata->id_toko)
                                   ->where('u.id_cabang', $this->userdata->id_cabang)
                                   ->where('o.id_orders_2', $id_faktur)
                                   ->get()->row();
            if ($row_faktur) {
                $array_detail = array();
                $total = 0;
                $ppn_no = 0;
                $total_ppn = 0;
                $i = 0;
                foreach ($jumlah as $id_orders => $value) {
                    $row_od = $this->db->select('od.*')
                                       ->from('orders_detail od')
                                       ->where('od.id_toko', $this->userdata->id_toko)
                                       ->where('od.id_orders', $id_orders)
                                       ->where('od.id_orders_2', $id_faktur)
                                       ->get()->row();
                    if ($row_od && $value > 0) {
                        $harga_satuan_retur = round($row_od->subtotal/$row_od->jumlah);

                        $subtotal = $value*$harga_satuan_retur;
                        $ppn = (10/100) * $subtotal;
                        $subtotal_ppn = $subtotal+$ppn;
                        $total += $subtotal;
                        $ppn_no += $ppn;
                        $total_ppn += $subtotal_ppn;

                        $array_detail[$i] = array(
                            'id_retur' => '',
                            'id_toko' => $this->userdata->id_toko,
                            'id_users' => $this->userdata->id_users,
                            'id_produk' => $row_od->id_produk,
                            'id_orders_detail' => $row_od->id_orders,
                            'jumlah' => $value,
                            'harga_satuan' => $row_od->harga_satuan,
                            'harga_jual' => $harga_satuan_retur,
                            'subtotal' => $subtotal,
                            'json_beli' => $row_od->json,
                        );
                        $i++;
                    }
                }
                if ($total > 0) {
                    $id_retur = 1;
                    $row_last_retur = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_retur', 'desc')->get('retur_jual')->row();
                    if ($row_last_retur) {
                        $id_retur = $row_last_retur->id_retur+1;
                    }
                    $data_insert = array(
                        'id_retur' => $id_retur,
                        'id_toko' => $this->userdata->id_toko,
                        'id_users' => $this->userdata->id_users,
                        'tgl' => $tgl_retur.' '.date('H:i:s'),
                        'no_retur' => $this->get_retur(),
                        'no_faktur' => $row_faktur->no_faktur,
                        'total' => $total,
                        'ppn' => $ppn_no,
                        'total_ppn' => $total_ppn,
                    );
                    $this->db->insert('retur_jual', $data_insert);
                    foreach ($array_detail as $key) {
                        $key['id_retur'] = $id_retur;
                        $array_beli = (array) json_decode($key['json_beli']);
                        $this->loopretur($array_beli, $key['jumlah'], true);
                        array_splice($key, count($key)-1, 1);
                        $this->db->insert('retur_jual_detail', $key);
                    }
                    $jenis = "otomatis";
                    eval($this->Pengaturan_transaksi_model->accounting('buatreturjual'));
                    $this->session->set_flashdata('message', 'Create record success');
                } else {
                    $this->session->set_flashdata('message', 'Create record failed');
                }
            } else {
                $this->session->set_flashdata('message', 'Create record failed');
            }
            redirect(site_url('outlet/retur_jual'));
        }
    }

    private function loopretur($array_beli = array(), $jumlah, $start = false)
    {
        if ($start!=true) {
            $qty = next($array_beli);
        } else {
            $qty = current($array_beli);
        }
        $id_pembelian = key($array_beli);
        if (!empty($id_pembelian) && $jumlah > 0) {
            $row = $this->db->select('sp.id AS id_sp, sp.stok')
                            ->from('pembelian p')
                            ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
                            ->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND p.id_toko=sp.id_toko')
                            ->where('p.id_toko', $this->userdata->id_toko)
                            ->where('p.id_pembelian', $id_pembelian)
                            ->where('u.id_users', $this->userdata->id_users)
                            ->get()->row();
            if ($row) {
                $jumlah -= $qty;
                $jumlah_kembali = $jumlah*-1;
                if ($jumlah_kembali < 0) {
                    $jumlah_kembali = 0;
                }
                // echo $qty." :: ".$jumlah_kembali." = ".($qty-$jumlah_kembali)."<br>";
                $data_update = array(
                    'stok' => $row->stok+($qty-$jumlah_kembali)
                );
                $this->db->where('id', $row->id_sp);
                $this->db->update('stok_produk', $data_update);
                $this->loopretur($array_beli, $jumlah);
            }
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('tgl_retur', 'tgl_retur', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    /*public function delete($id)
    {
        $row_retur = $this->db->select('*')
                              ->from('retur_jual')
                              ->where('id_toko', $this->userdata->id_toko)
                              ->where('id_retur', $id)
                              ->get()->row();
        if ($row_retur) {
            $res_retur_detail = $this->db->select('*')
                                         ->from('retur_jual_detail')
                                         ->where('id_toko', $this->userdata->id_toko)
                                         ->where('id_retur', $row_retur->id_retur)
                                         ->get()->result();
            foreach ($res_retur_detail as $key) {
                $row_stok_produk = $this->db->select('*')
                                            ->from('stok_produk')
                                            ->where('id_toko', $this->userdata->id_toko)
                                            ->where('id_produk', $key->id_produk)
                                            ->order_by('id', 'desc')
                                            ->get()->row();
                if ($row_stok_produk) {
                    $data_stok = array(
                        'stok' => $row_stok_produk->stok-$key->jumlah,
                    );
                    $this->db->where('id', $row_stok_produk->id);
                    $this->db->update('stok_produk', $data_stok);
                }
            }
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_retur', $row_retur->id_retur);
            $this->db->delete('retur_jual_detail');
            $this->db->where('id', $row_retur->id);
            $this->db->delete('retur_jual');
            $this->session->set_flashdata('message', 'Delete record success');
            redirect(site_url('outlet/retur_jual'));
        } else {
            $this->session->set_flashdata('message', 'Delete record failed');
            redirect(site_url('outlet/retur_jual'));
        }
    }*/

    private function loopbackretur($array_beli = array(), $jumlah, $start = false)
    {
        if ($start!=true) {
            $qty = next($array_beli);
        } else {
            $qty = current($array_beli);
        }
        $id_pembelian = key($array_beli);
        if (!empty($id_pembelian) && $jumlah > 0) {
            $row = $this->db->select('sp.id AS id_sp, sp.stok')
                            ->from('pembelian p')
                            ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
                            ->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND p.id_toko=sp.id_toko')
                            ->where('p.id_toko', $this->userdata->id_toko)
                            ->where('p.id_pembelian', $id_pembelian)
                            ->where('u.id_users', $this->userdata->id_users)
                            ->get()->row();
            if ($row) {
                $jumlah -= $qty;
                $jumlah_kembali = $jumlah*-1;
                if ($jumlah_kembali < 0) {
                    $jumlah_kembali = 0;
                }
                // echo $row->stok." :: ".($qty-$jumlah_kembali)." =  ".($row->stok-($qty-$jumlah_kembali))."<br>";
                $data_update = array(
                    'stok' => $row->stok-($qty-$jumlah_kembali)
                );
                $this->db->where('id', $row->id_sp);
                $this->db->update('stok_produk', $data_update);
                $this->loopbackretur($array_beli, $jumlah);
            }
        }
    }

    public function delete($id)
    {
        $row_retur = $this->db->select('rj.*')
                              ->from('retur_jual rj')
                              ->join('users u', 'rj.id_users=u.id_users AND rj.id_toko=u.id_toko')
                              ->where('rj.id_toko', $this->userdata->id_toko)
                              ->where('rj.id_retur', $id)
                              ->where('u.id_users', $this->userdata->id_users)
                              ->get()->row();
        if ($row_retur) {
            $res_retur_detail = $this->db->select('rjd.*, od.json')
                                         ->from('retur_jual_detail rjd')
                                         ->join('users u', 'rjd.id_users=u.id_users AND rjd.id_toko=u.id_toko')
                                         ->join('orders_detail od', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko')
                                         ->where('rjd.id_toko', $this->userdata->id_toko)
                                         ->where('rjd.id_retur', $row_retur->id_retur)
                                         ->where('u.id_users', $this->userdata->id_users)
                                         ->group_by('rjd.id')
                                         ->get()->result();
            foreach ($res_retur_detail as $key) {
                $json_pembelian = (array) json_decode($key->json);
                $this->loopbackretur($json_pembelian, $key->jumlah, true);
            }
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_retur', $row_retur->id_retur);
            $this->db->delete('retur_jual_detail');
            $this->db->where('id', $row_retur->id);
            $this->db->delete('retur_jual');
            $this->session->set_flashdata('message', 'Delete record success');
            redirect(site_url('outlet/retur_jual'));
        } else {
            $this->session->set_flashdata('message', 'Delete record failed');
            redirect(site_url('outlet/retur_jual'));
        }
    }

    public function create_manual($value='')
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_retur_penjualan_create' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'action' => site_url().'outlet/retur_jual/create_action_manual',
            'no_retur' => '',
            'id_modul' => $this->userdata->id_modul,
            'button' => 'Selesai',
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_users,
            'pembeli' => set_value('pembeli'),
            'pembayaran' => set_value('pembayaran'),
            'tgl_retur' => date("d-m-Y"),
            'nominal' => set_value('nominal'),
            'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            'opsi_pilihan' => $this->Pengaturan_opsi_model->get_opsi_pilihan(),
            'opsi_popup' => $this->Pengaturan_opsi_model->get_opsi_popup(),
        );
        $this->view->render_outlet('retur_jual/retur_jual_form_manual', $data);
    }

    private function cek_stok_produk($barcode)
    {
        $data = array();
        $row_produk = $this->db->select('pr.*')
                               ->from('produk_retail pr')
                               ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                               ->where('pr.id_toko', $this->userdata->id_toko)
                               ->where('u.id_cabang', $this->userdata->id_cabang)
                               ->where('pr.barcode', $barcode)
                               ->get()->row();
        $stok = 0;
        if ($row_produk) {
            $row_qty_penjualan = $this->db->select('SUM(od.jumlah+od.jumlah_bonus) AS qty')
                                          ->from('orders_detail od')
                                          ->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko')
                                          ->where('od.id_toko', $this->userdata->id_toko)
                                          ->where('od.id_produk', $row_produk->id_produk_2)
                                          ->where('u.id_cabang', $this->userdata->id_cabang)
                                          ->get()->row();
            $qty_jual = 0;
            if ($row_qty_penjualan) {
                $qty_jual = $row_qty_penjualan->qty;
            }
            $row_qty_retur = $this->db->select('SUM(rjd.jumlah) qty')
                                      ->from('retur_jual_detail rjd')
                                      ->join('users u', 'rjd.id_users=u.id_users AND rjd.id_toko=u.id_toko')
                                      ->where('rjd.id_toko', $this->userdata->id_toko)
                                      ->where('rjd.id_produk', $row_produk->id_produk_2)
                                      ->where('u.id_cabang', $this->userdata->id_cabang)
                                      ->get()->row();
            $qty_retur = 0;
            if ($row_qty_retur) {
                $qty_retur = $row_qty_retur->qty;
            }
            $row_qty_retur_tmp = $this->db->select('SUM(rjt.jumlah) qty')
                                      ->from('retur_jual_temp rjt')
                                      ->join('users u', 'rjt.id_users=u.id_users AND rjt.id_toko=u.id_toko')
                                      ->where('rjt.id_toko', $this->userdata->id_toko)
                                      ->where('rjt.id_produk', $row_produk->id_produk_2)
                                      ->where('u.id_cabang', $this->userdata->id_cabang)
                                      ->get()->row();
            $qty_retur_tmp = 0;
            if ($row_qty_retur_tmp) {
                $qty_retur_tmp = $row_qty_retur_tmp->qty;
            }
            $stok = $qty_jual-$qty_retur-$qty_retur_tmp;
        } else {
        }
        // echo json_encode($data);
        return $stok;
    }

    public function insert_temp_manual()
    {
        header('Content-Type: application/json');
        $barcode = $this->input->post('barcode', true);
        $data = array();
        $row_produk = $this->db->select('pr.*')
                               ->from('produk_retail pr')
                               ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                               ->where('pr.id_toko', $this->userdata->id_toko)
                               ->where('pr.barcode', $barcode)
                               ->where('u.id_cabang', $this->userdata->id_cabang)
                               ->get()->row();
        if ($row_produk) {
            $data['status'] = 'ok';
            $stok_ada = $this->cek_stok_produk($barcode);
            if ($stok_ada > 0) {
                $row_last_pembelian = $this->db->select('p.*')
                                             ->from('pembelian p')
                                             ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
                                             ->where('p.id_toko', $this->userdata->id_toko)
                                             ->where('p.id_produk', $row_produk->id_produk_2)
                                             ->where('u.id_cabang', $this->userdata->id_cabang)
                                             ->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
                                             ->order_by('p.id_pembelian', 'desc')
                                             ->get()->row();
                $harga_satuan = $row_produk->harga_1;
                if ($row_last_pembelian) {
                    $harga_satuan = $row_last_pembelian->harga_satuan;
                }
                $row = $this->db->select('rjt.*')
                                ->from('retur_jual_temp rjt')
                                ->where('rjt.id_toko', $this->userdata->id_toko)
                                ->where('rjt.id_users', $this->userdata->id_users)
                                ->where('rjt.id_produk', $row_produk->id_produk_2)
                                ->get()->row();
                if ($row) {
                    $data_update = array(
                        'jumlah' => $row->jumlah+1,
                    );
                    $this->db->where('id', $row->id);
                    $this->db->update('retur_jual_temp', $data_update);
                } else {
                    $data_insert = array(
                        'id_toko' => $this->userdata->id_toko,
                        'id_users' => $this->userdata->id_users,
                        'id_produk' => $row_produk->id_produk_2,
                        'harga_satuan' => $harga_satuan,
                        'harga_jual' => $row_produk->harga_1,
                        'jumlah' => 1,
                        'diskon' => 0,
                        'potongan' => 0,
                        'manual' => 1,
                    );
                    $this->db->insert('retur_jual_temp', $data_insert);
                }
            }
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    }

    public function tabelTempManual()
    {
        header('Content-Type: application/json');
        $data = array();
        $html = '';
        $res_temp = $this->db->select('rjt.*, pr.nama_produk, pr.barcode')
                             ->from('retur_jual_temp rjt')
                             ->join('produk_retail pr', 'rjt.id_produk=pr.id_produk_2 AND rjt.id_toko=pr.id_toko')
                             ->where('rjt.id_toko', $this->userdata->id_toko)
                             ->where('rjt.id_users', $this->userdata->id_users)
                             ->where('rjt.manual', 1)
                             ->get()->result();
        $no = 1;
        $total = 0;
        $ppn_no = 0;
        $total_ppn = 0;
        foreach ($res_temp as $key) {
            $stok_ada = $this->cek_stok_produk($key->barcode);
            $subtotal = $key->harga_jual*$key->jumlah;
            $ppn = (10/100) * $subtotal;
            $subtotal_ppn = $subtotal+$ppn;
            $total += $subtotal;
            $ppn_no += $ppn;
            $total_ppn += $subtotal_ppn;
            $html .= '
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$key->nama_produk.'</td>
                    <td class="text-right" style="padding:0px;background-color:yellow;"><input type="text" class="form-control text-right harga" style="border:none;background-color:yellow;color:#000;" value="'.number_format($key->harga_jual,0,',','.').'" data-id="'.$key->id.'"></td>
                    <td class="text-center">'.$stok_ada.'</td>
                    <td style="padding:0px;background-color:yellow;"><input type="text" class="form-control text-right jumlah" style="border:none;background-color:yellow;color:#000;" value="'.$key->jumlah.'" data-id="'.$key->id.'"></td>
                    <td class="text-right">'.number_format($subtotal,0,',','.').'</td>
                </tr>
            ';
            $no++;
        }
        $data['status'] = 'ok';
        $data['html'] = $html;
        $data['total'] = $total;
        $data['ppn_nominal'] = $ppn_no;
        $data['total_ppn'] = $total_ppn;
        echo json_encode($data);
    }

    public function update_temp_manual()
    {
        header('Content-Type: application/json');
        $data = array();
        $id = $this->input->post('id', true);
        $harga = $this->input->post('harga', true);
        $jumlah = $this->input->post('jumlah', true);
        $data_update = array();
        if (!empty($harga)) {
            $data_update['harga_jual'] = $harga;
        }
        if (!empty($jumlah)) {
            $data_update['jumlah'] = $jumlah;
        }
        $this->db->where('id', $id);
        $this->db->update('retur_jual_temp', $data_update);
        $data['status'] = 1;
        echo json_encode($data);
    }

    public function create_action_manual()
    {
        $this->_rules_manual();
        if ($this->form_validation->run() == FALSE) {
            $this->create_manual();
        } else {
            $tgl_retur = $this->input->post('tgl_retur', true);
            $jenis = $this->input->post('jenis', true);
            $id_pembeli = $this->input->post('id_pembeli', true);
            $nama_pembeli = $this->input->post('nama_pembeli', true);
            $res_temp = $this->db->select('rjt.*, pr.nama_produk, pr.barcode')
                                 ->from('retur_jual_temp rjt')
                                 ->join('produk_retail pr', 'rjt.id_produk=pr.id_produk_2 AND rjt.id_toko=pr.id_toko')
                                 ->where('rjt.id_toko', $this->userdata->id_toko)
                                 ->where('rjt.id_users', $this->userdata->id_users)
                                 ->where('rjt.manual', 1)
                                 ->get()->result();
            $total = 0;
            $ppn_no = 0;
            $total_ppn = 0;
            $i = 0;
            $array_detail = array();
            foreach ($res_temp as $key) :
                $subtotal = $key->harga_jual*$key->jumlah;
                $ppn = (10/100) * $subtotal;
                $subtotal_ppn = $subtotal+$ppn;
                $total += $subtotal;
                $ppn_no += $ppn;
                $total_ppn += $subtotal_ppn;
                $array_detail[$i] = array(
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $this->userdata->id_users,
                    'id_produk' => $key->id_produk,
                    'jumlah' => $key->jumlah,
                    'harga_satuan' => $key->harga_satuan,
                    'harga_jual' => $key->harga_jual,
                    'diskon' => $key->diskon,
                    'potongan' => $key->potongan,
                    'subtotal' => $subtotal,
                );
                $i++;
            endforeach;
            if ($total_ppn > 0) {
                $id_retur = 1;
                $row_last_retur = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_retur', 'desc')->get('retur_jual')->row();
                if ($row_last_retur) {
                    $id_retur = $row_last_retur->id_retur+1;
                }
                foreach ($array_detail as $key):
                    $key['id_retur'] = $id_retur;
                    $row_last_pembelian = $this->db->select('p.*, sp.stok')
                                                   ->from('pembelian p')
                                                   ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
                                                   ->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND p.id_toko=sp.id_toko')
                                                   ->where('p.id_toko', $this->userdata->id_toko)
                                                   ->where('u.id_cabang', $this->userdata->id_cabang)
                                                   ->where('p.id_produk', $key['id_produk'])
                                                   ->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
                                                   ->order_by('p.id_pembelian', 'desc')
                                                   ->get()->row();
                    if ($row_last_pembelian) {
                        $data_update = array(
                            'stok' => $row_last_pembelian->stok+$key['jumlah']
                        );
                        $this->db->where('id_pembelian', $row_last_pembelian->id_pembelian);
                        $this->db->update('stok_produk', $data_update);
                    }
                    $this->db->insert('retur_jual_detail', $key);
                endforeach;
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_users', $this->userdata->id_users);
                $this->db->where('manual', 1);
                $this->db->delete('retur_jual_temp');
                $data_insert = array(
                    'id_retur' => $id_retur,
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $this->userdata->id_users,
                    'tgl' => $tgl_retur.' '.date('H:i:s'),
                    'no_retur' => $this->get_retur(),
                    'total' => $total,
                    'ppn' => $ppn_no,
                    'total_ppn' => $total_ppn,
                );
                if (!empty($id_pembeli)) {
                    $data_insert['pembeli'] = $id_pembeli;
                } else {
                    $data_insert['bukan_member'] = $nama_pembeli;
                }
                $this->db->insert('retur_jual', $data_insert);
                $jenis = "manual";
                eval($this->Pengaturan_transaksi_model->accounting('buatreturjual'));
                $this->session->set_flashdata('message', 'Return success');
            } else {
                $this->session->set_flashdata('message', 'Return failed');
            }
            redirect(site_url('outlet/retur_jual'));
        }
    }

    public function _rules_manual() 
    {
        $this->form_validation->set_rules('tgl_retur', 'tgl_retur', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Retur_jual */
/* Location: ./application/controllers/Retur_jual */