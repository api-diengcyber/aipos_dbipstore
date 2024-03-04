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
        $this->Login_model->is_admin();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index($page = '')
	{
        $status = $this->input->post('status');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
        // data order
        $params = array('status'=>$status,'dari'=>$dari,'sampai'=>$sampai);
        $pagination = array('page'=>($page)?$page:1,'perpage'=>20);
        $data_order = $this->Sales_order_model->get_order($params,$pagination);
        
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/order_sales/index/');
        $config['total_rows'] =  count($this->Sales_order_model->get_order($params));
        $config['use_page_numbers'] = true;
        $config['per_page'] = $pagination['perpage'];
        
        $this->pagination->initialize($config);
        //
        
	 	$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' =>$data_order,
            'status'=>$status,
            'exp'=> $this->db->get('expedisi')->result(),
            'dari'=>$dari,
            'pagination'=>$this->pagination->create_links(),
            'sampai'=>$sampai,
        );
        $this->view->render_admin('order_sales/order_sales_list', $data);
	}
	
	public function update_expedisi($id_order,$id_expedisi)
	{
	    $this->db->where('id',$id_order);
	    $this->db->update('laporan_order',array('id_expedisi'=>$id_expedisi));
	    redirect(base_url('admin/order_sales'),'refresh');
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
        $this->load->view('admin/order_sales/packing', $data);
    }

    public function multi_verifikasi()
    {
        $no_resi = $this->input->post('no_resi');
        $exp = explode(PHP_EOL,$no_resi);    
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' =>  $this->Sales_order_model->get_res_order_by_resi($exp),
        );
       
        $this->view->render_admin('order_sales/multi_verifikasi', $data);
    }

    public function diterima()
	{
        $status = 3; // diterima
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
	 	$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales_diterima' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' => $this->Sales_order_model->get_diterima($dari,$sampai),
            'status'=>$status,
            'dari'=>$dari,
            'sampai'=>$sampai,
        );
        $this->view->render_admin('order_sales/order_sales_list_diterima', $data);
	}

    public function verifikasi_pembayaran($id_order)
    {
        $this->Sales_order_model->verifikasi_pembayaran($id_order);
        redirect(site_url('admin/order_sales'),'refresh');
    }

}

/* End of file Order_sales.php */
/* Location: ./application/controllers/admin/Order_sales.php */