<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->Login_model->check_reverse();
	}

	public function index()
	{
		$this->Login_model->check();
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */