<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arus_kas extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->model('Akun_retail_model');
		$this->lang->load('auth');
		$this->load->model('Tampilan_retail_model');
		$this->load->model('Arus_kas_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->data_login = $this->Tampilan_retail_model->cek_login();
		if($this->data_login['level']!='1'){
			redirect(site_url());
		}
	}

	public function json_periode($tgl_awal, $tgl_akhir, $id_users = '')
	{
		header('Content-type: application/json');
		$exta = explode('-', $tgl_awal);
		$hta = $exta[0];
		$bta = (!empty($exta[1]) ? $exta[1] : '');
		$tta = (!empty($exta[2]) ? $exta[2] : '');
		$sta = $tta.'-'.$bta.'-'.$hta;
		$exte = explode('-', $tgl_akhir);
		$hte = $exte[0];
		$bte = (!empty($exte[1]) ? $exte[1] : '');
		$tte = (!empty($exte[2]) ? $exte[2] : '');
		$ste = $tte.'-'.$bte.'-'.$hte;
		if ($this->data_login['level']!='1') {
			$id_users = $this->data_login['id_user'];
		}
		echo $this->Arus_kas_model->json_periode($this->data_login['id_toko'], $sta, $ste, $id_users);
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

	public function json_keluar()
	{
		header('Content-type: application/json');
		if ($this->data_login['level']!='1') {
			echo $this->Arus_kas_model->json_keluar($this->data_login['id_toko'], $this->data_login['id_user']);
		} else {
			echo $this->Arus_kas_model->json_keluar($this->data_login['id_toko']);
		}
	}

	public function index()
	{
		// $data_login = $this->data_login;
		// $active = array('active_lap_arus_kas' => 'active');
		// $tgl_awal = date('01-m-Y');
		// $tgl_akhir = date('t-m-Y');
		// if (!empty($this->input->post('tgl_awal', true))) {
		// 	$tgl_awal = $this->input->post('tgl_awal', true);
		// }
		// if (!empty($this->input->post('tgl_akhir', true))) {
		// 	$tgl_akhir = $this->input->post('tgl_akhir', true);
		// }
		// $id_users = $this->input->post('id_users', true);
		// $res_users = $this->db->where('level != 1')->where('id_toko', $data_login['id_toko'])->get('users')->result();
		// $exawal_per = explode("-", $tgl_awal);
		// $h_awal_per = $exawal_per[0];
		// $b_awal_per = $exawal_per[1];
		// $t_awal_per = $exawal_per[2];
		// $s_awal_periode = $t_awal_per."-".$b_awal_per."-".$h_awal_per;
		// $exakhir_per = explode("-", $tgl_akhir);
		// $h_akhir_per = $exakhir_per[0];
		// $b_akhir_per = $exakhir_per[1];
		// $t_akhir_per = $exakhir_per[2];
		// $s_akhir_periode = $t_akhir_per."-".$b_akhir_per."-".$h_akhir_per;

		// $content = $this->Arus_kas_model->get_by_between_date_penjualan($data_login['id_toko'], $s_awal_periode, $s_akhir_periode);
		// $content2 = $this->Arus_kas_model->get_all_by_id_toko($data_login['id_toko'],$s_awal_periode,$s_akhir_periode);
		
		// $data = array(
		// 	'id_toko' => $data_login['id_toko'],
		// 	'content' => $content,
		// 	'content2' => $content2,
		// 	'tgl_awal' => $tgl_awal,
		// 	'tgl_akhir' => $tgl_akhir,
		// 	'level' => $data_login['level'],
		// 	'id_users' => $id_users,
		// 	'data_user' => $res_users,
		// );
		// $this->Tampilan_retail_model->tampilan('admin', $active, 'retail/arus_kas/arus_kas_list', $data);
	}

	public function masuk()
	{
		$data_login = $this->data_login;
		$active = array('active_lap_arus_kas_masuk' => 'active');
		$data = array();
		$this->Tampilan_retail_model->tampilan('admin', $active, 'retail/arus_kas/arus_kas_masuk_list', $data);
	}

	public function keluar()
	{
		$data_login = $this->data_login;
		$active = array('active_lap_arus_kas_keluar' => 'active');
		$data = array();
		$this->Tampilan_retail_model->tampilan('admin', $active, 'retail/arus_kas/arus_kas_keluar_list', $data);
	}

    public function read($id) 
    {
			$row = $this->Arus_kas_model->get_by_id($id);
			if ($row) {
				if ($row->id_kas == '1') {
					$active = array('active_lap_arus_kas_masuk' => 'active');
				} else {
					$active = array('active_lap_arus_kas_keluar' => 'active');
				}
				$row_akun = $this->db->where('id', $row->id_akun)->get('akun_sederhana')->row();
				$data = array(
					'id' => $row->id,
					'tgl' => $row->tgl,
					'id_kas' => $row->id_kas,
					'id_akun' => $row->id_akun,
					'nominal' => $row->nominal,
					'ket' => $row->ket,
					'nm_akun' => $row_akun->nama_akun,
				);
				$this->Tampilan_retail_model->tampilan('admin', $active, 'retail/arus_kas/arus_kas_read', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('arus_kas/masuk'));
			}
    }

	public function create($kas = '')
	{
		if ($kas == 'masuk') {
			$id_kas = '1';
			$j_kas = 'Tambah Kas Masuk';
			$nama_kas = 'Nama Pendapatan';
			$active = array('active_arus_kas_masuk' => 'active');
			$data_akun = $this->db->select('*')
									->from('akun_sederhana')
									->where('id_toko', $this->data_login['id_toko'])
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
			'j' => $j_kas,
			'nama_kas' => $nama_kas,
			'action' => site_url('arus_kas/create_action'),
			'id' => set_value('id'),
			'tgl' => set_value('tgl', date('d-m-Y')),
			'id_kas' => set_value('id_kas', $id_kas),
			'id_akun' => set_value('id_akun'),
			'nominal' => set_value('nominal'),
			'ket' => set_value('ket'),
			'data_akun' => $data_akun,
		);
		$this->Tampilan_retail_model->tampilan('admin', $active, 'retail/arus_kas/arus_kas_form', $data);
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
                                          ->where('id_toko', $this->data_login['id_toko'])
                                          ->order_by('id_arus_kas', 'desc')
                                          ->get()->row();
            $id_arus_kas = 1;
            if ($row_last_arus_kas) {
                $id_arus_kas = $row_last_arus_kas->id_arus_kas + 1;
            }
            $data = array(
                'id_arus_kas' => $id_arus_kas,
                'id_toko' => $this->data_login['id_toko'],
                'tgl' => $this->input->post('tgl', true),
                'id_kas' => $this->input->post('id_kas', true),
                'id_akun' => $this->input->post('id_akun', true),
                'nominal' => str_replace('.','',$this->input->post('nominal', true)),
                'ket' => $this->input->post('ket', true),
            );
			if ($this->data_login['level']!='1') {
                $data['id_users'] = $this->data_login['id_user'];
			}
            $this->Arus_kas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            if ($kas == '1') {
	            redirect(site_url('arus_kas/masuk'));
            } else {
	            redirect(site_url('arus_kas/keluar'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Arus_kas_model->get_by_id($id);
        if ($row) {
        	if ($row->id_kas == '1') {
        		$j_kas = 'Edit Kas Masuk';
				$nama_kas = 'Nama Pendapatan';
		        $active = array('active_lap_arus_kas_masuk' => 'active');
		        $data_akun = $this->db->select('*')
		        					  ->from('akun_sederhana')
		        					  ->where('id_toko', $this->data_login['id_toko'])
		        					  ->where('jenis', '1')
		        					  ->get()->result();
        	} else {
        		$j_kas = 'Edit Kas Keluar';
				$nama_kas = 'Nama Pengeluaran';
		        $active = array('active_lap_arus_kas_keluar' => 'active');
		        $data_akun = $this->db->select('*')
		        					  ->from('akun_sederhana')
		        					  ->where('id_toko', $this->data_login['id_toko'])
		        					  ->where('jenis', '2')
		        					  ->get()->result();
        	}
            $data = array(
				'j' => $j_kas,
				'nama_kas' => $nama_kas,
                'action' => site_url('arus_kas/update_action'),
				'id' => set_value('id', $row->id_arus_kas),
				'tgl' => set_value('tgl', $row->tgl),
				'id_kas' => set_value('id_kas', $row->id_kas),
				'id_akun' => set_value('id_akun', $row->id_akun),
				'nominal' => set_value('nominal', $row->nominal),
				'ket' => set_value('ket', $row->ket),
				'data_akun' => $data_akun,
        	);
            $this->Tampilan_retail_model->tampilan('admin', $active, 'retail/arus_kas/arus_kas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arus_kas/masuk'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
        	$kas = $this->input->post('id_kas', true);
            $data = array(
                'tgl' => $this->input->post('tgl', true),
                'id_kas' => $this->input->post('id_kas', true),
                'id_akun' => $this->input->post('id_akun', true),
                'nominal' => str_replace('.','',$this->input->post('nominal', true)),
                'ket' => $this->input->post('ket', true),
    	    );
            $this->Arus_kas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            if ($kas == '1') {
	            redirect(site_url('arus_kas/masuk'));
            } else {
	            redirect(site_url('arus_kas/keluar'));
            }
        }
    }
    
    public function delete($id)
    {
        $row = $this->Arus_kas_model->get_by_id($id);
        if ($row) {
            if ($row->id_kas == '1') {
            	$url = site_url('arus_kas/masuk');
            } else {
            	$url = site_url('arus_kas/keluar');
            }
            $this->Arus_kas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect($url);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arus_kas/masuk'));
        }
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

/* End of file Arus_kas.php */
/* Location: ./application/controllers/Arus_kas.php */