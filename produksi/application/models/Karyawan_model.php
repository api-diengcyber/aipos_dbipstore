<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

	public $table = 'users';

	function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

	function json()
	{
		$this->datatables->select('u.id, u.id_users, u.id_toko, u.ip_address, u.username, u.password, u.salt, u.email, u.activation_code, u.forgotten_password_code, u.forgotten_password_time, u.remember_code, u.created_on, u.last_login, u.active, u.first_name, u.last_name, u.company, u.alamat, u.phone, u.level, u.foto');
		$this->datatables->from('users u');
		$this->datatables->where('u.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
		}
        $this->datatables->add_column('action', anchor(site_url('produksi/karyawan/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/karyawan/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/karyawan/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        return $this->datatables->generate();
	}

}

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */