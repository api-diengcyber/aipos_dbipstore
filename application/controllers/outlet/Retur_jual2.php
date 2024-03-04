<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_jual2 extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Retur_jual_model');
	}

	public function index()
	{
    $data = [
      'active_retur_penjualan_manual_create' => 'active',
    ];
    $this->view('retur_jual2/retur_jual_list', $data);
  }

	public function json()
	{
      header('Content-Type: application/json');
      echo $this->Retur_jual_model->json($this->userdata->id_toko);
	}
  
  public function ajax_cari_barang()
  {
    header('Content-Type: application/json');
    $term = $this->input->post('term', true);
    $data = array();
    $res = $this->db->where('id_toko', $this->userdata->id_toko)->like('nama_produk', $term, 'both')->or_like('barcode', $term, 'both')->get('produk_retail')->result();
    foreach ($res as $key) {
      $data[] = array(
        'value' => $key->id_produk_2,
        'label' => $key->nama_produk,
      );
    }
    $result = array(
      'status' => 'ok',
      'data' => $data,
    );
    echo json_encode($result);
  }

  public function ajax_insert_temp()
  {
    header('Content-Type: application/json');
    $id_produk = $this->input->post('id_produk', true);
    $row = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_produk', $id_produk)->get('retur_jual_temp')->row();
    if ($row) {
      $data_update = array(
        'jumlah' => $row->jumlah+1,
      );
      $this->db->where('id', $row->id);
      $this->db->update('retur_jual_temp', $data_update);
    } else {
      $harga_jual = 0;
      $row = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_produk_2', $id_produk)->get('produk_retail')->row();
      if ($row) {
        $harga_jual = $row->harga_1;
      }
      $data_insert = array(
        'id_toko' => $this->userdata->id_toko,
        'id_users' => $this->userdata->id_users,
        'id_produk' => $id_produk,
        'harga_satuan' => $harga_jual,
        'harga_jual' => 0,
        'jumlah' => 1,
        'diskon' => 0,
        'potongan' => 0,
        'manual' => 1,
      );
      $this->db->insert('retur_jual_temp', $data_insert);
    }
    $data = array(
      'status' => 'ok',
    );
    echo json_encode($data);
  }

  public function ajax_table()
  {
    header('Content-Type: application/json');
    $res = $this->db->select('rjt.*, pr.nama_produk')
                    ->from('retur_jual_temp rjt')
                    ->join('produk_retail pr', 'rjt.id_produk=pr.id_produk_2')
                    ->where('rjt.id_toko', $this->userdata->id_toko)
                    ->get()->result();
    $result = array(
      'status' => 'ok',
      'data' => $res,
    );
    echo json_encode($result);
  }

  public function ajax_update_temp()
  {
    header('Content-Type: application/json');
    $id = $this->input->post('id', true);
    $qty = $this->input->post('qty', true);
    $nominal = $this->input->post('nominal', true);
    $pilihan = $this->input->post('pilihan', true);
    $subtotal = $this->input->post('subtotal', true);

    $data_update = array(
      'jumlah' => $qty,
      'harga_satuan' => $nominal,
      'pilihan' => $pilihan,
    );
    $this->db->where('id', $id);
    $this->db->update('retur_jual_temp', $data_update);

    $result = array(
      'status' => 'ok',
    );
    echo json_encode($result);
  }

  public function ajax_delete_temp()
  {
    header('Content-Type: application/json');
    $id = $this->input->post('id', true);

    $this->db->where('id', $id);
    $this->db->delete('retur_jual_temp');
    
    $result = array(
      'status' => 'ok',
    );
    echo json_encode($result);
  }

	public function create()
	{
    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_retur_penjualan_manual_create' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'action' => site_url().'admin/retur_jual2/create_action',
      'tanggal' => set_value('tanggal', date('d-m-Y')),
    );
    $this->view('retur_jual2/retur_jual_form', $data);
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
  
  public function create_action()
  {
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $tanggal = $this->input->post('tanggal', true);
      $ket = $this->input->post('ket', true);
      $res_temp = $this->db->select('rjt.*, pr.nama_produk, pr.harga_beli')
                           ->from('retur_jual_temp rjt')
                           ->join('produk_retail pr', 'rjt.id_produk=pr.id_produk_2 AND rjt.id_toko=pr.id_toko')
                           ->where('rjt.id_toko', $this->userdata->id_toko)
                           ->order_by('rjt.id', 'asc')
                           ->get()->result();

      $id_retur = 1;
      $row_last_retur = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_retur', 'desc')->get('retur_jual')->row();
      if ($row_last_retur) {
        $id_retur = $row_last_retur->id_retur+1;
      }

      $total = 0;
      $total_hpp = 0;
      $fpilihan = null;
      foreach ($res_temp as $key):
        $row_sp = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_produk', $key->id_produk)->order_by('id', 'desc')->get('stok_produk')->row();
        if ($row_sp) {
          if ($fpilihan==null) {
            $fpilihan = $key->pilihan;
          }
          $subtotal = $key->harga_satuan*$key->jumlah;
          $total += $subtotal;
          $subtotal_hpp = $key->harga_beli*$key->jumlah;
          $total_hpp += $subtotal_hpp;

           // stok mati
          if ($key->pilihan == "1") {
            $data_insert = array(
              'id_users' => $this->userdata->id_users,
              'id_toko' => $this->userdata->id_toko,
              'tgl' => $tanggal,
              'id_produk' => $key->id_produk,
              'stok' => $key->jumlah,
              'harga_satuan' => $key->harga_satuan,
            );
            $this->db->insert('stok_produk_mati', $data_insert);
          } else {
            $data_update = array(
              'stok' => $row_sp->stok+$key->jumlah,
            );
            $this->db->where('id', $row_sp->id);
            $this->db->update('stok_produk', $data_update);
          }

          $data_insert = array(
            'id_users' => $this->userdata->id_users,
            'id_retur' => $id_retur,
            'id_toko' => $this->userdata->id_toko,
            'id_produk' => $key->id_produk,
            'id_orders_detail' => '',
            'jumlah' => $key->jumlah,
            'harga_satuan' => $key->harga_satuan,
            'harga_jual' => $key->harga_satuan,
            'diskon' => 0,
            'potongan' => 0,
            'subtotal' => $subtotal,
            'pilihan' => $key->pilihan,
          );
          $this->db->insert('retur_jual_detail', $data_insert);
        }
      endforeach;

      $this->db->where('id_toko', $this->userdata->id_toko);
      $this->db->delete('retur_jual_temp');

      $data_insert = array(
        'id_retur' => $id_retur,
        'id_toko' => $this->userdata->id_toko,
        'id_users' => $this->userdata->id_users,
        'tgl' => $tanggal.' '.date('H:i:s'),
        'no_retur' => $this->get_retur(),
        'no_faktur' => '',
        'total' => $total,
        'ppn' => 0,
        'total_ppn' => 0,
        'ket' => $ket,
      );
      $this->db->insert('retur_jual', $data_insert);
      $jenis = "manual";
      // $fpilihan = 0;
      $pembayaran = 0;
      $no_faktur = 0;
      eval($this->Pengaturan_transaksi_model->accounting('buatreturjual'));
      $this->session->set_flashdata('message', 'Create record success');
      redirect(site_url('admin/retur_jual2/create'));
    }
  }

  public function _rules() 
  {
    $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}

/* End of file Retur_jual */
/* Location: ./application/controllers/Retur_jual */