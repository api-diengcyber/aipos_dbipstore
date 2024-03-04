<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth', 'indonesian');
	}

	public function get_data()
	{
		$row = $this->db->select('u.*, t.nama_toko, t.versi_aipos, t.id_modul, pm.nama_modul, c.nama AS nama_cabang, c.jenis AS jenis_cabang')
						->from('users u')
						->join('toko t', 'u.id_toko=t.id')
						->join('pil_modul pm', 't.id_modul=pm.id')
						->join('cabang c', 'u.id_cabang=c.id AND u.id_toko=c.id_toko', 'left')
						->where('u.id', $this->ion_auth->get_user_id())
						->get()->row();
		return $row;
	}

	public function check()
	{
		if (empty($this->get_data())) {
			redirect(site_url('auth/login'));
		}
	}

	public function check_reverse()
	{
		$row = $this->get_data();
		if ($row) {
			if ($row->level == "1") {	// admin
				redirect(site_url('admin'));
			} else if ($row->level == "2") { // produksi
				redirect(site_url('produksi'));
			} else if ($row->level == "3") { // outlet
				redirect(site_url('outlet'));
			} else {
				session_destroy();
				$this->session->set_flashdata('message', 'Level Not Found!');
				redirect(site_url('auth/login'));
			}
		}
	}

	public function is_admin()
	{
		$row = $this->get_data();
		if ($row) {
			if ($row->level == "1") {	// admin
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_produksi()
	{
		$row = $this->get_data();
		if ($row) {
			if ($row->level == "2" || $row->level == "1") {	// produksi
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_outlet()
	{
		$row = $this->get_data();
		if ($row) {
			if ($row->level == "3" || $row->level == "1") {	// outlet
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */