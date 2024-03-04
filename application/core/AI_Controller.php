<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AI_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('view');
		$this->userdata = $this->Admin_model->userdata();
		if (!empty($this->userdata)) {
			$this->Pengaturan_transaksi_model->id_toko = $this->userdata->id_toko;
			$this->Pengaturan_transaksi_model->id_users = $this->userdata->id_users;
		}
	}

	public function check_login()
	{
		if (empty($this->userdata)) {
			redirect(site_url('auth/login'));
		}
	}

	public function check_login_reverse()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "1") {	// admin
				redirect(site_url('admin'));
			} else if ($row->level == "2") { // sales
				redirect(site_url('sales'));
			} else if ($row->level == "3") { // outlet
				redirect(site_url('outlet'));
			} else if ($row->level == "4") { // direktur
				redirect(site_url('direktur'));
			} else if ($row->level == "5") { // manager
				redirect(site_url('manager'));
			} else if ($row->level == "7") { // gudang
				redirect(site_url('gudang'));
			} else if ($row->level == "8") { // packing
				redirect(site_url('packing'));
			} else if ($row->level == "9") { // leader cs
				redirect(site_url('leadercs'));
			} else if ($row->level == "10") { // advertiser
				redirect(site_url('advertiser'));
			} else if ($row->level == "11") { // owner
				redirect(site_url('owner'));
			} else {
				session_destroy();
				$this->session->set_flashdata('message', 'Level Not Found!');
				redirect(site_url('auth/login'));
			}
		}
	}

	public function not_allowed_controller()
	{
		// echo "Not Allowed";
		show_404();
		die();
		exit();
	}

	public function check_controller($level, $controller = '')
	{
		if (!empty($this->userdata)) {
			$check = $this->Admin_model->check_allowed_controller($this->userdata->id_toko, $level, $controller);
			if ($check == 'blocked') {
				$this->not_allowed_controller();
			}
		} else {
			$this->not_allowed_controller();
		}
	}

	// jika menu benar benar terblock (ada session tapi false)
	public function check_controller_is_blocked($id_toko, $level)
	{
		$controller = $this->Admin_model->get_url_c();
		$sess_name = $this->Admin_model->get_sess_name($id_toko, $level, $controller);
		$sess = $this->session->userdata($sess_name);
		if (!empty($sess) && $sess == 'blocked') {
			$this->not_allowed_controller();
		}
	}

	public function rview($p, $d = array())
	{
		if (!empty($this->userdata)) {
			// datas
			$d['id_toko'] = $this->userdata->id_toko;
			$d['id_users'] = $this->userdata->id_users;
			$d['nama_toko'] = $this->userdata->nama_toko;
			$d['nama_user'] = $this->userdata->email;
			$d['id_modul'] = $this->userdata->id_modul;
			$d['nama_modul'] = $this->userdata->nama_modul;
			// pages
			$l = '/';
			if ($this->userdata->level == "1") {	// admin
				$l = 'admin';
			} else if ($this->userdata->level == "2") { // sales
				$l = 'sales';
			} else if ($this->userdata->level == "3") { // outlet
				$l = 'outlet';
			} else if ($this->userdata->level == "4") { // direktur
				$l = 'direktur';
			} else if ($this->userdata->level == "5") { // manager
				$l = 'manager';
			} else if ($this->userdata->level == "7") { // gudang
				$l = 'gudang';
			} else if ($this->userdata->level == "8") { // packing
				$l = 'packing';
			} else if ($this->userdata->level == "9") { // leader cs
				$l = 'leadercs';
			} else if ($this->userdata->level == "10") { // advertiser
				$l = 'advertiser';
			} else if ($this->userdata->level == "11") { // owner
				$l = 'owner';
			}
			$this->view->top($l, $d);
			if ($p == 'home') {
				$this->load->view($l . '/' . $p);
			} else {
				$this->load->view('admin/' . $p);
			}
			$this->view->bottom($l);
		}
	}

	public function is_admin()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "1") {	// admin
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_sales()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "2") {	// sales
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_outlet()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "3") {	// outlet
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_direktur()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "4") {	// direktur
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_manager()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "5") {	// manager
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	//level 6 sales

	public function is_gudang()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "7") {	// gudang
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_packing()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "8") {	// packing
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_leadercs()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "9") {	// leader cs
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_advertiser()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "10") {	// advertiser
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function is_owner()
	{
		$row = $this->userdata;
		if ($row) {
			if ($row->level == "11") {	// owner
			} else {
				redirect(site_url('auth/login'));
			}
		} else {
			redirect(site_url('auth/login'));
		}
	}

	public function models($params = "")
	{
		$exp = explode(",", $params);
		foreach ($exp as $key => $value) {
			$n = trim($value);
			$expn = explode(":", $n);
			if (!empty($expn[1])) {
				$this->load->model($expn[0], $expn[1]);
			} else {
				$this->load->model($expn[0]);
			}
		}
	}

	public function libraries($params = "")
	{
		$exp = explode(",", $params);
		foreach ($exp as $key => $value) {
			$this->load->library(trim($value));
		}
	}
}
