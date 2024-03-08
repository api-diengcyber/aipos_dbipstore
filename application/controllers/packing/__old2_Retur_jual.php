<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_jual extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->library(array('ion_auth','form_validation'));
		$this->lang->load('auth');
        $this->load->model('Toko_retail_model');
        $this->load->model('Retur_jual_model');
        $this->load->model('Member_retail_model');
        $this->load->model('Pengaturan_opsi_model');
        $this->load->model('Produk_retail_model');
        $this->load->model('Pembelian_retail_model');
	}

	public function index()
	{
        $data = [
          'active_retur_penjualan' => 'active',
        ];
        $this->view('retur_jual/retur_jual_list', $data);
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
                                        ->join('pembelian AS b', 'p.id_produk_2=b.id_produk AND b.id_toko="'.$this->userdata->id_toko.'"',"left")
                                        ->where('r.id_toko', $this->userdata->id_toko)
                                        ->where('rd.id_retur', $id)
                                        ->group_by('p.id_produk_2')
                                        ->get()->result();
			$data = array(
                'active_retur_penjualan' => 'active',
                'data_login' => $this->userdata,
				'id_retur' => $row_retur->id_retur,
                'tgl' => $row_retur->tgl,
				'no_retur' => $row_retur->no_retur,
				'no_faktur' => $row_retur->no_faktur,
                'pembeli' => $pembeli,
                'diskon_member' => $row_retur->diskon_member,
                'nominal' => $row_retur->total,
                'data_detail' => $res_retur_detail,
			);
			$this->view('retail/retur_jual/retur_jual_read', $data);
		} else {
            $this->session->set_flashdata('message', 'Record not found');
            redirect(site_url('retur_jual'));
		}
	}

	public function json()
	{
        header('Content-Type: application/json');
		echo $this->Retur_jual_model->json($this->userdata->id_toko);
	}

	public function create()
	{
		$data = array(
            'active_retur_penjualan' => 'active',
			'action' => site_url().'retur_jual/create_action',
			'no_retur' => '',
            'id_modul' => $this->userdata->id_modul,
            'button' => 'Selesai',
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_users,
            'pembeli' => set_value('pembeli'),
            'pembayaran' => set_value('pembayaran'),
            'tgl_retur' => date("d-m-Y"),
            'nominal' => set_value('nominal'),
            'nama_cs' => set_value('nama_cs'),
            'nama_pembeli' => set_value('nama_pembeli'),
            'ongkir_cod' => set_value('ongkir_cod'),
            'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            'opsi_pilihan' => $this->Pengaturan_opsi_model->get_opsi_pilihan($this->userdata->id_toko),
            'opsi_popup' => $this->Pengaturan_opsi_model->get_opsi_popup($this->userdata->id_toko),
		);
		$this->view('retur_jual/retur_jual_form', $data);
	}

    public function insert_retur_temp($tgl = '')
    {
        $barcode = $this->input->post('barcode', true);
        $barang = $this->input->post('barang', true);
        $response = "0";
        $stok = 0;
        $data_id_produk = "";
        $data_barang = "";
        $data_harga = "";
        $row_barcode = $this->Produk_retail_model->get_by_barcode($barcode, $this->userdata->id_toko);
        if($row_barcode){
            // jika autcomplete barcode //
            $response = "1";
            $data_id_produk = $row_barcode->id_produk_2;
            $data_barcode = $row_barcode->barcode;
            $data_barang = $row_barcode->nama_produk;
            $data_harga = $row_barcode->harga_1;
            //$stok = $row_barcode->stok;
        } else {
            $row_barang = $this->Produk_retail_model->get_by_nama_barang($barang, $this->userdata->id_toko);
            if($row_barang){
                // jika nama barang //
                $response = "1";
                $data_id_produk = $row_barang->id_produk_2;
                $data_barcode = $row_barang->barcode;
                $data_barang = $row_barang->nama_produk;
                $data_harga = $row_barang->harga_1;
                //$stok = $row_barang->stok;
            } else {
                // jika nama barang adalah barcode //
                $row_barcode = $this->Produk_retail_model->get_by_barcode($barang, $this->userdata->id_toko);
                if($row_barcode){
                    // jika barcode //
                    $response = "1";
                    $data_id_produk = $row_barcode->id_produk_2;
                    $data_barcode = $row_barcode->barcode;
                    $data_barang = $row_barcode->nama_produk;
                    $data_harga = $row_barcode->harga_1;
                    //$stok = $row_barcode->stok;
                }
            }
        }
        if ($response == "1") {
        	$row_temp = $this->db->select('*')
        						 ->from('retur_jual_temp')
        						 ->where('id_toko', $this->userdata->id_toko)
        						 ->where('id_produk', $data_id_produk)
        						 ->get()->row();
        	if ($row_temp) {
	        	$data_res = array(
	        		'jumlah' => $row_temp->jumlah+1,
	        	);
	        	$this->db->where('id', $row_temp->id);
	        	$this->db->update('retur_jual_temp', $data_res);
        	} else {
	        	$data_res = array(
	        		'id_toko' => $this->userdata->id_toko,
	        		'id_users' => $this->userdata->id_users,
	        		'id_produk' => $data_id_produk,
	        		'harga_jual' => $data_harga,
	        		'jumlah' => 1,
	        	);
	        	$this->db->insert('retur_jual_temp', $data_res);        		
        	}
        }
        $rdata = array(
            'response' => $response,
            'data_barang' => $data_barang,
        );
        echo json_encode($rdata);
    }

    public function panelTemp()
    {  
        $tgl = date('Y-m-d');
        $panelBarang =  "
        <script src='".base_url()."assets/js/jquery-2.1.4.min.js'></script>
          <table id='dynamic-table' class='table table-striped table-bordered table-hover'>
            <thead>
              <tr>
                <th class='center' width='2'>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <!--
                <th>Diskon</th>
                <th>Grosir</th>
                -->
                <th>Sub Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
        ";
        //$result = $this->Orders_temp_retail_model->get_barang_temp($this->userdata->id_users, $this->userdata->id_toko);
        $result = $this->db->select('r.*, p.id_produk_2 AS produk_id, p.id_produk_2, p.nama_produk, p.diskon AS diskon_produk, p.mingros, p.dibeli')
			        		 ->from('retur_jual_temp r')
			        		 ->join('produk_retail p', 'r.id_produk = p.id_produk_2 AND p.id_toko="'.$this->userdata->id_toko.'"')
			        		 ->where('r.id_toko', $this->userdata->id_toko)
			        		 ->order_by('r.id', 'desc')
			        		 ->get()->result();
        $i = 1;
        $total = 0;
        $data = array();
        foreach ($result as $key) {
        	$harga = $key->harga_jual;
            /*jika ada member */
            $hm = '';
            $id_member = $this->input->post('id_member', true);
            /* validasi apakah ada member dengan id tersebut atau tidak */
            $dm = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member',$id_member)->get('member');
            // PANEL BARANG //
            if ($dm->num_rows() != 0) {
                /* jika pengaturan opsi menggunakan harga 3 */
                $opsi_diskon = $this->Pengaturan_opsi_model->get_opsi_diskon();
                if($opsi_diskon->opsi == 0){
                    $harga = $key->harga_3;
                    $hm = ' (3)';
                }
            }
            $diskon = $harga*$key->jumlah*($key->diskon/100);
            $sub_total = $harga*$key->jumlah-$diskon;

            $panelBarang .= "
              <tr id='rowBarang_".$key->id."'>
                <td class='center'>
                <input type='hidden' id='id_".$i."' name='id[]' value='".$key->id."'>
                <input type='hidden' id='id_produk_".$i."' name='id_produk[]' value='".$key->id_produk_2."'>
                ".$i."</td>
                <td>".$key->nama_produk."</td>
                <td><input id='jumlah_input' data-id='".$key->id."' name='jumlah[]' type='text' style='width:50px;' value='".$key->jumlah."' tabindex='2' maxlength='11' autocomplete='off' /></td>
                <td><input id='harga_input' data-id='".$key->id."' name='harga[]' type='text' style='width:150px;' value='".number_format($harga,0,',','.')."' tabindex='2' maxlength='20' autocomplete='off' /></td>  
                <!--
                <td class='center'>".$key->diskon."</td>
                <td class='center'>".$key->mingros."</td>
                -->
                <td>Rp <span style='float:right;'>".number_format($sub_total,0,',','.')."</span></td>
                <td>
                  <div class='action-buttons'>
                    <button type='button' class='red' id='removeBarang_".$i."' value='".$key->id."' tab-index='100' >
                      <i class='ace-icon fa fa-trash-o bigger-130'></i>
                    </button>
                  </div>
                </td>
              </tr>
            ";
            $total += $sub_total;
            $subt = $sub_total;
            $data[$key->id] = array(
                'nama_produk' => $key->nama_produk,
                'jumlah' => $key->jumlah,
                'harga' => $harga,
                'potongan' => $key->potongan*1,
                'potongan_persen' => $key->diskon*1,
                'total' => $subt,
            );
            $i++;
        }
        $panelBarang .= "
            </tbody>
          </table>
        ";
        // PANEL BARANG //
        // JIKA MENGGUNAKAN DISKON MEMBER

        /*jika ada member */
        $member = $this->input->post('member', true);
        if($member == 'true'){
            $id_member = $this->input->post('id_member', true);
            /* validasi apakah ada member dengan id tersebut atau tidak */
            $od = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member',$id_member)->get('member');
            if($od->num_rows() != 0){
                /* jika pengaturan opsi menggunakan diskon member */
                $od_r = $od->row();
                $opsi_diskon = $this->Pengaturan_opsi_model->get_opsi_diskon();
                if($opsi_diskon->opsi == 1){
                    $total = $total - ($total * $od_r->diskon/100);
                }
            }
        }
        // HASIL //
        $data = array(
            'panelBarang' => $panelBarang,
            'panelTotal' => number_format($total,0,',','.'),
            'data' => $data,
        );
        // HASIL //
        echo json_encode($data);
    }

    public function change_jumlah_retur_temp()
    {
        $id = $this->input->post('id_temp', true);
        $jumlah = $this->input->post('jumlah', true)*1;
        $row_temp = $this->db->select('*')
        						 ->from('retur_jual_temp')
        						 ->where('id_toko', $this->userdata->id_toko)
        						 ->where('id', $id)
        						 ->get()->row();
        if ($row_temp) {
        	if ($jumlah < 1) {
        		$jumlah = 1;
        	}
        	$data = array(
        		'jumlah' => $jumlah,
        	);
        	$this->db->where('id', $id);
        	$this->db->update('retur_jual_temp', $data);
        	echo "success";
        }
    }

    public function change_harga_retur_temp()
    {
        $id = $this->input->post('id_temp', true);
        $harga = $this->input->post('harga', true)*1;
        $row_temp = $this->db->select('*')
        						 ->from('retur_jual_temp')
        						 ->where('id_toko', $this->userdata->id_toko)
        						 ->where('id', $id)
        						 ->get()->row();
        if ($row_temp) {
        	if ($harga < 1) {
        		$harga = 1;
        	}
        	$data = array(
        		'harga_jual' => $harga,
        	);
        	$this->db->where('id', $id);
        	$this->db->update('retur_jual_temp', $data);
        	echo "success";
        }
    }

    public function delete_retur_temp($id)
    {
        $row_temp = $this->db->select('*')
        						 ->from('retur_jual_temp')
        						 ->where('id_toko', $this->userdata->id_toko)
        						 ->where('id', $id)
        						 ->get()->row();
        if ($row_temp) {
        	$this->db->where('id', $row_temp->id);
        	$this->db->delete('retur_jual_temp');
        }
    }

    public function _rules_create() 
    {
        $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('pembeli', 'pembeli', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
                'diskon_member' => $this->input->post('dm', true),
                'nama_kustomer' => $nama_kustomer,
                'alamat_pembeli'=> $alamat_kustomer,
            );
            $this->db->insert('retur_jual', $data);
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
                if ($setting_update_stok=='1') {
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
                }
                $data_temp = array(
                    'id_retur' => $id_retur,
                    'id_toko' => $id_toko,
                    'id_produk' => $key->id_produk_2,
                    'jumlah' => $key->jumlah,
                    'harga_satuan' => $setting_update_stok,
                    'harga_jual' => $key->harga_jual*1,
                    'subtotal' => $key->jumlah*$key->harga_jual,
                    'status' => 1,
                );
                $this->db->insert('retur_jual_detail', $data_temp);
            }
            $this->db->where('id_users', $id_users);
            $this->db->where('id_toko', $id_toko);
            $this->db->delete('retur_jual_temp');
            echo json_encode(array('no_retur' => $no_retur));
        }
	}

    public function cetak($no_retur = '')
    {
        $row = $this->db->select('rj.*, m.nama AS nama_member, m.alamat AS alamat_member')
                         ->from('retur_jual rj')
                         ->join('orders o', 'rj.no_faktur=o.no_faktur AND rj.id_toko=o.id_toko', 'left')
                         ->join('member m', 'o.pembeli=m.id_member AND o.id_toko=m.id_toko','left')
                         ->where('rj.id_toko', $this->userdata->id_toko)
                         ->where('rj.no_retur', $no_retur)
                         ->get()->row();
        if ($row) {
            $data = array(
                'toko' => $this->Toko_retail_model->get_by_id($this->userdata->id_toko),
                'data_retur' => $row,
                'data_retur_detail' => $this->db->select('rjd.*, pr.nama_produk')
                                                ->from('retur_jual_detail rjd')
                                                ->join('produk_retail pr', 'rjd.id_produk=pr.id_produk_2 AND rjd.id_toko=pr.id_toko', 'left')
                                                ->where('rjd.id_toko', $this->userdata->id_toko)
                                                ->where('rjd.id_retur', $row->id_retur)
                                                ->get()->result(),
            );
            $this->load->view('retail/retur_jual/retur_cetak', $data, FALSE);
        } else {
            redirect(site_url('retur_jual/create'));
        }
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

	public function cek_faktur()
	{
		header('Content-Type: application/json');
		$no_faktur = $this->input->post('no_faktur', true);
		$data = $this->_cek_faktur($this->userdata->id_toko, $no_faktur);
		echo json_encode($data);
	}

	public function create_action_faktur()
	{
		header('Content-Type: application/json');
		$no_faktur = $this->input->post('no_faktur', true);
		$data = $this->_cek_faktur($this->userdata->id_toko, $no_faktur);
		if ($data['status']=='1') {
            $row_last_retur = $this->db->select('id_retur')
                                        ->from('retur_jual')
                                        ->where('id_toko', $this->userdata->id_toko)
                                        ->order_by('id_retur', 'desc')
                                        ->get()->row();
            $id_retur = 1;
            if ($row_last_retur) {
                $id_retur = $row_last_retur->id_retur+1;
            }
	        $no_retur = $this->get_retur();
            $data_retur_jual = array(
                'id_retur' => $id_retur,
                'id_toko' => $this->userdata->id_toko,
                'id_users' => $this->userdata->id_users,
                'no_retur' => $no_retur,
                'no_faktur' => $no_faktur,
                'tgl' => date('d-m-Y H:i:s'),
                'pembeli' => $data['data_orders']->pembeli,
                'bukan_member' => $data['data_orders']->bukan_member,
                'total' => $data['data_orders']->nominal,
                'diskon_member' => $data['data_orders']->diskon_member,
                'nama_kustomer' => $data['data_orders']->nama_kustomer,
                'alamat_pembeli'=> $data['data_orders']->alamat_pembeli,
            );
            $this->db->insert('retur_jual', $data_retur_jual);
            $setting_update_stok = 0;
            $row_setting_retur_jual = $this->db->select('*')
                                               ->from('setting_retur')
                                               ->where('id_toko', $this->userdata->id_toko)
                                               ->where('jenis', 'jual')
                                               ->get()->row();
            if ($row_setting_retur_jual) {
                $setting_update_stok = $row_setting_retur_jual->update_stok;
            }
			$res_orders_detail = $this->db->select('*')
										  ->from('orders_detail')
										  ->where('id_toko', $this->userdata->id_toko)
										  ->where('id_orders_2', $data['data_orders']->id_orders_2)
										  ->get()->result();
			foreach ($res_orders_detail as $key) {
                if ($setting_update_stok=='1') {
                    $row_stok_produk = $this->db->select('*')
                                                ->from('stok_produk')
                                                ->where('id_toko', $this->userdata->id_toko)
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
                    'id_toko' => $this->userdata->id_toko,
                    'id_produk' => $key->id_produk,
                    'jumlah' => $key->jumlah,
                    'harga_satuan' => $key->harga_satuan,
                    'harga_jual' => $key->harga_jual,
                    'diskon' => $key->diskon,
                    'potongan' => $key->potongan,
                    'subtotal' => $key->subtotal,
                );
                $this->db->insert('retur_jual_detail', $data_temp);
			}
        	echo json_encode(array(
        		'status' => 1,
        		'no_retur' => $no_retur
        	));
		} else {
			echo json_encode($data);
		}
	}

	public function delete($id)
	{
		$row_retur = $this->db->select('*')
							  ->from('retur_jual')
							  ->where('id_toko', $this->userdata->id_toko)
							  ->where('id_retur', $id)
							  ->get()->row();
		if ($row_retur) {
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_retur', $row_retur->id_retur);
            $this->db->delete('retur_jual_detail');
			$this->db->where('id', $row_retur->id);
			$this->db->delete('retur_jual');
            $this->session->set_flashdata('message', 'Delete record success');
            redirect(site_url('retur_jual'));
		} else {
            $this->session->set_flashdata('message', 'Delete record failed');
            redirect(site_url('retur_jual'));
		}
	}

}

/* End of file Retur_jual */
/* Location: ./application/controllers/Retur_jual */