<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_outlet();
        $this->userdata = $this->Login_model->get_data();
	}

	public function rinci_supplier()
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
		if (!empty($this->input->post('id_supplier', true))) {
			$id_supplier = $this->input->post('id_supplier', true);
			$array = array(
				'id_supplier' => $id_supplier,
			);
			$this->session->set_userdata($array);
		} else {
			if(!empty($this->session->userdata('id_supplier'))){
				$id_supplier = $this->session->userdata('id_supplier');
			} else {
				$id_supplier = 0;
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
		$data['id_supplier'] = $id_supplier;
		$data['data_supplier'] = $this->db->select('s.*')
										  ->from('supplier s')
										  ->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko')
										  ->where('s.id_toko', $this->userdata->id_toko)
										  ->where('u.id_cabang', $this->userdata->id_cabang)
										  ->order_by('s.nama_supplier', 'asc')
										  ->group_by('s.id_supplier')
										  ->get()->result();
		$data['data_faktur'] = $this->db->select('fr.*')
									   ->from('faktur_retail fr')
									   ->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko')
									   ->where('fr.id_toko', $this->userdata->id_toko)
									   ->where('u.id_cabang', $this->userdata->id_cabang)
									   ->where('DATE(CONCAT(SUBSTRING(fr.tgl,7,4),"-",SUBSTRING(fr.tgl,4,2),"-",SUBSTRING(fr.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
									   ->where('fr.id_supplier', $id_supplier)
									   ->group_by('fr.id_faktur')
									   ->get()->result();
		if ($print!="true") {
	        $this->view->render_outlet('laporan_baru/pembelian_rinci_per_supplier', $data);
		} else {
			$this->load->view('outlet/laporan_baru/pembelian_rinci_per_supplier', $data);
		}
	}

	public function rekap_supplier()
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
		if (!empty($this->input->post('id_supplier', true))) {
			$id_supplier = $this->input->post('id_supplier', true);
			$array = array(
				'id_supplier' => $id_supplier,
			);
			$this->session->set_userdata($array);
		} else {
			if(!empty($this->session->userdata('id_supplier'))){
				$id_supplier = $this->session->userdata('id_supplier');
			} else {
				$id_supplier = 0;
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
		$data['id_supplier'] = $id_supplier;
		$data['data_supplier'] = $this->db->select('s.*')
										  ->from('supplier s')
										  ->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko')
										  ->where('s.id_toko', $this->userdata->id_toko)
										  ->where('u.id_cabang', $this->userdata->id_cabang)
										  ->order_by('s.nama_supplier', 'asc')
										  ->group_by('s.id_supplier')
										  ->get()->result();
		$data['data_faktur'] = $this->db->select('fr.*')
									   ->from('faktur_retail fr')
									   ->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko')
									   ->where('fr.id_toko', $this->userdata->id_toko)
									   ->where('u.id_cabang', $this->userdata->id_cabang)
									   ->where('DATE(CONCAT(SUBSTRING(fr.tgl,7,4),"-",SUBSTRING(fr.tgl,4,2),"-",SUBSTRING(fr.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
									   ->where('fr.id_supplier', $id_supplier)
									   ->get()->result();
		if ($print!="true") {
	        $this->view->render_outlet('laporan_baru/pembelian_rekap_per_supplier', $data);
		} else {
			$this->load->view('outlet/laporan_baru/pembelian_rekap_per_supplier', $data);
		}
	}

	public function rinci()
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
		$data['data_faktur'] = $this->db->select('fr.*, s.nama_supplier')
									   ->from('faktur_retail fr')
									   ->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko')
									   ->join('supplier s', 'fr.id_supplier=s.id_supplier AND s.id_users=u.id_users AND fr.id_toko=s.id_toko')
									   ->where('fr.id_toko', $this->userdata->id_toko)
									   ->where('u.id_cabang', $this->userdata->id_cabang)
									   ->where('DATE(CONCAT(SUBSTRING(fr.tgl,7,4),"-",SUBSTRING(fr.tgl,4,2),"-",SUBSTRING(fr.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
									   ->group_by('fr.id_faktur')
									   ->get()->result();
		if ($print!="true") {
	        $this->view->render_outlet('laporan_baru/pembelian_rinci_supplier', $data);
		} else {
			$this->load->view('outlet/laporan_baru/pembelian_rinci_supplier', $data);
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
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['data_faktur'] = $this->db->select('fr.*, s.nama_supplier')
									   ->from('faktur_retail fr')
									   ->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko')
									   ->join('supplier s', 'fr.id_supplier=s.id_supplier AND s.id_users=u.id_users AND fr.id_toko=s.id_toko')
									   ->where('fr.id_toko', $this->userdata->id_toko)
									   ->where('u.id_cabang', $this->userdata->id_cabang)
									   ->where('DATE(CONCAT(SUBSTRING(fr.tgl,7,4),"-",SUBSTRING(fr.tgl,4,2),"-",SUBSTRING(fr.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
									   ->get()->result();
		if ($print!="true") {
	        $this->view->render_outlet('laporan_baru/pembelian_rekap_supplier', $data);
		} else {
			$this->load->view('outlet/laporan_baru/pembelian_rekap_supplier', $data);
		}
	}

}

/* End of file Laporan_pembelian.php */
/* Location: ./application/controllers/Laporan_pembelian.php */