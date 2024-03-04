<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
    $this->models('Sales_order_model');
  }

	public function index()
	{
    $data = array(
      'active_home' => 'active',
    );
    $id_cabang = $this->userdata->id_toko;
    $data['is_pusat'] = false;

    //laporan_order
    $data['grafik_order_hari_ini'] = $this->Sales_order_model->grafik_order_hari_ini();
    $data['data_order_hari_ini'] = $this->Sales_order_model->data_order_hari_ini();
    $data['grafik_order_per_hari'] = $this->Sales_order_model->grafik_order_per_hari();
    $data['data_order_per_hari'] = $this->Sales_order_model->data_order_per_hari();
    $data['grafik_order_per_bulan'] = $this->Sales_order_model->grafik_order_per_bulan();
    $data['data_order_per_bulan'] = $this->Sales_order_model->data_order_per_bulan();
    $data['pil_media'] = $this->db->get('pil_media')->result();
    //laporan aktivitas
    // $this->load->model('Sales_aktivitas_model');
    // $data['data_aktivitas'] = $this->Sales_aktivitas_model->get_data_aktivitas();

    $this->view('home', $data);
  }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */