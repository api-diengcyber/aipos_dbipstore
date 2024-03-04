<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_sales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->model('Sales_order_model');
        $this->load->library('view');
        $this->Login_model->is_outlet();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
        $status = $this->input->post('status');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
	 	$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' => $this->Sales_order_model->get_order('','','',$status,$dari,$sampai),
            'status'=>$status,
            'dari'=>$dari,
            'sampai'=>$sampai,
        );
        $this->view->render_outlet('order_sales/order_sales_list', $data);
	}

    public function packing($id_order)
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' => $this->Sales_order_model->get_order_by_id($id_order),
        );
        $this->load->view('outlet/order_sales/packing', $data);
    }

    public function verifikasi_pembayaran($id_order)
    {
        $this->Sales_order_model->verifikasi_pembayaran($id_order);
        redirect(site_url('outlet/order_sales'),'refresh');
    }

}

/* End of file Order_sales.php */
/* Location: ./application/controllers/outlet/Order_sales.php */