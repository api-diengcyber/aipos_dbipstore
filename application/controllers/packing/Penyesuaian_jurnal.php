<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyesuaian_jurnal extends AI_Admin {

	public function __construct()
	{
    parent::__construct();
  }
  
  public function index()
  {
    $data = array(
      'active_peny_jurnal' => 'active',
      'action' => site_url('admin/penyesuaian_jurnal/simpan'),
    );
    $this->view('jurnal2/penyesuaian_jurnal', $data);
  }
  
  public function simpan()
  {
      $tgl = $this->input->post('tgl', true);
      $this->check_missing_orders($tgl);
      /* $this->db->where('tgl', $tgl);
      $this->db->where('SUBSTRING(kode,1,14) = "VER-PEMBAYARAN"');
      $this->db->delete('jurnal');
      $this->action($tgl, $tgl); */
      $this->renew($tgl);
       redirect(site_url('admin/penyesuaian_jurnal'),'refresh');
  }
  
  public function toDate($tgl) 
  {
    $ex = explode("-", $tgl);
    return $ex[2]."-".$ex[1]."-".$ex[0];
  }

  public function check_missing_orders($tgl)
  {
    $this->load->model('Sales_order_model');
    $stgl = $this->toDate($tgl);
    $res = $this->db->select('o.*')
                    ->from('orders o')
                    ->where('o.status', 2)
                    ->where('o.id_orders IS NULL')
                    ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2)))=', $stgl)
                    ->get()->result();
    foreach ($res as $key) {
      $this->Sales_order_model->verifikasi_pembayaran($key->id);
    }
  }

  public function action($awal_periode, $akhir_periode)
  {
     
    $res_orders = $this->_get_orders_by_date($this->toDate($awal_periode), $this->toDate($akhir_periode));
    foreach ($res_orders as $k_o) :
      $res_od = $this->_get_orders_detail($k_o->id_orders_2);

      echo $k_o->tgl_order." :: ".$k_o->no_faktur."<br>";
      echo "<hr>";

      $jml_hpp = 0;
      $jml_sub = 0;
      foreach ($res_od as $k_od) {
        $jml_hpp += $k_od->harga_beli*$k_od->jumlah;
        $jml_sub += $k_od->sub_total;
        $laba = $k_od->sub_total-($k_od->harga_beli*$k_od->jumlah);
        /* echo "Nama Produk : ".$k_od->nama_produk."<br>";
        echo "Harga Beli : ".$k_od->harga_beli."<br>";
        echo "Jumlah : ".$k_od->jumlah."<br>";
        // echo "Harga Jual : ".$k_od->harga_jual."<br>";
        echo "Nominal : ".$k_od->sub_total."<br>";
        echo "Laba : ".$laba."<br>";
        echo ""; */
      }
      /*echo "HPP : ".$jml_hpp."<br>";
      echo "NOMINAL : ".$jml_sub."<br>";
      echo "<br><br><br>";*/

      /* $data_update = array(
        'laba' => $jml_sub-$jml_hpp,
      );
      $this->db->where('id_orders_2', $k_o->id_orders_2);
      $this->db->update('orders', $data_update); */

      $row_bayar = (Object) array();

      $jml_subtotal = $jml_sub;
      $row_bayar->ongkir = $k_o->ongkir;
      $id_tbl_order = $k_o->id_orders_2;
      $id_bank = $k_o->bank;
      $jml_hpp = $jml_hpp;
      
      $media = $k_o->media;
      $no_invoice = $k_o->no_faktur;
      $biaya_lain = $k_o->biaya_lain;
      $nominal_ongkir = $k_o->nominal_la-$biaya_lain;
      $tgl = $k_o->tgl_order;

	  eval($this->Pengaturan_transaksi_model->accounting('verifikasibayar'));

    endforeach;
  }

  function _get_orders_by_date($start, $end)
  {
    $this->db->select('o.*');
    $this->db->from('orders o');
    // $this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
    $this->db->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$start.'" AND "'.$end.'"');
    // $this->db->where('o.laba IS NULL');
    return $this->db->get()->result();
  }

  public function _get_orders_detail($id_orders)
  {
    $this->db->select('od.*, pr.nama_produk, pr.harga_beli');
    $this->db->from('orders_detail od');
    $this->db->join('produk_retail pr', 'od.id_produk=pr.id_produk_2');
    $this->db->where('od.id_orders_2', $id_orders);
    return $this->db->get()->result();
  }

  /* public function masuk_jurnal()
  {
    $res_orders = $this->_query_orders();
    foreach ($res_orders as $key) :
      
      echo $key->no_faktur." :: ".$key->tgl_order;
      echo "<hr>";
      echo "<br><br>";

      $row_bayar = (Object) array();
      $jml_subtotal = $jml_sub;
      $row_bayar->ongkir = $k_o->ongkir;
      $id_tbl_order = $k_o->id_orders_2;
      $id_bank = $k_o->bank;
      $jml_hpp = $jml_hpp;
      $nominal_ongkir = $k_o->nominal_la;
      $media = $k_o->media;

		  eval($this->Pengaturan_transaksi_model->accounting('verifikasibayar')); 
      
    endforeach;
  } */

  function _query_orders()
  {
    $this->db->select('o.*');
    $this->db->from('orders o');
    // $this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
    return $this->db->get()->result();
  }

  /* 
    1. hapus ver pembayaran (tersisa invoice saldo terbuka)
    2. insert ver pembarayan (selain invoice tersisa di jurnal tanggal itu)
    3. hapus ver-saldo-terbuka (Tersisa invoice ver-pembayaran)
    4. insert saldo terbuka (selain invoice ver pembayaran)
  */
	public function renew($tgl = '09-02-2020')
	{
    // $tgl = '09-02-2020';
    $this->delete_ver_pemb($tgl);
		$this->renew_ver('vp', $tgl);
    $this->delete_ver_st($tgl);
		$this->renew_ver('st', $tgl);
  }
  
  // delete verifikasi pembayaran
  public function delete_ver_pemb($tgl = '')
  {
    $this->db->where('SUBSTRING_INDEX(kode,"-",2)=', 'VER-PEMBAYARAN');
    $this->db->where('tgl', $tgl);
    $this->db->delete('jurnal');  
  }
  
  // delete verifikasi saldo_terbuka
  public function delete_ver_st($tgl = '')
  {
    $this->db->where('SUBSTRING_INDEX(kode,"-",3)=', 'VER-SALDO-TERBUKA');
    $this->db->where('tgl', $tgl);
    $this->db->delete('jurnal');
  }
	
	// verifikasi pembayaran(vp)/saldo_terbuka([else]) jika jurnal kosong
	public function renew_ver($type = 'vp', $tgl = '')
	{
		$this->load->model('Sales_order_model');
     
    $this->db->select('o.*');
    $this->db->from('orders o');
    // $this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
    if ($type=='vp') {
      $this->db->join('saldo_terbuka st', 'o.no_faktur=st.no_faktur', 'left');
    } else {
      $this->db->join('saldo_terbuka st', 'o.no_faktur=st.no_faktur');
    }
    $this->db->join('(SELECT * FROM jurnal WHERE LEFT(kode,3)="VER") AS j', 'SUBSTRING_INDEX(SUBSTRING_INDEX(kode,"-",-2),"-",1)=o.no_faktur', 'left');
    $this->db->where('o.tgl_order', $tgl);
    $this->db->where('j.id IS NULL');
    if ($type=='vp') {
      $this->db->where('st.id IS NULL');
    }
		$res = $this->db->get()->result();

		/* echo "<pre>";
		print_r ($res);
		echo "</pre>"; */
		
		foreach ($res as $key) :
      $res_od = $this->_get_orders_detail($key->id_orders_2);
      $jml_hpp = 0;
      $jml_sub = 0;
      foreach ($res_od as $k_od) {
        $jml_hpp += $k_od->harga_beli*$k_od->jumlah;
        $jml_sub += $k_od->sub_total;
        $laba = $k_od->sub_total-($k_od->harga_beli*$k_od->jumlah);
      }

      $row_bayar = (Object) array();
      $jml_subtotal = $jml_sub;
      $row_bayar->ongkir = $key->ongkir;
      $id_tbl_order = $key->id_orders_2;
      $id_bank = $key->bank;
      $jml_hpp = $jml_hpp;
      $media = $key->media;
      $no_invoice = $key->no_faktur;
      $biaya_lain = $key->biaya_lain;
      $nominal_ongkir = $key->nominal_la-$biaya_lain;
      $tgl = $key->tgl_order;

      if ($type=="vp") {
        eval($this->Pengaturan_transaksi_model->accounting('verifikasibayar'));
      } else {
        eval($this->Pengaturan_transaksi_model->accounting('saldoterbuka'));
      }
			
		endforeach;
  }

  // cron job penyesuaian jurnal per bulan
  public function cron_month()
  {
    set_time_limit(300); // 300 seconds

    $date = date('Y-m-01');
    $end_date = date('Y-m-t');

    while (strtotime($date) <= strtotime($end_date)) {
      $tgl = date('d-m-Y', strtotime($date));
      echo $tgl."<br>";
       $this->renew($tgl);
      $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
    }
  }

}