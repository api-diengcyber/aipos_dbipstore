<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends AI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->check_login_reverse();
	}

	public function index()
	{
		// $this->check_login();
		if (empty($this->userdata)) {
			redirect(site_url('landing'));
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */