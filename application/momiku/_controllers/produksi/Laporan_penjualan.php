<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function rinci_per_area()
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
		if (!empty($this->input->post('id_kota', true))) {
			$id_kota = $this->input->post('id_kota', true);
			$array = array(
				'id_kota' => $id_kota,
			);
			$this->session->set_userdata($array);
		} else {
			if(!empty($this->session->userdata('id_kota'))){
				$id_kota = $this->session->userdata('id_kota');
			} else {
				$id_kota = 0;
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
		$data['id_toko'] = $this->userdata->id_toko;
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['id_kota'] = $id_kota;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		$data['data_sales_from_orders'] = $this->db->select('o.*, u.email, u.first_name, u.last_name')
													->from('orders o')
													->join('users u', 'o.id_sales=u.id_users AND o.id_toko=u.id_toko')
													// ->join('toko t', 'o.id_toko=t.id')
													->join('member m', 'o.pembeli=m.id_member AND o.id_toko=m.id_toko')
												    ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
												    // ->where('t.id_kota', $id_kota)
												    ->where('m.id_kota', $id_kota)
													->group_by('o.id_sales')
													->get()->result();
		if ($print!="true") {
	        $this->view->render_produksi('laporan_baru/penjualan_rinci_per_area', $data);
		} else {
			$this->load->view('produksi/laporan_baru/penjualan_rinci_per_area', $data);
		}
	}

	public function rekap_per_area()
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
		if (!empty($this->input->post('id_kota', true))) {
			$id_kota = $this->input->post('id_kota', true);
			$array = array(
				'id_kota' => $id_kota,
			);
			$this->session->set_userdata($array);
		} else {
			if(!empty($this->session->userdata('id_kota'))){
				$id_kota = $this->session->userdata('id_kota');
			} else {
				$id_kota = 0;
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
		$data['id_toko'] = $this->userdata->id_toko;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['id_kota'] = $id_kota;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		$data['data_sales_from_orders'] = $this->db->select('o.*, u.email, u.first_name, u.last_name')
													->from('orders o')
													->join('users u', 'o.id_sales=u.id_users AND o.id_toko=u.id_toko')
													// ->join('toko t', 'o.id_toko=t.id')
													->join('member m', 'o.pembeli=m.id_member AND o.id_toko=m.id_toko')
												    ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
												    // ->where('t.id_kota', $id_kota)
												    ->where('m.id_kota', $id_kota)
													->group_by('o.id_sales')
													->get()->result();
		if ($print=="true") {
			$this->load->view('produksi/laporan_baru/penjualan_rekap_per_area', $data, FALSE);
		} else {
	        $this->view->render_produksi('laporan_baru/penjualan_rekap_per_area', $data);
		}
	}

	public function rekap()
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
		$data['id_toko'] = $this->userdata->id_toko;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		$data['data_kota_from_orders'] = $this->db->select('k.*')
													->from('orders o')
													->join('users u', 'o.id_sales=u.id_users AND o.id_toko=u.id_toko')
													// ->join('toko t', 'o.id_toko=t.id')
													// ->join('kota k', 't.id_kota=k.id')
													->join('member m', 'o.pembeli=m.id_member AND o.id_toko=m.id_toko')
													->join('kota k', 'm.id_kota=k.id')
												    ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
													->group_by('k.id')
													->get()->result();
		if ($print=="true") {
			$this->load->view('produksi/laporan_baru/penjualan_rekap_area', $data, FALSE);
		} else {
	        $this->view->render_produksi('laporan_baru/penjualan_rekap_area', $data);
		}
	}

}

/* End of file Laporan_penjualan.php */
/* Location: ./application/controllers/Laporan_penjualan.php */