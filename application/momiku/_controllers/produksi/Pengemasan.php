<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengemasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Pengemasan_model');
        $this->load->model('Faktur_retail_model');
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
            'active_pengemasan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('pengemasan/pengemasan_list', $data);
	}
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengemasan_model->json();
    }

    public function read($id)
    {
    	$row = $this->db->select('p.*')
    					->from('pengemasan p')
    					->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
    					->where('p.id_toko', $this->userdata->id_toko)
    					->where('p.id', $id)
    					->where('u.level', 2)
    					->get()->row();
    	$res_karyawan = $this->db->select('pk.*, CONCAT(u.first_name, " ", u.last_name) AS nama_users')
    							 ->from('pengemasan_karyawan pk')
    							 ->join('users u', 'pk.id_users=u.id_users')
								 ->where('pk.id_pengemasan', $id)
								 ->group_by('pk.id')
								 ->get()->result();
		$res_barang = $this->db->select('pb.*, pr.nama_produk')
							   ->from('pengemasan_barang pb')
							   ->join('produk_retail pr', 'pb.id_produk=pr.id_produk_2 AND pb.id_toko=pr.id_toko')
		    				   ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
		    				   ->where('pb.id_toko', $this->userdata->id_toko)
							   ->where('pb.id_pengemasan', $id)
							   ->where('pb.posisi', 0)
    						   ->where('u.level', 2)
							   ->group_by('pb.id')
							   ->get()->result();
		$res_barang_pengemasan = $this->db->select('pb.*, pr.nama_produk')
							   ->from('pengemasan_barang pb')
							   ->join('produk_retail pr', 'pb.id_produk=pr.id_produk_2 AND pb.id_toko=pr.id_toko')
		    				   ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
		    				   ->where('pb.id_toko', $this->userdata->id_toko)
							   ->where('pb.id_pengemasan', $id)
							   ->where('pb.posisi', 1)
    						   ->where('u.level', 2)
							   ->group_by('pb.id')
							   ->get()->result();
		$res_barang_produk = $this->db->select('pb.*, pr.nama_produk')
							   ->from('pengemasan_barang pb')
							   ->join('produk_retail pr', 'pb.id_produk=pr.id_produk_2 AND pb.id_toko=pr.id_toko')
		    				   ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
		    				   ->where('pb.id_toko', $this->userdata->id_toko)
							   ->where('pb.id_pengemasan', $id)
							   ->where('pb.posisi', 2)
    						   ->where('u.level', 2)
							   ->group_by('pb.id')
							   ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pengemasan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        	'tgl' => $row->tgl,
        	'tgl_produksi' => $row->tgl_produksi,
        	'progress' => $row->progress,
        	'catatan' => $row->catatan,
        	'karyawan_masuk' => $row->karyawan_masuk,
        	'karyawan_tidak_masuk' => $row->karyawan_tidak_masuk,
        	'data_karyawan' => $res_karyawan,
        	'data_barang' => $res_barang,
        	'data_barang_pengemasan' => $res_barang_pengemasan,
        	'data_barang_produk' => $res_barang_produk,
        );
        $this->view->render_produksi('pengemasan/pengemasan_read', $data);
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

	public function list_temp()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('pbt.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('pengemasan_barang_temp pbt')
							 ->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'pbt.id_produk=pr.id_produk_2 AND pbt.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('pbt.id_toko', $this->userdata->id_toko)
							 ->where('pbt.posisi', 0)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td>'.number_format($key->cup,0,',','.').'</td>
						<td>'.number_format($key->rusak,0,',','.').'</td>
						<td>'.number_format($key->total,0,',','.').'</td>
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

	public function list_temp_pengemasan()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('pbt.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('pengemasan_barang_temp pbt')
							 ->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'pbt.id_produk=pr.id_produk_2 AND pbt.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('pbt.id_toko', $this->userdata->id_toko)
							 ->where('pbt.posisi', 1)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
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
						<td>'.number_format($key->terpakai,0,',','.').'</td>
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

	public function list_temp_produk()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('pbt.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('pengemasan_barang_temp pbt')
							 ->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'pbt.id_produk=pr.id_produk_2 AND pbt.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('pbt.id_toko', $this->userdata->id_toko)
							 ->where('pbt.posisi', 2)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable cup" data-id="'.$key->id.'" value="'.number_format($key->cup,0,',','.').'" style="border:none;" /></td>
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

	public function list_produksi()
	{
		header('Content-Type: application/json');
		$tgl = $this->input->post('tgl', true);
		$row_last_ink = $this->db->select('i.*')
								  ->from('inkubasi i')
								  ->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko')
								  ->where('i.id_toko', $this->userdata->id_toko)
								  ->where('i.tgl', $tgl)
								  ->where('u.level', 2)
								  ->order_by('DATE(CONCAT(SUBSTRING(i.tgl,7,4),"-",SUBSTRING(i.tgl,4,2),"-",SUBSTRING(i.tgl,1,2))) DESC')
								  ->order_by('i.id', 'DESC')
								  ->get()->row();
		$html = '';
		if ($row_last_ink) {
			$status = 'ok';
			$res_temp = $this->db->select('ib.*, pr.nama_produk, sp.satuan AS nama_satuan')
								 ->from('inkubasi_barang ib')
								 ->join('users u', 'ib.id_users=u.id_users AND ib.id_toko=u.id_toko')
								 ->join('produk_retail pr', 'ib.id_produk=pr.id_produk_2 AND ib.id_toko=pr.id_toko')
								 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
								 ->where('ib.id_toko', $this->userdata->id_toko)
								 ->where('ib.id_inkubasi', $row_last_ink->id)
								 ->where('u.level', 2)
								 ->order_by('pr.nama_produk')
								 ->get()->result();
			$no = 1;
			foreach ($res_temp as $key) :
				$html .= '<tr>
							<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
							<td>'.number_format($key->keranjang,0,',','.').'</td>
							<td>'.number_format($key->cup,0,',','.').'</td>
							<td>'.number_format($key->rusak,0,',','.').'</td>
							<td>'.number_format($key->total,0,',','.').'</td>
						</tr>';
				$no++;
			endforeach;
		} else {
			$status = 'error';
		}
		$data = array(
			'status' => $status,
			'data' => $html,
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
			'ambil_baru' => $ambil_baru,
			'sisa' => $sisa,
			'rusak' => $rusak,
			'terpakai' => $terpakai,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('pengemasan_barang_temp', $data_update);
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update_temp_produk()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$cup = $this->input->post('cup', true);
		$data_update = array(
			'cup' => $cup,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('pengemasan_barang_temp', $data_update);
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
		$this->db->delete('pengemasan_barang_temp');
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function create()
	{
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->delete('pengemasan_barang_temp');
		$row_last_ink = $this->db->select('i.*')
								  ->from('inkubasi i')
								  ->join('users u', 'i.id_users=u.id_users AND i.id_toko=u.id_toko')
								  ->where('i.id_toko', $this->userdata->id_toko)
								  ->where('u.level', 2)
								  ->order_by('DATE(CONCAT(SUBSTRING(i.tgl,7,4),"-",SUBSTRING(i.tgl,4,2),"-",SUBSTRING(i.tgl,1,2))) DESC')
								  ->order_by('i.id', 'DESC')
								  ->get()->row();
		$tgl_produksi = '';
		if ($row_last_ink) {
			$tgl_produksi = $row_last_ink->tgl;
			$res_pb = $this->db->select('ib.*')
							   ->from('inkubasi_barang ib')
							   ->where('ib.id_toko', $this->userdata->id_toko)
							   ->where('ib.id_inkubasi', $row_last_ink->id)
							   ->get()->result();
			foreach ($res_pb as $key) {
				$total_cup = ($key->keranjang*96)+$key->cup;
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_produk' => $key->id_produk,
					'cup' => $total_cup,
					'rusak' => $key->rusak,
					'total' => $key->total,
				);
				$this->db->insert('pengemasan_barang_temp', $data_insert);
			}
		}
		// pengemasan //
		$res_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
							   ->where('pr.id_toko', $this->userdata->id_toko)
							   ->where('pr.jenis', 2)
							   ->where('u.level', 2)
							   ->get()->result();
		foreach ($res_produk as $key) {
			$row_last = $this->db->select('pb.*')
								 ->from('pengemasan_barang pb')
								 ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
								 ->join('pengemasan p', 'pb.id_pengemasan=p.id AND pb.id_toko=p.id_toko')
								 ->where('pb.id_toko', $this->userdata->id_toko)
								 ->where('u.level', 2)
								 ->where('pb.id_produk', $key->id_produk)
								 ->order_by('DATE(CONCAT(SUBSTRING(p.tgl,7,4),"-",SUBSTRING(p.tgl,4,2),"-",SUBSTRING(p.tgl,1,2))) DESC')
								 ->order_by('pb.id', 'desc')
								 ->get()->row();
			$sisa_kemarin = 0;
			if ($row_last) {
				$sisa_kemarin = $row_last->sisa;
			}
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'id_produk' => $key->id_produk_2,
				'posisi' => 1,
				'sisa_kemarin' => $sisa_kemarin,
			);
			$this->db->insert('pengemasan_barang_temp', $data_insert);
		}
		// produk jadi //
		$res_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
							   ->where('pr.id_toko', $this->userdata->id_toko)
							   ->where('pr.jenis', 0)
							   ->where('u.level', 2)
							   ->get()->result();
		foreach ($res_produk as $key) {
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'id_produk' => $key->id_produk_2,
				'posisi' => 2,
			);
			$this->db->insert('pengemasan_barang_temp', $data_insert);
		}
		$karyawan_total = count($this->_res_karyawan_total());
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pengemasan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        	'tgl' => set_value('tgl', date('d-m-Y')),
        	'progress' => set_value('progress'),
        	'catatan' => set_value('catatan'),
	    	'karyawan_masuk' => set_value('karyawan_masuk'),
	    	'karyawan_tidak_masuk' => set_value('karyawan_tidak_masuk'),
	    	'data_karyawan' => $this->_res_karyawan(),
	    	'karyawan_total' => $karyawan_total,
	    	'tgl_produksi' => $tgl_produksi,
        );
        $this->view->render_produksi('pengemasan/pengemasan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$tgl = $this->input->post('tgl', true);
        	$karyawan = $this->input->post('karyawan');
        	$tgl_produksi = $this->input->post('tgl_produksi', true);
        	$progress = $this->input->post('progress', true);
        	$catatan = $this->input->post('catatan', true);
        	$res_temp = $this->db->select('pbt.*')
        						 ->from('pengemasan_barang_temp pbt')
        						 ->join('users u', 'pbt.id_users=u.id_users AND pbt.id_toko=u.id_toko')
        						 ->where('pbt.id_toko', $this->userdata->id_toko)
        						 ->where('u.level', 2) 
        						 ->group_by('pbt.id')
        						 ->get()->result();

        	$total_karyawan = count($this->_res_karyawan_total());
        	$total_karyawan_masuk = count($karyawan);
        	$total_karyawan_tidak_masuk = $total_karyawan-$total_karyawan_masuk;

        	$data_insert = array(
        		'id_toko' => $this->userdata->id_toko,
        		'id_users' => $this->userdata->id_users,
        		'tgl' => $tgl,
        		'tgl_produksi' => $tgl_produksi,
        		'progress' => $progress,
        		'catatan' => $catatan,
        		'karyawan_masuk' => $total_karyawan_masuk,
        		'karyawan_tidak_masuk' => $total_karyawan_tidak_masuk,
        	);
        	$this->db->insert('pengemasan', $data_insert);
        	$id = $this->db->insert_id();
        	
        	foreach ($karyawan as $key => $value) {
        		$data_insert = array(
        			'id_pengemasan' => $id,
        			'id_users' => $value,
        		);
        		$this->db->insert('pengemasan_karyawan', $data_insert);
        	}

        	foreach ($res_temp as $key) {
        		$data_insert = array(
        			'id_toko' => $this->userdata->id_toko,
        			'id_users' => $this->userdata->id_users,
        			'id_pengemasan' => $id,
        			'id_produk' => $key->id_produk,
        			'posisi' => $key->posisi,
        			'cup' => $key->cup,
        			'rusak' => $key->rusak,
        			'total' => $key->total,
        			'sisa_kemarin' => $key->sisa_kemarin,
        			'ambil_baru' => $key->ambil_baru,
        			'sisa' => $key->sisa,
        			'terpakai' => $key->terpakai,
        		);
        		$this->db->insert('pengemasan_barang', $data_insert);
        		if ($key->posisi == 2) { // produk jadi
        			$row_stok = $this->db->select('sp.*')
        								 ->from('stok_produk sp')
        								 ->where('sp.id_toko', $this->userdata->id_toko)
        								 ->where('sp.id_produk', $key->id_produk)
        								 ->order_by('sp.id', 'asc')
        								 ->get()->row();
        			if ($row_stok) {
        				$data_update = array(
        					'stok' => $row_stok->stok+$key->cup,
        				);
        				$this->db->where('id', $row_stok->id);
        				$this->db->update('stok_produk', $data_update);
        			} else {
        				$id_faktur = 1;
        				$row_last_fr = $this->db->select('fr.*')
        									   ->from('faktur_retail fr')
        									   ->where('fr.id_toko', $this->userdata->id_toko)
        									   ->order_by('fr.id_faktur', 'desc')
        									   ->get()->row();
        				if ($row_last_fr) {
        					$id_faktur = $row_last_p->id_faktur+1;
        				}
			            $urutan = $this->Faktur_retail_model->get_faktur_hari_ini()->count+1;
			            $no_faktur = date('dmy').'00'.$urutan;
        				$data_insert = array(
        					'id_toko' => $this->userdata->id_toko,
        					'id_users' => $this->userdata->id_users,
        					'id_faktur' => $id_faktur,
        					'tgl' => date('d-m-Y'),
        					'no_faktur' => $no_faktur,
        					'dp' => 0,
        					'pembayaran' => 0,
        				);
        				$this->db->insert('faktur_retail', $data_insert);
        				$id_pembelian = 1;
        				$row_last_p = $this->db->select('p.*')
        									   ->from('pembelian p')
        									   ->where('p.id_toko', $this->userdata->id_toko)
        									   ->order_by('p.id_pembelian', 'desc')
        									   ->get()->row();
        				if ($row_last_p) {
        					$id_pembelian = $row_last_p->id_pembelian+1;
        				}
        				$data_insert = array(
        					'id_pembelian' => $id_pembelian,
        					'id_toko' => $this->userdata->id_toko,
        					'id_users' => $this->userdata->id_users,
        					'id_faktur' => $id_faktur,
        					'id_produk' => $key->id_produk,
        					'tgl_masuk' => date('d-m-Y'),
        					'tgl_expire' => date('d-m-2099'),
        					'pembayaran' => 1,
        					'jumlah' => $key->cup,
        				);
        				$this->db->insert('pembelian', $data_insert);
        				$data_insert = array(
        					'id_toko' => $this->userdata->id_toko,
        					'id_pembelian' => $id_pembelian,
        					'id_produk' => $key->id_produk,
        					'stok' => $key->cup,
        				);
        				$this->db->insert('stok_produk', $data_insert);
        			}
        		}
        	}

        	$this->db->where('id_toko', $this->userdata->id_toko);
        	$this->db->where('id_users', $this->userdata->id_users);
        	$this->db->delete('pengemasan_barang_temp');

            $this->session->set_flashdata('message', 'Save Record Success');
        	redirect('produksi/pengemasan');
		}
	}

	public function list_temp_update()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('pbu.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('pengemasan_barang_update pbu')
							 ->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'pbu.id_produk=pr.id_produk_2 AND pbu.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('pbu.id_toko', $this->userdata->id_toko)
							 ->where('pbu.posisi', 0)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td>'.number_format($key->cup,0,',','.').'</td>
						<td>'.number_format($key->rusak,0,',','.').'</td>
						<td>'.number_format($key->total,0,',','.').'</td>
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

	public function list_temp_pengemasan_update()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('pbu.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('pengemasan_barang_update pbu')
							 ->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'pbu.id_produk=pr.id_produk_2 AND pbu.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('pbu.id_toko', $this->userdata->id_toko)
							 ->where('pbu.posisi', 1)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
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
						<td>'.number_format($key->terpakai,0,',','.').'</td>
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

	public function list_temp_produk_update()
	{
		header('Content-Type: application/json');
		$res_temp = $this->db->select('pbu.*, pr.nama_produk, sp.satuan AS nama_satuan')
							 ->from('pengemasan_barang_update pbu')
							 ->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko')
							 ->join('produk_retail pr', 'pbu.id_produk=pr.id_produk_2 AND pbu.id_toko=pr.id_toko')
							 ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
							 ->where('pbu.id_toko', $this->userdata->id_toko)
							 ->where('pbu.posisi', 2)
							 ->where('u.level', 2)
							 ->order_by('pr.nama_produk')
							 ->get()->result();
		$no = 1;
		$html = '';
		foreach ($res_temp as $key) :
			$html .= '<tr>
						<td>'.$no.'</td>
						<td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
						<td style="padding:0px;"><input type="text" class="form-control text-right numbering editable cup" data-id="'.$key->id.'" value="'.number_format($key->cup,0,',','.').'" style="border:none;" /></td>
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
			'ambil_baru' => $ambil_baru,
			'sisa' => $sisa,
			'rusak' => $rusak,
			'terpakai' => $terpakai,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('pengemasan_barang_update', $data_update);
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update_temp_produk_update()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id', true);
		$cup = $this->input->post('cup', true);
		$data_update = array(
			'cup' => $cup,
		);
		$this->db->where('id', $id);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_users', $this->userdata->id_users);
		$this->db->update('pengemasan_barang_update', $data_update);
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
		$this->db->delete('pengemasan_barang_update');
		$data = array(
			'status' => "ok"
		);
		echo json_encode($data);
	}

	public function update($id)
	{
		$row = $this->db->select('p.*')
						->from('pengemasan p')
						->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
						->where('p.id_toko', $this->userdata->id_toko)
						->where('p.id', $id)
						->where('u.level', 2)
						->get()->row();
		if ($row) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_users', $this->userdata->id_users);
			$this->db->delete('pengemasan_barang_update');
			$res_barang = $this->db->select('pb.*')
								   ->from('pengemasan_barang pb')
								   ->where('pb.id_toko', $this->userdata->id_toko)
								   // ->where('pb.id_users', $this->userdata->id_users)
								   ->where('pb.id_pengemasan', $id)
								   ->get()->result();
			foreach ($res_barang as $key) {
				$data_insert = array(
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'id_pengemasan' => $key->id_pengemasan,
					'id_produk' => $key->id_produk,
					'posisi' => $key->posisi,
					'expire_date' => $key->expire_date,
					'cup' => $key->cup,
					'rusak' => $key->rusak,
					'total' => $key->total,
					'sisa_kemarin' => $key->sisa_kemarin,
					'ambil_baru' => $key->ambil_baru,
					'sisa' => $key->sisa,
					'terpakai' => $key->terpakai,
				);
				$this->db->insert('pengemasan_barang_update', $data_insert);
			}
			$res_karyawan = $this->db->select('pk.*, CONCAT(u.first_name," ",u.last_name) AS nama_users')
									 ->from('pengemasan_karyawan pk')
									 ->join('users u', 'pk.id_users=u.id_users')
									 // ->where('pk.id_toko', $this->userdata->id_toko)
								   	 ->where('pk.id_pengemasan', $id)
								   	 ->get()->result();
			$arr_karyawan = array();
			foreach ($res_karyawan as $key) {
				$arr_karyawan[$key->id_users] = $key->nama_users;
			}
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_pengemasan' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
	        	'id' => set_value('id', $row->id),
	        	'tgl' => set_value('tgl', $row->tgl),
	        	'tgl_produksi' => set_value('tgl_produksi', $row->tgl_produksi),
	        	'progress' => set_value('progress', $row->progress),
	        	'catatan' => set_value('catatan', $row->catatan),
	        	'karyawan_masuk' => set_value('karyawan_masuk', $row->karyawan_masuk),
	        	'karyawan_tidak_masuk' => set_value('karyawan_tidak_masuk', $row->karyawan_tidak_masuk),
	        	'data_karyawan_produksi' => $arr_karyawan,
	        	'data_karyawan' => $this->_res_karyawan(),
	        );
	        $this->view->render_produksi('pengemasan/pengemasan_form_update', $data);
		} else {
            $this->session->set_flashdata('message', 'Record Not Found');
        	redirect('produksi/pengemasan');
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
			$tgl_produksi = $this->input->post('tgl_produksi', true);
			$progress = $this->input->post('progress', true);
			$catatan = $this->input->post('catatan', true);
        	$res_temp = $this->db->select('pbu.*')
        						 ->from('pengemasan_barang_update pbu')
        						 ->join('users u', 'pbu.id_users=u.id_users AND pbu.id_toko=u.id_toko')
        						 ->where('pbu.id_toko', $this->userdata->id_toko)
        						 ->where('pbu.id_users', $this->userdata->id_users)
        						 ->where('u.level', 2) 
        						 ->group_by('pbu.id')
        						 ->get()->result();

        	$total_karyawan = count($this->_res_karyawan_total());
        	$total_karyawan_masuk = count($karyawan);
        	$total_karyawan_tidak_masuk = $total_karyawan-$total_karyawan_masuk;

			$data_update = array(
				'tgl' => $tgl,
				'tgl_produksi' => $tgl_produksi,
				'progress' => $progress,
				'catatan' => $catatan,
        		'karyawan_masuk' => $total_karyawan_masuk,
        		'karyawan_tidak_masuk' => $total_karyawan_tidak_masuk,
			);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id', $id);
			$this->db->update('pengemasan', $data_update);
        	
			$this->db->where('id_pengemasan', $id);
			$this->db->delete('pengemasan_karyawan');

        	foreach ($karyawan as $key => $value) {
        		$data_insert = array(
        			'id_pengemasan' => $id,
        			'id_users' => $value,
        		);
        		$this->db->insert('pengemasan_karyawan', $data_insert);
        	}

        	$res_barang = $this->db->select('pb.*')
	        						 ->from('pengemasan_barang pb')
	        						 ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
	        						 ->where('pb.id_toko', $this->userdata->id_toko)
	        						 ->where('pb.id_users', $this->userdata->id_users)
	        						 ->where('u.level', 2)
	        						 ->where('pb.posisi', 2) // produk jadi
	        						 ->group_by('pb.id')
	        						 ->get()->result();
        	foreach ($res_barang as $key) {
    			$row_stok = $this->db->select('sp.*')
    								 ->from('stok_produk sp')
    								 ->where('sp.id_toko', $this->userdata->id_toko)
    								 ->where('sp.id_produk', $key->id_produk)
    								 ->order_by('sp.id', 'asc')
    								 ->get()->row();
    			if ($row_stok) {
    				$data_update = array(
    					'stok' => $row_stok->stok-$key->cup,
    				);
    				$this->db->where('id', $row_stok->id);
    				$this->db->update('stok_produk', $data_update);
    			} else {
    				$id_faktur = 1;
    				$row_last_fr = $this->db->select('fr.*')
    									   ->from('faktur_retail fr')
    									   ->where('fr.id_toko', $this->userdata->id_toko)
    									   ->order_by('fr.id_faktur', 'desc')
    									   ->get()->row();
    				if ($row_last_fr) {
    					$id_faktur = $row_last_p->id_faktur+1;
    				}
		            $urutan = $this->Faktur_retail_model->get_faktur_hari_ini()->count+1;
		            $no_faktur = date('dmy').'00'.$urutan;
    				$data_insert = array(
    					'id_toko' => $this->userdata->id_toko,
    					'id_users' => $this->userdata->id_users,
    					'id_faktur' => $id_faktur,
    					'tgl' => date('d-m-Y'),
    					'no_faktur' => $no_faktur,
    					'dp' => 0,
    					'pembayaran' => 0,
    				);
    				$this->db->insert('faktur_retail', $data_insert);
    				$id_pembelian = 1;
    				$row_last_p = $this->db->select('p.*')
    									   ->from('pembelian p')
    									   ->where('p.id_toko', $this->userdata->id_toko)
    									   ->order_by('p.id_pembelian', 'desc')
    									   ->get()->row();
    				if ($row_last_p) {
    					$id_pembelian = $row_last_p->id_pembelian+1;
    				}
    				$data_insert = array(
    					'id_pembelian' => $id_pembelian,
    					'id_toko' => $this->userdata->id_toko,
    					'id_users' => $this->userdata->id_users,
    					'id_faktur' => $id_faktur,
    					'id_produk' => $key->id_produk,
    					'tgl_masuk' => date('d-m-Y'),
    					'tgl_expire' => date('d-m-2099'),
    					'pembayaran' => 1,
    					'jumlah' => $key->cup,
    				);
    				$this->db->insert('pembelian', $data_insert);
    				$data_insert = array(
    					'id_toko' => $this->userdata->id_toko,
    					'id_pembelian' => $id_pembelian,
    					'id_produk' => $key->id_produk,
    					'stok' => $key->cup,
    				);
    				$this->db->insert('stok_produk', $data_insert);
    			}
        	}
        	
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_pengemasan', $id);
			$this->db->delete('pengemasan_barang');

        	foreach ($res_temp as $key) {
        		$data_insert = array(
        			'id_toko' => $this->userdata->id_toko,
        			'id_users' => $this->userdata->id_users,
        			'id_pengemasan' => $id,
        			'id_produk' => $key->id_produk,
        			'posisi' => $key->posisi,
        			'cup' => $key->cup,
        			'rusak' => $key->rusak,
        			'total' => $key->total,
        			'sisa_kemarin' => $key->sisa_kemarin,
        			'ambil_baru' => $key->ambil_baru,
        			'sisa' => $key->sisa,
        			'terpakai' => $key->terpakai,
        		);
        		$this->db->insert('pengemasan_barang', $data_insert);
        		if ($key->posisi == 2) { // produk jadi
	    			$row_stok = $this->db->select('sp.*')
	    								 ->from('stok_produk sp')
	    								 ->where('sp.id_toko', $this->userdata->id_toko)
	    								 ->where('sp.id_produk', $key->id_produk)
	    								 ->order_by('sp.id', 'asc')
	    								 ->get()->row();
	    			if ($row_stok) {
	    				$data_update = array(
	    					'stok' => $row_stok->stok+$key->cup,
	    				);
	    				$this->db->where('id', $row_stok->id);
	    				$this->db->update('stok_produk', $data_update);
	    			}
        		}
        	}

        	$this->db->where('id_toko', $this->userdata->id_toko);
        	$this->db->where('id_users', $this->userdata->id_users);
        	$this->db->delete('pengemasan_barang_update');

            $this->session->set_flashdata('message', 'Update Record Success');
        	redirect('produksi/pengemasan');
        }
	}

    public function _rules() 
    {
        $this->form_validation->set_rules('tgl', 'Tgl', 'trim|required');
        $this->form_validation->set_rules('progress', 'progress', 'trim|required');
        $this->form_validation->set_rules('catatan', 'catatan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */