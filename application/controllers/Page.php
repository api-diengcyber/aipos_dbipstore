<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends AI_Controller {

	public function __construct()
	{
    parent::__construct();
  }

  public function get_s($i = 1, &$pa = '', $r = false)
  {
    $ctr = $this->uri->segment_array()[$i];
    $row = $this->Admin_model->get_menu($this->userdata->id_toko, $this->userdata->level, $this->uri->segment_array());
    return $row;
  }

  public function cek($i = 1)
  {
    $this->output->enable_profiler(TRUE);
    echo "<pre>";
    print_r ($this->check_controller($this->userdata->level));
    echo "</pre>";
    
  }

	public function index()
	{
    $url = $this->input->get('url', true);
    $controller = str_replace(site_url(), '', $url);
    if (!empty($this->userdata)) {
      $this->check_controller($this->userdata->level, $controller);
    }
    redirect($url);
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */