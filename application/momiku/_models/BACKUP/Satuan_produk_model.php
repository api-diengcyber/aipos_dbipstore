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
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
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
        $this->datatables->where('u.id_cabang', $this->userdata->id_cabang);
        $this->datatables->where('u.level', 2);
        $this->datatables->add_column('action', anchor(site_url('produksi/satuan_produk/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/satuan_produk/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_satuan');
        $this->datatables->group_by('sp.id_satuan');
        return $this->datatables->generate();
    }

	/* get by id */
	function get_by_id($id, $id_toko)
	{
        $this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	/* get by id toko */
	function get_by_id_toko($id_toko)
	{
        $this->db->where('id_toko', $this->userdata->id_toko);
		return $this->db->get($this->table)->result();
	}

	/* insert */
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	/* update */
	function update($id, $data)
	{
        $this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	/* delete */
	function delete($id)
	{
        $this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}

/* End of file  */
/* Location: ./application/models/ */