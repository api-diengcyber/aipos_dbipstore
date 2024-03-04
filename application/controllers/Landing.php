<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends AI_Controller {

	public function __construct()
	{
        parent::__construct();
    }

    public function index()
    {
        // $this->load->view('landing/landing');
        redirect('auth/login');
    }

}