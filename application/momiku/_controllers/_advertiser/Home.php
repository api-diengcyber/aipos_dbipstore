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
        $this->Login_model->is_advertiser();
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
        $where_join_produk_retail = 'produk_retail.id_toko="'.$this->userdata->id_toko.'"';
        $where_join_orders = 'orders.id_toko="'.$this->userdata->id_toko.'"';
        $where = "orders_detail.id_toko = '".$this->userdata->id_toko."'";
        $where_id_toko = "id_toko = ".$this->userdata->id_toko;
        $where_stok = 'sp.id_toko = '.$this->userdata->id_toko;
        $where_join_stock = $this->userdata->id_toko;

        $data['kategori_produk'] = $this->Kategori_produk_retail_model->get_by_id_toko($this->userdata->id_toko);
        $data['jumlah_member'] = $this->Member_retail_model->total_rows();
        $data['orders'] = $this->Penjualan_retail_model->get_by_tgl($this->userdata->id_toko, date('d-m-Y'));
        $data['orders_hari_ini'] = $this->Penjualan_retail_model->get_by_tgl2($this->userdata->id_toko, date('d-m-Y'));
        $data['orders_per_bulan'] = $this->Penjualan_retail_model->get_by_bulan_tahun($this->userdata->id_toko, date('m'), date('Y'));
        $data['produk_terlaris'] = $this->db->where($where_id_toko)->order_by('dibeli', 'desc')->group_by('barcode')->get('produk_retail', 5)->result();
        
        $data['produk_terjual'] = $this->db->select('SUM(orders_detail.jumlah) AS jumlah')
                                        ->from('orders')
                                        ->join('orders_detail', 'orders.id_orders_2=orders_detail.id_orders_2 AND '.$where)
                                        ->where($where_join_orders)
                                        ->get()->row();
        $data['produk_terlaris_hari_ini'] = $this->db->select('produk_retail.*, SUM(orders_detail.jumlah) AS jumlah')
                                            ->from('orders_detail')
                                            ->join('orders', 'orders_detail.id_orders_2=orders.id_orders_2 AND '.$where_join_orders)
                                            ->join('produk_retail', 'orders_detail.id_produk=produk_retail.id_produk_2 AND '.$where_join_produk_retail)
                                            ->where($where)
                                            ->where('orders.tgl_order', date('d-m-Y'))
                                            ->group_by('produk_retail.id_produk')
                                            ->order_by('SUM(orders_detail.jumlah)', 'desc')
                                            ->limit(5)
                                            ->get()->result();
                                           
        $data['pembelian'] = $this->db->where('tgl_masuk', date('d-m-Y'))->where($where_id_toko)->get('pembelian')->result();
        $data['total_stok'] = $this->db->select('SUM(sp.stok) AS jml_stok')
                                      ->from('stok_produk sp')
                                      ->where($where_stok)
                                      ->get()->row();               
        $data['produk'] = $this->db->query('SELECT COUNT(id_produk) AS jml FROM produk_retail WHERE '.$where_id_toko)->row();
        $data['kasir'] = $this->db->where($where_id_toko)
                                ->where('level', '2')
                                ->get('users')->result();
        $data['laba_hari_ini'] = $this->db->select('SUM(laba) AS jml_laba')
                                        ->from('orders')
                                        ->where($where_id_toko)
                                        ->where('tgl_order', date('d-m-Y'))
                                        ->get()->row();
        $data['laba_bulan_ini'] = $this->db->select('SUM(laba) AS jml_laba')
                                        ->from('orders')
                                        ->where($where_id_toko)
                                        ->where('SUBSTRING(tgl_order,4,7)', date('m-Y'))
                                        ->get()->row();
        $data['laba_total'] = $this->db->select('SUM(laba) AS jml_laba')
                                        ->from('orders')
                                        ->where($where_id_toko)
                                        ->get()->row();
        $data['total_pembelian'] = $this->db->select('SUM(total_bayar) as total')
                                            ->from('pembelian')
                                            ->where($where_id_toko)->get()->row();
        $data['data_pegawai'] = $this->Pegawai_retail_model->get_by_id_toko($this->userdata->id_toko);
        $data['data_group_by_users'] = $this->Penjualan_retail_model->get_group_by_id_users($this->userdata->id_toko);
        $data['data_order_terakhir'] = $this->Penjualan_retail_model->get_last_data($this->userdata->id_toko, 10);
        $awal_periode = date('Y-m-01');
        $akhir_periode = date('Y-m-t');
        $data['contents'] = $this->Pembelian_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
        $data['awal_periode'] = $awal_periode;
        $data['akhir_periode'] = $akhir_periode;
        $data['data_saldo_awal'] = $this->db->select("id_toko, id_akun, tgl, SUM(debet)-SUM(kredit) AS saldo")
                                          ->from("jurnal")
                                          ->where("DATE(CONCAT(SUBSTRING(tgl,7,4),'-',SUBSTRING(tgl,4,2),'-',SUBSTRING(tgl,1,2))) < '".$awal_periode."' ")
                                          ->group_by("id_akun")
                                          ->order_by('kode')
                                          ->get();
        $data['data_saldo'] = $this->db->select("id_toko, id_akun, tgl, SUM(debet)-SUM(kredit) AS saldo")
                                          ->from("jurnal")
                                          ->where("DATE(CONCAT(SUBSTRING(tgl,7,4),'-',SUBSTRING(tgl,4,2),'-',SUBSTRING(tgl,1,2))) BETWEEN '".$awal_periode."' AND '".$akhir_periode."' ")
                                          ->group_by("id_akun")
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
                $data = array(
          'id_toko' => $this->userdata->id_toko,
          'nama_toko' => $this->userdata->nama_toko,
          'nama_user' => $this->userdata->email,
          'active_home' => 'active',
          'id_modul' => $this->userdata->id_modul,
          'nama_modul' => $this->userdata->nama_modul,
        );
        $id_cabang = $this->userdata->id_toko;
        $where_join_produk_retail = 'produk_retail.id_toko="'.$this->userdata->id_toko.'"';
        $where_join_orders = 'orders.id_toko="'.$this->userdata->id_toko.'"';
        $where = "orders_detail.id_toko = '".$this->userdata->id_toko."'";
        $where_id_toko = "id_toko = ".$this->userdata->id_toko;
        $where_stok = 'sp.id_toko = '.$this->userdata->id_toko;
        $where_join_stock = $this->userdata->id_toko;

        $data['kategori_produk'] = $this->Kategori_produk_retail_model->get_by_id_toko($this->userdata->id_toko);
        $data['jumlah_member'] = $this->Member_retail_model->total_rows();
        $data['orders'] = $this->Penjualan_retail_model->get_by_tgl($this->userdata->id_toko, date('d-m-Y'));
        $data['orders_hari_ini'] = $this->Penjualan_retail_model->get_by_tgl2($this->userdata->id_toko, date('d-m-Y'));
        $data['orders_per_bulan'] = $this->Penjualan_retail_model->get_by_bulan_tahun($this->userdata->id_toko, date('m'), date('Y'));
        $data['produk_terlaris'] = $this->db->where($where_id_toko)->order_by('dibeli', 'desc')->group_by('barcode')->get('produk_retail', 5)->result();
        
        $data['produk_terjual'] = $this->db->select('SUM(orders_detail.jumlah) AS jumlah')
                                        ->from('orders')
                                        ->join('orders_detail', 'orders.id_orders_2=orders_detail.id_orders_2 AND '.$where)
                                        ->where($where_join_orders)
                                        ->get()->row();
        $data['produk_terlaris_hari_ini'] = $this->db->select('produk_retail.*, SUM(orders_detail.jumlah) AS jumlah')
                                            ->from('orders_detail')
                                            ->join('orders', 'orders_detail.id_orders_2=orders.id_orders_2 AND '.$where_join_orders)
                                            ->join('produk_retail', 'orders_detail.id_produk=produk_retail.id_produk_2 AND '.$where_join_produk_retail)
                                            ->where($where)
                                            ->where('orders.tgl_order', date('d-m-Y'))
                                            ->group_by('produk_retail.id_produk')
                                            ->order_by('SUM(orders_detail.jumlah)', 'desc')
                                            ->limit(5)
                                            ->get()->result();
        $data['pembelian'] = $this->db->where('tgl_masuk', date('d-m-Y'))->where($where_id_toko)->get('pembelian')->result();
        $data['total_stok'] = $this->db->select('SUM(sp.stok) AS jml_stok')
                                      ->from('stok_produk sp')
                                      ->where($where_stok)
                                      ->get()->row();               
        $data['produk'] = $this->db->query('SELECT COUNT(id_produk) AS jml FROM produk_retail WHERE '.$where_id_toko)->row();
        $data['kasir'] = $this->db->where($where_id_toko)
                                ->where('level', '2')
                                ->get('users')->result();
        $data['laba_hari_ini'] = $this->db->select('SUM(laba) AS jml_laba')
                                        ->from('orders')
                                        ->where($where_id_toko)
                                        ->where('tgl_order', date('d-m-Y'))
                                        ->get()->row();
        $data['laba_bulan_ini'] = $this->db->select('SUM(laba) AS jml_laba')
                                        ->from('orders')
                                        ->where($where_id_toko)
                                        ->where('SUBSTRING(tgl_order,4,7)', date('m-Y'))
                                        ->get()->row();
        $data['laba_total'] = $this->db->select('SUM(laba) AS jml_laba')
                                        ->from('orders')
                                        ->where($where_id_toko)
                                        ->get()->row();
        $data['total_pembelian'] = $this->db->select('SUM(total_bayar) as total')
                                            ->from('pembelian')
                                            ->where($where_id_toko)->get()->row();
        $data['data_pegawai'] = $this->Pegawai_retail_model->get_by_id_toko($this->userdata->id_toko);
        $data['data_group_by_users'] = $this->Penjualan_retail_model->get_group_by_id_users($this->userdata->id_toko);
        $data['data_order_terakhir'] = $this->Penjualan_retail_model->get_last_data($this->userdata->id_toko, 10);
        $awal_periode = date('Y-m-01');
        $akhir_periode = date('Y-m-t');
        $data['contents'] = $this->Pembelian_retail_model->get_by_between_date($this->userdata->id_toko, $awal_periode, $akhir_periode);
        $data['awal_periode'] = $awal_periode;
        $data['akhir_periode'] = $akhir_periode;
        $data['data_saldo_awal'] = $this->db->select("id_toko, id_akun, tgl, SUM(debet)-SUM(kredit) AS saldo")
                                          ->from("jurnal")
                                          ->where("DATE(CONCAT(SUBSTRING(tgl,7,4),'-',SUBSTRING(tgl,4,2),'-',SUBSTRING(tgl,1,2))) < '".$awal_periode."' ")
                                          ->group_by("id_akun")
                                          ->order_by('kode')
                                          ->get();
        $data['data_saldo'] = $this->db->select("id_toko, id_akun, tgl, SUM(debet)-SUM(kredit) AS saldo")
                                          ->from("jurnal")
                                          ->where("DATE(CONCAT(SUBSTRING(tgl,7,4),'-',SUBSTRING(tgl,4,2),'-',SUBSTRING(tgl,1,2))) BETWEEN '".$awal_periode."' AND '".$akhir_periode."' ")
                                          ->group_by("id_akun")
                                          ->get();
        $data['data_pendapatan'] = $this->db->where("SUBSTRING(kode,1,1)", "3")->order_by('kode', 'asc')->get("akun");
        $data['data_biaya'] = $this->db->where("SUBSTRING(kode,1,1)", "4")->order_by('kode', 'asc')->get("akun");
        $data['modul'] = $this->db->where('id', $this->userdata->id_modul)->get('pil_modul')->row();

        /**
         * Produksi
         */

        $data['produksi_hari_ini'] = $this->_produksi_hari_ini();
        $data['total_karyawan_produksi'] = $this->db->where('id_toko', $this->userdata->id_toko)->where('level', 4)->get('users')->num_rows();
        $data['total_karyawan_masuk'] = $this->_total_karyawan('masuk');
        $data['karyawan_tidak_masuk'] = $this->_karyawan_tidak_masuk();
        $data['data_stok_bahan'] = $this->db->select('pr.*, SUM(sp.stok) AS stok')
                                            ->from('produk_retail pr')
                                            ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                                            ->join('stok_produk sp', 'pr.id_produk_2=sp.id_produk AND pr.id_toko=sp.id_toko')
                                            ->where('pr.jenis', 1)
                                            ->where('u.level', 2)
                                            ->group_by('pr.id_produk_2')
                                            ->limit(6)
                                            ->get()->result();
        $data['data_stok_produksi'] = $this->db->select('pr.*, SUM(sp.stok) AS stok')
                                            ->from('produk_retail pr')
                                            ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                                            ->join('stok_produk sp', 'pr.id_produk_2=sp.id_produk AND pr.id_toko=sp.id_toko')
                                            ->where('pr.jenis', 0)
                                            ->where('u.level', 2)
                                            ->group_by('pr.id_produk_2')
                                            ->limit(6)
                                            ->get()->result();
         /**
          * 
          */
         
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

        /**
         * Produksi
         */

        $data['produksi_hari_ini'] = $this->_produksi_hari_ini();
        $data['total_karyawan_produksi'] = $this->db->where('id_toko', $this->userdata->id_toko)->where('level', 4)->get('users')->num_rows();
        $data['total_karyawan_masuk'] = $this->_total_karyawan('masuk');
        $data['karyawan_tidak_masuk'] = $this->_karyawan_tidak_masuk();
        $data['data_stok_bahan'] = $this->db->select('pr.*, SUM(sp.stok) AS stok')
                                            ->from('produk_retail pr')
                                            ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                                            ->join('stok_produk sp', 'pr.id_produk_2=sp.id_produk AND pr.id_toko=sp.id_toko')
                                            ->where('pr.jenis', 1)
                                            ->where('u.level', 2)
                                            ->group_by('pr.id_produk_2')
                                            ->limit(6)
                                            ->get()->result();
        $data['data_stok_produksi'] = $this->db->select('pr.*, SUM(sp.stok) AS stok')
                                            ->from('produk_retail pr')
                                            ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                                            ->join('stok_produk sp', 'pr.id_produk_2=sp.id_produk AND pr.id_toko=sp.id_toko')
                                            ->where('pr.jenis', 0)
                                            ->where('u.level', 2)
                                            ->group_by('pr.id_produk_2')
                                            ->limit(6)
                                            ->get()->result();
         /**
          * 
          */

        $data['total_piutang'] = $this->db->select('SUM(p.sisa) AS total')
                                        ->from('piutang p')
                                        ->where('p.id_toko',$this->userdata->id_toko)
                                        ->get()->row();
        $data['total_hutang'] = $this->db->select('SUM(h.kurang) AS total')
                                          ->from('hutang h')
                                          ->where('h.id_toko',$this->userdata->id_toko)
                                          ->get()->row();
         

        //laporan_order
        $this->load->model('Sales_order_model');
        $data['grafik_order_hari_ini'] = $this->Sales_order_model->grafik_order_hari_ini();
        $data['data_order_hari_ini'] = $this->Sales_order_model->data_order_hari_ini();
        $data['grafik_order_per_hari'] = $this->Sales_order_model->grafik_order_per_hari();
        $data['data_order_per_hari'] = $this->Sales_order_model->data_order_per_hari();
        $data['grafik_order_per_bulan'] = $this->Sales_order_model->grafik_order_per_bulan();
        $data['data_order_per_bulan'] = $this->Sales_order_model->data_order_per_bulan();
        $data['pil_media'] = $this->db->get('pil_media')->result();
        //laporan aktivitas
        $this->load->model('Sales_aktivitas_model');
        $data['data_aktivitas'] = $this->Sales_aktivitas_model->get_data_aktivitas();

        $this->view->render_advertiser('home', $data);
  }
  
  function _total_karyawan($state)
  {
    $this->db->select('u.id,u.first_name as nama,jk.id');
    $this->db->from('users u');
    $this->db->join('jam_kerja jk', 'jk.id_pegawai = u.id','left');
    $this->db->where('u.level', 4);
    $this->db->where('jk.tgl', date('d-m-Y'));
    if($state == 'masuk'){
    $this->db->where('jk.status <> 0');
    return $this->db->get()->num_rows();
    }else if($state == 'tidak-masuk'){
    $this->db->where('jk.id is null');
    return $this->db->get()->result();
    }
  }

  function _stok_bahan($id)
  {
    $this->db->select('sum(stok) as stok');
    $this->db->from('produk_retail pr');
    $this->db->join('stok_produk sp', 'sp.id_produk = pr.id_produk_2');
    $this->db->where('pr.id_produk_2', $id);
    $row = $this->db->get()->row();
    if($row){
      return $row->stok;
    }else{
      return 'Kosong';
    }
  }

  function _karyawan_tidak_masuk()
  {
    $output = '';
    $res_karyawan = $this->db->where('level', 4)->get('users')->result();
    foreach ($res_karyawan as $karyawan) {
      $row = $this->db->where('id_pegawai', $karyawan->id_users)->where('tgl',date('d-m-Y'))->get('jam_kerja')->row();
      if(empty($row)){
        $output .= $karyawan->first_name.',';
      }
    }
    return $output;
  }

  function _produksi_hari_ini()
  {
    $this->db->select('pr.nama_produk,pb.sisa_kemarin,pb.ambil_baru');
    $this->db->from('produksi p');
    $this->db->join('produksi_barang pb', 'pb.id_produksi = p.id');
    $this->db->join('produk_retail pr', 'pr.id_produk = pb.id_produk');
    $this->db->where('tgl', date('d-m-Y'));
    $this->db->order_by('p.id', 'DESC');
    return $this->db->get()->result();
  }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */