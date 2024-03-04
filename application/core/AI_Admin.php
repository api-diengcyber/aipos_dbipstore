<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AI_Admin extends AI_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->is_admin();
    $this->models('Pil_menu_model');
    // $this->check_controller_is_blocked($this->userdata->id_toko, $this->userdata->level);
  }

  public function view($p, $d)
  {
    // $this->check_controller($this->userdata->level);
    $this->rview($p, $d);
  }

}