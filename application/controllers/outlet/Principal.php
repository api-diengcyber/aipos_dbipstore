<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
	}

	public $array_month = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	public function index()
	{
		if ($this->userdata->level=="6") {
			redirect(site_url('admin/principal/timeseries'));
		}
		$id_principal = 0;
		$id_produk = 0;
		if (!empty($this->input->post('id_principal', true))) {
			$id_principal = $this->input->post('id_principal', true);
		}
		if (!empty($this->input->post('id_produk', true))) {
			$id_produk = $this->input->post('id_produk', true);
		}
		$start_periode = date('01-m-Y');
		$end_periode = date('t-m-Y');
		if (!empty($this->session->userdata('start_periode'))) {
			$start_periode = $this->session->userdata('start_periode');
		}
		if (!empty($this->session->userdata('end_periode'))) {
			$end_periode = $this->session->userdata('end_periode');
		}
		if (!empty($this->input->post('start_periode', true))) {
			$start_periode = $this->input->post('start_periode', true);
			$array = array(
				'start_periode' => $start_periode
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->input->post('end_periode', true))) {
			$end_periode = $this->input->post('end_periode', true);
			$array = array(
				'end_periode' => $end_periode
			);
			$this->session->set_userdata($array);
		}
		$exstart = explode("-", $start_periode);
		$zstart_periode = $exstart[2].'-'.$exstart[1].'-'.$exstart[0];
		$exend = explode("-", $end_periode);
		$zend_periode = $exend[2].'-'.$exend[1].'-'.$exend[0];
		// $data_principal = $this->db->select('SUBSTRING_INDEX(kp.nama_kategori,"-",1) AS nama_principal')
		// 						   ->from('kategori_produk kp')
		// 						   ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_toko="'.$this->userdata->id_toko.'"')
		// 						   ->where('kp.id_toko', $this->userdata->id_toko)
		// 						   ->order_by('kp.nama_kategori', 'asc')
		// 						   ->group_by('SUBSTRING_INDEX(kp.nama_kategori,"-",1)')
		// 							 ->get()->result();
		$data_principal = $this->db->select('s.*')
															->from('supplier s')
															->where('s.id_toko', $this->userdata->id_toko)
															->get()->result();
		if (!empty($id_principal)) {
			$data_produk = $this->db->select('pr.*')
									->from('produk_retail pr')
									->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND kp.id_toko="'.$this->userdata->id_toko.'"')
									->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko="'.$this->userdata->id_toko.'"')
									->where('pr.id_toko', $this->userdata->id_toko)
									->where('s.id_supplier = ', $id_principal)
									->order_by('pr.nama_produk', 'asc')
									->get()->result();
			$where_t = "s.id_supplier = '".$id_principal."'";
		} else {
			$data_produk = $this->db->select('*')
									->from('produk_retail')
									->where('id_toko', $this->userdata->id_toko)
									->order_by('nama_produk', 'asc')
									->get()->result();
			$where_t = "kp.id_kategori_2 > 0";
		}
		$data_produk_jual = $this->db->select('p.*, kp.nama_kategori, SUM(od.jumlah+od.jumlah_bonus) AS terjual, SUM(od.subtotal) AS total, SUM(rjd.jumlah) AS jumlah_retur')
									->from("produk_retail p")
									->join("orders_detail od", "p.id_produk_2=od.id_produk AND od.id_toko='".$this->userdata->id_toko."'")
									->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'")
									->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
									->join("kategori_produk kp", "p.id_kategori=kp.id_kategori_2 AND kp.id_toko='".$this->userdata->id_toko."'")
									->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko="'.$this->userdata->id_toko.'"')
									->where("p.id_toko", $this->userdata->id_toko)
									->where("DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),'-',SUBSTRING(o.tgl_order,4,2),'-',SUBSTRING(o.tgl_order,1,2))) BETWEEN '".$zstart_periode."' AND '".$zend_periode."'")
									->where($where_t)
									->order_by("kp.nama_kategori", "asc")
									->order_by("od.jumlah", "desc")
									->order_by("p.nama_produk", "asc")
									->group_by("p.id_produk_2")
									->get()->result();
		$data = array(
			'active_principal' => 'active',
			'id_principal' => $id_principal,
			'id_produk' => $id_produk,
			'start_periode' => $start_periode,
			'end_periode' => $end_periode,
			'data_principal' => $data_principal,
			'data_produk' => $data_produk,
			'data_produk_jual' => $data_produk_jual
		);
		$this->view('principal/principal_list', $data);
	}

	public function detail_produk($id_produk = '', $start_periode = '', $end_periode = '', $trimester = '')
	{
		$row_produk = $this->db->select('pr.*')
									   ->from('produk_retail pr')
									   ->where('pr.id_produk_2', $id_produk)
									   ->where('pr.id_toko', $this->userdata->id_toko)
									   ->get()->row();
		if ($row_produk) {
			$exstart = explode("-", $start_periode);
			$month_start = $exstart[1];
			$zstart = $exstart[2]."-".$exstart[1]."-".$exstart[0];
			$exend = explode("-", $end_periode);
			$month_end = $exend[1];
			$zend = $exend[2]."-".$exend[1]."-".$exend[0];
			$res_o_p = $this->db->select('SUM(od.jumlah) AS jumlah, SUM(od.jumlah_bonus) AS jumlah_bonus, SUM(od.subtotal) AS total, m.nama, m.alamat, m.telp, o.pembeli, u.first_name, SUM(rjd.jumlah) AS jumlah_retur')
								->from('orders_detail od')
								->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko="'.$this->userdata->id_toko.'"')
								->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
								->join('member m', 'm.id_member=o.pembeli AND m.id_toko="'.$this->userdata->id_toko.'"', 'left')
								->join('users u', 'o.id_sales=u.id_users AND u.id_toko="'.$this->userdata->id_toko.'"', 'left')
								->where('od.id_toko', $this->userdata->id_toko)
								->where('od.id_produk', $id_produk)
								->where('o.pembeli IS NOT NULL')
								->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$zstart.'" AND "'.$zend.'"')
								->order_by('m.nama', 'asc')
								->group_by('o.pembeli')
								->get()->result();
			$data = array(
				'active_principal' => 'active',
				'data_login' => $this->userdata,
				'id_produk' => $id_produk,
				'data_produk' => $row_produk,
				'start_periode' => $start_periode,
				'end_periode' => $end_periode,
				'month_start' => $month_start,
				'month_end' => $month_end,
				'array_month' => $this->array_month,
				'tahun' => $exend[2],
				'data_detail' => $res_o_p,
			);
			if ($trimester=='trimester') {
				$this->view('principal/detail_produk_trimester', $data);
			} else {
				$this->view('principal/detail_produk', $data);
			}
		} else {
			redirect('principal');
		}
	}

	public function timeseries()
	{
		$id_principal = 0;
		$id_produk = 0;
		$triwulan = 1;
		$tahun = date('Y');
		$print = $this->input->get('print', true);
		if (!empty($this->input->post('id_principal', true))) {
			$id_principal = $this->input->post('id_principal', true);
			$array = array(
				'id_principal' => $id_principal
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->session->userdata('id_principal'))) {
			$id_principal = $this->session->userdata('id_principal');
		}
		if (!empty($this->input->post('id_produk', true))) {
			$id_produk = $this->input->post('id_produk', true);
			$array = array(
				'id_produk' => $id_produk
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->session->userdata('id_produk'))) {
			$id_produk = $this->session->userdata('id_produk');
		}
		if (!empty($this->input->post('triwulan', true))) {
			$triwulan = $this->input->post('triwulan', true);
			$array = array(
				'triwulan' => $triwulan
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->session->userdata('triwulan'))) {
			$triwulan = $this->session->userdata('triwulan');
		}
		if (!empty($this->input->post('tahun', true))) {
			$tahun = $this->input->post('tahun', true);
			$array = array(
				'tahun' => $tahun
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->session->userdata('tahun'))) {
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
		$where_kat = 'kp.id_kategori > 0';
		if ($this->userdata->level=="6") {
			$row_users = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $this->userdata->id_user)->get('users')->row();
			if ($row_users) {
				$where_kat = 'SUBSTRING_INDEX(kp.nama_kategori,"-",1)="'.$row_users->first_name.'"';
				$id_principal = $row_users->first_name;
			}
		}
		// $data_principal = $this->db->select('SUBSTRING_INDEX(kp.nama_kategori,"-",1) AS nama_principal')
		// 						   ->from('kategori_produk kp')
		// 						   ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_toko="'.$this->userdata->id_toko.'"')
		// 						   ->where('kp.id_toko', $this->userdata->id_toko)
		// 						   ->where($where_kat)
		// 						   ->order_by('kp.nama_kategori', 'asc')
		// 						   ->group_by('SUBSTRING_INDEX(kp.nama_kategori,"-",1)')
		// 						   ->get()->result();
		$data_principal = $this->db->select('s.*')
															->from('supplier s')
															->where('s.id_toko', $this->userdata->id_toko)
															->get()->result();
		if (!empty($id_principal)) {
			$data_produk = $this->db->select('pr.*')
									->from('produk_retail pr')
									->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND kp.id_toko="'.$this->userdata->id_toko.'"')
									->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko="'.$this->userdata->id_toko.'"')
									->where('pr.id_toko', $this->userdata->id_toko)
									->where('s.id_supplier = ', $id_principal)
									->order_by('pr.nama_produk', 'asc')
									->get()->result();
			$where_t = "s.id_supplier = '".$id_principal."'";
		} else {
			$data_produk = $this->db->select('*')
									->from('produk_retail')
									->where('id_toko', $this->userdata->id_toko)
									->order_by('nama_produk', 'asc')
									->get()->result();	
			$where_t = "kp.id_kategori_2 > 0";
		}
		$data_produk_jual = $this->db->select('p.*, kp.nama_kategori, SUM(rjd.jumlah) AS jumlah_retur, s.nama_supplier')
								->from("produk_retail p")
								->join("orders_detail od", "p.id_produk_2=od.id_produk AND od.id_toko='".$this->userdata->id_toko."'")
								->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'")
								->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
								->join("kategori_produk kp", "p.id_kategori=kp.id_kategori_2 AND kp.id_toko='".$this->userdata->id_toko."'")
								->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
								->where("p.id_toko", $this->userdata->id_toko)
								->where("DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),'-',SUBSTRING(o.tgl_order,4,2),'-',SUBSTRING(o.tgl_order,1,2))) BETWEEN '".$start_date."' AND '".$end_date."'")
								->where($where_t)
								->order_by("kp.nama_kategori", "asc")
								->order_by("od.jumlah", "desc")
								->order_by("p.nama_produk", "asc")
								->group_by("p.id_produk_2")
								->get()->result();
		$exstart = explode("-", $start_date);
		$zstart_date = $exstart[2].'-'.$exstart[1].'-'.$exstart[0];
		$exend = explode("-", $end_date);
		$zend_date = $exend[2].'-'.$exend[1].'-'.$exend[0];
		$data = array(
			'active_principal_timeseries' => 'active',
			// 'data_login' => $this->userdata,
			'print' => $print,
			'id_principal' => $id_principal,
			'id_produk' => $id_produk,
			'array_month' => $this->array_month,
			'triwulan' => $triwulan,
			'tahun' => $tahun,
			'month_start' => $month_start,
			'month_end' => $month_end,
			'zstart_date' => $zstart_date,
			'zend_date' => $zend_date,
			'data_principal' => $data_principal,
			'data_produk' => $data_produk,
			'data_produk_jual' => $data_produk_jual,
			'that' => $this
		);
		if ($print == "true") {
			$this->load->view('admin/principal/principal_timeseries', $data, FALSE);
		} else {
			$this->view('principal/principal_timeseries', $data);
		}
	}

	public function get_detail($id_produk, $bulan, $tahun)
	{
		$data_produk_jual = $this->db->select('SUM(od.jumlah+od.jumlah_bonus) AS terjual, SUM(od.subtotal) AS total, SUM(rjd.jumlah) AS jumlah_retur')
								->from("produk_retail p")
								->join("orders_detail od", "p.id_produk_2=od.id_produk AND od.id_toko='".$this->userdata->id_toko."'")
								->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'")
								->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
								->where("p.id_toko", $this->userdata->id_toko)
								->where("p.id_produk_2", $id_produk)
								->where("SUBSTRING(o.tgl_order,7,4)=", $tahun)
								->where("SUBSTRING(o.tgl_order,4,2)=", sprintf("%02d", $bulan))
								->order_by("od.jumlah", "desc")
								->order_by("p.nama_produk", "asc")
								->group_by("p.id_produk_2")
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

	public function add_user()
	{
		$res_kategori = $this->db->select('SUBSTRING_INDEX(kp.nama_kategori,"-",1) AS nama_principal')
								 ->from('kategori_produk kp')
								 ->where('kp.id_toko', $this->userdata->id_toko)
								 ->group_by('SUBSTRING_INDEX(kp.nama_kategori,"-",1)')
								 ->order_by('kp.nama_kategori')
								 ->get()->result();
		foreach ($res_kategori as $key) {
			$identity = str_replace(array('cv.', 'pt.', ' '), '', strtolower($key->nama_principal));
			$identity = $identity.'@jsm.id';
			$identity = preg_replace("/\([^)]+\)/", "", $identity);
			echo $key->nama_principal;
			echo "<br>";
			echo $identity;
			echo "<hr>";
			// database //
			$row_users = $this->db->where('id_toko', $this->userdata->id_toko)->where('username', $identity)->get('users')->row();
			if ($row_users) {
				$data_update = array(
					'username' => $identity,
					'email' => $identity
				);
				$this->db->where('id_toko', $this->userdata->id_toko);
				$this->db->where('id_users', $row_users->id_users);
				$this->db->update('users', $data_update);
			} else {
				$row_last_users = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_users', 'desc')->get('users')->row();
				$id_users = 1;
				if ($row_last_users) {
					$id_users = $row_last_users->id_users+1;
				}
				$additional_data = array(
					'id_users' => $id_users,
					'id_toko' => $this->userdata->id_toko,
					'first_name' => $key->nama_principal,
					'company' => 'PRINCIPAL',
					'level' => 6
				);
				$id = $this->ion_auth->register($identity, "12345678", $identity, $additional_data);
			}
		}
	}

}

/* End of file Principal.php */
/* Location: ./application/controllers/Principal.php */