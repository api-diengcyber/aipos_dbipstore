<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_hutang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->library('datatables');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model('Pengaturan_transaksi_model');
        $this->load->model('Hutang_retail_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_admin();
        $this->userdata = $this->Login_model->get_data();
	}

	public function migrasi()
	{
		$kode_jurnal = 'HUTANG-JURNAL';
		$i = 0;
		$res = $this->db->select('h.id AS id_hutang, h.tgl, SUM(h.kurang) AS total_hutang, s.id_supplier, s.nama_supplier, a.id AS id_akun, a.akun, fr.id_faktur, fr.no_faktur')
						->from('hutang h')
						->join('users u', 'h.id_users=u.id_users AND h.id_toko=u.id_toko')
						->join('supplier s', 'h.id_supplier=s.id_supplier AND u.id_users=s.id_users AND h.id_toko=s.id_toko')
						->join('akun a', 'a.parent="supplier" AND a.uid=s.id_supplier')
						->join('faktur_retail fr', 'h.id_faktur=fr.id_faktur AND fr.id_users=u.id_users AND h.id_toko=fr.id_toko')
						->where('h.id_toko', $this->userdata->id_toko)
						->group_by('fr.no_faktur')
						->order_by('h.id', 'asc')
						->get()->result();
		foreach ($res as $key) {
			/*$this->Pengaturan_transaksi_model->gen_kode = '';
			$kode = $this->Pengaturan_transaksi_model->generate_kode('HUTANG-JURNAL');*/
			$i++;
			$kode = $kode_jurnal.'-'.$i;
			$data = array(
				'kode' => $kode,
				'id_toko' => $this->userdata->id_toko,
				'tgl' => $key->tgl,
				'id_proses' => $key->id_faktur,
				'id_hutang' => $key->id_hutang,
				'id_akun' => $key->id_akun,
				'no_faktur' => $key->no_faktur,
				'debet' => 0,
				'kredit' => $key->total_hutang,
			);
			$this->db->insert('jurnal', $data);
			echo "<pre>";
			print_r ($data);
			echo "</pre>";
			echo "<hr>";
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
            'active_lap2_hutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
		$data['contents'] = $this->Hutang_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
		$data['id_toko'] = $this->userdata->id_toko;
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		if ($print!="true") {
	        $this->view->render_admin('laporan_baru/hutang2', $data);
		} else {
			$this->load->view('admin/laporan_baru/hutang2', $data);
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
            'active_lap2_hutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
		$data['contents'] = $this->Hutang_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
		$data['id_toko'] = $this->userdata->id_toko;
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		if ($print!="true") {
	        $this->view->render_admin('laporan_baru/hutang_rinci', $data);
		} else {
			$this->load->view('admin/laporan_baru/hutang_rinci', $data);
		}
	}

}