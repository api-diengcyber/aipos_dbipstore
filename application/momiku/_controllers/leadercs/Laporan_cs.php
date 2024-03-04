<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_cs extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Sales_model');
        $this->load->model('Sales_order_model');
        $this->load->model('Sales_aktivitas_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_leadercs();
        $this->userdata = $this->Login_model->get_data();
  }

  function json_order()
  {

  }

  function json_aktivitas()
  {
    header('Content-Type: application/json');
    echo $this->Sales_aktivitas_model->json_aktivitas($this->userdata->id_toko);
  }

  public function index()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $id_users = $this->input->post('id_users');

    $data = array(
        'id_toko' => $this->userdata->id_toko,
        'nama_toko' => $this->userdata->nama_toko,
        'nama_user' => $this->userdata->email,
        'active_order_cs' => 'active',
        'data_cs' => $this->Sales_model->get_data_sales(),
        'dari'=>$dari,
        'sampai'=>$sampai,
        "id_users"=>$id_users,
        'id_modul' => $this->userdata->id_modul,
        'nama_modul' => $this->userdata->nama_modul,
        'data_order' => $this->Sales_order_model->get_order(array('id_users'=>$id_users,'status_in'=>[1,2,3,4,5,6],'dari'=>$dari,'sampai'=>$sampai)),
    );
    $this->view->render_leadercs('laporan_cs/laporan_order', $data);
  }

  function action_req_retur_jual()
  {
    $id_order = $this->input->post('id_order');
    $data_produk = json_decode($this->input->post('produk'));


    $dp = [];
    foreach($data_produk as $produk){
      $dp[$produk->id_produk] = $produk->jumlah;
    }

    $row_lo = $this->db->where('id', $id_order)->get('laporan_order')->row();
    
    $this->db->select('o.no_faktur,od.*,pr.id_produk_2');
    $this->db->from('orders o');
    $this->db->join('orders_detail od', 'od.id_orders = o.id_orders_2');
    $this->db->join('produk_retail pr', 'pr.id_produk_2 = od.id_produk');
    $this->db->where('o.no_faktur', $row_lo->no_invoice);
    $data_order = $this->db->get()->result();


    if(count($data_order) > 0){
      $array_detail = [];
      $total = 0;
      $i = 0;
      foreach($data_order as $order){
        $jumlah = $dp[$order->id_produk_2];
        $subtotal = $jumlah*$order->harga_satuan;
        $total += $subtotal;
        $array_detail[$i] = array(
            'id_retur' => '',
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_users,
            'id_produk' => $order->id_produk,
            'id_orders_detail' => $order->id_orders,
            'jumlah' => $jumlah,
            'harga_satuan' => $order->harga_satuan,
            'harga_jual' => $order->harga_jual,
            'subtotal' => $subtotal,
        );
        $i++;
      }

      $data_insert = array(
          'id_orders'=>$id_order,
          'id_toko' => $this->userdata->id_toko,
          'id_users' => $this->userdata->id_users,
          'id_sales' => $row_lo->id_cs,
          'tgl' => date('d-m-Y').' '.date('H:i:s'),
          'no_faktur' => $data_order[0]->no_faktur,
          'total' => $total,
      );
      $this->db->insert('retur_jual_gudang_temp', $data_insert);
      $id_retur = $this->db->insert_id();
      
      foreach ($array_detail as $detail) {
        $detail['id_retur'] = $id_retur;
        $this->db->insert('retur_jual_gudang_detail_temp', $detail);
      }

    }

    $this->db->where('id', $id_order);
    $this->db->update('laporan_order', array('status'=>5));
    redirect(site_url('leadercs/laporan_cs'),'refresh');

  }

  public function aktivitas()
  {
    $this->load->model('Sales_aktivitas_model');

    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $id_users = $this->input->post('id_users');

    $data = array(
        'id_toko' => $this->userdata->id_toko,
        'nama_toko' => $this->userdata->nama_toko,
        'nama_user' => $this->userdata->email,
        'active_aktivitas_cs' => 'active',
        'id_modul' => $this->userdata->id_modul,
        'nama_modul' => $this->userdata->nama_modul,
        'data_cs' => $this->Sales_model->get_data_sales(),
        'dari'=>$dari,
        'sampai'=>$sampai,
        "id_users"=>$id_users,
        'data_aktivitas' => $this->Sales_aktivitas_model->get_data_aktivitas($id_users,$dari,$sampai)
    );
    $this->view->render_leadercs('laporan_cs/laporan_aktivitas', $data);
  }
}