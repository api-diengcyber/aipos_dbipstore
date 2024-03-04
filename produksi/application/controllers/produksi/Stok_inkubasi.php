<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok_inkubasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
		$this->load->model('Stok_inkubasi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_stok_inkubasi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('stok_inkubasi/stok_inkubasi_list', $data);
	}

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Stok_inkubasi_model->json();
    }

}

/* End of file Stok_inkubasi.php */
/* Location: ./application/controllers/Stok_inkubasi.php */