<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends AI_Admin {

	public function __construct()
	{
    parent::__construct();
    $this->models('Kategori_produk_retail_model, Member_retail_model, Penjualan_retail_model, Pembelian_retail_model, Pegawai_retail_model, Piutang_retail_model, Faktur_retail_model');
  }

  // jika orders_detail kosong
  public function sinkronisasi_order()
  {
  	$this->Admin_model->set_foreign_0();
    $res = $this->Admin_model->get_order($this->userdata->id_toko)->result();
    foreach ($res as $key):
      $res_lod = $this->Admin_model->get_od($this->userdata->id_toko, $key->id_orders_2)->result();
      // delete orders_detail
      $this->Admin_model->delete_od($this->userdata->id_toko, $key->id_orders_2);
      // insert orders detail
      foreach ($res_lod as $key2):
        $data_insert = array(
          'id_orders_2' => $key->id_orders_2,
          'id_orders_sales' => $key->id_sales,
          'id_toko' => $this->userdata->id_toko,
          'id_produk' => $key2->id_produk,
          'pil_harga' => '0',
          'jumlah' => $key2->jumlah,
          'harga_satuan' => $key2->harga_satuan,
          'harga_jual' => $key2->harga_jual,
          'sub_total' => ($key2->jumlah*$key2->harga_jual),
        );
        $this->Admin_model->insert_od($data_insert);
      endforeach;
    endforeach;
    $this->Admin_model->delete_od2($this->userdata->id_toko);
  	$this->Admin_model->set_foreign_1();
  }

	public function index()
	{
    $data = array(
      'active_home' => 'active',
    );
    $data['is_pusat'] = false;

    $this->sinkronisasi_order();

    $id_cabang = $this->userdata->id_toko;
    $where_join_produk_retail = 'produk_retail.id_toko="'.$this->userdata->id_toko.'"';
    $where_join_orders = 'orders.id_toko="'.$this->userdata->id_toko.'"';
    $where = "orders_detail.id_toko = '".$this->userdata->id_toko."'";
    $where_id_toko = "id_toko = ".$this->userdata->id_toko;
    $where_stok = 'sp.id_toko = '.$this->userdata->id_toko;
    $where_join_stock = $this->userdata->id_toko;

    $data['produk_terjual'] = $this->Admin_model->get_produk_jual($this->userdata->id_toko)->row();
    $data['produk'] = $this->db->query('SELECT COUNT(id_produk) AS jml FROM produk_retail WHERE '.$where_id_toko)->row();
    /* $data['total_stok'] = $this->db->select('SUM(sp.stok) AS jml_stok')
                                  ->from('stok_produk sp')
                                  ->where($where_stok)
                                  ->get()->row(); */
    // $data['total_stok'] = $this->db->query('SELECT SUM((p.jml-od.jml)+ps.jml) AS jml_stok FROM (SELECT id_produk, SUM(jumlah) AS jml FROM orders_detail WHERE id_toko="'.$this->userdata->id_toko.'" AND id_orders_2>0 GROUP BY id_produk) AS od JOIN (SELECT id_produk, SUM(jumlah) AS jml FROM pembelian WHERE id_toko="'.$this->userdata->id_toko.'" GROUP BY id_produk) AS p ON od.id_produk=p.id_produk LEFT JOIN (SELECT id_produk, SUM(stok) AS jml FROM penyesuaian_stok WHERE id_toko="'.$this->userdata->id_toko.'" GROUP BY id_produk) AS ps ON od.id_produk=ps.id_produk')->row();
    /** Total stok */
    
    $data['total_stok'] = (object)array("jml_stok"=>0);
    $total_stok = $this->Admin_model->get_total_stok($this->userdata->id_toko)->result();
    if(!empty($total_stok)){
      foreach ($total_stok as $stok) {
        $data['total_stok']->jml_stok += $stok->jml_stok;
      }
    }
    /**
     * End total stok
     */
    
    $data['orders'] = $this->Penjualan_retail_model->get_by_tgl($this->userdata->id_toko, date('d-m-Y'));

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
    $data['tempo_pembelian']   = $this->Faktur_retail_model->get_all_by_id_toko($this->userdata->id_toko,$deadline1);
    $data['piutang_penjualan'] = $this->Piutang_retail_model->get_piutang_penjualan($deadline2);

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
              
    $date = date('Y-m-d');
    $last_day_this_month = date('Y-m-d',strtotime($date));
    $data['produk_expired'] = $this->Pembelian_retail_model->get_by_tgl_expire($last_day_this_month,$this->userdata->id_toko,5,'tgl_expire');
    $data['produk_terlaris'] = $this->db->where($where_id_toko)->order_by('dibeli', 'desc')->group_by('barcode')->get('produk_retail', 5)->result();
    $data['data_order_terakhir'] = $this->Penjualan_retail_model->get_last_data($this->userdata->id_toko, 10);
    $data['persediaan'] = 0;
    $row_persediaan = $this->db->select('(SUM(j.debet)-SUM(j.kredit)) AS jml')
                               ->from('jurnal j')
                               ->join('akun a', 'j.id_akun=a.id')
                               ->where('a.kode', '1.01.04')
                               ->where('SUBSTRING(j.tgl,7,4)=', date('Y'))
                               ->get()->row();
    if ($row_persediaan) {
      $data['persediaan'] = $row_persediaan->jml;
    }
    $data['laba_hari_ini'] = $this->db->select('SUM(laba) AS jml_laba')
                                    ->from('orders')
                                    ->where($where_id_toko)
                                    ->where('tgl_order', date('d-m-Y'))
                                    ->get()->row();
    $data['total_piutang'] = $this->db->select('SUM(p.sisa) AS total')
                                    ->from('piutang p')
                                    ->where('p.id_toko',$this->userdata->id_toko)
                                    ->get()->row();
    /* $data['total_hutang'] = $this->db->select('SUM(h.kurang) AS total')
                                      ->from('hutang h')
                                      ->where('h.id_toko',$this->userdata->id_toko)
                                      ->get()->row(); */
    $data['total_hutang'] = $this->db->select('(SUM(j.debet-j.kredit)*-1) AS total')
                                     ->from('jurnal j')
                                     ->join('akun a', 'j.id_akun=a.id')
                                     ->where('j.id_toko',$this->userdata->id_toko)
                                     ->where('SUBSTRING(j.tgl,7,4)=', date('Y'))
                                     ->where('a.kode', '2.01')
                                     ->get()->row();
    
    
    $this->load->model('Sales_order_model');
    $data['grafik_order_hari_ini'] = $this->Sales_order_model->grafik_order_hari_ini();
    $data['grafik_order_per_hari'] = $this->Sales_order_model->grafik_order_per_hari();
    $data['grafik_order_per_bulan'] = $this->Sales_order_model->grafik_order_per_bulan();
    $data['grafik_order_per_kasir'] = $this->Sales_order_model->grafik_order_per_kasir();
    
    $this->view('home', $data);
  }

  function testings()
  {
    $this->load->model('Sales_order_model');
    echo "<pre>";
    print_r ($this->Sales_order_model->grafik_order_per_bulan());
    echo "</pre>";
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