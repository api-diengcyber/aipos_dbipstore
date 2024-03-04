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
        $this->Login_model->is_manager();
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
        'data_order' => $this->Sales_order_model->get_order(array('id_users'=>$id_users,'dari'=>$dari,'sampai'=>$sampai)),
    );
    $this->view->render_manager('laporan_cs/laporan_order', $data);
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
    $this->view->render_manager('laporan_cs/laporan_aktivitas', $data);
  }
}