<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arus_kas_model extends CI_Model {

	public $table = 'arus_kas';
    public $id = 'id_arus_kas';
	public $id_toko = 'id_toko';

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
	}

    function json() {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->add_column('action', anchor(site_url('outlet/arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_produksi() {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->add_column('action', anchor(site_url('produksi/arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_masuk($id_toko) {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->where('ak.id_kas', '1');
        $this->datatables->add_column('action', anchor(site_url('outlet/arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_masuk_produksi($id_toko) {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->where('ak.id_kas', '1');
        $this->datatables->add_column('action', anchor(site_url('produksi/arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_keluar($id_toko) {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->where('ak.id_kas', '2');
        $this->datatables->add_column('action', anchor(site_url('outlet/arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_keluar_produksi($id_toko) {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->where('ak.id_kas', '2');
        $this->datatables->add_column('action', anchor(site_url('produksi/arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_periode($id_toko, $tgl_awal, $tgl_akhir) {
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko=ak.id_toko');
        $this->datatables->where('ak.id_toko', $this->userdata->id_toko);
        $this->datatables->where('DATE(CONCAT(SUBSTRING(tgl,7,4),"-",SUBSTRING(tgl,4,2),"-",SUBSTRING(tgl,1,2))) BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'"');
        $this->db->order_by('DATE(CONCAT(SUBSTRING(ak.tgl,7,4),"-",SUBSTRING(ak.tgl,4,2),"-",SUBSTRING(ak.tgl,1,2))) ASC');
        $this->db->order_by('ak.id_kas', 'ASC');
        $this->db->order_by('a.nama_akun', 'ASC');
        $this->db->order_by('ak.ket', 'ASC');
        return $this->datatables->generate();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id_toko, $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id_toko, $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id_toko, $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Arus_kas_model.php */
/* Location: ./application/models/Arus_kas_model.php */