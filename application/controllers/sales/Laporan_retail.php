<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_retail extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		$this->models('Produk_retail_model, Penjualan_retail_model, Orders_detail_retail_model, Pembelian_retail_model, Piutang_retail_model, Hutang_retail_model, Pegawai_retail_model, Akun_retail_model, Jurnal_retail_model, Toko_retail_model, Mutasi_stok_model');
	}

	public function index()
	{
		redirect(site_url());
	}

	public function stok_produk()
	{
		$this->db->select('pr.*, sat.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		$this->db->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND pr.id_toko=p.id_toko', 'left');
		$this->db->join('satuan_produk sat', 'pr.satuan=sat.id_satuan AND sat.id_users=u.id_users AND sat.id_toko=pr.id_toko', 'left');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->userdata->id_toko, null, 'pr.id_produk_2');
		$this->db->where('pr.id_toko', $this->userdata->id_toko);
		// $this->db->where('u.id_cabang', $this->userdata->id_cabang);
		$this->db->group_by('pr.id_produk_2');
		$res = $this->db->get()->result();
		$data = array(
			'active_lap_stok_produk' => 'active',
			'contents' => $res,
		);
		$this->view('laporan/stok_produk', $data);
	}

	public function cetak_stok_produk()
	{
		$data = array();
		$data['print'] = 1;
		$data['toko'] = $this->db->where('id', $this->userdata->id_toko)->get('toko')->row();
		$this->db->select('pr.*, sp.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		$this->db->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND pr.id_toko=p.id_toko', 'left');
		// ->join('stok_produk stok', 'pr.id_produk_2=stok.id_produk AND stok.id_pembelian=p.id_pembelian AND stok.id_toko=pr.id_toko', 'left')
		$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko', 'left');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->userdata->id_toko, null, 'pr.id_produk_2');
		$this->db->where('pr.id_toko', $this->userdata->id_toko);
		// ->where('u.id_cabang', $this->userdata->id_cabang)
		$this->db->group_by('pr.id_produk_2');
		$data['contents'] = $this->db->get()->result();
		$this->load->view('admin/laporan/cetak_stok_produk', $data, FALSE);
	}

	public function stok_mati()
	{
		$this->db->select('pr.*, sat.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		$this->db->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND pr.id_toko=p.id_toko', 'left');
		$this->db->join('satuan_produk sat', 'pr.satuan=sat.id_satuan AND sat.id_users=u.id_users AND sat.id_toko=pr.id_toko', 'left');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->userdata->id_toko, null, 'pr.id_produk_2');
		$this->db->where('pr.id_toko', $this->userdata->id_toko);
		$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		$this->db->having('stok < 1 OR stok IS NULL');
		$this->db->group_by('pr.id_produk_2');
		$content = $this->db->get()->result();

		/*'contents' => $this->db->select('pr.*, sp.satuan AS satuan_produk, SUM(stok.stok) AS stok')
								->from('(SELECT pr.*, u.id_cabang FROM produk_retail pr JOIN users u ON pr.id_users=u.id_users AND pr.id_toko=u.id_toko WHERE u.id_cabang="'.$this->userdata->id_cabang.'" GROUP BY pr.id_produk_2) AS pr')
								->join('(SELECT sp.* FROM satuan_produk sp JOIN users u ON sp.id_users=u.id_users AND sp.id_toko=u.id_toko WHERE u.id_cabang="'.$this->userdata->id_cabang.'" GROUP BY sp.id_satuan) AS sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko')
								->join('(SELECT p.* FROM pembelian p JOIN users u ON p.id_users=u.id_users AND p.id_toko=u.id_toko WHERE u.id_cabang="'.$this->userdata->id_cabang.'" GROUP BY p.id_pembelian) AS p', 'pr.id_produk_2=p.id_produk AND pr.id_toko=p.id_toko', 'left')
								->join('stok_produk stok', 'pr.id_produk_2=stok.id_produk AND stok.id_pembelian=p.id_pembelian AND stok.id_toko=pr.id_toko', 'left')
								->where('pr.id_toko', $this->userdata->id_toko)
								->where('pr.id_cabang', $this->userdata->id_cabang)
								->having('stok < 1 OR stok IS NULL')
								->group_by('stok.id_produk')
								->get()->result(),*/

        $data = [
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_stok_mati' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'contents' => $content,
		];
        $this->view('laporan/stok_mati', $data);
	}

	public function penjualan()
	{
		header("Cache-Control: no cache");
		session_cache_limiter("private_no_expire");
		$per_laporan = '';
		$awal_periode = date('d-m-Y');
		$akhir_periode = date('d-m-Y');
		if(!empty($this->input->post('per_laporan'))){
			$per_laporan = $this->input->post('per_laporan');
			$this->session->set_userdata(array('per_laporan' => $per_laporan));
		}
		if(!empty($this->session->userdata('per_laporan'))){
			$per_laporan = $this->session->userdata('per_laporan');
		}
		if(!empty($this->input->post('awal_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$this->session->set_userdata(array('awal_periode' => $awal_periode));
		}
		if(!empty($this->session->userdata('awal_periode'))){
			$awal_periode = $this->session->userdata('awal_periode');
		}
		if(!empty($this->input->post('akhir_periode'))){
			$akhir_periode = $this->input->post('akhir_periode');
			$this->session->set_userdata(array('akhir_periode' => $akhir_periode));
		}
		if(!empty($this->session->userdata('akhir_periode'))){
			$akhir_periode = $this->session->userdata('akhir_periode');
		}

		
		if($per_laporan == 'hari'){
			$akhir_periode = $awal_periode;
		}

		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_lap_penjualan' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
		);

		$exawal_per = explode("-", $awal_periode);
		$h_awal_per = $exawal_per[0];
		$b_awal_per = $exawal_per[1];
		$t_awal_per = $exawal_per[2];
		$s_awal_periode = $t_awal_per."-".$b_awal_per."-".$h_awal_per;
		$exakhir_per = explode("-", $akhir_periode);
		$h_akhir_per = $exakhir_per[0];
		$b_akhir_per = $exakhir_per[1];
		$t_akhir_per = $exakhir_per[2];
		$s_akhir_periode = $t_akhir_per."-".$b_akhir_per."-".$h_akhir_per;

		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['per_laporan'] = $per_laporan;
		$data['kasir'] = "";
		$data['data_bulan'] = $this->db->get('bulan')->result();
		
		// if($this->userdata->level=="1"){
			$data['data_kasir'] = $this->db->select('u.*')
											->from('users u')
											->where('u.id_toko', $this->userdata->id_toko)
											// ->where('u.id_cabang', $this->userdata->id_cabang)
											->where('u.level', '2')
											->get()->result();
			if(!empty($this->input->post('kasir'))){
				$data['kasir'] = $this->input->post('kasir', true);
				$data['pembayaran'] = $this->input->post('pembayaran', true);
				$data['bank'] = $this->input->post('bank', true);
				$data['no_faktur'] = $this->input->post('no_faktur', true);
				$data['contents'] = $this->Penjualan_retail_model->get_by_between_date_and_user($this->userdata->id_toko, $this->input->post('kasir', true), $s_awal_periode, $s_akhir_periode, $this->input->post('pembayaran', true));
			} else {
				$data['pembayaran'] = $this->input->post('pembayaran', true);
				if($data['pembayaran']!=3){

					$data['bank'] = null;
				}else{

					$data['bank'] = $this->input->post('bank', true);
				}
				$data['no_faktur'] = $this->input->post('no_faktur', true);
				$data['contents'] = $this->Penjualan_retail_model->get_by_between_date($this->userdata->id_toko, $s_awal_periode, $s_akhir_periode, $data['pembayaran'],$data['bank'],$data['no_faktur']);
				
			}
			
			$data['data_bank'] = $this->db->get('pil_bank')->result();
// 			var_dump($data);
	        $this->view('laporan/penjualan_admin', $data);
		// } else{
		// 	$data['contents'] = $this->Penjualan_retail_model->get_by_between_date_and_user($this->userdata->id_toko, $this->userdata->id_users, $s_awal_periode, $s_akhir_periode);
	 //        $this->view('laporan/penjualan_kasir', $data);
		// }
	}

	public function penjualan_karyawan() {
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_piutang' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
		);
		$data['data_laporan_pen'] = $this->Pegawai_retail_model->get_lap_pen($this->userdata->id_toko);
		$this->view('laporan/penjualan_karyawan', $data);
	}

	public function detail_faktur($no_faktur)
	{
		$this->load->model('M_opsi');
		$row = $this->Penjualan_retail_model->get_by_no_faktur($no_faktur);
		
		if($row){
			$pembeli = "";
			$diskon_member = '';
			$row_member = $this->db->select('m.*')
								   ->from('member m')
								   ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
								   ->where('m.id_member', $row->pembeli)
								   ->group_by('m.id_member')
								   ->get()->row();
			if ($row_member) {
				$diskon_member = $row_member->diskon;
				$pembeli = "<span class='badge badge-warning'>Member</span> > ".$row_member->nama.", ".$row_member->alamat.", ".$row_member->telp;
			} else {
				$pembeli = $row->bukan_member." <br> <span class='badge badge-danger'>Bukan member</span> ";
			}
	        $mekanik = $this->db->select('detail_mekanik.*,users.first_name')
	                            ->from('detail_mekanik')
	                            ->join('users','users.id_users = detail_mekanik.id_mekanik and users.id_toko=detail_mekanik.id_toko')
	                            ->where('detail_mekanik.id_orders', $row->id_orders_2)
	                            ->where('detail_mekanik.id_toko', $this->userdata->id_toko)
	                            ->group_by('first_name')
	                            ->get()->result();
	        $data_mekanik = "";
	        if(count($mekanik)>0){
	            foreach ($mekanik as $m) {
	            	$mekanik =  $m->first_name;
	            	if($m->level == 1){
	            		$mekanik .= '(K)';
	            	}
	                $data_mekanik .= $mekanik.',';
	            }
	        }
	        $harga_member = '';
            if (!empty($row->pembeli)) {
                /* jika pengaturan opsi menggunakan harga member */
                $opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
                if($opsi_diskon->opsi == 0){
                    $harga_member = 'Ada';
                }
            }
			$opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko)->opsi;

			$this->db->select('od.*, pr.nama_produk, pr.mingros, pr.harga_1, pr.harga_2, pr.harga_3, pr.harga_beli, pr.diskon AS diskon_produk, o.diskon_member, rjd.jumlah AS jumlah_retur, rjd.subtotal AS total_retur');
			$this->db->from('orders_detail od');
			// ->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko')
			$this->db->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko=od.id_toko');
			$this->db->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_toko=od.id_toko');
			// $this->db->join('pembelian b', 'pr.id_produk_2=b.id_produk AND b.id_toko=pr.id_toko');
			$this->db->join('(SELECT * FROM retur_jual_detail WHERE id_retur="'.$row->id_retur.'") rjd', 'od.id_produk=rjd.id_produk AND od.id_toko=rjd.id_toko', 'left');
			// ->join('(SELECT * FROM retur_jual_detail rjd WHERE id_orders=rjd.id_orders_detail AND id_toko=rjd.id_toko) AS rjd', 'rjd.id_toko > 0')
			$this->db->where('od.id_toko', $this->userdata->id_toko);
			// 		->where('u.id_cabang', $this->userdata->id_cabang)
			$this->db->where('od.id_orders_2',$row->id_orders_2);
			$this->db->group_by('pr.id_produk_2');
			$det = $this->db->get()->result();

			$data = [
				'active_lap_penjualan' => 'active',
				'data_login' => $this->userdata,
				'pembeli' => $pembeli,
				'diskon_member' => $diskon_member,
				'opsi_diskon' => $opsi_diskon,
				'order' => $row,
				'mekanik' => $data_mekanik,
				'harga_member' => $harga_member,
				'detail_order' => $det,
				'cetak' => site_url('admin/penjualan_retail/cetak_nota_penjualan/'.$no_faktur.''),
			];
			$this->view('laporan/detail_faktur_v2', $data);
		} else {
			redirect('admin/laporan_retail/penjualan','refresh');
		}
	}

	public function cetak_rekap_penjualan()
	{
		$row_toko = $this->db->where('id', $this->userdata->id_toko)->get('toko')->row();
		$bulan = $this->input->post('bulan', TRUE);
		$tahun = $this->input->post('tahun', TRUE);
		$jenis = $this->input->post('jenis', TRUE);
		$submit = $this->input->post("submit", true);
		if ($submit=="excel") {
			redirect("admin/produk_retail/excel_rekap_bulan/".$bulan."/".$tahun."/".$jenis);
		} else {
			$row_bulan = $this->db->where('id', $bulan)->get('bulan')->row();
			$data = [
				'toko' => $row_toko,
				'bulan' => $row_bulan->bulan,
				'tahun' => $tahun,
				'jenis' => $jenis,
				'data_order' => $this->db->select('o.*, u.first_name')
											->from('orders o')
											->join('users u', 'o.id_users=u.id_users AND u.id_toko=o.id_toko')
											->where('o.id_toko', $this->userdata->id_toko)
											// id cabang kosong ->where('o.id_cabang', $this->userdata->id_cabang)
											->where('SUBSTRING(o.tgl_order,7,4)='.$tahun)
											->where('SUBSTRING(o.tgl_order,4,2)='.$bulan)
											->order_by('o.id_orders_2', 'asc')
											->group_by('o.id_orders_2')
											->get()->result(),
			];
			$this->load->view('admin/laporan/cetak_rekap', $data);
		}
	}

	public function kasir()
	{
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_kasir' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'data_order_per_kasir' => $this->db->select('COUNT(o.id_orders_2) AS jml_order, u.first_name, u.last_name')
											->from('orders o')
											->join('users u', 'o.id_users=u.id_users AND u.id_toko=o.id_toko')
											->where('o.id_toko', $this->userdata->id_toko)
											->where('u.id_cabang', $this->userdata->id_cabang)
											->group_by('o.id_users')
											->get()->result(),
			'data_pegawai' => $this->Pegawai_retail_model->get_by_id_toko($this->userdata->id_toko),
			'data_group_by_users' => $this->Penjualan_retail_model->get_group_by_id_users($this->userdata->id_toko),
		);
        $this->view('laporan/kasir', $data);
	}

	public function pembelian()
	{
		if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
		} else {
			$awal_periode = date('Y-m-01');
			$akhir_periode = date('Y-m-t');
		}
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_pembelian' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
		$data['contents'] = $this->Pembelian_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
        $this->view('laporan/pembelian', $data);
	}

	public function buku_besar_1()
	{
		if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
		} else {
			$awal_periode = date('Y-m-01');
			$akhir_periode = date('Y-m-t');
		}
		$where_akun = 'a.id > 0';
		if ($this->userdata->level!="5") {
			$where_akun = 'a.kode!="2.03"';
		} else {
			$where_akun = 'a.kode!="2.04"';
		}
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_bukubesar_1' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'level' => $this->userdata->level,
			'awal_periode' => $awal_periode,
			'akhir_periode' => $akhir_periode,
			'data_akun' => $this->db->select('a.id, a.kode, a.akun')
									->from('akun a')
									->join('jurnal j', 'a.id=j.id_akun AND j.id_toko=a.id_toko')
									->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
									->where('j.id_toko', $this->userdata->id_toko)
									->where('u.id_cabang', $this->userdata->id_cabang)
									->where($where_akun)
									->order_by('a.kode')
									->group_by('j.id_akun')
									->get(),
			'data_saldo_awal' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
										  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
										  //->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
										  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) < '".$awal_periode."' ")
										  ->where('j.id_toko', $this->userdata->id_toko)
										  ->where('j.id_cabang', $this->userdata->id_cabang)
										  ->group_by("j.id_akun")
										  ->order_by('j.kode')
										  ->get(),
			'data_jurnal' => $this->Jurnal_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode),
		);
        $this->view('laporan/buku_besar_1', $data);
	}

	public function cetak_buku_besar_1()
	{
		if($this->userdata){
			if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
				$awal_periode = $this->input->post('awal_periode');
				$akhir_periode = $this->input->post('akhir_periode');
			} else {
				$awal_periode = date('Y-m-01');
				$akhir_periode = date('Y-m-t');
			}
		
			$where_akun = 'a.id > 0';
			if ($this->userdata->level!="5") {
				$where_akun = 'a.kode!="2.03"';
			} else {
				$where_akun = 'a.kode!="2.04"';
			}

			$data = array(
				'level' => $this->userdata->level,
				'awal_periode' => $awal_periode,
				'akhir_periode' => $akhir_periode,
            	'toko' => $this->Toko_retail_model->get_by_id($this->userdata->id_toko),
				'data_akun' => $this->db->select('a.id, a.kode, a.akun')
										->from('akun a')
										->join('jurnal j', 'a.id=j.id_akun AND j.id_toko=a.id_toko')
										->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
										->where('j.id_toko', $this->userdata->id_toko)
										->where('u.id_cabang', $this->userdata->id_cabang)
										->where($where_akun)
										->group_by('j.id_akun')
										->order_by('a.kode')
										->get(),
				'data_saldo_awal' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
    										  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
											 // ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
											  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) < '".$awal_periode."' ")
											  ->where('j.id_toko', $this->userdata->id_toko)
											  ->where('j.id_cabang', $this->userdata->id_cabang)
											  ->group_by("j.id_akun")
											  ->order_by('j.kode')
											  ->get(),
				'data_jurnal' => $this->Jurnal_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode),
			);
			$this->load->view('admin/laporan/cetak_buku_besar_1', $data);
		} else {
			$this->load->view('/');
		}
	}

	public function buku_besar_2()
	{
		if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
		} else {
			$awal_periode = date('Y-m-01');
			$akhir_periode = date('Y-m-t');
		}
		$where_akun = 'a.id > 0';
		if ($this->userdata->level!="5") {
			$where_akun = 'a.kode!="2.03"';
		} else {
			$where_akun = 'a.kode!="2.04"';
		}
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_bukubesar_2' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'level' => $this->userdata->level,
			'awal_periode' => $awal_periode,
			'akhir_periode' => $akhir_periode,
			'data_akun' => $this->db->select('a.id, a.kode, a.akun')
									->from('akun a')
									->join('jurnal j', 'a.id=j.id_akun AND j.id_toko=a.id_toko')
									->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
									->where('j.id_toko', $this->userdata->id_toko)
									->where('u.id_cabang', $this->userdata->id_cabang)
									->where($where_akun)
									->group_by('j.id_akun')
									->order_by('a.kode')
									->get(),
			'akun_saldo_awal' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo, a.kode")
										  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
										  ->join("akun a", "j.id_akun=a.id")
										  //->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
										  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) < '".$awal_periode."' ")
										  ->where('j.id_toko', $this->userdata->id_toko)
										  ->where('j.id_cabang', $this->userdata->id_cabang)
										  ->group_by("j.id_akun")
										  ->order_by('j.kode')
										  ->get()->result(),
			'data_saldo' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
								      ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
								// 	  ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
									  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) BETWEEN '".$awal_periode."' AND '".$akhir_periode."' ")
									  ->where('j.id_toko', $this->userdata->id_toko)
									  ->where('j.id_cabang', $this->userdata->id_cabang)
									  ->group_by("j.id_akun")
									  ->get(),
			'data_jurnal' => $this->Jurnal_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode),
		);
        $this->view('laporan/buku_besar_2', $data);
	}

	public function cetak_buku_besar_2()
	{
		if($this->userdata){
			if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
				$awal_periode = $this->input->post('awal_periode');
				$akhir_periode = $this->input->post('akhir_periode');
			} else {
				$awal_periode = date('Y-m-01');
				$akhir_periode = date('Y-m-t');
			}
		
			$where_akun = 'a.id > 0';
			if ($this->userdata->level!="5") {
				$where_akun = 'a.kode!="2.03"';
			} else {
				$where_akun = 'a.kode!="2.04"';
			}

			$data = array(
				'level' => $this->userdata->level,
				'awal_periode' => $awal_periode,
				'akhir_periode' => $akhir_periode,
            	'toko' => $this->Toko_retail_model->get_by_id($this->userdata->id_toko),
				'data_akun' => $this->db->select('a.id, a.kode, a.akun')
										->from('akun a')
										->join('jurnal j', 'a.id=j.id_akun AND j.id_toko=a.id_toko')
									    ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
										->where('j.id_toko', $this->userdata->id_toko)
										->where('u.id_cabang', $this->userdata->id_cabang)
										->where($where_akun)
										->group_by('j.id_akun')
										->order_by('a.kode')
										->get(),
				'akun_saldo_awal' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo, a.kode")
    										  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
											  ->join("akun a", "j.id_akun=a.id")
										      //->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
											  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) < '".$awal_periode."' ")
											  ->where('j.id_toko', $this->userdata->id_toko)
											  ->where('j.id_cabang', $this->userdata->id_cabang)
											  ->group_by("j.id_akun")
											  ->order_by('j.kode')
											  ->get()->result(),
				'data_saldo' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
										  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
										  //->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
										  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) BETWEEN '".$awal_periode."' AND '".$akhir_periode."' ")
										  ->where('j.id_toko', $this->userdata->id_toko)
										  ->where('j.id_cabang', $this->userdata->id_cabang)
										  ->group_by('j.id_akun')
										  ->get(),
				'data_jurnal' => $this->Jurnal_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode),
			);
			$this->load->view('admin/laporan/cetak_buku_besar_2', $data);
		} else {
			$this->load->view('/');
		}
	}

	public function neraca()
	{
		$where_akun = 'a.id > 0';
		if ($this->userdata->level!="5") {
			// $where_akun = 'a.kode!="2.03"';
		} else {
			$where_akun = 'a.kode!="2.04"';
		}
		if (!empty($this->input->post('per', true))) {
			$per = $this->input->post('per', true);
		} else {
			$per = date('d-m-Y');
		}
		$exper = explode("-", $per);
		$hari = $exper[0];
		$bulan = $exper[1];
		$tahun = $exper[2];
		$s_per_01 = $tahun."-"."01"."-01";
		$s_per = $tahun."-".$bulan."-".$hari;
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_neraca' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'level' => $this->userdata->level,
			'per' => $per,
			'data_saldo' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
									  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
									  ->where('j.id_toko', $this->userdata->id_toko)
									  ->where('j.id_cabang', $this->userdata->id_cabang)
									  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) BETWEEN '".$s_per_01."' AND '".$s_per."' ")
									  ->group_by("j.id_akun")
									  ->get(),
			'data_activa' => $this->db->where($where_akun)->where("SUBSTRING(a.kode,1,1)", "1")->order_by('a.kode', 'asc')->get("akun a"),
			'data_pasiva' => $this->db->where($where_akun)->where("SUBSTRING(a.kode,1,1)", "2")->where("kode !=", "2.05")->order_by('a.kode', 'asc')->get("akun a"),
			'data_pendapatan' => $this->db->where($where_akun)->where("SUBSTRING(a.kode,1,1)", "3")->order_by('a.kode', 'asc')->get("akun a"),
			'data_biaya' => $this->db->where($where_akun)->where("SUBSTRING(a.kode,1,1)", "4")->order_by('a.kode', 'asc')->get("akun a"),
		);
        $this->view('laporan/neraca', $data);
	}

	public function labarugi()
	{
		$where_akun = 'a.id > 0';
		if ($this->userdata->level!="5") {
			$where_akun = 'a.kode!="2.03"';
		} else {
			$where_akun = 'a.kode!="2.04"';
		}
		if(!empty($this->input->post('awal_periode', true)) && !empty($this->input->post('akhir_periode', true))){
			$awal_periode = $this->input->post('awal_periode', true);
			$akhir_periode = $this->input->post('akhir_periode', true);
		} else {
			$awal_periode = date('Y-m-01');
			$akhir_periode = date('Y-m-t');
		}
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_labarugi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'contents' => $this->Pembelian_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode),
			'awal_periode' => $awal_periode,
			'akhir_periode' => $akhir_periode,
			'data_saldo_awal' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
    									  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
										  ->where('j.id_toko', $this->userdata->id_toko)
										  ->where('j.id_cabang', $this->userdata->id_cabang)
										  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) < '".$awal_periode."' ")
										  ->group_by("j.id_akun")
										  ->order_by('j.kode')
										  ->get(),
			'data_saldo' => $this->db->select("j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
									  ->from("(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY j.id) AS j")
									  ->where('j.id_toko', $this->userdata->id_toko)
									  ->where('j.id_cabang', $this->userdata->id_cabang)
									  ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) BETWEEN '".$awal_periode."' AND '".$akhir_periode."' ")
									  ->group_by("j.id_akun")
									  ->get(),
			'data_pendapatan' => $this->db->where($where_akun)->where("SUBSTRING(a.kode,1,1)", "3")->order_by('a.kode', 'asc')->get("akun a"),
			'data_biaya' => $this->db->where($where_akun)->where("SUBSTRING(a.kode,1,1)", "4")->order_by('a.kode', 'asc')->get("akun a"),
		);
        $this->view('laporan/laba_rugi', $data);
	}

	public function piutang()
	{
		if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
		} else {
			$awal_periode = date('Y-m-01');
			$akhir_periode = date('Y-m-t');
		}

        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );

		$data['contents'] = $this->Piutang_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
        $this->view('laporan/piutang', $data);
	}

	public function hutang()
	{
		if(!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))){
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
		} else {
			$awal_periode = date('Y-m-01');
			$akhir_periode = date('Y-m-t');
		}

        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_hutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );

		$data['contents'] = $this->Hutang_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;

        $this->view('laporan/hutang', $data);
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
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_salesman' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
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
									->where('level', '4')
									->order_by('first_name', 'asc')
									->order_by('id_users', 'asc')
									->order_by('id', 'asc')
									->get()->result(),
		);
        $this->view('laporan/sales', $data);
	}

	public function detail_sales($id_user, $tgl)
	{
		$active = array(
			'active_lap_salesman' => 'active',
		);
		$nama_sales = "";
		if ($id_user=="null") {
			$nama_sales = "(Tanpa Sales)";
		} else {
			$row_sales = $this->db->select('*')
								  ->from('users')
								  ->where('id_toko', $this->userdata->id_toko)
								  ->where('id_users', $id_user)
								  ->where('level', '4')
								  ->get()->row();
			if ($row_sales) {
				$nama_sales = $row_sales->first_name.' '.$row_sales->last_name;
			}
		}
		$array_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		$where = '';
		$exddtgl = explode(":", $tgl);
		if (count($exddtgl) > 1) {
			$t1 = $exddtgl[0];
			$t2 = !empty($exddtgl[1]) ? $exddtgl[1] : date('d-m-Y');
			$ext1 = explode("-", $t1);
			$h_t1 = $ext1[0];
			$b_t1 = !empty($ext1[1]) ? sprintf('%02d', $ext1[1]) : date('m');
			$t_t1 = !empty($ext1[2]) ? $ext1[2] : date('Y');
			$ext2 = explode("-", $t2);
			$h_t2 = $ext2[0];
			$b_t2 = !empty($ext2[1]) ? sprintf('%02d', $ext2[1]) : date('m');
			$t_t2 = !empty($ext2[2]) ? $ext2[2] : date('Y');
			$t_tgl = 'Tanggal : '.$t1.' - '.$t2;
			$where = 'AND DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$t_t1.'-'.$b_t1.'-'.$h_t1.'" AND "'.$t_t2.'-'.$b_t2.'-'.$h_t2.'"';
		} else {
			$extgl = explode("-", $tgl);
			if (count($extgl)==3) {
				$h = $extgl[0];
				$b = !empty($extgl[1]) ? sprintf('%02d', $extgl[1]) : date('m');
				$t = !empty($extgl[2]) ? $extgl[2] : date('Y');
				$t_tgl = 'Tanggal : '.$h.' '.$array_bulan[$b*1].' '.$t;
				$where = 'AND o.tgl_order="'.$tgl.'"';
			} else if (count($extgl)==2) {
				$b = sprintf('%02d', $extgl[0]);
				$t = !empty($extgl[1]) ? $extgl[1] : date('Y');
				$t_tgl = 'Bulan : '.$array_bulan[$b*1].' '.$t;
				$where = 'AND DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$t.'-'.$b.'-01" AND "'.$t.'-'.$b.'-31"';
			} else if (count($extgl)==1) {
				$t = !empty($extgl[0]) ? $extgl[0] : date('Y');
				$t_tgl = 'Tahun : '.$t;
				$where = 'AND SUBSTRING(o.tgl_order,7,4)="'.$t.'"';
			}
		}
        if ($id_user=="null") {
            $where_cl = 'od.id_toko="'.$this->userdata->id_toko.'" '.$where.' AND m.id_sales="0" AND o.id_sales IS NULL AND o.pembeli="null" OR od.id_toko="'.$this->userdata->id_toko.'" '.$where.' AND m.id_sales=0 AND o.id_sales IS NULL AND o.pembeli=0';
            $where_cb = 'o.id_toko="'.$this->userdata->id_toko.'" '.$where.' AND o.id_sales="0" AND o.pembeli="null" OR o.id_toko="'.$this->userdata->id_toko.'" '.$where.' AND o.id_sales=0 ';
        } else {
            $where_cl = 'od.id_toko="'.$this->userdata->id_toko.'" '.$where.' AND m.id_sales="'.$id_user.'" AND o.pembeli>0 AND o.id_sales IS NULL';
            $where_cb = 'o.id_toko="'.$this->userdata->id_toko.'" '.$where.' AND o.id_sales="'.$id_user.'" AND o.pembeli>0 AND o.id_sales>0';
        }

		$this->db->select('od.*, m.nama, m.alamat, pr.nama_produk, SUM(rjd.jumlah) AS jumlah_retur');
		$this->db->from('(SELECT od.* FROM orders_detail od JOIN users u ON od.id_users=u.id_users AND od.id_toko=u.id_toko WHERE u.id_cabang="'.$this->userdata->id_cabang.'" GROUP BY od.id_orders) od');
		$this->db->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko');
		$this->db->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko="'.$this->userdata->id_toko.'"', 'left');
		$this->db->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_users=u.id_users AND o.id_toko="'.$this->userdata->id_toko.'"', 'left');
		$this->db->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_users=u.id_users AND rjd.id_toko=od.id_toko', 'left');
		$this->db->join('member m', 'o.pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko="'.$this->userdata->id_toko.'"', 'left');
		$this->db->where($where_cl);
		$this->db->where('u.id_cabang', $this->userdata->id_cabang);
									// ->group_by('od.id_orders_2')
		$this->db->group_by('od.id_orders');
		$this->db->order_by('od.id_orders_2', 'asc');
		$res_od_is_null = $this->db->get()->result();

		$this->db->select('od.*, m.nama, m.alamat, pr.nama_produk, SUM(rjd.jumlah) AS jumlah_retur');
		$this->db->from('orders_detail od');
		$this->db->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko');
		$this->db->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko="'.$this->userdata->id_toko.'"', 'left');
		$this->db->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_users=u.id_users AND o.id_toko="'.$this->userdata->id_toko.'"', 'left');
		$this->db->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_users=u.id_users AND rjd.id_toko=od.id_toko', 'left');
		$this->db->join('member m', 'o.pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko="'.$this->userdata->id_toko.'"', 'left');
		$this->db->where($where_cb);
		$this->db->where('u.id_cabang', $this->userdata->id_cabang);
									// ->group_by('od.id_orders_2')
		$this->db->order_by('od.id_orders_2', 'asc');
		$res_od_not_null = $this->db->get()->result();

		$res_od = array_merge($res_od_is_null, $res_od_not_null);
		sort($res_od);
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_lap_salesman' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
			'nama_sales' => $nama_sales,
			't_tgl' => $t_tgl,
			'data_od' => $res_od
		);
		$this->view('laporan/detail_sales', $data);
	}

	public $array_month = ["","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

	public function get_detail($id_produk, $id_member, $bulan, $tahun)
	{
		$this->db->select('SUM(od.jumlah+od.jumlah_bonus) AS terjual, SUM(od.subtotal) AS total, SUM(rjd.jumlah) AS jumlah_retur');
		$this->db->from("(SELECT pr.*, u.id_cabang FROM produk_retail pr JOIN users u ON pr.id_users=u.id_users AND pr.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY pr.id_produk_2') AS p");
		$this->db->join("(SELECT od.*, u.id_cabang FROM orders_detail od JOIN users u ON od.id_karyawan=u.id_users AND od.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY od.id_orders) AS od", "p.id_produk_2=od.id_produk AND od.id_toko=p.id_toko AND od.id_cabang=p.id_cabang");
		$this->db->join("(SELECT o.*, u.id_cabang FROM orders o JOIN users u ON o.id_users=u.id_users AND o.id_toko=u.id_toko WHERE u.id_cabang='".$this->userdata->id_cabang."' GROUP BY od.id_orders_2) AS o", "o.id_orders_2=od.id_orders_2 AND o.id_toko=od.id_toko AND o.id_cabang=od.id_cabang");
		$this->db->join('(SELECT rjd.* FROM retur_jual_detail rjd JOIN users u ON rjd.id_users=u.id_users AND rjd.id_toko=u.id_toko WHERE u.id_cabang="'.$this->userdata->id_cabang.'" GROUP BY rjd.id) AS rjd', 'od.id_orders=rjd.id_orders_detail AND od.id_toko=rjd.id_toko AND od.id_cabang=rjd.id_cabang', 'left');
		$this->db->where("p.id_toko", $this->userdata->id_toko);
		$this->db->where("p.id_cabang", $this->userdata->id_cabang);
		$this->db->where("p.id_produk_2", $id_produk);
		$this->db->where("o.pembeli", $id_member);
		$this->db->where("SUBSTRING(o.tgl_order,7,4)=", $tahun);
		$this->db->where("SUBSTRING(o.tgl_order,4,2)=", sprintf("%02d", $bulan));
		$this->db->order_by("od.jumlah", "desc");
		$this->db->order_by("p.nama_produk", "asc");
		$data_produk_jual = $this->db->get()->row();

		$data = array();
		$data["dibeli"] = 0;
		$data["nominal"] = 0;
		if ($data_produk_jual) {
			$data["dibeli"] = $data_produk_jual->terjual * 1;
			$data["nominal"] = $data_produk_jual->total * 1;
		}
		return (Object) $data;
	}

	public function produk()
	{
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
		if ($this->session->userdata('tahun') != null) {
			$tahun = $this->session->userdata('tahun');
		}
		if ($triwulan == "1") {
			$month_start = "01";
			$month_end = "03";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		} else if ($triwulan == "2") {
			$month_start = "04";
			$month_end = "06";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		} else if ($triwulan == "3") {
			$month_start = "07";
			$month_end = "09";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		} else if ($triwulan == "4") {
			$month_start = "10";
			$month_end = "12";
			$start_date = $tahun."-".$month_start."-01";
			$end_date = $tahun."-".$month_end."-31";
		}
		$data_sales = $this->db->select('u.*')
							   ->from('users u')
							   ->where('u.id_toko', $this->userdata->id_toko)
							   ->where('u.id_cabang', $this->userdata->id_cabang)
							   ->where('u.level', 4)
							   ->order_by('u.first_name', 'asc')
							   ->get()->result();
		if (!empty($id_sales)) {
			$data_member = $this->db->select('m.*')
								   ->from('member m')
								   ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
								   ->where('m.nama!=', '')
								   ->where('m.id_sales', $id_sales)
								   ->order_by('m.nama', 'asc')
								   ->get()->result();
		} else {
			$id_member = 0;
			$data_member = $this->db->select('m.*')
								   ->from('member m')
								   ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
								   ->where('m.nama!=', '')
								   ->order_by('m.nama', 'asc')
								   ->get()->result();
		}
		if (empty($id_principal)) {
			// $row_principal = $this->db->select('SUBSTRING_INDEX(nama_kategori,"-",1) AS nama_principal')->from('kategori_produk')->where('id_toko', $this->userdata->id_toko)->order_by('nama_kategori', 'asc')->get()->row();
			$row_principal = $this->db->select('s.*')
									  ->from('supplier s')
									  ->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko')
									  ->where('s.id_toko', $this->userdata->id_toko)
									  ->where('u.id_cabang', $this->userdata->id_cabang)
									  ->order_by('s.nama_supplier', 'asc')
									  ->get()->row();
			if ($row_principal) {
				$id_principal = $row_principal->nama_supplier;
			}
		}
		// $this->db->select('SUBSTRING_INDEX(kp.nama_kategori,"-",1) AS nama_principal, s.nama_supplier')
		$data_principal = $this->db->select('s.nama_supplier AS nama_principal, s.nama_supplier')
								   ->from('kategori_produk kp')
								   ->join('users u', 'kp.id_users=u.id_users AND kp.id_toko=u.id_toko')
								   ->join('supplier s', 'kp.id_supplier=s.id_supplier AND s.id_users=u.id_users AND kp.id_toko=s.id_toko')
								   ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_users=u.id_users AND pr.id_toko="'.$this->userdata->id_toko.'"')
								   ->where('kp.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
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
			$where_add .= ' AND s.nama_supplier="'.$id_principal.'"';
		}
		$data_produk_jual = $this->db->select('m.nama, m.alamat, m.telp, kp.nama_kategori, o.id_sales, o.pembeli, pr.id_produk_2, pr.nama_produk, m.id_member, s.nama_supplier')
									 ->from('member m')
								     ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
									 ->join('kategori_produk kp', 'kp.id_toko="'.$this->userdata->id_toko.'"')
									 ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
									 ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_toko="'.$this->userdata->id_toko.'"', 'left')
									 ->join('orders_detail od', 'pr.id_produk_2=od.id_produk AND od.id_toko="'.$this->userdata->id_toko.'"', 'left')
									 ->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'", 'left')
									 ->join('retur_jual_detail rjd', 'od.id_orders=rjd.id_orders_detail AND od.id_toko=rjd.id_toko', 'left')
									 ->where('m.id_toko', $this->userdata->id_toko)
									 ->where('u.id_cabang', $this->userdata->id_cabang)
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
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lap_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'data_login' => $this->userdata,
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
		if ($print == "true") {
			$this->load->view('admin/laporan/ts_produk', $data, FALSE);
		} else {
	        $this->view('laporan/ts_produk', $data);
		}
	}

	public function cetak_ts_produk()
	{
		$id_sales = $this->input->get('id_sales', true);
		$id_member = $this->input->get('id_member', true);
		$id_principal = $this->input->get('id_principal', true);
		$triwulan = $this->input->get('triwulan', true);
		$tahun = $this->input->get('tahun', true);
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
							   ->where('u.id_cabang', $this->userdata->id_cabang)
							   ->where('u.level', 4)
							   ->order_by('u.first_name', 'asc')
							   ->get()->result();
		if (!empty($id_sales)) {
			$data_member = $this->db->select('m.*')
								   ->from('member m')
								   ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
								   ->where('m.nama!=', '')
								   ->where('m.id_sales', $id_sales)
								   ->order_by('m.nama', 'asc')
								   ->get()->result();
		} else {
			$id_member = 0;
			$data_member = $this->db->select('m.*')
								   ->from('member m')
								   ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
								   ->where('m.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
								   ->where('m.nama!=', '')
								   ->order_by('m.nama', 'asc')
								   ->group_by('m.id_member')
								   ->get()->result();
		}
		if (empty($id_principal)) {
			/*$row_principal = $this->db->select('SUBSTRING_INDEX(nama_kategori,"-",1) AS nama_principal')->from('kategori_produk')->where('id_toko', $this->userdata->id_toko)->order_by('nama_kategori', 'asc')->get()->row();
			if ($row_principal) {
				$id_principal = $row_principal->nama_principal;
			}*/
			$row_principal = $this->db->select('s.*')
									  ->from('supplier s')
									  ->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko')
									  ->where('s.id_toko', $this->userdata->id_toko)
									  ->where('u.id_cabang', $this->userdata->id_cabang)
									  ->order_by('s.nama_supplier', 'asc')
									  ->get()->row();
			if ($row_principal) {
				$id_principal = $row_principal->nama_supplier;
			}
		}
		// $this->db->select('SUBSTRING_INDEX(kp.nama_kategori,"-",1) AS nama_principal')
		$data_principal = $this->db->select('s.nama_supplier AS nama_principal, s.nama_supplier')
								   ->from('kategori_produk kp')
								   ->join('users u', 'kp.id_users=u.id_users AND kp.id_toko=u.id_toko')
								   ->join('supplier s', 'kp.id_supplier=s.id_supplier AND s.id_users=u.id_users AND kp.id_toko=s.id_toko')
								   ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_users=u.id_users AND pr.id_toko="'.$this->userdata->id_toko.'"')
								   ->where('kp.id_toko', $this->userdata->id_toko)
								   ->where('u.id_cabang', $this->userdata->id_cabang)
								   // ->order_by('kp.nama_kategori', 'asc')
								   // ->group_by('SUBSTRING_INDEX(kp.nama_kategori,"-",1)')
								   ->order_by('s.nama_supplier', 'asc')
								   ->group_by('CONCAT(s.nama_supplier,s.alamat)')
								   ->get()->result();
		$where_add = 'pr.id_produk_2 > 0';
		if (!empty($id_sales)) {
			$where_add = 'm.id_sales="'.$id_sales.'"';
			if (!empty($id_member)) {
				$where_add .= ' AND m.id_member="'.$id_member.'"';
			}
		}
		if (!empty($id_principal)) {
			// $where_add .= ' AND REPLACE(LOWER(SUBSTRING_INDEX(kp.nama_kategori,"-",1))," ","")="'.$id_principal.'"';
			$where_add .= ' AND s.nama_supplier="'.$id_principal.'"';
		}
		$data_produk_jual = $this->db->select('m.nama, m.alamat, m.telp, kp.nama_kategori, o.id_sales, o.pembeli, pr.id_produk_2, pr.nama_produk, m.id_member, s.nama_supplier')
									 ->from('member m')
								     ->join('users u', 'kp.id_users=u.id_users AND kp.id_toko=u.id_toko')
									 ->join('kategori_produk kp', 'kp.id_toko="'.$this->userdata->id_toko.'"')
									 ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
									 ->join('produk_retail pr', 'kp.id_kategori_2=pr.id_kategori AND pr.id_toko="'.$this->userdata->id_toko.'"', 'left')
									 ->join('orders_detail od', 'pr.id_produk_2=od.id_produk AND od.id_toko="'.$this->userdata->id_toko.'"', 'left')
									 ->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'", 'left')
									 ->join('retur_jual_detail rjd', 'od.id_orders=rjd.id_orders_detail AND od.id_toko=rjd.id_toko', 'left')
									 ->where('m.id_toko', $this->userdata->id_toko)
									 ->where('u.id_cabang', $this->userdata->id_cabang)
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
			'data_login' => $this->userdata,
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
		$this->load->view('admin/laporan/ts_produk_cetak', $data, FALSE);
	}

}

/* End of file Laporan_retail.php */
/* Location: ./application/controllers/Laporan_retail.php */