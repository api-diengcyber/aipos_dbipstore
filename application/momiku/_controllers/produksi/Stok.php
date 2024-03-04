<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Stok_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}
    
    public function json_bahan() {
        header('Content-Type: application/json');
        echo $this->Stok_model->json(1);
    }
    
    public function json_produksi() {
        header('Content-Type: application/json');
        echo $this->Stok_model->json(0);
    }

	public function bahan()
	{
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_stok_bahan' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
		);
		$this->view->render_produksi('stok/bahan', $data);
	}

	public function produksi()
	{
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_stok_produksi' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
		);
		$this->view->render_produksi('stok/produksi', $data);
	}

}

/* End of file Stok.php */
/* Location: ./application/controllers/Stok.php */