<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class AI_Admin extends AI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // $this->is_admin();
    $this->models('Pil_menu_model');
    // $this->check_controller_is_blocked($this->userdata->id_toko, $this->userdata->level);
    if (!$this->session->userdata) {
      redirect('auth/logout'); // Mengarahkan ke controller Auth jika sesi tidak aktif
    }
    if (empty($this->userdata)) {
      redirect(site_url('auth/logout'));
    }
  }

  public function view($p, $d)
  {
    // $this->check_controller($this->userdata->level);
    $this->rview($p, $d);
  }

}