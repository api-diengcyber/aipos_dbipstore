  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_kas extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
	}

	public function harian()
	{
		$print = $this->input->get('print', true);
		if(!empty($this->input->post('tgl'))) {
			$tgl = $this->input->post('tgl');
			$array = array(
				'tgl' => $tgl,
			);
			$this->session->set_userdata($array);
		} else {
			if(!empty($this->session->userdata('tgl'))) {
				$tgl = $this->session->userdata('tgl');
			} else {
				$tgl = date('d-m-Y');
			}
		}
        $extgl = explode("-", $tgl);
        $s_tgl = $extgl[2].'-'.$extgl[1].'-'.$extgl[0];
        // $s_tgl = $extgl[2].'-'.$extgl[1].'-01';
		$res_pil_transaksi = $this->db->select('pt.*')
									  ->from('jurnal j')
									  ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
									  ->join('pil_transaksi pt', 'j.id_transaksi=pt.id_pil_transaksi AND j.id_toko=pt.id_toko')
									  ->where('j.id_toko', $this->userdata->id_toko)
									  ->where('u.id_cabang', $this->userdata->id_cabang)
									  ->where('SUBSTRING(j.tgl,7,4) = ', $extgl[2])
									  ->group_by('j.id_transaksi')
									  ->get()->result();
		$data = array(
			'active_lap2' => 'active',
			'print' => $print,
			'tgl' => $tgl,
			's_tgl' => $s_tgl,
			'data_pil_transaksi' => $res_pil_transaksi,
		);
		if ($print!="true") {
			$this->view('laporan_baru/kas_harian', $data);
		} else {
			$this->load->view('admin/laporan_baru/kas_harian', $data);
		}
	}

	public function bulanan()
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
		$res_pil_transaksi = $this->db->select('j.kode, j.tgl, pt.id_pil_transaksi, pt.nama_transaksi')
									  ->from('jurnal j')
									  ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
									  ->join('pil_transaksi pt', 'j.id_transaksi=pt.id_pil_transaksi AND j.id_toko=pt.id_toko')
									  ->where('j.id_toko', $this->userdata->id_toko)
									  ->where('u.id_cabang', $this->userdata->id_cabang)
									  ->where('DATE(CONCAT(SUBSTRING(j.tgl,7,4),"-",SUBSTRING(j.tgl,4,2),"-",SUBSTRING(j.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
									  ->order_by('DATE(CONCAT(SUBSTRING(j.tgl,7,4),"-",SUBSTRING(j.tgl,4,2),"-",SUBSTRING(j.tgl,1,2))) ASC')
									  ->order_by('pt.nama_transaksi', 'asc')
									  ->group_by('j.id_transaksi, j.tgl')
									  ->get()->result();
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap2' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'print' => $print,
			'awal_periode' => $awal_periode,
			'akhir_periode' => $akhir_periode,
			'data_pil_transaksi' => $res_pil_transaksi,
		);
		
		if ($print!="true") {
	        $this->view('laporan_baru/kas_bulanan', $data);
		} else {
			$this->load->view('admin/laporan_baru/kas_bulanan', $data);
		}
	}

}

/* End of file Laporan_kas.php */
/* Location: ./application/controllers/Laporan_kas.php */