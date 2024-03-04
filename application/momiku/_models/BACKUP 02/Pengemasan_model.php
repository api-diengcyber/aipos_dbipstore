<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengemasan_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	public function json()
	{
		$this->datatables->select('p.id, p.id_toko, p.id_users, p.tgl, p.tgl_produksi, p.progress, p.catatan');
		$this->datatables->from('pengemasan p');
		$this->datatables->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
		$this->datatables->where('p.id_toko', $this->userdata->id_toko);
		$this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/pengemasan/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pengemasan/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id');
        $this->datatables->group_by('p.id');
        return $this->datatables->generate();
	}

}

/* End of file Pengemasan_model.php */
/* Location: ./application/models/Pengemasan_model.php */