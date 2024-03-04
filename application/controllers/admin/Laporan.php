<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data = array(
            'active_lap2' => 'active',
        );
        $this->view('laporan_baru/laporan', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */