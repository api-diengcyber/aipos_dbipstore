<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Satuan_produk_model extends CI_Model {

	public $table = 'satuan_produk';
	public $id = 'id_satuan';
	public $id_toko = 'id_toko';

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

    /* datatables */
    function json($id_toko) {
        $this->datatables->select('sp.id, sp.id_satuan, sp.id_toko, sp.satuan');
        $this->datatables->from('satuan_produk sp');
        $this->datatables->join('users u', 'sp.id_users=u.id_users AND sp.id_toko=u.id_toko');
        $this->datatables->where('sp.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
		}
        $this->datatables->where('u.level', 3);
        $this->datatables->add_column('action', anchor(site_url('outlet/satuan_produk/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/satuan_produk/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_satuan');
        $this->datatables->group_by('sp.id_satuan');
        return $this->datatables->generate();
    }

    /* datatables */
    function json_produksi($id_toko) {
        $this->datatables->select('sp.id, sp.id_satuan, sp.id_toko, sp.satuan');
        $this->datatables->from('satuan_produk sp');
        $this->datatables->join('users u', 'sp.id_users=u.id_users AND sp.id_toko=u.id_toko');
        $this->datatables->where('sp.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
		}
        $this->datatables->where('u.level', 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/satuan_produk/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/satuan_produk/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_satuan');
        $this->datatables->group_by('sp.id_satuan');
        return $this->datatables->generate();
    }

	/* get by id */
	function get_by_id($id, $id_toko)
	{
		$this->db->select('sp.*');
		$this->db->from('satuan_produk sp');
        $this->db->join('users u', 'sp.id_users=u.id_users AND sp.id_toko=u.id_toko');
        $this->db->where('sp.id_toko', $this->userdata->id_toko);
        $this->db->where('u.id_cabang', $this->userdata->id_cabang);
		$this->db->where('u.id_satuan', $id);
		return $this->db->get()->row();
	}

	/* get by id toko */
	function get_by_id_toko($id_toko)
	{
		$this->db->select('sp.*');
		$this->db->from('satuan_produk sp');
        $this->db->join('users u', 'sp.id_users=u.id_users AND sp.id_toko=u.id_toko');
        $this->db->where('sp.id_toko', $this->userdata->id_toko);
		if (!empty($this->userdata->id_cabang)) {
			$this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
		}
        $this->db->group_by('sp.id_satuan');
		return $this->db->get()->result();
	}

	/* insert */
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	/* update */
	function update($id, $data)
	{
		$row = $this->get_by_id($id, $this->userdata->id_toko);
		if ($row) {
			$this->db->where('id', $row->id);
			$this->db->update($this->table, $data);
		}
	}

	/* delete */
	function delete($id)
	{
    	$this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
		$this->db->query('DELETE t1 FROM satuan_produk t1 INNER JOIN users u ON t1.id_users=u.id_users AND t1.id_toko=u.id_toko WHERE t1.id_toko="'.$this->userdata->id_toko.'" AND u.id_cabang="'.$this->userdata->id_cabang.'" AND t1.id_satuan="'.$id.'"');
    	$this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
	}

}

/* End of file  */
/* Location: ./application/models/ */