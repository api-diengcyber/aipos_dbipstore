<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_retail_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id_users';
    public $id_toko = 'id_toko';
    public $level = 'level';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json() {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,phone,level, IF(level="1", "Admin", "Kasir") AS levels');
        $this->datatables->from('users');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('outlet/pegawai_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pegawai_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pegawai_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        $this->db->order_by('active', 'desc');
        $this->db->order_by('level', 'asc');
        $this->db->order_by('first_name', 'asc');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi() {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,phone,level, IF(level="1", "Admin", "Kasir") AS levels');
        $this->datatables->from('users');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/pegawai_retail/read/$1'),'<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pegawai_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pegawai_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        $this->db->order_by('active', 'desc');
        $this->db->order_by('level', 'asc');
        $this->db->order_by('first_name', 'asc');
        return $this->datatables->generate();
    }

    // datatables
    function json_sales() {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,phone,level, IF(level="1", "Admin", "Kasir") AS levels');
        $this->datatables->from('users');
        $this->datatables->where('level', '4');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('outlet/pegawai_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('outlet/pegawai_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        $this->db->order_by('active', 'desc');
        $this->db->order_by('level', 'asc');
        $this->db->order_by('first_name', 'asc');
        return $this->datatables->generate();
    }

    // datatables
    function json_sales_produksi() {
        $this->datatables->select('id,id_users,id_toko,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,phone,level, IF(level="1", "Admin", "Kasir") AS levels');
        $this->datatables->from('users');
        $this->datatables->where('level', '5');
        $this->datatables->where('id_toko', $this->userdata->id_toko);
        $this->datatables->where('id_cabang', $this->userdata->id_cabang);
        $this->datatables->add_column('action', anchor(site_url('produksi/pegawai_retail/update/$1'),'<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('produksi/pegawai_retail/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        $this->db->order_by('active', 'desc');
        $this->db->order_by('level', 'asc');
        $this->db->order_by('first_name', 'asc');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id toko
    function get_by_id_toko($id_toko)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_cabang', $this->userdata->id_cabang);
        // $this->db->where($this->level, '2');
        return $this->db->get($this->table)->result();
    }

    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('ip_address', $q);
    	$this->db->or_like('username', $q);
    	$this->db->or_like('password', $q);
    	$this->db->or_like('salt', $q);
    	$this->db->or_like('email', $q);
    	$this->db->or_like('activation_code', $q);
    	$this->db->or_like('forgotten_password_code', $q);
    	$this->db->or_like('forgotten_password_time', $q);
    	$this->db->or_like('remember_code', $q);
    	$this->db->or_like('created_on', $q);
    	$this->db->or_like('last_login', $q);
    	$this->db->or_like('active', $q);
    	$this->db->or_like('first_name', $q);
    	$this->db->or_like('last_name', $q);
    	$this->db->or_like('company', $q);
    	$this->db->or_like('phone', $q);
    	$this->db->or_like('level', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('id_toko', $q);
    	$this->db->or_like('ip_address', $q);
    	$this->db->or_like('username', $q);
    	$this->db->or_like('password', $q);
    	$this->db->or_like('salt', $q);
    	$this->db->or_like('email', $q);
    	$this->db->or_like('activation_code', $q);
    	$this->db->or_like('forgotten_password_code', $q);
    	$this->db->or_like('forgotten_password_time', $q);
    	$this->db->or_like('remember_code', $q);
    	$this->db->or_like('created_on', $q);
    	$this->db->or_like('last_login', $q);
    	$this->db->or_like('active', $q);
    	$this->db->or_like('first_name', $q);
    	$this->db->or_like('last_name', $q);
    	$this->db->or_like('company', $q);
    	$this->db->or_like('phone', $q);
    	$this->db->or_like('level', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    /*
    function omzet_sales_tgl($id_users, $tgl)
    {
        $row = $this->db->select('SUM(od.harga_jual) AS omzet')
                        ->from('orders_sales_temp ost')
                        ->join('orders_detail od', 'ost.id_orders_temp=od.id_orders_sales AND od.'.$this->where('ost'))
                        ->where('ost.'.$this->where())
                        ->where('ost.id_users', $id_users)
                        ->where('ost.tgl', $tgl)
                        ->get()->row();
        return $row;
    }*/

    function omzet_sales_tgl($id_users, $tgl, $tgl2='')
    {
        $where_date = 'o.tgl_order="'.$tgl.'"';
        if (!empty($tgl2)) {
            $ext1 = explode("-", $tgl);
            $h_t1 = $ext1[0];
            $b_t1 = !empty($ext1[1]) ? sprintf('%02d', $ext1[1]) : date('m');
            $t_t1 = !empty($ext1[2]) ? $ext1[2] : date('Y');
            $ext2 = explode("-", $tgl2);
            $h_t2 = $ext2[0];
            $b_t2 = !empty($ext2[1]) ? sprintf('%02d', $ext2[1]) : date('m');
            $t_t2 = !empty($ext2[2]) ? $ext2[2] : date('Y');
            $where_date = 'DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$t_t1.'-'.$b_t1.'-'.$h_t1.'" AND "'.$t_t2.'-'.$b_t2.'-'.$h_t2.'"';
        }
        if ($id_users=="null") {
            $where_cl = 'od.id_toko = '.$this->userdata->id_toko.' AND '.$where_date.' AND m.id_sales="0" AND o.id_sales IS NULL AND o.pembeli="null" OR od.id_toko = '.$this->userdata->id_toko.' AND '.$where_date.' AND m.id_sales=0 AND o.id_sales IS NULL AND o.pembeli=0';
            $where_cb = 'o.id_toko = '.$this->userdata->id_toko.' AND '.$where_date.' AND o.id_sales="0" AND o.pembeli="null" OR o.id_toko = '.$this->userdata->id_toko.' AND '.$where_date.' AND o.id_sales=0 ';
            $pos_join_member = 'left';
        } else {
            $where_cl = 'od.id_toko = '.$this->userdata->id_toko.' AND '.$where_date.' AND m.id_sales="'.$id_users.'" AND o.pembeli>0 AND o.id_sales IS NULL';
            $where_cb = 'o.id_toko = '.$this->userdata->id_toko.' AND '.$where_date.' AND o.id_sales="'.$id_users.'" AND o.pembeli>0 AND o.id_sales>0';
            $pos_join_member = '';
        }
        /* cara lama */
        $omzet = 0;
        $row_null = $this->db->select('SUM(od.subtotal) AS omzet')
                            ->from('orders_detail od')
                            ->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko')
                            ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_users=u.id_users AND o.id_toko=od.id_toko')
                            ->join('member m', 'o.pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=o.id_toko', $pos_join_member)
                            ->where($where_cl)
                            ->get()->row();
        if ($row_null) {
            $omzet += $row_null->omzet;
        }
        /* cara lama */
        /* cara baru */
        $row_sales = $this->db->select('SUM(od.subtotal) AS omzet')
                              ->from('orders o')
                              ->join('users u', 'o.id_users=u.id_users AND od.id_toko=u.id_toko')
                              ->join('orders_detail od', 'od.id_orders_2=o.id_orders_2 AND od.id_karyawan=u.id_users AND od.id_toko=o.id_toko')
                              ->where($where_cb)
                              ->get()->row();
        if ($row_sales) {
            $omzet += $row_sales->omzet;
        }
        /* cara baru */
        return $omzet;
    }

    function omzet_sales_bulan($id_users, $bulan, $tahun)
    {
        $bulan = sprintf('%02d', $bulan);
        if ($id_users=="null") {
            $where_cl = 'od.id_toko = '.$this->userdata->id_toko.' AND SUBSTRING(o.tgl_order,4,2)="'.$bulan.'" AND SUBSTRING(o.tgl_order,7,4)="'.$tahun.'" AND m.id_sales="0" AND o.id_sales IS NULL AND o.pembeli="null" OR od.id_toko = '.$this->userdata->id_toko.' AND SUBSTRING(o.tgl_order,4,2)="'.$bulan.'" AND SUBSTRING(o.tgl_order,7,4)="'.$tahun.'" AND m.id_sales=0 AND o.id_sales IS NULL AND o.pembeli=0';
            $where_cb = 'o.id_toko = '.$this->userdata->id_toko.' AND SUBSTRING(o.tgl_order,4,2)="'.$bulan.'" AND SUBSTRING(o.tgl_order,7,4)="'.$tahun.'" AND o.id_sales="0" AND o.pembeli="null" OR o.id_toko = '.$this->userdata->id_toko.' AND SUBSTRING(o.tgl_order,4,2)="'.$bulan.'" AND SUBSTRING(o.tgl_order,7,4)="'.$tahun.'" AND o.id_sales=0 ';
            $pos_join_member = 'left';
        } else {
            $where_cl = 'od.id_toko = '.$this->userdata->id_toko.' AND SUBSTRING(o.tgl_order,4,2)="'.$bulan.'" AND SUBSTRING(o.tgl_order,7,4)="'.$tahun.'" AND m.id_sales="'.$id_users.'" AND o.pembeli>0 AND o.id_sales IS NULL';
            $where_cb = 'o.id_toko = '.$this->userdata->id_toko.' AND SUBSTRING(o.tgl_order,4,2)="'.$bulan.'" AND SUBSTRING(o.tgl_order,7,4)="'.$tahun.'" AND o.id_sales="'.$id_users.'" AND o.pembeli>0 AND o.id_sales>0';
            $pos_join_member = '';
        }
        /* cara lama */
        $omzet = 0;
        $row_null = $this->db->select('SUM(od.subtotal) AS omzet')
                            ->from('orders_detail od')
                            ->join('users u', 'od.id_karyawan=u.id_users AND od.id_toko=u.id_toko')
                            ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_users=u.id_users AND o.id_toko=od.id_toko')
                            ->join('member m', 'o.pembeli=m.id_member AND m.id_users=u.id_users AND m.id_toko=o.id_toko', $pos_join_member)
                            ->where($where_cl)
                            ->group_by('CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2))')
                            ->get()->row();
        if ($row_null) {
            $omzet += $row_null->omzet;
        }
        /* cara lama */
        /* cara baru */
        $row_sales = $this->db->select('SUM(od.subtotal) AS omzet')
                              ->from('orders o')
                              ->join('users u', 'o.id_users=u.id_users AND od.id_toko=u.id_toko')
                              ->join('orders_detail od', 'od.id_orders_2=o.id_orders_2 AND od.id_karyawan=u.id_users AND od.id_toko=o.id_toko')
                              ->where($where_cb)
                              ->group_by('CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2))')
                              ->get()->row();
        if ($row_sales) {
            $omzet += $row_sales->omzet;
        }
        /* cara baru */
        return $omzet;
    }

}

/* End of file Pegawai_retail_model.php */
/* Location: ./application/models/Pegawai_retail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-02 05:48:29 */
/* http://harviacode.com */