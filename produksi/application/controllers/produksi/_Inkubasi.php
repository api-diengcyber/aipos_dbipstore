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

    public function read($id)
    {
    	$row = $this->db->select('i.*')
    					->from('inkubasi i')
    					->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko')
    					->where('i.id_toko', $this->userdata->id_toko)
    					->where('i.id', $id)
    					->where('u.level', 2)
    					->get()->row();
    	$res_karyawan = $this->db->select('ik.*, CONCAT(u.first_name, " ", u.last_name) AS nama_users')
    							 ->from('inkubasi_karyawan ik')
    							 ->join('users u', 'ik.id_users=u.id_users')
								 ->where('ik.id_inkubasi', $id)
								 ->group_by('ik.id')
								 ->get()->result();
		$res_barang = $this->db->select('ib.*, pr.nama_produk')
							   ->from('inkubasi_barang ib')
							   ->join('produk_retail pr', 'ib.id_produk=pr.id_produk_2 AND ib.id_toko=pr.id_toko')
		    				   ->join('users u', 'ib.id_users=u.id_users AND ib.id_toko=u.id_toko')
		    				   ->where('ib.id_toko', $this->userdata->id_toko)
							   ->where('ib.id_inkubasi', $id)
    						   ->where('u.level', 2)
							   ->group_by('ib.id')
							   ->get()->result();
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
		$res_temp = $this->db->select('ibt.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('inkubasi_barang_temp ibt')
							 ->join('users u', 'ibt.id_users=u.id_users AND ibt.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'ibt.id_produk=pr.id_produk_2 AND ibt.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('ibt.id_toko', $this->userdata->id_toko)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable keranjang" data-id="'.$key->id.'" value="'.number_format($key->keranjang,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable cup" data-id="'.$key->id.'" value="'.number_format($key->cup,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable rusak" data-id="'.$key->id.'" value="'.number_format($key->rusak,0,',','.').'" style="border:none;" /></td>
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

	public function update_temp()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$keranjang = $this->input->post('keranjang', true);
		$cup = $this->input->post('cup', true);
		$rusak = $this->input->post('rusak', true);
		// $total = $this->input->post('total', true);
		$total = ($keranjang*96)+$cup-$rusak;
		$data_update = array(
			'keranjang' => $keranjang,
			'cup' => $cup,
			'rusak' => $rusak,
			'total' => $total,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('inkubasi_barang_temp', $data_update);
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	function _res_karyawan()
	{
		return $this->db->select('u.*')
						->from('users u')
						->join('jam_kerja jk', 'u.id_users=jk.id_pegawai AND u.id_toko=jk.id_toko')
						->where('u.id_toko', $this->userdata->id_toko)
						->where('u.level', 4)
						->where('jk.tgl', date('d-m-Y'))
						->where('jk.status > 0')
						->group_by('u.id')
						->get()->result();
	}

	function _res_karyawan_total()
	{
		return $this->db->select('u.*')
						->from('users u')
						->where('u.id_toko', $this->userdata->id_toko)
						->where('u.level', 4)
						->group_by('u.id')
						->get()->result();
	}

	public function create()
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->delete('inkubasi_barang_temp');
		$res_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
							   ->where('pr.id_toko', $this->userdata->id_toko)
							   ->where('pr.jenis', 1)
							   ->where('u.level', 2)
							   ->get()->result();
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
        	$res_temp = $this->db->select('ibt.*')
        						 ->from('inkubasi_barang_temp ibt')
        						 ->join('users u', 'ibt.id_users=u.id_users AND ibt.id_toko=u.id_toko')
        						 ->where('ibt.id_toko', $this->userdata->id_toko)
        						 ->where('u.level', 2) 
        						 ->group_by('ibt.id')
        						 ->get()->result();

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
        	}

        	$this->db->where('id_toko', $this->userdata->id_toko);
        	$this->db->where('id_users', $this->userdata->id_users);
        	$this->db->delete('inkubasi_barang_temp');

            $this->session->set_flashdata('message', 'Save Record Success');
        	redirect('produksi/inkubasi');
        }
	}

	public function list_temp_update()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('ibu.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('inkubasi_barang_update ibu')
							 ->join('users u', 'ibu.id_users=u.id_users AND ibu.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'ibu.id_produk=pr.id_produk_2 AND ibu.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('ibu.id_toko', $this->userdata->id_toko)
							 ->where('ibu.id_users', $this->userdata->id_users)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable keranjang" data-id="'.$key->id.'" value="'.number_format($key->keranjang,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable cup" data-id="'.$key->id.'" value="'.number_format($key->cup,0,',','.').'" style="border:none;" /></td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable rusak" data-id="'.$key->id.'" value="'.number_format($key->rusak,0,',','.').'" style="border:none;" /></td>
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

	public function update_temp_update()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$keranjang = $this->input->post('keranjang', true);
		$cup = $this->input->post('cup', true);
		$rusak = $this->input->post('rusak', true);
		// $total = $this->input->post('total', true);
		$total = ($keranjang*96)+$cup-$rusak;
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
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update($id)
	{
		$row = $this->db->select('i.*')
						->from('inkubasi i')
						->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko')
						->where('i.id_toko', $this->userdata->id_toko)
						->where('i.id', $id)
						->where('u.level', 2)
						->get()->row();
		if ($row) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->delete('inkubasi_barang_update');
			$res_barang = $this->db->select('ib.*')
								   ->from('inkubasi_barang ib')
								   ->where('ib.id_toko', $this->userdata->id_toko)
								   // ->where('ib.id_users', $this->userdata->id_users)
								   ->where('ib.id_inkubasi', $id)
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
        	$res_temp = $this->db->select('ibu.*')
        						 ->from('inkubasi_barang_update ibu')
        						 ->join('users u', 'ibu.id_users=u.id_users AND ibu.id_toko=u.id_toko')
        						 ->where('ibu.id_toko', $this->userdata->id_toko)
        						 ->where('ibu.id_users', $this->userdata->id_users)
        						 ->where('u.level', 2) 
        						 ->group_by('ibu.id')
        						 ->get()->result();

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