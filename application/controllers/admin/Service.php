<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class Service extends AI_Admin
{
	function __construct()
	{
		parent::__construct();
		$this->models('Service_model');
		$this->load->library('datatables');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// echo "lll";
		$service = $this->Service_model->get_all($this->userdata->id_toko);
		// var_dump($data);

		// 'active_arus_kas' => 'active',
		$data = [
			'active_service' => 'active',
			'service' => $service,
		];

		$this->rview('service/service_list', $data);
	}
	public function create()
	{

		$data = [
			'id' => set_value('id'),
			'active_service' => 'active',
			'action' => site_url('admin/service/create_action'),
			'nama' => set_value('nama'),
			'harga' => set_value('harga'),
			'estimasi_waktu' => set_value('estimasi_waktu'),

		];

		$this->rview('service/service_form', $data);
	}
	public function create_action()
	{

		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			$data = [
				'nama' => $this->input->post('nama', true),
				'harga' => str_replace('.', '', $this->input->post('harga', true)),
				'id_toko' => $this->userdata->id_toko,
				'estimasi_waktu' => $this->input->post('estimasi_waktu', true),
			];

			// $service = $this->Service_model->insert($data);
			$service = $this->db->insert('service', $data);

			if ($service) {
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('admin/service'));
			} else {
				$this->session->set_flashdata('message', 'Create Record Failed');
				redirect(site_url('admin/service'));
			}

		}
	}




	public function update($id)
	{

		$service = $this->db->select('*')
			->from('service')
			->where('id_toko', $this->userdata->id_toko)
			->where('id', $id)
			->get()
			->row();


		$data = [
			'id' => set_value('id', $service->id),
			'active_service' => 'active',
			'action' => site_url('admin/service/update_action'),
			'nama' => set_value('nama', $service->nama),
			'harga' => set_value('harga', $service->harga),
			'estimasi_waktu' => set_value('estimasi_waktu', $service->estimasi_waktu),

		];
		$this->rview('service/service_form', $data);
	}


	public function update_action()
	{
		$id = $this->input->post('id');
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			$data = [
				'nama' => $this->input->post('nama', true),
				'harga' => str_replace('.', '', $this->input->post('harga', true)),
				'id_toko' => $this->userdata->id_toko,
				'estimasi_waktu' => $this->input->post('estimasi_waktu', true),
			];


			$this->db->where('id', $id);
			$service = $this->db->update('service', $data);

			if ($service) {
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('admin/service'));
			} else {
				$this->session->set_flashdata('message', 'Update Record Failed');
				redirect(site_url('admin/service'));
			}

		}
	}




	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('service');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Delete Record Success');
		} else {
			$this->session->set_flashdata('message', 'Delete Record Failed');
		}

		redirect(site_url('admin/service'));
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('estimasi_waktu', 'estimasi', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}