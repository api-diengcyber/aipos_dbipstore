<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class Service_order extends AI_Admin
{
	function __construct()
	{
		parent::__construct();
		$this->models('Service_order_model');
		$this->load->library('datatables');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// echo "lll";
		$service = $this->Service_order_model->get_all($this->userdata->id_toko);
		// var_dump($data);

		// 'active_arus_kas' => 'active',
		$data = [
			'active_service_order' => 'active',
			'service' => $service,
		];

		$this->rview('service_order/service_order_list', $data);
	}

	public function search()
	{
		// Ambil nilai keyword dari input POST
		$keyword = $this->input->post('keyword');

		// Lakukan pencarian berdasarkan nama_produk dengan menggunakan LIKE
		$spareparts = $this->db->select('pr.*')
			->from('produk_retail pr')
			->join('service_order_detail s', 'pr.id_produk_2 = s.id_produk', 'left')
			->where('pr.id_toko', $this->userdata->id_toko)
			->where('pr.id_kategori', 1)
			->like('pr.nama_produk', $keyword)
			->where('s.id_produk IS NULL', NULL, FALSE) // Filter out rows where there is no match in service_order_detail
			->get()
			->result();



		// Konversi hasil menjadi format JSON dan kirim sebagai respons
		header('Content-Type: application/json');
		echo json_encode($spareparts);
	}
	public function insert_temp()
	{
		// Ambil nilai keyword dari input POST
		$id_produk = $this->input->post('id_produk');

		// Mengambil harga produk dari tabel produk_retail
		$produk = $this->db->select('pr.*')
			->from('produk_retail pr')
			->where('pr.id_produk_2', $id_produk) // Perhatikan bahwa saya mengubah kondisi WHERE ke id_produk_2
			->where('pr.id_toko', $this->userdata->id_toko)
			->get()
			->row();

		$harga = $produk->harga_1;

		// Mengambil jumlah produk dari tabel service_order_temp jika sudah ada
		$cek_row = $this->db->select('st.jumlah')
			->from('service_order_temp st')
			->where('st.id_toko', $this->userdata->id_toko)
			->where('st.id_produk', $id_produk)
			->get()
			->row();

		if ($cek_row) {
			// Jika data sudah ada, update jumlah dan harga
			$jumlah = $cek_row->jumlah + 1;
			$hargaTotal = $produk->harga_1 * $jumlah;

			// Update data yang sudah ada di dalam tabel
			$data = [
				'jumlah' => $jumlah,
				'harga' => $hargaTotal
				// Tambahkan kolom-kolom lain yang ingin Anda update di dalam tabel
			];

			$this->db->where('id_produk', $id_produk)
				->where('id_toko', $this->userdata->id_toko)
				->update('service_order_temp', $data);

			// Beri respons berupa JSON sesuai dengan keberhasilan update
			if ($this->db->affected_rows() > 0) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'error';
			}
		} else {
			// Jika data belum ada, lakukan insert
			$data = [
				'id_toko' => $this->userdata->id_toko,
				'id_produk' => $id_produk,
				'jumlah' => 1,
				'harga' => $harga
				// Tambahkan kolom-kolom lain yang ingin Anda masukkan ke dalam tabel
			];

			$insert = $this->db->insert('service_order_temp', $data);

			// Beri respons berupa JSON sesuai dengan keberhasilan insert
			if ($insert) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'error';
			}
		}

		// Konversi hasil menjadi format JSON dan kirim sebagai respons
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function load_temp_data()
	{
		// Ambil ID toko dari userdata, sesuaikan dengan struktur userdata Anda
		$id_toko = $this->userdata->id_toko;

		// Lakukan query untuk mengambil data dari tabel service_order_temp
		$temp_data = $this->db->select('st.*, pr.nama_produk, pr.harga_1') // Koreksi penulisan kolom
			->from('service_order_temp st')
			->join('produk_retail pr', 'pr.id_produk_2=st.id_produk') // Koreksi penulisan join
			->where('st.id_toko', $id_toko)
			->get()
			->result();

		// Konversi hasil menjadi format JSON dan kirim sebagai respons
		header('Content-Type: application/json');
		echo json_encode($temp_data);
	}

	public function delete_temp_data()
	{
		// Ambil ID produk yang akan dihapus dari input POST
		$id_produk = $this->input->post('id_produk');

		// Hapus data dengan ID produk yang sesuai dari tabel service_order_temp
		$this->db->where('id_produk', $id_produk)
			->where('id_toko', $this->userdata->id_toko)
			->delete('service_order_temp');

		// Beri respons berupa JSON sesuai dengan keberhasilan penghapusan
		if ($this->db->affected_rows() > 0) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'error';
		}

		// Konversi hasil menjadi format JSON dan kirim sebagai respons
		header('Content-Type: application/json');
		echo json_encode($response);
	}






	public function create()
	{

		$mekanik = $this->db->select('*')
			->from('users')
			->where('id_toko', $this->userdata->id_toko)
			->where('level', 9)
			->get()
			->result();
		$service = $this->db->select('*')
			->from('service')
			->where('id_toko', $this->userdata->id_toko)
			->get()
			->result();
		$sparepart = $this->db->select('*')
			->from('produk_retail')
			->where('id_toko', $this->userdata->id_toko)
			->where('id_kategori', 1)
			->get()
			->result();



		$data = [
			'action' => site_url('admin/service_order/create_action'),
			'id' => set_value('id'),
			'id_service' => set_value('id_service'),
			'tgl_masuk' => set_value('tgl_masuk', date('d-m-Y')),
			'tgl_selesai' => set_value('tgl_selesai', date('d-m-Y')),
			'nama' => set_value('nama'),
			'alamat' => set_value('alamat'),
			'no_hp' => set_value('no_hp'),
			'harga_awal' => set_value('harga_awal'),
			'harga' => set_value('harga'),
			'no_faktur_service' => set_value('no_faktur_service'),
			'id_users' => set_value('id_users'),
			'id_mekanik' => set_value('id_mekanik'),
			'nama_mekanik' => set_value('nama_mekanik'),
			'status' => set_value('status', 0),
			'keterangan' => set_value('keterangan'),
			'active_service_order' => 'active',
			'mekanik' => $mekanik,
			'service' => $service,
			'sparepart' => $sparepart,


		];


		$this->rview('service_order/service_order_form', $data);
	}
	public function create_action()
	{
		$spareparts = $this->input->post('id_produk');
		$service = $this->db->select('*')
			->from('service')
			->where('id_toko', $this->userdata->id_toko)
			->where('id', $this->input->post('id_service', true))
			->get()
			->row();
		$this->db->select('MAX(id) as id_order');
		$this->db->from('service_order');
		$this->db->where('id_toko', $this->userdata->id_toko);
		$no_faktur = $this->db->get()->row();
		if ($no_faktur->id_order == null) {
			$nomor = 1;
		} else {
			$nomor = $no_faktur->id_order + 1;
		}
		$no_faktur_baru = $this->userdata->id_toko . date("md") . substr(date('Y'), 2, 2) . $nomor;

		$data = [
			'id_service' => $this->input->post('id_service', true),
			'tgl_masuk' => $this->input->post('tgl_masuk', true),
			'id_toko' => $this->userdata->id_toko,
			// 'tgl_selesai' => set_value('tgl_selesai', date('d-m-Y')),
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'no_hp' => $this->input->post('no_hp', true),
			'id_users' => $this->userdata->id_users,
			'harga' => $service->harga,
			'no_faktur_service' => $no_faktur_baru,
			'id_mekanik' => $this->input->post('id_mekanik', true),
			// 'nama_mekanik' => set_value('nama_mekanik'),
			'status' => $this->input->post('status', true),
			'keterangan' => $this->input->post('keterangan', true),

		];

		// $service = $this->Service_model->insert($data);
		$service = $this->db->insert('service_order', $data);


		foreach ($spareparts as $sparepart_id) {
			echo '(' . $sparepart_id . ')';

			// Lakukan query untuk mengambil data dari tabel service_order_temp
			$temp_data = $this->db->select('st.*, pr.nama_produk, pr.harga_1,st.id as id_temp') // Koreksi penulisan kolom
				->from('service_order_temp st')
				->join('produk_retail pr', 'pr.id_produk_2=st.id_produk') // Koreksi penulisan join
				->where('st.id_toko', $this->userdata->id_toko)
				->where('st.id_produk', $sparepart_id)
				->get()
				->row();

			echo $temp_data->id_temp;
			$jumlah = $temp_data->jumlah;
			$hargaTotal = $temp_data->harga_1 * $jumlah;
			echo '[' . $hargaTotal . ']';
			$data_temp = [
				'id_service_order' => $nomor,
				'id_toko' => $this->userdata->id_toko,
				'harga' => $hargaTotal,
				'id_produk' => $temp_data->id_produk, // Menggunakan properti yang benar dari hasil query
				'jumlah' => $jumlah // Menggunakan properti yang benar dari hasil query
			];

			// // Masukkan data ke dalam tabel service_order_detail
			$serviceDetail = $this->db->insert('service_order_detail', $data_temp);

			if ($serviceDetail) {
				$this->db->where('id_produk', $sparepart_id)
					->where('id_toko', $this->userdata->id_toko)
					->delete('service_order_temp');

			}



		}
		$this->session->set_flashdata('message', 'Create Record Failed');
		redirect(site_url('admin/service_order'));

	}




	public function update($id)
	{

		$service_order = $this->db->select('*')
			->from('service_order')
			->where('id_toko', $this->userdata->id_toko)
			->where('id', $id)
			->get()
			->row();

		$mekanik = $this->db->select('*')
			->from('users')
			->where('id_toko', $this->userdata->id_toko)
			->where('level', 9)
			->get()
			->result();
		$service = $this->db->select('*')
			->from('service')
			->where('id_toko', $this->userdata->id_toko)
			->get()
			->result();
		$harga_awal = $this->db->select('*')
			->from('service')
			->where('id_toko', $this->userdata->id_toko)
			->where('id', $service_order->id_service)
			->get()
			->row();

		$data = [
			'action' => site_url('admin/service_order/update_action'),
			'id' => set_value('id', $service_order->id),
			'id_service' => set_value('id_service', $service_order->id_service),
			'tgl_masuk' => set_value('tgl_masuk', $service_order->tgl_masuk),
			'tgl_selesai' => set_value('tgl_selesai', $service_order->tgl_selesai),
			'nama' => set_value('nama', $service_order->nama),
			'alamat' => set_value('alamat', $service_order->alamat),
			'no_hp' => set_value('no_hp', $service_order->no_hp),
			'harga_awal' => set_value('harga_awal', $harga_awal->harga),
			'harga' => set_value('harga', $service_order->harga),
			'no_faktur_service' => set_value('no_faktur_service', $service_order->no_faktur_service),
			'id_users' => set_value('id_users', $service_order->id_users),
			'id_mekanik' => set_value('id_mekanik', $service_order->id_mekanik),
			'nama_mekanik' => set_value('nama_mekanik'),
			'status' => set_value('status', $service_order->status),
			'keterangan' => set_value('keterangan', $service_order->keterangan),
			'active_service_order' => 'active',
			'mekanik' => $mekanik,
			'service' => $service,


		];


		$this->rview('service_order/service_order_form', $data);
	}


	public function update_status($id)
	{


		$data = [
			'status' => 2
		];
		$this->db->where('id', $id);
		$service = $this->db->update('service_order', $data);
		if ($service) {

			$this->cetak_faktur($id);

			// $this->session->set_flashdata('message', 'Update Record Success');
			// redirect(site_url('admin/service_order'));

		}

	}

	public function cetak_faktur($id)
	{
		$service = $this->db->select('so.*,s.nama as nama_service,CONCAT(u.first_name, " ", u.last_name) as nama_mekanik')
			->from('service_order so')
			->join('service s', 's.id=so.id_service')
			->join('users u', 'u.id_users=so.id_mekanik')
			->where('so.id_toko', $this->userdata->id_toko)
			->where('so.id', $id)
			->order_by('so.id', 'desc')
			->get()
			->row();

		$detail_order_service = $this->db->select('sod.*,pr.nama_produk')
			->from('service_order_detail sod')
			->join('produk_retail as pr', 'pr.id_produk_2=sod.id_produk')
			->where('sod.id_toko', $this->userdata->id_toko)
			->where('sod.id_service_order', $service->id_service)
			->get()
			->result();

		$toko = $this->db->select('*')
			->from('toko')
			->where('id', $this->userdata->id_toko)
			->get()
			->row();


		$data = [
			'service' => $service,
			'parts' => $detail_order_service,
			'toko' => $toko


		];

		$this->load->view('admin/service_order/print', $data);

	}


	public function update_action()
	{
		$id = $this->input->post('id');
		// $this->_rules();
		// if ($this->form_validation->run() == FALSE) {
		// 	$this->create();
		// } else {

		$data = [
			'id_service' => $this->input->post('id_service', true),
			'tgl_masuk' => $this->input->post('tgl_masuk', true),
			'id_toko' => $this->userdata->id_toko,
			// 'tgl_selesai' => set_value('tgl_selesai', date('d-m-Y')),
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'no_hp' => $this->input->post('no_hp', true),
			'id_users' => $this->userdata->id_users,
			'harga' => str_replace('.', '', $this->input->post('harga', true)),
			// 'no_faktur_service' => $no_faktur_baru,
			'id_mekanik' => $this->input->post('id_mekanik', true),
			// 'nama_mekanik' => set_value('nama_mekanik'),
			'status' => $this->input->post('status', true),
			'keterangan' => $this->input->post('keterangan', true),

		];


		$this->db->where('id', $id);
		$service = $this->db->update('service_order', $data);





		if ($service) {
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('admin/service_order'));
		} else {
			$this->session->set_flashdata('message', 'Update Record Failed');
			redirect(site_url('admin/service_order'));
		}

		// }
	}


	public function detail($id)
	{
		$service = $this->db->select('so.*,s.nama as nama_service,CONCAT(u.first_name, " ", u.last_name) as nama_mekanik')
			->from('service_order so')
			->join('service s', 's.id=so.id_service')
			->join('users u', 'u.id_users=so.id_mekanik')
			->where('so.id_toko', $this->userdata->id_toko)
			->where('so.id', $id)
			->order_by('so.id', 'desc')
			->get()
			->row();

		$detail_order_service = $this->db->select('sod.*,pr.nama_produk')
			->from('service_order_detail sod')
			->join('produk_retail as pr', 'pr.id_produk_2=sod.id_produk')
			->where('sod.id_toko', $this->userdata->id_toko)
			->where('sod.id_service_order', $service->id_service)
			->get()
			->result();


		$data = [
			'service' => $service,
			'parts' => $detail_order_service,
			'active_service_order' => 'active',


		];
		// var_dump($detail_order_service);


		$this->rview('service_order/service_order_detail', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('service_order');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Delete Record Success');
		} else {
			$this->session->set_flashdata('message', 'Delete Record Failed');
		}

		redirect(site_url('admin/service'));
	}


	public function _rules()
	{
		$this->form_validation->set_rules('id_service', 'id_service', 'trim|required');
		$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim');
		$this->form_validation->set_rules('id_users', 'id_users', 'trim');
		$this->form_validation->set_rules('id_mekanik', 'id_mekanik', 'trim');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('estimasi_waktu', 'estimasi', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}