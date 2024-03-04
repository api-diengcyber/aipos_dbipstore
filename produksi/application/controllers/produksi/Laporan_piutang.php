<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_piutang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function rekap_area()
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
            'active_lap2_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'id_cabang' => $this->userdata->id_cabang,
        );
		$data['id_toko'] = $this->userdata->id_toko;
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['id_kota'] = $id_kota;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		if ($print!="true") {
	        $this->view->render_produksi('laporan_baru/piutang_rekap_area', $data);
		} else {
			$this->load->view('produksi/laporan_baru/piutang_rekap_area', $data);
		}
	}

	public function rinci_area()
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
            'active_lap2_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'id_cabang' => $this->userdata->id_cabang,
        );
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['id_kota'] = $id_kota;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		if ($print!="true") {
	        $this->view->render_produksi('laporan_baru/piutang_rinci_area', $data);
		} else {
			$this->load->view('produksi/laporan_baru/piutang_rinci_area', $data);
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
            'active_lap2_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'id_cabang' => $this->userdata->id_cabang,
        );
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		if ($print!="true") {
	        $this->view->render_produksi('laporan_baru/piutang_rekap', $data);
		} else {
			$this->load->view('produksi/laporan_baru/piutang_rekap', $data);
		}
	}

}

/* End of file Laporan_piutang.php */
/* Location: ./application/controllers/Laporan_piutang.php */