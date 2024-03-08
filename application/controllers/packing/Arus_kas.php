<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arus_kas extends AI_Admin
{
  function __construct()
  {
    parent::__construct();
    $this->models('Arus_kas_model');
	$this->load->library('datatables');
	$this->load->library('form_validation');
  }

	public function index()
	{
		echo "lll";
		$data = $this->Arus_kas_model->json($this->userdata->id_toko);
		// var_dump($data);
		$this->rview('arus_kas/arus_kas_masuk_list', $data);
	}

	public function masuk()
	{
		$data_login = $this->data_login;
		// $active = array();
		$data = array(
			'active_arus_kas_masuk' => 'active'
		);
		$this->rview('arus_kas/arus_kas_masuk_list', $data);
	}

	public function create($kas = '')
	{
		
		if ($kas == 'masuk') {
			$id_kas = '1';
			$j_kas = 'Tambah Kas Masuk';
			$nama_kas = 'Nama Pendapatan';
			$data= array('active_kas' => 'active');
			$data_akun = $this->db->select('*')
									->from('akun_sederhana')
									->where('id_toko', $this->userdata->id_toko)
									->where('jenis', '1')
									->get()->result();
								
		} else if ($kas == 'keluar') {
			$id_kas = '2';
			$j_kas = 'Tambah Kas Keluar';
			$nama_kas = 'Nama Pengeluaran';
			$active = array('active_arus_kas_keluar' => 'active');
			$data_akun = $this->db->select('*')
									->from('akun_sederhana')
									->where('id_toko', $this->data_login['id_toko'])
									->where('jenis', '2')
									->get()->result();
		} else {
			redirect(site_url());
		}
		$data = array(
			'active_arus_kas_masuk' => 'active',
			'j' => $j_kas,
			'nama_kas' => $nama_kas,
			'action' => site_url('admin/arus_kas/create_action'),
			'id' => set_value('id'),
			'tgl' => set_value('tgl', date('d-m-Y')),
			'id_kas' => set_value('id_kas', $id_kas),
			'id_akun' => set_value('id_akun'),
			'nominal' => set_value('nominal'),
			'ket' => set_value('ket'),
			'data_akun' => $data_akun,
		);
		$this->rview('arus_kas/arus_kas_form', $data);
	}
	public function json_masuk()
	{
		header('Content-type: application/json');
		if ($this->data_login['level']!='1') {
			echo $this->Arus_kas_model->json_masuk($this->data_login['id_toko'], $this->data_login['id_user']);
		} else {
			echo $this->Arus_kas_model->json_masuk($this->data_login['id_toko']);
		}
	}


	public function create_action() 
    {
		
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
			
        } else {
			
        	$kas = $this->input->post('id_kas', true);
            $row_last_arus_kas = $this->db->select('id_arus_kas')
                                          ->from('arus_kas')
                                          ->where('id_toko', $this->userdata->id_toko)
                                          ->order_by('id_arus_kas', 'desc')
                                          ->get()->row();
			
            $id_arus_kas = 1;
            if ($row_last_arus_kas) {
                $id_arus_kas = $row_last_arus_kas->id_arus_kas + 1;
            }
			
            $data = array(
                'id_arus_kas' => $id_arus_kas,
                'id_toko' => $this->userdata->id_toko,
                'tgl' => $this->input->post('tgl', true),
                'id_kas' => $this->input->post('id_kas', true),
                'id_akun' => $this->input->post('id_akun', true),
                'nominal' => str_replace('.','',$this->input->post('nominal', true)),
                'ket' => $this->input->post('ket', true),
            );
			if ($this->userdata->level!='1') {
				    $data['id_users'] = $this->userdata->id_user;
				}
				
            $this->Arus_kas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            if ($kas == '1') {
	            redirect(site_url('admin/arus_kas/masuk'));
            } else {
	            redirect(site_url('admin/arus_kas/keluar'));
            }
        }
    }


	public function arus(){
	    
	    	$awal_periode = date('d-m-Y');
		$akhir_periode = date('d-m-Y');
		
		if(!empty($this->input->post('awal_periode'))){
			$awal_periode = $this->input->post('awal_periode');
// 			$this->session->set_userdata(array('awal_periode' => $awal_periode));
		}
	
	
		if(!empty($this->input->post('akhir_periode'))){
			$akhir_periode = $this->input->post('akhir_periode');
		}
	    
		$arus_kas = $this->db->select('as.*, a.akun')
					->from('arus_kas as')
					->join('akun a','a.id=as.id_akun')
					->where('as.id_toko',$this->userdata->id_toko)
				    ->where("as.tgl BETWEEN '".$awal_periode."' AND '".$akhir_periode."'")
					->get()
					->result();
		$penjualan = $this->db->select('o.*,SUM(o.laba)as total')
		            ->from('orders o')
		            ->where('o.id_toko',$this->userdata->id_toko)
		          //  ->group_by('o.tgl_order')
		            ->where("o.tgl_order BETWEEN '".$awal_periode."' AND '".$akhir_periode."'")
		            ->get()
		            ->result();
		 $beban =  $this->db->select('b.*')
		            ->from('beban b')
		          //  ->join('user',$this->userdata->id_toko)
		            ->where('b.id_toko',$this->userdata->id_toko)
		          //  ->group_by('o.tgl_order')
		            ->get()
		            ->result();
		
		$data = [
			'kas' => $arus_kas,
			'penjualan' => $penjualan,
			'beban' => $beban,
			'tgl_awal' => 	$awal_periode,
			'tgl_akhir' => $akhir_periode,
			'active_arus_kas' => 'active',
		];
// 		var_dump($data);
		$this->rview('arus_kas/arus_kas_list', $data);
	}
	public function keluar(){
		$data = [
			'active_arus_kas_keluar' => 'active',
		];
		$this->rview('arus_kas/arus_kas_list', $data);
	}

	public function _rules()
    {
    	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
    	$this->form_validation->set_rules('id_kas', 'id kas', 'trim|required');
    	$this->form_validation->set_rules('id_akun', 'id akun', 'trim|required');
    	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
    	$this->form_validation->set_rules('ket', 'ket', 'trim');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}