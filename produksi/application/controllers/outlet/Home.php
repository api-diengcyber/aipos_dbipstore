<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
      $this->load->model('Kategori_produk_retail_model');
      $this->load->model('Member_retail_model');
      $this->load->model('Penjualan_retail_model');
      $this->load->model('Pembelian_retail_model');
      $this->load->model('Pegawai_retail_model');
      $this->load->model('Piutang_retail_model');
      $this->load->model('Faktur_retail_model');
      $this->load->model('Cabang_toko_model');
      $this->load->model('Login_model');
      $this->load->library('view');
      $this->Login_model->is_outlet();
      $this->userdata = $this->Login_model->get_data();
    }

	public function index()
	{
		$data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_home' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
		);
        $id_cabang = $this->userdata->id_toko;
        $where_join_produk_retail = 'pr.id_toko="'.$this->userdata->id_toko.'"';
        $where_join_orders = 'o.id_toko="'.$this->userdata->id_toko.'"';
        $where = "od.id_toko = '".$this->userdata->id_toko."'";
        $where_id_toko = "id_toko = ".$this->userdata->id_toko;
        $where_stok = 'sp.id_toko = '.$this->userdata->id_toko;
        $where_join_stock = $this->userdata->id_toko;
        // if ($data_login['is_pusat']=="1" && $data_login['id_toko_pusat']==$this->userdata->id_toko) {
        //   /* do your magic here */
        //   $where_id_toko = "id_toko > 0";
        //   $where = "orders_detail.id_orders > 0";
        //   $where_join_orders = "orders.id_toko=orders_detail.id_toko";
        //   $where_join_produk_retail = "produk_retail.id_toko=orders_detail.id_toko";
        //   $where_stok = 'sp.id_toko > 0';
        //   $where_join_stock = 'sp.id_toko';
        // }

        $data['kategori_produk'] = $this->Kategori_produk_retail_model->get_by_id_toko($this->userdata->id_toko);
        $data['jumlah_member'] = $this->Member_retail_model->total_rows();
        $data['orders'] = $this->Penjualan_retail_model->get_by_tgl($this->userdata->id_toko, date('d-m-Y'));
        $data['orders_hari_ini'] = $this->Penjualan_retail_model->get_by_tgl2($this->userdata->id_toko, date('d-m-Y'));
        $data['orders_per_bulan'] = $this->Penjualan_retail_model->get_by_bulan_tahun($this->userdata->id_toko, date('m'), date('Y'));
        $data['produk_terlaris'] = $this->db->where($where_id_toko)->order_by('dibeli', 'desc')->group_by('barcode')->get('produk_retail', 5)->result();
        
        $data['produk_terjual'] = $this->db->select('SUM(od.jumlah) AS jumlah')
                                        ->from('orders o')
                                        ->join('users u', 'o.id_users=u.id_users AND o.id_toko=u.id_toko')
                                        ->join('orders_detail od', 'o.id_orders_2=od.id_orders_2 AND od.id_karyawan=u.id_users AND o.id_toko=od.id_toko')
                                        ->where($where_join_orders)
                                        ->where('u.id_cabang', $this->userdata->id_cabang)
                                        ->get()->row();
        $data['produk_terlaris_hari_ini'] = $this->db->select('pr.*, SUM(od.jumlah) AS jumlah')
                                            ->from('orders_detail od')
                                            ->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko')
                                            ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_users=u.id_users AND '.$where_join_orders)
                                            ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND '.$where_join_produk_retail)
                                            ->where($where)
                                            ->where('u.id_cabang', $this->userdata->id_cabang)
                                            ->where('o.tgl_order', date('d-m-Y'))
                                            ->group_by('pr.id_produk')
                                            ->order_by('SUM(od.jumlah)', 'desc')
                                            ->limit(5)
                                            ->get()->result();
        $data['pembelian'] = $this->db->select('p.*')
                                      ->from('pembelian p')
                                      ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
                                      ->where('p.tgl_masuk', date('d-m-Y'))
                                      ->where("p.".$where_id_toko)
                                      ->where('u.id_cabang', $this->userdata->id_cabang)
                                      ->group_by('p.id_pembelian')
                                      ->get()->result();
        $data['total_stok'] = $this->db->select('SUM(sp.stok) AS jml_stok')
                                      ->from('stok_produk sp')
                                      ->join('(SELECT p.*, u.id_cabang FROM pembelian p JOIN users u ON p.id_users=u.id_users GROUP BY p.id_pembelian) AS p', 'sp.id_pembelian=p.id_pembelian AND sp.id_toko=p.id_toko')
                                      ->where('p.id_cabang', $this->userdata->id_cabang)
                                      ->where($where_stok)
                                      ->get()->row();
        $data['produk'] = $this->db->select('COUNT(pr.id_produk_2) AS jml')
                                   ->from('(SELECT pr.*, u.id_cabang FROM produk_retail pr JOIN users u ON pr.id_users=u.id_users AND pr.id_toko=u.id_toko GROUP BY pr.id_produk_2) AS pr')
                                   ->where('pr.id_toko', $this->userdata->id_toko)
                                   ->where('pr.id_cabang', $this->userdata->id_cabang)
                                   ->get()->row();
        $data['kasir'] = $this->db->where($where_id_toko)
                                    ->where('level', '2')
                                    ->where('id_toko', $this->userdata->id_toko)
                                    ->where('id_cabang', $this->userdata->id_cabang)
                                    ->get('users')->result();
        $data['laba_hari_ini'] = $this->db->select('SUM(o.laba) AS jml_laba')
                                        ->from('orders o')
                                        ->join('users u', 'o.id_users=u.id_users AND o.id_toko=u.id_toko')
                                        ->where("o.".$where_id_toko)
                                        ->where('o.tgl_order', date('d-m-Y'))
                                        ->where('u.id_cabang', $this->userdata->id_cabang)
                                        ->get()->row();
        $data['laba_bulan_ini'] = $this->db->select('SUM(o.laba) AS jml_laba')
                                        ->from('orders o')
                                        ->join('users u', 'o.id_users=u.id_users AND o.id_toko=u.id_toko')
                                        ->where("o.".$where_id_toko)
                                        ->where('SUBSTRING(o.tgl_order,4,7)', date('m-Y'))
                                        ->where('u.id_cabang', $this->userdata->id_cabang)
                                        ->get()->row();
        $data['laba_total'] = $this->db->select('SUM(o.laba) AS jml_laba')
                                        ->from('orders o')
                                        ->join('users u', 'o.id_users=u.id_users AND o.id_toko=u.id_toko')
                                        ->where("o.".$where_id_toko)
                                        ->where('u.id_cabang', $this->userdata->id_cabang)
                                        ->get()->row();
        $data['total_pembelian'] = $this->db->select('SUM(p.total_bayar) as total')
                                            ->from('pembelian p')
                                            ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
                                            ->where("p.".$where_id_toko)
                                            ->where("p.id_supplier != ", 0)
                                            ->where('u.id_cabang', $this->userdata->id_cabang)
                                            ->get()->row();
        $data['data_pegawai'] = $this->Pegawai_retail_model->get_by_id_toko($this->userdata->id_toko);
        $data['data_group_by_users'] = $this->Penjualan_retail_model->get_group_by_id_users($this->userdata->id_toko);
        $data['data_order_terakhir'] = $this->Penjualan_retail_model->get_last_data($this->userdata->id_toko, 10);
        $awal_periode = date('Y-m-01');
        $akhir_periode = date('Y-m-t');
        $data['contents'] = $this->Pembelian_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
        $data['awal_periode'] = $awal_periode;
        $data['akhir_periode'] = $akhir_periode;
        $data['data_saldo_awal'] = $this->db->select("j.id_toko, j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
                                          ->from("jurnal j")
                                          ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
                                          ->where('j.id_toko', $this->userdata->id_toko)
                                          ->where('u.id_cabang', $this->userdata->id_cabang)
                                          ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) < '".$awal_periode."' ")
                                          ->group_by("j.id_akun")
                                          ->order_by('j.kode')
                                          ->get();
        $data['data_saldo'] = $this->db->select("j.id_toko, j.id_akun, j.tgl, SUM(j.debet)-SUM(j.kredit) AS saldo")
                                          ->from("jurnal j")
                                          ->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
                                          ->where('j.id_toko', $this->userdata->id_toko)
                                          ->where('u.id_cabang', $this->userdata->id_cabang)
                                          ->where("DATE(CONCAT(SUBSTRING(j.tgl,7,4),'-',SUBSTRING(j.tgl,4,2),'-',SUBSTRING(j.tgl,1,2))) BETWEEN '".$awal_periode."' AND '".$akhir_periode."' ")
                                          ->group_by("j.id_akun")
                                          ->get();
        $data['data_pendapatan'] = $this->db->where("SUBSTRING(kode,1,1)", "3")->order_by('kode', 'asc')->get("akun");
        $data['data_biaya'] = $this->db->where("SUBSTRING(kode,1,1)", "4")->order_by('kode', 'asc')->get("akun");
        $data['modul'] = $this->db->where('id', $this->userdata->id_modul)->get('pil_modul')->row();

        $date = date('Y-m-d');
        $last_day_this_month = date('Y-m-d',strtotime($date));

        $data['produk_expired'] = $this->Pembelian_retail_model->get_by_tgl_expire($last_day_this_month,$this->userdata->id_toko,5,'tgl_expire');

        $data['arus_kas_pemasukkan'] = '';
        $data['arus_kas_pengeluaran'] = '';

        $tempo_pemb = 0;
        if($this->input->post('tempo_pemb')){
          $tempo_pemb = $this->input->post('tempo_pemb');
        }else{
          $tempo_pemb = 90;
        }
        $date = new DateTime();
        $date->modify('+'.$tempo_pemb.' day');
        $deadline1 = $date->format('Y-m-d');

        $tempo_penj = 0;
        if($this->input->post('tempo_penj')){
          $tempo_penj = $this->input->post('tempo_penj');
        }else{
          $tempo_penj = 90;
        }
        $date = new DateTime();
        $date->modify('+'.$tempo_penj.' day');
        $deadline2 = $date->format('Y-m-d');

        $data['tempo_pemb'] = $tempo_pemb;
        $data['tempo_penj'] = $tempo_penj;

        $data['tempo_pembelian']   = $this->Faktur_retail_model->get_all_by_id_toko($this->userdata->id_toko,$deadline1);
        $data['piutang_penjualan'] = $this->Piutang_retail_model->get_piutang_penjualan($deadline2);

        $data['id_toko_pusat'] = 0;
        $data['id_cabang'] = $id_cabang;
        $data['is_pusat'] = false;

        $data['total_piutang'] = $this->db->select('SUM(p.sisa) AS total')
                                          ->from('(SELECT p.*, u.id_cabang FROM piutang p JOIN users u ON p.id_users=u.id_users AND p.id_toko=u.id_toko GROUP BY p.id_piutang) AS p')
                                          ->where('p.id_toko', $this->userdata->id_toko)
                                          ->where('p.id_cabang', $this->userdata->id_cabang)
                                          ->get()->row();
        $data['total_hutang'] = $this->db->select('SUM(h.kurang) AS total')
                                        ->from('(SELECT h.*, u.id_cabang FROM hutang h JOIN users u ON h.id_users=u.id_users AND h.id_toko=u.id_toko GROUP BY h.id) AS h')
                                        ->where('h.id_toko', $this->userdata->id_toko)
                                        ->where('h.id_cabang', $this->userdata->id_cabang)
                                        ->get()->row();
		$this->view->render_outlet('home', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */