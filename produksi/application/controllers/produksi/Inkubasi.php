<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inkubasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Inkubasi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_inkubasi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('inkubasi/inkubasi_list', $data);
	}
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Inkubasi_model->json();
    }

	public function list_rusak()
	{
		header('Content-Type: application/json');
		$this->db->select('pr.*, sp.satuan AS nama_satuan');
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND sp.id_toko=pr.id_toko');
		} else {
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko');
		}
		$this->db->where('pr.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('pr.jenis', 3);
		// ->like('sp.satuan', 'pcs', 'both')
		// ->where('u.level', 2)
		$this->db->group_by('pr.id_produk_2');
		$res_produk = $this->db->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_produk as $key) :
			$row_bp = $this->db->select('bp.*, pb.terpakai, pb.dipakai')
							   ->from('bahan_produk bp')
							   ->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk')
							   ->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users')
							   ->where('bp.id_produk', $key->id_produk_2)
							   ->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
							   ->order_by('p.id', 'desc')
							   ->get()->row();
			if ($row_bp) {
				$html .= '<tr>
							<td>'.$no.'</td>
							<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
							<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable editable-red rusak" data-id="'.$key->id_produk_2.'" value="'.number_format($row_bp->terpakai-$row_bp->dipakai,0,',','.').'" style="border:none;" readonly /></td>
						</tr>';
			}
			$no++;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

    public function read($id)
    {
    	$this->db->select('i.*');
		$this->db->from('inkubasi i');
		$this->db->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko');
		$this->db->where('i.id_toko', $this->userdata->id_toko);
		$this->db->where('i.id', $id);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		// ->where('u.level', 2)
		$row = $this->db->get()->row();
    	$res_karyawan = $this->db->select('ik.*, CONCAT(u.first_name, " ", u.last_name) AS nama_users')
    							 ->from('inkubasi_karyawan ik')
    							 ->join('users u', 'ik.id_users=u.id_users')
								 ->where('ik.id_inkubasi', $id)
								 ->group_by('ik.id')
								 ->get()->result();
		$this->db->select('ib.*, pr.nama_produk');
		$this->db->from('inkubasi_barang ib');
		$this->db->join('users u', 'ib.id_users=u.id_users AND ib.id_toko=u.id_toko');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('produk_retail pr', 'ib.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND ib.id_toko=pr.id_toko');
		} else {
			$this->db->join('produk_retail pr', 'ib.id_produk=pr.id_produk_2 AND ib.id_toko=pr.id_toko');
		}
		$this->db->where('ib.id_toko', $this->userdata->id_toko);
		$this->db->where('ib.id_inkubasi', $id);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		//  ->where('u.level', 2)
		$this->db->group_by('ib.id');
		$res_barang = $this->db->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_inkubasi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        	'tgl' => $row->tgl,
        	'progress' => $row->progress,
        	'catatan' => $row->catatan,
        	'karyawan_masuk' => $row->karyawan_masuk,
        	'karyawan_tidak_masuk' => $row->karyawan_tidak_masuk,
        	'data_karyawan' => $res_karyawan,
        	'data_barang' => $res_barang,
        );
        $this->view->render_produksi('inkubasi/inkubasi_read', $data);
    }

	public function list_temp()
	{
		header('Content-Type: application/json');
		$this->db->select('ibt.*, pr.nama_produk, sp.satuan AS nama_satuan, kp.isi');
		$this->db->from('inkubasi_barang_temp ibt');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('users u', 'ibt.id_users=u.id_users AND ibt.id_toko=u.id_toko');
			$this->db->join('produk_retail pr', 'ibt.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND ibt.id_toko=pr.id_toko');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND pr.id_toko=sp.id_toko');
		} else {
			$this->db->join('users u', 'ibt.id_users=u.id_users AND ibt.id_toko=u.id_toko', 'left');
			$this->db->join('produk_retail pr', 'ibt.id_produk=pr.id_produk_2 AND ibt.id_toko=pr.id_toko');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko');
		}

		$this->db->join('keranjang_produk kp', 'ibt.id_produk=kp.id_produk');
		$this->db->where('ibt.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
							//  ->where('u.level', 2)
							 // ->where('pr.jenis', 3)
		$this->db->order_by('pr.nama_produk');
		$this->db->group_by('ibt.id');
		$res_temp = $this->db->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :

			// <td style="padding:0px;"><input type="text" class="form-control text-right numbering editable rusak" data-id="'.$key->id.'" value="'.number_format($key->rusak,0,',','.').'" style="border:none;" /></td>
			
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.') | '.$key->isi.'</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable keranjang" data-id="'.$key->id.'" value="'.number_format($key->keranjang,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable cup" data-id="'.$key->id.'" value="'.number_format($key->cup,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right total" data-id="'.$key->id.'" value="'.number_format($key->total,0,',','.').'" style="border:none;" readonly /></td>
					</tr>';
			$no++;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function list_temp_rusak()
	{
		header('Content-Type: application/json');
		$tgl = $this->input->post('tgl', true);
		$html = '';

		$this->db->select('i.*');
		$this->db->from('inkubasi i');
		$this->db->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko');
		$this->db->where('i.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('i.tgl', $tgl);
		$row_i = $this->db->get()->row();

		if (!$row_i) {
			$this->db->select('pr.*, sp.satuan AS nama_satuan');
			$this->db->from('produk_retail pr');
			if (!empty($this->userdata->id_cabang)) {
				$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
				$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND sp.id_toko=pr.id_toko');
			} else {
				$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko', 'left');
				$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko');
			}
			$this->db->where('pr.id_toko', $this->userdata->id_toko);
			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			}
			$this->db->where('pr.jenis', 3);
					// ->like('sp.satuan', 'pcs', 'both')
					// ->where('u.level', 2)
			$this->db->group_by('pr.id_produk_2');
			$res_produk = $this->db->get()->result();
			$no = 1;
			foreach ($res_produk as $key) :
				$row_bp = $this->db->select('bp.*, pb.terpakai, pb.dipakai')
														->from('bahan_produk bp')
														->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk')
														->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users')
														->where('bp.id_produk', $key->id_produk_2)
														->where('p.tgl', $tgl)
														->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
														->order_by('p.id', 'desc')
														->get()->row();
				if ($row_bp) {
					$row_ibt = $this->db->select('ibt.*')
															->from('inkubasi_barang_temp ibt')
															->where('ibt.id_toko', $this->userdata->id_toko)
															->where('ibt.id_users', $this->userdata->id_users)
															->where('ibt.id_produk', $key->id_produk_2)
															->get()->row();
					$ada = 0;
					if ($row_ibt) {
						$ada = $row_ibt->total;
					}
					$html .= '<tr>
								<td>'.$no.'</td>
								<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
								<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable editable-red rusak" data-id="'.$key->id_produk_2.'" value="'.number_format($row_bp->terpakai-$row_bp->dipakai-$ada,0,',','.').'" style="border:none;" readonly /></td>
							</tr>';
				}
				$no++;
			endforeach;
		} else {
			$html = '<tr><td colspan="3" class="text-center">
				<div class="alert alert-danger">Data sudah dipakai.</div>
			</td></tr>';
		}
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function update_temp()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$keranjang = $this->input->post('keranjang', true);
		$cup = $this->input->post('cup', true);
		$rusak = $this->input->post('rusak', true);
		$tgl = $this->input->post('tgl', true);
		// $total = $this->input->post('total', true);
		$isi = 96; // default
		$row_ibt = $this->db->select('ibt.*, kp.isi')
							->from('inkubasi_barang_temp ibt')
							->join('keranjang_produk kp', 'ibt.id_produk=kp.id_produk')
							->where('ibt.id_toko', $this->userdata->id_toko)
							// ->where('ibt.id_users', $this->userdata->id_users)
							->where('ibt.id', $id)
							->get()->row();
		$stat_update = true;
		if ($row_ibt) {
			$isi = $row_ibt->isi;
			$row_bp = $this->db->select('bp.*, pb.terpakai, pb.dipakai')
				->from('bahan_produk bp')
				->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk')
				->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users')
				->where('bp.id_produk', $row_ibt->id_produk)
				->where('p.tgl', $tgl)
				->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
				->order_by('p.id', 'desc')
				->get()->row();
			if ($row_bp) {
				$total = ($keranjang * $isi) + $cup-$rusak;
				$ada = $row_bp->terpakai-$row_bp->dipakai-$total;
				if ($ada < 0) {
					// $stat_update = false;
				}
			}
		}
		$total = ($keranjang*$isi)+$cup-$rusak;
		if ($stat_update) {
			$data_update = array(
				'keranjang' => $keranjang,
				'cup' => $cup,
				'rusak' => $rusak,
				'total' => $total,
			);
			$this->db->where('id', $id);
			$this->db->where('id_toko', $this->userdata->id_toko);
			// $this->db->where('id_users', $this->userdata->id_users);
			$this->db->update('inkubasi_barang_temp', $data_update);
		}
		$data = array(
			'status' => "ok",
			"data" => !empty($data_update) ? $data_update : null,
		);
		echo json_encode($data);
	}

	function _res_karyawan()
	{
		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->join('jam_kerja jk', 'u.id_users=jk.id_pegawai AND u.id_toko=jk.id_toko');
		$this->db->where('u.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('u.level', 4);
		$this->db->where('jk.tgl', date('d-m-Y'));
		$this->db->where('jk.status > 0');
		$this->db->group_by('u.id');
		return $this->db->get()->result();
	}

	function _res_karyawan_total()
	{
		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->where('u.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
    		$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('u.level', 4);
		$this->db->group_by('u.id');
		return $this->db->get()->result();
	}

	public function create()
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->delete('inkubasi_barang_temp');

		$this->db->select('pr.*');
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND sp.id_toko=pr.id_toko');
		} else {
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko');
		}
		$this->db->where('pr.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('pr.jenis', 3);
							// ->like('sp.satuan', 'pcs', 'both')
							// ->where('u.level', 2)
		$this->db->group_by('pr.id_produk_2');
		$res_produk = $this->db->get()->result();
		foreach ($res_produk as $key) {
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'id_produk' => $key->id_produk_2,
			);
			$this->db->insert('inkubasi_barang_temp', $data_insert);
		}
		$karyawan_total = count($this->_res_karyawan_total());
        $data = array(
			'id_toko' => $this->userdata->id_toko,
			'nama_toko' => $this->userdata->nama_toko,
			'nama_user' => $this->userdata->email,
			'active_inkubasi' => 'active',
			'id_modul' => $this->userdata->id_modul,
			'nama_modul' => $this->userdata->nama_modul,
        	'tgl' => set_value('tgl', date('d-m-Y')),
        	'progress' => set_value('progress'),
        	'catatan' => set_value('catatan'),
        	'karyawan_masuk' => set_value('karyawan_masuk'),
        	'karyawan_tidak_masuk' => set_value('karyawan_tidak_masuk'),
        	'data_karyawan' => $this->_res_karyawan(),
        	'karyawan_total' => $karyawan_total,
        );
        $this->view->render_produksi('inkubasi/inkubasi_form', $data);
	}

	public function create_action()
	{
		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
					$this->create();
        } else {
        	$tgl = $this->input->post('tgl', true);
        	$karyawan = $this->input->post('karyawan');
        	$progress = $this->input->post('progress', true);
        	$catatan = $this->input->post('catatan', true);

        	$this->db->select('ibt.*');
			$this->db->from('inkubasi_barang_temp ibt');
			$this->db->join('users u', 'ibt.id_users=u.id_users AND ibt.id_toko=u.id_toko');
			$this->db->where('ibt.id_toko', $this->userdata->id_toko);
			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			}
			//  ->where('u.level', 2);
			$this->db->where('ibt.total > 0');
			$this->db->group_by('ibt.id');
			$res_temp = $this->db->get()->result();

        	if (count($res_temp) > 0) {
	        	$total_karyawan = count($this->_res_karyawan_total());
	        	$total_karyawan_masuk = count($karyawan);
	        	$total_karyawan_tidak_masuk = $total_karyawan-$total_karyawan_masuk;

	        	$data_insert = array(
	        		'id_toko' => $this->userdata->id_toko,
	        		'id_users' => $this->userdata->id_users,
	        		'tgl' => $tgl,
	        		'progress' => $progress,
	        		'catatan' => $catatan,
	        		'karyawan_masuk' => $total_karyawan_masuk,
	        		'karyawan_tidak_masuk' => $total_karyawan_tidak_masuk,
	        	);
	        	$this->db->insert('inkubasi', $data_insert);
	        	$id = $this->db->insert_id();
	        	
	        	foreach ($karyawan as $key => $value) {
	        		$data_insert = array(
	        			'id_inkubasi' => $id,
	        			'id_users' => $value,
	        		);
	        		$this->db->insert('inkubasi_karyawan', $data_insert);
	        	}

	        	foreach ($res_temp as $key) {
	        		$data_insert = array(
	        			'id_toko' => $this->userdata->id_toko,
	        			'id_users' => $this->userdata->id_users,
	        			'id_inkubasi' => $id,
	        			'id_produk' => $key->id_produk,
	        			'keranjang' => $key->keranjang,
	        			'cup' => $key->cup,
	        			'rusak' => $key->rusak,
	        			'total' => $key->total,
	        		);
	        		$this->db->insert('inkubasi_barang', $data_insert);

					$this->db->select('bp.*, pb.terpakai, pb.dipakai, pb.id AS id_pb');
					$this->db->from('bahan_produk bp');
					$this->db->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk');
					if (!empty($this->userdata->id_cabang)) {
						$this->db->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users');
					} else {
						$this->db->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko');
					}
					$this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
					$this->db->where('bp.id_produk', $key->id_produk);
					$this->db->where('p.id_toko', $this->userdata->id_toko);
					if (!empty($this->userdata->id_cabang)) {
						$this->db->where('u.id_cabang', $this->userdata->id_cabang);
					}
					$this->db->where('p.tgl', $tgl);
					$this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC');
					$this->db->order_by('p.id', 'desc');
					$row_bp = $this->db->get()->row();

					if ($row_bp) {
						$data_update = array(
							'dipakai' => $row_bp->dipakai+$key->total,
						);
						$this->db->where('id', $row_bp->id_pb);
						$this->db->update('produksi_barang', $data_update);
					}
	        	}

	        	$this->db->where('id_toko', $this->userdata->id_toko);
	        	$this->db->where('id_users', $this->userdata->id_users);
	        	$this->db->delete('inkubasi_barang_temp');

	            $this->session->set_flashdata('message', 'Save Record Success');
        	} else {
	            $this->session->set_flashdata('message', 'Save Record Failed');
        	}
        	redirect('produksi/inkubasi');
        }
	}

	public function list_temp_update()
	{
		header('Content-Type: application/json');
		$this->db->select('ibu.*, pr.nama_produk, sp.satuan AS nama_satuan, kp.isi');
		$this->db->from('inkubasi_barang_update ibu');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('users u', 'ibu.id_users=u.id_users AND ibu.id_toko=u.id_toko');
			$this->db->join('produk_retail pr', 'ibu.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND ibu.id_toko=pr.id_toko');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND pr.id_toko=sp.id_toko');
		} else {
			$this->db->join('users u', 'ibu.id_users=u.id_users AND ibu.id_toko=u.id_toko', 'left');
			$this->db->join('produk_retail pr', 'ibu.id_produk=pr.id_produk_2 AND ibu.id_toko=pr.id_toko');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko');
		}

		$this->db->join('keranjang_produk kp', 'ibu.id_produk=kp.id_produk');
		$this->db->where('ibu.id_toko', $this->userdata->id_toko);
		$this->db->where('ibu.id_users', $this->userdata->id_users);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		//  ->where('u.level', 2)
		$this->db->order_by('pr.nama_produk');
		$this->db->group_by('ibu.id');
		$res_temp = $this->db->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			
			// <td style="padding:0px;"><input type="text" class="form-control text-right numbering editable rusak" data-id="'.$key->id.'" value="'.number_format($key->rusak,0,',','.').'" style="border:none;" /></td>
			
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.') | '.$key->isi.'</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable keranjang" data-id="'.$key->id.'" value="'.number_format($key->keranjang,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable cup" data-id="'.$key->id.'" value="'.number_format($key->cup,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right total" data-id="'.$key->id.'" value="'.number_format($key->total,0,',','.').'" style="border:none;" readonly /></td>
					</tr>';
			$no++;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function list_temp_update_rusak()
	{
		header('Content-Type: application/json');
		$id_inkubasi = $this->input->post('id_inkubasi', true);
		$tgl = $this->input->post('tgl', true);
		$this->db->select('pr.*, sp.satuan AS nama_satuan');
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND sp.id_toko=pr.id_toko');
		} else {
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko');
		}
		$this->db->where('pr.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('pr.jenis', 3);
		// ->like('sp.satuan', 'pcs', 'both')
		// ->where('u.level', 2)
		$this->db->group_by('pr.id_produk_2');
		$res_produk = $this->db->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_produk as $key) :
			$row_bp = $this->db->select('bp.*, pb.terpakai, pb.dipakai')
							   ->from('bahan_produk bp')
							   ->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk')
							   ->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users')
							   ->where('bp.id_produk', $key->id_produk_2)
							   ->where('p.tgl', $tgl)
							   ->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
							   ->order_by('p.id', 'desc')
							   ->get()->row();
			if ($row_bp) {
				$row_ib = $this->db->select('ib.*')
									->from('inkubasi_barang ib')
									->where('ib.id_toko', $this->userdata->id_toko)
									->where('ib.id_users', $this->userdata->id_users)
									->where('ib.id_inkubasi', $id_inkubasi)
									->where('ib.id_produk', $key->id_produk_2)
									->get()->row();
				$ada_asli = 0;
				if ($row_ib) {
					$ada_asli = $row_ib->total;
				}
				$row_ibt = $this->db->select('ibt.*')
									->from('inkubasi_barang_update ibt')
									->where('ibt.id_toko', $this->userdata->id_toko)
									->where('ibt.id_users', $this->userdata->id_users)
									->where('ibt.id_inkubasi', $id_inkubasi)
									->where('ibt.id_produk', $key->id_produk_2)
									->get()->row();
				$ada = 0;
				if ($row_ibt) {
					$ada = $row_ibt->total;
				}
				$html .= '<tr>
							<td>'.$no.'</td>
							<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
							<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable editable-red rusak" data-id="'.$key->id_produk_2.'" value="'.number_format($row_bp->terpakai-$row_bp->dipakai+$ada_asli-$ada,0,',','.').'" style="border:none;" readonly /></td>
						</tr>';
			}
			$no++;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function update_temp_update()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$keranjang = $this->input->post('keranjang', true);
		$cup = $this->input->post('cup', true);
		$rusak = $this->input->post('rusak', true);
		$tgl = $this->input->post('tgl', true);
		// $total = $this->input->post('total', true);
		$isi = 96;
		$row_ibt = $this->db->select('ibu.*, kp.isi')
							->from('inkubasi_barang_update ibu')
							->join('keranjang_produk kp', 'ibu.id_produk=kp.id_produk')
							->where('ibu.id_toko', $this->userdata->id_toko)
							->where('ibu.id_users', $this->userdata->id_users)
							->where('ibu.id', $id)
							->get()->row();
		$stat_update = true;
		if ($row_ibt) {
			$isi = $row_ibt->isi;
			$row_bp = $this->db->select('bp.*, pb.terpakai, pb.dipakai')
				->from('bahan_produk bp')
				->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk')
				->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users')
				->where('bp.id_produk', $row_ibt->id_produk)
				->where('p.tgl', $tgl)
				->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
				->order_by('p.id', 'desc')
				->get()->row();
			if ($row_bp) {
				$total = ($keranjang * $isi) + $cup - $rusak;
				$ada = $row_bp->terpakai - $row_bp->dipakai - $total;
				if ($ada < 0) {
					// $stat_update = false;
				}
			}
		}
		$total = ($keranjang*$isi)+$cup-$rusak;
		if ($stat_update) {
			$data_update = array(
				'keranjang' => $keranjang,
				'cup' => $cup,
				'rusak' => $rusak,
				'total' => $total,
			);
			$this->db->where('id', $id);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->update('inkubasi_barang_update', $data_update);
		}
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update($id)
	{
		$this->db->select('i.*');
		$this->db->from('inkubasi i');
		$this->db->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko');
		$this->db->where('i.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('i.id', $id);
		// ->where('u.level', 2)
		$row = $this->db->get()->row();

		if ($row) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->delete('inkubasi_barang_update');
			$res_barang = $this->db->select('ib.*')
								   ->from('inkubasi_barang ib')
								   ->where('ib.id_toko', $this->userdata->id_toko)
								   // ->where('ib.id_users', $this->userdata->id_users)
									 ->where('ib.id_inkubasi', $id)
									 ->group_by('ib.id')
								   ->get()->result();
			foreach ($res_barang as $key) {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_inkubasi' => $key->id_inkubasi,
					'id_produk' => $key->id_produk,
					'expire_date' => $key->expire_date,
					'keranjang' => $key->keranjang,
					'cup' => $key->cup,
					'rusak' => $key->rusak,
					'total' => $key->total,
				);
				$this->db->insert('inkubasi_barang_update', $data_insert);
			}
			$res_karyawan = $this->db->select('ik.*, CONCAT(u.first_name," ",u.last_name) AS nama_users')
									 ->from('inkubasi_karyawan ik')
									 ->join('users u', 'ik.id_users=u.id_users')
									 // ->where('ik.id_toko', $this->userdata->id_toko)
											->where('ik.id_inkubasi', $id)
											->group_by('ik.id')
								   	 ->get()->result();
			$arr_karyawan = array();
			foreach ($res_karyawan as $key) {
				$arr_karyawan[$key->id_users] = $key->nama_users;
			}
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_inkubasi' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
	        	'id' => set_value('id', $row->id),
	        	'tgl' => set_value('tgl', $row->tgl),
	        	'progress' => set_value('progress', $row->progress),
	        	'catatan' => set_value('catatan', $row->catatan),
	        	'karyawan_masuk' => set_value('karyawan_masuk', $row->karyawan_masuk),
	        	'karyawan_tidak_masuk' => set_value('karyawan_tidak_masuk', $row->karyawan_tidak_masuk),
	        	'data_karyawan_produksi' => $arr_karyawan,
	        	'data_karyawan' => $this->_res_karyawan(),
	        );
	        $this->view->render_produksi('inkubasi/inkubasi_form_update', $data);
		} else {
            $this->session->set_flashdata('message', 'Record Not Found');
        	redirect('produksi/inkubasi');
		}
	}

	public function update_action()
	{
		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', true));
        } else {
			$id = $this->input->post('id', true);
			$tgl = $this->input->post('tgl', true);
        	$karyawan = $this->input->post('karyawan');
			$progress = $this->input->post('progress', true);
			$catatan = $this->input->post('catatan', true);

        	$this->db->select('ibu.*');
			$this->db->from('inkubasi_barang_update ibu');
			$this->db->join('users u', 'ibu.id_users=u.id_users AND ibu.id_toko=u.id_toko');
			$this->db->where('ibu.id_toko', $this->userdata->id_toko);
			$this->db->where('ibu.id_users', $this->userdata->id_users);
			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			}
			//  ->where('u.level', 2)
			$this->db->group_by('ibu.id');
			$res_temp = $this->db->get()->result();

        	$total_karyawan = count($this->_res_karyawan_total());
        	$total_karyawan_masuk = count($karyawan);
        	$total_karyawan_tidak_masuk = $total_karyawan-$total_karyawan_masuk;

			$data_update = array(
				'tgl' => $tgl,
				'progress' => $progress,
				'catatan' => $catatan,
        		'karyawan_masuk' => $total_karyawan_masuk,
        		'karyawan_tidak_masuk' => $total_karyawan_tidak_masuk,
			);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id', $id);
			$this->db->update('inkubasi', $data_update);
        	
			$this->db->where('id_inkubasi', $id);
			$this->db->delete('inkubasi_karyawan');

        	foreach ($karyawan as $key => $value) {
        		$data_insert = array(
        			'id_inkubasi' => $id,
        			'id_users' => $value,
        		);
        		$this->db->insert('inkubasi_karyawan', $data_insert);
        	}

        	foreach ($res_temp as $key) {
				$row_ib = $this->db->select('ib.*')
									->from('inkubasi_barang ib')
								    ->where('ib.id_toko', $this->userdata->id_toko)
			    				    ->where('ib.id_users', $this->userdata->id_users)
									->where('ib.id_inkubasi', $id)
									->where('ib.id_produk', $key->id_produk)
									->get()->row();
				$ada_asli = 0;
				if ($row_ib) {
					$ada_asli = $row_ib->total;
				}

				$this->db->select('bp.*, pb.terpakai, pb.dipakai, pb.id AS id_pb');
				$this->db->from('bahan_produk bp');
				$this->db->join('produksi_barang pb', 'bp.id_bahan=pb.id_produk');
				if (!empty($this->userdata->id_cabang)) {
					$this->db->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko AND pb.id_users=p.id_users');
				} else {
					$this->db->join('produksi p', 'pb.id_produksi=p.id AND pb.id_toko=p.id_toko');
				}
				$this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
				$this->db->where('bp.id_produk', $key->id_produk);
				$this->db->where('p.id_toko', $this->userdata->id_toko);
				if (!empty($this->userdata->id_cabang)) {
					$this->db->where('u.id_cabang', $this->userdata->id_cabang);
				}
				$this->db->where('p.tgl', $tgl);
				$this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC');
				$this->db->order_by('p.id', 'desc');
				$row_bp = $this->db->get()->row();

				if ($row_bp) {
					$data_update = array(
						'dipakai' => $row_bp->dipakai-$ada_asli+$key->total,
					);
					$this->db->where('id', $row_bp->id_pb);
					$this->db->update('produksi_barang', $data_update);
				}
        	}
        	
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_inkubasi', $id);
			$this->db->delete('inkubasi_barang');

        	foreach ($res_temp as $key) {
        		$data_insert = array(
        			'id_toko' => $this->userdata->id_toko,
        			'id_users' => $this->userdata->id_users,
        			'id_inkubasi' => $id,
        			'id_produk' => $key->id_produk,
        			'keranjang' => $key->keranjang,
        			'cup' => $key->cup,
        			'rusak' => $key->rusak,
        			'total' => $key->total,
        		);
        		$this->db->insert('inkubasi_barang', $data_insert);
        	}

        	$this->db->where('id_toko', $this->userdata->id_toko);
        	$this->db->where('id_users', $this->userdata->id_users);
        	$this->db->delete('inkubasi_barang_update');

            $this->session->set_flashdata('message', 'Update Record Success');
        	redirect('produksi/inkubasi');
        }
	}

    public function _rules() 
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('progress', 'progress', 'trim|required');
        $this->form_validation->set_rules('catatan', 'catatan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */