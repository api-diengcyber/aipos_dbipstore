<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_sales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Sales_order_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_gudang();
        $this->userdata = $this->Login_model->get_data();
    }

	public function index()
	{
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_verifikasi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'message' => $this->session->flashdata('message'),
            // 'data_order' => $this->Sales_order_model->get_order(array('status_in'=>[5,6],'dari'=>$dari,'sampai'=>$sampai)),
            'data_order' => $this->_get_retur_temp(),
            'nama_modul' => $this->userdata->nama_modul,
        );
        
        $this->view->render_gudang('order_sales/verifikasi2',$data);
    }

    function _get_retur_temp(){
      $this->db->select('rjgt.*,u.first_name as nama_sales,rjgdt1.nama_produk as produk_1,rjgdt1.jumlah as jumlah_1,rjgdt2.nama_produk as produk_2,rjgdt2.jumlah as jumlah_2');
      $this->db->from('retur_jual_gudang_temp rjgt');
      $this->db->join('(SELECT pr.nama_produk,rjgdt1.jumlah,rjgdt1.id_retur,rjgdt1.id_produk FROM retur_jual_gudang_detail_temp rjgdt1 JOIN produk_retail pr ON pr.id_produk_2 = rjgdt1.id_produk) rjgdt1', 'rjgt.id = rjgdt1.id_retur AND rjgdt1.id_produk = 1','left');
      $this->db->join('(SELECT pr.nama_produk,rjgdt2.jumlah,rjgdt2.id_retur,rjgdt2.id_produk FROM retur_jual_gudang_detail_temp rjgdt2 JOIN produk_retail pr ON pr.id_produk_2 = rjgdt2.id_produk) rjgdt2', 'rjgt.id = rjgdt2.id_retur AND rjgdt2.id_produk = 2','left');
      $this->db->join('users u', 'u.id_users = rjgt.id_sales','left');
      return $this->db->get()->result();
    }

    public function verifikasi_diterima($id_faktur)
    {
      $id_retur = 1;
      $row_last_retur = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_retur', 'desc')->get('retur_jual')->row();
      if ($row_last_retur) {
          $id_retur = $row_last_retur->id_retur+1;
      }

      $row_retur_temp = $this->db->where('id', $id_faktur)->get('retur_jual_gudang_temp')->row();
      
      $data_insert = array(
        'id_retur' => $id_retur,
        'id_toko' => $this->userdata->id_toko,
        'id_users' => $this->userdata->id_users,
        'tgl' => $row_retur_temp->tgl,
        'no_retur' => $this->get_retur(),
        'no_faktur' => $row_retur_temp->no_faktur,
        'total' => $row_retur_temp->total,
      );
      $this->db->insert('retur_jual', $data_insert);

      $id_retur_jual = $this->db->insert_id();


      $res_detail_temp = $this->db->where('id_retur', $id_faktur)->get('retur_jual_gudang_detail_temp')->result();


      $array_detail = [];
      foreach($res_detail_temp as $detail){
        $array_detail[] = array(
          'id_retur' => $id_retur_jual,
          'id_toko' => $this->userdata->id_toko,
          'id_users' => $this->userdata->id_users,
          'id_produk' => $detail->id_produk,
          'id_orders_detail' => $detail->id_orders_detail,
          'jumlah' => $detail->jumlah,
          'harga_satuan' => $detail->harga_satuan,
          'harga_jual' => $detail->harga_jual,
          'subtotal' => $detail->subtotal
       );
      }

      $detail = $this->db->insert_batch('retur_jual_detail', $array_detail);

      $this->session->set_flashdata('message', 'Barang diterima');
      $this->db->where('id', $row_retur_temp->id_orders);
      $updated = $this->db->update('laporan_order', array('status'=>6));
      if($updated){
        $this->db->where('id_orders_2', $row_retur_temp->id_orders);
        $this->db->delete('orders_stok');

        $this->db->where('id', $id_faktur);
        $this->db->delete('retur_jual_gudang_temp');

        $this->db->where('id_retur', $id_faktur);
        $this->db->delete('retur_jual_gudang_detail_temp');        
      }
      redirect(site_url('gudang/order_sales'),'refresh');
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

}