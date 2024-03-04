<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_retail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->library(array('ion_auth','form_validation'));
		$this->lang->load('auth');
        $this->load->model('Ion_auth_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_outlet();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_reset' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'action' => site_url('outlet/reset_retail/reset_action'),
			'password' => set_value('password'),
        );
        $this->view->render_outlet('reset/reset', $data);
	}

	public function reset_action()
	{
    	$this->form_validation->set_rules('password', 'password', 'trim|required');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
			$produk = $this->input->post('produk', true);
			$kategori_produk = $this->input->post('kategori_produk', true);
			$satuan_produk = $this->input->post('satuan_produk', true);
			$penjualan = $this->input->post('penjualan', true);
			$pembelian = $this->input->post('pembelian', true);
			$kasir = $this->input->post('kasir', true);
			$password = $this->input->post('password', true);
			$row_user = $this->db->select('id')
								 ->from('users')
								 ->where('id_users', $this->userdata->id_users)
								 ->where('id_toko', $this->userdata->id_toko)
								 ->get()->row();
			$cpassword 	= $this->Ion_auth_model->hash_password_db($row_user->id, $password);
			if($cpassword === true){
				if($produk == '1'){
					$this->deleteReset('produk_retail', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('stok_produk', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('pembelian', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('faktur_retail', $this->userdata->id_toko, $this->userdata->id_cabang);
				}
				if($kategori_produk == '1'){
					$this->deleteReset('kategori_produk', $this->userdata->id_toko, $this->userdata->id_cabang);
				}
				if($satuan_produk == '1'){
					$this->deleteReset('satuan_produk', $this->userdata->id_toko, $this->userdata->id_cabang);
				}
				if($penjualan == '1'){
					$this->deleteReset('orders', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->db->where('id_toko', $this->userdata->id_toko);
					$this->db->where('id_cabang', $this->userdata->id_cabang);
					$this->db->update('produk_retail', array('dibeli'=>0));
					$this->deleteReset('orders_detail', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('orders_temp', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('orders_sales_temp', $this->userdata->id_toko, $this->userdata->id_cabang);
				}
				if ($pembelian == '1') {
					$this->deleteReset('faktur_retail', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('pembelian', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('pembelian_temp', $this->userdata->id_toko, $this->userdata->id_cabang);
					$this->deleteReset('pembelian_temp_update', $this->userdata->id_toko, $this->userdata->id_cabang);
				}
				if($kasir == '1'){
					$this->db->where('id_toko', $this->userdata->id_toko);
					$this->db->where('id_cabang', $this->userdata->id_cabang);
					$this->db->where('level', '2');
					$this->db->delete('users');
				}
	            $this->session->set_flashdata('message', '<div class="alert alert-info">Reset Data success</div>');
				redirect(site_url('outlet/reset_retail/'));
			} else {
	            $this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong Password</div>');
				redirect(site_url('outlet/reset_retail/'));
			}
        }
	}

	private function deleteReset($table_name, $id_toko, $id_cabang)
	{
		$this->db->query('DELETE t1 FROM '.$table_name.' t1 INNER JOIN users u ON t1.id_users=u.id_users AND t1.id_toko=u.id_toko WHERE t1.id_toko="'.$id_toko.'" AND u.id_cabang="'.$id_cabang.'"');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */