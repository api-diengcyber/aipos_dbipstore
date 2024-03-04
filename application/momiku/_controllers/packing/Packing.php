<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->model('Sales_order_model');
        $this->load->library('view');
        $this->Login_model->is_packing();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
    $status = ($this->input->post('status'))?$this->input->post('status'):2;
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');

      $data = array(
        'id_toko' => $this->userdata->id_toko,
        'nama_toko' => $this->userdata->nama_toko,
        'nama_user' => $this->userdata->email,
        'active_packing' => 'active',
        'id_modul' => $this->userdata->id_modul,
        'nama_modul' => $this->userdata->nama_modul,
        'data_order' => $this->Sales_order_model->get_order(array('status'=>$status,'dari'=>$dari,'sampai'=>$sampai)),
        'status'=>$status,
        'dari'=>$dari,
        'sampai'=>$sampai,
    );
    $this->view->render_packing('packing/packing_list', $data);
  }

  public function proses_packing()
  {
      $checked_order = $this->input->post('checked_packing');
      $data['data_order'] = $this->Sales_order_model->get_order(array('status'=>2,'where_in'=>$checked_order));
      
      $this->load->view('packing/packing/packing_cetak', $data, FALSE);
      
      
  }

  public function proses_kirim()
  {
      $this->load->model('Pengaturan_transaksi_model');
      $this->load->model('Pengaturan_opsi_model');
      $this->load->model('Pembelian_retail_model');
      $this->load->model('Stok_produk_model');

      $id_order = $this->input->post('id_order');
      $no_resi = $this->input->post('no_resi');

      $row_order = $this->db->where('id', $id_order)->get('laporan_order')->row();

      if($row_order->status == 2){
          $this->db->where('id', $id_order);
          $this->db->update('laporan_order', array("no_resi"=>$no_resi,"status"=>3));


          $this->db->where('id_order', $id_order);
          $res_laporan_order_detail = $this->db->get('laporan_order_detail')->result();

          foreach ($res_laporan_order_detail as $detail) {
              $row_last_pembelian = $this->db->select('p.*')
                                   ->from('pembelian p')
                                   ->where('p.id_toko', $this->userdata->id_toko)
                                   ->where('p.id_produk', $detail->id_produk)
                                   ->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
                                   ->order_by('p.id_pembelian', 'desc')
                                   ->get()->row();
              $res_pembelian = $this->Pembelian_retail_model->get_by_id_produk_penjualan($detail->id_produk, $this->userdata->id_toko);


              $jumlah_order = $detail->jumlah;
              foreach ($res_pembelian as $pembelian) {
                  $exexpire = explode("-", $pembelian->tgl_expire);
                  $hr_exp = $exexpire[0];
                  $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                  $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                  $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                  if($stgl_expire <= date('Y-m-d')){
                    // stok kadaluarsa //
                  } else {

                    // stok ada //
                    if($jumlah_order > $pembelian->stok){
                      $jumlah_beli = $pembelian->stok;
                    } else {
                      $jumlah_beli = $jumlah_order;
                    }

                    //Opsi Minus Stok
                    $qry = $this->Pengaturan_opsi_model->get_opsi_stok();
                    if($qry->opsi == 1){
                      $jumlah_beli = $jumlah_order;
                    }
                    //End Opsi Minus Stok

                    $sisa_stok = $pembelian->stok - $jumlah_beli;

                    if ($qry->opsi == 0) {
                      if ($sisa_stok < 0) {
                        $sisa_stok = 0;
                      }
                    }

                    $data_sp = array(
                      'stok' => $sisa_stok
                    );

                    $this->Stok_produk_model->update_by_id_pembelian($pembelian->id_pembelian, $data_sp , $detail->id_produk);

                    $data_order_stok = array(
                      "id_orders_2"=>$id_order,
                      "id_users"=>$this->userdata->id_users,
                      "id_cabang"=>$this->userdata->id_cabang,
                      "id_produk"=>$detail->id_produk,
                      "id_pembelian"=>$pembelian->id_pembelian,
                      "jumlah"=>$jumlah_beli
                    );

                    $this->db->insert('orders_stok', $data_order_stok);

                    $jumlah_order -= $pembelian->stok;
                    if($jumlah_order > 0){
                      $jumlah_order = $jumlah_order;
                    } else {
                      $jumlah_order = 0;
                    }

                    if($jumlah_order == 0){
                      break;
                    }
                  }
              }
          }
      }else{
          $this->db->where('id', $d_order);
          $this->db->update('no_resi', array("no_resi"=>$no_resi));
      }

      redirect(site_url('packing/packing'),'refresh');
      
  }

}

/* End of file Packing.php */
?>