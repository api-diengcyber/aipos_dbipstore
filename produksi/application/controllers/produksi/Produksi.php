<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Produksi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
		$row_day = $this->db->select('p.*')
							->from('produksi p')
							->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
							->where('p.id_toko', $this->userdata->id_toko)
							->where('p.tgl', date('d-m-Y'))
							->where('u.id_cabang', $this->userdata->id_cabang)
							->where('u.level', 2)
							->get()->row();
		$allow_create = true;
		if ($row_day) {
			$allow_create = false;
		}
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produksi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'allow_create' => $allow_create,
        );
        $this->view->render_produksi('produksi/produksi_list', $data);
	}
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produksi_model->json();
    }

    public function read($id)
    {
    	$this->db->select('p.*');
		$this->db->from('produksi p');
		$this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
		$this->db->where('p.id_toko', $this->userdata->id_toko);
		$this->db->where('p.id', $id);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			$this->db->where('u.level', 2);
		}
		$row = $this->db->get()->row();
		
    	$res_karyawan = $this->db->select('pk.*, CONCAT(u.first_name, " ", u.last_name) AS nama_users')
    							 ->from('produksi_karyawan pk')
    							 ->join('users u', 'pk.id_users=u.id_users')
								 ->where('pk.id_produksi', $id)
								 ->group_by('pk.id')
								 ->get()->result();
		$this->db->select('pb.*, pr.nama_produk');
		$this->db->from('produksi_barang pb');
		$this->db->join('produk_retail pr', 'pb.id_produk=pr.id_produk_2 AND pb.id_toko=pr.id_toko');
		$this->db->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko');
		$this->db->where('pb.id_toko', $this->userdata->id_toko);
		$this->db->where('pb.id_produksi', $id);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			$this->db->where('u.level', 2);
		}
		$this->db->group_by('pb.id');
		$res_barang = $this->db->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produksi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        	'tgl' => $row->tgl,
        	'pengupasan_mulai' => $row->pengupasan_mulai,
        	'pengupasan_selesai' => $row->pengupasan_selesai,
        	'pengepresan_mulai' => $row->pengepresan_mulai,
        	'pengepresan_selesai' => $row->pengepresan_selesai,
        	'karyawan_masuk' => $row->karyawan_masuk,
        	'karyawan_tidak_masuk' => $row->karyawan_tidak_masuk,
        	'catatan' => $row->catatan,
        	'data_karyawan' => $res_karyawan,
        	'data_barang' => $res_barang,
        );
        $this->view->render_produksi('produksi/produksi_read', $data);
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

    public function ajax_produk()
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $tgl = $this->input->post('tgl');
        $res = $this->Produksi_model->get_bahan_search($term, $tgl);
        $data = array();
        $i = 0;
        foreach ($res as $key) {
            $data[$i]['value'] = $key->barcode;
            $data[$i]['label'] = $key->nama_produk;
            $i++;
        }
        echo json_encode($data);
    }

	public function list_temp()
	{
		header('Content-Type: application/json');
		$this->db->select('pbt.*, pr.nama_produk, sp.satuan AS nama_satuan');
		$this->db->from('produksi_barang_temp pbt');
		$this->db->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko', 'left');
		$this->db->join('produk_retail pr', 'pbt.id_produk=pr.id_produk_2 AND pbt.id_toko=pr.id_toko');
		$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko');
		$this->db->where('pbt.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		// $this->db->where('u.level', 2);
		$this->db->order_by('pr.nama_produk');
		$res_temp = $this->db->get()->result();

		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right sisa_kemarin" data-id="'.$key->id.'" value="'.number_format($key->sisa_kemarin,0,',','.').'" style="border:none;" readonly /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable ambil_baru" data-id="'.$key->id.'" value="'.number_format($key->ambil_baru,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable sisa" data-id="'.$key->id.'" value="'.number_format($key->sisa,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable rusak" data-id="'.$key->id.'" value="'.number_format($key->rusak,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right terpakai" data-id="'.$key->id.'" value="'.number_format($key->terpakai,0,',','.').'" style="border:none;" readonly /></td>
						<td class="text-center" style="padding:0px;"><button type="button" class="btn btn-danger btn-xs btn-hapus-temp" data-id="'.$key->id.'"><i class="ace-icon fa fa-trash"></i></button></td>
					</tr>';
			$no++;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function tambah_temp()
	{
		header('Content-Type: application/json');
		$barcode = $this->input->post('barcode', true);
		$row_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
							   ->where('pr.barcode', $barcode)
							   ->where('pr.id_toko', $this->userdata->id_toko)
							   ->where('pr.jenis', 1)
							   ->where('u.id_cabang', $this->userdata->id_cabang)
							   ->where('u.level', 2)
							   ->get()->row();
		if ($row_produk) {
			$row_temp = $this->db->select('pbt.*')
								 ->from('produksi_barang_temp pbt')
							     ->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko')
								 ->where('pbt.id_produk', $row_produk->id_produk_2)
								 ->where('pbt.id_toko', $this->userdata->id_toko)
								 ->where('u.id_cabang', $this->userdata->id_cabang)
								 ->where('u.level', 2)
								 ->get()->row();
			if ($row_temp) {
				/*$data_update = array(
					'jumlah' => $row_temp->jumlah+1
				);
				$this->db->where('id', $row_temp->id);
				$this->db->update('produksi_barang_temp', $data_update);*/
			} else {
				$row_last = $this->db->select('pb.*')
									 ->from('produksi_barang pb')
									 ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
									 ->join('produksi p', 'pb.id_produksi=p.id AND p.id_users=u.id_users AND pb.id_toko=p.id_toko')
									 ->where('pb.id_toko', $this->userdata->id_toko)
									 ->where('pb.id_produk', $row_produk->id_produk_2)
									 ->where('u.id_cabang', $this->userdata->id_cabang)
									 ->where('u.level', 2)
									 ->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
									 ->order_by('pb.id', 'desc')
									 ->get()->row();
				$sisa_kemarin = 0;
				$id_last_kmarin = 0;
				if ($row_last) {
					// $sisa_kemarin = $row_last->sisa;
					// $id_last_kmarin = $row_last->id;
				}
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produk' => $row_produk->id_produk_2,
					'id_pb_kemarin' => $id_last_kmarin,
					'sisa_kemarin' => $sisa_kemarin,
				);
				$this->db->insert('produksi_barang_temp', $data_insert);
			}
		}
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update_temp()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$sisa_kemarin = $this->input->post('sisa_kemarin', true);
		$ambil_baru = $this->input->post('ambil_baru', true);
		$sisa = $this->input->post('sisa', true);
		$rusak = $this->input->post('rusak', true);
		$terpakai = $sisa_kemarin+$ambil_baru-$sisa-$rusak;
		$data_update = array(
			'sisa_kemarin' => $sisa_kemarin,
			'ambil_baru' => $ambil_baru,
			'sisa' => $sisa,
			'rusak' => $rusak,
			'terpakai' => $terpakai,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('produksi_barang_temp', $data_update);
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function hapus_temp()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->delete('produksi_barang_temp');
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function create()
	{
		$this->db->select('p.*');
		$this->db->from('produksi p');
		$this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
		$this->db->where('p.id_toko', $this->userdata->id_toko);
		$this->db->where('p.tgl', date('d-m-Y'));
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
		}
		$this->db->where('u.level', 'x2');
		$row_day = $this->db->get()->row();
		if ($row_day) {
			redirect(site_url('produksi/produksi'));
		} else {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->delete('produksi_barang_temp');

			$this->db->select('pr.*');
			$this->db->from('produk_retail pr');
			$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
			$this->db->where('pr.id_toko', $this->userdata->id_toko);
			$this->db->where('pr.jenis', 1);
			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
				$this->db->where('u.level', 2);
			}
			$res_produk = $this->db->get()->result();

			foreach ($res_produk as $key) {
				$this->db->select('pb.*');
				$this->db->from('produksi_barang pb');
				$this->db->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko');
				$this->db->join('produksi p', 'pb.id_produksi=p.id AND p.id_users=u.id_users AND pb.id_toko=p.id_toko');
				$this->db->where('pb.id_toko', $this->userdata->id_toko);
				$this->db->where('pb.id_produk', $key->id_produk_2);
				if (!empty($this->userdata->id_cabang)) {
					$this->db->where('u.id_cabang', $this->userdata->id_cabang);
					$this->db->where('u.level', 2);
				}
				$this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC');
				$this->db->order_by('pb.id', 'desc');
				$row_last = $this->db->get()->row();

				$sisa_kemarin = 0;
				$id_last_kmarin = 0;
				if ($row_last) {
					// $sisa_kemarin = $row_last->terpakai-$row_last->dipakai;
					// $id_last_kmarin = $row_last->id;
				}
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produk' => $key->id_produk_2,
					'id_pb_kemarin' => $id_last_kmarin,
					'sisa_kemarin' => $sisa_kemarin,
					'terpakai' => $sisa_kemarin,
				);
				$this->db->insert('produksi_barang_temp', $data_insert);
			}
			$karyawan_total = count($this->_res_karyawan_total());
	        $data = array(
				'id_toko' => $this->userdata->id_toko,
				'nama_toko' => $this->userdata->nama_toko,
				'nama_user' => $this->userdata->email,
				'active_produksi' => 'active',
				'id_modul' => $this->userdata->id_modul,
				'nama_modul' => $this->userdata->nama_modul,
	        	'tgl' => set_value('tgl', date('d-m-Y')),
	        	'pengupasan_mulai' => set_value('pengupasan_mulai', date('H:i:s')),
	        	'pengupasan_selesai' => set_value('pengupasan_selesai', date('H:i:s')),
	        	'pengepresan_mulai' => set_value('pengepresan_mulai', date('H:i:s')),
	        	'pengepresan_selesai' => set_value('pengepresan_selesai', date('H:i:s')),
	        	'catatan' => set_value('catatan'),
	        	'karyawan_masuk' => set_value('karyawan_masuk'),
	        	'karyawan_tidak_masuk' => set_value('karyawan_tidak_masuk'),
	        	'data_karyawan' => $this->_res_karyawan(),
	        	'karyawan_total' => $karyawan_total,
	        );
	        $this->view->render_produksi('produksi/produksi_form', $data);
		}
	}

	public function create_action()
	{
		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$tgl = $this->input->post('tgl', true);
        	$karyawan = $this->input->post('karyawan');
        	$pengupasan_mulai = $this->input->post('pengupasan_mulai', true);
        	$pengupasan_selesai = $this->input->post('pengupasan_selesai', true);
        	$pengepresan_mulai = $this->input->post('pengepresan_mulai', true);
        	$pengepresan_selesai = $this->input->post('pengepresan_selesai', true);
        	$catatan = $this->input->post('catatan', true);

        	$this->db->select('pbt.*');
			$this->db->from('produksi_barang_temp pbt');
			$this->db->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko');
			$this->db->where('pbt.id_toko', $this->userdata->id_toko);
			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
				$this->db->where('u.level', 2);
			}
			$this->db->group_by('pbt.id');
			$res_temp = $this->db->get()->result();

        	$total_karyawan = count($this->_res_karyawan_total());
        	$total_karyawan_masuk = count($karyawan);
        	$total_karyawan_tidak_masuk = $total_karyawan-$total_karyawan_masuk;

        	$data_insert = array(
        		'id_toko' => $this->userdata->id_toko,
        		'id_users' => $this->userdata->id_users,
        		'tgl' => $tgl,
        		'pengupasan_mulai' => $pengupasan_mulai,
        		'pengupasan_selesai' => $pengupasan_selesai,
        		'pengepresan_mulai' => $pengepresan_mulai,
        		'pengepresan_selesai' => $pengepresan_selesai,
        		'catatan' => $catatan,
        		'karyawan_masuk' => $total_karyawan_masuk,
        		'karyawan_tidak_masuk' => $total_karyawan_tidak_masuk,
        	);
        	$this->db->insert('produksi', $data_insert);
        	$id_produksi = $this->db->insert_id();
        	
        	foreach ($karyawan as $key => $value) {
        		$data_insert = array(
        			'id_produksi' => $id_produksi,
        			'id_users' => $value,
        		);
        		$this->db->insert('produksi_karyawan', $data_insert);
        	}

        	foreach ($res_temp as $key) {
        		$data_insert = array(
        			'id_toko' => $this->userdata->id_toko,
        			'id_users' => $this->userdata->id_users,
        			'id_produksi' => $id_produksi,
        			'id_produk' => $key->id_produk,
        			'id_pb_kemarin' => $key->id_pb_kemarin,
        			'sisa_kemarin' => $key->sisa_kemarin,
        			'ambil_baru' => $key->ambil_baru,
        			'sisa' => $key->sisa,
        			'rusak' => $key->rusak,
        			'terpakai' => $key->terpakai,
        		);
				$this->db->insert('produksi_barang', $data_insert);
				$row_pb_kemarin = $this->db->select( 'pb.*')
										->from('produksi_barang pb')
										->where('pb.id_toko', $this->userdata->id_toko)
										->where('pb.id', $key->id_pb_kemarin)
										->get()->row();
				if ($row_pb_kemarin) {
					$data_update = array(
						'dipakai' => $row_pb_kemarin->dipakai+$key->sisa_kemarin,
					);
					$this->db->where('id', $key->id_pb_kemarin);
					$this->db->where('id_toko', $this->userdata->id_toko);
					$this->db->update('produksi_barang', $data_update);
				}
        	}

        	$this->db->where('id_toko', $this->userdata->id_toko);
        	$this->db->where('id_users', $this->userdata->id_users);
        	$this->db->delete('produksi_barang_temp');

			$this->session->set_flashdata('message', 'Save Record Success');
        	redirect('produksi/produksi');
		}
	}

    public function _rules() 
    {
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('pengupasan_mulai', 'pengupasan_mulai', 'trim|required');
		$this->form_validation->set_rules('pengupasan_selesai', 'pengupasan_selesai', 'trim|required');
		$this->form_validation->set_rules('pengepresan_mulai', 'pengepresan_mulai', 'trim|required');
		$this->form_validation->set_rules('pengepresan_selesai', 'pengepresan_selesai', 'trim|required');
		$this->form_validation->set_rules('catatan', 'catatan', 'trim');
		$this->form_validation->set_rules('karyawan_masuk', 'karyawan_masuk', 'trim');
		$this->form_validation->set_rules('karyawan_tidak_masuk', 'karyawan_tidak_masuk', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

	public function list_temp_update()
	{
		header('Content-Type: application/json');
		$this->db->select('pbu.*, pr.nama_produk, sp.satuan AS nama_satuan');
		$this->db->from('produksi_barang_update pbu');
		if (!empty($this->userdata->id_cabang)) {
			$this->db->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko');
			$this->db->join('produk_retail pr', 'pbu.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pbu.id_toko=pr.id_toko');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND pr.id_toko=sp.id_toko');
		} else {
			$this->db->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko', 'left');
			$this->db->join('produk_retail pr', 'pbu.id_produk=pr.id_produk_2 AND pbu.id_toko=pr.id_toko');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko');
		}

		$this->db->where('pbu.id_toko', $this->userdata->id_toko);
		$this->db->where('pbu.id_users', $this->userdata->id_users);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			$this->db->where('u.level', 2);
		}
		$this->db->order_by('pr.nama_produk');
		$res_temp = $this->db->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right sisa_kemarin" data-id="'.$key->id.'" value="'.number_format($key->sisa_kemarin,0,',','.').'" style="border:none;" readonly /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable ambil_baru" data-id="'.$key->id.'" value="'.number_format($key->ambil_baru,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable sisa" data-id="'.$key->id.'" value="'.number_format($key->sisa,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable rusak" data-id="'.$key->id.'" value="'.number_format($key->rusak,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right terpakai" data-id="'.$key->id.'" value="'.number_format($key->terpakai,0,',','.').'" style="border:none;" readonly /></td>
						<td class="text-center" style="padding:0px;"><button type="button" class="btn btn-danger btn-xs btn-hapus-temp" data-id="'.$key->id.'"><i class="ace-icon fa fa-trash"></i></button></td>
					</tr>';
			$no++;
		endforeach;
		$data = array(
			'status' => "ok",
			'data' => $html,
		);
		echo json_encode($data);
	}

	public function tambah_temp_update()
	{
		header('Content-Type: application/json');
		$barcode = $this->input->post('barcode', true);
		$row_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
							   ->where('pr.barcode', $barcode)
							   ->where('pr.id_toko', $this->userdata->id_toko)
							   ->where('pr.jenis', 1)
							   ->where('u.id_cabang', $this->userdata->id_cabang)
							   ->where('u.level', 2)
							   ->get()->row();
		if ($row_produk) {
			$row_temp = $this->db->select('pbu.*')
								 ->from('produksi_barang_update pbu')
							     ->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko')
								 ->where('pbu.id_produk', $row_produk->id_produk_2)
								 ->where('pbu.id_toko', $this->userdata->id_toko)
								 ->where('pbu.id_users', $this->userdata->id_users)
								 ->where('u.id_cabang', $this->userdata->id_cabang)
								 ->where('u.level', 2)
								 ->get()->row();
			if ($row_temp) {
				/*$data_update = array(
					'jumlah' => $row_temp->jumlah+1
				);
				$this->db->where('id', $row_temp->id);
				$this->db->update('produksi_barang_temp', $data_update);*/
			} else {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produk' => $row_produk->id_produk_2,
				);
				$this->db->insert('produksi_barang_update', $data_insert);
			}
		}
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update_temp_update()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$sisa_kemarin = $this->input->post('sisa_kemarin', true);
		$ambil_baru = $this->input->post('ambil_baru', true);
		$sisa = $this->input->post('sisa', true);
		$rusak = $this->input->post('rusak', true);
		$terpakai = $sisa_kemarin+$ambil_baru-$sisa-$rusak;
		$data_update = array(
			'sisa_kemarin' => $sisa_kemarin,
			'ambil_baru' => $ambil_baru,
			'sisa' => $sisa,
			'rusak' => $rusak,
			'terpakai' => $terpakai,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('produksi_barang_update', $data_update);
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function hapus_temp_update()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->delete('produksi_barang_update');
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update($id)
	{
		$this->db->select('p.*');
		$this->db->from('produksi p');
		$this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
		$this->db->where('p.id_toko', $this->userdata->id_toko);
		$this->db->where('p.id', $id);
		if (!empty($this->userdata->id_cabang)) {
			$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			$this->db->where('u.level', 2);
		}
		$row = $this->db->get()->row();

		if ($row) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->delete('produksi_barang_update');
			$res_barang = $this->db->select('pb.*')
								   ->from('produksi_barang pb')
								   ->where('pb.id_toko', $this->userdata->id_toko)
								   // ->where('pb.id_users', $this->userdata->id_users)
								   ->where('pb.id_produksi', $id)
								   ->get()->result();
			foreach ($res_barang as $key) {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produksi' => $key->id_produksi,
					'id_produk' => $key->id_produk,
					'expire_date' => $key->expire_date,
					'id_pb_kemarin' => $key->id_pb_kemarin,
					'sisa_kemarin' => $key->sisa_kemarin,
					'ambil_baru' => $key->ambil_baru,
					'sisa' => $key->sisa,
					'rusak' => $key->rusak,
					'terpakai' => $key->terpakai,
				);
				$this->db->insert('produksi_barang_update', $data_insert);
			}
			$res_karyawan = $this->db->select('pk.*, CONCAT(u.first_name," ",u.last_name) AS nama_users')
									 ->from('produksi_karyawan pk')
									 ->join('users u', 'pk.id_users=u.id_users')
									 // ->where('pk.id_toko', $this->userdata->id_toko)
								   	 ->where('pk.id_produksi', $id)
								   	 ->get()->result();
			$arr_karyawan = array();
			foreach ($res_karyawan as $key) {
				$arr_karyawan[$key->id_users] = $key->nama_users;
			}
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_produksi' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
	        	'id' => set_value('id', $row->id),
	        	'tgl' => set_value('tgl', $row->tgl),
	        	'pengupasan_mulai' => set_value('pengupasan_mulai', $row->pengupasan_mulai),
	        	'pengupasan_selesai' => set_value('pengupasan_selesai', $row->pengupasan_selesai),
	        	'pengepresan_mulai' => set_value('pengepresan_mulai', $row->pengepresan_mulai),
	        	'pengepresan_selesai' => set_value('pengepresan_selesai', $row->pengepresan_selesai),
	        	'catatan' => set_value('catatan', $row->catatan),
	        	'karyawan_masuk' => set_value('karyawan_masuk', $row->karyawan_masuk),
	        	'karyawan_tidak_masuk' => set_value('karyawan_tidak_masuk', $row->karyawan_tidak_masuk),
	        	'data_karyawan_produksi' => $arr_karyawan,
	        	'data_karyawan' => $this->_res_karyawan(),
	        );
	        $this->view->render_produksi('produksi/produksi_form_update', $data);
		} else {
            $this->session->set_flashdata('message', 'Record Not Found');
        	redirect('produksi/produksi');
		}
	}

	public function update_action()
	{
		$this->_rules_update();
		if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', true));
		} else {
			$id = $this->input->post('id', true);
			$tgl = $this->input->post('tgl', true);
			$karyawan = $this->input->post('karyawan');
			$pengupasan_mulai = $this->input->post('pengupasan_mulai', true);
			$pengupasan_selesai = $this->input->post('pengupasan_selesai', true);
			$pengepresan_mulai = $this->input->post('pengepresan_mulai', true);
			$pengepresan_selesai = $this->input->post('pengepresan_selesai', true);
			$catatan = $this->input->post('catatan', true);
			$this->db->select('pbu.*');
			$this->db->from('produksi_barang_update pbu');
			$this->db->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko');
			$this->db->where('pbu.id_toko', $this->userdata->id_toko);
			$this->db->where('pbu.id_users', $this->userdata->id_users);

			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
				$this->db->where('u.level', 2);
			}
			$this->db->group_by('pbu.id');
			$res_temp = $this->db->get()->result();

			$total_karyawan = count($this->_res_karyawan_total());
			$total_karyawan_masuk = count($karyawan);
			$total_karyawan_tidak_masuk = $total_karyawan-$total_karyawan_masuk;

			$data_update = array(
				'tgl' => $tgl,
				'pengupasan_mulai' => $pengupasan_mulai,
				'pengupasan_selesai' => $pengupasan_selesai,
				'pengepresan_mulai' => $pengepresan_mulai,
				'pengepresan_selesai' => $pengepresan_selesai,
				'catatan' => $catatan,
				'karyawan_masuk' => $total_karyawan_masuk,
				'karyawan_tidak_masuk' => $total_karyawan_tidak_masuk,
			);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id', $id);
			$this->db->update('produksi', $data_update);
        	
			$this->db->where('id_produksi', $id);
			$this->db->delete('produksi_karyawan');

			foreach ($karyawan as $key => $value) {
				$data_insert = array(
					'id_produksi' => $id,
					'id_users' => $value,
				);
				$this->db->insert('produksi_karyawan', $data_insert);
			}
        	
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_produksi', $id);
			$this->db->delete('produksi_barang');

			foreach ($res_temp as $key) {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produksi' => $id,
					'id_produk' => $key->id_produk,
					'sisa_kemarin' => $key->sisa_kemarin,
					'ambil_baru' => $key->ambil_baru,
					'sisa' => $key->sisa,
					'rusak' => $key->rusak,
					'terpakai' => $key->terpakai,
				);
				$this->db->insert('produksi_barang', $data_insert);
				/* $row_pb_kemarin = $this->db->select('pb.*')
																	->from('produksi_barang pb')
																	->where('pb.id_toko', $this->userdata->id_toko)
																	->where('pb.id', $key->id_pb_kemarin)
																	->get()->row();
				if ($row_pb_kemarin) {
					$data_update = array(
						'dipakai' => $row_pb_kemarin->dipakai+$key->sisa_kemarin,
					);
					$this->db->where('id', $key->id_pb_kemarin);
					$this->db->where('id_toko', $this->userdata->id_toko);
					$this->db->update('produksi_barang', $data_update);
				} */
			}

			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->delete('produksi_barang_update');
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect('produksi/produksi');
		}
	}

    public function _rules_update() 
    {
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
				$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
				$this->form_validation->set_rules('pengupasan_mulai', 'pengupasan_mulai', 'trim|required');
				$this->form_validation->set_rules('pengupasan_selesai', 'pengupasan_selesai', 'trim|required');
				$this->form_validation->set_rules('pengepresan_mulai', 'pengepresan_mulai', 'trim|required');
				$this->form_validation->set_rules('pengepresan_selesai', 'pengepresan_selesai', 'trim|required');
				$this->form_validation->set_rules('catatan', 'catatan', 'trim');
				$this->form_validation->set_rules('karyawan_masuk', 'karyawan_masuk', 'trim');
				$this->form_validation->set_rules('karyawan_tidak_masuk', 'karyawan_tidak_masuk', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */