<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutasi_stok extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		$this->models('Mutasi_stok_model');
	}

	function to_number($str_num = "")
	{
		$str_num = str_replace('.', '', $str_num);
		$str_num = str_replace(',', '.', $str_num);
		return (double) $str_num*1;
	}
    
	public function json() {
		header('Content-Type: application/json');
		echo $this->Mutasi_stok_model->json($this->userdata->id_toko);
	}

	public function index()
	{
		$data = array(
			'active_mutasi_stok' => 'active'
		);
		$this->view('mutasi_stok/mutasi_stok_list', $data);
	}

	public function read($faktur = '')
	{
		$res = $this->Mutasi_stok_model->get_by_faktur($this->userdata->id_toko, $faktur)->result();
		if (count($res) > 0) {
			$data = array(
				'active_mutasi_stok' => 'active',
				'faktur' => $res[0]->faktur,
				'tgl' => $res[0]->tgl,
				'user_asal' => $res[0]->user_asal,
				'user_tujuan' => $res[0]->user_tujuan,
				'data_cabang' => $this->db->where('level != 1')->where('id_toko', $this->userdata->id_toko)->get('users')->result(),
				'data_mutasi' => $res,
			);
			$this->view('mutasi_stok/mutasi_stok_read', $data);
		} else {
			redirect('admin/mutasi_stok','refresh');
		}
	}

	public function create()
	{
		$data = array(
			'active_mutasi_stok' => 'active',
			'is_pusat' => false,
			'action' => site_url('admin/mutasi_stok/create_action'),
			'faktur' => set_value('faktur', $this->generate_faktur(date('d-m-Y'))),
			'tgl' => set_value('tgl', date('d-m-Y')),
			'supplier' => set_value('supplier'),
			'pembayaran' => set_value('pembayaran'),
			'user_asal' => set_value('user_asal'),
			'user_tujuan' => set_value('user_tujuan'),
			// 'data_supplier' => $this->db->where($this->where())->get('supplier')->result(),
			'data_cabang' => $this->db->where('level != 1')->where('id_toko', $this->userdata->id_toko)->get('users')->result(),
			'data_gudang' =>$this->db->where('id_toko', $this->userdata->id_toko)->get('gudang')->result(),
		);
		$this->view('mutasi_stok/mutasi_stok_form', $data);
	}

	public function tambah_temp()
	{
		header('Content-Type: application/json');
		$barcode = $this->input->post('barcode', true);
		$row_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->where('pr.barcode', $barcode)
							   ->where('pr.id_toko="'.$this->userdata->id_toko.'"')
							   ->get()->row();
		if ($row_produk) {
			$row_temp = $this->db->select('pt.*')
								 ->from('mutasi_stok_temp pt')
								 ->where('pt.id_produk', $row_produk->id_produk_2)
								 ->where('pt.id_toko="'.$this->userdata->id_toko.'"')
								 ->get()->row();
			if ($row_temp) {
				$data_update = array(
					'jumlah' => $row_temp->jumlah+1
				);
				$this->db->where('id', $row_temp->id);
				$this->db->update('mutasi_stok_temp', $data_update);
			} else {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produk' => $row_produk->id_produk_2,
					'jumlah' => 1,
				);
				$this->db->insert('mutasi_stok_temp', $data_insert);
			}
		}
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function list_temp()
	{
		header('Content-Type: application/json');
		$id_users = $this->input->post('cabang', true);
		$this->db->select('pt.*, pr.nama_produk, sp.satuan AS nama_satuan, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->db->from('mutasi_stok_temp pt');
		$this->db->join('produk_retail pr', 'pt.id_produk=pr.id_produk_2 AND pt.id_toko=pr.id_toko');
		$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->userdata->id_toko, $id_users, 'pr.id_produk_2');
		$this->db->where('pt.id_toko="'.$this->userdata->id_toko.'"');
		$this->db->where('pt.id_users', $this->userdata->id_users);
		$this->db->order_by('pr.nama_produk');
		$res_temp = $this->db->get()->result();

		$no = 1;
		$html = '';
		$total = 0;
		foreach ($res_temp as $key) : 
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering" data-id="'.$key->id.'" value="'.number_format($key->stok,0,',','.').'" readonly style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable jumlah" data-id="'.$key->id.'" value="'.number_format($key->jumlah,0,',','.').'" style="border:none;" /></td>
						<td class="text-center" style="padding:0px;"><button type="button" class="btn btn-danger btn-xs btn-hapus-temp" data-id="'.$key->id.'"><i class="ace-icon fa fa-trash"></i></button></td>
					</tr>';
			$no++;
			$total+=$key->subtotal;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function update_temp()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$data_update = array(
			'jumlah' => $this->input->post('jumlah', true),
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->update('mutasi_stok_temp', $data_update);
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function hapus_temp()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$this->db->where('id', $id);
		$this->db->delete('mutasi_stok_temp');
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function generate_faktur($tgl)
	{
		$no = 1;
		$row_last_ms = $this->db->select('IFNULL(RIGHT(faktur,5),0) AS no')->from('mutasi_stok')->where('tgl', $tgl)->where('id_toko', $this->userdata->id_toko)->order_by('id', 'desc')->get()->row();
		if ($row_last_ms) {
			$no = $row_last_ms->no+1;
		}
		$no_faktur = date('mdy').sprintf('%05d', $no);
		return $no_faktur;
	}

	public function create_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$res_temp = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $this->userdata->id_users)->get('mutasi_stok_temp')->result();
			if (count($res_temp) > 0) {
				$this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
				$tgl = $this->input->post('tgl', true);
				$cabang = $this->input->post('cabang', true);
				$cabang2 = $this->input->post('cabang2', true);
				$pembayaran = $this->input->post('pembayaran', true);
				$total = $this->to_number($this->input->post('total', true))*1;
				
				$no_faktur = $this->generate_faktur($tgl);
				
				// insert temp
				$nominal_diskon = 0;
				foreach ($res_temp as $key) :
					$id_pembelian = 1;
					$row_last_pembelian = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id', 'desc')->get('pembelian')->row();
					if ($row_last_pembelian) {
						$id_pembelian = $row_last_pembelian->id_pembelian+1;
					}
					$diskon_nominal = ($key->harga_satuan*$key->jumlah)-$key->subtotal;
					$nominal_diskon += $diskon_nominal;
					// insert mutasi
					$data_insert = array(
						'id_toko' => $this->userdata->id_toko,
						'user_asal' => $cabang,
						'user_tujuan' => $cabang2,
						'tgl' => $tgl,
						'id_produk' => $key->id_produk,
						'jumlah' => $key->jumlah,
						'id_pembelian' => $id_pembelian,
						'faktur' => $no_faktur,
						'status' => '0',
					);
					$this->db->insert('mutasi_stok', $data_insert);
					$data_insert = array(
						'id_pembelian' => $id_pembelian,
						'id_toko' => $this->userdata->id_toko,
						'id_users' => $cabang2,
						// 'id_faktur' => $id_faktur,
						'id_produk' => $key->id_produk,
						'tgl_masuk' => $tgl,
						'tgl_expire' => $key->expire_date,
						'pembayaran' => $pembayaran,
						'harga_satuan' => $key->harga_satuan,
						'jumlah' => $key->jumlah,
						// 'diskon' => $key->diskon,
						'total_bayar' => $key->subtotal,
						// 'ppn' => (10/100)*$key->subtotal,
					);
					$this->db->insert('pembelian', $data_insert);
					// $data_insert = array(
					// 	'id_toko' => $this->userdata->id_toko,
					// 	'id_users' => $cabang2,
					// 	'id_pembelian' => $id_pembelian,
					// 	'id_produk' => $key->id_produk,
					// 	'stok' => $key->jumlah,
					// );
					// $this->db->insert('stok_produk', $data_insert);
				endforeach;
				$this->db->where('id_toko', $this->userdata->id_toko);
				$this->db->where('id_users', $this->userdata->id_users);
				$this->db->delete('mutasi_stok_temp');
				$this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
				// eval($this->Pengaturan_transaksi_model->accounting('pembelian'));
				$this->session->set_flashdata('message', 'Save Record Success');
				redirect('admin/mutasi_stok/create');
			} else {
				$this->session->set_flashdata('message', 'Save Record Failed');
				redirect('admin/mutasi_stok/create');
			}
		}
	}

	public function update($faktur = '')
	{
		$res = $this->Mutasi_stok_model->get_by_faktur($this->userdata->id_toko, $faktur)->result();
		if (count($res) > 0) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->delete('mutasi_stok_temp');
			
			foreach ($res as $key) {
				$data_insert = array(
					'id_users' => $this->userdata->id_users,
					'id_toko' => $this->userdata->id_toko,
					'id_produk' => $key->id_produk,
					'jumlah' => $key->jumlah,
				);
				$this->db->insert('mutasi_stok_temp', $data_insert);
			}
			
			$data = array(
				'active_mutasi_stok' => 'active',
				'action' => site_url('admin/mutasi_stok/update_action'),
				'faktur' => $res[0]->faktur,
				'tgl' => $res[0]->tgl,
				'user_asal' => $res[0]->user_asal,
				'user_tujuan' => $res[0]->user_tujuan,
				'data_cabang' => $this->db->where('level != 1')->where('id_toko', $this->userdata->id_toko)->get('users')->result(),
				'data_mutasi' => $res,
			);
			$this->view('mutasi_stok/mutasi_stok_form', $data);
		} else {
			redirect('admin/mutasi_stok','refresh');
		}
	}

	public function update_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('faktur'));
		} else {
			$res_temp = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $this->userdata->id_users)->get('mutasi_stok_temp')->result();
			if (count($res_temp) > 0) {
				$this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
				
				$faktur = $this->input->post('faktur', true);
				$tgl = $this->input->post('tgl', true);
				$cabang = $this->input->post('cabang', true);
				$cabang2 = $this->input->post('cabang2', true);

				$res_m = $this->db->where('id_toko', $this->userdata->id_toko)->where('faktur', $faktur)->get('mutasi_stok')->result();
				foreach ($res_m as $key) {
					$this->db->where('id_toko', $this->userdata->id_toko);
					$this->db->where('id_pembelian', $key->id_pembelian);
					$this->db->delete('pembelian');
				}
				$this->db->where('id_toko', $this->userdata->id_toko);
				$this->db->where('faktur', $faktur);
				$this->db->delete('mutasi_stok');
				
				
				foreach ($res_temp as $key) :
					$id_pembelian = 1;
					$row_last_pembelian = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id', 'desc')->get('pembelian')->row();
					if ($row_last_pembelian) {
						$id_pembelian = $row_last_pembelian->id_pembelian+1;
					}

					// insert mutasi
					$data_insert = array(
						'id_toko' => $this->userdata->id_toko,
						'user_asal' => $cabang,
						'user_tujuan' => $cabang2,
						'tgl' => $tgl,
						'id_produk' => $key->id_produk,
						'jumlah' => $key->jumlah,
						'id_pembelian' => $id_pembelian,
						'faktur' => $faktur,
						'status' => '0',
					);
					$this->db->insert('mutasi_stok', $data_insert);
					$data_insert = array(
						'id_pembelian' => $id_pembelian,
						'id_toko' => $this->userdata->id_toko,
						'id_users' => $cabang2,
						// 'id_faktur' => $id_faktur,
						'id_produk' => $key->id_produk,
						'tgl_masuk' => $tgl,
						// 'tgl_expire' => $key->expire_date,
						// 'pembayaran' => $pembayaran,
						// 'harga_satuan' => $key->harga_satuan,
						'jumlah' => $key->jumlah,
						// 'diskon' => $key->diskon,
						// 'total_bayar' => $key->subtotal,
						// 'ppn' => (10/100)*$key->subtotal,
					);
					$this->db->insert('pembelian', $data_insert);
					
					// echo "<pre>";
					// print_r ($key);
					// echo "</pre>";
					
				endforeach;
				$this->db->where('id_toko', $this->userdata->id_toko);
				$this->db->where('id_users', $this->userdata->id_users);
				$this->db->delete('mutasi_stok_temp');
				$this->db->query('SET FOREIGN_KEY_CHECKS = 1;');

				$this->session->set_flashdata('message', 'Update Record Success');
				redirect('admin/mutasi_stok');
			} else {
				$this->session->set_flashdata('message', 'Update Record Failed');
				redirect('admin/mutasi_stok');
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('cabang2', 'cabang tujuan', 'trim|required');
		$this->form_validation->set_rules('cabang', 'cabang', 'trim|required');
		$this->form_validation->set_rules('tgl', 'Tanggal Masuk', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function verifikasi($faktur = '')
	{
		$row = $this->Mutasi_stok_model->get_by_faktur($this->userdata->id_toko, $faktur)->row();
		if ($row) {
			$data_update = array(
				'status' => 1,
			);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('faktur', $faktur);
			$this->db->update('mutasi_stok', $data_update);
			$this->session->set_flashdata('message', 'Verifikasi Record Success');
			redirect('admin/mutasi_stok');
		} else {
			$this->session->set_flashdata('message', 'Verifikasi Record Failed');
			redirect('admin/mutasi_stok');
		}
	}
    
	public function json2($id_users = '') {
		header('Content-Type: application/json');
		if ($this->userdata->level == 1) {
			if ($id_users == '1') {
				$id_users = '';
			}
		} else {
			$id_users = $this->userdata->id_users;
		}
		$this->datatables->select('pr.id_produk_2, pr.barcode, pr.nama_produk, pr.harga_1, pr.harga_2, pr.harga_3, sp.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->datatables->from('produk_retail pr');
		$this->datatables->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko');
		$this->Mutasi_stok_model->query_stok_mutasi($this->datatables, $this->userdata->id_toko, $id_users, 'pr.id_produk_2');
		$this->datatables->where('pr.id_toko', $this->userdata->id_toko);
		$this->datatables->group_by('pr.id_produk_2');
		echo $this->datatables->generate();
	}
    
	public function json_mati($id_users = '') {
		header('Content-Type: application/json');
		$this->datatables->select('pr.*, sp.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->datatables->from('produk_retail pr');
		$this->datatables->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko');
		$this->Mutasi_stok_model->query_stok_mutasi($this->datatables, $this->userdata->id_toko, $id_users, 'pr.id_produk_2');
		$this->datatables->where('pr.id_toko', $this->userdata->id_toko);
		$this->datatables->where('', 'HAVING stok > 1');
		// $this->datatables->order_by('pr.id_produk_2 ASC', 'HAVING stok > 1');
		echo $this->datatables->generate();
	}

	public function data()
	{
		$data['active_mutasi_stok_list'] = 'active';
		$data['level'] = $this->userdata->level;
		$data['id_users'] = $this->input->post('id_users', true);
		$data['data_user'] = $this->db->where('level != 1')->where('id_toko', $this->userdata->id_toko)->get('users')->result();
		$this->view('mutasi_stok/stok_produk', $data);
	}

}

/* End of file Mutasi_stok.php */
/* Location: ./application/controllers/Mutasi_stok.php */