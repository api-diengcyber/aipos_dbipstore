<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View {

    public function __construct()
    {
    	$this->ci =& get_instance();
    }

    public function top($fil = 'admin', $data = array())
    {
        $this->ci->load->view($fil.'/header', $data, FALSE);
        if (!empty($data['nama_user']) && $data['nama_user']=='admin') {
            $this->ci->load->view($fil.'/sidebar');
        } else if (!empty($data['nama_user']) && $data['nama_user']=='verifikator') {
            $this->ci->load->view($fil.'/sidebar_v');
        } else if (!empty($data['nama_user']) && $data['nama_user']=='akuntansi') {
            $this->ci->load->view($fil.'/sidebar_a');
        } else {
            $this->ci->load->view($fil.'/sidebar');
        }
    }

    public function bottom($fil = 'admin')
    {
        $this->ci->load->view($fil.'/footer');
    }

    public function render_outlet($page, $data = array())
    {
        $this->top('outlet', $data);
        $this->ci->load->view('outlet/'.$page);
        $this->bottom('outlet');
    }

    public function render_sales($page, $data = array())
    {
        $this->top('sales', $data);
        $this->ci->load->view('sales/'.$page);
        $this->bottom('sales');
    }

    public function render_admin($page, $data = array())
    {
        $this->top('admin', $data);
        $this->ci->load->view('admin/'.$page);
        $this->bottom('admin');
    }

    public function render_manager($page, $data = array())
    {
        $this->top('manager', $data);
        $this->ci->load->view('manager/'.$page);
        $this->bottom('manager');
    }

    public function render_direktur($page, $data = array())
    {
        $this->top('direktur', $data);
        $this->ci->load->view('direktur/'.$page);
        $this->bottom('direktur');
    }

    public function render_gudang($page, $data = array())
    {
        $this->top('gudang', $data);
        $this->ci->load->view('gudang/'.$page);
        $this->bottom('gudang');
    }

    public function render_packing($page, $data = array())
    {
        $this->top('packing', $data);
        $this->ci->load->view('packing/'.$page);
        $this->bottom('packing');
    }

    public function render_leadercs($page, $data = array())
    {
        $this->top('leadercs', $data);
        $this->ci->load->view('leadercs/'.$page);
        $this->bottom('leadercs');
    }

    public function render_advertiser($page, $data = array())
    {
        $this->top('advertiser', $data);
        $this->ci->load->view('advertiser/'.$page);
        $this->bottom('advertiser');
    }

    public function render_owner($page, $data = array())
    {
        $this->top('owner', $data);
        $this->ci->load->view('owner/'.$page);
        $this->bottom('owner');
    }

}

/* End of file View.php */
/* Location: ./application/models/View.php */