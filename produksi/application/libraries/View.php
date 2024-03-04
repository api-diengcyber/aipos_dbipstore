<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View {

    public function __construct()
    {
    	$this->ci =& get_instance();
    }

    public function render_outlet($page, $data = array())
    {
        $this->ci->load->view('outlet/header', $data, FALSE);
        $this->ci->load->view('outlet/sidebar');
        $this->ci->load->view('outlet/'.$page);
        $this->ci->load->view('outlet/footer');
    }

    public function render_produksi($page, $data = array())
    {
        $this->ci->load->view('produksi/header', $data, FALSE);
        $this->ci->load->view('produksi/sidebar');
        $this->ci->load->view('produksi/'.$page);
        $this->ci->load->view('produksi/footer');
    }

    public function render_admin($page, $data = array())
    {
        $this->ci->load->view('admin/header', $data, FALSE);
        // $this->ci->load->view('admin/sidebar');
        $this->ci->load->view('admin/'.$page);
        $this->ci->load->view('admin/footer');
    }

}

/* End of file View.php */
/* Location: ./application/models/View.php */