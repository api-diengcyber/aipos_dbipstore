<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_retur extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
    $this->models('Sales_order_model');
	}

	public function index($page = '')
	{
    $no_invoice = $this->input->post('no_invoice');
    $id_media = $this->input->post('id_media');
    // $status = $this->input->post('status');
    $status = 3;
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $jenis_retur = $this->input->post('jenis_retur');
    
    $pembayaran = '5|6';
    if ($jenis_retur=="5") {
      $pembayaran = 5;
    } else if ($jenis_retur == "6") {
      $pembayaran = 6;
    }
    // data order
    $params = array('status'=>$status,'dari'=>$dari,'sampai'=>$sampai,'no_invoice'=>$no_invoice,'order'=>true,'pembayaran'=>$pembayaran);
    $pagination = array('page'=>($page)?$page:1,'perpage'=>100);
    $data_order = $this->Sales_order_model->get_order($params,$pagination);

    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/order_sales/index/');
    $config['total_rows'] =  count($data_order);
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
                              ->where('valid IS NULL'.$and_where)
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
      'active_lap_retur_penjualan' => 'active',
      'data_order' => $data_order,
      'status' => $status,
      'exp' => $this->db->get('expedisi')->result(),
      'dari' => $dari,
      'pagination' => $this->pagination->create_links(),
      'no_invoice' => $no_invoice,
      'id_media' => $id_media,
      'sampai' => $sampai,
      'jenis_retur' => $jenis_retur,
      'page' => $page,
      'message' => $this->session->userdata('message'),
      'show_warning' => $show_warning,
    );
    $this->view('laporan/laporan_retur_jual', $data);
  }

  private function get_retur()
  {
    $digit = 8;
    $row = $this->db->select('RIGHT(no_retur,'.$digit.') AS no')
                    ->from('retur_jual')
                    ->where('id_toko', $this->userdata->id_toko)
                    ->order_by('no_retur', 'desc')
                    ->get()->row();
    $no = 1;
    if ($row) {
      $no = $row->no+1;
    }
    $kode = 'RJ'.sprintf('%0'.$digit.'d', $no);
    return $kode;
  }

  public function proses_action($id, $proses = '')
  {
    $row = $this->db->select('o.*')
                    ->from('orders o')
                    ->where('o.id_orders_2', $id)
                    ->get()->row();
    if ($row) {
      $ket = '';
      $pembayaran = '3';
      if ($proses == 'cod') {
        $ket = 1;
        $pembayaran = '5';
      } else if ($proses == 'garansi') {
        $ket = 2;
        $pembayaran = '6';
      }
      $id_retur = 1;
      $row_last_retur = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_retur', 'desc')->get('retur_jual')->row();
      if ($row_last_retur) {
        $id_retur = $row_last_retur->id_retur+1;
      }
      $res_od = $this->db->select('od.*, pr.harga_beli')
                         ->from('orders_detail od')
                         ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2')
                         ->where('od.id_orders_2', $row->id_orders_2)
                         ->get()->result();
      if ($pembayaran=='5') {
        foreach ($res_od as $key) :
          $data_insert = array(
            'id_users' => $this->userdata->id_users,
            'id_toko' => $this->userdata->id_toko,
            'id_retur' => $id_retur,
            'id_produk' => $key->id_produk,
            'stok' => $key->jumlah,
          );
          $this->db->insert('stok_produk', $data_insert);
        endforeach;
      }
      $data_insert = array(
        'id_retur' => $id_retur,
        'id_toko' => $this->userdata->id_toko,
        'id_users' => $this->userdata->id_users,
        'tgl' => date('d-m-Y').' '.date('H:i:s'),
        'no_retur' => $this->get_retur(),
        'no_faktur' => '',
        'total' => $row->harga,
        'ppn' => 0,
        'total_ppn' => 0,
        'ket' => $ket,
      );
      $data_update = array(
        'pembayaran' => $pembayaran,
      );
      $this->db->where('id_orders_2', $row->id_orders_2);
      $this->db->update('orders', $data_update);
      $jenis = "otomatis";
      $fpilihan = 0; // stok_kembali
      $total = $row->harga;
      $total_hpp = 0;
      $no_faktur = $row->no_invoice;
      foreach ($res_od as $key):
        $total_hpp += $key->jumlah * $key->harga_beli;
      endforeach;
      eval($this->Pengaturan_transaksi_model->accounting('buatLaporan_retur'));
      $this->session->set_flashdata('message', 'Insert Record Success');
    } else {
      $this->session->set_flashdata('message', 'Insert Record Failed');
    }
    redirect(site_url('admin/laporan_retur'));
  }

  public function batal_retur($id)
  {
    $row = $this->db->select('o.*')
                    ->from('orders o')
                    ->where('o.id_orders_2', $id)
                    ->where_in('o.pembayaran', array(5, 6))
                    ->get()->row();
    if ($row) {
      
      $ket_p = '';
      if ($row->pembayaran == "5") {
        $ket_p = 'RETUR-COD-'.$row->no_invoice;

      } else if ($row->pembayaran == "6") {
        $ket_p = 'RETUR-GARANSI-'.$row->no_invoice;

      }

      $this->db->where('id_toko', $this->userdata->id_toko);
      $this->db->like('kode', $ket_p, 'both');
      $this->db->delete('jurnal');
      
      $data_update = array(
        'pembayaran' => 4,
      );
      $this->db->where('id_orders_2', $row->id_orders_2);
      $this->db->update('orders', $data_update);
      
      /* echo "<pre>";
      print_r ($res);
      echo "</pre>"; */
      $res_od = $this->db->select('od.*, pr.harga_beli')
                         ->from('orders_detail od')
                         ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2')
                         ->where('od.id_orders_2', $row->id_orders_2)
                         ->get()->result();
      if ($row->pembayaran == '5') {
        foreach ($res_od as $key_od) {
          $row_sp = $this->db->select('*')
                             ->from('stok_produk')
                             ->where('id_produk', $key_od->id_produk)
                             ->order_by('id', 'desc')
                             ->get()->row();
          if ($row_sp) {
            $data_update = array(
              'stok' => $row_sp->stok-$key_od->jumlah,
            );
            $this->db->where('id', $row_sp->id);
            $this->db->update('stok_produk', $data_update);
          }
        }
        
      }

    }
    $this->session->set_flashdata('message', 'Batal retur terproses');
    redirect(site_url('admin/laporan_retur'));
  }
  
}

/* End of file Retur_jual */
/* Location: ./application/controllers/Retur_jual */