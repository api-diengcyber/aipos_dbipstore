<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$submit = $this->input->post('submit', true);
		$print = false;
		if ($submit==2) {
			$print = true;
		}
		if (!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))) {
			$awal_periode = $this->input->post('awal_periode');
			$akhir_periode = $this->input->post('akhir_periode');
			$array = array(
				'awal_periode_jurnal' => $awal_periode,
				'akhir_periode_jurnal' => $akhir_periode,
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->session->userdata('awal_periode_jurnal')) && !empty($this->session->userdata('akhir_periode_jurnal'))) {
			$awal_periode = $this->session->userdata('awal_periode_jurnal');
			$akhir_periode = $this->session->userdata('akhir_periode_jurnal');
		} else {
			$awal_periode = date('Y-m-d');
			$akhir_periode = date('Y-m-d');
		}
		$data = array(
			'active_jurnal_list' => 'active',
		);
		$data['print'] = $print;
		$data['awal_periode'] = $awal_periode;
		$data['akhir_periode'] = $akhir_periode;
		$data['data_jurnal'] = $this->db->select('j.*, a.akun')
													->from('jurnal j')
													->join('users u', 'j.id_users=u.id_users AND j.id_toko=u.id_toko')
													->join('akun a', 'j.id_akun=a.id')
													->where('j.id_toko', $this->userdata->id_toko)
													->where('u.id_cabang', $this->userdata->id_cabang)
													->where('DATE(CONCAT(SUBSTRING(j.tgl,7,4),"-",SUBSTRING(j.tgl,4,2),"-",SUBSTRING(j.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
													->order_by('DATE(CONCAT(SUBSTRING(j.tgl,7,4),"-",SUBSTRING(j.tgl,4,2),"-",SUBSTRING(j.tgl,1,2))) ASC')
													->order_by('j.kode', 'asc')
													->order_by('j.debet', 'desc')
													->order_by('a.akun', 'asc')
													->group_by('j.id')
													->get()->result();
		if ($print!=true) {
	        $this->view('jurnal2/jurnal_list', $data);
		} else {
			$this->load->view('admin/jurnal2/jurnal_list', $data, FALSE);
		}
	}

	public function create()
	{
		$data = array(
			'active_jurnal_create' => 'active',
			'action' => site_url('admin/jurnal/create_action'),
			'tgl' => set_value('tgl', date('d-m-Y')),
			'kode' => set_value('kode'),
			'keterangan' => set_value('keterangan'),
			'data_akun' => $this->db->order_by('kode', 'asc')->get('akun')->result(),
			'data_manual' => $this->db->select('*')
									->from('jurnal_manual')
									->get()->result(),
		);
        $this->view('jurnal2/jurnal_form', $data);
	}

	public function create_action()
	{
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$tgl = $this->input->post('tgl', true);
        	$kode = strtoupper(str_replace(' ','',trim($this->input->post('kode', true))));
        	$keterangan = $this->input->post('keterangan', true);
        	$arr_akun = $this->input->post('akun', true);
        	$arr_debet = $this->input->post('debet', true);
        	$arr_kredit = $this->input->post('kredit', true);
        	$kode_baru = $this->Pengaturan_transaksi_model->generate_kode($kode);
        	$simpan_pola = $this->input->post('simpan_pola', true);
        	if (count($arr_akun) > 0) {
    			$row_jm = $this->db->where('id_toko', $this->userdata->id_toko)->where('kode', $kode)->get('jurnal_manual')->row();
	        	for ($i = 0; $i < count($arr_akun); $i++) {
	        		$id_akun = $arr_akun[$i];
	        		$debet = str_replace('.', '', $arr_debet[$i]);
	        		$kredit = str_replace('.', '', $arr_kredit[$i]);
	        		$data = array(
	        			'id_toko' => $this->userdata->id_toko,
	        			'id_users' => $this->userdata->id_users,
	        			'kode' => $kode_baru,
	        			'tgl' => $tgl,
	        			'id_akun' => $id_akun,
	        			'debet' => $debet,
	        			'kredit' => $kredit,
	        			'keterangan' => $keterangan,
	        		);
	        		$this->db->insert('jurnal', $data);
	        		if ($simpan_pola=="1") {
	        			if (!$row_jm) {
	        				$data_insert = array(
	        					'id_toko' => $this->userdata->id_toko,
	        					'kode' => $kode,
	        					'id_akun' => $id_akun,
	        				);
		        			$this->db->insert('jurnal_manual', $data_insert);
	        			}
	        		}
	        	}
        		$this->session->set_flashdata('message', 'Create Record Success');
        	} else {
        		$this->session->set_flashdata('message', 'Create Record Failed');
        	}
        	redirect(site_url('admin/jurnal/create'));
        }
	}

	public function update($kode = '')
	{
		$result = $this->db->where('REPLACE(kode," ","")=', $kode)->get('jurnal')->result();
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_jurnal_create' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
			'action' => site_url('admin/jurnal/update_action'),
			'tgl' => set_value('tgl', $result[0]->tgl),
			'kode' => set_value('kode', $result[0]->kode),
			'keterangan' => set_value('keterangan', $result[0]->keterangan),
			'data_akun' => $this->db->order_by('kode', 'asc')->get('akun')->result(),
			'data_manual' => $this->db->select('*')
									->from('jurnal_manual')
									->get()->result(),
			'data_jurnal' => $result,
		);
		$this->view('jurnal2/jurnal_form_update', $data);
	}

	public function update_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('kode', true));
		} else {
			$tgl = $this->input->post('tgl', true);
			$kode = strtoupper(str_replace(' ','',trim($this->input->post('kode', true))));
			$keterangan = $this->input->post('keterangan', true);
			$arr_akun = $this->input->post('akun', true);
			$arr_debet = $this->input->post('debet', true);
			$arr_kredit = $this->input->post('kredit', true);

			$this->db->where('kode', $kode);
			$this->db->delete('jurnal');
			
			for ($i = 0; $i < count($arr_akun); $i++) {
				$id_akun = $arr_akun[$i];
				$debet = str_replace('.', '', $arr_debet[$i]);
				$kredit = str_replace('.', '', $arr_kredit[$i]);
				$data = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'tgl' => $tgl,
					'kode' => $kode,
					'id_akun' => $id_akun,
					'debet' => $debet,
					'kredit' => $kredit,
					'keterangan' => $keterangan,
				);
				$this->db->insert('jurnal', $data);
			}

			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('admin/jurnal'));
		}
	}

	private function _rules()
	{
        $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('kode', 'Kode Jurnal', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
    
    public function delete($id) 
    {
        $row = $this->db->where('id_toko', $this->userdata->id_toko)->where('id', $id)->get('jurnal')->row();
        if ($row) {
        	$this->db->where('id', $id);
        	$this->db->delete('jurnal');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/jurnal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jurnal'));
        }
    }

	public function konfirmasi_delete()
	{
		$this->load->model('Ion_auth_model');
		$kode = $this->input->post('kode', true);
		$id = $this->input->post('id', true);
		$password = $this->input->post('password', true);
		// $row_users = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $this->userdata->id_user)->get('users')->row();
		$r = $this->Ion_auth_model->hash_password_db($this->session->userdata('user_id'), $password);
		if ($r) {
			$row = $this->db->where('id', $id)->get('jurnal')->row();
			if ($row) {
				$this->db->where('tgl', $row->tgl);
				$this->db->where('REPLACE(kode," ","")=', $kode);
				$this->db->delete('jurnal');
			}
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('admin/jurnal'));
		} else {
			$this->session->set_flashdata('message', 'Password Incorrect');
			redirect(site_url('admin/jurnal'));
		}
	}

}

/* End of file Jurnal_kas.php */
/* Location: ./application/controllers/Jurnal_kas.php */