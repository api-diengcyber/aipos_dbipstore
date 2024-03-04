<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
		if (!empty($this->input->post('tgl', true))) {
			$tgl = $this->input->post('tgl', true);
			$array = array(
				'tgl' => $tgl
			);
			$this->session->set_userdata($array);
		}
		if (!empty($this->session->userdata('tgl'))) {
			$tgl = $this->session->userdata('tgl');
		} else {
			$tgl = date('d-m-Y');
		}

		$this->db->select('u.*, jk.jam_masuk, jk.jam_pulang, jk.tidak_masuk, jk.status, jk.keterangan');
		$this->db->from('users u');
		$this->db->join('jam_kerja jk', 'u.id_users=jk.id_pegawai AND jk.id_toko=u.id_toko AND jk.tgl="'.$tgl.'"', 'left');
		$this->db->where('u.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('u.level', 4);
		$this->db->order_by('u.first_name', 'asc');
		$this->db->group_by('u.id');
		$data_karyawan = $this->db->get()->result();

        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_presensi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'tgl' => set_value('tgl', $tgl),
            'data_karyawan' => $data_karyawan,
        );
        $this->view->render_produksi('presensi/presensi_list', $data);
	}

	public function submit()
	{
		header('Content-Type: application/json');
		$id_users = $this->input->post('id', true);
		$act = $this->input->post('act', true);
		$tgl = $this->input->post('tgl', true);
		$data = array();
		$data['status'] = 'error';
		$data['act'] = $act;
		$data['id'] = $id_users;
		if ($act=="masuk") {
			$r = $this->masuk($id_users, $tgl);
			$data['status'] = $r->status;
			$data['jam'] = $r->jam;
		} else if ($act=="pulang") {
			$r = $this->pulang($id_users, $tgl);
			$data['status'] = $r->status;
			$data['jam'] = $r->jam;
		} else if ($act=="tidak_masuk") {
			$r = $this->tidak_masuk($id_users, $tgl, $this->input->post('val', true));
			$data['status'] = $r->status;
			$data['idval'] = $r->idval;
		} else if ($act=="keterangan") {
			$r = $this->keterangan($id_users, $tgl, $this->input->post('val', true));
			$data['status'] = $r->status;
		} else if ($act== "jam_pulang") {
			$r = $this->pulang($id_users, $tgl, $this->input->post('val', true));
			$data['status'] = $r->status;
			$data['jam'] = $r->jam;
		} else if ($act== "jam_masuk") {
			$r = $this->edit_jam_masuk($id_users, $tgl, $this->input->post('val', true));
			$data['status'] = $r->status;
			$data['jam'] = $r->jam;
		}
		echo json_encode($data);
	}

	private function masuk($id_users, $tgl)
	{
		$row = $this->db->select('jk.*')
						->from('jam_kerja jk')
						->where('jk.id_toko', $this->userdata->id_toko)
						->where('jk.id_pegawai', $id_users)
						->where('jk.tgl', $tgl)
						->get()->row();
		$jam = date('H:i:s');
		if (!$row) {
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'id_pegawai' => $id_users,
				'tgl' => $tgl,
				'jam_masuk' => $jam,
				'status' => 1,
			);
			$this->db->insert('jam_kerja', $data_insert);
			$status = 'ok';
		} else {
			if (!empty($row->jam_masuk)) {
				$status = 'error';
			} else {
				$status = 'ok';
				$data_update = array(
					'jam_masuk' => $jam,
					'status' => 1,
				);
				$this->db->where('id', $row->id);
				$this->db->update('jam_kerja', $data_update);
			}
		}
		return (Object) array(
			'status' => $status,
			'jam' => $jam,
		);
	}

	private function edit_jam_masuk($id_users, $tgl, $jam = '')
	{
		$row = $this->db->select('jk.*')
						->from('jam_kerja jk')
						->where('jk.id_toko', $this->userdata->id_toko)
						->where('jk.id_pegawai', $id_users)
						->where('jk.tgl', $tgl)
						->get()->row();
		$status = "error";
		if ($row) {
			$status = "ok";
			$data_update = array(
				'jam_masuk' => $jam,
			);
			$this->db->where('id', $row->id);
			$this->db->update('jam_kerja', $data_update);
		}
		return (Object) array(
			'status' => $status,
			'jam' => $jam,
		);
	}

	private function pulang($id_users, $tgl, $jam = '')
	{
		$row = $this->db->select('jk.*')
						->from('jam_kerja jk')
						->where('jk.id_toko', $this->userdata->id_toko)
						->where('jk.id_pegawai', $id_users)
						->where('jk.tgl', $tgl)
						->get()->row();
		if (empty($jam)) {
			$jam = date('H:i:s');
		}
		if ($row) {
			$data_update = array(
				'jam_pulang' => $jam,
				'status' => 2,
			);
			$this->db->where('id', $row->id);
			$this->db->update('jam_kerja', $data_update);
			$status = 'ok';
		} else {
			$status = 'error';
		}
		return (Object) array(
			'status' => $status,
			'jam' => $jam,
		);
	}

	private function tidak_masuk($id_users, $tgl, $id)
	{
		$row = $this->db->select('jk.*')
						->from('jam_kerja jk')
						->where('jk.id_toko', $this->userdata->id_toko)
						->where('jk.id_pegawai', $id_users)
						->where('jk.tgl', $tgl)
						->get()->row();
		if ($row) {
			$st = 0;
			if (empty($id)) {
				if (!empty($row->jam_masuk)) {
					$st = 1;
				}
				if (!empty($row->jam_pulang)) {
					$st = 2;
				}
			}
			$data_update = [
				'tidak_masuk' => $id,
				'status' => $st,
			];
			$this->db->where('id', $row->id);
			$this->db->update('jam_kerja', $data_update);
			$status = 'ok';
		} else {
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'id_pegawai' => $id_users,
				'tgl' => $tgl,
				'tidak_masuk' => $id,
				'status' => 0,
			);
			$this->db->insert('jam_kerja', $data_insert);
			$status = 'ok';
		}
		return (Object) array(
			'status' => $status,
			'idval' => $id,
		);
	}

	private function keterangan($id_users, $tgl, $val)
	{
		$row = $this->db->select('jk.*')
						->from('jam_kerja jk')
						->where('jk.id_toko', $this->userdata->id_toko)
						->where('jk.id_pegawai', $id_users)
						->where('jk.tgl', $tgl)
						->get()->row();
		if ($row) {
			$data_update = array(
				'keterangan' => $val,
			);
			$this->db->where('id', $row->id);
			$this->db->update('jam_kerja', $data_update);
			$status = 'ok';
		} else {
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'id_pegawai' => $id_users,
				'tgl' => $tgl,
				'keterangan' => $val,
			);
			$this->db->insert('jam_kerja', $data_insert);
			$status = 'ok';
		}
		return (Object) array(
			'status' => $status,
		);
	}

}

/* End of file Presensi.php */
/* Location: ./application/controllers/Presensi.php */