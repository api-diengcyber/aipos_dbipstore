<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_persediaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_admin();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
		$print = $this->input->get('print', true);
		if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
			$array = array(
				'awal_periode' => $awal_periode,
				'akhir_periode' => $akhir_periode,
			);
			$this->session->set_userdata($array);
		} else {
			if(!empty($this->session->userdata('awal_periode')) && !empty($this->session->userdata('akhir_periode'))){
				$awal_periode = $this->session->userdata('awal_periode');
				$akhir_periode = $this->session->userdata('akhir_periode');
			} else {
				$awal_periode = date('Y-m-01');
				$akhir_periode = date('Y-m-t');
			}
		}
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap2' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
        $data['data_produk'] = $this->db->select('pr.*, sp.satuan AS nama_satuan')
				                        ->from('produk_retail pr')
				                        ->join('users u', 'u.id_users=pr.id_users AND u.id_toko=pr.id_toko')
				                        ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
				                        ->where('pr.id_toko', $this->userdata->id_toko)
				                        ->where('u.id_cabang', $this->userdata->id_cabang)
				                        ->order_by('pr.nama_produk', 'asc')
				                        ->order_by('pr.id_produk_2', 'asc')
				                        ->group_by('pr.id_produk_2')
				                        ->get()->result();
		$data['method'] = $this;
		if ($print!="true") {
	        $this->view->render_admin('laporan_baru/persediaan', $data);
		} else {
			$this->load->view('admin/laporan_baru/persediaan', $data);
		}
	}

	public function get_detail($id_produk, $add_where)
	{
		$row_od = $this->db->select('SUM(od.jumlah+od.jumlah_bonus) AS qty_jual, SUM(od.subtotal) AS rupiah_jual')
		                 ->from('orders_detail od')
                         ->join('users u', 'u.id_users=od.id_karyawan AND u.id_toko=od.id_toko')
		                 ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko')
		                 ->where('od.id_toko', $this->userdata->id_toko)
		                 ->where('u.id_cabang', $this->userdata->id_cabang)
		                 ->where('od.id_produk', $id_produk)
		                 ->where('DATE(CONCAT(SUBSTRING(o.tgl_order, 7, 4), "-", SUBSTRING(o.tgl_order, 4, 2), "-", SUBSTRING(o.tgl_order, 1, 2))) '.$add_where)
		                 ->get()->row();
		$qty_jual = 0;
		$rupiah_jual = 0;
		if ($row_od) {
			$qty_jual = $row_od->qty_jual;
			$rupiah_jual = $row_od->rupiah_jual;
		}
		$row_r = $this->db->select('SUM(r.jumlah) AS qty_retur_beli, SUM(p.total_bayar) AS rupiah_retur_beli')
		                ->from('retur r')
                        ->join('users u', 'u.id_users=r.id_users AND u.id_toko=r.id_toko')
		                ->join('pembelian p', 'r.id_faktur=p.id_faktur AND r.id_produk=p.id_produk AND p.id_users=u.id_users AND r.id_toko=p.id_toko')
		                ->where('r.id_toko', $this->userdata->id_toko)
		                ->where('u.id_cabang', $this->userdata->id_cabang)
		                ->where('r.id_produk', $id_produk)
		                ->where('DATE(CONCAT(SUBSTRING(r.tgl, 7, 4), "-", SUBSTRING(r.tgl, 4, 2), "-", SUBSTRING(r.tgl, 1, 2))) '.$add_where)
		                ->get()->row();
		$qty_retur_beli = 0;
		$rupiah_retur_beli = 0;
		if ($row_r) {
			$qty_retur_beli = $row_r->qty_retur_beli;
			$rupiah_retur_beli = $row_r->rupiah_retur_beli;
		}
		$row_p = $this->db->select('SUM(p.jumlah) AS qty_beli, SUM(p.total_bayar) AS rupiah_beli')
		                ->from('pembelian p')
                        ->join('users u', 'u.id_users=p.id_users AND u.id_toko=p.id_toko')
		                ->where('p.id_toko', $this->userdata->id_toko)
		                ->where('u.id_cabang', $this->userdata->id_cabang)
		                ->where('p.id_produk', $id_produk)
		                ->where('DATE(CONCAT(SUBSTRING(p.tgl_masuk, 7, 4), "-", SUBSTRING(p.tgl_masuk, 4, 2), "-", SUBSTRING(p.tgl_masuk, 1, 2))) '.$add_where)
		                ->get()->row();
		$qty_beli = 0;
		$rupiah_beli = 0;
		if ($row_p) {
			$qty_beli = $row_p->qty_beli;
			$rupiah_beli = $row_p->rupiah_beli;
		}
		$row_rjd = $this->db->select('SUM(rjd.jumlah) AS qty_retur_jual, SUM(rjd.subtotal) AS rupiah_retur_jual')
		                ->from('retur_jual_detail rjd')
                        ->join('users u', 'u.id_users=rjd.id_users AND u.id_toko=rjd.id_toko')
		                ->join('retur_jual rj', 'rjd.id_retur=rj.id_retur AND rj.id_users=u.id_users AND rjd.id_toko=rj.id_toko')
		                ->where('rjd.id_toko', $this->userdata->id_toko)
		                ->where('u.id_cabang', $this->userdata->id_cabang)
		                ->where('rjd.id_produk', $id_produk)
		                ->where('DATE(CONCAT(SUBSTRING(rj.tgl, 7, 4), "-", SUBSTRING(rj.tgl, 4, 2), "-", SUBSTRING(rj.tgl, 1, 2))) '.$add_where)
		                ->get()->row();
		$qty_retur_jual = 0;
		$rupiah_retur_jual = 0;
		if ($row_rjd) {
			$qty_retur_jual = $row_rjd->qty_retur_jual;
			$rupiah_retur_jual = $row_rjd->rupiah_retur_jual;
		}
		$data = array(
			'qty_jual' => $qty_jual,
			'qty_beli' => $qty_beli,
			'qty_retur_beli' => $qty_retur_beli,
			'qty_retur_jual' => $qty_retur_jual,
			'rupiah_jual' => $rupiah_jual,
			'rupiah_beli' => $rupiah_beli,
			'rupiah_retur_beli' => $rupiah_retur_beli,
			'rupiah_retur_jual' => $rupiah_retur_jual,
		);
		return (Object) $data;
	}

}

/* End of file Laporan_persediaan.php */
/* Location: ./application/controllers/Laporan_persediaan.php */