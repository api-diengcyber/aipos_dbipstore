<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Pengaturan_transaksi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_admin();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
		$res_kode_penjualan = $this->Pengaturan_transaksi_model->get_kode_by_menu('penjualan');
		$row_transaksi_penjualan = $this->Pengaturan_transaksi_model->get_by_menu('penjualan');
		// $res_kode_fakturpembelian = $this->Pengaturan_transaksi_model->get_kode_by_menu('fakturpembelian');
		// $row_transaksi_fakturpembelian = $this->Pengaturan_transaksi_model->get_by_menu('fakturpembelian');
		$res_kode_pembelian = $this->Pengaturan_transaksi_model->get_kode_by_menu('pembelian');
		$row_transaksi_pembelian = $this->Pengaturan_transaksi_model->get_by_menu('pembelian');
		$res_kode_piutang = $this->Pengaturan_transaksi_model->get_kode_by_menu('piutang');
		$row_transaksi_piutang = $this->Pengaturan_transaksi_model->get_by_menu('piutang');
		$res_kode_hutang = $this->Pengaturan_transaksi_model->get_kode_by_menu('hutang');
		$row_transaksi_hutang = $this->Pengaturan_transaksi_model->get_by_menu('hutang');
		$res_kode_buatretur = $this->Pengaturan_transaksi_model->get_kode_by_menu('buatretur');
		$row_transaksi_buatretur = $this->Pengaturan_transaksi_model->get_by_menu('buatretur');
		$res_kode_buatreturjual = $this->Pengaturan_transaksi_model->get_kode_by_menu('buatreturjual');
		$row_transaksi_buatreturjual = $this->Pengaturan_transaksi_model->get_by_menu('buatreturjual');
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pengaturan_transaksi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'data_kode_penjualan' => $res_kode_penjualan,
			'data_transaksi_penjualan' => $row_transaksi_penjualan,
			// 'data_kode_fakturpembelian' => $res_kode_fakturpembelian,
			// 'data_transaksi_fakturpembelian' => $row_transaksi_fakturpembelian,
			'data_kode_pembelian' => $res_kode_pembelian,
			'data_transaksi_pembelian' => $row_transaksi_pembelian,
			'data_kode_piutang' => $res_kode_piutang,
			'data_transaksi_piutang' => $row_transaksi_piutang,
			'data_kode_hutang' => $res_kode_hutang,
			'data_transaksi_hutang' => $row_transaksi_hutang,
			'data_kode_buatretur' => $res_kode_buatretur,
			'data_transaksi_buatretur' => $row_transaksi_buatretur,
			'data_kode_buatreturjual' => $res_kode_buatreturjual,
			'data_transaksi_buatreturjual' => $row_transaksi_buatreturjual,
		);
        $this->view->render_admin('pengaturan_transaksi/peng_transaksi', $data);
	}

	public function create_action()
	{
		header('Content-Type: application/json');
		$jenis = $this->input->post('jenis', true);
		$text = $this->input->post('text', true);
		$test = $this->Pengaturan_transaksi_model->testing($jenis, $text);
		$status = "error";
		if ($test->status===null) {
			$status = "ok";
			$row = $this->Pengaturan_transaksi_model->get_by_menu($jenis);
			if ($row) {
				$data_update = array(
					'kode' => $test->text
				);
				$this->Pengaturan_transaksi_model->update($row->id, $data_update);
			} else {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'menu_proses' => $jenis,
					'kode' => $test->text
				);
				$this->Pengaturan_transaksi_model->insert($data_insert);
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