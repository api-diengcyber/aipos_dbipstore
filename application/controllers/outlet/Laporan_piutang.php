<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_piutang extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		$this->models('Sales_order_model');
	}

	public function index($page = '')
	{
		$no_invoice = $this->input->post('no_invoice');
		$id_media = 4; // cod
		// $status = $this->input->post('status');
		$status = 3;
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$no_resi = $this->input->post('no_resi');
		
		// data order
		$params = array('status'=>$status,'dari'=>$dari,'sampai'=>$sampai,'no_invoice'=>$no_invoice,'pembayaran'=>'4','order'=>true);
		if (!empty($no_resi)) {
			$nl = trim(preg_replace('/\s\s+/', '|', $no_resi));
			$exnl = explode('|', $nl);
			$params['multi_resi'] = $exnl;
		}
		$pagination = array('page'=>($page)?$page:1,'perpage'=>100);
		$data_order = $this->Sales_order_model->get_order($params,$pagination);
		$data_order2 = $this->Sales_order_model->_get_order($params)->get()->num_rows();

		$this->load->library('pagination');

		$config['base_url'] = base_url('admin/laporan_piutang/index/');
		$config['total_rows'] =  $data_order2;
		$config['use_page_numbers'] = true;
		$config['per_page'] = $pagination['perpage'];
		
		$this->pagination->initialize($config);

		$exdari = explode("-",$dari);
		// $fdari = !empty($exdari[2])?$exdari[2]:date('Y');
		// $fdari .= '-'.(!empty($exdari[1])?$exdari[1]:date('m'));

		$fdari = date('Y')."-".date('m');
		$fsampai = date('Y')."-".date('m');

		$exsampai = explode("-",$sampai);
		// $fsampai = !empty($exsampai[2])?$exsampai[2]:date('Y');
		// $fsampai .= '-'.(!empty($exsampai[1])?$exsampai[1]:date('m'));

		$and_where = "";
		// if (!empty($dari) && !empty($sampai)) {
			$and_where = ' AND CONCAT(SUBSTRING(tgl_order,7,4),"-",SUBSTRING(tgl_order,4,2)) BETWEEN "'.$fdari.'" AND "'.$fsampai.'"';
		// }

		$row_no_faktur = $this->db->select('no_faktur, valid, COUNT(no_faktur) AS c')
														->from('orders')
														->group_by('no_faktur')
														->having('c > 1')
														->get()->row();
		$row_bukan_member = $this->db->select('LEFT(bukan_member,20), valid, COUNT(LEFT(bukan_member,20)) AS c')
												->from('orders')
												->where('valid IS NULL'.$and_where)
												->group_by('LEFT(bukan_member,20)')
												->having('c > 1')
												->get()->row();

		$show_warning = false;
		if ($row_no_faktur || $row_bukan_member) {
		$show_warning = true;
		}
				
		$data = array(
			'active_lap_piutang_c' => 'active',
			'data_order' => $data_order,
			'status' => $status,
			'exp' => $this->db->get('expedisi')->result(),
			'dari' => $dari,
			'pagination' => $this->pagination->create_links(),
			'no_invoice' => $no_invoice,
			'id_media' => $id_media,
			'sampai' => $sampai,
			'no_resi' => $no_resi,
			'page' => $page,
			'message' => $this->session->userdata('message'),
			'show_warning' => $show_warning,
		);
		$this->view('laporan/piutang_cod', $data);
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
			if (!empty($this->session->userdata('awal_periode')) && !empty($this->session->userdata('akhir_periode'))) {
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
			if (!empty($this->session->userdata('id_kota'))) {
				$id_kota = $this->session->userdata('id_kota');
			} else {
				$id_kota = 0;
			}
		}
        $data = array(
            'active_lap2_piutang' => 'active',
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
	        $this->view('laporan_baru/piutang_rekap_area', $data);
		} else {
			$this->load->view('admin/laporan_baru/piutang_rekap_area', $data);
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
            'active_lap2_piutang' => 'active',
        );
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['id_kota'] = $id_kota;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		if ($print!="true") {
	        $this->view('laporan_baru/piutang_rinci_area', $data);
		} else {
			$this->load->view('admin/laporan_baru/piutang_rinci_area', $data);
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
            'active_lap2_piutang' => 'active',
        );
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['data_kota'] = $this->db->select('*')
									  ->from('kota')
									  ->get()->result();
		if ($print!="true") {
			$this->view('laporan_baru/piutang_rekap', $data);
		} else {
			$this->load->view('admin/laporan_baru/piutang_rekap', $data);
		}
	}

}

/* End of file Laporan_piutang.php */
/* Location: ./application/controllers/Laporan_piutang.php */