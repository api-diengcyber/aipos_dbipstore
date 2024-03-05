<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Arus_kas extends AI_Admin
{
	function __construct()
	{
		parent::__construct();
		$this->models('Arus_kas_model');
		$this->load->library('datatables');
		$this->load->library('form_validation');
	}

	public function index()
	{
		echo "lll";
		$data = $this->Arus_kas_model->json($this->userdata->id_toko);
		// var_dump($data);
		$this->rview('arus_kas/arus_kas_masuk_list', $data);
	}

	public function masuk()
	{
		// $data_login = $this->data_login;
		// $active = array();
		$data = array(
			'active_arus_kas_masuk' => 'active',
			'action' => site_url('admin/arus_kas/create_masuk')
		);
		$this->rview('arus_kas/arus_kas_masuk_list', $data);
		// redirect(site_url('admin/arus_kas/masuk'));
	}
	public function keluar()
	{
		// $data_login = $this->data_login;
		// $active = array();
		$data = array(
			'active_arus_kas_keluar' => 'active',
			'action' => site_url('admin/arus_kas/create_keluar')
		);
		$this->rview('arus_kas/arus_kas_keluar_list', $data);
		// redirect(site_url('admin/arus_kas/masuk'));
	}

	public function create_masuk()
	{
		$data_akun = $this->db->select('*')
			->from('akun_sederhana')
			->where('id_toko', $this->userdata->id_toko)
			->where('jenis', '1')
			->get()->result();
		$id_kas = '1';
		$j_kas = 'Tambah Kas Masuk';
		$nama_kas = 'Nama Pendapatan';
		$data = array(
			'active_arus_kas_masuk' => 'active',
			'j' => $j_kas,
			'nama_kas' => $nama_kas,
			'action' => site_url('admin/arus_kas/create_action'),
			'id' => set_value('id'),
			'tgl' => set_value('tgl', date('d-m-Y')),
			'id_kas' => set_value('id_kas', $id_kas),
			'id_akun' => set_value('id_akun'),
			'nominal' => set_value('nominal'),
			'ket' => set_value('ket'),
			'data_akun' => $data_akun,
			'id_arus_kas' => set_value('id_kas')
		);
		// $this->rview('arus_kas/arus_kas_form', $data);
		$this->rview('arus_kas/arus_kas_form', $data);
	}
	public function create_keluar()
	{
		$data_akun = $this->db->select('*')
			->from('akun_sederhana')
			->where('id_toko', $this->userdata->id_toko)
			->where('jenis', '2')
			->get()->result();
		$id_kas = '2';
		$j_kas = 'Tambah Kas Keluar';
		$nama_kas = 'Nama Pengeluaran';
		$data = array(
			'active_arus_kas_masuk' => 'active',
			'j' => $j_kas,
			'nama_kas' => $nama_kas,
			'action' => site_url('admin/arus_kas/create_action'),
			'id' => set_value('id'),
			'tgl' => set_value('tgl', date('d-m-Y')),
			'id_kas' => set_value('id_kas', $id_kas),
			'id_akun' => set_value('id_akun'),
			'nominal' => set_value('nominal'),
			'ket' => set_value('ket'),
			'data_akun' => $data_akun,
			'id_arus_kas' => set_value('id_kas')
		);
		// $this->rview('arus_kas/arus_kas_form', $data);
		$this->rview('arus_kas/arus_kas_form', $data);
	}

	// public function create($kas = '')
	// {

	// 	if ($kas == 'masuk') {
	// 		$id_kas = '1';
	// 		$j_kas = 'Tambah Kas Masuk';
	// 		$nama_kas = 'Nama Pendapatan';
	// 		$data = array('active_kas' => 'active');
	// 		$data_akun = $this->db->select('*')
	// 			->from('akun_sederhana')
	// 			->where('id_toko', $this->userdata->id_toko)
	// 			->where('jenis', '1')
	// 			->get()->result();
	// 	} else if ($kas == 'keluar') {
	// 		$id_kas = '2';
	// 		$j_kas = 'Tambah Kas Keluar';
	// 		$nama_kas = 'Nama Pengeluaran';
	// 		$active = array('active_arus_kas_keluar' => 'active');
	// 		$data_akun = $this->db->select('*')
	// 			->from('akun_sederhana')
	// 			->where('id_toko', $this->userdata->id_toko)
	// 			->where('jenis', '2')
	// 			->get()->result();
	// 	} else {
	// 		redirect(site_url());
	// 	}
	// 	$data = array(
	// 		'active_arus_kas_masuk' => 'active',
	// 		'j' => $j_kas,
	// 		'nama_kas' => $nama_kas,
	// 		'action' => site_url('admin/arus_kas/create_action'),
	// 		'id' => set_value('id'),
	// 		'tgl' => set_value('tgl', date('d-m-Y')),
	// 		'id_kas' => set_value('id_kas', $id_kas),
	// 		'id_akun' => set_value('id_akun'),
	// 		'nominal' => set_value('nominal'),
	// 		'ket' => set_value('ket'),
	// 		'data_akun' => $data_akun,
	// 		'id_arus_kas' => set_value('id_kas'),
	// 	);
	// 	// $this->rview('arus_kas/arus_kas_form', $data);
	// 	redirect(site_url('admin/arus_kas/masuk'));
	// }
	public function json_masuk()
	{
		header('Content-type: application/json');
		if ($this->userdata->level != '1') {
			echo $this->Arus_kas_model->json_masuk($this->userdata->id_toko, $this->userdata->id_users);
		} else {
			echo $this->Arus_kas_model->json_masuk($this->userdata->id_toko);
		}
	}
	public function json_keluar()
	{
		header('Content-type: application/json');
		if ($this->userdata->level != '1') {
			echo $this->Arus_kas_model->json_keluar($this->userdata->id_toko, $this->userdata->id_users);
		} else {
			echo $this->Arus_kas_model->json_keluar($this->userdata->id_toko);
		}
	}


	public function create_action()
	{

		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			$kas = $this->input->post('id_kas', true);
			$row_last_arus_kas = $this->db->select('id_arus_kas')
				->from('arus_kas')
				->where('id_toko', $this->userdata->id_toko)
				->order_by('id_arus_kas', 'desc')
				->get()->row();

			$id_arus_kas = 1;
			if ($row_last_arus_kas) {
				$id_arus_kas = $row_last_arus_kas->id_arus_kas + 1;
			}

			$data = array(
				'id_arus_kas' => $id_arus_kas,
				'id_toko' => $this->userdata->id_toko,
				'tgl' => $this->input->post('tgl', true),
				'id_kas' => $this->input->post('id_kas', true),
				'id_akun' => $this->input->post('id_akun', true),
				'nominal' => str_replace('.', '', $this->input->post('nominal', true)),
				'ket' => $this->input->post('ket', true),
			);
			if ($this->userdata->level != '1') {
				$data['id_users'] = $this->userdata->id_user;
			}

			$this->Arus_kas_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			if ($kas == '1') {
				redirect(site_url('admin/arus_kas/masuk'));
			} else {
				redirect(site_url('admin/arus_kas/keluar'));
			}
		}
	}


	public function arus()
	{

		$awal_periode = date('d-m-Y');
		$akhir_periode = date('d-m-Y');

		if (!empty($this->input->post('awal_periode'))) {
			$awal_periode = $this->input->post('awal_periode');
			// 			$this->session->set_userdata(array('awal_periode' => $awal_periode));
		}


		if (!empty($this->input->post('akhir_periode'))) {
			$akhir_periode = $this->input->post('akhir_periode');
		}
		$xawal_periode = date('Y-m-d', strtotime($awal_periode));
		$xakhir_periode = date('Y-m-d', strtotime($akhir_periode));

		$arus_kas = $this->db->select('as.*, a.akun')
			->from('arus_kas as')
			->join('akun a', 'a.id=as.id_akun')
			->where('as.id_toko', $this->userdata->id_toko)
			->where("as.tgl BETWEEN '" . $awal_periode . "' AND '" . $akhir_periode . "'")
			->get()
			->result();
		$penjualan = $this->db->select('o.*,SUM(o.laba)as total')
			->from('orders o')
			->where('o.id_toko', $this->userdata->id_toko)
			//  ->group_by('o.tgl_order')
			->where("o.tgl_order BETWEEN '" . $awal_periode . "' AND '" . $akhir_periode . "'")
			->get()
			->result();
		$pembelian = $this->db->select('p.*, SUM(p.total_bayar) AS total')
			->from('pembelian p')
			->where('p.id_toko', $this->userdata->id_toko)
			//  ->group_by('p.tgl_order')
			->where("STR_TO_DATE(p.tgl_masuk, '%d-%m-%Y') BETWEEN '" . $xawal_periode . "' AND '" . $xakhir_periode . "'")
			->get()
			->result();
		$beban = $this->db->select('b.*')
			->from('beban b')
			//  ->join('user',$this->userdata->id_toko)
			->where('b.id_toko', $this->userdata->id_toko)
			->where("b.bulan BETWEEN '" . substr($awal_periode, 3) . "' AND '" . substr($akhir_periode, 3) . "'")
			//  ->group_by('o.tgl_order')
			->get()
			->result();

		$data = [
			'kas' => $arus_kas,
			'penjualan' => $penjualan,
			'pembelian' => $pembelian,
			'beban' => $beban,
			'tgl_awal' => $awal_periode,
			'tgl_akhir' => $akhir_periode,
			'active_arus_kas' => 'active',
		];
		// 		var_dump($data);
		$this->rview('arus_kas/arus_kas_list', $data);
	}
	// public function keluar()
	// {
	// 	$data = [
	// 		'active_arus_kas_keluar' => 'active',
	// 	];
	// 	$this->rview('arus_kas/arus_kas_list', $data);
	// }

	public function read_masuk($id)
	{
		$kas = $this->db->select('a.*,ak.nama_akun')
			->from('arus_kas a')
			->from('akun_sederhana ak', 'ak.id_akun=a.id_akun')
			->where('a.id_toko', $this->userdata->id_toko)
			->where('a.id_arus_kas', $id)
			->get()
			->row();
		$data = [
			'id_kas' => $kas->id_kas,
			'tgl' => $kas->tgl,
			'nm_akun' => $kas->nama_akun,
			'nominal' => $kas->nominal,
			'ket' => $kas->ket,
		];
		$this->rview('arus_kas/arus_kas_read', $data);
		// $this->rview('arus_kas/arus_kas_form', $data);
	}
	public function read_keluar($id)
	{
		$kas = $this->db->select('a.*,ak.nama_akun')
			->from('arus_kas a')
			->from('akun_sederhana ak', 'ak.id_akun=a.id_akun')
			->where('a.id_toko', $this->userdata->id_toko)
			->where('a.id_arus_kas', $id)
			->get()
			->row();
		$data = [
			'id_kas' => $kas->id_kas,
			'tgl' => $kas->tgl,
			'nm_akun' => $kas->nama_akun,
			'nominal' => $kas->nominal,
			'ket' => $kas->ket,
		];
		$this->rview('arus_kas/arus_kas_read', $data);
		// $this->rview('arus_kas/arus_kas_form', $data);
	}
	public function update_masuk($id)
	{

		$id_kas = '1';
		$j_kas = 'Edit Kas Masuk';
		$nama_kas = 'Nama Pendapatan';
		$data_akun = $this->db->select('*')
			->from('akun_sederhana')
			->where('id_toko', $this->userdata->id_toko)
			->where('jenis', '1')
			->get()->result();
		$kas = $this->db->select('a.*,ak.nama_akun')
			->from('arus_kas a')
			->from('akun_sederhana ak', 'ak.id_akun=a.id_akun')
			->where('a.id_toko', $this->userdata->id_toko)
			->where('a.id_arus_kas', $id)
			->get()
			->row();
		$data = [
			'nm_akun' => $kas->nama_akun,
			'active_arus_kas_masuk' => 'active',
			'j' => $j_kas,
			'nama_kas' => $nama_kas,
			'action' => site_url('admin/arus_kas/update_action_masuk'),
			'id' => set_value('id', $id),
			'tgl' => set_value('tgl', $kas->tgl),
			'id_kas' => set_value('id_kas', $id_kas),
			'id_arus_kas' => set_value('id_arus_kas', $id),
			'id_akun' => set_value('id_akun', $kas->id_akun),
			'nominal' => set_value('nominal', $kas->nominal),
			'ket' => set_value('ket', $kas->ket),
			'data_akun' => $data_akun,

		];


		$this->rview('arus_kas/arus_kas_form', $data);
		// $this->rview('arus_kas/arus_kas_form', $data);
	}
	public function update_keluar($id)
	{

		$id_kas = '2';
		$j_kas = 'Edit Kas Keluar';
		$nama_kas = 'Nama Pengeluaran';
		$data_akun = $this->db->select('*')
			->from('akun_sederhana')
			->where('id_toko', $this->userdata->id_toko)
			->where('jenis', '2')
			->get()->result();
		$kas = $this->db->select('a.*,ak.nama_akun')
			->from('arus_kas a')
			->from('akun_sederhana ak', 'ak.id_akun=a.id_akun')
			->where('a.id_toko', $this->userdata->id_toko)
			->where('a.id_arus_kas', $id)
			->get()
			->row();
		$data = [
			'nm_akun' => $kas->nama_akun,
			'active_arus_kas_masuk' => 'active',
			'j' => $j_kas,
			'nama_kas' => $nama_kas,
			'action' => site_url('admin/arus_kas/update_action_keluar'),
			'id' => set_value('id', $id),
			'tgl' => set_value('tgl', $kas->tgl),
			'id_kas' => set_value('id_kas', $id_kas),
			'id_arus_kas' => set_value('id_arus_kas', $id),
			'id_akun' => set_value('id_akun', $kas->id_akun),
			'nominal' => set_value('nominal', $kas->nominal),
			'ket' => set_value('ket', $kas->ket),
			'data_akun' => $data_akun,

		];


		$this->rview('arus_kas/arus_kas_form', $data);
		// $this->rview('arus_kas/arus_kas_form', $data);
	}

	public function update_action_masuk()
	{
		$id = $this->input->post('id_arus_kas');
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update_masuk($id);
		} else {

			$data = array(
				'tgl' => $this->input->post('tgl', true),
				'id_kas' => $this->input->post('id_kas', true),
				'id_akun' => $this->input->post('id_akun', true),
				'nominal' => str_replace('.', '', $this->input->post('nominal', true)),
				'ket' => $this->input->post('ket', true),
			);

			$this->db->where('id_arus_kas', $id);
			$r = $this->db->update('arus_kas', $data);

			if ($r) {
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('admin/arus_kas/masuk'));
			} else {
				// Capture and display database error
				$db_error = $this->db->error();
				if (!empty($db_error['message'])) {
					echo "Database Error: " . $db_error['message'];
				} else {
					echo "Unknown Database Error.";
				}

				// Set flashdata based on update result
				$this->session->set_flashdata('message', 'Update Record Failed');
				redirect(site_url('admin/arus_kas/masuk'));
			}


		}
	}
	public function update_action_keluar()
	{
		$id = $this->input->post('id_arus_kas');
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update_masuk($id);
		} else {

			$data = array(
				'tgl' => $this->input->post('tgl', true),
				'id_kas' => $this->input->post('id_kas', true),
				'id_akun' => $this->input->post('id_akun', true),
				'nominal' => str_replace('.', '', $this->input->post('nominal', true)),
				'ket' => $this->input->post('ket', true),
			);

			$this->db->where('id_arus_kas', $id);
			$r = $this->db->update('arus_kas', $data);

			if ($r) {
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('admin/arus_kas/keluar'));
			} else {
				// Capture and display database error
				$db_error = $this->db->error();
				if (!empty($db_error['message'])) {
					echo "Database Error: " . $db_error['message'];
				} else {
					echo "Unknown Database Error.";
				}

				// Set flashdata based on update result
				$this->session->set_flashdata('message', 'Update Record Failed');
				redirect(site_url('admin/arus_kas/keluar'));
			}


		}
	}

	public function delete_masuk($id)
	{
		$this->db->where('id_arus_kas', $id);
		$this->db->delete('arus_kas');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Delete Record Success');
		} else {
			$this->session->set_flashdata('message', 'Delete Record Failed');
		}

		redirect(site_url('admin/arus_kas/masuk'));
	}
	public function delete_keluar($id)
	{
		$this->db->where('id_arus_kas', $id);
		$this->db->delete('arus_kas');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Delete Record Success');
		} else {
			$this->session->set_flashdata('message', 'Delete Record Failed');
		}

		redirect(site_url('admin/arus_kas/keluar'));
	}


	public function _rules()
	{
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('id_kas', 'id kas', 'trim|required');
		$this->form_validation->set_rules('id_akun', 'id akun', 'trim|required');
		$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
		$this->form_validation->set_rules('ket', 'ket', 'trim');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}