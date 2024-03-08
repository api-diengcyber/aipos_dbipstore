<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analisa extends AI_Admin
{
  function __construct()
  {
    parent::__construct();
    $this->models('Pegawai_retail_model');
  }

	public $array_month = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	public function get_detail($id_produk, $id_member, $bulan, $tahun)
	{
		$data_produk_jual = $this->db->select('SUM(od.jumlah+od.jumlah_bonus) AS terjual, SUM(od.subtotal) AS total, SUM(rjd.jumlah) AS jumlah_retur')
								->from("produk_retail p")
								->join("orders_detail od", "p.id_produk_2=od.id_produk AND od.id_toko='".$this->userdata->id_toko."'")
								->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'")
								->join('retur_jual_detail rjd', 'od.id_orders=rjd.id_orders_detail AND od.id_toko=rjd.id_toko', 'left')
								->where("p.id_toko", $this->userdata->id_toko)
								->where("p.id_produk_2", $id_produk)
								->where("o.pembeli", $id_member)
								->where("SUBSTRING(o.tgl_order,7,4)=", $tahun)
								->where("SUBSTRING(o.tgl_order,4,2)=", sprintf("%02d", $bulan))
								->order_by("od.jumlah", "desc")
								->order_by("p.nama_produk", "asc")
								->get()->row();
		$data = array();
		$data["dibeli"] = 0;
		$data["nominal"] = 0;
		if ($data_produk_jual) {
			$data["dibeli"] = $data_produk_jual->terjual*1;
			$data["nominal"] = $data_produk_jual->total*1;
		}
		return (Object) $data;
  }
  
	public function produk()
	{
		$data_login = $this->userdata;
		$id_sales = 0;
		$id_member = 0;
		$id_principal = 0;
		$triwulan = 1;
		$tahun = date('Y');
		$print = $this->input->get('print', true);
		if (!empty($this->input->post('id_sales', true))) {
			$id_sales = $this->input->post('id_sales', true);
			$array = array(
				'id_sales' => $id_sales
			);			
			$this->session->set_userdata($array);
		}
		if ($this->session->userdata('id_sales')!=null) {
			$id_sales = $this->session->userdata('id_sales');
		}
		if (!empty($this->input->post('id_member', true))) {
			$id_member = $this->input->post('id_member', true);
			$array = array(
				'id_member' => $id_member
			);			
			$this->session->set_userdata($array);
		}
		if ($this->session->userdata('id_member')!=null) {
			$id_member = $this->session->userdata('id_member');
		}
		if (!empty($this->input->post('id_principal', true))) {
			$id_principal = $this->input->post('id_principal', true);
			$array = array(
				'id_principal' => $id_principal
			);			
			$this->session->set_userdata($array);
		}
		if ($this->session->userdata('id_principal')!=null) {
			$id_principal = $this->session->userdata('id_principal');
		}
		if (!empty($this->input->post('triwulan', true))) {
			$triwulan = $this->input->post('triwulan', true);
			$array = array(
				'triwulan' => $triwulan
			);			
			$this->session->set_userdata($array);
		}
		if ($this->session->userdata('triwulan')!=null) {
			$triwulan = $this->session->userdata('triwulan');
		}
		if (!empty($this->input->post('tahun', true))) {
			$tahun = $this->input->post('tahun', true);
			$array = array(
				'tahun' => $tahun
			);			
			$this->session->set_userdata($array);
		}
		if ($this->session->userdata('tahun')!=null) {
			$tahun = $this->session->userdata('tahun');
		}
		if ($triwulan=="1") {
			$month_start = "01";
			$month_end = "03";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		} else if ($triwulan=="2") {
			$month_start = "04";
			$month_end = "06";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		} else if ($triwulan=="3") {
			$month_start = "07";
			$month_end = "09";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		} else if ($triwulan=="4") {
			$month_start = "10";
			$month_end = "12";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		}
		$data_sales = $this->db->select('u.*')
							   ->from('users u')
							   ->where('u.id_toko', $this->userdata->id_toko)
							   ->where('u.level', 2)
							   ->order_by('u.first_name', 'asc')
							   ->get()->result();
		if (!empty($id_sales)) {
			$data_member = $this->db->select('m.*')
								   ->from('member m')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('m.nama!=', '')
								   ->where('m.id_sales', $id_sales)
								   ->order_by('m.nama', 'asc')
								   ->get()->result();
		} else {
			$id_member = 0;
			$data_member = $this->db->select('m.*')
								   ->from('member m')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('m.nama!=', '')
								   ->order_by('m.nama', 'asc')
								   ->get()->result();
		}
		if (empty($id_principal)) {
			// $row_principal = $this->db->select('SUBSTRING_INDEX(nama_kategori,"-",1) AS nama_principal')->from('kategori_produk')->where('id_toko', $this->userdata->id_toko)->order_by('nama_kategori', 'asc')->get()->row();
			$row_principal = $this->db->select('*')
                                ->from('supplier')
                                ->where('id_toko', $this->userdata->id_toko)
                                ->order_by('nama_supplier', 'asc')
                                ->get()->row();
			if ($row_principal) {
				$id_principal = $row_principal->id_supplier;
			}
		}
		// $this->db->select('SUBSTRING_INDEX(kp.nama_kategori,"-",1) AS nama_principal, s.nama_supplier')
		$data_principal = $this->db->select('s.id_supplier, s.nama_supplier AS nama_principal, s.nama_supplier')
								   ->from('kategori_produk kp')
								   ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
								   ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_toko="'.$this->userdata->id_toko.'"')
								   ->where('kp.id_toko', $this->userdata->id_toko)
								   // ->order_by('kp.nama_kategori', 'asc')
								   // ->group_by('SUBSTRING_INDEX(kp.nama_kategori,"-",1)')
								   ->order_by('s.nama_supplier', 'asc')
								   ->group_by('s.nama_supplier')
								   ->get()->result();
		$where_add = 'pr.id_produk_2 > 0';
		if (!empty($id_sales)) {
			$where_add = 'm.id_sales="'.$id_sales.'"';
			if (!empty($id_member)) {
				$where_add .= ' AND m.id_member="'.$id_member.'"';
			}
		}
		if (!empty($id_principal)) {
			// $where_add .= ' AND SUBSTRING_INDEX(kp.nama_kategori,"-",1)="'.$id_principal.'"';
			$where_add .= ' AND s.id_supplier="'.$id_principal.'"';
		}
		$data_produk_jual = $this->db->select('m.nama, m.alamat, m.telp, kp.nama_kategori, o.id_sales, o.pembeli, pr.id_produk_2, pr.nama_produk, m.id_member, s.nama_supplier')
									 ->from('member m')
									 ->join('kategori_produk kp', 'kp.id_toko="'.$this->userdata->id_toko.'"')
									 ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
									 ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_toko="'.$this->userdata->id_toko.'"', 'left')
									 ->join('orders_detail od', 'pr.id_produk_2=od.id_produk AND od.id_toko="'.$this->userdata->id_toko.'"', 'left')
									 ->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'", 'left')
									 ->join('retur_jual_detail rjd', 'od.id_orders=rjd.id_orders_detail AND od.id_toko=rjd.id_toko', 'left')
									 ->where('m.id_toko', $this->userdata->id_toko)
									 ->where($where_add)
									 ->where('m.nama!=', '')
									 ->order_by('m.nama', 'asc')
									 ->order_by('m.alamat', 'asc')
									 ->order_by('m.id_member', 'asc')
									 ->order_by('kp.nama_kategori', 'asc')
									 ->order_by('pr.nama_produk', 'asc')
									 ->group_by('m.id_member')
									 ->group_by('kp.id_kategori_2')
									 ->group_by('pr.id_produk_2')
									 ->limit(1000)
									 ->get()->result();
		$exstart = explode("-", $start_date);
		$zstart_date = $exstart[2].'-'.$exstart[1].'-'.$exstart[0];
		$exend = explode("-", $end_date);
		$zend_date = $exend[2].'-'.$exend[1].'-'.$exend[0];
		$data = array(
			'active_analisa_produk' => 'active',
			'data_login' => $data_login,
			'print' => $print,
			'array_month' => $this->array_month,
			'triwulan' => $triwulan,
			'tahun' => $tahun,
			'month_start' => $month_start,
			'month_end' => $month_end,
			'zstart_date' => $zstart_date,
			'zend_date' => $zend_date,
			'id_sales' => $id_sales,
			'data_sales' => $data_sales,
			'id_member' => $id_member,
			'data_member' => $data_member,
			'id_principal' => $id_principal,
			'data_principal' => $data_principal,
			'data_produk_jual' => $data_produk_jual,
			'that' => $this
		);
		if ($print=="true") {
			$this->load->view('admin/analisa/produk', $data, FALSE);
		} else {
			$this->view('analisa/produk', $data);
		}
	}

	private function x_week_range($date) {
	    $ts = strtotime($date);
	    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
	    return array(date('d-m-Y', $start),
	                 date('d-m-Y', strtotime('next saturday', $start)));
	}

	public function getAllDaysInAMonth($year, $month, $day = 'Monday', $daysError = 3) {
		$dateString = 'first '.$day.' of '.$year.'-'.$month;
		if (!strtotime($dateString)) {
			throw new \Exception('"'.$dateString.'" is not a valid strtotime');
		}
		$startDay = new \DateTime($dateString);
		if ($startDay->format('j') > $daysError) {
			$startDay->modify('- 7 days');
		}
		$days = array();
		while ($startDay->format('Y-m') <= $year.'-'.str_pad($month, 2, 0, STR_PAD_LEFT)) {
			$days[] = clone($startDay);
			$startDay->modify('+ 7 days');
		}
		return $days;
	}

	public function salesman()
	{
		// TAB ACTIVE //
		$tab_active = 'harian';
		if (!empty($this->input->post('tab_active', true))) {
			$tab_active = $this->input->post('tab_active', true);	
		}
		/// HARIAN //
		$pil_tanggal = "minggu";
		if (!empty($this->input->post('pil_tanggal', true))) {
			$pil_tanggal = $this->input->post('pil_tanggal', true);	
		}
		$week_range = $this->x_week_range(date('d-m-Y'));
		$start_periode = $week_range[0];
		$end_periode = $week_range[1];
		if ($pil_tanggal=="minggu") {
			$week_range = $this->x_week_range(date('d-m-Y'));
			$start_periode = $week_range[0];
			$end_periode = $week_range[1];
		} else if ($pil_tanggal=="bulan") {
			$start_periode = date('01-m-Y');
			$end_periode = date('t-m-Y');
		} else if ($pil_tanggal=="periode") {
			$periode = $this->input->post('periode', true);
			$experiode = explode(' - ', $periode);
			$start_periode = !empty($experiode[0]) ? $experiode[0] : date('01-m-Y');
			$end_periode = !empty($experiode[1]) ? $experiode[1] : date('t-m-Y');
		}
        $begin = new DateTime(date('Y-m-d', strtotime($start_periode)));
        $end = new DateTime(date('Y-m-d', strtotime($end_periode)));
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
		/// MINGGUAN //
		$m_tahun = date('Y');
		if (!empty($this->input->post('m_tahun', true))) {
			$m_tahun = $this->input->post('m_tahun', true);
		}
		$m_bulan = date('m');
		if (!empty($this->input->post('m_bulan', true))) {
			$m_bulan = $this->input->post('m_bulan', true);
			$m_bulan = sprintf("%02d", $m_bulan);
		}
		$array_mingguan = $this->getAllDaysInAMonth($m_tahun, $m_bulan);
		/// BULANAN //
		$pil_bulanan = "bulan";
		if (!empty($this->input->post('pil_bulanan', true))) {
			$pil_bulanan = $this->input->post('pil_bulanan', true);	
		}
		$start_pb = date('01-Y');
		$end_pb = date('m-Y');
		if ($pil_bulanan=="bulan") {
			if (!empty($this->input->post('start_pb', true))) {
				$start_pb = $this->input->post('start_pb', true);
			}
			if (!empty($this->input->post('end_pb', true))) {
				$end_pb = $this->input->post('end_pb', true);
			}
		} else if ($pil_bulanan=="tahun") {
			$start_pb = '01-'.date('Y');
			$end_pb = '12-'.date('Y');
		}
		$array_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $pb_begin = new DateTime(date('Y-m-d', strtotime('01-'.$start_pb)));
    $pb_end = new DateTime(date('Y-m-d', strtotime('28-'.$end_pb)));
    $pb_interval = DateInterval::createFromDateString('1 month');
    $pb_period = new DatePeriod($pb_begin, $pb_interval, $pb_end);

		$data = array(
			'active_analisa_sales' => 'active',
			'tab_active' => $tab_active,
			'start_periode' => $start_periode,
			'end_periode' => $end_periode,
			'period' => $period,
			'tgl' => $this->x_week_range(date('d-m-Y')),
			'pil_tanggal' => $pil_tanggal,
			'm_tahun' => $m_tahun,
			'm_bulan' => $m_bulan,
			'array_mingguan' => $array_mingguan,
			'pil_bulanan' => $pil_bulanan,
			'start_pb' => $start_pb,
			'end_pb' => $end_pb,
			'zstart_pb' => date('d-m-Y', strtotime('01-'.$start_pb)),
			'zend_pb' => date('t-m-Y', strtotime('01-'.$end_pb)),
			'pb_period' => $pb_period,
			'array_bulan' => $array_bulan,
			'data_sales' => $this->db->select('*')
                              ->from('users')
                              ->where('id_toko', $this->userdata->id_toko)
                              ->where('level', '2')
                              ->order_by('first_name', 'asc')
                              ->order_by('id_users', 'asc')
                              ->order_by('id', 'asc')
                              ->get()->result(),
		);
		if ($this->userdata->level=="1" || $this->userdata->level=="2" || $this->userdata->level=="5") {
			$this->view('analisa/sales', $data);
		} else {
			redirect('/');
		}
  }
  
}