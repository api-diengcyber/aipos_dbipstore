<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_transaksi extends AI_Admin {
	
	public function __construct()
	{
		parent::__construct();
		$this->models('Pengaturan_transaksi_model:Model');
		$this->menus = array('penjualan','pembelian','pembelianproduksi','pembeliankonsinyasi','piutang','hutang','buatretur','buatreturjual','piutanglunas','verifikasibayar','saldoterbuka'); // fakturpembelian
	}

	function get_menu($nama_menu)
	{
		$data = array();
		$data[0] = array(
			'nama' => 'data_kode_'.$nama_menu,
			'data' => $this->Model->get_kode_by_menu($nama_menu),
		);
		$data[1] = array(
			'nama' => 'data_transaksi_'.$nama_menu,
			'data' => $this->Model->get_by_menu($nama_menu),
		);
		return (array) $data;
	}

	public function index()
	{
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_pengaturan_transaksi' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
			'menus' => $this->menus,
		);
		foreach ($this->menus as $key => $nm_menu) {
			$raw = $this->get_menu($nm_menu);
			$raw1 = $raw[0];
			$raw1_nama = $raw1['nama'];
			$raw2 = $raw[1];
			$raw2_nama = $raw2['nama'];
			$data[$raw1_nama] = $raw1['data'];
			$data[$raw2_nama] = $raw2['data'];
		}
		$this->view('pengaturan_transaksi/peng_transaksi', $data);
	}

	public function create_action()
	{
		header('Content-Type: application/json');
		$jenis = $this->input->post('jenis', true);
		$text = $this->input->post('text', true);
		$test = $this->Model->testing($jenis, $text);
		$status = "error";
		if ($test->status===null) {
			$status = "ok";
			$row = $this->Model->get_by_menu($jenis);
			if ($row) {
				$data_update = array(
					'kode' => $test->text
				);
				$this->Model->update($row->id, $data_update);
			} else {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'menu_proses' => $jenis,
					'kode' => $test->text
				);
				$this->Model->insert($data_insert);
			}
		}
		$data = array(
			'status' => $status
		);
		echo json_encode($data);
	}

}

/* End of file Pengaturan_transaksi.php */
/* Location: ./application/controllers/Pengaturan_transaksi.php */