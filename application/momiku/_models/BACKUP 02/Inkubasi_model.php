<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inkubasi_model extends CI_Model {

	public $table = 'inkubasi';

	function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function json()
	{
		$this->datatables->select('i.id, i.id_toko, i.id_users, i.tgl, i.progress, i.catatan');
		$this->datatables->from('inkubasi i');
		$this->datatables->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko');
		$this->datatables->where('i.id_toko', $this->userdata->id_toko);
		$this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/inkubasi/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/inkubasi/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>'), 'id');
        $this->datatables->group_by('i.id');
        return $this->datatables->generate();
	}

}