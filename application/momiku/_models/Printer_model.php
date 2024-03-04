<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printer_model extends CI_Model {

	public $table = 'client_server';
	public $nama_client = 'nama_client';
	public $id = 'id';
	public $id_toko = 'id_toko';
	public $default_connector = 'FilePrintConnector';
	public $default_printer = '/dev/usb/lp0';

	public function __construct()
	{
		parent::__construct();
		
	}

	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->result();
	}

	function get_by_server($id_toko)
	{
		$this->db->where($this->id_toko, $id_toko);
		$this->db->where('nama_client', 'server');
		return $this->db->get($this->table)->row();
	}

	function get_by_nama_client($nama_client)
	{
		$this->db->where($this->nama_client, $nama_client);
		return $this->db->get($this->table)->row();
	}

	function get_by_id_toko($id_toko)
	{
		$this->db->where($this->id_toko, $id_toko);
		return $this->db->get($this->table)->result();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	function windows()
	{
		$data = array(
			'sistem_operasi' => 'windows',
			'connector' => 'WindowsPrintConnector',
		);
		return $data;
	}

	function linux()
	{
		$data_printer = array();
		$data_printer[0]['nama_printer'] = 'USB0';
		$data_printer[0]['printer'] = '/dev/usb/lp0';
		$data_printer[1]['nama_printer'] = 'USB1';
		$data_printer[1]['printer'] = '/dev/usb/lp1';
		$data_printer[2]['nama_printer'] = 'USB2';
		$data_printer[2]['printer'] = '/dev/usb/lp2';
		$data_printer[3]['nama_printer'] = 'USB3';
		$data_printer[3]['printer'] = '/dev/usb/lp3';
		$data = array(
			'sistem_operasi' => 'linux',
			'connector' => 'FilePrintConnector',
			'data_printer' => $data_printer,
		);
		return $data;
	}

}

/* End of file Printer_model.php */
/* Location: ./application/models/Printer_model.php */